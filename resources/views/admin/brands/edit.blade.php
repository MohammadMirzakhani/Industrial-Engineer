@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">برند ها</a></li>
        <li class="breadcrumb-item action">ویرایش برند</li>
    </ol>
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
        <h3 class="card-title">ویرایش برند {{ $brand->title }}</h3>

        <div class="card-tools">
        <ul class="pagination pagination-sm float-right">

        </ul>
        </div>
        </div>

        <div class="card-body">
         <div class="row">
             <div class="col-md-6 col-md-offset-3">
                <form action="{{ route('brands.update',$brand->id) }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="title">تصویر برند</label>
                        <img src="/storage/photos/{{ $brand->photo->path }}" alt="" width="100">
                    </div>
                    <div class="form-group">
                        <label for="title">نام</label>
                        <input type="text" name="title" placeholder="نام برند" class="form-control" value="{{ $brand->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description">توضیحات </label>
                        <textarea type="text" name="description" placeholder="توضیحات را وارد کنید ..."  class="form-control">{{ $brand->description }}</textarea>
                    </div>
                    <input type="hidden" name="photo_id" id="brand-photo">
                    <div class="form-group">
                        <label for="title">تصویر برند</label>
                        <input type="file" name="ImageBrand"  class="form-control form-control-lg" >
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

