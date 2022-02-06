<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Spouses;
use App\Models\Loan;

class UsersController extends Controller
{
    
    public function index()
    {
        $title = "System Users List";
        $users = User::where('id','<>',Auth::user()->id)->get();
        return view('admin.users.index',compact('title','users'));
    }

    
    public function upload(Request $request)
    {
       // Upload File
        if($request->file){
            $file = $request->file;
            $file_name = round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/docs', $file_name);
        }else{
            return back()->with('error','Please select file to upload');
        }

        // Get File

        $path = public_path('/storage/docs/'.$file_name);
        $excel = Importer::make('Excel');
        $excel->load($path);
        $collection = $excel->getCollection();

        if(sizeof($collection[1]) == 4){
            for($row=1;$row<sizeof($collection);$row++){
                try{

                    $name           = $collection[$row][0];
                    $surname        = $collection[$row][1];
                    $sap_username   = $collection[$row][2];
                    $sap_password   = $collection[$row][3];
                    $email          = $this->create_email($name,$surname);

                    $create = User::create([
                        'sap_username'  =>$sap_username,
                        'sap_password'  =>$sap_password,
                        'name'          =>$name,
                        'surname'       =>$surname,
                        'role'          =>"SEC",
                        'department_id' =>1,
                        'email'         =>$email,
                        'phone'         =>"na",
                        'status'        =>1,
                        'password'      =>Hash::make('12345678'),
                    ]);

                    if(!$create){ return back()->with('error','Operation failed '.$create); }

                }catch(\Exception $e){
                    back()->with('error',$e->getMessage());
                }
            }
            return back()->with('success','User upload successful');

        }else{
            return back()->with('error','Fields dont match');

        }
    }


    function create_email($name,$surname){
        $email = strtolower($name).'.'.strtolower($surname).'@comex.com';
        $email = str_replace(' ', '', $email);
        // check if email exists
        $exists = User::where('email',$email)->count();

        if($exists >0 ){
            // create new unique email
            $rand = rand(1,99);
            $email = strtolower($name).'.'.strtolower($surname).''.$rand.'@comex.com';
            $email = str_replace(' ', '', $email);
            return $email;
        }else{
            return $email;
        }
    }

    
    public function store(Request $request)
    {
        $isExist = User::where('email',$request->email)->count();
        if($isExist > 0){
            return back()->with('warning','Email is already in use');
        }

        $create = User::create([
           
            'name'      =>$request->name,
            'surname'   =>$request->surname,
            'role'      =>$request->role,
            'department_id'=>$request->department,
            'email'     =>$request->email,
            'password'  =>Hash::make($request->password),
        ]);

        if($create){
            return back()->with('success','User created successfuly');
        }else{
            return back()->with('error','Operation failed '.$create);
        }
    }

    
    public function show($id)
    {
        $title = "View User";
        $user = User::where('id',$id)->first();
        $departments = Department::all();
        return view('admin.users.edit',compact('title','user','departments'));
    }
 
    public function edit($id)
    {
        $title = "Edit User";
        $user = User::where('id',$id)->first();
        $departments = Department::all();
        return view('admin.users.edit',compact('title','user','departments'));
    }

    public function update(Request $request, $id)
    {
        $update = User::where('id',$id)->update([
            'sap_username'  =>$request->sap_username,
            'sap_password'  =>$request->sap_password,
            'name'          =>$request->name,
            'surname'       =>$request->surname,
            'role'          =>$request->role,
            'department_id' =>$request->department_id,
            'email'         =>$request->email,
            'phone'         =>$request->phone,
            'status'        =>1,   
        ]);

        if($update){
            return back()->with('success','User updated successfuly');
        }else{
            return back()->with('error','Operation failed '.$update);
        }
    }

    public function update_password(Request $request, $id){

        $update = User::where('id',$id)->update(['password'=>Hash::make($request->password),]);

        if($update){
            return back()->with('success','User password updated');
        }else{
            return back()->with('error','Operation failed '.$update);
        }
    }

    
    public function destroy($id)
    {
        //
    }

    // Profile Routes
    public function profile(){
        $title = "User Profile";
        
        $user = User::where('id',Auth::user()->id)->first();
        $details = null;
        if(Auth::user()->role =='CU'){

            $details = Customer::where('user_id',Auth::user()->id)->first();
        }
        return view('admin.profile.index',compact('title','user','details'));
    }

