@extends('layouts.main')

@section('content')

    <div class="flex flex-wrap mx-10 justify-around bg-gray-200">
        @foreach($userinvetory as $item)
            @include('components.inventory-item-card')
        @endforeach
    </div>

    <!-- pagination styling by tailwind pagination plugin: https://github.com/lorisleiva/tailwindcss-plugins/tree/master/pagination -->
    <div class="mt-6 mb-12">
        {{$userinvetory->links()}}
    </div>

@endsection
