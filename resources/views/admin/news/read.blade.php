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
                      <th style="width:100px;">Photo</th>
                      <th style="width:100px">Name</th>
                      <th style="width:300px">Description</th>
                      <th style="width:50px;">Hot</th>
                      <th style="width:100px;">Date</th>
                      <th style="width:50px;">Edit</th>
                      <th style="width:50px;">Delete</th>
                  </tr>
                  @foreach($data as $row)
                  <tr>
                      <td>
                        @if($row->photo != "" && file_exists('upload/news/'.$row->photo))
                        <img src="{{ asset('upload/news/'.$row->photo) }}" style="width:100%; height: 100px; object-fit: cover;">
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
                        <a href="{{ url('backend/news/update/'.$row->id) }}" class="btn btn-primary">Edit</a>&nbsp;
                      </td>
                      <td class="text-center">
                        <a href="{{ url('backend/news/delete/'.$row->id) }}"  class="btn btn-danger" onclick="return window.confirm('Are you sure?');">Delete</a>
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