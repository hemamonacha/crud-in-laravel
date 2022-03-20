@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title pull-left">Company Details</h4>
                <a class='btn btn-secondary pull-right' href="{{ route('company.index') }}"> Back</a>
            </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-striped  table-borderless">

              <tbody>

                    <tr>
                        <td>Company Name:</td>
                        <td>{{$company_data->company_name}}</td>
                    </tr>
                    <tr>
                        <td>Company Email:</td>
                        <td>{{$company_data->company_email}}</td>
                    </tr>
                    <tr>
                        <td>Company Logo:</td>
                        <td>
                            @if(isset($company_data->company_logo))
                                <img src="{{ asset('storage/uploads/'.$company_data->company_logo) }}" style="width: 50px; height: 50px">
                                @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Company Website:</td>
                        <td>{{$company_data->company_website}}</td>

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
