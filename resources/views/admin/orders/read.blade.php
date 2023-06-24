@extends("admin.layout")
@section("data-view")
<div class="container-fluid">
    <div class="col-md-12">
        <div class="panel panel-primary mt-3">
          <h3 class="mb-3">List Orders</h3>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr class="table-primary">
                        <th>Customer name</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th style="width:150px;">Status</th>
                        <th style="width:100px;"></th>
                    </tr>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ App\Http\Controllers\Admin\OrdersController::getCustomerName($row->customer_id) }}</td>
                        <td>{{ date("d/m/Y", strtotime($row->date)) }}</td>
                        <td>{{ number_format($row->price) }}</td>
                        <td style="text-align:center;">
                            @if($row->status == 2)
                                <span style="color:rgb(30, 198, 83);">Đã giao hàng</span>
                            @elseif($row->status == 1)
                                <span style="color:rgb(19, 183, 233)">Đang giao hàng</span>
                            @elseif($row->status == 0)
                                <span style="color:red">Chưa giao hàng</span>
                            @endif
                        </td>
                        <td style="text-align:center;">
                                <a href="{{ url('backend/orders/detail/'.$row->id) }}" class="label label-warning">Chi tiết</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <style type="text/css">
                    .pagination{padding:0px; margin:0px;}
                </style>
                {{ $data->render() }}
            </div>
        </div>
    </div>
</div>
@endsection