    public function profile_update(){
        
        $update = User::where('id',Auth::user()->id)->update([   
            'email'     =>$request->email,
            'phone'     =>$request->phone,
        ]);

        if($update){
            return back()->with('success','User updated successfuly');
        }else{
            return back()->with('error','Operation failed '.$update);
        }
    }

    public function profile_password(Request $request){
        $cur_pwd = $request->c_password;
        $new_pwd = $request->n_password;

        if (Auth::attempt(array('email' => Auth::user()->email, 'password' => $cur_pwd))){
                $reset = User::where('id',Auth::user()->id)->update(['password'=> Hash::make($new_pwd)]);
                if($reset){ 
                    return back()->with('success','Password reset successfully');
                }else{
                    return back()->with('error','Operation failed '.$reset);
                }
        }else{
            return back()->with('error','Password entered does not match your account');
        }
    }


    // Registration methods
    public function register(Request $request){
        try{

            // Register User
            $user_id = null;
            $user = User::where('email',$request->email)->first();
            if($user){
               $user_id = $user->id;
            }else{
                $user = User::create([
                    'name'      =>$request->name,
                    'surname'   =>$request->surname,
                    'role'      =>"CU",
                    'email'     =>$request->email,
                    'password'  =>Hash::make('12345678'),
                ]);

                $user_id = $user->id;
            }

            // Add customer details
            $custumer = Customer::create([
                'user_id'           =>$user_id,
                'national_id'       =>null,
                'phone'             =>$request->phone,
                'province'          =>$request->province,
                'district'          =>$request->district,
                'address'           =>$request->address,
                'copy_national_id'  =>null,
                'copy_residence'    =>null,
                'copy_bank'         =>null,
            ]);

            // Add loan application
            $loans = Loan::orderby('loan_number', 'desc')->first();
            $interest = 10;

            if($loans){
                $current_loan = $loans->loan_number;
                $current_loan +=1;
            }else{
                $current_loan = 1000;
            }

            
            $loan = Loan::create([
                'loan_number'       =>$current_loan,
                'user_id'           =>$user_id,
                'period'            =>$request->duration,
                'amount_borrowed'   =>$request->amount,
                'interest'          =>$interest,
                'total_repayment'   =>null,
                'date_application'  =>null,
                'date_approval'     =>null,
                'date_payment'      =>null,
                'date_due'          =>null,
                'loan_status'            =>0,
            ]);

            // Login user
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
        
    }

    // Customer Methods
    public function customers(){
        $users = DB::table('users')->join('customers','customers.user_id','=','users.id')->get();
        return view('admin.users.customers',compact('users'));
    }

    public function customers_view($id){
        $user = DB::table('users')->join('customers','customers.user_id','=','users.id')->where('users.id',$id)->get();
        return view('admin.users.customers_view',compact('user'));
    }
    public function customer_profile(Request $request){
        
        if($request->copy_national_id){
            $file       = $request->copy_national_id;
            $file_name  = rand(1,100).''.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $path       = $file->storeAs('public/docs', $file_name); 
            $copy_national_id_file = $file_name;
        }

        if($request->copy_residence){
            $file       = $request->copy_residence;
            $file_name  = rand(1,100).''.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $path       = $file->storeAs('public/docs', $file_name); 
            $copy_residence_file = $file_name;
        }


        if($request->copy_bank_statement){
            $file       = $request->copy_bank_statement;
            $file_name  = rand(1,100).''.round(microtime(true)).'.'.$file->getClientOriginalExtension();
            $path       = $file->storeAs('public/docs', $file_name); 

            $copy_bank_statement_file = $file_name;
        }

        // Update the DB;

        $update = Customer::where('user_id',Auth::user()->id)
        ->update([
            'national_id'       =>$request->national_id,
            'phone'             =>$request->phone,
            'copy_national_id'  =>$copy_national_id_file,
            'copy_residence'    =>$copy_residence_file,
            'copy_bank'         =>$copy_bank_statement_file,
        ]);


        if($update){
            return redirect('/dashboard')->with('success','Account details updated , wait for approval');
        }else{
            return back()->with('error','Operation failed : '.$update);
        }
    }
}
