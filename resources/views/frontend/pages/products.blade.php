@extends('frontend.layout_cart')
@section('data-view')
      <!-- main -->
  <div class="main">
    <div class="container">
      <div class="main-container">
        <!-- category-products -->
        <div class="category-products">
          <!-- sortBar -->
          <div class="sortBar">
            <div class="sortBar-left">
              <h4>
                Tất cả sản phẩm
                <span>( @php echo $data->count() @endphp sản phẩm ) </span>
              </h4>
            </div>
            <div class="sortBar-right">
              <span>Sắp xếp:</span>
              <select class="sortBar-select" onchange="location.href ='{{ url('products/?order=') }}'+this.value">
                <option value="0">Sắp xếp</option>
                <option @if($order == 'priceAsc') selected @endif value="priceAsc">Giá tăng dần</option>
                <option @if($order == 'priceDesc') selected @endif value="priceDesc">Giá giảm dần</option>
                <option @if($order == 'nameAsc') selected @endif value="nameAsc">Sắp xếp A-Z</option>
                <option @if($order == 'nameDesc') selected @endif value="nameDesc">Sắp xếp Z-A</option>
              </select>
            </div>
          </div>
          <!-- /sortBar -->
          <!-- products -->
          <div class="productsShop">
            <div class="productShop-list">
              @foreach ($data as $item)
                {{-- product-item --}}
              <li>
                <a href="./productDetail.html" class="productShop-item">
                  <div class="product-item-img">
                    @if ($item->discount != null)
                    <span class="product-item-sale">- {{ $item->discount }}%</span>
                    @endif
                    <div class="product-item-content">
                      <img src="{{ asset("upload/products/$item->photo") }}"
                        alt="" />
                      <div class="overplay-product">
                        <i class="fa fa-search overplay-product-icon icon-viewProduct"
                          data-tooltip="Tìm kiếm"></i>
                        <i class="fa-solid fa-cart-shopping overplay-product-icon"
                          data-tooltip="Giỏ hàng"></i>
                      </div>
                    </div>
                  </div>
                  <a class="product-info" href="{{ url("products/detail/$item->id")}}">
                    <span class="product-info-name">{{ App\Models\Admin\ProductsModel::getCategoryName($item->category_id) }}</span>
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
            <ul class="page-list">
              <li class="page-item">
                <a href="" class="page-item-link">
                  <i class="fa-solid fa-angles-left"></i>
                </a>
              </li>
              <li class="page-item">
                <a href="" class="page-item-link">1</a>
              </li>
              <li class="page-item">
                <a href="" class="page-item-link">2</a>
              </li>
              <li class="page-item">
                <a href="" class="page-item-link">3</a>
              </li>
              <li class="page-item">
                <a href="" class="page-item-link">4</a>
              </li>
              <li class="page-item">
                <a href="" class="page-item-link">5</a>
              </li>
              <li class="page-item">
                <a href="" class="page-item-link">6</a>
              </li>
              <li class="page-item">
                <a href="" class="page-item-link">
                  <i class="fa-solid fa-angles-right"></i>
                </a>
              </li>
            </ul>
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
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="asus" />
                  <label for="asus">Asus</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="acer" />
                  <label for="acer">Acer</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="apple" />
                  <label for="apple">Apple</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="aukey" />
                  <label for="aukey">Aukey</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="awei" />
                  <label for="awei">Awei</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="belkin" />
                  <label for="belkin">Belkin</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Canon" />
                  <label for="Canon">Canon</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Cliptect" />
                  <label for="Cliptect">Cliptect</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Dell" />
                  <label for="Dell">Dell</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Hola" />
                  <label for="Hola">Hola</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Hp" />
                  <label for="Hp">Hp</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Huawei" />
                  <label for="Huawei">Huawei</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Iphone" />
                  <label for="Iphone">Iphone</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Jelly" />
                  <label for="Jelly">Jelly</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Kanen" />
                  <label for="Kanen">Kanen</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Lenovo" />
                  <label for="Lenovo">Lenovo</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="LG" />
                  <label for="LG">LG</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Nokia" />
                  <label for="Nokia">Nokia</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Oppo" />
                  <label for="Oppo">Oppo</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Samsung" />
                  <label for="Samsung">Samsung</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Toshiba" />
                  <label for="Toshiba">Toshiba</label>
                </li>
                <li class="sideBar-aside-item">
                  <input type="checkbox" name="" id="Xiaomi" />
                  <label for="Xiaomi">Xiaomi</label>
                </li>
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