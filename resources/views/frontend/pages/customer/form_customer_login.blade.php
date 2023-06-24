@extends("frontend.layout_cart")
@section("data-view")
<div class="container">
  <div class="login-container">
    <h2 class="login-title">Đăng nhập tài khoản</h2>
    @if (isset($_GET['notify']))
      <p class="notify">Sai tài khoản hoặc mật khẩu</p>
    @endif
    <form action="{{ url("customers/login-post") }}" method="post" class="form-group">
      @csrf
      <input type="text" placeholder="Email" class="login-input" name="email">
      <input type="password" placeholder="Mật khẩu" class="login-input" name="password">
      <a href="#" class="forgot-password">Quên mật khẩu?</a>
      <button class="btn btn-login">Đăng nhập</button>
    </form>
    <div class="register">
      <span>Chưa có tài khoản đăng kí </span><a href="{{ url("customers/register") }}">tại đây</a>
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