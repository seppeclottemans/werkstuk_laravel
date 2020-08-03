@extends('layouts.main')

@section('content')
    <!-- form styling: https://tailwindcomponents.com/component/basic-contact-form-nickname -->
    <!-- form styling: https://tailwindcomponents.com/component/login-with-image -->
    <div class="flex flex-col items-center flex-1 h-full px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" >
            <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('update-item', ['itemId' => $item['id']]) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Title
                        </label>

                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('title') is-invalid @enderror"
                            id="title" type="text" name="title" value="{{$item->title}}">

                        @error('title')
                        <span class="inline-flex px-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Description
                        </label>

                        <textarea
                            class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none @error('description') is-invalid @enderror"
                            id="description" type="text" name="description">{{$item->description}}</textarea>

                        @error('description')
                        <span class="inline-flex px-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Number of items
                        </label>

                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('total_amount') is-invalid @enderror"
                            id="number-of-items" name="total_amount" type="number" value="{{$item->current_amount}}">

                        @error('total_amount')
                        <span class="inline-flex px-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap mb-6 justify-around">
                    @foreach($item->images as $image)
                        <div id="imageDisplayDiv{{$loop->index}}" class=" w-1/2 mb-6 ">
                            <img src="{{ asset($image->image_link)}}">
                            <button onclick="removeImagesInHtml('imageDisplayDiv{{$loop->index}}', {{$image->id}})" class="px-3 py-2  bg-red-500 text-white text-xs font-bold uppercase rounded">Delete</button>
                        </div>
                    @endforeach
                </div>

                <!-- file uploader: https://tailwindcomponents.com/component/file-upload-drop-zone -->
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <div class="border border-dashed border-gray-500 relative">

                            <input type="file" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50" name="images[]"
                                   accept="image/*" multiple>

                            <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                                <h4>
                                    Add new images
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                @error('images')
                <span class="inline-flex px-2 ">{{ $message }}</span>
                @enderror

                <input id="imagesToDelete" type="hidden" name="imagesToDelete">

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Categories
                        </label>

                        <!-- multiselect styling + script: https://www.cssscript.com/multiselect-dropdown-list-checkboxes-multiselect-js/ -->
                        <select class="@error('categories') is-invalid @enderror" id="categories" name="categories[]" multiple>
                            @foreach($categories as $category)
                                <option @if(in_array($category->name, $itemCategories)) selected @endif id="categoryOption" value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                        </select>


                        @error('categories')
                        <span class="inline-flex px-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3">
                        <button
                            class="mb-48 shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            name="submit" value="submit" type="submit">
                            Upload
                        </button>
                    </div>
                    <div class="md:w-2/3"></div>
                </div>

            </form>

        </div>
    </div>

@endsection

@push('scripts')
    <script>
        let imagesToDelete = [];

        function removeImagesInHtml(imageId, imageToDelete) {
            var image = document.getElementById(imageId);
            image.parentNode.removeChild(image);
            imagesToDelete.push(imageToDelete);
            document.getElementById('imagesToDelete').value = imagesToDelete;
        }
    </script>

    <!-- multiselect styling + script: https://www.cssscript.com/multiselect-dropdown-list-checkboxes-multiselect-js/ -->
    <script src="{{ asset('js/multiselect.min.js') }}"></script>
    <script>
        document.multiselect('#categories');
    </script>
@endpush
