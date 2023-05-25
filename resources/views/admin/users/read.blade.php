@extends('admin.layout')
@section('data-view')
<div class="container">
  <div class="row">
    <div class="col-2">
      <a href="{{ url("backend/users/create") }}" class="btn btn-success d-block">Create</a>
    </div>
  </div>
  <table class="table mt-3">
    <thead >
      <tr class="text-center table-primary ">
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($records as $row)
      <tr class="text-center">
        <th scope="row">{{ $row->name }}</th>
        <td>{{ $row->email }}</td>
        <td><a href="{{ url("backend/users/edit/".$row->id) }}" class = "btn btn-primary">Edit</a></td>
        <td><a href="{{ url("backend/users/delete/".$row->id) }}" onclick="return window.confirm('Are you sure?')" class = "btn btn-danger">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $records->render() }}
</div>
@endsection