@extends('front.layout.master')
@section('content')
<div id="container">
<div class="container">
    <div class="owl-carousel related_pro">
        @foreach ($products as $productd)
            @if ($productd->brand->title==$product->brand->title)
            <div class="product-thumb">
                @foreach ($productd->photos as $photo)
                    @if ($photo->pivot->IsAsli==1)
                        <div class="image"><a href="{{ route('ShowProduct',$product->id) }}"><img src="{{ asset('/storage/products/Asli/'.$photo->path.'') }}" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive"  /></a></div>
                    @else
                    @endif
                @endforeach
                <div class="caption">
                  <h4><a href="product.html">{{ $productd->title }}</a></h4>
                  <p class="price"> <span class="price-new">{{ $productd->price }} تومان</span>  </p>
                  <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                </div>
                <div class="button-group">
                  <a class="btn-primary" href="{{ route('comparewith',[$product->id,$productd->id]) }}" ><span>افزودن به مقایسه</span></a>
                  <div class="add-to-links">
                  </div>
                </div>
              </div>
            @endif
        @endforeach

      </div>
</div>
</div>

@endsection
