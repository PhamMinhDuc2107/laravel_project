
<div class="header-top">
  <div class="container">
    <div class="header-top-container">
      <ul class="content">
        <li>
          <i class="fa-solid fa-book-bookmark"></i>
          <a href="">Chính sách của Pelican Store</a>
        </li>
        <div class="line"></div>
        <li>
          <i class="fa fa-home"></i>
          <a href=""> Tin khuyến mãi tháng 11 </a>
          <img src="frontend/images/icon-hot-top.webp" alt="" />
        </li>
      </ul>
      <ul class="content">
        <li>
          <i class="fa fa-home"></i>
          <a href=""> Gửi phản hồi về sản phẩm</a>
        </li>
        <div class="line"></div>
        <li>
          <i class="fa fa-home"></i>
          <a href="">Hotline: 19006750</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- /header-top -->
<!-- header-content -->
<div class="header-topbar">
  <div class="container">
    <div class="header-topbar-container">
      <div class="header-left">
        <i class="fa fa-bars header-menu"></i>
        <a href="{{ url("") }}">
          <img src="{{ asset("frontend/images/logo.png") }}" alt="" />
        </a>
      </div>
      <!-- header center -->
      <div class="header-center">
        <div class="header-category">
          Danh mục sản phẩm
          <i class="fa fa-align-right"></i>
        </div>
        <ul class="header-category-list">
          <li class="header-category-item">
            <a href="{{ url("/products") }}" class="header-category-item-link">
              <div>
                <i class="fa fa-heart"></i>
                Tất cả sản phẩm
              </div>
              <i class="fa-solid fa-caret-right header-category-item-icon"></i>
            </a>
            <ul class="header-nav-list">
              @php
                 $categories =  App\Http\Controllers\Components\StaticController::getCategories()
              @endphp
              @if (isset($categories))
                @foreach ($categories as $item)
                <li class="header-nav-item">
                  <a href="{{ url("/products/$item->id") }}" class="header-nav-link">{{ $item->name }}</a>
                </li>
                @endforeach
              @endif
            </ul>
          </li>
          <li class="header-category-item">
            <a href="{{ url('products/news') }}" class="header-category-item-link">
              <div><i class="fa fa-heart"></i> Sản phẩm mới</div>
            </a>
          </li>
          <li class="header-category-item">
            <a href="{{ url('products/hot') }}" class="header-category-item-link">
              <div><i class="fa fa-heart"></i> Sản phẩm nổi bật</div>
            </a>
          </li>
          <li class="header-category-item">
            <a href="{{ url("products/sale") }}" class="header-category-item-link">
              <div>
                <i class="fa fa-heart"></i> Sản phẩm khuyến mãi
              </div>
            </a>
          </li>
        </ul>
          <div class="header-search">
            <input type="text" onkeyup="ajaxSearch()" onkeypress="searchForm(event)" value="" placeholder="Nhập từ khóa tìm kiếm..." id="key" class="header-search-input" autocomplete="off">
          <button class="header-search-btn" type="submit" onclick="location.href='{{ url('/search') }}?key='+document.getElementById('key').value;">Tìm kiếm</button>
          <div class="search-result">
            <ul></ul>
          </div>
          <script type="text/javascript">
            function searchForm(event){
              if(event.which == 13)
                location.href = '{{ url('search') }}?key='+document.getElementById('key').value;
            }  
            function ajaxSearch(){
              let key = document.getElementById('key').value;
              if(key != ''){
                $(".search-result").attr('style','visibility:visible');
                $.ajax({
                  url: "{{ url('/ajax-search') }}?key="+key,
                  success: function( result ) {
                    
                    $('.search-result ul').html(result);
                  }
                });
              }else {
              $(".search-result").attr('style','visibility:hidden');
              }
            }
          </script>
        </div>
      </div>
      <!-- /haeder-center -->
      <!-- header-right -->
      <div class="header-right">
        @php
          $customer_name = session()->get("customer_name");
        @endphp
        @if (isset($customer_name))
          <div class="header-register">
            <div class="header-login">
              <i class="fa-regular fa-user"></i>
              <span>
                {{ $customer_name }}
              </span>
            </div>
            <div class="infor-manage">
              <a href="">Thông tin khách hàng</a>
              <a href="">Thông tin đơn hàng</a>
              <a href="{{ url("customers/logout") }}">Logout</a>
            </div>
          </div>
          
        @else
        <a href="{{ url("customers/login") }}" class="header-register">
          <i class="fa-regular fa-user"></i>
          <span>
            Tài Khoản
          </span>
        </a>
        @endif
        @php
            use App\Http\ShoppingCart\Cart;
            $number = Cart::cartNumber();
        @endphp
        <div class="header-cart-container">
          <a href="{{ url('cart') }}" class="header-cart">
            <span><i class="fa fa-bag-shopping"></i></span>
            <span class="header-cart-text">{{ isset($number) ? $number : 0  }}</span>
          </a>
          
          <div class="cart-mini">
            @if(Cart::cartNumber() > 0)
            @php
              $cart = Cart::cartList();
            @endphp  
            <ul class="cart-mini-list">
              @foreach($cart as $product)
              <li class="cart-mini-item">
                <img src="{{ asset('upload/products/'.$product['photo']) }}" alt="">
                <div class="cart-mini-item-content">
                  <a href="{{ url('products/detail/'.$product['id']) }}" class="cart-mini-name">{{ $product['name'] }}</a>
                  <br>
                  <span class="cart-mini-price">{{ number_format($product['price']) }}<span class="cart-mini-number"> x {{ $product['quantity'] }}</span></span>
                </div>
                <a href="{{ url('cart/remove/'.$product['id']) }}" class="cart-mini-item-icon"><i class="fa fa-close"></i></a>
              </li>
              @endforeach            
            </ul>
            @endif
            <div class="cart-mini-footer">
              @if(Cart::cartTotal() > 0) 
              <div class="cart-mini-total">Tổng cộng: 
                <span>{{ number_format(Cart::cartTotal()) }}</span>
              </div>
              <a href="{{ url("#") }}" class="viewProduct-btn cart-mini-btn">Tiến hàng thanh toán</a>
              @else 
              <p style="color: #2f2f3c">Không có sản phẩm nào trong giỏ</p>
              @endif
            </div>
          </div>
        </div>
      </div>
      <!-- /heaeder-right -->
    </div>
  </div>
</div>