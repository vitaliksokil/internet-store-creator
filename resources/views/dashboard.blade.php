<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Your Shop') }}
        </h2>
    </x-slot>

    <div class="container pb-5">
        <div class="alert alert-warning mt-5 text-center" role="alert">
            Now you must create your shop! Please fill up all fields!
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group list-group-flush mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{route('shop.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description *</label>
                <textarea class="form-control" name="description" id="description" required>{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" class="form-control" name="img" id="img">
            </div>
            <hr>
            <div class="mb-3">
                <h4 class="form-label">Contact info</h4>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Contact Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
