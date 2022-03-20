@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">

          <div class="card-header">
            <a class="btn btn-success" href="company/create">Create New Company</a>

          </div>
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
             @endif
          <!-- /.card-header -->
          @if(count($company_data) > 0)
          <div class="card-body">
            <div>
                 <h3 class="card-title">Company List</h3>
            </div>
            <div class="dropdown-divider"></div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Logo</th>
                  <th>Website</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($company_data as $index =>$data)
                    <tr>
                   <td>{{$index + $company_data->firstItem()}}</td>
                   <td>{{$data->company_name}}</td>
                   <td>{{$data->company_email}}</td>
                   <td>
                     @if(isset($data->company_logo))

                         <img src="{{ asset('storage/uploads/'.$data->company_logo) }}" style="width: 50px; height: 50px">

                         @endif
                    </td>
                   <td>{{$data->company_website}}</td>
                   <td>
                        <a class="btn btn-info" href="{{ route('company.show',$data->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('company.edit',$data->id) }}">Edit</a>
                        <a onclick="return confirm('Are you sure to delete this data?')" href="{{url('company/'.$data->id.'/delete')}}" class="btn btn-danger">Delete</a>

                        {{-- <form action="{{ route('company.destroy',$data->id) }}" method="POST">
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
          <div class="col-md-12">{{$company_data->appends(['sort'=>'date'])->links()}}</div>
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
