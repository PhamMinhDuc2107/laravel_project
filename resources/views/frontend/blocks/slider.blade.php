<!-- slider -->
<div class="slider">
  <div class="container">
    <div class="slider-container">
      <div href="#" class="slider-link slider-list-images">
            @if ($sliders)
            @foreach ($sliders as $item)
            <img src="{{ asset("upload/sliders/$item->images") }}" alt=""
              class="slider-img" />
            @endforeach
          @endif
      </div>
      <div class="slider-right">
        <a href="#" class="slider-link">
          <img src="{{ asset("frontend/images/banner_slide_img_1.webp") }}" alt=""
            class="slider-img" />
          <div class="overplay-hover">
            <img src="frontend/images/icon-plus.png" alt=""
              class="overplay-hover-icon" />
          </div>
        </a>
        <a href="#" class="slider-link">
          <img src="{{ asset("frontend/images/banner_slide_img_2.webp") }}" alt=""
            class="slider-img" />
          <div class="overplay-hover">
            <img src="frontend/images/icon-plus.png" alt=""
              class="overplay-hover-icon" />
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<script>
  $('.slider-list-images').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows:false,
});
		
</script>
<!-- /slider -->
