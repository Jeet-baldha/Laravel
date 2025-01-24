<article class=" flex bg-gray-100 border border-gray-200 rounded-xl p-5 space-x-4 ">
    <div class=" flex-shrink-0 ">
        <img src="https://i.pravatar.cc/60?id={{$comment->user_id}}" alt="avatar" width="60" height="80"
            class=" rounded-xl" />
    </div>

    <div>
        <div>
            <h3 class="font-bold">{{$comment->author->name}}</h3>
            <time>{{$comment->created_at->diffForHumans()}}</time>
        </div>
        <p class=" mt-4"> {{$comment->body}} </p>
    </div>
</article>