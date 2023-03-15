@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ url('admin_shop/orders') }}">سفارشات</a></li>
        <li class="breadcrumb-item action">لیست سفارشات</li>
    </ol>
@endsection
@section('body')
    <section class="content">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('delete'))
                <div class="alert alert-danger">{{ session('delete') }}</div>
            @endif
            <div class="card-header">
            <h3 class="card-title">سفارشات</h3>

            <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
            {{ $orders->links() }}

            </ul>
            </div>
            </div>

            <div class="card-body p-0">
            <table class="table">
            <thead>
            <tr>
            <th style="width: 10px">شناسه</th>
            <th>مقدار</th>
            <th>وضعیت</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}.</td>
                <td>{{ $order->amount }}</td>
                @if ($order->status==1)
                    <td><b class="lable lable-success">پرداخت شده</b></td>
                @else
                    <td><b class="lable lable-danger">پرداخت نشده</b></td>
                @endif
            </tr>
            @endforeach

            </tbody>
            </table>
            </div>
            {{-- <div class="card-footer">
                <a class="btn btn bg-warning" href="{{ route('brands.create') }}">
                <i class="fa fa-plus"></i>
                </a>
            </div> --}}
            </div>
    </section>
@endsection

