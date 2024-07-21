@extends('layout.admin.app')

@section('producttracking', 'active')

@section('content')
    <div class="container">
        <h4>
            <i class="fas fa-shopping-cart"> My Order Detail</i>
        </h4>
        @if (Auth::user()->role == 1)
        <a href="{{ url('admin/detail/invoice/' . $order->id . '/generate') }}" class="btn text-white float-end m-2"
            style="background-color: #0bcf0b">Download Invoice</a>
        <a href="{{ url('admin/detail/invoice/' . $order->id) }}" target="_blank" class="btn text-white float-end m-2"
            style="background-color: #1077f4">View Invoice</a>
        @endif
  
            @if (Auth::user()->role == 2)
            <a href="{{ url('sale/detail/invoice/' . $order->id . '/generate') }}" class="btn text-white float-end m-2"
                style="background-color: #0bcf0b">Download Invoice</a>
            <a href="{{ url('sale/detail/invoice/' . $order->id) }}" target="_blank" class="btn text-white float-end m-2"
                style="background-color: #1077f4">View Invoice</a>
            @endif
        <div class="shadow bg-white p-3">
            <div class="row p-3">
                <div class="col-nd-6 mr-5">
                    <h5>Order Detail</h5>
                    <hr>
                    @if ($user->name == 'admin')
                        <h6>Order Id : {{ $order->id }}</h6>
                        <h6>Order Date : {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                        <h6>Payment : ##</h6>
                    @else
                        <h6>Order Id : {{ $order->id }}</h6>
                        <h6>Order Date : {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                        <h6>Payment : QR
                    @endif
                    <h6 class="border p-1 " style="color:black">
                        <?php
                        if ($order->status == 'in progress') {
                            echo 'Order Status Message: <span class="text-uppercase" style="color: #70d6f8;">' . $order->status . '</span>';
                        } elseif ($order->status == 'confirm') {
                            echo 'Order Status Message: <span class="text-uppercase" style="color: #00FF00;">' . $order->status . '</span>';
                        } else {
                            echo 'Order Status Message: <span class="text-uppercase" style="color: #FF0000;">' . $order->status . '</span>';
                        }
                        ?>
                    </h6>
                </div>

                <div class="col-nd-6">
                    <h5>User Detail</h5>
                    <hr>
                    @if ($user->name == 'admin')
                        <h6>User Name : {{ $order->full_name }}</h6>
                        <h6>Phone Number : {{ $order->phone_number }}</h6>
                    @else
                        <h6>User Name : {{ $user->name }}</h6>
                        <h6>Email : {{ $user->email }}</h6>
                        <h6>Phone Number : {{ $order->phone_number }}</h6>
                        <h6>Address : {{ $order->address }}</h6>
                    @endif
                </div>
            </div>
            <br>
            <h5>Order Item</h5>
            <hr>
            {{-- move to livewire  --}}
            <table class="table  text-center text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th>Item Id</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach ($order->orderItemproduct as $orderItem)
                        <tr>
                            <td width="10%">{{ $orderItem->id }}</td>
                            <td width="10%"><img src="{{ asset('storage/' . $orderItem->product->image) }}"
                                    class="mr-3" style="height: 100px !important" alt="">
                            </td>
                            <td>{{ $orderItem->product->model }}</td>
                            <td width="10%">$ {{ $orderItem->price }}</td>
                            <td width="10%">{{ $orderItem->quantity }}</td>
                            <td width="10%" class="fw-bold">$ {{ $orderItem->quantity * $orderItem->price }}</td>
                            @php
                                $totalPrice += $orderItem->quantity * $orderItem->price;
                            @endphp
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="fw-bold">Total Amount</td>
                        <td colspan="1" class="fw-bold">
                            $ {{ $totalPrice }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- <livewire:pages.admin.producttrackingadmin.product-tracking-detail-admin :orderId="$orderId" /> --}}
@endsection
