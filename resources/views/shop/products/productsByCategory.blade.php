@extends('shop.main')

@section('main')
    <section id="categories-index">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <a class="btn btn-success ml-auto mr-5" type="submit" href="{{route('product.create',['category'=>$category])}}">
                    <i class="fas fa-plus"></i> Створити
                </a>
            </div>
        </nav>
        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <div class="d-flex align-middle mb-3">
            <img src="{{$category->img}}" class="img-table" alt="">
            <h3 class="mb-0 ml-3 h-auto">Товари категорії "{{$category->title}}"</h3>
        </div>
        <table class="table table-primary">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Назва</th>
                <th scope="col">Опис</th>
                <th scope="col">Ціна</th>
                <th scope="col">Картинка</th>
                <th scope="col">Видимість</th>
                <th scope="col">Дата створення</th>
                <th scope="col">Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr >
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{\Illuminate\Support\Str::limit($product->description, 50, '...')}}</td>
                    <td>{{$product->price}}{{$shop->currency}}</td>
                    <td><img class="img-table" src="{{$product->img}}" alt=""></td>
                    <td>{!!\App\Models\Shop\Product::IS_PUBLISHED_ICONS[$product->is_published]!!}</td>
                    <td>{{$product->created_at}}</td>
                    <td>
                        <a href="{{route('product.edit',['product'=>$product])}}" class="btn btn-primary ml-auto mr-5"><i class="fas fa-edit"></i> Редагувати</a>
                        <a href="{{route('product.destroy',['product'=>$product])}}" onclick="return confirm('Ви впевнені, що хочете видалити даний товар?')" class="btn btn-danger ml-auto"><i class="fas fa-trash-alt"></i> Видалити</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row">
                        Немає товарів
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            @endforelse
            </tbody>
        </table>
        {{$products->links()}}

    </section>
@endsection
