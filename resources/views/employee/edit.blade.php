@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title pull-left">Edit Employee</h4>
                <a class='btn btn-secondary pull-right' href="{{ route('employee.index') }}"> Back</a>
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
            <form action="{{ route('employee.update',$emp_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="form-group row">
                    <label for="emp_first_name" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="emp_first_name" value="{{$emp_data->emp_first_name}}" class="form-control" id="emp_first_name" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="emp_last_name" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="emp_last_name" value="{{$emp_data->emp_last_name}}" class="form-control" id="emp_last_name" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="emp_last_name" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                        <select name="company_id" class="form-control">
                            <option value="">-- Select Company --</option>
                            @foreach($company_data as $comp)
                                 <option @if($comp->id==$emp_data->company_id) selected @endif value="{{$comp->id}}">{{$comp->company_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="emp_email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="emp_email" value="{{$emp_data->emp_email}}" class="form-control" id="emp_email" placeholder="Email">
                    </div>
                  </div>

                  <div class="form-group row">
                      <label for="emp_phone" class="col-sm-2 col-form-label">Phone</label>
                      <div class="col-sm-10">
                        <input type="text" name="emp_phone" value="{{$emp_data->emp_phone}}" class="form-control" id="emp_phone" placeholder="Phone">
                      </div>
                  </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
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
