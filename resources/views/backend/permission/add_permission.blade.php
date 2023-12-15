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

                                <h6 class="card-title">Add permission</h6>

                                    <form id='myForm' class="forms-sample" method="POST" action={{ route('store.permission') }}
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <div class="mb-3 form-group">
                                        <label for="exampleInputUsername1" class="form-label"> Name</label>
                                        <input type="text" class="form-control" 
                                            autocomplete="off" name="permission_name" >
                                        <label for="exampleInputUsername1" class="form-label"> Group Name</label>
                                        <select type="text" class="form-select" 
                                            autocomplete="off" name="permission_groupe_name" >
                                        <option selected="" disabled="">Selected</option>
                                        <option value="type" >Property Type</option>
                                        <option value="amenities" >Amenities</option>
                                        </select> 
                                        
                                    </div>


                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
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