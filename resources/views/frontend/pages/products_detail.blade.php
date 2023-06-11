@extends('frontend.layout_cart')
@section('data-view')
<div class="productDetail">
  <div class="container">
    <div class="productDetail-container">
      <div class="productDetail-left">
   
        <div style="
                  display: flex;
                  align-items: flex-start;
                  justify-content: space-between;
                ">
          <div class="productDetail-images">
            <img src="{{ asset("upload/products/$record->photo") }}" alt="" />
            <div class="productDetail-images-list">
              <div class="productDetail-images-item">
                <img src="./public/images/X3.webp" alt="" />
              </div>
              <div class="productDetail-images-item">
                <img src="./public/images/X1.webp" alt="" />
              </div>
              <div class="productDetail-images-item">
                <img src="./public/images/X2.webp" alt="" />
              </div>
            </div>
          </div>
          <div class="productDetail-info">
            <div class="productDetail-info-name">{{ $record->name}}</div>
            <div class="productDetail-info-review">
              <i class="fa-regular fa-star"></i><i
                class="fa-regular fa-star"></i><i
                class="fa-regular fa-star"></i><i
                class="fa-regular fa-star"></i><i
                class="fa-regular fa-star"></i>
              <span>Viết đánh giá của bạn</span>
            </div>
            <div class="productDetail-price">
              @if ($record->discount != null )
                    <span class="viewProduct-price-old">{{ number_format($record->price) }}</span>
                    <span class="viewProduct-price-new">{{  number_format((float)$record->price - ((float)$record->price * (float)$record->discount / 100)) }}</span>
                    @else
                    <span class="viewProduct-price-new">{{ number_format((float)$record->price) }}</span>
                    @endif
            </div>
            <p class="productDetail-text">
              Tình trạng: <span>Còn hàng</span>
            </p>
            <ul class="productDetail-endow-list">
              <li>
                <i class="fa-solid fa-circle"></i> Thương hiệu: {{ $record->name }}
              </li>
              <li>
                <i class="fa-solid fa-circle"></i> Dòng sản phẩm: ĐIỆN
                THOẠI
              </li>
              <li>
                <i class="fa-solid fa-circle"></i> Giảm giá 10% cho hoá
                đơn trên 500k
              </li>
              <li>
                <i class="fa-solid fa-circle"></i> Miễn phí giao hàng
                trong bán kính 5km
              </li>
            </ul>
            <div class="productDetail-form">
              <div class="viewProduct-amount">
                <i class="fa fa-minus icon-minus"></i>
                <span class="viewProduct-number">1</span>
                <i class="fa fa-plus icon-plus"></i>
              </div>
              <button type="submit" class="viewProduct-btn">
                Thêm vào giỏ hàng
              </button>
            </div>
            <div class="productDeltail-prod-sale">
              <span>Khuyến mại đặc biệt (SL có hạn)</span>
            </div>
            <div class="productDetail-social">
              <span>Chia sẻ:</span>
              <div class="footer-social">
                <i class="fa-brands fa-facebook-f bgc-fb"></i>
                <i class="fa-brands fa-twitter bgc-tw"></i>
                <i class="fa-brands fa-pinterest-p bgc-pin"></i>
                <i class="fa-brands fa-google-plus-g bgc-g"></i>
                <i class="fa-brands fa-youtube bgc-yt"></i>
              </div>
            </div>
            <div class="productDetail-bonus">
              <div class="productDetail-bonus-item">
                <i class="fa fa-gift"></i>
                <p>
                  Giảm giá thêm tới <span>15%</span> giá phụ kiện,
                  <span>1%</span>
                  giá máy cho hội viên Smember
                </p>
              </div>
              <div class="productDetail-bonus-item">
                <i class="fa fa-gift"></i>
                <p>
                  Trả góp lãi suất <span>0%</span> với thẻ tín dụng ANZ,
                  Sacombank, Nam Á Bank, Shinhanbank
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="productDetail-tab">
          <ul class="productDetail-tab-list">
            <li>
              <span class="border-bottom-red">Thông tin sản phẩm</span>
            </li>
            <li><span>Tab tùy chỉnh</span></li>
            <li><span>Đánh giá(APP)</span></li>
            <li><span>Bình luận</span></li>
          </ul>
          <div class="productDetail-tab-content">
            {!! $record->description !!}
          </div>
        </div>
        <!-- product nav -->
        <div class="product-nav productMobile-color">
          <h3 class="product-nav-title">Sản phẩm liên quan</h3>
        </div>
        <!-- /product-nav -->
        <div class="productDetail-list">
          <a class="productDetail-item" href="./productDetail.html">
            <div class="product-item-img">
              <span class="product-item-sale">- 14%</span>
              <div class="product-item-content">
                <img
                  src="./public/images/tai-nghe-chup-tai-kanen-ip-2090-11-300x300.webp"
                  alt="" />
                <div class="overplay-product">
                  <i class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i>
                  <i class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i>
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
          </a>
          <a class="productDetail-item" href="./productDetail.html">
            <div class="product-item-img">
              <span class="product-item-sale">- 20%</span>
              <div class="product-item-content">
                <img src="./public/images/chuot.webp" alt="" />
                <div class="overplay-product">
                  <i class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i>
                  <i class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i>
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
          </a>
          <a class="productDetail-item" href="./productDetail.html">
            <div class="product-item-img">
              <div class="product-item-content">
                <img
                  src="./public/images/kinh-thuc-te-ao-samsung-gear-vr-sm-r325-400x400.webp"
                  alt="" />
                <div class="overplay-product">
                  <i class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i>
                  <i class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i>
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
          </a>
          <a class="productDetail-item" href="./productDetail.html">
            <div class="product-item-img">
              <span class="product-item-sale">- 7%</span>
              <div class="product-item-content">
                <img src="./public/images/samsung-gear-fit2-pro-2-330x330.webp"
                  alt="" />
                <div class="overplay-product">
                  <i class="fa fa-search overplay-product-icon icon-viewProduct"
                    data-tooltip="Tìm kiếm"></i>
                  <i class="fa-solid fa-cart-shopping overplay-product-icon"
                    data-tooltip="Giỏ hàng"></i>
                </div>
              </div>
            </div>
            <div class="product-info">
              <span class="product-info-name">Samsung</span>
              <h4 class="product-info-title">Samsung Gear Fit2 Pro</h4>
              <span class="product-price-old">4.490.000đ</span>
              <span class="product-price">4.190.000đ</span>
            </div>
          </a>
        </div>
      </div>
      <div class="productDetail-right">
        <h3 class="aside-item-title">Đia chỉ showroom</h3>
        <!-- address -->
        <div class="address">
          <select name="" id="" class="address-select">
            <option value="Ha Nội">Ha Nội</option>
            <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
            <option value="Sài Gòn">Sài Gòn</option>
          </select>
          <div class="address-text">
            <p>Trụ sở: Tầng 4 - Tòa nhà Hanoi</p>
            <p>Group - 442 Đội Cấn - Quận Ba Đình - TP Hà Nội</p>
          </div>
        </div>
        <!-- address -->

        <!-- service -->
        <section class="productDetail-service">
          <div class="productDetail-service-container">
            <div class="productDetail-service-item">
              <span class="service-item-img blue">
                <img src="./public/images/icondv_1.webp" alt="" />
              </span>
              <div class="service-content">
                <h4 class="service-content-title">Miễn phí vận chuyển</h4>
                <span class="service-content-text">Cho đơn hàng từ 500k</span>
              </div>
            </div>
            <div class="productDetail-service-item">
              <span class="service-item-img red">
                <img src="./public/images/icondv_2.webp" alt="" class="" />
              </span>
              <div class="service-content">
                <h4 class="service-content-title">Hoàn tiền</h4>
                <span class="service-content-text">Nếu có lỗi</span>
              </div>
            </div>
            <div class="productDetail-service-item">
              <span class="service-item-img green">
                <img src="./public/images/icondv_3.webp" alt="" />
              </span>
              <div class="service-content">
                <h4 class="service-content-title">Hỗ trợ thân thiện</h4>
                <span class="service-content-text">Hỗ trợ 24/7</span>
              </div>
            </div>
            <div class="productDetail-service-item">
              <span class="service-item-img purple">
                <img src="./public/images/icondv_4.webp" alt="" />
              </span>
              <div class="service-content">
                <h4 class="service-content-title">Thanh toán</h4>
                <span class="service-content-text">Bảo mật thanh toán</span>
              </div>
            </div>
          </div>
        </section>
        <!-- /service -->

        <div class="productDetail-product">
          <h3 class="aside-item-title yellow">Sản phảm bán chạy</h3>
          <div class="productDetail-product-list">
            <div class="productDetail-product-item">
              <img src="./public/images/note10.webp" alt=""
                class="productDetail-product-img" />
              <div class="productDetail-item-content">
                <h4 class="productDetail-product-name">
                  Samsung Galaxy Note 8
                </h4>
                <span class="productDetail-product-price-old">22.990.000đ</span>
                <span class="productDetail-product-price-new">21.490.000đ</span>
              </div>
            </div>
            <div class="productDetail-product-item">
              <img src="./public/images/note10.webp" alt=""
                class="productDetail-product-img" />
              <div class="productDetail-item-content">
                <h4 class="productDetail-product-name">
                  Samsung Galaxy Note 8
                </h4>
                <span class="productDetail-product-price-old">22.990.000đ</span>
                <span class="productDetail-product-price-new">21.490.000đ</span>
              </div>
            </div>
            <div class="productDetail-product-item">
              <img src="./public/images/note10.webp" alt=""
                class="productDetail-product-img" />
              <div class="productDetail-item-content">
                <h4 class="productDetail-product-name">
                  Samsung Galaxy Note 8
                </h4>
                <span class="productDetail-product-price-old">22.990.000đ</span>
                <span class="productDetail-product-price-new">21.490.000đ</span>
              </div>
            </div>
            <div class="productDetail-product-item">
              <img src="./public/images/note10.webp" alt=""
                class="productDetail-product-img" />
              <div class="productDetail-item-content">
                <h4 class="productDetail-product-name">
                  Samsung Galaxy Note 8
                </h4>
                <span class="productDetail-product-price-old">22.990.000đ</span>
                <span class="productDetail-product-price-new">21.490.000đ</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection