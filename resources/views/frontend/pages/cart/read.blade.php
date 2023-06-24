@extends('frontend.layout_cart')
@section('data-view')
@php
  use App\Http\ShoppingCart\Cart;
@endphp
<div class="cartMain">
  <div class="container">
    <form class="cartMain-container" method="post" action="{{ url('cart/update') }}">
      @csrf
      <h2 class="cartMain-title">Giỏ hàng</h2>
      <div class="cartMain-header">
        <div>Sản phẩm</div>
        <div>Giá</div>
        <div>Số lượng</div>
        <div>Tổng tiền</div>
      </div>
      <ul class="cartMain-list">
       @if ($cart != null)
       @foreach ($cart as $item)
       <li class="cartMain-item">
         <div class="cartMain-item-info">
           <img src="{{ asset('upload/products/'.$item['photo'])  }}" alt="" class="cartMain-info-img">
           <div class="cartMain-info-content">
             <a href="{{ url('products/detail/'.$item['id']) }}" class="cartMain-info-name">{{ $item['name'] }}</a>
             <a href="{{ url("cart/remove/".$item['id']) }}" class="cartMain-info-remove">Xóa</a>
           </div>
         </div>
         <span class="cartMain-item-price">{{ number_format($item['price'] - ($item['price'] * $item['discount'] / 100)) }}đ</span>
         <div class="cartMain-item-amount">
            <input type="number" autocomplete="off" min="1" class="input-number" value="{{ $item['quantity'] }}" name="product_{{ $item['id'] }}" required="Không thể để trống">
         </div>
         <div class="cartMain-item-total">
           <span class="cartMain-total-number">{{ number_format($item['price'] - ($item['price'] * $item['discount'] / 100) * $item['quantity']) }}đ</span>
         </div>
       </li>
      @endforeach
      @else
      <li class="cartMain-item">
        <p>Không có sản phẩm nào</p>
      </li>
      @endif
      </ul>
      @if (Cart::cartTotal() > 0)
      <div class="cartMain-money">
        <span>Tổng tiền thanh toán:
          <span class="cartMain-money-total">{{ number_format(Cart::cartTotal()) }}₫</span>
        </span>
      </div>    
      @endif
      <div class="cartMain-pay">
        <a href="{{ url("products") }}" class="cartMain-pay-link">
          <button class="cartMain-pay-btn">Tiếp tục mua hàng</button>
        </a>
       <div>
        <input type="submit" class="cartMain-pay-btn" value="Cập nhật"></td>
        <span href="{{ url('cart/order') }}" class="cartMain-pay-link">
          <a class="cartMain-pay-btn" href="{{ url('cart/order') }}">Tiến hàng thanh toán</a>
        </span>
       </div>
      </div>
    </form>
  </div>
</div>
<!-- /cart-main -->
@endsection