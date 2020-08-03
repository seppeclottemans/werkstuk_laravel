@extends('layouts.main')

@section('content')

    <form class="appearance-none" method="GET" action="{{ route('filter-items') }}">
    <div
        class="flex max-w-screen-xl px-4 mx-auto md:justify-between md:flex-row md:px-6 lg:px-8 mb-6 mt-6">
            <div class="p-4 w-1-2">
            @include('components.filters')
            <button
                class=" ml-6 shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                type="submit">
                Filter
            </button>

            @error('categories')
            <p class="w-full mt-6">{{ $message }}</p>
            @enderror
            </div>


        <div class="w-1-2">
            <div class=" z-0">
                @include('components.search')
            </div>
        </div>


    </div>
    </form>

    <div class="flex flex-wrap mx-10 justify-around bg-gray-200">
        @foreach($items as $item)
            @include('components.home-item-card')
        @endforeach

    </div>


    <!-- pagination styling by tailwind pagination plugin: https://github.com/lorisleiva/tailwindcss-plugins/tree/master/pagination -->
    <div class="mt-6 mb-12">
        {{$items->links()}}
    </div>


@endsection

@push('scripts')
    <!-- multiselect styling + script: https://www.cssscript.com/multiselect-dropdown-list-checkboxes-multiselect-js/ -->
    <script src="{{ asset('js/multiselect.min.js') }}"></script>
    <script>
        document.multiselect('#categories');
    </script>

    <script>
        // call search on enter : https://www.w3schools.com/howto/howto_js_trigger_button_enter.asp
        var input = document.getElementById("search");

        input.addEventListener("keyup", function(event) {

            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("searchButton").click();
            }
        });
    </script>
@endpush

