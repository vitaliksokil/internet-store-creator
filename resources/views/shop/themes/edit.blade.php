@extends('shop.main')

@section('main')
    <section id="shop-index">

        <div class=" bg-white border-b border-gray-200">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse">
                    <a class="btn btn-primary ml-5" type="submit" href="{{route('shop.theme.index')}}">
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

                        <form method="post" action="{{route('shop.theme.update')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="shop-name"><h2>Choose theme</h2></div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Theme name</th>
                                    <th scope="col">Preview</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($themes as $theme)
                                    <tr>
                                        <th scope="row">{{$theme->name}}</th>
                                        <td><img src="{{$theme->image_preview}}" alt=""></td>
                                    </tr>
                                @empty
                                    No themes
                                @endforelse
                                </tbody>
                            </table>
                            <select name="theme_id" id="theme_id" class="form-control block mt-1 mb-3 w-full" required>
                                @foreach($themes as $theme)
                                    <option value="{{$theme->id}}" {{$shop->theme_id == $theme->id ? 'selected' : ''}}>{{$theme->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
