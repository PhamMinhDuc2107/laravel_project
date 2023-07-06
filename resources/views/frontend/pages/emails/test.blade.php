<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@php
    use App\Http\ShoppingCart\Cart;
@endphp
<style>
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box
  }
  .wrapper {
    
  }
  .btn-shop {
    
  }
</style>
  <div class="pt-4 wrapper" style="padding: 20px; border-bottom: 10px solid #eee; margin: 0 auto;
  max-width: 730px;">
    <div class="" style="width:300px;color: #0f116d;
    display: flex;
    align-items:center;
    justify-content: center;
    margin: 0 auto">
      <img src="https://cdn2.iconfinder.com/data/icons/symbols-8/50/1F17F-p-button-256.png" alt="" class="d-inline-block" style="width: 60px;margin-right: 10px;">
      <span style="font-size: 35px" style=" font-weight: 800;">PlicanShop</span>
    </div>
    <div class="text-center" style="text-align:center">
      <p style="font-size: 18px; color: #0f116d; margin-top:30px">Cảm ơn bạn đã đặt hàng tại PlicanShop</p>
    </div>
    <div style="color: #202020">
      <h3 style="font-size: 16px; color:#202020;">Xin chào {{ isset($data) ? $data['name'] : "" }},</h3>
      <p style="margin: 20px 0; font-size: 14px">PlicanShop đã nhận được yêu cầu đặt hàng của bạn và đang xử lý nhé. Bạn sẽ nhận được thông báo tiếp theo khi đơn hàng đã sẵn sàng được giao.</p>
      <div class="text-center my-4"><a href="#" style="
      background:  linear-gradient(to right, #FF9000, #FF00FC);
    color: white;
    text-align: center;
    border: none;
    text-decoration: none;
    padding: 15px 40px;
    border-radius: 4px;
    display: inline-block;
      ">TÌNH TRẠNG ĐƠN HÀNG</a></div>
      <p style="margin: 20px 0; font-size: 14px"><b>*Lưu ý nhỏ cho bạn:</b>Bạn chỉ nên nhận hàng khi trạng thái đơn hàng là “<b>Đang giao hàng</b>” và nhớ kiểm tra Mã đơn hàng, Thông tin người gửi và Mã vận đơn để nhận đúng kiện hàng nhé.</p>
    </div>
  </div>
  <div class="pt-4 wrapper" style="padding: 20px; border-bottom: 10px solid #eee;margin: 0 auto;
  max-width: 730px;">
    <h3 style="font-size: 16px; color:#202020;">Địa chỉ giao hàng,</h3>
    <table cellpadding="2px" width="100%" style="font-size: 14px">
      <tbody>
        <tr>
          <td width="25%" style="color:#0f146d;font-weight:bold">Tên:</td>
          <td width="75%">{{ isset($data) ? $data['name'] : "" }}</td>
        </tr>
        <tr>
          <td width="25%" style="color:#0f146d;font-weight:bold">Địa chỉ:</td>
          <td width="75%">{{ isset($data) ? $data['address'] : "" }}</td>
        </tr>
        <tr>
          <td width="25%" style="color:#0f146d;font-weight:bold">Điện thoại:</td>
          <td width="75%">{{ isset($data) ? $data['phone'] : "" }}</td>
        </tr>
        <tr>
          <td width="25%" style="color:#0f146d;font-weight:bold">Email:</td>
          <td width="75%">{{ isset($data) ? $data['email'] : "" }}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="pt-4 wrapper" style="padding: 20px; border-bottom: 10px solid #eee;margin: 0 auto;
  max-width: 730px;">
    <h3 style="font-size: 16px; color:#202020;" class="mb-3">Kiện hàng,</h3>
    <div class="" style="padding-left:10px;margin-top:0px;margin-bottom:0px;color:#585858;font-size: 14px;">
      Được bán bởi: PLICANSHOP.
    </div>
    <table cellpadding='2' style="width: 100%; font-size: 14px"> 
      <tbody>
        @if ($cart)
        @foreach ($cart as $item)
        <tr>
          <td width="40%">
            <img src="{{ asset("upload/products/".$item['photo']) }}" alt="" style="width: 160px; height: 160px; object-fit:cover">
          </td>
          <td width="60%" class="">
            <div  style="">
              <div class="my-1">{{ $item['name'] }}</div>
              <div class="my-1" style="color: #f27c24">{{ number_format($item['price']) }}đ</div>
              <div class="my-1">Số lượng: {{ $item['quantity'] }}</div>
            </div>
          </td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
  </div>
  <div class="pt-4 wrapper" style="padding: 20px;margin: 0 auto;
  max-width: 730px;">
    <table class="" cellpadding='2' style="width:100%;">
      <tbody>
        <tr class="flex pb-2" style="line-height: 35px">
          <td width="50%">
            Thành tiền:</td>
          <td width="20%" style="text-align:right">VND</td>
          <td width="30%" style="text-align:right">{{ number_format(Cart::cartTotal()) }}</td>
        </tr>
        <tr class="flex pb-2" style="line-height: 35px">
          <td width="50%">
            Phí vận chuyển:</td>
          <td width="20%" style="text-align:right">VND</td>
          <td width="30%" style="text-align:right">{{ isset($feeship) ? number_format($feeship) : "0" }}</td>
        </tr>
        <tr class="flex pb-2" style="line-height: 35px">
          <td width="50%">
            Giảm giá:</td>
          <td width="20%" style="text-align:right">VND</td>
          <td width="30%" style="text-align:right">{{ isset($coupon_discount) ? number_format($coupon_discount) : "0" }}</td>
        </tr>
        <tr class="flex" style="line-height: 35px;  border-bottom: 1px solid #eee">
          <td width="50%">
            Tổng cộng:</td>
          <td width="20%" style="text-align:right;color: #f27c24">VND</td>
          <td width="30%" style="text-align:right;color: #f27c24">{{ isset($total) ? number_format($total) : "0" }}</td>
        </tr>
        <tr class="flex" style="line-height: 35px;">
          <td width="50%">
           Tuỳ chọn vận chuyển:</td>
          <td width="20%" style="text-align:right;"></td>
          <td width="30%" style="text-align:right;">Giao hàng tiêu chuẩn</td>
        </tr>
        <tr class="flex" style="line-height: 35px;">
          <td width="50%">
           Hình thức thanh toán:</td>
          <td width="20%" style="text-align:right"></td>
          <td width="30%" style="text-align:right">Thanh toán khi nhận hàng
          </td>
        </tr>
      </tbody>
    </table>
  </div>