<!-- Card design: https://tailwindcomponents.com/component/product-card-with-evaluation -->
<div class="px-4 w-1/3 py-2">
    <div class="flex bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="w-1/3 bg-cover" style="background-image: url('{{ asset($rental->item->images[0]->image_link)}}')">

        </div>
        <div class="w-2/3 p-4">
            <h1 class="text-gray-900 font-bold truncate">{{$rental->item->title}}</h1>
            <h1 class="text-gray-900 font-bold">X {{$rental->amount}}</h1>
            <p class="mt-2 text-gray-600 text-sm break-word multiple-line-truncate">From: {{$rental->date_from}}</p>
            <p class="mt-2 text-gray-600 text-sm break-word h-12 multiple-line-truncate">Until: {{$rental->date_to}}</p>
            <div class="flex item-center mt-2">

            </div>
            <p>Rented By: {{$rental->user->name}}</p>
            <a class="no-underline hover:underline text-blue-500 text-sm" href="mailto:{{$rental->user->email}}">{{$rental->user->email}}</a>
            <div class="flex item-center justify-between mt-3">

                <form method="POST" action="{{ route('item-returned', ['rentId' => $rental->id]) }}">
                    @csrf
                    @method('delete')
                    <button class="px-3 py-2 bg-red-500 text-white text-xs font-bold uppercase rounded" type="submit" >Returned</button>
                </form>
            </div>
        </div>
    </div>
</div>
