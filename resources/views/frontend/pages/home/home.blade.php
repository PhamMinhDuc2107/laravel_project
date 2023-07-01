@extends('frontend.layout_home')
@section("data-view")
<!-- productMobile -->
<div class="product">
  <div class="container">
    <div class="product-container">
            <!-- product nav -->
      <div class="product-nav productMobile-color">
        <h3 class="product-nav-title">Điện thoại</h3>
        <ul class="product-nav-list">
          <li class="product-nav-item">
            <a href="{{ url("") }}" class="product-nav-link">Trang chủ</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ url('products') }}" class="product-nav-link">Sản phẩm</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ url('blog') }}" class="product-nav-link">Blog</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ url("/introduce") }}" class="product-nav-link">Giới thiệu</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ url('contact') }}" class="product-nav-link">Liện hệ</a>
          </li>
        </ul>
      </div>
      <!-- /product-nav -->
      <!-- product-list -->
      <div class="product-list">
          <a class="product-banner">
          <img
            src="{{ asset('frontend/images/collection_module_1_banner.webp') }}"
            alt=""
            class="product-banner-img"
          />
          <div class="overplay-hover">
            <img
              src="{{ asset('frontend/images/icon-plus.png') }}"
              alt=""
              class="overplay-hover-icon"
            />
          </div>
          </a>
          @foreach ($products[0] as $data)
          <div class="product-item" >
            <div class="product-item-img">
              @if ($data->discount > 0)
              <span class="product-item-sale">-{{ $data->discount }}%</span>
              @endif
              <div class="product-item-content">
                <a href="{{ url('products/detail/'.$data->id) }}">
                  <img
                  src="{{ asset('upload/products/'.$data->photo) }}"
                  alt=""
                /></a>
                
                <div class="overplay-product">
                    <a href="">
                      <i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"
                    ></i>
                    </a>
                    <a href="{{ asset('cart/buy/'.$data->id) }}">
                      <i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"
                      ></i>
                    </a>
                </div>
              </div>
            </div>
            <a class="product-info" href="{{ url('products/detail/'.$data->id) }}">
              <span class="product-info-name">{{ App\Http\Controllers\Components\StaticController::getBrandName($data->brand_id) }}</span>
              <h4 class="product-info-title">{{ $data->name }}</h4>
              @if ($data->discount != 0)
              <div>
                <span class="product-price-old">{{ number_format($data->price + ($data->price * $data->discount / 100)) }}đ</span>
                <span class="product-price">{{ number_format($data->price) }}đ</span>
              </div>
              @else
                <span class="product-price">{{ number_format($data->price) }}đ</span>
              @endif
            </a>
          </div>
          @endforeach
        </div>
      <!-- /product-list -->  
      @include('frontend.blocks.brand')
    </div>
  </div>
</div>
<!-- /productMobile -->
{{-- banner  --}}
@include('frontend.blocks.banner')
{{-- /banner  --}}
<!-- productLaptop -->
<div class="product">
  <div class="container">
    <div class="product-container">
      <!-- product nav -->
      <div class="product-nav productLaptop-color">
        <h3 class="product-nav-title">Macbook-Laptop</h3>
        <ul class="product-nav-list">
          <li class="product-nav-item">
            <a href="{{ url("products") }}" class="product-nav-link">Tất cả sản phẩm</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ url('products/news') }}" class="product-nav-link">Sản phẩm mới</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ asset("products/hot") }}" class="product-nav-link">Sản phẩm nổi bật</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ asset("products/sale") }}" class="product-nav-link">Sản phẩm khuyến mãi</a>
          </li>
        </ul>
      </div>
      <!-- /product-nav -->
      <!-- product-list -->
      <div class="product-list">
        <a class="product-banner">
          <img
            src="{{ asset("frontend/images/bannreLaptop.webp") }}"
            alt=""
            class="product-banner-img"
          />

          <div class="overplay-hover">
            <img
              src="{{ asset('frontend/images/icon-plus.png') }}"
              alt=""
              class="overplay-hover-icon"
            />
          </div>
        </a>
        @foreach ($products[1] as $data)
          <div class="product-item" >
            <div class="product-item-img">
              @if ($data->discount > 0)
              <span class="product-item-sale">-{{ $data->discount }}%</span>
              @endif
              <div class="product-item-content">
                <a href="{{ url('products/detail/'.$data->id) }}">
                  <img
                  src="{{ asset('upload/products/'.$data->photo) }}"
                  alt=""
                /></a>
                
                <div class="overplay-product">
                    <a href="">
                      <i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"
                    ></i>
                    </a>
                    <a href="{{ asset('cart/buy/'.$data->id) }}">
                      <i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"
                      ></i>
                    </a>
                </div>
              </div>
            </div>
            <a class="product-info" href="{{ url('products/detail/'.$data->id) }}">
              <span class="product-info-name">{{ App\Http\Controllers\Components\StaticController::getBrandName($data->brand_id) }}</span>
              <h4 class="product-info-title">{{ $data->name }}</h4>
              @if ($data->discount != 0)
              <div>
                <span class="product-price-old">{{ number_format($data->price + ($data->price * $data->discount / 100)) }}đ</span>
                <span class="product-price">{{ number_format($data->price) }}đ</span>
              </div>
              @else
              <span class="product-price">{{ number_format($data->price) }}đ</span>
              @endif
            </a>
          </div>
          @endforeach
      </div>
      <!-- /product-list -->
    </div>
    <div class="productLaptop-banner">
      <a href="#" class="productLaptop-banner-item">
        <img
          src="{{ asset("frontend/images/bannerLaptop1.webp") }}"
          alt=""
          class="productLaptop-banner-img"
        />
        <div class="overplay-hover">
          <img
            src="{{ asset('frontend/images/icon-plus.png') }}"
            alt=""
            class="overplay-hover-icon"
          />
        </div>
      </a>
      <a href="#" class="productLaptop-banner-item">
        <img
          src="{{ asset("frontend/images/bannerLaptop2.webp") }}"
          alt=""
          class="productLaptop-banner-img"
        />
        <div class="overplay-hover">
          <img
            src="{{ asset("frontend/images/icon-plus.png") }}"
            alt=""
            class="overplay-hover-icon"
          />
        </div>
      </a>
    </div>
  @include('frontend.blocks.brand')
  </div>
