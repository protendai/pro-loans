<script src="{{asset('admin/js/app.js')}}"></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('datatables/datatables.min.js') }}"></script>
<script src="{{asset('select/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/toastr/toastr.min.js') }}"></script>



{{-- Data Tables --}}
<script>
    // Activate Mouse pointers , Data-Tables and Select Dropdwons
    $(document).ready(function() {
        $('body').css('pointer-events', 'all');
        $('.js-example-basic-single').select2();
        $(".js-example-responsive").select2();
        $('#mySelect2').select2({ dropdownParent: $('#add-modal') });
        $(".datatable").DataTable({ "responsive": true, });
        $('.datatable-sorted').DataTable({  "order": [[ 0, "desc" ]] });
    });

    
</script>