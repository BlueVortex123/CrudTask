@extends('layout')

@section('content')

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Task status</td>
          <td>Deadline</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
  
        @foreach($people as $peoples)        
          
            <tr>
                <td>{{$peoples->id}}</td>
                <td>{{$peoples->name}}</td>
                <td>{{$peoples->email}}</td>
                <td>{{$tasks -> status}}</td>
                 <td>{{$tasks-> deadline}}</td>
     
                <td class="text-center">
                    <a href="{{ route('persons.edit', $peoples-> id )}}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('persons.destroy', $peoples->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                      </form>
                </td>
            </tr>
          @endforeach
        </tbody>
  </table>
<div>
@endsection