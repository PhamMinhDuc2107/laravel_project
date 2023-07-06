@extends('frontend.layout_blog')
@section('title')
    {{ isset($detail)  ? "$detail Plican" : "Tin Tức" }}
@endsection
@section('data-view')
<div class="newDetail">
  <div class="container">
  <div class="newDetail-container">
    <div class="newDetail-left">
      <div>
        <h3 class="newDetail-title">
          {{ $record->name }}
        </h3>
        <div class="newDetail-author">
          <span><b>Đăng bởi:</b>
            <span class="newDetail-author-name">Mr Hà</span></span>
          <div class="newDetail-author-date">
            <i class="fa-regular fa-clock"></i>
            <span>{{ date("d-m-Y", strtotime($record->date)) }}</span>
          </div>
        </div>
        <div class="newDetail-article">
          <h3 class="newDetail-article-title">
            {!! $record->description !!}
          </h3>
          {!! $record->content !!}
         <div class="newDetail-social">
           <span><i class="fa-brands fa-twitter c-tw"></i> Tweet</span>
           <span><i class="fa-brands fa-facebook-f c-fb"></i> Facebook</span>
           <span><i
               class="fa-brands fa-pinterest-p c-pin"></i>Printerest</span>
          </div>
        </div>
        <!-- form comment -->
        <div class="form-comment">
          <h4 class="form-comment-text">Viết bình luận:</h4>
          <div class="form-comment-group">
            <input type="text" class="form-comment-input"
              placeholder="Họ tên:" />
            <input type="text" class="form-comment-input"
              placeholder="Email:" />
          </div>
          <textarea name="" id="" cols="30" rows="10" placeholder="Nội dung:"
            class="form-comment-input-full"></textarea>
          <button class="form-comment-btn">Gửi bình luận</button>
        </div>
      </div>
    </div>
    @include('frontend.blocks.aside_blog')
  </div>
    
  </div>
</div>
@endsection
