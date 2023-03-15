@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">برند ها</a></li>
        <li class="breadcrumb-item action">کد تخفیف جدید</li>
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
                <h3 class="card-title">ایجاد کد تخفیف جدید</h3>
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                </ul>
            </div>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                            <form action="{{ route('coupons.store') }}" method="POST"  >
                                @csrf
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" name="title"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">کد</label>
                                    <input type="text" name="code"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">قیمت</label>
                                    <input type="number" name="price"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">بالاتر از چند ؟</label>
                                    <input type="number" name="AboveOf"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title"><b>وضعیت</b> </label><br>
                                    <input type="radio" id="vehicle1" name="status" checked value="0">
                                    <label for="vehicle1"> غیر فعال</label><b></b>
                                    <input type="radio" id="vehicle2" name="status" value="1">
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

{{--
Dropzone.prototype.defaultOptions.dictDefaultMessage = "Drop files here to upload";
Dropzone.prototype.defaultOptions.dictFallbackMessage = "Your browser does not support drag'n'drop file uploads.";
Dropzone.prototype.defaultOptions.dictFallbackText = "Please use the fallback form below to upload your files like in the olden days.";
Dropzone.prototype.defaultOptions.dictFileTooBig = "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.";
Dropzone.prototype.defaultOptions.dictInvalidFileType = "You can't upload files of this type.";
Dropzone.prototype.defaultOptions.dictResponseError = "Server responded with {{statusCode}} code.";
Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancel upload";
Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "Are you sure you want to cancel this upload?";
Dropzone.prototype.defaultOptions.dictRemoveFile = "Remove file";
Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "You can not upload any more files.";
--}}
