@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('Attributegroup.index') }}">ویژگی ها</a></li>
        <li class="breadcrumb-item action"> ویرایش ویژگی</li>
    </ol>
@endsection
@section('body')
<section class="content">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">ایجاد ویژگی جدید</h3>

        <div class="card-tools">
        <ul class="pagination pagination-sm float-right">

        </ul>
        </div>
        </div>

        <div class="card-body">
         <div class="row">
             <div class="col-md-6 col-md-offset-3">

                     <form action="{{ route('Attributegroup.update',$Attributegroup->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" name="title" placeholder="عنوان ویژگی " class="form-control" value="{{$Attributegroup->title  }}">
                        </div>
                        <div class="form-group">
                            <label>نوع ویژگی</label>
                            <select class="form-control" name="type" >
                                    <option value="select"   @if($Attributegroup->type=="select") selected @endif>لیست تکی</option>
                                    <option value="multiple" @if($Attributegroup->type=="multiple") selected @endif>لیست چند تایی</option>
                            </select>
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

