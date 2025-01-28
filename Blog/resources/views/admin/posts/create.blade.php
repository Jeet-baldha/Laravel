<x-layout>
    <main class="px-6 py-8 max-w-3xl mx-auto mt-10 ">

        <h1 class=" text-xl border-b mb-4 pb-4 font-bold border-gray-200">Publish new post</h1>
        <div class=" flex mt-10  space-x-8 w-full">
            <div class="w-48 ">
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
            <form method="POST" action="/admin/post/create" enctype="multipart/form-data"
                class="p-6 bg-gray-100 border border-gray-200 rounded-xl w-full ">
                @csrf
                <div class=" mb-6 ">
                    <label for="title" class=" block mb-2 text-uppercase font-bold text-xs text-gray-700">
                        Title
                    </label>
                    <input class=" border border-gray-400 rounded-md p-2  text-xs w-full " type="text" name="title"
                        id="title" value="{{ old('title') }}" required />
                    @error('title')
                        <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                    @enderror
                </div>
                <div class=" mb-6 ">
                    <label for="slug" class=" block mb-2 text-uppercase font-bold text-xs text-gray-700">
                        Slug
                    </label>
                    <input class=" border border-gray-400 rounded-md p-2  text-xs w-full " type="text" name="slug"
                        id="slug" value="{{ old('slug') }}" required />
                    @error('slug')
                        <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                    @enderror
                </div>
                <div class=" mb-6 ">
                    <label for="thumbnail" class=" block mb-2 text-uppercase font-bold text-xs text-gray-700">
                        Thumbnail
                    </label>
                    <input class=" border border-gray-400 rounded-md p-2  text-xs w-full " type="file" name="thumbnail"
                        id="thumbnail" required />
                    @error('thumbnail')
                        <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                    @enderror
                </div>
                <div class=" mb-6 ">
                    <label for="excerpt" class=" block mb-2 text-uppercase font-bold text-xs text-gray-700">
                        Excerpt
                    </label>
                    <textarea class="border border-gray-400 rounded-md p-2  text-xs w-full " rows="3" name="excerpt"
                        required>{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                    @enderror
                </div>
                <div class=" mb-6 ">
                    <label for="body" class=" block mb-2 text-uppercase font-bold text-xs text-gray-700">
                        Body
                    </label>
                    <textarea class="border border-gray-400 rounded-md p-2  text-xs w-full " rows="5" name="body"
                        required>{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                    @enderror
                </div>
                <?php
$categories = App\Models\Category::all();
                ?>
                <div class=" mb-6 ">
                    <label for="excerpt" class=" block mb-2 text-uppercase font-bold text-xs text-gray-700">
                        Select Category
                    </label>
                    <select class=" border border-gray-400 rounded-md p-2  text-sm w-full" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}}>
                                {{ ucwords($category->name)}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class=" mb-6">
                    <button class=" bg-blue-400 text-white rounded px-4 py-2 hover:bg-blue-500 ">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-layout>