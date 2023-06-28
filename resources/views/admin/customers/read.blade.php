@extends('admin.layout')
@section('data-view')

<div class="container-fluid">
  <div class="row text-center">
    <h3 class="mb-3">List customers</h3>
    <form class="col-12 mb-5 search-form" method="">
      @csrf
      <input type="search" name="search" placeholder="Tìm kiếm" autocomplete="off" class="input-search" name="search">
      <button class="btn-search" type="submit">Tìm Kiếm</button>
    </form>
  </div>
  <div class="row">
    <div class="col-2">
      <a href="{{ url("backend/customers") }}" class="btn btn-primary d-block">Reset
      </a>
    </div>
    <div class="col-2">
      <a href="{{ url("backend/customers/create") }}" class="btn btn-success d-block">Create</a>
    </div>
  </div>
  <div>
    {{ isset($msg) ? $msg : "" }}
  </div>
  <table class="table mt-3">
    <thead >
      <tr class="text-center table-primary ">
        <th class="col-4">Name</th>
        <th class="col-4">Email</th>
        <th class="col-4">Address</th>
        <th class="col-2">Edit</th>
        <th class="col-2">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($records as $row)
      <tr class="">
        <th scope="row">{{ $row->name }}</th>
        <td>{{ $row->email }}</td>
        <td>{{ $row->address }}</td>
        <td class="text-center"><a href="{{ url("backend/customers/edit/".$row->id) }}" class = "btn btn-primary">Edit</a></td>
        <td class="text-center"><a href="{{ url("backend/customers/delete/".$row->id) }}" onclick="return window.confirm('Are you sure?')" class = "btn btn-danger">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination">
    {{ $records->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection