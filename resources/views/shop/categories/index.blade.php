@extends('shop.main')

@section('main')
    <section id="categories-index">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <a class="btn btn-success ml-auto mr-5" type="submit" href="{{route('category.create')}}">
                    <i class="fas fa-plus"></i> Створити
                </a>
            </div>
        </nav>
        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-primary">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Назва категорії</th>
                <th scope="col">Картинка</th>
                <th scope="col">Створено</th>
                <th scope="col">Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr >
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->title}}</td>
                    <td><img class="img-table" src="{{$category->img}}" alt=""></td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        <a href="{{route('category.edit',['id'=>$category])}}" class="btn btn-primary ml-auto mr-5"><i class="fas fa-edit"></i> Редагувати</a>
                        <a href="{{route('category.destroy',['id'=>$category])}}" onclick="return confirm('Ви впевнені, що хочете видалити дану категорію?')" class="btn btn-danger ml-auto"><i class="fas fa-trash-alt"></i> Видалити</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row">
                        Немає категорій
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            @endforelse
            </tbody>
        </table>

    </section>
@endsection
