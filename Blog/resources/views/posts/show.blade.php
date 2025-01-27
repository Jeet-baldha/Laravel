<x-layout>


    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="{{ asset('storage/' . $post->thumbnail)}}" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{$post->created_at->diffForHumans()}}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <a href="/?author={{$post->author->username  }}">
                            <h5 class="font-bold"> {{$post->author->name}} </h5>
                        </a>
                        <h6>Mascot at Laracasts</h6>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                        class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <div class="space-x-2">
                        <a href="/?category={{$post->category->slug}}"
                            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                            style="font-size: 10px">{{$post->category->name}}</a>

                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {!!$post->title!!}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">

                    <p>{!!$post->body!!}</p>
                </div>
            </div>
            <div class=" col-span-8 col-start-5 mt-10 space-y-6">
                @auth
                    <div class=" bg-gray-100 border border-gray-200 p-5 rounded-xl">
                        <div class="flex items-center">
                            <img class="rounded-full" src="https://i.pravatar.cc/60?id={{auth()->user()->id}}" width="40"
                                height="40">
                            <h3 class="ml-4 text-xl">Do you want to add somthing?</h3>
                        </div>
                        <div>
                            <form method="Post" action="/post/{{$post->slug}}/comment" class="mb-0 mt-4">
                                @csrf
                                <textarea class=" w-full border border-gray-200 p-2 " rows="3" name="body" required
                                    placeholder="share your thought.."></textarea>
                                <div class=" flex justify-end  mt-4 ">

                                    <button
                                        class="rounded-2xl px-5 py-1 text-md font-bold bg-blue-400 text-white hover:bg-blue-500">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endauth

                @foreach ($post->comment as $comment)

                    <x-post-comment :comment="$comment"></x-post-comment>
                @endforeach

            </div>
        </article>
    </main>

</x-layout>