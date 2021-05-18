@extends('shop.main')

@section('main')
    <section class="shop-index">

    <div class=" bg-white border-b border-gray-200">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <a class="btn btn-primary ml-5" type="submit" href="{{route('category.products',['category'=>$product->category])}}">
                    <i class="fas fa-arrow-left"></i> Назад
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
                    <h3>Редагувати товар "{{$product->title}}"</h3>
                    <form method="post" action="{{route('product.update',['product'=>$product])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Назва *</label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ $product->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Опис *</label>
                            <textarea class="form-control" name="description" id="description" required>{{ $product->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Картинка</label>
                            <img src="{{$product->img}}" alt="" class="img-form">
                            <input type="file" class="form-control" name="img" id="img">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Ціна{{$shop->currency}}</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{$product->price}}">
                        </div>

                        <div class="mb-3">
                            <label for="is_published" class="form-label">Видимість</label>
                            <select name="is_published" class="form-control">
                                <option value="1" {{ $product->is_published == 1 ? "selected" : '' }}>Опублікований</option>
                                <option value="2" {{ $product->is_published == 2 ? "selected" : '' }}>Немає в наявності</option>
                                <option value="0" {{ $product->is_published == 0 ? "selected" : '' }}>Скритий</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Підтвердити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>

@endsection
