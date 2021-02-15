@extends('layout')

@section('head')

<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endsection

@section('content')

<!--
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
-->

<div class="card push-top">
  <div class="card-header">
    Add Person
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('persons.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>

          <div class="form-group">
              <label for="deadline">Task Deadline</label>
              <input type="date" class="form-control" id ="deadline" name="deadline" value=""/>
          </div>

          <div class="form-check">
            <input type="checkbox" id="status" name="status" checked data-toggle="toggle" data-on="Completed" data-off="Not completed" data-onstyle="success" data-offstyle="danger" >
            <label class="form-check-label" for="status">Task status</label>
          </div>



          <button type="submit" class="btn btn-block btn-danger">Create User</button>
      </form>
  </div>
</div>
@endsection