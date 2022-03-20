@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
              <h4 class="card-title pull-left">Create New Company</h4>
              <a class='btn btn-secondary pull-right' href="{{ route('company.index') }}"> Back</a>
            </div>

            <!-- /.card-header -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- form start -->
            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="company_name" class="form-control" id="inputname" placeholder="Company Name">
                    </div>
                  </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="company_email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputlogo" class="col-sm-2 col-form-label">Logo</label>
                  <div class="col-sm-10">
                    <input type="file" name="company_logo" class="form-control" id="inputlogo" placeholder="Logo">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputwebsite" class="col-sm-2 col-form-label">Company Website</label>
                    <div class="col-sm-10">
                      <input type="text" name="company_website" class="form-control" id="inputwebsite" placeholder="Company Website">
                    </div>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success  ">Submit</button>
                {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
      </div>

      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection
