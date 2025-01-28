<x-layout>
    <main class="px-6 py-8 max-w-4xl mx-auto mt-10 ">
        <h1 class=" text-xl border-b mb-4 pb-4 font-bold border-gray-200">All Posts</h1>
        <div class=" flex">
            <div class="w-48 mr-8">
                <h1 class="mb-6 font-semibold text-xl">Links</h1>
                <ul>
                    <li class="mb-4">

                        <a class="text-blue-400 " href="/admin/dashboard">
                            Dashboard</a>
                    </li>
                    <li>

                        <a class="text-blue-400 mt-4" href="/admin/post/create">
                            New Post</a>
                    </li>
                </ul>
            </div>
            <div class="  w-full ">
                <div class="py-5 w-full ">
                    <table class="w-full mt-4 text-left table-auto min-w-max">
                        <tbody>

                            @foreach ($posts as $post)

                                <tr class="bg-gray-100 border border-gray-200 rounded  ">
                                    <td class="p-2 ">
                                        <div class="flex items-center gap-3">

                                            <div class="flex flex-col">
                                                <a href="/post/{{$post->slug}}"
                                                    class="text-sm font-semibold text-slate-700">
                                                    {{$post->title}}
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 ">
                                        <div class="flex flex-col">
                                            <p class="text-sm font-semibold text-slate-700">
                                                <time>{{$post->created_at->diffForHumans()}}</time>
                                            </p>

                                        </div>
                                    </td>
                                    <td class="p-2">
                                        <div class="w-max">
                                            <div
                                                class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                                                <span class="">Published</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2">
                                        <a href="/admin/post/{{$post->id}}/edit" class="text-sm text-blue-500">
                                            Edit
                                        </a>
                                    </td>
                                    <td class="p-2 border-b border-slate-200">
                                    <td class="p-2 border-b border-slate-200">
                                        <form action="/admin/post/{{$post->id}}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-sm text-red-500">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                    </td>
                                </tr>



                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$posts->links()}}
            </div>
        </div>
    </main>
</x-layout>