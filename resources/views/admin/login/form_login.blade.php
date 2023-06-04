<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="admin/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{ asset("admin/css/styles.min.css") }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset("admin/images/logos/dark-logo.svg") }}" width="180" alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>
                @if (Request::get('notify') == "invalid")
                <div class="alert alert-danger">Sai email hoặc password</div>
                @endif
                @if ($errors->any()) 
                <div class="alert alert-danger">Sai email hoặc password</div>
                @endif
                <form method="post" action="{{ url("backend/login-post") }}">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                    @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="d-flex align-items-center justify-content-center mb-4">
                    <a class="text-primary fw-bold" href="#">Forgot Password ?</a>
                  </div>
                  <button type="submit" name="Login" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                    <a class="text-primary fw-bold ms-2" href="#">Create an account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset("admin/libs/jquery/dist/jquery.min.js") }}"></script>
  <script src="{{ asset("admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
</body>

</html>