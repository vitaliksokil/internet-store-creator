@extends('shop.main')

@section('main')
    <section class="shop-index">

    <div class=" bg-white border-b border-gray-200">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <a class="btn btn-primary ml-5" type="submit" href="{{route('category.index')}}">
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
                    <h3>Редагувати категорію</h3>
                    <form method="post" action="{{route('category.update',['id'=>$category])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Назва категорії *</label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ $category->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Картинка</label>
                            <img src="{{$category->img}}" alt="" class="img-form">
                            <input type="file" class="form-control" name="img" id="img">
                        </div>

                        <button type="submit" class="btn btn-primary">Підтвердити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>

@endsection
