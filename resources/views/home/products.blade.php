<link href="{{ asset('css/app.css') }}" rel="stylesheet">


@extends('layouts.app')

@section('content')
    @include('layouts.list-categories' , ['categories'=> \App\Models\Category::where('parent' , 0)->get()])

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach ($products as $product)
                <div class="row">
                    @foreach($products->chunk(4) as $row)
                        <div class="row">
                            @foreach ($row as $product)
                                <div class="col-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->title }}</h5>
                                            <p class="card-text"> {{ $product->description }}</p>
                                            <a href="/products/{{ $product->id }}" class="btn btn-primary">جزئیات محصول</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
