<x-guest-layout>

    <div class=" w-full">
        <h1 class=" text-xl font-bold text-center my-6">Add New User</h1>
        <form method="post" action="/users/create" class=" w-full">
            @csrf
            <div class="mt-6">
                <label class=" tetx-xs font-semibold block ">First Name</label>
                <input class=" px-2 py-1 border border-gray-300 rounded " name="first_name" type="text"
                    value="{{old('first_name')}}" />
                @error('first_name')
                    <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>
            <div class="mt-6">
                <label class=" tetx-xs font-semibold block ">Last Name</label>
                <input class=" px-2 py-1 border border-gray-300 rounded " name="last_name" type="text"
                    value="{{old('last_name')}}" />
                @error('last_name')
                    <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>
            <div class="mt-6 ">
                <label class=" tetx-xs font-semibold block ">Email</label>
                <input class=" px-2 py-1 border border-gray-300 rounded " name="email" type="email"
                    value="{{old('email')}}" />
                @error('email')
                    <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>
            <div class="mt-6 ">
                <label class=" tetx-xs font-semibold block ">Password</label>
                <input class=" px-2 py-1 border border-gray-300 rounded " name="password" type="password" />
                @error('password')
                    <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>
            <div class="mt-6">
                <button
                    class=" text-white bg-blue-400 hover:bg-blue-500 hover:cursor-pointer font-bold px-2 py-1 rounded ">Submit</button>
            </div>
        </form>
    </div>

</x-guest-layout>