@extends('admin.dashboard')
@section('admin')


			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{ route('add.roles.permission') }}" class="btn btn-inverse-info">Add Roles Permission</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">roles </h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>roles Name</th>
                        <th>Permission</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $key => $item)

                        <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            @foreach ($item->permissions as $perm)
                            <span class="badge bg-danger">{{ $item->name }}</span>
                            @endforeach
                           
                        </td>
                        <td>
                            <a href="{{ route('edit.roles', $item->id) }}" class="btn btn-inverse-warning">Edit</a>
                            <a href="{{ route('delete.roles', $item->id) }}" class="btn btn-inverse-danger" id="delete">Delete</a>
                        </td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
					</div>
				</div>

			</div>

@endsection