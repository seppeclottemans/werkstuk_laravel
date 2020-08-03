@extends('layouts.main')

@section('content')

    <div class="flex flex-col items-center flex-1 h-full px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0">

            <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('accept-rent-item-request', ['notificationId' => $notificationId]) }}">
                @csrf

                <div class="content-center flex flex-wrap -mx-3 mb-6 mt-6">
                    <div class="w-full px-3">
                        <h1 class="text-3xl text-center font-bold mb-6 text-gray-700 block">{{$notificationData->title}}</h1>
                    </div>
                </div>

                <div class="content-center flex flex-wrap -mx-3 mb-6 mt-6">
                    <div class="px-3 w-1/2">
                        <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2">
                            From: {{$notificationData->dateFrom}}
                        </label>
                    </div>
                        <div class="px-3 w-1/2">
                        <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2">
                            Until: {{$notificationData->dateTo}}
                        </label>

                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Amount of this item
                        </label>

                        <label
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="number">{{$notificationData->amount}}</label>

                    </div>
                </div>

                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                       for="grid-password">
                    Message
                </label>

                <label
                    class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none @error('description') is-invalid @enderror"
                    id="description" type="text">{{$notificationData->body}}</label>

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3">
                        <button
                            class=" mb-12 shadow bg-red-400 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            formaction="{{route('delete-notification', ['notificationId' => $notificationId])}}" >
                            Decline
                        </button>
                    </div>
                    <div class="md:w-1/3">
                        <button
                            class=" mb-12 shadow bg-green-400 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Accept
                        </button>
                    </div>

                </div>

            </form>
        </div>
    </div>

@endsection
