@extends("admin.layout")
@section("data-view")
    <div class="container-fluid">
      <div class="col-md-12">
        <div class="row text-center">
          <h3 class="mb-3">List News</h3>
          <form class="col-12 mb-5 search-form" method="">
            @csrf
            <input type="search" name="search" placeholder="Tìm kiếm" autocomplete="off" class="input-search" name="search">
            <button class="btn-search" type="submit">Tìm Kiếm</button>
          </form>
        </div>
        <div class="row">
          <div class="col-2">
            <a href="{{ url("backend/news") }}" class="btn btn-primary d-block">Reset
            </a>
          </div>
          <div class="col-2">
            <a href="{{ url("backend/news/create") }}" class="btn btn-success d-block">Create</a>
          </div>
        </div>
        <div>
          {{ isset($msg) ? $msg : "" }}
        </div>
      <div class="panel panel-primary mt-3">
          <div class="panel-body">
              <table class="table table-bordered table-hover">
                  <tr class="table-primary">
                      <th style="col-1">Photo</th>
                      <th class="col-2">Name</th>
                      <th class="col-3">Description</th>
                      <th class="col-1">Hot</th>
                      <th class="col-2">Date</th>
                      <th ></th>
                  </tr>
                  @foreach($data as $row)
                  <tr>
                      <td class="text-center">
                        @if($row->photo != "" && file_exists('upload/news/'.$row->photo))
                        <img src="{{ asset('upload/news/'.$row->photo) }}" style=" height: 100px; object-fit: cover;">
                        @endif
                      </td>
                      <td style="">{{ $row->name }}</td>
                      <td style="display: -webkit-box;
                      -webkit-box-orient: vertical;
                      -webkit-line-clamp: 3;
                      overflow: hidden;
                      text-overflow: ellipsis;
                      height: 120px">{!! $row->description !!}</td>
                      <td style="text-align:center;">
                        @if($row->hot == 1)
                        <i class="fa-sharp fa-regular fa-square-check"></i>
                        @endif
                      </td>
                      <td>{{ date("d/m/Y", strtotime($row->date)) }}</td>
                      <td class="text-center">
                        <a href="{{ url("backend/news/edit/".$row->id) }}" class = "bg-primary text-white rounded-2 px-2 py-1 text-4">
                          <i class="ti ti-edit"></i>
                        </a>
                        <a href="{{ url("backend/news/delete/".$row->id) }}" onclick="return window.confirm('Are you sure?')" class = "mx-2 bg-danger text-white rounded-2 px-2 py-1 text-4">
                          <i class="ti ti-trash"></i>
                        </a>
                      </td>
                  </tr>
                  @endforeach
              </table>
              <div class="pagination">
                {{ $data->links('pagination::bootstrap-4') }}
              </div>
          </div>
      </div>
  </div>
    </div>
@endsection