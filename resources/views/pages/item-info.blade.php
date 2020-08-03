@extends('layouts.main')

@section('content')
    <!-- form styling: https://tailwindcomponents.com/component/basic-contact-form-nickname -->
    <!-- form styling: https://tailwindcomponents.com/component/login-with-image -->
    <div class="flex flex-col items-center flex-1 h-full px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" >
            <div class="form-horizontal w-3/4 mx-auto">
                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Title
                        </label>

                        <label
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="title" type="text" name="title" value="{{$item->title}}">{{$item->title}}</label>


                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Description
                        </label>

                        <label
                            class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                            id="description" type="text" name="description">{{$item->description}}</label>

                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Number of items
                        </label>

                        <label
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="number-of-items" name="total_amount" type="number" value="{{$item->current_amount}}">{{$item->current_amount}}</label>

                    </div>
                </div>

                <div class="flex flex-wrap mb-6 justify-around">
                    @foreach($item->images as $image)
                        <div id="imageDisplayDiv{{$loop->index}}" class=" w-1/2 mb-6 ">
                            <img src="{{ asset($image->image_link)}}">
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Categories
                        </label>

                        @foreach($itemCategories as $category)
                            <label id="category">#{{$category}}</label>
                        @endforeach
                    </div>
                </div>

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3 mb-20">
                        <a
                            class=" shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="{{ url()->previous() }}">
                            Return
                        </a>
                    </div>
                    <div class="md:w-1/3 mb-20">
                        <a
                            class=" shadow bg-green-500 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="{{route('rent-item-page', ['itemId' => $item['id']])}}">
                            Rent
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
