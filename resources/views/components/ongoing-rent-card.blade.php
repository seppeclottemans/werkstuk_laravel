<!-- Card design: https://tailwindcomponents.com/component/product-card-with-evaluation -->
<div class="px-4 w-1/3 py-2">
    <div class="flex bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="w-1/3 bg-cover" style="background-image: url('{{ asset($rent->item->images[0]->image_link)}}')">

        </div>
        <div class="w-2/3 p-4">
            <h1 class="text-gray-900 font-bold truncate">{{$rent->item->title}}</h1>
            <h1 class="text-gray-900 font-bold">X {{$rent->amount}}</h1>
            <p class="mt-2 text-gray-600 text-sm break-word multiple-line-truncate">From: {{$rent->date_from}}</p>
            <p class="mt-2 text-gray-600 text-sm break-word h-12 multiple-line-truncate">Until: {{$rent->date_to}}</p>
            <div class="flex item-center mt-2">

            </div>
            <p>Rented from: {{$rent->item->user->name}}</p>
            <a class="no-underline hover:underline text-blue-500 text-sm" href="mailto:{{$rent->item->user->email}}">{{$rent->item->user->email}}</a>
            <div class="flex item-center justify-between mt-3">

            </div>
        </div>
    </div>
</div>
