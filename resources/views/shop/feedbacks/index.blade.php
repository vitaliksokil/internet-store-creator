@extends('shop.main')

@section('main')
    <section id="categories-index">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">

            </div>
        </nav>

        @include('session_messages.error_403')
        @include('session_messages.message')

        <h3>Відгуки</h3>
        <table class="table table-primary text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Користувач</th>
                <th scope="col">Товар</th>
                <th scope="col">Відгук</th>
                <th scope="col">Статус</th>
                <th scope="col">Рейтинг</th>
                <th scope="col">Дата створення</th>
                <th scope="col">Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse($feedbacks as $feedback)
                <tr >
                    <th scope="row">{{$feedback->id}}</th>
                    <td><img src="{{$feedback->user->img}}" class="img-table d-inline mr-3" alt="">{{$feedback->user->name}}</td>
                    <td><a href="{{route('shop.show',['shop' => $feedback->shop()])}}"><img src="{{$feedback->product->img}}" class="img-table d-inline mr-3" alt="">{{$feedback->product->title}}</a></td>
                    <td>{{shortDescription($feedback->text)}}</td>
                    <td>{!! \App\Models\Shop\Feedback::STATUS_ICONS[$feedback->status] !!}</td>
                    <td>{{$feedback->rate}}</td>
                    <td>{{$feedback->created_at}}</td>
                    <td>
                        <form class="mb-2">
                            <a href="{{route('shop.feedbacks.show',['feedback'=>$feedback])}}" class="w-100 btn btn-primary ml-auto mr-5"><i class="fas fa-eye"></i> Переглянути відгук </a>
                        </form>
                        <form action="{{route('shop.feedbacks.confirm',['feedback'=>$feedback])}}" class="mb-2" method="post" onsubmit="return confirm('Ви впевнені, що хочете підтвердити даний відгук?')">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success w-100" {{$feedback->status ? 'disabled' : ''}}><i class="fas fa-check"></i>Підтвердити</button>
                        </form>
                        <form method="post" action="{{route('shop.feedbacks.delete',['feedback'=>$feedback])}}" class="mb-2" onsubmit="return confirm('Ви впевнені, що хочете видалити даний відгук?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100"><i class="fas fa-trash-alt"></i>Видалити</button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row">
                        Немає жодних відгуків!
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
        {{$feedbacks->links()}}
    </section>
@endsection
