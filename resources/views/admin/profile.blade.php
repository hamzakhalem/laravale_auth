@extends('admin.dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <img class="wd-100 rounded-circle" src="{{ asset(!empty($profileData->photo)?
                                 url('upload/admin/'.$profileData->photo): url('upload/no_image.jpg'))   }}" alt="profile">
                                <span class="h4 ms-3 ">{{ $profileData->username }}</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ $profileData->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{ $profileData->adress }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">

                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Update Profile</h6>

                                <form class="forms-sample" method="POST" action={{ route('admin.profile.store') }}
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1"
                                            autocomplete="off" placeholder="Username" name="username" value='{{$profileData->username  }}'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name:</label>
                                        <input type="name" class="form-control" id="exampleInputname1"
                                            placeholder="Name" name="name" value='{{$profileData->name}}'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Email" name="email" value='{{$profileData->email}}'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="0000" name="phone" value='{{$profileData->phone}}'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="0000" name="adress" value='{{$profileData->adress}}'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Photo</label>
                                        <input type="file" class="form-control" id="photoId"
                                            name="photo" >
                                    </div>  
                                    <div class="mb-3">
                                        <img id="showImg" class="wd-80 rounded-circle" src="{{ asset(!empty($profileData->photo)?
                                            url('upload/admin/'.$profileData->photo): url('upload/no_image.jpg'))   }}" alt="profile">
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button class="btn btn-secondary">Cancel</button>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <!-- right wrapper end -->
        </div>

    </div>

<script type="text/javascript">
$(document).ready(function(){
    $('#photoId').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImg').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    })
});
</script>
@endsection
