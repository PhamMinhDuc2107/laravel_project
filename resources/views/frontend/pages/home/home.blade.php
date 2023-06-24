@extends('frontend.layout_home')
@section("data-view")
<!-- productMobile -->
<div class="product">
  <div class="container">
    <div class="product-container">
      {{-- Điện thoại --}}
      <!-- product nav -->
      <div class="product-nav productMobile-color">
        <h3 class="product-nav-title">Điện thoại</h3>
        <ul class="product-nav-list">
          <li class="product-nav-item">
            <a href="{{ url("") }}" class="product-nav-link">Trang
              chủ</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ url("/products") }}"
              class="product-nav-link">Sản phẩm</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ url("/blog") }}"
              class="product-nav-link">Blog</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ url('/news') }}" class="product-nav-link">Giới thiệu</a>
          </li>
          <li class="product-nav-item">
            <a href="{{ url("/contact") }}" class="product-nav-link">Liện hệ</a>
          </li>
        </ul>
      </div>
      <!-- /product-nav -->
      {{-- product-list --}}
      <div class="product-list">
        <a class="product-banner">
          <img src="frontend/images/collection_module_1_banner.webp" alt=""
            class="product-banner-img" />
          <div class="overplay-hover">
            <img src="frontend/images/icon-plus.png" alt=""
              class="overplay-hover-icon" />
          </div>
        </a>
        @foreach ($products as $item)
        {{-- products-item --}}
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            @if ($item->discount > 0) 
            <span class="product-item-sale">{{ $item->discount }}%</span>
            @endif
            <div class="product-item-content">
              <img src="{{ asset("upload/products/$item->photo") }}" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="{{ asset('cart/buy/'.$item->id)}}"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <a class="product-info" href="{{ url("products/detail/$item->id") }}"> 
            <span class="product-info-name">{{ 
              App\Http\Controllers\Components\StaticController::getCategoryName($item->brand_id) }}</span>
            <h4 class="product-info-title">{{ $item->name }}</h4>
              @if($item->discount > 0)
              <div><span class="product-price-old">{{ number_format($item->price) }}đ</span>
                @endif()
                <span class="product-price">{{  number_format( $item->price - ($item->price * ($item->discount / 100))) }}đ</span></div>
          </a>
        </div>
        {{-- /products-item --}}
        @endforeach
      </div>
      {{-- /product-list --}}
      <!-- product-brand -->
      <div class="product-brand">
        <a href="" class="product-brand-item">
          <img src="frontend/images/Iphone.webp" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="frontend/images/samsung.webp" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="frontend/images/mi.png" alt="" class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="frontend/images/oppo.png" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="frontend/images/LG.png" alt="" class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="frontend/images/VIVO.webp" alt=""
            class="product-brand-img" />
        </a>
      </div>
      <!-- /product-brand -->
    </div>
  </div>
</div>
<!-- /productMobile -->
<!-- Banner -->
<div class="banner">
  <div class="container">
    <div class="banner-container">
      <a class="banner-item">
        <img src="frontend/images/banner1.webp" alt=""
          class="banner-item-img" />
        <div class="overplay-hover">
          <img src="frontend/images/icon-plus.png" alt=""
            class="overplay-hover-icon" />
        </div>
      </a>
      <a class="banner-item">
        <img src="frontend/images/banner2.webp" alt=""
          class="banner-item-img" />
        <div class="overplay-hover">
          <img src="frontend/images/icon-plus.png" alt=""
            class="overplay-hover-icon" />
        </div>
      </a>
      <a class="banner-item">
        <img src="frontend/images/banner3.webp" alt=""
          class="banner-item-img" />
        <div class="overplay-hover">
          <img src="frontend/images/icon-plus.png" alt=""
            class="overplay-hover-icon" />
        </div>
      </a>
      <a class="banner-item">
        <img src="frontend/images/banner4.webp" alt=""
          class="banner-item-img" />
        <div class="overplay-hover">
          <img src="frontend/images/icon-plus.png" alt=""
            class="overplay-hover-icon" />
        </div>
      </a>
    </div>
  </div>
