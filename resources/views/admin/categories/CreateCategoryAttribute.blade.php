@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">دسته بندی ها</a></li>
        <li class="breadcrumb-item action">دسته بندی جدید</li>
    </ol>
@endsection
@section('body')
<section class="content">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">افزودن ویژگی برای دسته بندی {{ $category->name }}</h3>

        <div class="card-tools">
        <ul class="pagination pagination-sm float-right">

        </ul>
        </div>
        </div>

        <div class="card-body">
         <div class="row">
             <div class="col-md-6 col-md-offset-3">

                     <form action="{{ route('SaveCategoryAttribute',$category->id) }}" method="post">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label>اضافه کردن ویژگی برای {{ $category->name }} </label>
                            <select class="form-control" name="category_attributegroup[]" multiple >
                                    @foreach ($attributegroups as $attributegroup)
                                    <option value="{{ $attributegroup->id }}" @foreach($category->attributegroups as $CatAtt)@if ($CatAtt->id==$attributegroup->id) selected @endif @endforeach>{{$attributegroup->title }}</option>
                                    @endforeach
                            </select>
                            {{-- @if ($category->parent_id==$category_data->id) selected @endif --}}
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

