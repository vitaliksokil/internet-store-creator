@extends('shop.main')

@section('main')
    <section class="shop-index">

    <div class=" bg-white border-b border-gray-200">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <a class="btn btn-primary ml-5" type="submit" href="{{route('category.products',['category'=>$category])}}">
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

                    <form method="post" action="{{route('product.store',['category'=>$category])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Назва *</label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Опис *</label>
                            <textarea class="form-control" name="description" id="description" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Картинка</label>
                            <input type="file" class="form-control" name="img" id="img">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Ціна {{$shop->currency}}</label>
                            <input type="text" class="form-control" name="price" id="price" {{old('price')}}>
                        </div>
                        <button type="submit" class="btn btn-primary">Підтвердити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>

@endsection
