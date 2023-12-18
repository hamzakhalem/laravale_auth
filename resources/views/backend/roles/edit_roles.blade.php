@extends('admin.dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">

        <div class="row profile-body">

            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">

                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Edit Roles</h6>

                                    <form id='myForm' class="forms-sample" method="POST" action={{ route('update.roles') }}
                                    enctype="multipart/form-data"
                                    >

                                    @csrf
                                    <input type="hidden"  name="id" value="{{ $roles->id }}">

                                    <div class="mb-3 form-group">
                                        <label for="exampleInputUsername1" class="form-label"> Name</label>
                                        <input type="text" class="form-control" 
                                            autocomplete="off" name="name" value="{{ $roles->name }}" >
                                        <label for="exampleInputUsername1" class="form-label"> Group Name</label>
                                        
                                    </div>


                                    <button type="submit" class="btn btn-primary me-2">Edit</button>
                                </form>

                            </div> 

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    amenitis_name: {
                        required : true,
                    }, 
                    
                },
                messages :{
                    amenitis_name: {
                        required : 'Please Enter FieldName',
                    }, 
                     
    
                },
                errorElement : 'span', 
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
        
    </script>
@endsection