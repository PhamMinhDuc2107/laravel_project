@extends('frontend.layout_blog')
@section('data-view')
<div class="newMain">
  <div class="container">
    <div class="newMain-container">
      <div class="newMain-left">
        <h3 class="newMain-title">Tin tức</h3>
        <ul class="newMain-article-list">
          @if(isset($data)) 
            @foreach ($data as $item)
            <li class="newMain-article-item">
              <a href="{{ url("blog/detail/$item->id") }}" class="newMain-article-links">
                <img src="{{ asset("upload/news/$item->photo") }}" alt=""
                  class="newMain-article-img" />
                <span class="newMain-article-img-text">Tin tức</span></a>
              <div class="newMain-article-content">
                <span class="newMain-article-date">{{ date("d-m-Y", strtotime($item->date)) }}</span>
                <h3 class="newMain-article-title">
                  {{ $item->name }}
                </h3>
                <span class="newMain-article-text">
                  {!! $item->description !!}
                </span>
              </div>
              <a href="BlogDetail"
                class="newMain-article-learn-more"><i
                  class="fa fa-angle-right"></i></a>
            </li>
            @endforeach
          @endif
        </ul>
      </div>
      @include("frontend.blocks.aside_blog")
    </div>
  </div>
  @if (isset($data))
  <div class="pagination">
    {{ $data->links('pagination::bootstrap-4') }}
  </div>
  @endif
</div>
@endsection