</div>
<!-- /productLaptop -->
{{-- brand --}}
{{-- /brand --}}
<!-- productLaptop -->
<div class="product">
  <div class="container">
    <div class="product-container">
      <!-- product nav -->
      <div class="product-nav productAccessory-color">
        <h3 class="product-nav-title">Phụ kiện</h3>
        <ul class="product-nav-list">
          <li class="product-nav-item">
            <a href="{{ url("products") }}" class="product-nav-link">Tất cả sản phẩm</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ url('products/news') }}" class="product-nav-link">Sản phẩm mới</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ asset("products/hot") }}" class="product-nav-link">Sản phẩm nổi bật</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ asset("products/sale") }}" class="product-nav-link">Sản phẩm khuyến mãi</a>
          </li>
        </ul>
      </div>
      <!-- /product-nav -->
      <!-- product-list -->
      <div class="product-list">
        <a class="product-banner">
          <img
            src="{{ asset("frontend/images/bannreLaptop.webp") }}"
            alt=""
            class="product-banner-img"
          />

          <div class="overplay-hover">
            <img
              src="{{ asset('frontend/images/icon-plus.png') }}"
              alt=""
              class="overplay-hover-icon"
            />
          </div>
        </a>
        @foreach ($products[2] as $data)
          <div class="product-item" >
            <div class="product-item-img">
              @if ($data->discount > 0)
              <span class="product-item-sale">-{{ $data->discount }}%</span>
              @endif
              <div class="product-item-content">
                <a href="{{ url('products/detail/'.$data->id) }}">
                  <img
                  src="{{ asset('upload/products/'.$data->photo) }}"
                  alt=""
                /></a>
                
                <div class="overplay-product">
                    <a href="">
                      <i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"
                    ></i>
                    </a>
                    <a href="{{ asset('cart/buy/'.$data->id) }}">
                      <i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"
                      ></i>
                    </a>
                </div>
              </div>
            </div>
            <a class="product-info" href="{{ url('products/detail/'.$data->id) }}">
              <span class="product-info-name">{{ App\Http\Controllers\Components\StaticController::getBrandName($data->brand_id) }}</span>
              <h4 class="product-info-title">{{ $data->name }}</h4>
              @if ($data->discount != 0)
              <div>
                <span class="product-price-old">{{ number_format($data->price + ($data->price * $data->discount / 100)) }}đ</span>
                <span class="product-price">{{ number_format($data->price) }}đ</span>
              </div>
              @else
              <span class="product-price">{{ number_format($data->price) }}đ</span>
              @endif
            </a>
          </div>
          @endforeach
      </div>
      <!-- /product-list -->
    </div>
  </div>
</div>
<!-- /productLaptop -->
<div class="container">
  <div class="banner-full">
    <a href="#">
      <img src="frontend/images/bannerFull.webp" alt=""
        class="banner-full-img" />
      <div class="overplay-hover">
        <img src="frontend/images/icon-plus.png" alt=""
          class="overplay-hover-icon" />
      </div>
    </a>
  </div>
</div>
<!-- /productAccessory -->
@include("frontend.blocks.service")
@endsection