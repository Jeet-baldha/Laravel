@if (session()->has('success'))
    <div x-data="{show:true}" x-init="setTimeout(() => show = false , 4000)" x-show="show">
        <p class=" bg-blue-400 text-white px-3 fixed right-3 bottom-3 rounded-xl text-sm py-2  ">{{session('success')}}
        </p>
    </div>
@endif