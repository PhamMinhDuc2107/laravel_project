@extends("frontend.layout_cart")
@section('title')
    {{ isset($name)  ? "$name Plican" : "Tin Tức" }}
@endsection
@section("data-view")
<div class="container">
  <div class="login-container">
    <h2 class="login-title">Đăng kí tài khoản</h2>
    <form action="{{ url("customers/register-post") }}" method="post" class="form-group">
      @csrf
      <input type="text" placeholder="Họ và tên" class="login-input" name="name">
      <input type="text" placeholder="Số điện thoại" class="login-input" name="phone">
      <input type="text" placeholder="Email" class="login-input" name="email">
      <input type="password" placeholder="Mật khẩu" class="login-input" name="password">
      <button class="btn btn-login" style="padding: 10px 0">Đăng kí</button>
    </form>
    <div class="register">
      <span>Bạn đã có tài khoản đăng nhập </span><a href="{{ url("customers/login") }}">tại đây</a>
    </div>
    <div class="login-social">
      <p>Đăng nhập bằng facebook hoặc google</p>
      <div class="login-social-list">
        <div class="login-social-item blue">
          <i class="fa-brands fa-facebook-f"></i>
          <span>Facebook</span>
        </div>
        <div class="login-social-item red">
          <i class="fa-brands fa-google"></i>
          <span>Google</span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection