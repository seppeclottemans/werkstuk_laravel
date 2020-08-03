@extends('.layouts.main')

@section('content')
    <!-- user list styling: https://tailwindcomponents.com/component/select-with-custom-list -->

    <style>
        .top-100 {top: 100%}
        .bottom-100 {bottom: 100%}
        .max-h-select {
            max-height: 300px;
        }
    </style>


    <div class="flex flex-col items-center">
        <div class="w-full md:w-1/2 flex flex-col items-center h-64">
            <div class="w-full px-4">
                <div class="flex flex-col items-center relative">
                    @include('admin.components.user-search')

                    <div class="absolute shadow bg-white top-100 z-40 w-full lef-0 rounded svelte-5uyqqj">
                        <div class="flex flex-col w-full">
                    @foreach($users as $user)
                        @include('admin.components.user-card')
                    @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
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
