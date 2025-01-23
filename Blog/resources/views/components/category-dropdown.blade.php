<div x-data="{show:false}" class="w-32" style="dislplay:none">

    <button @click=" show = !show" class=" px-3 py-2 font-semibold text-sm flex w-full " @click.away="show=false">

        {{isset($currentCategory) ? $currentCategory->name : "Categories"}}

        <svg class="transform -rotate-90 pointer-events-none" style="right: 12px;" width="22" height="22"
            viewBox="0 0 22 22">
            <g fill="none" fill-rule="evenodd">
                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                </path>
                <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                </path>
            </g>
        </svg></button>

    <div x-show="show"
        class="absolute w-full bg-gray-100 text-left mt-2 rounded-xl z-10 text-sm py-2 h-56 overflow-auto ">
        <a class="block hover:bg-blue-400 focus:bg-blue-400 hover:text-white cursor-pointer px-3 py-1" href="/">
            All</a>

        @foreach ($categories as $category)
            <a class="block hover:bg-blue-400 focus:bg-blue-400 hover:text-white cursor-pointer px-3 py-1 {{isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-400 text-white' : ''}} "
                href="/?category={{$category->slug}}&{{http_build_query(request()->except('category', 'page'))}}">{{$category->name}}</a>
        @endforeach

    </div>
</div>