@extends('admin.dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">

                <a href="{{ route('export.permission') }}" class="btn btn-inverse-danger">Download xlsx</a>
            </ol>
        </nav>

        <div class="row profile-body">

            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">

                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Import permission</h6>

                                    <form id='myForm' class="forms-sample" method="POST" action={{ route('store.permission') }}
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <div class="mb-3 form-group">
                                        <label for="exampleInputUsername1" class="form-label"> Import File (xlsx)</label>
                                        <input type="file" class="form-control" autocomplete="off" name="import_file" >

                                        
                                    </div>


                                    <button type="submit" class="btn btn-primary me-2">upload</button>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


@endsection