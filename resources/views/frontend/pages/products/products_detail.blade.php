@extends('frontend.layout_cart')
@section('data-view')
@php
    $name = App\Http\Controllers\Components\StaticController::getCategoryName($record->category_id);
@endphp
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
            <div class="image-wrapper">
              <img src="{{ asset("upload/products/$record->photo") }}" alt="" class="images-hoverZoom"/>
              <div class="images-cover"></div>
            </div>
            <div class="productDetail-images-list">
              <i class="fa-solid fa-angle-left icon-pre"></i>
              @foreach ($detailImages as $item)
              <div class="productDetail-images-item">
                <img src="{{ asset("upload/products/$item->photo_detail") }}" alt="" />
              </div>
              @endforeach
              <i class="fa-solid fa-angle-right icon-next"></i>
            </div>
          </div>
          <div class="productDetail-info">
            <div class="productDetail-info-name">{{ $record->name}}</div>
            <div class="rating-recomment">
              <div >
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              </div>
              <span>({{ $star }} lượt bình chọn)</span>
            </div>
            <div class="productDetail-price">
              @if ($record->discount != null )
                    <span class="viewProduct-price-old">{{ number_format($record->price) }}đ</span>
                    <span class="viewProduct-price-new">{{  number_format((float)$record->price - ((float)$record->price * (float)$record->discount / 100)) }}đ</span>
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
                <i class="fa-solid fa-circle"></i> Dòng sản phẩm: {{ App\Http\Controllers\Components\StaticController::getBrandName($record->brand_id) }}
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
                <span class="viewProduct-number ">1</span>
                <i class="fa fa-plus icon-plus"></i>
              </div>
              <a href="{{ asset('cart/buy/'.$record->id)}}" class="viewProduct-btn">
                Thêm vào giỏ hàng
              </a>
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
              <span class="border-bottom-red tab-item" data-tab='1'>Thông tin sản phẩm</span>
            </li>
            <li><span data-tab='4' class="tab-item">Đánh giá</span></li>
          </ul>
          <div class="tab-wrapper">
            <div class="productDetail-tab-content tab-active" data-tab='1'>
              {!! $record->content !!}
              <div class="btn-more">Xem thêm</div>
              <div class="btn-collapse">Thu gọn</div>
            </div>
            <div class="productDetail-tab-content" data-tab='4'> 
              <h3 class="form-comment-title">Đánh giá sản phẩm {{ $record->name }}</h3>
              <form action="{{ url("/comment-post/$record->id") }}" method="post" class="form-comment-products">
                @csrf
                <p>Thêm đánh giá sản phẩm</p>
                <div class="rating">
                  <input type="radio" id="star1" name="rating" value="1" />
                  <label for="star1"></label>
                  <input type="radio" id="star2" name="rating" value="2" />
                  <label for="star2"></label>
                  <input type="radio" id="star3" name="rating" value="3" />
                  <label for="star3"></label>
                  <input type="radio" id="star4" name="rating" value="4" />
                  <label for="star4"></label>
                  <input type="radio" id="star5" name="rating" value="5" />
                  <label for="star5"></label>
                </div>
                <div class="comment-group">
                  <label for="">Nhận xét của bạn</label>
                  <textarea name="comment" id="" cols="" rows="" class="comment-textarea" placeholder="Nhận xét..."></textarea>
                </div>
                <div class="comment-group">
                  <input type="submit" name="submit" value="Gửi đi" class="comment-btn">
                </div>
              </form>
              
            </div>
          </div>
        </div>
        <!-- product nav -->
        <div class="product-nav productMobile-color">
          <h3 class="product-nav-title">Sản phẩm liên quan</h3>
        </div>
        <!-- /product-nav -->
        <div class="productDetail-list">
          @if (isset($productsRelateTo))
            @foreach ($productsRelateTo as $item)
               {{-- product-item --}}
                <div href="" class="productShop-item"  style="width:25%">
                  <div class="product-item-img">
                    @if ($item->discount != null)
                    <span class="product-item-sale">- {{ $item->discount }}%</span>
                    @endif
                    <div class="product-item-content">
                      <img src="{{ asset("upload/products/$item->photo") }}"
                        alt="" />
                      <div class="overplay-product">
                        <a href="{{ url("#") }}">
                          <i class="fa fa-search overplay-product-icon icon-viewProduct"
                          data-tooltip="Tìm kiếm"></i>
                        </a>
                        <a href="{{ asset('cart/buy/'.$item->id) }}"><i class="fa-solid fa-cart-shopping overplay-product-icon"
                          data-tooltip="Giỏ hàng"></i></a>
                      </div>
                    </div>
                  </div>
                  <a class="product-info" href="{{ url("products/detail/$item->id")}}">
                    <span class="product-info-name">{{ App\Http\Controllers\Components\StaticController::getCategoryName($item->brand_id) }}</span>
                    <h4 class="product-info-title">
                      {{ $item->name }}
                    </h4>
                    @if ($item->discount != null )
                    <div>
                      <span class="product-price-old">{{ number_format((float)$item->price + ((float)$item->price * (float)$item->discount / 100)) }}</span>
                    <span class="product-price">{{ number_format($item->price)  }}</span>
                    </div>
                    @else
                    <span class="product-price">{{ number_format((float)$item->price) }}</span>
                    @endif
                  </a>
                </div>
              {{-- product-item --}}
            @endforeach
          @endif
        </div>
      </div>
      <div class="productDetail-right">
        <h3 class="aside-item-title">Đia chỉ showroom</h3>
        <!-- address -->
        <div class="address">
          <select name="" id="" class="address-select">
            <option value="Ha Nội">Hà Nội</option>
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
                <img src="{{ asset("frontend/images/icondv_1.webp") }}" alt="" />
              </span>
              <div class="service-content">
                <h4 class="service-content-title">Miễn phí vận chuyển</h4>
                <span class="service-content-text">Cho đơn hàng từ 500k</span>
              </div>
            </div>
            <div class="productDetail-service-item">
              <span class="service-item-img red">
                <img src="{{ asset("frontend/images/icondv_2.webp") }}" alt="" class="" />
              </span>
              <div class="service-content">
                <h4 class="service-content-title">Hoàn tiền</h4>
                <span class="service-content-text">Nếu có lỗi</span>
              </div>
            </div>
            <div class="productDetail-service-item">
              <span class="service-item-img green">
                <img src="{{ asset("frontend/images/icondv_3.webp") }}" alt="" />
              </span>
              <div class="service-content">
                <h4 class="service-content-title">Hỗ trợ thân thiện</h4>
                <span class="service-content-text">Hỗ trợ 24/7</span>
              </div>
            </div>
            <div class="productDetail-service-item">
              <span class="service-item-img purple">
                <img src="{{ asset("frontend/images/icondv_4.webp") }}" alt="" />
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
            @if (isset($productsHot))
              @foreach ($productsHot as $item)
              <a class="productDetail-product-item" href="{{ url("products/detail/$item->id") }}">
                <img src="{{ asset("upload/products/$item->photo") }}" alt=""
                  class="productDetail-product-img" />
                <div class="productDetail-item-content">
                  <h4 class="productDetail-product-name">
                    {{ $item->name }}
                  </h4>
                  <span class="productDetail-product-price-old">{{ number_format($item->price + ($item->price * $item->discount / 100)) }}</span>
                  <span class="productDetail-product-price-new">{{ number_format($item->price) }}</span>
                </div>
              </a>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
    <script src="{{ asset("frontend/js/productDetail.js") }}"></script>
    <script src="{{ asset("frontend/js/hoverZoomImages.js") }}"></script>
    <script>
      $(document).ready( function() {
        let number = $('.viewProduct-number').val();
        $(".icon-minus").click(function() {
          if(number <= 1) {
            number =1;
          }else {
            number--;
          }
          $('.viewProduct-number').text(number)
        })
        $(".icon-plus").click(function() {
          number++;
          $('.viewProduct-number').text(number)
        })
      })

    </script>
@endsection