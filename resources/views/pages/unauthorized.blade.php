@extends('layouts.main')

@section('content')
<!-- page styling: https://github.com/sschoger/laravel-error-pages/blob/master/403.html -->
    <div class="md:flex min-h-screen">
        <div class="w-full md:w-1/2 bg-white flex items-center justify-center ">
            <div class="max-w-sm m-8">
                <div class="text-black text-5xl md:text-15xl font-black">403</div>
                <div class="w-16 h-1 bg-blue-dark my-3 md:my-6"></div>
                <p class="text-grey-darker text-2xl md:text-3xl font-light mb-8 leading-normal">Sorry, You have no access to this page.</p>
                <a href="{{route('home-page')}}" class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">Go Home</a>
            </div>
        </div>
        <div class="relative pb-full md:flex md:pb-0 md:min-h-screen w-full md:w-1/2" >
            <div style="background-image: url('{{ asset('storage/cat.jpg')}}')" class="w-full bg-cover">
            </div>
        </div>
    </div>

@endsection
