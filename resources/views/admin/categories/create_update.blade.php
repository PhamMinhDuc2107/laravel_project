@extends('admin.layout')
@section('data-view')
<div class="card-body">
  <a href="{{ url("backend") }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
    <img src="{{ asset("admin/images/logos/dark-logo.svg") }}" width="180" alt="">
  </a>
  <p class="text-center">Your Social Campaigns</p>
  <form method="post" action="{{ url("$action") }}">
    @csrf
    <div class="mb-3">
      <label  class="form-label">Name</label>
      <input type="text" class="form-control" name="name" value="{{ isset($record->name)?$record->name:"" }}">
    </div>
    <div class="mb-3">
      <label  class="form-label">SubCategoris</label>
      <input type="text" class="form-control" name="subCate" value="{{ isset($record->name)?$record->email:"" }}" >
    </div>
    <button type="submit"  class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Insert</button>
  </form>
</div>
@endsection