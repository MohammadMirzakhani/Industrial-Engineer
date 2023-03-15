@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('product.index') }}"> محصولات</a></li>
        <li class="breadcrumb-item action">لیست محصولات </li>
    </ol>
@endsection
@section('body')
    <section class="content">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('DeleteProduct'))
                <div class="alert alert-danger">{{ session('DeleteProduct') }}</div>
            @endif
            @if (session('delete'))
                <div class="alert alert-danger">{{ session('delete') }}</div>
            @endif
            @if (session('product_attributevalue'))
            <div class="alert alert-success">{{ session('product_attributevalue') }}</div>
            @endif
            <div class="card-header">
            <h3 class="card-title">محصولات</h3>
            <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
            {{ $products->links() }}

            </ul>
            </div>
            </div>

            <div class="card-body p-0">
            <table class="table">
            <thead>
            <tr>
            <th style="width: 10px">شناسه</th>
            <th>کد کالا</th>
            <th>عنوان</th>
            <th>توضیحات</th>
            <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}.</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ Str::limit($product->description, 30, ' ...')  }}</td>
                <td>
                    <form action="{{ route('product.destroy',$product->id) }}" method="post" style="display: inline-block" onclick="return confirm('آیا محصول مورد نظر حذف شود');">
                        @csrf
                        @method("DELETE")
                        <div>
                            <label for="title"></label>
                            <button type="submit"  class="btn btn bg-danger" >❌</button>
                        </div>
                    </form>
                    <a class="btn btn bg-primary" href="{{ route('product.edit',$product->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
            </table>
            </div>
            <div class="card-footer">
                <a class="btn btn bg-warning" href="{{ route('product.create') }}">
                <i class="fa fa-plus"></i>
                </a>
            </div>
            </div>
    </section>
@endsection

