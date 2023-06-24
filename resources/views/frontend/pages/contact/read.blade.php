@extends("frontend.layout_blog")
@section("data-view")
<div class="contact">
	<div class="container">
		<div class="contact-container">
			<div style="
			width: 77.5%" class="contact-left">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59826.429127236304!2d106.12569724469947!3d20.417832647018972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135e0adb8d5f1cd%3A0xb5f4baba00e67462!2zVHAuIE5hbSDEkOG7i25oLCBOYW0gxJDhu4tuaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1687257240970!5m2!1svi!2s" style="border:none; width: 100%; height: 500px;padding-top: 30px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				<h4>Liên hệ</h4>
				<h3>Thông tin liên hệ</h3>
				<p><span>Địa chỉ</span> :  Ladeco Building, 266 Doi Can Street, Ba Dinh District, Ha Noi</p>
				<p><span>Điện thoại</span> :     19006750</p>
				<p><span>Email</span> :  <a href="#">support@sapo.vn</a></p>
				<div class="form-contact">
					<h4>Form liên hệ</h4>
					<h3>Gửi góp ý cho Plican</h3>
					<form action="">
						<div class="form-contact-group">
							<label for="name">Tên của bạn</label>
							<input type="text" name="name" id="name" class="form-contact-input" placeholder="Tên của bạn">
						</div>
						<div class="form-contact-group">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" class="form-contact-input" placeholder="Email">
						</div>
						<div class="form-contact-group">
							<label for="content">Nội dung</label>
							<textarea name="content" id="content" placeholder="Nội dung" class="form-contact-text"></textarea>
						</div>
						<input type="submit" value="Gửi liên hệ" name="submit" class="form-contact-btn">
					</form>
				</div>
			</div>
			<div>@include('frontend.blocks.aside_blog')</div>
		</div>
	</div>
</div>
@endsection