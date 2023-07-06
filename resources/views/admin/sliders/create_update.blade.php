@extends('admin.layout')
@section('data-view')

<div class="container-fluid">
  <div class="card-body">
    <a href="{{ url("backend/") }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
      <img src="{{ asset("admin/images/logos/dark-logo.svg") }}" width="180" alt="">
    </a>
    <p class="text-center">Your Social Campaigns</p>
    <form method="post" action="{{ url("$action") }}" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label  class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ isset($record->name)?$record->name:"" }}">
      </div>
      <div class="mb-3">
        <label  class="form-label">Image</label>
        <input type="file" class="form-control" name="image" value="{{ isset($record->image)?$record->image:"" }}" >
      </div>
      <div class="mb-4">
        <label  class="form-label pr-2 d-inline-block">Active</label>
        <input type="checkbox" class="p-2" name="active" @if(isset($record->active))
          {{ $record->active === 1 ? "checked" : "" }}
        @endif>
      </div>
      <button type="submit"   class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Create</button>
    </form>
  </div>
</div>
@endsection