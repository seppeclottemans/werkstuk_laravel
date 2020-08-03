@extends('layouts.main')

@section('content')
    <!-- login styling: https://tailwindcomponents.com/component/login-with-image -->
    <!-- alert styling: https://tailwindcomponents.com/component/tagged-alert -->
    <div class="bg-blue-400 h-screen w-screen">

        @error('name')
        <div class="-m-2 text-center">
            <div class="p-2">
                <div class="inline-flex items-center bg-white leading-none text-red-600 rounded-full p-2 shadow text-teal text-sm">
                    <span class="inline-flex bg-red-600 text-white rounded-full h-6 px-3 justify-center items-center">Invalid input</span>
                    <span class="inline-flex px-2">{{ $message }}</span>
                </div>
            </div>
        </div>
        @enderror

        @error('email')
        <div class="-m-2 text-center">
            <div class="p-2">
                <div class="inline-flex items-center bg-white leading-none text-red-600 rounded-full p-2 shadow text-teal text-sm">
                    <span class="inline-flex bg-red-600 text-white rounded-full h-6 px-3 justify-center items-center">Invalid input</span>
                    <span class="inline-flex px-2">{{ $message }}</span>
                </div>
            </div>
        </div>
        @enderror

        @error('password')
        <div class="-m-2 text-center">
            <div class="p-2">
                <div class="inline-flex items-center bg-white leading-none text-red-600 rounded-full p-2 shadow text-teal text-sm">
                    <span class="inline-flex bg-red-600 text-white rounded-full h-6 px-3 justify-center items-center">Invalid input</span>
                    <span class="inline-flex px-2">{{ $message }}</span>
                </div>
            </div>
        </div>
        @enderror


        @error('categories')
        <div class="-m-2 text-center">
            <div class="p-2">
                <div class="inline-flex items-center bg-white leading-none text-red-600 rounded-full p-2 shadow text-teal text-sm">
                    <span class="inline-flex bg-red-600 text-white rounded-full h-6 px-3 justify-center items-center">Invalid input</span>
                    <span class="inline-flex px-2">{{ $message }}</span>
                </div>
            </div>
        </div>
        @enderror

        <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
            <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 600px">
                <div class="flex flex-col w-full md:w-1/2 p-4">
                    <div class="flex flex-col flex-1 justify-center mb-8">
                        <h1 class="text-4xl text-center font-thin">Register</h1>
                        <div class="w-full mt-4">
                            <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="flex flex-col mt-4">
                                    <input id="name" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"  name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="email" autofocus>
                                </div>
                                <div class="flex flex-col mt-4">
                                    <input id="email" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"  name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                                </div>
                                <div class="flex flex-col mt-4">
                                    <input id="password" type="password" class="flex-grow h-8 px-2 rounded border border-grey-400" name="password" required placeholder="Password" required autocomplete="current-password">
                                </div>
                                <div class="flex flex-col mt-4">
                                    <input id="password-confirm" type="password" class="flex-grow h-8 px-2 rounded border border-grey-400" name="password_confirmation" required placeholder="Password Confirmation" required autocomplete="new-password">
                                </div>

                                <div class="flex flex-wrap -mx-3 mb-6 mt-6">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                               for="grid-password">
                                            category preferences
                                        </label>

                                        <!-- multiselect styling + script: https://www.cssscript.com/multiselect-dropdown-list-checkboxes-multiselect-js/ -->
                                        <select class="@error('categories') is-invalid @enderror" id="categories" name="categories[]" multiple>
                                            @foreach($categories as $category)
                                                <option @if(in_array($category->name, old('categories') ?? [])) selected @endif id="categoryOption" value="{{$category->name}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="flex flex-col mt-8">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background: url('https://images.unsplash.com/photo-1515965885361-f1e0095517ea?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3300&q=80'); background-size: cover; background-position: center center;"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- multiselect styling + script: https://www.cssscript.com/multiselect-dropdown-list-checkboxes-multiselect-js/ -->
    <script src="{{ asset('js/multiselect.min.js') }}"></script>
    <script>
        document.multiselect('#categories');
    </script>
@endpush
