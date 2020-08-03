<div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100">
    <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
        <div class="w-6 flex flex-col items-center">
            <div class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full " > <img alt="" class="rounded-full" src="{{url( asset($user->image_link))}}"> </div>
        </div>
        <div class="w-full items-center flex">
            <div class="mx-2 -mt-1 w-2/3 ">{{$user->name}} @if($user->is_admin) (admin) @endif
                <div class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500">{{$user->email}}</div>
            </div>
            <div id="buttons" class="w-1/3">
                @if($user->is_admin === false)
                <form class="appearance-none inline" method="POST" action="{{route('admin.make-user-admin', ['userId' => $user->id])}}">
                    @csrf
                    <button class="px-3 py-2 bg-teal-500 text-white text-xs font-bold uppercase rounded" type="submit" >Make Admin</button>
                </form>

                    <form class="appearance-none inline" method="POST" action="{{route('admin.delete-user', ['userId' => $user->id])}}">
                        @csrf
                        @method('delete')
                        <button class="px-3 py-2 bg-red-500 text-white text-xs font-bold uppercase rounded" type="submit" >Delete</button>
                    </form>

                @endif
            </div>
        </div>
    </div>
</div>
