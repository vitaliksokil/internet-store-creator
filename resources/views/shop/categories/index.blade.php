@extends('shop.main')

@section('main')
    <section id="categories-index">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <a class="btn btn-success ml-auto mr-5" type="submit" href="{{route('category.create')}}">
                    <i class="fas fa-plus"></i> Create
                </a>
            </div>
        </nav>

        {{var_dump($categories)}}
    </section>
@endsection
