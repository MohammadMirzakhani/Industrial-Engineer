@foreach ($categories as $category)
<tr>
    <td>{{ $id }}.</td>
    <td>{{ str_repeat('+++',$level) }} {{ $category->name }}</td>
    <td>{{ $category->created_at }}</td>
    <td>{{ $category->updated_at }}</td>
    <td>
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
        <a class="btn btn-outline-primary" href="{{ route('CreateCategoryAttribute',$category->id) }}">
            <b>اختصاص ویژگی برای دسته بندی</b>
        </a>
    </td>
    @if (count($category->children)>0)
        @include('admin.partial.index-category',['categories'=>$category->children,'level'=>$level+1,'id'=>$id])
    @endif
</tr>
@endforeach
