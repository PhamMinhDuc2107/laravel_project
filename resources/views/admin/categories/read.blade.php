@extends('admin.layout')
@section('data-view')
@php
    use App\Http\Controllers\Components;
@endphp
<div class="container-fluid">
  <div class="row text-center">
    <h3 class="mb-3">List Categories</h3>
    <form class="col-12 mb-5 search-form" method="">
      @csrf
      <input type="search" name="search" placeholder="Tìm kiếm" autocomplete="off" class="input-search" name="search">
      <button class="btn-search" type="submit">Tìm Kiếm</button>
    </form>
  </div>
  <div class="row">
    <div class="col-2">
      <a href="{{ url("backend/categories") }}" class="btn btn-primary d-block">Reset
      </a>
    </div>
    <div class="col-2">
      <a href="{{ url("backend/categories/create") }}" class="btn btn-success d-block">Create</a>
    </div>
  </div>
  <div>
    {{ isset($msg) ? $msg : "" }}
  </div>
  <table class="table mt-3 table-hover table-bordered">
    <thead >
      <tr class="text-center table-primary ">
        <th class="col-6">Name</th>
        <th class="col-2">Display_at_home_page</th>
        <th class="col-1">Edit</th>
        <th class="col-1">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $row)
        <tr>
            <td>{{ $row->name }}</td>
            <td class="text-center">
              @if ($row->display_at_home_page == 1)
              <i class="fa-sharp fa-regular fa-square-check"></i>
              @endif
            </td>
            <td class="text-center">
              <a href="{{ url('backend/categories/edit/'.$row->id) }}" class="btn btn-primary">Edit</a>&nbsp;
            </td>
            <td class="text-center"><a href="{{ url('backend/categories/delete/'.$row->id) }}" onclick="return window.confirm('Are you sure?');" class="btn btn-danger">Delete</a></td>
        </tr>
        @php
        $subCategories = DB::table("categories")->where("parent_id","=",$row->id)->orderBy("id","desc")->get();
        @endphp
        @if ($search === "") 
        @foreach($subCategories as $rowSub)
        <tr>
            <td style="padding-left: 50px;">{{ $rowSub->name }}</td>
            <td class="text-center">
              @if ($rowSub->display_at_home_page == 1)
              <i class="fa-sharp fa-regular fa-square-check"></i>
              @endif
            </td>
            <td  class="text-center">
              <a href="{{ url('backend/categories/edit/'.$rowSub->id) }}" class="btn btn-primary">Edit</a>&nbsp;
            </td>
            <td  class="text-center"><a href="{{ url('backend/categories/delete/'.$rowSub->id) }}" onclick="return window.confirm('Are you sure?');" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach   
        @endif 
        @endforeach
    </tbody>
  </table>
  <div class="pagination">
    {{ $data->links('pagination::bootstrap-4') }}
  </div>
</div>
<style>
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box
  }
</style>
@endsection