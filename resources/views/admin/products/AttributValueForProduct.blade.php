@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">محصولات </a></li>
        <li class="breadcrumb-item action">انتخاب ویژگی های محصول</li>
    </ol>
@endsection
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection
@section('body')
    <section class="content" id="app">
        @if (session('CreateProduct'))
        <div class="alert alert-success">{{ session('CreateProduct') }}</div>
        @endif
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
                <h3 class="card-title">ویژگی های محصول  ({{ $product->title }}) را انتخاب کنید</h3>
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                </ul>
            </div>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                            <form action="{{ route('SaveAttributValueForProduct',$product->id) }}" method="POST" >
                                @csrf
                                @foreach ($product->categories as $category)
                                    @foreach ($category->attributegroups as $attributegroup)

                                        <div class="form-group">
                                        <label for="title">{{ $attributegroup->title }}</label>
                                            <select class="form-control" name="l[]" >
                                                <option value="">بدون والد</option>
                                                @foreach ($attributegroup->attributevalues as $attributevalue)
                                                        <option value="{{ $attributevalue->id }}" @foreach($product->attributevalues as $attributevalu)@if($attributevalu->id==$attributevalue->id) selected @endif @endforeach>{{$attributevalue->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    @endforeach
                                @endforeach
                               <div class="form-group">
                                   <label></label>
                                   <input type="submit" value="ذخیره" class="btn btn bg-success">
                               </div>
                            </form>
            </div>
    </section>
@endsection
