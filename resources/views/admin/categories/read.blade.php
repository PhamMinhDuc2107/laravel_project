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
        <th scope="col-6">Name</th>
        <th scope="col-4"> SubCategoris</th>
        <th scope="col-1">Edit</th>
        <th scope="col-1">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $row)
        <tr class="text-center">
          @if ($row->parent_id == 0)
            <td scope="row">{{$row->name}}</td>
            <td></td>
            <td></td>
            <td></td>
        @endif
      @foreach ($subCategories as $subCate)
        @if ($row->id === $subCate->parent_id)
          <tr class="text-center">
            <td></td>
            <td scope="row ">
            {{$subCate->name}}
            <td><a href="{{ url("backend/categories/edit/".$row->id) }}" class = "btn btn-primary">Edit</a></td>
            <td><a href="{{ url("backend/categories/delete/".$row->id) }}" onclick="return window.confirm('Are you sure?')" class = "btn btn-danger">Delete</a></td>
            </td>
          </tr>
        @endif
      @endforeach 
      @endforeach

      
      
      
    </tbody>
  </table>
  {{ $categories->render() }}
</div>
@endsection