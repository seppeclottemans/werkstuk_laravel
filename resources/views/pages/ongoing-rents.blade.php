@extends('layouts.main')

@section('content')

    <div class="flex flex-wrap mx-10 justify-around bg-gray-200">
        @foreach($ongoingRents as $rent)
            @include('components.ongoing-rent-card')
        @endforeach
    </div>

    <!-- pagination styling by tailwind pagination plugin: https://github.com/lorisleiva/tailwindcss-plugins/tree/master/pagination -->
    <div class="mt-6 mb-12">
        {{$ongoingRents->links()}}
    </div>

@endsection
