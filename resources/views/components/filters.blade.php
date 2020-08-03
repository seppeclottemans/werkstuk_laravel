<!-- multiselect styling + script: https://www.cssscript.com/multiselect-dropdown-list-checkboxes-multiselect-js/ -->
<select class="@error('categories') is-invalid @enderror" id="categories" name="categories[]" multiple>
    @foreach($categories as $category)
        <option @if(in_array($category->name, $userCategories))) selected @endif id="categoryOption" value="{{$category->name}}">{{$category->name}}</option>
    @endforeach
</select>

<!-- select styling: https://tailwindcss.com/components/forms/ -->
<div class="inline-block relative w-32 ml-8">
    <select name="sort" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline text-sm">
        <option @if(strcmp($selectedSort ?? "" , 'most_recent') == 0) selected @endif value="most_recent">Most recent</option>
        <option @if(strcmp($selectedSort ?? "" , 'oldest') == 0) selected @endif value="oldest">Oldest</option>
        <option @if(strcmp($selectedSort ?? "" , 'title_asc') == 0) selected @endif value="title_asc">Title asc</option>
        <option @if(strcmp($selectedSort ?? "" , 'title_desc') == 0) selected @endif value="title_desc">Title desc</option>
    </select>
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
    </div>
</div>
