@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('Attributegroup.index') }}">گروه بندی ویژگی ها</a></li>
        <li class="breadcrumb-item action">لیست گروه بندی ویژگی ها</li>
    </ol>
@endsection
@section('body')
    <section class="content">
        <div class="card">
            @if (session('NewAttributeGroup'))
                <div class="alert alert-success">{{ session('NewAttributeGroup') }}</div>
            @endif
            @if (session('UpdateAttributeGroup'))
                <div class="alert alert-success">{{ session('UpdateAttributeGroup') }}</div>
            @endif
            @if (session('DeleteAttributeGroup'))
                <div class="alert alert-danger">{{ session('DeleteAttributeGroup') }}</div>
            @endif
            <div class="card-header">
            <h3 class="card-title">گروه بندی ویژگی ها</h3>

            <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
            {{ $Attributegroups->links() }}

            </ul>
            </div>
            </div>

            <div class="card-body p-0">
            <table class="table">
            <thead>
            <tr>
            <th style="width: 10px">شناسه</th>
            <th>عنوان</th>
            <th>نوع</th>
            <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @php
                $id=1;
            @endphp
            @foreach ($Attributegroups as $Attributegroup)
            <tr>
                <td>{{ $Attributegroup->id}}.</td>
                <td>{{ $Attributegroup->title }}</td>
                <td>{{ $Attributegroup->type }}</td>
                <td>
                    {{-- <a class="btn btn bg-danger"> --}}

                    <form action="{{ route('Attributegroup.destroy',$Attributegroup->id) }}" method="post" style="display: inline-block">
                        @csrf @method("DELETE")
                        <div>
                            <label for="title"></label>
                            <button type="submit"  class="btn btn bg-danger">❌</button>
                        </div>
                    </form>
                    <a class="btn btn bg-primary" href="{{ route('Attributegroup.edit',$Attributegroup->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
            @php
                $id=$id+1;
            @endphp
            @endforeach

            </tbody>
            </table>
            </div>
            <div class="card-footer">
                <a class="btn btn bg-warning" href="{{ route('Attributegroup.create') }}">
                <i class="fa fa-plus"></i>
                </a>
            </div>
            </div>
    </section>
@endsection

