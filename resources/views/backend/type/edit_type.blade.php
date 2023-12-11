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

                                <h6 class="card-title">Edit Property type</h6>

                                <form class="forms-sample" method="POST" action={{ route('update.type') }}
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <input type="hidden"  value="{{ $type->id }}">
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Type Name</label>
                                        <input type="text" class="form-control  
                                             @error('type_name') is_invalid @enderror" 
                                            autocomplete="off" name="type_name"  value="{{ $type->type_name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Type Icon</label>
                                        <input type="text" class="form-control  
                                             @error('type_icon') is_invalid @enderror" 
                                            autocomplete="off" name="type_icon" value="{{ $type->type_icon }}">
                                    </div>


                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button class="btn btn-secondary">Cancel</button>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
