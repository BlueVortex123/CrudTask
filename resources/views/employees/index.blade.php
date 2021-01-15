@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Employees</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First name</td>
          <td>Last name</td>
          <td>Email</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->first_name}} {{ $employee->last_name }}</td>
            <td>{{ $employee->email }}</td>
            
            <!--<td>{{ $employee->completed }}</td>
            <td>{{ $employee->timestamps}}</td> -->
           
            <td>
                <a href="{{ route('employees.edit',$employee->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection

<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>


<div>
    <a style="margin: 19px;" href="{{ route('employees.create')}}" class="btn btn-primary">New employee</a>
    </div>  