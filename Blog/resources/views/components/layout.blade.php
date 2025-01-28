<html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="/home.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="flex items-center mt-8 md:mt-0">
                @auth
                    <div x-data="{show:false}" class="" style="dislplay:none">

                        <button @click=" show = !show" class=" px-3 py-2 font-semibold text-sm flex w-full "
                            @click.away="show=false">
                            <span class="text-xs font-bold uppercase">Welcom back! {{auth()->user()->name}}</span>
                        </button>

                        <div x-show="show"
                            class="absolute  bg-gray-100 text-left mt-2 rounded-xl z-10 text-sm py-2     overflow-auto ">

                            @can('admin')

                                <a class="block hover:bg-blue-400 focus:bg-blue-400 hover:text-white cursor-pointer px-3 py-1 {{request()->is('admin/dashboard') ? 'bg-blue-500 text-white' : ''}}"
                                    href="/admin/dashboard">
                                    Dashboard</a>
                                <a class="block hover:bg-blue-400 focus:bg-blue-400 hover:text-white cursor-pointer px-3 py-1 {{request()->is('admin/post/create') ? 'bg-blue-500 text-white' : ''}}"
                                    href="/admin/post/create">
                                    Add Post</a>
                            @endcan
                            <button
                                class="text-left w-full hover:bg-blue-400 focus:bg-blue-400 hover:text-white cursor-pointer px-3 py-1"
                                @click.prevent="document.querySelector('#logoutForm').submit()">
                                Logout</button>


                        </div>
                    </div>
                    <div class=" flex items-center ">

                        <form id="logoutForm" method="POST" action="/logout" class=" mb-0">
                            @csrf

                        </form>
                    </div>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase ml-6 ">Login</a>
                @endauth
                <a href="#newaLatter"
                    class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{$slot}}


        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16"
            id="newaLatter">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newslatter" class="lg:flex text-sm mb-0">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>


                            <input id="email" type="text" name="email" placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
                @error('email')
                    <p class="text-red-400 text-xs mt-1 block"> {{$message}} </p>
                @enderror
            </div>
        </footer>
    </section>

    <x-flash></x-flash>
</body>

</html>