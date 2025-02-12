<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<style>



</style>

<body class="">
    <header class="flex justify-between px-8 py-1 items-center border-b border-gray-400">
        <div class="flex ">
            <h1>Laravel</h1>
        </div>
        @if (Route::has('login'))
            <nav class=" flex flex-1 justify-end">
                @auth
                    <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ">
                        Dashboard
                    </a>
                    <a href="{{ url('/profile') }}" class="rounded-md px-3 py-2 text-black ">
                        {{auth()->user()->full_name}}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent">
                        Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <div class=" px-10 pb-5">
        <div class="py-4">
            <a class=" text-white bg-blue-400 hover:bg-blue-500 hover:cursor-pointer font-bold px-2 py-2 rounded outline-none border-none hover:no-underline   "
                href="/users/create">+ Add User</a>
        </div>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th width="50px"></th>
                    <th width="50px"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <x-flash-message></x-flash-message>
</body>

<script type="module">
    $(function () {
        let datatable = $(".data-table").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'first_name', name: 'first_name' },
                { data: 'last_name', name: 'last_name' },
                { data: 'email', name: 'email' },
                {
                    data: null, render: function (data, type, row) {
                        return '<a href=' + "/users/" + row.id + "/edit" + ' class="btn btn-primary inline-block" >Edit</a> '
                    },
                    sortable: false
                },
                {
                    data: null, render: function (data, type, row) {
                        return ' <a href=' + "/users/" + row.id + "/delete" + ' class="btn btn-danger inline-block" >Delete</a>'
                    },
                    sortable: false
                }
            ],
        });
    });
</script>

</html>