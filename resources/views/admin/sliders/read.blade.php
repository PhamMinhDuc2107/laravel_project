@extends('admin.layout')
@section('data-view')

<div class="container-fluid">
  <div class="row text-center">
    <h3 class="mb-3">List Sliders</h3>
    <form class="col-12 mb-5 search-form" method="">
      @csrf
      <input type="search" name="search" placeholder="Tìm kiếm" autocomplete="off" class="input-search" name="search">
      <button class="btn-search" type="submit">Tìm Kiếm</button>
    </form>
  </div>
  <div class="row">
    <div class="col-2">
      <a href="{{ url("backend/sliders") }}" class="btn btn-primary d-block">Reset
      </a>
    </div>
    <div class="col-2">
      <a href="{{ url("backend/sliders/create") }}" class="btn btn-success d-block">Create</a>
    </div>
  </div>
  <div>
    {{ isset($msg) ? $msg : "" }}
  </div>
  <table class="table mt-3 table-bordered table-hover">
    <thead >
      <tr class="text-center table-primary ">
        <th class="col-2">Name</th>
        <th class="col-6">Images</th>
        <th class="col-1">Active</th>
        <th class="col-1"></th>
      </tr>
    </thead>
    <tbody>
      @if($data)
      @foreach ($data as $row)
      <tr class="">
        <td scope="row">{{ $row->name }}</td>
        <td class="text-center" style="height: 200px; overflow:hidden"><img style="width: 100%; height: 100%; object-fit:cover" src="{{ asset("upload/sliders/$row->images") }}" alt=""></td>
        <td>{!! isset($row->active) ? "<i class='fa-sharp fa-regular fa-square-check'></i>": "" !!}</td>
        <td class="text-center">
          <a href="{{ url("backend/sliders/edit/".$row->id) }}" class = "bg-primary text-white rounded-2 px-2 py-1 text-4">
            <i class="ti ti-edit"></i>
          </a>
        <a href="{{ url("backend/sliders/delete/".$row->id) }}" onclick="return window.confirm('Are you sure?')" class = "mx-2 bg-danger text-white rounded-2 px-2 py-1 text-4"><i class="ti ti-trash"></i></a></td>
      </tr>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  <div class="pagination">
    {{ $data->links('pagination::bootstrap-4')}}
  </div>
</div>
@endsection