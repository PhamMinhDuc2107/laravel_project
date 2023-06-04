@extends('frontend.layout_home')
@section('data-view')
  <!-- slider -->
 <div class="slider">
  <div class="container">
    <div class="slider-container">
      <a href="#" class="slider-link">
        <img src="./public/images/slide_img_1.webp" alt=""
          class="slider-img" />
      </a>
      <div class="slider-right">
        <a href="#" class="slider-link">
          <img src="./public/images/banner_slide_img_1.webp" alt=""
            class="slider-img" />
          <div class="overplay-hover">
            <img src="./public/images/icon-plus.png" alt=""
              class="overplay-hover-icon" />
          </div>
        </a>
        <a href="#" class="slider-link">
          <img src="./public/images/banner_slide_img_2.webp" alt=""
            class="slider-img" />
          <div class="overplay-hover">
            <img src="./public/images/icon-plus.png" alt=""
              class="overplay-hover-icon" />
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- /slider -->
<!-- productMobile -->
<div class="product">
  <div class="container">
    <div class="product-container">
      <!-- product nav -->
      <div class="product-nav productMobile-color">
        <h3 class="product-nav-title">Điện thoại</h3>
        <ul class="product-nav-list">
          <li class="product-nav-item">
            <a href="<?php echo BASE_URL ?>Home" class="product-nav-link">Trang
              chủ</a>
          </li>
          <li class="product-nav-item">
            <a href="<?php echo BASE_URL ?>Product"
              class="product-nav-link">Sản phẩm</a>
          </li>
          <li class="product-nav-item">
            <a href="<?php echo BASE_URL ?>Blog"
              class="product-nav-link">Blog</a>
          </li>
          <li class="product-nav-item">
            <a href="#" class="product-nav-link">Giới thiệu</a>
          </li>
          <li class="product-nav-item">
            <a href="#" class="product-nav-link">Liện hệ</a>
          </li>
        </ul>
      </div>
      <!-- /product-nav -->
      <!-- product-list -->
      <div class="product-list">
        <a class="product-banner">
          <img src="./public/images/collection_module_1_banner.webp" alt=""
            class="product-banner-img" />
          <div class="overplay-hover">
            <img src="./public/images/icon-plus.png" alt=""
              class="overplay-hover-icon" />
          </div>
        </a>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 7%</span>
            <div class="product-item-content">
              <img src="./public/images/s9-plus-xam-1520216500.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Samsung</span>
            <h4 class="product-info-title">Samsung Galaxy S9+ 128GB</h4>
            <span class="product-price-old">26.990.000đ</span>
            <span class="product-price">24.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 8%</span>
            <div class="product-item-content">
              <img src="./public/images/IphoneX.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Apple</span>
            <h4 class="product-info-title">Iphone X 256GB</h4>
            <span class="product-price-old">26.990.000đ</span>
            <span class="product-price">24.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 4%</span>
            <div class="product-item-content">
              <img src="./public/images/oppo-f5-gold.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Oppo</span>
            <h4 class="product-info-title">OPPO F5 6GB</h4>
            <span class="product-price-old">26.990.000đ</span>
            <span class="product-price">24.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 13%</span>
            <div class="product-item-content">
              <img src="./public/images/s9-plus-xam-1520216500.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Apple</span>
            <h4 class="product-info-title">
              iPad Pro 10.5 inch Wifi Cellular 64GB
            </h4>
            <span class="product-price-old">26.990.000đ</span>
            <span class="product-price">24.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 19%</span>
            <div class="product-item-content">
              <img src="./public/images/Iphone8.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Apple</span>
            <h4 class="product-info-title">
              IPhone 8 - 256GB Silver (Likenew)
            </h4>
            <span class="product-price-old">26.990.000đ</span>
            <span class="product-price">24.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 11%</span>
            <div class="product-item-content">
              <img src="./public/images/TabA6.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Samsung</span>
            <h4 class="product-info-title">
              Samsung Galaxy Tab A6 10.1 Spen
            </h4>
            <span class="product-price-old">26.990.000đ</span>
            <span class="product-price">24.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 8%</span>
            <div class="product-item-content">
              <img alt=""
                src="./public/images/huawei-mediapad-m3-115-400x460.webp" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Huawei</span>
            <h4 class="product-info-title">
              Huawei MediaPad M3 8.0 (2017)
            </h4>
            <span class="product-price-old">26.990.000đ</span>
            <span class="product-price">24.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 18%</span>
            <div class="product-item-content">
              <img src="./public/images/s8-plus.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Samsung</span>
            <h4 class="product-info-title">
              Galaxy S8 Plus Black Chính hãng (Likenew)
            </h4>
            <span class="product-price-old">26.990.000đ</span>
            <span class="product-price">24.990.000đ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="./public/images/oppo-f5-gold.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Oppo</span>
            <h4 class="product-info-title">
              OPPO F5 Gold Chính hãng (Likenew)
            </h4>
            <span class="product-price-old"></span>
            <span class="product-price">Liên hệ</span>
          </div>
        </div>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 7%</span>
            <div class="product-item-content">
              <img src="./public/images/samsung-galaxy-note-8.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
                    class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i></a>
              </div>
            </div>
          </div>
          <div class="product-info">
            <span class="product-info-name">Samsung</span>
            <h4 class="product-info-title">Samsung Galaxy Note 8</h4>
            <span class="product-price-old">26.990.000đ</span>
            <span class="product-price">24.990.000đ</span>
          </div>
        </div>
      </div>
      <!-- /product-list -->
      <!-- product-brand -->
      <div class="product-brand">
        <a href="" class="product-brand-item">
          <img src="./public/images/Iphone.webp" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="./public/images/samsung.webp" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="./public/images/mi.png" alt="" class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="./public/images/oppo.png" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="./public/images/LG.png" alt="" class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="./public/images/VIVO.webp" alt=""
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
        <img src="./public/images/banner1.webp" alt=""
          class="banner-item-img" />
        <div class="overplay-hover">
          <img src="./public/images/icon-plus.png" alt=""
            class="overplay-hover-icon" />
        </div>
      </a>
      <a class="banner-item">
        <img src="./public/images/banner2.webp" alt=""
          class="banner-item-img" />
        <div class="overplay-hover">
          <img src="./public/images/icon-plus.png" alt=""
            class="overplay-hover-icon" />
        </div>
      </a>
      <a class="banner-item">
        <img src="./public/images/banner3.webp" alt=""
          class="banner-item-img" />
        <div class="overplay-hover">
          <img src="./public/images/icon-plus.png" alt=""
            class="overplay-hover-icon" />
        </div>
      </a>
      <a class="banner-item">
        <img src="./public/images/banner4.webp" alt=""
          class="banner-item-img" />
        <div class="overplay-hover">
          <img src="./public/images/icon-plus.png" alt=""
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
          <img src="./public/images/bannreLaptop.webp" alt=""
            class="product-banner-img" />

          <div class="overplay-hover">
            <img src="./public/images/icon-plus.png" alt=""
              class="overplay-hover-icon" />
          </div>
        </a>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <div class="product-item-content">
              <img src="./public/images/yogaLaptop.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/acer1.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/Toshiba1.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/mac1.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/mac1.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/yogaLaptop.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/nitro5.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/asus.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/Dell.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/mac2.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
        <img src="./public/images/bannerLaptop1.webp" alt=""
          class="productLaptop-banner-img" />
        <div class="overplay-hover">
          <img src="./public/images/icon-plus.png" alt=""
            class="overplay-hover-icon" />
        </div>
      </a>
      <a href="#" class="productLaptop-banner-item">
        <img src="./public/images/bannerLaptop2.webp" alt=""
          class="productLaptop-banner-img" />
        <div class="overplay-hover">
          <img src="./public/images/icon-plus.png" alt=""
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
          <img src="./public/images/bannerAc.webp" alt=""
            class="product-banner-img" />
          <div class="overplay-hover">
            <img src="./public/images/icon-plus.png" alt=""
              class="overplay-hover-icon" />
          </div>
        </a>
        <div class="product-item" href="./productDetail">
          <div class="product-item-img">
            <span class="product-item-sale">- 14%</span>
            <div class="product-item-content">
              <img
                src="./public/images/tai-nghe-chup-tai-kanen-ip-2090-11-300x300.webp"
                alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/chuot.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
                src="./public/images/kinh-thuc-te-ao-samsung-gear-vr-sm-r325-400x400.webp"
                alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/samsung-gear-fit2-pro-2-330x330.webp"
                alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/19.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/sacdu.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/15.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/gaychupanh.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/gay.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
              <img src="./public/images/30.webp" alt="" />
              <div class="overplay-product">
                <a href="#"><i
                    class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i></a>
                <a href="<?php echo BASE_URL ?>Cart"><i
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
          <img src="./public/images/Iphone.webp" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="./public/images/samsung.webp" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="./public/images/mi.png" alt="" class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="./public/images/oppo.png" alt=""
            class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="./public/images/LG.png" alt="" class="product-brand-img" />
        </a>
        <a href="" class="product-brand-item">
          <img src="./public/images/VIVO.webp" alt=""
            class="product-brand-img" />
        </a>
      </div>
      <!-- /product-brand -->
    </div>
    <div class="banner-full">
      <a href="#">
        <img src="./public/images/bannerFull.webp" alt=""
          class="banner-full-img" />
        <div class="overplay-hover">
          <img src="./public/images/icon-plus.png" alt=""
            class="overplay-hover-icon" />
        </div>
      </a>
    </div>
  </div>
</div>
<!-- /productAccessory -->
<!-- service -->
<section class="service">
  <div class="container">
    <div class="service-container">
      <div class="service-item">
        <span class="service-item-img blue">
          <img src="./public/images/icondv_1.webp" alt="" />
        </span>
        <div class="service-content">
          <h4 class="service-content-title">Miễn phí vận chuyển</h4>
          <span class="service-content-text">Cho đơn hàng từ 500k</span>
        </div>
      </div>
      <div class="service-item">
        <span class="service-item-img red">
          <img src="./public/images/icondv_2.webp" alt="" class="" />
        </span>
        <div class="service-content">
          <h4 class="service-content-title">Hoàn tiền</h4>
          <span class="service-content-text">Nếu có lỗi</span>
        </div>
      </div>
      <div class="service-item">
        <span class="service-item-img green">
          <img src="./public/images/icondv_3.webp" alt="" />
        </span>
        <div class="service-content">
          <h4 class="service-content-title">Hỗ trợ thân thiện</h4>
          <span class="service-content-text">Hỗ trợ 24/7</span>
        </div>
      </div>
      <div class="service-item">
        <span class="service-item-img purple">
          <img src="./public/images/icondv_4.webp" alt="" />
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