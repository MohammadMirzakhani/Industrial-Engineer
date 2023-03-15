@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">دسته بندی ها</a></li>
        <li class="breadcrumb-item action">لیست دسته بندی ها</li>
    </ol>
@endsection
@section('body')
    <section class="content">
        <div class="card">
            @if (session('parent-erorr'))
                <div class="alert alert-danger">{{ session('parent-erorr') }}</div>
            @endif
            @if (session('ok'))
            <div class="alert alert-success">{{ session('ok') }}</div>
            @endif
            @if (session('delete'))
                <div class="alert alert-danger">{{ session('delete') }}</div>
            @endif
            <div class="card-header">
            <h3 class="card-title">دسته بندی ها</h3>

            <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
            {{ $categories->links() }}

            </ul>
            </div>
            </div>

            <div class="card-body p-0">
            <table class="table">
            <thead>
            <tr>
            <th style="width: 10px">شناسه</th>
            <th>عنوان</th>
            <th>تاریخ ایجاد</th>
            <th>تاریخ بروزرسانی</th>
            <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @php
                $id=1;
            @endphp
            @foreach ($categories as $category)
            <tr>
                <td>{{ $id }}.</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    {{-- <a class="btn btn bg-danger"> --}}

                    <form action="{{ route('category.destroy',$category->id) }}" method="post" style="display: inline-block">
                        @csrf @method("DELETE")
                        <div>
                            <label for="title"></label>
                            <button type="submit"  class="btn btn bg-danger">❌</button>
                        </div>
                    </form>
                    <a class="btn btn bg-primary" href="{{ route('category.edit',$category->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-success" href="{{ route('CreateCategoryAttribute',$category->id) }}">
                        <b>اختصاص ویژگی برای دسته بندی</b>
                    </a>
                </td>
                @if (count($category->children)>0)
                    @include('admin.partial.index-category',['categories'=>$category->children,'level'=>1,'id'=>$id])
                @endif
            </tr>
            @php
                $id=$id+1;
            @endphp
            @endforeach

            </tbody>
            </table>
            </div>
            <div class="card-footer">
                <a class="btn btn bg-warning" href="{{ route('category.create') }}">
                <i class="fa fa-plus"></i>
                </a>
            </div>
            </div>
    </section>
@endsection

