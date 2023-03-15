@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">برند ها</a></li>
        <li class="breadcrumb-item action">ویرایش کد تخفیف</li>
    </ol>
@endsection
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

@section('body')
    <section class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ویرایش کد تخفیف </h3>
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                </ul>
            </div>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                            <form action="{{ route('coupons.update',$coupon->id) }}" method="POST"  >
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input value="{{ $coupon->title }}" type="text" name="title"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">کد</label>
                                    <input value="{{ $coupon->code }}" type="text" name="code"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">قیمت</label>
                                    <input value="{{ $coupon->price }}" type="number" name="price"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">بالاتر از چند ؟</label>
                                    <input value="{{ $coupon->AboveOf }}" type="number" name="AboveOf"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title"><b>وضعیت</b> </label><br>
                                    <input  type="radio" id="vehicle1" name="status" @if($coupon->status==0)checked @endif value="0">
                                    <label for="vehicle1"> غیر فعال</label><b></b>
                                    <input  type="radio" id="vehicle2" name="status" @if($coupon->status==1)checked @endif value="1">
                                    <label for="vehicle2">  فعال</label><br>
                                </div>
                                <div class="form-group">
                                    <label for="title"></label>
                                    <input type="submit" value="ذخیره" class="btn btn bg-success">
                                </div>
                            </form>
                    </div>
                </div>
                </div>
            </div>
    </section>

@endsection

