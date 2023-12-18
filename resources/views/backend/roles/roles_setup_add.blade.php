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

                                <h6 class="card-title">Add Roles in permission</h6>

                                    <form id='myForm' class="forms-sample" method="POST" action={{ route('store.roles') }}
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <div class="mb-3 form-group">
                                        <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                    
                                        <select type="text" class="form-select" 
                                                autocomplete="off" name="role_id" >
                                            <option selected="" disabled="">Selected</option>
                                            @foreach ($role as $roles)
                                                <option value="{{ $role->id }}" >{{ $role->name }}</option>                                           
                                            @endforeach

                                        </select> 
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="checkDefault">
                                        <label class="form-check-label" for="checkDefault">
                                            Pemission All
                                        </label>
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


@endsection