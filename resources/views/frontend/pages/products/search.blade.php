@extends('frontend.layout_cart')
@section('data-view')
<div class="main">
  <div class="container">
    <div class="main-container">
      <!-- category-products -->
      <div class="category-products">
        <h3 style=
        "margin-bottom:20px;
        font-size:18px;
        ">Có {{ $records }} kết quả phù hợp</h3>
        <!-- products -->
        <div class="productsShop">
          <div class="productShop-list">
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
                      <a href="">
                        <i class="fa fa-search overplay-product-icon icon-viewProduct"
                        data-tooltip="Tìm kiếm"></i>
                      </a>
                      <a href="{{ asset('cart/buy/'.$item->id)}} ">
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
                  <span class="product-price-old">{{ number_format($item->price) }}</span>
                  <span class="product-price">{{  number_format((float)$item->price - ((float)$item->price * (float)$item->discount / 100)) }}</span>
                  @else
                  <span class="product-price">{{ number_format((float)$item->price) }}</span>
                  @endif
                </a>
              </a>
            </li>
            {{-- product-item --}} 
            @endforeach
          </div>
          <div class="pagination">
            {{ $data->links('pagination::bootstrap-4') }}
          </div>
        </div>
        <!-- /products -->
      </div>
      <!-- category-products -->
      <!-- sideBar -->
      <div class="sideBar">
        <div class="sideBar-title">
          <h2>Tìm theo</h2>
        </div>
        <div class="sideBar-list">
          <ul class="sideBar-item">
            <h3 class="sideBar-item-title">Khoảng giá</h3>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="1" />
              <label for="1">Giá dưới 100.000đ</label>
            </li>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="2" />
              <label for="2">100.000đ - 200.000đ</label>
            </li>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="3" />
              <label for="3">200.000đ - 300.000đ</label>
            </li>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="4" />
              <label for="4">300.000đ - 400.000đ</label>
            </li>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="5" />
              <label for="5">400.000đ - 500.000đ</label>
            </li>
            <li class="sideBar-aside-item">
              <input type="checkbox" name="" id="6" />
              <label for="6">Giá trên 1.000.000đ</label>
            </li>
          </ul>
          <ul class="sideBar-item">
            <h3 class="sideBar-item-title">Thương hiệu</h3>
            <ul class="sideBar-aside">
              @if (isset($brands))
                @foreach ($brands as $item)
                <li class="sideBar-aside-item">
                  <a href="#">
                    <input type="checkbox" name="" id="{{ $item->name }}" />
                    <label for="{{ $item->name }}">{{ $item->name }}</label>
                  </a>
                </li>
                @endforeach
              @endif
            </ul>
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
        </div>
      </div>
      <!-- /sideBar -->
    </div>
  </div>
</div>
  <!-- /main -->
@endsection
