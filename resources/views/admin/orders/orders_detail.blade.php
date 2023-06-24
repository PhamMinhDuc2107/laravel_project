@extends("admin.layout")
@section("data-view")

<div class="container-fluid">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <h3 class="panel-heading">Thông tin đơn hàng</h3>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td style="width:200px;">Tên khách hàng</td>
                        <td>{{ isset($customer->name) ? $customer->name : "" }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ isset($customer->email) ? $customer->email : "" }}</td>
                    </tr>
                    <tr>
                        <td>ngày mua</td>
                        <td>{{ isset($order->date) ? date("d/m/Y", strtotime($order->date)) : "" }}</td>
                    </tr>
                    <tr>
                        <td>Tổng giá</td>
                        <td>{{ isset($products->price) ? number_format($products->price * $products->quantity) : "" }}</td>
                    </tr>
                    <tr>
                        <td>Trạng thái giao hàng</td>
                        <td>
                            @if($order->status == 2)
                                <span style="color:rgb(30, 198, 83);">Đã giao hàng</span>
                            @elseif($order->status == 1)
                                <span style="color:rgb(19, 183, 233)">Đang giao hàng</span>
                            @elseif($order->status == 0)
                                <span style="color:red">Chưa giao hàng</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel panel-primary">
            <h3 class="panel-heading">Chi tiết đơn hàng</h3>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr class="table-primary">
                        <th style="width:100px;">Photo</th>
                        <th>Name</th>
                        <th style="width:100px;">Price</th>
                        <th style="width:80px;">Discount</th>
                        <th style="width:80px;">Quantity</th>
                    </tr>
                            <tr>
                                <td>
                                    @if($products->photo != "" && file_exists('upload/products/'.$products->photo))
                                    <img src="{{ asset('upload/products/'.$products->photo) }}" style="width:100px;">
                                    @endif
                                </td>
                                <td>{{ $products->name }}</td>
                                <td>{{ number_format($products->price) }}</td>
                                <td style="text-align:center;">{{ $products->discount }}%</td>
                                <td style="text-align:center;">{{ $products->quantity }}</td>
                            </tr>
                </table>
            </div>
        </div>
        <div style="margin-bottom:5px;">        
          <a href="#" onclick="history.go(-1);" class="btn btn-danger">Quay lại</a>
          @if($order->status = 0)
          <a href="{{ url('backend/orders/update/'.$order->id) }}" class="btn btn-primary">Thực hiện giao hàng</a>     
          @elseif($order->status = 1)
          <a href="{{ url('backend/orders/update/'.$order->id) }}" class="btn btn-success ml-4">Hoàn thành</a>     
          @elseif($order->status != 2 && $order->status != 1 && $order->status != 0)
            <a href=""></a>
          @endif  
      </div>
    </div>
</div>
@endsection