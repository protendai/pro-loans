<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Models\User;
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
        return view('admin.users.profile',compact('title','user'));
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
}
