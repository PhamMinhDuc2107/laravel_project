@extends('admin.layout')
@section('data-view')
<div class="container-fluid">
  <div class="row text-center">
    <h3 class="mb-3">List Coupons</h3>
    <form class="col-12 mb-5 search-form" method="">
      @csrf
      <input type="search" name="search" placeholder="Tìm kiếm" autocomplete="off" class="input-search" name="search">
      <button class="btn-search" type="submit">Tìm Kiếm</button>
    </form>
  </div>
  <div class="row">
    <div class="col-2">
      <a href="{{ url("backend/coupons") }}" class="btn btn-primary d-block">Reset
      </a>
    </div>
    <div class="col-2">
      <a href="{{ url("backend/coupons/create") }}" class="btn btn-success d-block">Create</a>
    </div>
  </div>
  <div>
    {{ isset($msg) ? $msg : "" }}
  </div>
  <table class="table mt-3 table-bordered table-hover">
    <thead >
      <tr class=" table-primary ">
        <th class="col-2">Code</th>
        <th class="col-2">Discount_Amount</th>
        <th class="col-2">Time_Start</th>
        <th class="col-2">Time_End</th>
        <th class="col-1">Quantity</th>
        <th class="col-1"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($records as $item)
      <tr class="">
        <th>{{ $item->code }}</th>
        <th>{{ number_format($item->discount_amount) }}d</th>
        <th>{{ $item->time_start }}</th>
        <th>{{ $item->time_end }}</th>
        <th>{{ $item->quantity }}</th>
        <td class="text-center">
          <a href="{{ url("backend/coupons/edit/".$item->id) }}" class = "bg-primary text-white rounded-2 px-2 py-1 text-4">
            <i class="ti ti-edit"></i>
          </a>
          <a href="{{ url("backend/coupons/delete/".$item->id) }}" onclick="return window.confirm('Are you sure?')" class = "mx-2 bg-danger text-white rounded-2 px-2 py-1 text-4">
            <i class="ti ti-trash"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination">
    {{-- {{ $records->links('pagination::bootstrap-4') }} --}}
  </div>
</div>
@endsection