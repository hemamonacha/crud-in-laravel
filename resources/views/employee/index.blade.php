@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">



          <div class="card-header">
            <a class="btn btn-success" href="employee/create">Create New Employee</a>
          </div>
           @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
             @endif
          <!-- /.card-header -->
          @if(count($emp_data) > 0)
          <div class="card-body">
              <div>
                <h3 class="card-title">Employee List</h3>
              </div>
             <div class="dropdown-divider"></div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Name</th>
                  <th>Company</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($emp_data as $index =>$data)
                    <tr>
                   <td>
                       {{$index + $emp_data->firstItem()}}
                       </td>
                   <td>{{$data->full_name}}</td>
                   <td>{{$data->company->company_name}}</td>
                   <td>{{$data->emp_email}}</td>
                   <td>{{$data->emp_phone}}</td>
                   <td>
                        <a class="btn btn-info" href="{{ route('employee.show',$data->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('employee.edit',$data->id) }}">Edit</a>
                        <a onclick="return confirm('Are you sure to delete this data?')" href="{{url('employee/'.$data->id.'/delete')}}" class="btn btn-danger">Delete</a>
                        {{-- <form action="{{ route('employee.destroy',$data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}

                    </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="col-md-12">{{$emp_data->appends(['sort'=>'date'])->links()}}</div>
          @else
            <div class="card-body">
                No data found
            </div>
          @endif
        </div>
        <!-- /.card -->


        <!-- /.card -->
      </div>

      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection
