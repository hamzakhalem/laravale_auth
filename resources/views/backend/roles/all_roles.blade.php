@extends('admin.dashboard')
@section('admin')


			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{ route('add.roles') }}" class="btn btn-inverse-info">Add Roles</a>
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $key => $pemission)

                        <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pemission->name }}</td>
                        <td>
                            <a href="{{ route('edit.roles', $pemission->id) }}" class="btn btn-inverse-warning">Edit</a>
                            <a href="{{ route('delete.roles', $pemission->id) }}" class="btn btn-inverse-danger" id="delete">Delete</a>
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