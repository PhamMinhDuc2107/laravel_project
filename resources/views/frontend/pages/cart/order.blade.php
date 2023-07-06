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
    <form  class="form-order" method="post" action="{{ url("cart/check-pay") }}">
      @csrf
      <div class="main">
        <h3 class="main-logo">Plican</h3>
        <div style="display: flex">
          <div class="main-left">
            <div action="" class="main-form">
              <h4 class="main-form-title">Thông tin nhận hàng</h4>
              <div class="main-form-input">
                <input type="text" name="email" value="{{ session('customer_email') ? session('customer_email') : '' }}"class="form-input input-email" placeholder="Email">
              </div>
              <div class="main-form-input">
                <input type="text" name="name" value="{{ session('customer_name') ? session('customer_name') : '' }}"class="form-input input-name" placeholder="Họ và tên">
              </div>
              <div class="main-form-input">
                <input type="number" name="phone" class="form-input input-phone" value="{{ session('customer_phone') ? session('customer_phone') : '' }}" placeholder="Số điện thoại">
              </div>
              <div class="customer-select-box">
                <select name="city" id="city">
                  <option value=""select>Thành Phố</option>
                  @if($city)
                    @foreach ($city as $item)
                      <option value="{{ $item->name_city }}" data-id="{{ $item->matp }}">{{ $item->name_city }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="customer-select-box">
                <select name="district" id="districts">
                  <option value="" selected>Quận Huyện</option>
                </select>
              </div>
              <div class="customer-select-box">
                <select name="commune" id="commune">
                  <option value="">Xã</option>
                </select>
              </div>
              <div class="main-form-input">
                <input type="text" class="form-input input-address" placeholder="Địa chỉ" name="address">
              </div>
              <div class="main-form-input">
                <textarea type="text" placeholder="Ghi chú..." class="input-note" name="note"></textarea>
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
              <input type="text" disabled class="price-feeship" name="feeship" value="">
            </div>
            <h4 class="main-form-title">Thanh toán</h4>
            <div class="right-wrapper">
              <div class="input-group">
                <input type="radio" id="box1" name="paymentMethod" value="cash" class="input-ship" >
                <label for="box1">Thanh toán khi nhận hàng(COD)</label>
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
                <div class="aside_item-price">{{number_format($item['price'], 0, ',', '.') }}đ</div>
              </div>
              @endforeach
            @endif
          </div>
          <div class="aside_coupons">
            <div class="main-form-input">
              <input type="text" name="coupon" class="input-coupon" placeholder="Mã giảm giá" >
            </div>
            <input value="Áp dụng" class="coupons-btn">
          </div>
          <div class="coupon-alert">
            <span class="coupon-success"></span>
            <span class="coupon-errors"></span>
          </div>
          <div class="aside_price">
            <div class="aside_price-item">
              <span>Tạm tính</span>
              <span class="price">{{ number_format(Cart::cartTotal(), 0, ',', '.') }}đ</span>
            </div>
            <div class="aside_price-item">
              <span>Phí vận chuyển</span>
              <input disabled class="price-feeship price-fee">
            </div>
            <div class="aside_price-item">
              <span>Discount</span>
              <span class="aside_price-coupon">0đ</span>
            </div>
          </div>
          <div class="aside_price-total">
            <span>Tổng cộng</span>
            <p class="price-total">{{ number_format(Cart::cartTotal(), 0, ',', '.') }}đ</p>
          </div>
          <div class="aside_btn">
            <a href="{{ url("cart") }}" >
              <i class="fa fa-angle-left"></i>
              Quay về giỏ hàng
            </a>
            <button type="submit" class="aside_btn-submit">Đặt hàng</button>
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
            let total = price;
            let discountText = $(".aside_price-coupon").text().split("đ")[0];
            let feeShipText = $(".price-fee").val().split("đ")[0];
            let feeShip= +(feeShipText.replace(/[.,\s₫]/g, ""));
            let discount= +(discountText.replace(/[.,\s₫]/g, ""));
            total = price + feeShip - discount;
            let totalFormat = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(total)
           $(".price-total").text(`${totalFormat}`)
        }
        total();
        // address
        function ajaxAdrress(select,select2,url) {
          $(`#${select}`).change(function(e) {
          let selectedOption = $(this).find(":selected");
          let id = selectedOption.data("id");
          let communeSelect = $(`#${select2}`);
          communeSelect.empty();
          if(id != "") {
            $.ajax({
              url:`${url}`+id,
              success: function( result ) {
                console.log(result)
                $.each(result, function(index, item) {
                  communeSelect.append(
                      `<option value="${item.name}" data-id ='${item.id}'>${item.name}</option>`
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
              let discountFormat = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(result.discount)
              console.log(result)
              if(result.code != null) {
                $('.coupon-success').text(`Áp dụng thành công`);
                $(".aside_price-coupon").text(`${discountFormat}`)
                total()
              } else  {
                $('.coupon-errors').text(`Mã không hợp lệ`);
                $(".aside_price-coupon").text(`0đ`)
              }
            },
            error: function(xhr, status, error) {
              console.error(error);
            }

          })
        })
        //feeship
        $('#city').change(function(e) {
          let selectedOption = $(this).find(":selected");
          let id = selectedOption.data("id");
          ajaxFeeShip('city',id);
        })
        $('#districts').change(function(e) {
          let selectedOption = $(this).find(":selected");
          let id = selectedOption.data("id");
          ajaxFeeShip('districts',id);
        })
        $('#commune').change(function(e) {
          let selectedOption = $(this).find(":selected");
          let id = selectedOption.data("id");
          ajaxFeeShip('commune', id);
        })
        function ajaxFeeShip(name, id) {
          $(".price-feeship").val("0đ")
          $.ajax({
            url: "{{ url('cart/feeShip') }}",
            method: 'post',
            data: {
              _token: "{{ csrf_token() }}",
              [name]: [id],
            },
            success: function(result) {
              console.log(result);
              if(result) {
                let priceFee = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(result.feeship || "30000");
                if (typeof priceFee !== 'undefined' && priceFee !== null) {
                  $(".price-feeship").val(priceFee);
                } 
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
