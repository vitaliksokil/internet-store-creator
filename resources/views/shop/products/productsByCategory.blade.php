@extends('shop.main')

@section('main')
    <section id="categories-index">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <a class="btn btn-success ml-auto mr-5" type="submit" href="{{route('product.create',['category'=>$category])}}">
                    <i class="fas fa-plus"></i> Create
                </a>
            </div>
        </nav>
        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <div class="d-flex align-middle mb-3">
            <img src="{{$category->img}}" class="img-table" alt="">
            <h3 class="mb-0 ml-3 h-auto">Products of "{{$category->title}}" category</h3>
        </div>
        <table class="table table-primary">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr >
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{\Illuminate\Support\Str::limit($product->description, 50, '...')}}</td>
                    <td>{{$product->price}}</td>
                    <td><img class="img-table" src="{{$product->img}}" alt=""></td>
                    <td>{{$product->created_at}}</td>
                    <td>
                        <a href="{{route('product.edit',['product'=>$product])}}" class="btn btn-primary ml-auto mr-5"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{route('product.destroy',['product'=>$product])}}" onclick="return confirm('Are you sure?')" class="btn btn-danger ml-auto"><i class="fas fa-trash-alt"></i> Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row">
                        No Products!
                    </th>
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
