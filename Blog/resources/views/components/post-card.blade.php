<article {{$attributes->merge(["class" => "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"])}}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ asset('storage/' . $post->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <a href="?category={{$post->category->slug}}"
                        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                        style="font-size: 10px">{{$post->category->name}}</a>

                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{$post->title}}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {!!$post->excerpt!!}
                </p>


            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <a href="?author={{$post->author->username}}">
                            <h5 class="font-bold">{{$post->author->name}}</h5>
                        </a>
                        <h6>Mascot at Laracasts</h6>
                    </div>
                </div>

                <div>
                    <a href="/post/{{$post->slug}}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>


</article>