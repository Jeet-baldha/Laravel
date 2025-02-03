<x-guest-layout>
    <div class=" w-full">
        <h1 class=" text-xl font-bold text-center">Edit User Information</h1>
        <div class=" w-full flex justify-center">
            <form action="/users/{{$user->id}}/edit" method="post">
                @csrf
                @method('patch')
                <div class="mt-6">
                    <label class=" tetx-xs font-semibold block ">First Name</label>
                    <input class=" px-2 py-1 border border-gray-300 rounded " name="first_name" type="text"
                        value="{{$user->first_name}}" />
                    @error('first_name')
                        <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                    @enderror
                </div>
                <div class="mt-6">
                    <label class=" tetx-xs font-semibold block ">Last Name</label>
                    <input class=" px-2 py-1 border border-gray-300 rounded " name="last_name" type="text"
                        value="{{$user->last_name}}" />
                    @error('last_name')
                        <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                    @enderror
                </div>
                <div class=" mt-6">
                    <label class=" tetx-xs font-semibold block">Email</label>
                    <input class=" px-2 py-1 border border-gray-300 rounded " name="email" type="text"
                        value="{{$user->email}}" />
                    @error('email')
                        <p class="text-red-400 text-xs mt-1"> {{$message}} </p>
                    @enderror
                </div>
                <div class=" mt-6 ">
                    <button class=" bg-blue-500 hover:bg-blue-600 text-white font-bold  px-2 py-1 rounded  ">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-guest-layout>