</div>
<!-- /banner -->
<!-- productLaptop -->
<div class="product">
  <div class="container">
    <div class="product-container">
      <!-- product nav -->
      <div class="product-nav productLaptop-color">
        <h3 class="product-nav-title">Macbook-Laptop</h3>
        <ul class="product-nav-list">
          <li class="product-nav-item">
            <a href="" class="product-nav-link">Tất cả sản phẩm</a>
          </li>
          <li class="product-nav-item">
            <a href="" class="product-nav-link">Sản phẩm mới</a>
          </li>
          <li class="product-nav-item">
            <a href="" class="product-nav-link">Sản phẩm nổi bật</a>
          </li>
          <li class="product-nav-item">
            <a href="" class="product-nav-link">Sản phẩm khuyến mãi</a>
          </li>
          <li class="product-nav-item">
            <a href="" class="product-nav-link">Máy likenew</a>
          </li>
        </ul>
      </div>
      <!-- /product-nav -->
      <!-- product-list -->
      <div class="product-list">
        <a class="product-banner">
          <img src="frontend/images/bannreLaptop.webp" alt=""
            class="product-banner-img" />

          <div class="overplay-hover">
            <img src="frontend/images/icon-plus.png" alt=""
              class="overplay-hover-icon" />
          </div>
        </a>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="frontend/images/yogaLaptop.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Lenovo</span>
            <h4 class="product-info-title">
              Lenovo Ideapad Yoga 920 - 13IKB
            </h4>
            <span class="product-price-old"></span>
            <span class="product-price">44.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="frontend/images/acer1.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Acer</span>
            <h4 class="product-info-title">
              Acer A315-51-3932/Core i3-6006U
            </h4>
            <span class="product-price-old"></span>
            <span class="product-price">8.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="frontend/images/Toshiba1.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Toshiba</span>
            <h4 class="product-info-title">
              Laptop Toshiba Satellite GeForce 710M C40 14-inch
            </h4>
            <span class="product-price-old"> </span>
            <span class="product-price">9.000.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="frontend/images/mac1.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Macbook</span>
            <h4 class="product-info-title">
              Laptop Macbook Pro Intel HD Graphics 6000
            </h4>
            <span class="product-price-old"></span>
            <span class="product-price">25.000.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 5%</span>
            <div class="product-item-content">
              <img src="frontend/images/mac1.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Macbook</span>
            <h4 class="product-info-title">
              Apple Macbook Air MMGF2 13.3 inch
            </h4>
            <span class="product-price-old">21.990.000đ</span>
            <span class="product-price">20.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="frontend/images/yogaLaptop.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Lenovo</span>
            <h4 class="product-info-title">
              Laptop Lenovo Yoga 3 Pro 16.5 inch
            </h4>
            <span class="product-price-old"></span>
            <span class="product-price">31.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 4%</span>
            <div class="product-item-content">
              <img src="frontend/images/nitro5.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Acer</span>
            <h4 class="product-info-title">
              Acer Nitro 5 AN515 51 739L i7 7700HQ/8GB/1TB/2GB
            </h4>
            <span class="product-price-old">23.990.000đ</span>
            <span class="product-price">22.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 9%</span>
            <div class="product-item-content">
              <img src="frontend/images/asus.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Asus</span>
            <h4 class="product-info-title">
              Asus UX430UA i5 8250U/8GB/256GB/Win10/(GV334T)
            </h4>
            <span class="product-price-old">22.990.000đ</span>
            <span class="product-price">20.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 9%</span>
            <div class="product-item-content">
              <img src="frontend/images/Dell.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Dell</span>
            <h4 class="product-info-title">
              Dell Inspiron 7373 i7 8550U/8GB/256GB/Win10/Office365
            </h4>
            <span class="product-price-old">32.990.000đ</span>
            <span class="product-price">29.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 8%</span>
            <div class="product-item-content">
              <img src="frontend/images/mac2.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Apple</span>
            <h4 class="product-info-title">
              Apple Macbook 12" MNYK2SA/A Core M 1.2GHz/8GB/256GB (2017)
            </h4>
            <span class="product-price-old">39.990.000đ</span>
            <span class="product-price">36.990.000đ</span>
          </div>
        </div>
      </div>
      <!-- /product-list -->
    </div>
    <div class="productLaptop-banner">
      <a href="#" class="productLaptop-banner-item">
        <img src="frontend/images/bannerLaptop1.webp" alt=""
          class="productLaptop-banner-img" />
        <div class="overplay-hover">
          <img src="frontend/images/icon-plus.png" alt=""
            class="overplay-hover-icon" />
        </div>
      </a>
      <a href="#" class="productLaptop-banner-item">
        <img src="frontend/images/bannerLaptop2.webp" alt=""
          class="productLaptop-banner-img" />
        <div class="overplay-hover">
          <img src="frontend/images/icon-plus.png" alt=""
            class="overplay-hover-icon" />
        </div>
      </a>
    </div>
  </div>
