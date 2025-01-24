<x-layout>
    <main class="px-6 py-8 max-w-lg mx-auto mt-10 ">

        <h1 class=" text-center font-bold text-xl"> Login</h1>
        <form method="POST" action="/login" class="mt-10 p-6 bg-gray-100 border border-gray-200 rounded-xl ">

            @csrf
            <div class=" mb-6 ">
                <label for="email" class=" block mb-2 text-uppercase font-bold text-xs text-gray-700">
                    Email
                </label>
                <input class=" border border-gray-400 rounded-md p-2  text-xs w-full " type="text" name="email"
                    id="email" value="{{ old('email') }}" required />
                @error('email')
                    <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>
            <div class=" mb-6 ">
                <label for="password" class=" block mb-2 text-uppercase font-bold text-xs text-gray-700">
                    Password
                </label>
                <input class=" border border-gray-400 rounded-md p-2  text-xs w-full " type="password" name="password"
                    id="password" required />
                @error('password')
                    <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>

            <div class=" mb-6">
                <button class=" bg-blue-400 text-white rounded px-4 py-2 hover:bg-blue-500 ">
                    Submit
                </button>
            </div>
        </form>
    </main>
</x-layout>