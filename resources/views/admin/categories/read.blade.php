@extends('admin.layout')
@section('data-view')
<div class="container">
  <h3 class="text-center">List Categories</h3>
  <div class="row">
    <div class="col-2">
      <a href="{{ url("backend/categories/create") }}" class="btn btn-success d-block">Create</a>
    </div>
  </div>
  <table class="table mt-3">
    <thead >
      <tr class="text-center table-primary ">
        <th class="col-6">Name</th>
        <th class="col-1">Edit</th>
        <th class="col-1">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $row)
        <tr>
            <td>{{ $row->name }}</td>
            <td class="text-center">
              <a href="{{ url('backend/categories/edit/'.$row->id) }}" class="btn btn-primary">Edit</a>&nbsp;
            </td>
            <td class="text-center"><a href="{{ url('backend/categories/delete/'.$row->id) }}" onclick="return window.confirm('Are you sure?');" class="btn btn-danger">Delete</a></td>
        </tr>
        @php
        $subCategories = DB::table("categories")->where("parent_id","=",$row->id)->orderBy("id","desc")->get();
        @endphp
        @foreach($subCategories as $rowSub)
        <tr>
            <td style="padding-left: 30px;">{{ $rowSub->name }}</td>
            <td  class="text-center">
              <a href="{{ url('backend/categories/edit/'.$rowSub->id) }}" class="btn btn-primary">Edit</a>&nbsp;
            </td>
            <td  class="text-center"><a href="{{ url('backend/categories/delete/'.$rowSub->id) }}" onclick="return window.confirm('Are you sure?');" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach
        @endforeach
    </tbody>
  </table>
  {{ $data->render() }}
</div>
@endsection