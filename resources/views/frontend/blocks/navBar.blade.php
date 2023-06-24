<!-- navBar -->
<div class="navBar">
  <div class="container">
    <div class="navBar-container">
      <span>Trang chủ</span>
      <i class="fa fa-angle-right"></i>
      @if (isset($detail))
      <span>{{ isset($name) ? $name : "Tất cả sản phẩm" }}</span>
      <i class="fa fa-angle-right"></i> 
      <span class="navBar-text">{{ isset($detail) ? $detail : "Tất cả sản phẩm" }}</span>
      @else
      <span class="navBar-text">{{ isset($name) ? $name : "Tất cả sản phẩm" }}</span>
      @endif
    </div>
  </div>
</div>