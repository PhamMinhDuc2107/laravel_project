@extends("admin.layout")
@section("data-view")
<div class="container-fluid">
  <div class="col-md-12">
    <div class="row text-center">
      <h3 class="mb-3">List Products</h3>
      <form class="col-12 mb-5 search-form" method="">
        @csrf
        <input type="search" name="search" placeholder="Tìm kiếm" autocomplete="off" class="input-search" name="search">
        <button class="btn-search" type="submit">Tìm Kiếm</button>
      </form>
    </div>
    <div class="row">
      <div class="col-2">
        <a href="{{ url("backend/products") }}" class="btn btn-primary d-block">Reset
        </a>
      </div>
      <div class="col-2">
        <a href="{{ url("backend/products/create") }}" class="btn btn-success d-block">Create</a>
      </div>
      <div>
        {{ isset($msg) ? $msg : "" }}
      </div>
    </div>
          <table class="table table-bordered mt-3 p-2">
              <tr class="table-primary">
                  <th style="width: 150px">Photo</th>
                  <th style="width: 250px">Name</th>
                  <th style="width: 100px">Category</th>
                  <th style="width: 100px">Brand</th>
                  <th style="width: 100px">Price</th>
                  <th style="width: 80px">Discount</th>
                  <th style="width: 80px">Hot</th>
                  <th style="width:80px">Edit</th>
                  <th style="width:80px">Delete</th>
              </tr>
              @foreach($data as $row)
              <tr>
                  <td >
                    @if($row->photo != "" && file_exists('upload/products/'.$row->photo))
                      <img src="{{ asset("upload/products/$row->photo") }}" alt="" style="width:100px;">
                    @endif  
                  </td>
                  <td style="
                  display: -webkit-box;
                  -webkit-box-orient: vertical;
                  -webkit-line-clamp: 4;
                  overflow: hidden;
                  text-overflow: ellipsis;
                  height: 100px
                  ">{{ $row->name }}</td>
                  <td>
                    {{ App\Http\Controllers\Components\StaticController::getCategoryName($row->category_id) }}
                  </td>
                  <td>
                    {{ App\Http\Controllers\Components\StaticController::getBrandName($row->brand_id) }}
                  </td>
                  <td >{{ number_format($row->price)  }}</td>
                  <td style="text-align:center">{{ $row->discount }}%</td>
                  <td style="text-align:center">
                  @if ($row->hot==1)
                  <i class="fa-sharp fa-regular fa-square-check"></i>
                  @endif
                  </td>
                  <td class="text-center">
                    <a href="{{ url('backend/products/update/'.$row->id) }}" class="btn btn-primary">Edit</a>&nbsp;
                  </td>
                  <td class="text-center">
                    <a href="{{ url('backend/products/delete/'.$row->id) }}"  class="btn btn-danger" onclick="return window.confirm('Are you sure?');">Delete</a>
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
<style>
  td img {
    max-width: 100px;
    
  }
</style>
@endsection
