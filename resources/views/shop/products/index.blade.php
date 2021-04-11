@extends('shop.main')

@section('main')
    <section id="categories-index">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">

            </div>
        </nav>
        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <h3>Categories</h3>
        <table class="table table-primary">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Created At</th>
                <th scope="col">View products</th>
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
                        <a href="{{route('category.products',['category'=>$category])}}" class="btn btn-primary ml-auto mr-5"><i class="fas fa-eye"></i> View Products</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row">
                        No categories!
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            @endforelse
            </tbody>
        </table>
        {{$categories->links()}}
    </section>
@endsection
