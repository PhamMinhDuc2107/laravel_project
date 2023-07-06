@extends('frontend.layout_cart')
@section('title')
    {{ isset($name) ? $name : "Tất cả sản phẩm" }}
@endsection
@section('data-view')
<!-- main -->
<div class="main">
  <div class="container">
    <div class="main-container">
      <!-- category-products -->
      <div class="category-products">
        <!-- sortBar -->
        <div class="sortBar">
          <div class="sortBar-left">
            <h4>
              @if (isset($name))
                {{ $name }}
              @else
              Tất cả sản phẩm
              @endif
              <span>( {{ isset($count) ? $count : 0 }} sản phẩm ) </span>
            </h4>
          </div>
          <div class="sortBar-right">
            <span>Sắp xếp:</span>
            <select class="sortBar-select" onchange="location.href ='{{ url($urlName.'?order=') }}'+this.value">
              <option value="0">Sắp xếp</option>
              <option @if($order == 'priceAsc') selected @endif value="priceAsc">Giá tăng dần</option>
              <option @if($order == 'priceDesc') selected @endif value="priceDesc">Giá giảm dần</option>
              <option @if($order == 'nameAsc') selected @endif value="nameAsc">Sắp xếp A-Z</option>
              <option @if($order == 'nameDesc') selected @endif value="nameDesc">Sắp xếp Z-A</option>
            </select>
          </div>
        </div>
        <!-- /sortBar -->
        <!-- products -->
        <div class="productsShop">
          <div class="productShop-list">
              @if (isset($data))
              @foreach ($data as $item)
            {{-- product-item --}}
          <li>
            <div href="" class="productShop-item">
              <div class="product-item-img">
                @if ($item->discount != null)
                <span class="product-item-sale">- {{ $item->discount }}%</span>
                @endif
                <div class="product-item-content">
                  <img src="{{ asset("upload/products/$item->photo") }}"
                    alt="" />
                  <div class="overplay-product">
                    <a href="{{ url("#") }}"><i class="fa fa-search overplay-product-icon icon-viewProduct"
                      data-tooltip="Tìm kiếm"></i></a>
                    <a href="{{ asset('cart/buy/'.$item->id) }}">
                      <i class="fa-solid fa-cart-shopping overplay-product-icon"
                      data-tooltip="Giỏ hàng"></i>
                    </a>
                  </div>
                </div>
              </div>
              <a class="product-info" href="{{ url("products/detail/$item->id")}}">
                <span class="product-info-name">
                {{ App\Http\Controllers\Components\StaticController::getCategory($item->brand_id)->name }}  
                </span>
                <h4 class="product-info-title">
                  {{ $item->name }}
                </h4>
                @if ($item->discount != null )
                <div>
                  <span class="product-price-old">{{ number_format((float)$item->price + ((float)$item->price * (float)$item->discount / 100)) }}đ</span>
                <span class="product-price">{{ number_format($item->price)  }}đ</span>
                </div>
                @else
                <span class="product-price">{{ number_format((float)$item->price) }}đ</span>
                @endif
              </a>
            </a>
          </li>
            {{-- product-item --}} 
            @endforeach
            @endif
          </div>
        </div>
        <!-- /products -->
        <div class="pagination">
          {{ $data->links('pagination::bootstrap-4') }}
        </div>
      </div>
      <!-- category-products -->
      <!-- sideBar -->
      <div class="sideBar">
        <div class="sideBar-title">
          <h2>Tìm theo</h2>
        </div>
        <form class="sideBar-list" method="get" action="" >
          <button type="submit" name="search" class="sideBar-list-btn">Tìm kiếm</button>
          <div class="sideBar-item" >
            @csrf
            <p style="margin-bottom: 10px">
              <label for="amount"></label>
              <input type="text" id="amount" readonly style="border:0; color:#2875d3; font-weight:bold;">
              <input type="hidden" name="start_price" id="start_price">
              <input type="hidden" name="end_price" id="end_price">
            </p>
            <div id="slider-range"></div>
          </div>
          
          <script>
          $( function() {
            $( "#slider-range" ).slider({
              range: true,
              min: {{isset($min_price) ? $min_price : 0}},
              max: {{ isset($max_price) ? $max_price : 1000000 }},
              step: 100000,
              values: [ {{ isset($min_price) ? $min_price : 0 }}, {{ isset($max_price) ? $max_price : 1000000 }} ],
              slide: function( event, ui ) {
                $( "#amount" ).val( "đ" + ui.values[ 0 ] + " - đ" + ui.values[ 1 ] );
                $("#start_price").val(ui.values[0]);
                $("#end_price").val(ui.values[1]);
              }
            });
            $( "#amount" ).val( "đ" + $( "#slider-range" ).slider( "values", 0 ) +
              " - đ" + $( "#slider-range" ).slider( "values", 1 ) );
          } );
          </script>
          <ul class="sideBar-item">
            <h3 class="sideBar-item-title">Thương hiệu</h3>
            <div class="sideBar-aside">
              @if ($brand)
                @foreach ($brand as $item)
                <li class="sideBar-aside-item">
                  <a href="#">
                    <input type="checkbox" name="filterBrand[]" id="{{ $item->name }}" value="{{ $item->id }}" class="filter-name"
                    />
                    <label for="{{ $item->name }}">{{ $item->name }}</label>
                  </a>
                </li>
                @endforeach
              @endif
            </div>
          </ul>
          <ul class="sideBar-item">
            <h3 class="sideBar-item-title">Màu sắc</h3>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="Yellow" />
              <label for="Yellow">Vàng</label>
            </li>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="Purple" />
              <label for="Purple">Tím</label>
            </li>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="Red" />
              <label for="Red">Đỏ</label>
            </li>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="green" />
              <label for="green">Xanh</label>
            </li>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="Pink" />
              <label for="Pink">Hồng</label>
            </li>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="orange" />
              <label for="orange">Cam</label>
            </li>
          </ul>
          <div class="sideBar-banner">
            <img src="./public/images/banner_sidebar_collection (1).webp"
              alt="" />
            <div class="overplay-hover">
              <img src="./public/images/icon-plus.png" alt=""
                class="overplay-hover-icon" />
            </div>
          </div>
        </form>
      </div>
      <!-- /sideBar -->
    </div>
  </div>
</div>
  <!-- /main -->
  
@endsection
@section('js')
    <script src="{{ asset("frontend/js/products.js") }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@endsection