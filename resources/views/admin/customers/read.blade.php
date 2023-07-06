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
  <table class="table mt-3 table-bordered table-hover">
    <thead >
      <tr class=" table-primary ">
        <th class="col-1">Name</th>
        <th class="col-1">Email</th>
        <th class="col-3">Address</th>
        <th class="col-1">Phone</th>
        <th class="col-2">Image</th>
        <th class=""></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($records as $row)
      <tr class="">
        <td class="col-2">{{ $row->name }}</td>
        <td class="col-2">{{ $row->email }}</td>
        <td class="col-3">{{ $row->address }}</td>
        <td class="col-1">{{ $row->phone }}</td>
        <td class="col-2">{{ $row->image }}</td>
        <td class="text-center">
          <a href="{{ url("backend/customers/edit/".$row->id) }}" class = "bg-primary text-white rounded-2 px-2 py-1 text-4">
            <i class="ti ti-edit"></i>
          </a>
          <a href="{{ url("backend/customers/delete/".$row->id) }}" onclick="return window.confirm('Are you sure?')" class = "mx-2 bg-danger text-white rounded-2 px-2 py-1 text-4">
            <i class="ti ti-trash"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination">
    {{ $records->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection