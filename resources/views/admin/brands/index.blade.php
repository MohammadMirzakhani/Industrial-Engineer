@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">برند ها</a></li>
        <li class="breadcrumb-item action">لیست برند ها</li>
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
            <h3 class="card-title">برند ها</h3>

            <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
            {{ $brands->links() }}

            </ul>
            </div>
            </div>

            <div class="card-body p-0">
            <table class="table">
            <thead>
            <tr>
            <th style="width: 10px">شناسه</th>
            <th>عنوان</th>
            <th>توضیحات</th>
            <th>عکس</th>
            <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->id }}.</td>
                <td>{{ $brand->title }}</td>
                <td>{{ Str::limit($brand->description, 30, ' ...')  }}</td>
                <td> <img src="/storage/photos/{{ $brand->photo->path }}" alt="" height="50" width="50"></td>
                <td>
                    {{-- <a class="btn btn bg-danger"> --}}

                    <form action="{{ route('brands.destroy',$brand->id) }}" method="post" style="display: inline-block" onclick="return confirm('آیا برند مورد نظر حذف شود');">
                        @csrf @method("DELETE")
                        <div>
                            <label for="title"></label>
                            <button type="submit"  class="btn btn bg-danger" >❌</button>
                        </div>
                    </form>
                    <a class="btn btn bg-primary" href="{{ route('brands.edit',$brand->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
            </table>
            </div>
            <div class="card-footer">
                <a class="btn btn bg-warning" href="{{ route('brands.create') }}">
                <i class="fa fa-plus"></i>
                </a>
            </div>
            </div>
    </section>
@endsection