</div>
<!-- /productLaptop -->
<!-- productAccessory -->
<div class="product">
  <div class="container">
    <div class="product-container">
      <!-- product nav -->
      <div class="product-nav productAccessory-color">
        <h3 class="product-nav-title">Điện thoại</h3>
        <ul class="product-nav-list">
          <li class="product-nav-item">
            <a href="" class="product-nav-link">Trang chủ</a>
          </li>
          <li class="product-nav-item">
            <a href="" class="product-nav-link">Sản phẩm</a>
          </li>
          <li class="product-nav-item">
            <a href="" class="product-nav-link">Blog</a>
          </li>
          <li class="product-nav-item">
            <a href="" class="product-nav-link">Giới thiệu</a>
          </li>
          <li class="product-nav-item">
            <a href="" class="product-nav-link">Liện hệ</a>
          </li>
        </ul>
      </div>
      <!-- /product-nav -->
      <!-- product-list -->
      <div class="product-list">
        <a class="product-banner">
          <img src="frontend/images/bannerAc.webp" alt=""
            class="product-banner-img" />
          <div class="overplay-hover">
            <img src="frontend/images/icon-plus.png" alt=""
              class="overplay-hover-icon" />
          </div>
        </a>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 14%</span>
            <div class="product-item-content">
              <img
                src="frontend/images/tai-nghe-chup-tai-kanen-ip-2090-11-300x300.webp"
                alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Kanen</span>
            <h4 class="product-info-title">
              Tai nghe chụp tai Kanen IP-2090
            </h4>
            <span class="product-price-old">350.000đ</span>
            <span class="product-price">300.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 20%</span>
            <div class="product-item-content">
              <img src="frontend/images/chuot.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Cliptec</span>
            <h4 class="product-info-title">
              Chuột Gaming Cliptec Meteor RGS502
            </h4>
            <span class="product-price-old">250.000đ</span>
            <span class="product-price">200.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img
                src="frontend/images/kinh-thuc-te-ao-samsung-gear-vr-sm-r325-400x400.webp"
                alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Samsung</span>
            <h4 class="product-info-title">
              Kính thực tế ảo Samsung Gear VR3
            </h4>
            <span class="product-price-old"></span>
            <span class="product-price">2.400.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 7%</span>
            <div class="product-item-content">
              <img src="frontend/images/samsung-gear-fit2-pro-2-330x330.webp"
                alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Samsung</span>
            <h4 class="product-info-title">Samsung Gear Fit2 Pro</h4>
            <span class="product-price-old">4.490.000đ</span>
            <span class="product-price">4.190.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="frontend/images/19.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Sandisk</span>
            <h4 class="product-info-title">Thẻ nhớ Sandisk 32GB</h4>
            <span class="product-price">500.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="frontend/images/sacdu.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Xiaomi</span>
            <h4 class="product-info-title">Pin sạc dự phòng Xiaomi</h4>
            <span class="product-price-old"></span>
            <span class="product-price">750.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="frontend/images/15.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Aukey</span>
            <h4 class="product-info-title">Củ sạc Aukey 001</h4>
            <span class="product-price-old"></span>
            <span class="product-price">110.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="frontend/images/gaychupanh.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Osmia</span>
            <h4 class="product-info-title">Gậy chụp ảnh Osmia OW1</h4>
            <span class="product-price-old"></span>
            <span class="product-price">100.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="frontend/images/gay.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Osmia</span>
            <h4 class="product-info-title">Gậy chụp ảnh Osmia 02</h4>
            <span class="product-price-old"></span>
            <span class="product-price">150.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 10%</span>
            <div class="product-item-content">
              <img src="frontend/images/30.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Apple</span>
            <h4 class="product-info-title">
              Tai nghe Apple iPhone 6 chính hãng
            </h4>
            <span class="product-price-old">500.000đ</span>
            <span class="product-price">450.000đ</span>
          </div>
        </div>
      </div>
      <!-- /product-list -->
      <!-- product-brand -->
      <div class="product-brand">
        <a href="" class="product-brand-item">
          <img src="frontend/images/Iphone.webp" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="frontend/images/samsung.webp" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="frontend/images/mi.png" alt="" class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="frontend/images/oppo.png" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="frontend/images/LG.png" alt="" class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="frontend/images/VIVO.webp" alt=""
            class="product-brand-img" />
        </a>
      </div>
      <!-- /product-brand -->
    </div>
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
</div>
<!-- /productAccessory -->
{{-- sevice --}}
<section class="service">
  <div class="container">
    <div class="service-container">
      <div class="service-item">
        <span class="service-item-img blue">
          <img src="{{ asset("frontend/images/icondv_1.webp") }}" alt="" />
        </span>
        <div class="service-content">
          <h4 class="service-content-title">Miễn phí vận chuyển</h4>
          <span class="service-content-text">Cho đơn hàng từ 500k</span>
        </div>
      </div>
      <div class="service-item">
        <span class="service-item-img red">
          <img src="{{ asset('frontend/images/icondv_2.webp') }}" alt="" class="" />
        </span>
        <div class="service-content">
          <h4 class="service-content-title">Hoàn tiền</h4>
          <span class="service-content-text">Nếu có lỗi</span>
        </div>
      </div>
      <div class="service-item">
        <span class="service-item-img green">
          <img src="{{ asset("frontend/images/icondv_3.webp") }}" alt="" />
        </span>
        <div class="service-content">
          <h4 class="service-content-title">Hỗ trợ thân thiện</h4>
          <span class="service-content-text">Hỗ trợ 24/7</span>
        </div>
      </div>
      <div class="service-item">
        <span class="service-item-img purple">
          <img src="{{ asset('frontend/images/icondv_4.webp') }}" alt="" />
        </span>
        <div class="service-content">
          <h4 class="service-content-title">Thanh toán</h4>
          <span class="service-content-text">Bảo mật thanh toán</span>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection