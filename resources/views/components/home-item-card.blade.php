<!-- Card design: https://tailwindcomponents.com/component/product-card-with-evaluation -->
<div class="px-4 w-1/3 py-2">
    <div class="flex bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="w-1/3 bg-cover" style="background-image: url('{{ asset($item->images[0]->image_link)}}')">

        </div>
        <div class="w-2/3 p-4">
            <h1 class="text-gray-900 font-bold truncate">{{$item->title}}</h1>
            <h1 class="text-gray-900 font-bold">X {{$item->current_amount}}</h1>
            <p class="mt-2 text-gray-600 text-sm break-word h-12 multiple-line-truncate">{{$item->description}}</p>
            <div class="flex item-center justify-start mt-3">

                <a class="px-3 py-2 bg-blue-500 text-white text-xs font-bold uppercase rounded mr-6"
                   href="{{route('info-item-page', ['itemId' => $item['id']])}}">Info</a>
                <a class="px-3 py-2 bg-green-500 text-white text-xs font-bold uppercase rounded"
                   href="{{route('rent-item-page', ['itemId' => $item['id']])}}">Rent</a>

            </div>
        </div>
    </div>
</div>
