@extends('admin.layout')
@section('data-view')

<div class="container-fluid">
  <div class="card-body">
    <a href="{{ url("backend") }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
      <img src="{{ asset("admin/images/logos/dark-logo.svg") }}" width="180" alt="">
    </a>
    <p class="text-center">Your Social Campaigns</p>
    <form method="post" action="{{ url("$action") }}">
      @csrf
        @php
        if(isset($record->id))
            $categories = DB::table("categories")->where("parent_id","=","0")->where("id","<>",$record->id)->orderBy("id","desc")->get();
        else
            $categories = DB::table("categories")->where("parent_id","=","0")->orderBy("id","desc")->get();
        @endphp
        <h4 class="mb-2 fs-5">Parent</h4>
        <select name="parent_id" class="form-control mb-2" style="width:250px;">
            <option value="0"></option>
            @foreach($categories as $row)
            <option @if(isset($record->parent_id) && $record->parent_id == $row->id) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
        <h4 class="mb-2 fs-5">Name</h4>
        <input type="text" value="{{ isset($record->name)?$record->name:'' }}" name="name" class="form-control mb-2" required>
          <div class="d-flex align-items-center gap-3">
            <h4 class="mb-2 fs-5">Display at home page</h4>
            <input type="checkbox"
              @if (isset($record->display_at_home_page))
                {{ $record->display_at_home_page == 1 ? "checked" : ""}}
            @endif
            name="hot" class=" mb-2">
          </div>
      <button type="submit"  class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Create</button>
    </form>
  </div>
</div>
@endsection