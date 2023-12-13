@extends('admin.dashboard')
@section('admin')


			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                        <a href="{{ route('add.amenitis') }}" class="btn btn-inverse-info">Add Aminitis</a>

					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Aminitis </h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Aminitis Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($amenities as $key => $amenitis)

                        <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $amenitis->amenitis_name}}</td>
                        <td>
                            <a href="{{ route('edit.amenitis', $amenitis->id) }}" class="btn btn-inverse-warning">Edit</a>
                            <a href="{{ route('delete.amenitis', $amenitis->id) }}" class="btn btn-inverse-danger" id="delete">Delete</a>
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