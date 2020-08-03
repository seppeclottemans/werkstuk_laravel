<div @click.away="open = false" class="relative" x-data="{ open: false }">
    <button @click="open = !open"
            class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
        <img style="display:inline-block" src="{{url('storage/iconfinder_notifications_4964018.svg')}}" alt="Image">
    </button>
    <div x-show="open" x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-64 z-50">
        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800 h-56 overflow-auto">
            @foreach(auth()->user()->unreadNotifications as $notification)

                <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                    <label>{{ $notification->data['title'] }}</label>
                    <br>
                    <label>from: {{ $notification->data['dateFrom'] }}</label>
                    <br>
                    <label>until: {{ $notification->data['dateTo'] }}</label>
                    <br>
                    <form method="POST" action="{{ route('accept-rent-item-request', ['notificationId' => $notification->id]) }}">
                        @csrf
                        <a
                            class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white text-sm py-2 px-2 rounded mr-3"
                            href="{{ route('notification-info-page', ['notificationId' => $notification->id]) }}"
                        >
                            Info
                        </a>

                        <button
                            class="shadow bg-red-400 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white text-sm py-2 px-2 rounded mr-2"
                        formaction="{{route('delete-notification', ['notificationId' => $notification->id])}}" >
                            Decline
                        </button>

                        <button
                            class="shadow bg-green-400 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white text-sm py-2 px-2 rounded"
                            type="submit">
                            Accept
                        </button>
                    </form>
                </div>
                </form>

            @endforeach
        </div>
    </div>
</div>
