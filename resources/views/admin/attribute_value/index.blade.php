@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('Attributevalue.index') }}">مقادیر ویژگی ها</a></li>
        <li class="breadcrumb-item action">لیست مقادیر ویژگی ها</li>
    </ol>
@endsection
@section('body')
    <section class="content">
        <div class="card">
            @if (session('NewAttributeValue'))
                <div class="alert alert-success">{{ session('NewAttributeValue') }}</div>
            @endif
            @if (session('UpdateAttributeValue'))
                <div class="alert alert-success">{{ session('UpdateAttributeValue') }}</div>
            @endif
            @if (session('DeleteAttributeValue'))
                <div class="alert alert-danger">{{ session('DeleteAttributeValue') }}</div>
            @endif
            <div class="card-header">
            <h3 class="card-title">مقادیر ویژگی ها</h3>

            <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
            {{ $Attributevalues->links() }}

            </ul>
            </div>
            </div>

            <div class="card-body p-0">
            <table class="table">
            <thead>
            <tr>
            <th style="width: 10px">شناسه</th>
            <th>عنوان</th>
            <th>گروه بندی ویژگی</th>
            <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($Attributevalues as $attributevalue)
            <tr>
                <td>{{ $attributevalue->id}}.</td>
                <td>{{ $attributevalue->title }}</td>
                <td>{{ $attributevalue->attributegroup->title }}</td>
                <td>
                    {{-- <a class="btn btn bg-danger"> --}}

                    <form action="{{ route('Attributevalue.destroy',$attributevalue->id) }}" method="post" style="display: inline-block">
                        @csrf @method("DELETE")
                        <div>
                            <label for="title"></label>
                            <button type="submit"  class="btn btn bg-danger">❌</button>
                        </div>
                    </form>
                    <a class="btn btn bg-primary" href="{{ route('Attributevalue.edit',$attributevalue->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            </div>
            <div class="card-footer">
                <a class="btn btn bg-warning" href="{{ route('Attributevalue.create') }}">
                <i class="fa fa-plus"></i>
                </a>
            </div>
            </div>
    </section>
@endsection

