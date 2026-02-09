@extends('layouts.dashboard.app')
@section('title')
    {{ __('dashboard.order') }}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.order_items') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.order.index') }}">
                                        {{ __('dashboard.orders') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">
                                        {{ __('dashboard.order_items') }}</a>
                                </li>


                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="header-styling">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('dashboard.order_items') }} </h4><br>
                            {{-- tow btn delete && change to deliverd --}}
                            <div class="mb-2">
                                <!-- Change Status to Delivered -->
                                @if ($order->status !== 'delivered')
                                    <a href="{{ route('dashboard.order.status', $order->id) }}"
                                       class="btn btn-success"
                                       onclick="return confirm('{{ __('dashboard.confirm_mark_delivered') }}')">
                                        {{ __('dashboard.mark_as_delivered') }}
                                    </a>
                                @endif

                                <!-- Delete Order Form -->
                                <form action="{{ route('dashboard.order.delete', $order->id) }}" method="POST"
                                      style="display:inline-block;"
                                      onsubmit="return confirm('{{ __('dashboard.confirm_delete') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('dashboard.delete_order') }}
                                    </button>
                                </form>
                            </div>

                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <p class="card-text">Example of a custom table
                                    <em>header</em> styling. Table header supports default contextual
                                    and custom background colors available in <a href="colors-primary-palette.html"
                                                                                 target="_blank">bootstrap brand
                                        colors</a>. To use bootstrap
                                    brand color in the table header, add <code>.bg-*</code> class
                                    to the header row. All border and text colors will be automatically
                                    adjusted.
                                </p>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ __('dashboard.order_details') }}</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>{{ __('dashboard.first_name') }}:</strong>
                                            {{ $order->first_name }}</p>
                                        <p><strong>{{ __('dashboard.last_name') }}:</strong>
                                            {{ $order->last_name }}</p>
                                        <p><strong>{{ __('dashboard.phone') }}:</strong>
                                            {{ $order->user_phone }}</p>
                                        <p><strong>{{ __('dashboard.email') }}:</strong>
                                            {{ $order->user_email }}</p>
                                        <p><strong>{{ __('dashboard.note') }}:</strong> {{ $order->note }}</p>
                                        <p><strong>{{ __('dashboard.status') }}:</strong>
                                            <span
                                                    class="badge
                                                @if ($order->status === 'pending') badge-warning
                                                @elseif($order->status === 'completed') badge-primary
                                                @elseif($order->status ==='delivered') badge-success
                                                @elseif($order->status ==='cancelled') badge-danger @endif">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>{{ __('dashboard.country') }}:</strong> {{ $order->country }}
                                        </p>
                                        <p><strong>{{ __('dashboard.governorate') }}:</strong>
                                            {{ $order->governorate }}</p>
                                        <p><strong>{{ __('dashboard.city') }}:</strong> {{ $order->city }}</p>
                                        <p><strong>{{ __('dashboard.street') }}:</strong> {{ $order->street }}
                                        </p>
                                        <p><strong>{{ __('dashboard.coupon') }}
                                                :</strong> {{ $order->coupon ?? __('dashboard.no_coupon') }}</p>
                                        <p><strong>{{ __('dashboard.coupon_discount') }}
                                                :</strong> {{ $order->coupon_discount ??0}}%</p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <div class="glass-box">
                                            <p class="mb-0">
                                                <strong><i class="fas fa-dollar-sign"></i>
                                                    {{ __('dashboard.price') }}:</strong>
                                                {{(float) $order->price }} EGP
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="glass-box">
                                            <p class="mb-0">
                                                <strong><i class="fas fa-shipping-fast"></i>
                                                    {{ __('dashboard.shipping_price') }}:</strong>
                                                {{(float) $order->shipping_price }} EGP
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="glass-box">
                                            <p class="mb-0">
                                                <strong><i class="fas fa-calculator"></i>
                                                    {{ __('dashboard.total_price') }}:</strong>
                                                {{ (float) $order->total_price }} EGP
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- order items --}}
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-success white">
                                    <tr>
                                        <th>{{ __('dashboard.name') }}</th>
                                        <th>{{ __('dashboard.qty') }}</th>
                                        <th>{{ __('dashboard.price') }}</th>
                                        <th>{{ __('dashboard.total_price') }}</th>
                                        <th>{{ __('dashboard.discount') }}</th>
                                        <th>{{ __('dashboard.attributes') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($order->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ $item->product_quantity }}</td>
                                            <td>{{ (float) $item->product_price }}</td>
                                            <td>{{ (float) $item->product_price * $item->product_quantity }}</td>
                                            <td>{{ (float) $item->product_discount}}</td>
                                            <td>
                                                @if ($item->attributes != null)
                                                    @foreach ($item->attributes as $attr => $value)
                                                        <h5 style="margin-right: 4px" class="heading">
                                                            {{ $attr . ' : ' . $value }} </h5>
                                                    @endforeach
                                                @else
                                                    <h5 class="heading">No Attributes</h5>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .glass-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .glass-box:hover {
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
        }
    </style>
@endpush