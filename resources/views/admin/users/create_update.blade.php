@extends('admin.layout')
@section('data-view')

<div class="container-fluid">
  <div class="card-body">
    <a href="{{ url("backend/") }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
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
        <label  class="form-label">Email Address</label>
        <input type="email" class="form-control" name="email" value="{{ isset($record->name)?$record->email:"" }}" >
      </div>
      <div class="mb-4">
        <label  class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Nếu không muốn đổi mật khẩu thì không điền vào ô này">
      </div>
      <button type="submit"   class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>
    </form>
  </div>
</div>
@endsection