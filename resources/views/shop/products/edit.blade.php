@extends('shop.main')

@section('main')
    <section class="shop-index">

    <div class=" bg-white border-b border-gray-200">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <a class="btn btn-primary ml-5" type="submit" href="{{route('category.products',['category'=>$product->category])}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </nav>

        <div class="main-bar">
            <div class="container">
                <div class="row">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group list-group-flush mb-0">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h3>Edit "{{$product->title}}" product</h3>
                    <form method="post" action="{{route('product.update',['product'=>$product])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title *</label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ $product->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control" name="description" id="description" required>{{ $product->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Image</label>
                            <img src="{{$product->img}}" alt="" class="img-form">
                            <input type="file" class="form-control" name="img" id="img">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{$product->price}}">
                        </div>
                        <div class="mb-3">
                            <label for="currency" class="form-label">Currency</label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="usd" selected>USD</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>

@endsection
