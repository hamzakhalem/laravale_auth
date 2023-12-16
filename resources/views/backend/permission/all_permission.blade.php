@extends('admin.dashboard')
@section('admin')


			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{ route('add.permission') }}" class="btn btn-inverse-info">Add Permission</a>
            &nbsp;&nbsp;
            <a href="{{ route('import.permission') }}" class="btn btn-inverse-warning">Import</a>
            &nbsp;&nbsp;
            <a href="{{ route('export.permission') }}" class="btn btn-inverse-danger">Export</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Permission </h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Permission Name</th>
                        <th>Groupe Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $key => $pemission)

                        <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pemission->name }}</td>
                        <td>{{ $pemission->groupe_name}}</td>
                        <td>
                            <a href="{{ route('edit.permission', $pemission->id) }}" class="btn btn-inverse-warning">Edit</a>
                            <a href="{{ route('delete.permission', $pemission->id) }}" class="btn btn-inverse-danger" id="delete">Delete</a>
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