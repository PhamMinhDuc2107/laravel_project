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
        <label  class="form-label">Code</label>
        <input type="text" class="form-control" name="code" value="{{ isset($record->code)?$record->code:"" }}">
      </div>
      <div class="mb-3">
        <label  class="form-label">Discount Amount </label>
        <input type="text" class="form-control" name="amount" value="{{ isset($record->discount_amount)?$record->discount_amount:"" }}" >
      </div>
      <div class="mb-3">
        <label  class="form-label"> Discount Percentage</label>
        <input type="text" class="form-control" name="percentage" value="{{ isset($record->discount_percentage)?$record->discount_percentage:"" }}" >
      </div>
      <div class="mb-4">
        <label  class="form-label">Quantity</label>
        <input type="text" class="form-control" name="quantity" value="{{ isset($record->quantity)?$record->quantity:"" }}" >
      </div>
      <div class="mb-4">
        <label  class="form-label">Time Start</label>
        <input type="datetime-local" class="form-control" name="time_start" value="{{ isset($record->time_start)?$record->time_start:"" }}" >
      </div>
      <div class="mb-4">
        <label  class="form-label">Time End</label>
        <input type="datetime-local" class="form-control" name="time_end" value="{{ isset($record->time_end)?$record->time_end:"" }}" >
      </div>
      <button type="submit" name="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Submit</button>
    </form>
  </div>
</div>
@endsection