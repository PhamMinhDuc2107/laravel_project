@extends('frontend.layout_order')
@section('title')
  Plican - Thanh toán hoá đơn
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset("frontend/css/order.css") }}">
@endsection
@section("data-view")
@php
    use App\Http\ShoppingCart\Cart;
@endphp
<div class="wrapper">
  <div class="container">
    <form action="" class="form-order">
      <div class="main">
        <h3 class="main-logo">Plican</h3>
        <div style="display: flex">
          <div class="main-left">
            <div action="" class="main-form">
              <h4 class="main-form-title">Thông tin nhận hàng</h4>
              <div class="main-form-input">
                <input type="text" name="email">
                <label for="">Email</label>
              </div>
              <div class="main-form-input">
                <input type="text" name="name" >
                <label for="">Họ và tên</label>
              </div>
              <div class="main-form-input">
                <input type="text" name="number">
                <label for="">Số điện thoại</label>
              </div>
              <div class="customer-select-box">
                <select name="city" id="city">
                  <option value="">---</option>
                  @if($city)
                    @foreach ($city as $item)
                      <option value="{{ $item->matp }}">{{ $item->name_city }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="customer-select-box">
                <select name="districts" id="districts">
                  <option value="">---</option>
                </select>
              </div>
              <div class="customer-select-box">
                <select name="commune" id="commune">
                  <option value="">---</option>
                </select>
              </div>
              <div class="main-form-input">
                <input type="text" >
                <label for="">Địa chỉ rõ ràng</label>
              </div>
              <div class="main-form-input">
                <textarea type="text" placeholder="Ghi chú..."></textarea>
              </div>
            </div>
          </div>
          <div class="main-right">
            <h4 class="main-form-title">Vận chuyển</h4>
            <div class="right-wrapper">
              <div class="input-group">
                <input type="radio" id="box">
                <label for="box">Giao hàng tận nơi</label>
              </div>
              <span class="price-feeship">0đ</span>
            </div>
            <h4 class="main-form-title">Thanh toán</h4>
            <div class="right-wrapper">
              <div class="input-group">
                <input type="radio" id="box1">
                <label for="box1">Thanh toán khi nhận hàng(COD)</label>
              </div>
              <i class="fa-solid fa-money-bill"></i>
            </div>
            <div class="right-wrapper">
              <div class="input-group">
                <input type="radio" id="box2">
                <label for="box2">Thanh toán Momo</label>
              </div>
              <i class="fa-solid fa-money-bill"></i>
            </div>
            <div class="right-wrapper">
              <div class="input-group">
                <input type="radio" id="box3">
                <label for="box3">Thanh toán VNPay</label>
              </div>
              <i class="fa-solid fa-money-bill"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="aside">
        <h4 class="aside-form-title">Đơn hàng({{ Cart::cartNumber() }} sản phẩm)</h4>
        <div class="aside_content">
          <div class="aside_list">
            @if (cart::cartList())
              @foreach (cart::cartList() as $item)
              <div class="aside_item">
                <div class="aside_item-content">
                  <div class="aside_item-img">
                    <img src="{{ asset('upload/products/'.$item['photo']) }}" alt="">
                    <span>{{ $item['quantity'] }}</span>
                  </div>
                  <div class="aside_item-name">{{ $item['name'] }}</div>
                </div>
                <div class="aside_item-price">{{ number_format($item['price']) }}đ</div>
              </div>
              @endforeach
            @endif
          </div>
          <div class="aside_coupons">
            <div class="main-form-input">
              <input type="text" name="coupon" class="input-coupon" >
              <label for="">Mã giảm giá</label>
            </div>
            <input type="" value="Áp dụng" class="coupons-btn">
          </div>
          <div class="coupon-alert">
            <span class="coupon-success"></span>
            <span class="coupon-errors"></span>
          </div>
          <div class="aside_price">
            <div class="aside_price-item">
              <span>Tạm tính</span>
              <span class="price">{{ number_format(cart::cartTotal()) }}đ</span>
            </div>
            <div class="aside_price-item">
              <span>Phí vận chuyển</span>
              <span class="price-feeship price-fee">0đ</span>
            </div>
            <div class="aside_price-item">
              <span>Discount</span>
              <span class="aside_price-coupon">0đ</span>
            </div>
          </div>
          <div class="aside_price-total">
            <span>Tổng cộng</span>
            <p class="price-total">29.000.000đ</p>
          </div>
          <div class="aside_btn">
            <a href="{{ url("cart") }}" >
              <i class="fa fa-angle-left"></i>
              Quay về giỏ hàng
            </a>
            <button type="submit">Đặt hàng</button>
          </div>
        </div>
      </div>
    </form>
</div>
@endsection
@section('js')
    <script src="{{ asset("frontend/js/order.js") }}"></script>
    <script>
      $(document).ready(function() {
        function total() {
          let price = +{{ Cart::cartTotal() }};
          let total = price; // Khởi tạo giá trị total bằng giá trị của price
          let discount = +$(".aside_price-coupon").text().split("đ")[0];
          let feeShip = +$(".price-fee").text().split("đ")[0];
          if(discount = 0) {
            if (discount > 100) {
              total = price - discount + feeShip; // Cập nhật total nếu discount lớn hơn 100
            } else if (discount <= 100) {
              total = price - (price * discount / 100) + feeShip; // Cập nhật total nếu discount nhỏ hơn hoặc bằng 100
            }
          } else if(feeShip = 0) {
            total = price - feeShip;
          }
          console.log(total)
           $(".price-total").html(`${total.toLocaleString()}đ`)
        }
        total();
        // address
        function ajaxAdrress(select,select2,url) {
          $(`#${select}`).change(function(e) {
          let id = $(this).val();
          let communeSelect = $(`#${select2}`);
          communeSelect.empty();
          if(id != "") {
            $.ajax({
              url:`${url}`+id,
              success: function( result ) {
                $.each(result, function(index, item) {
                  communeSelect.append(
                      `<option value="${item.id}">${item.name}</option>`
                  );
                });
              },
              error: function(xhr, status, error) {
                alert("Cập nhật thất bại")
              }
            })
          }
        })
        }
        ajaxAdrress('districts', 'commune',"{{ url('cart/checkout/ajax-district') }}?districtId=")
        ajaxAdrress('city', 'districts',"{{ url('cart/checkout/ajax-district') }}?cityId=")
        // coupons
        $('.coupons-btn').click(function(e) {
          let coupon = $(".input-coupon").val();
          $('.coupon-success').empty();
          $('.coupon-errors').empty();
          total()
          $.ajax({
            url:"{{ url('cart/check-coupon') }}",
            method:"post",
            data: {
              _token: "{{ csrf_token() }}",
              code: coupon},
            success: function(result) {
              let priceShip = $(".price-ship").text();
              if(result != []) {
                let timeEnd = new Date(`${result.timeEnd}`)
              let now = new Date();
              if(timeEnd > now ) {
                if(result.quantity <= 0) {
                  $(".coupon-errors").html(`Số lượng mã khuyến mại đã hết`)
                } else {
                  if(result.discount > 100) {
                    $(".coupon-success").html(`Áp dụng mã ${result.discountName} thành công giảm ${result.discount.toLocaleString()}đ`)
                    $('.aside_price-coupon').html(`- ${result.discount.toLocaleString()}đ`)
                  }else if(result.discount <= 100) { 
                    $(".coupon-success").html(`Áp dụng mã ${result.discountName} thành công giảm ${result.discount.toLocaleString()}%`)
                    $('.aside_price-coupon').html(`- ${result.discount}%`)
                  }
                }
              }else {
                $(".coupon-errors").html(`Mã khuyến mãi đã hết hạn`)
              }
              } else {
                $(".coupon-errors").html(`Mã coupons không hợp lệ`)

              }
            },
            error: function(xhr, status, error) {
              console.error(error);
            }

          })
        })
        //feeship
        $('#city').change(function(e) {
          let id = $(this).val();
          console.log(id)
          ajaxFeeShip('city',id);
          
        })
        $('#districts').change(function(e) {
          let id = $(this).val();
          console.log(id)
          ajaxFeeShip('districts',id);
          
        })
        $('#commune').change(function(e) {
          let id = $(this).val();
          console.log(id)
          ajaxFeeShip('commune', id);
        })
        function ajaxFeeShip(name, id) {
          $(".price-feeship").text("0đ")
          $.ajax({
            url: "{{ url('cart/feeShip') }}",
            method: 'post',
            data: {
              _token: "{{ csrf_token() }}",
              [name]: [id],
            },
            success: function(result) {
              if(result) {
                let priceFee = result.feeship;
                $(".price-feeship").text(`${priceFee.toLocaleString()}đ`);
                total();
              }else {
                $(".price-feeship").text(`0đ`)
              }
            },
            error: function(error) {
              console.log(error)
            }
          })
        }
      })
    </script>
@endsection
