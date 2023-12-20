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

                                    <form id='myForm' class="forms-sample" method="POST" action={{ route('roles.permission.store') }}
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <div class="mb-3 form-group">
                                        <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                    
                                        <select type="text" class="form-select" 
                                                autocomplete="off" name="role_id" >
                                            <option selected="" disabled="">Selected</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" >{{ $role->name }}</option>                                           
                                            @endforeach

                                        </select> 
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                        <label class="form-check-label" for="checkDefaultmain">
                                            All permissions
                                        </label>
                                    </div>
                                    <hr>
                                    @foreach ($permissions_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="checkDefault">
                                                <label class="form-check-label" for="checkDefault">
                                                    {{ $group->groupe_name }}
                                                </label>
                                            </div>
                                        </div>
                                        @php
                                            $permissions = App\Models\User::getPermissionByGroupName($group->groupe_name) 
                                        @endphp
                                        <div class="col-9">
                                            @foreach ($permissions as $permission)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input"  name="permission[]"
                                                        id="checkDefault{{ $permission->id }}" value="{{ $permission->id }}"
                                                        >
                                                    <label class="form-check-label" for="checkDefault{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    @endforeach
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
        $('#checkDefaultmain').on('click', function(){
            if($(this).is(':checked')){
                $('input[type=checkbox]').prop('checked', true)
            }
            else 
                $('input[type=checkbox]').prop('checked', false)
        });
    </script>

@endsection