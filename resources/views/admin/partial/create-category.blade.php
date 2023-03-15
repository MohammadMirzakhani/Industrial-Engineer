@if (isset($selected_category))
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" @if($selected_category->parent_id==$category->id) selected @endif>{{ str_repeat('+++',$level) }}{{ $category->name }}</option>
        @if (count($category->children)>0)
        @include('admin.partial.create-category',['categories'=>$category->children,'level'=>$level+1])
        @endif
    @endforeach
@elseif (isset($product))
    @foreach ($categories as $category)
    <option value="{{ $category->id }}" @foreach($product->categories as $cat)@if($cat->id==$category->id) selected @endif @endforeach>{{ str_repeat('+++',$level) }}{{ $category->name }}</option>
    @if (count($category->children)>0)
    @include('admin.partial.create-category',['categories'=>$category->children,'level'=>$level+1,'product'=>$product])
    @endif
    @endforeach
@else
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ str_repeat('+++',$level) }}{{ $category->name }}</option>
        @if (count($category->children)>0)
        @include('admin.partial.create-category',['categories'=>$category->children,'level'=>$level+1])
        @endif
    @endforeach
@endif
