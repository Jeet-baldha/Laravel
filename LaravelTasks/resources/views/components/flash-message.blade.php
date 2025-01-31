@if (session()->has('success'))
    <div x-data="{show:true}" x-init="setTimeout(() => show = false , 2000)" x-show="show">
        <p class=" bg-blue-400 text-white px-3 fixed top-16 right-0 rounded-xl text-sm py-2  ">{{session('success')}}
        </p>
    </div>
@endif