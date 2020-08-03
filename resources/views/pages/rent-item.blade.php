@extends('layouts.main')

@section('content')

    <div class="flex flex-col items-center flex-1 h-full px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0">

            <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('sent-rent-item-request', ['itemId' => $item->id]) }}">
                @csrf

                <div class="content-center flex flex-wrap -mx-3 mb-6 mt-6">
                    <div class="w-full px-3">
                        <h1 class="text-3xl text-center font-bold mb-6 text-gray-700 block">Rent: {{$item->title}}</h1>
                        <p class="mb-6 text-center">from: {{$item->user->name}}</p>
                    </div>
                </div>

                <div class="content-center flex flex-wrap -mx-3 mb-6 mt-6">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-6 "
                           for="grid-password">
                        How long would you like to rent this item?
                    </label>
                    <div class="w-1/2 px-3">
                        @include('components.date-picker', ['datePickerName' => "dateFrom", 'title' => "From"])

                        @error('dateFrom')
                        <span class="inline-flex px-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-1/2 px-3">
                        @include('components.date-picker', ['datePickerName' => "dateTo", 'title' => "Until"])
                        @error('dateTo')
                        <span class="inline-flex px-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            How many would you like to rent? ({{$item->current_amount}} available)
                        </label>

                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                             name="rent_amount" type="number" value="{{old('rent_amount')}}">

                        @error('rent_amount')
                        <span class="inline-flex px-2">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                       for="grid-password">
                    Message
                </label>

                <textarea
                    class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none @error('description') is-invalid @enderror"
                    id="description" type="text" name="message">{{old('message')}}</textarea>

                @error('message')
                <span class="inline-flex px-2">{{ $message }}</span>
                @enderror

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3">
                        <button
                            class=" mb-12 shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Rent
                        </button>
                    </div>

                </div>

                <div class="md:flex md:items-center">
                    <div class="mb-48">
                        <label>Contact item owner: </label>
                        <a class="no-underline hover:underline text-blue-500 text-lg" href="mailto:{{$item->user->email}}">{{$item->user->email}}</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection

<script>
    const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    function app() {
        return {
            showDatepicker: false,
            datepickerValue: '',

            month: '',
            year: '',
            no_of_days: [],
            blankdays: [],
            days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

            initDate() {
                let today = new Date();
                this.month = today.getMonth();
                this.year = today.getFullYear();
                this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
            },

            isToday(date) {
                const today = new Date();
                const d = new Date(this.year, this.month, date);

                return today.toDateString() === d.toDateString() ? true : false;
            },

            getDateValue(date) {
                let selectedDate = new Date(this.year, this.month, date);
                this.datepickerValue = selectedDate.toDateString();

                this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + selectedDate.getMonth()).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);

                console.log(this.$refs.date.value);

                this.showDatepicker = false;
            },

            getNoOfDays() {
                let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                // find where to start calendar day of week
                let dayOfWeek = new Date(this.year, this.month).getDay();
                let blankdaysArray = [];
                for (var i = 1; i <= dayOfWeek; i++) {
                    blankdaysArray.push(i);
                }

                let daysArray = [];
                for (var i = 1; i <= daysInMonth; i++) {
                    daysArray.push(i);
                }

                this.blankdays = blankdaysArray;
                this.no_of_days = daysArray;
            }
        }
    }
</script>
