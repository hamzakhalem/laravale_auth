@extends('admin.dashboard')
@section('admin')


			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                        <a href="" class="btn btn-inverse-info">Add Proprety Type</a>

					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Proprety Type </h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Type Name</th>
                        <th>Type Icon</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($types as $key => $type)

                        <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $type->type_name}}</td>
                        <td>{{ $type->type_icon }}</td>
                        <td>
                            <a href="" class="btn btn-inverse-warning">Edit</a>
                            <a href="" class="btn btn-inverse-danger">Delete</a>
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