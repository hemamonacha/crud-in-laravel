@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title pull-left">Employee Details</h4>
                <a class='btn btn-secondary pull-right' href="{{ route('employee.index') }}"> Back</a>
            </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-striped  table-borderless">

              <tbody>

                    <tr>
                        <td>Employee First Name:</td>
                        <td>{{$emp_data->emp_first_name}}</td>
                    </tr>
                    <tr>
                        <td>Employee Last Name:</td>
                        <td>{{$emp_data->emp_last_name}}</td>
                    </tr>
                    <tr>
                        <td>Company Name:</td>
                        <td>{{$emp_data->company->company_name}}</td>
                    </tr>

                    <tr>
                        <td>Email Id:</td>
                        <td>{{$emp_data->emp_email}}</td>

                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td>{{$emp_data->emp_phone}}</td>

                    </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->


        <!-- /.card -->
      </div>

      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection
