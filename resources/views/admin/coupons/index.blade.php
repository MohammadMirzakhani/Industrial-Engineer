@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">برند ها</a></li>
        <li class="breadcrumb-item action">لیست کدهای تخفیف</li>
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
            <h3 class="card-title">کدهای تخفیف </h3>

            <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
            {{ $coupons->links() }}

            </ul>
            </div>
            </div>

            <div class="card-body p-0">
            <table class="table">
            <thead>
            <tr>
            <th style="width: 10px">شناسه</th>
            <th>عنوان</th>
            <th>کد</th>
            <th>قیمت</th>
            <th>بالاتر از چند ؟</th>
            <th>وضعیت</th>
            <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($coupons as $coupon)
            <tr>
                <td>{{ $coupon->id }}.</td>
                <td>{{ $coupon->title }}</td>
                <td>{{ $coupon->code  }}</td>
                <td>{{ $coupon->price }}</td>
                <td>{{ $coupon->AboveOf }}</td>
                    @if ($coupon->status==0)
                        <td><b class="btn btn-danger">غیر فعال</b></td>
                    @else
                        <td><b class="btn btn-success"> فعال</b></td>
                    @endif
                    {{-- <a class="btn btn bg-danger"> --}}
                <td>
                    <form action="{{ route('coupons.destroy',$coupon->id) }}" method="post" style="display: inline-block" onclick="return confirm('آیا کد مورد نظر حذف شود');">
                        @csrf @method("DELETE")
                        <div>
                            <label for="title"></label>
                            <button type="submit"  class="btn btn bg-danger" >❌</button>
                        </div>
                    </form>
                    <a class="btn btn bg-primary" href="{{ route('coupons.edit',$coupon->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
            </table>
            </div>
            <div class="card-footer">
                <a class="btn btn bg-warning" href="{{ route('coupons.create') }}">
                <i class="fa fa-plus"></i>
                </a>
            </div>
            </div>
    </section>
@endsection

