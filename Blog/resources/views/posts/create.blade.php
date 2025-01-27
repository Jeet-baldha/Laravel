<x-layout>
    <main class="px-6 py-8 max-w-lg mx-auto mt-10 ">

        <h1 class="text-2xl text-center font-bold">Publish New Post</h1>
        <form method="POST" accept="admin/post/create" enctype="multipart/form-data"
            class="mt-10 p-6 bg-gray-100 border border-gray-200 rounded-xl ">

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
                <input class=" border border-gray-400 rounded-md p-2  text-xs w-full " type="text" name="slug" id="slug"
                    value="{{ old('slug') }}" required />

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
    </main>
</x-layout>