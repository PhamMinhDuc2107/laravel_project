  <!-- aside-blog -->
  <div class="aside-blog">
    <div class="aside-item">
      <h3 class="aside-item-title">Thông tin</h3>
      <div class="aside-item-content">
        <ul class="aside-blog-menu">
          <li class="aside-blog-item">
            <a href="" class="aside-blog-link">Trang chủ</a>
          </li>
          <li class="aside-blog-item aside-menu-1">
            <a href="#" class="aside-blog-link"> Sản phẩm </a>
            <i class="fa-solid fa-caret-down blog-icon"></i>
            <ul class="menu-2">
              <li class="menu-2-item aside-menu-2">
                <a href="#" class="menu-2-link">Tất cả sản phẩm</a>
                <i class="fa fa-caret-down blog-icon"></i>
                <ul class="menu-3">
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Điện thoại</a>
                  </li>
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Tablet</a>
                  </li>
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Laptop</a>
                  </li>
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Tivi</a>
                  </li>
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Máy ảnh</a>
                  </li>
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Phụ kiện</a>
                  </li>
                </ul>
              </li>
              <li class="menu-2-item">
                <a href="" class="menu-2-link">Sản phẩm mới</a>
              </li>
              <li class="menu-2-item">
                <a href="" class="menu-2-link">Sản phẩm nổi bật</a>
              </li>
              <li class="menu-2-item">
                <a href="" class="menu-2-link">Sản phẩm khuyến
                  mãi</a>
              </li>
              <li class="menu-2-item">
                <a href="" class="menu-2-link">Máy likenew</a>
              </li>
              <li class="menu-2-item">
                <a href="" class="menu-2-link">Máy cũ giá rẻ</a>
              </li>
            </ul>
          </li>
          <li class="aside-blog-item">
            <a href="" class="aside-blog-link">Blog</a>
          </li>
          <li class="aside-blog-item">
            <a href="" class="aside-blog-link">Giới thiệu</a>
          </li>
          <li class="aside-blog-item">
            <a href="" class="aside-blog-link">Liên hệ</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="aside-item">
      <h3 class="aside-item-title red">Thông tin</h3>
      <div class="aside-item-content">
        <ul class="aside-blog-menu">
          <li class="aside-blog-item">
            <a href="{{ asset("") }}" class="aside-blog-link">Trang chủ</a>
          </li>
          <li class="aside-blog-item aside-menu-1">
            <a href="" class="aside-blog-link"> Sản phẩm </a>
            <i class="fa-solid fa-caret-down blog-icon"></i>
            <ul class="menu-2">
              <li class="menu-2-item aside-menu-2">
                <a href="{{ asset("/products") }}" class="menu-2-link">Tất cả sản phẩm</a>
                <i class="fa fa-caret-down blog-icon"></i>
                <ul class="menu-3">
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Điện thoại</a>
                  </li>
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Tablet</a>
                  </li>
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Laptop</a>
                  </li>
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Tivi</a>
                  </li>
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Máy ảnh</a>
                  </li>
                  <li class="menu-3-item">
                    <a href="" class="menu-3-link">Phụ kiện</a>
                  </li>
                </ul>
              </li>
              <li class="menu-2-item">
                <a href="" class="menu-2-link">Sản phẩm mới</a>
              </li>
              <li class="menu-2-item">
                <a href="" class="menu-2-link">Sản phẩm nổi bật</a>
              </li>
              <li class="menu-2-item">
                <a href="" class="menu-2-link">Sản phẩm khuyến
                  mãi</a>
              </li>
            </ul>
          </li>
          <li class="aside-blog-item">
            <a href="" class="aside-blog-link">Blog</a>
          </li>
          <li class="aside-blog-item">
            <a href="" class="aside-blog-link">Giới thiệu</a>
          </li>
          <li class="aside-blog-item">
            <a href="" class="aside-blog-link">Liên hệ</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="aside-item">
      <h3 class="aside-item-title yellow">Tin tức nổi bật</h3>
      <div class="aside-item-content">
        @foreach ($hot as $item)
        <div class="aside-article-item">
          <img src="{{ asset("upload/news/$item->photo") }}" alt="" class="aside-article-img" />
          <div class="aside-article-content">
            <h4 class="aside-article-title">
              {{ $item->name }}
            </h4>
            <span class="aside-article-date">
              <i class="fa-regular fa-clock"></i>
             {{ date("d-m-Y", strtotime($item->date)) }}
            </span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- /aside-blog -->