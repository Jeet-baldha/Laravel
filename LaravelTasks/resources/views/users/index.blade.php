<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>

<style>
    .sorting::after {
        content: none !important;
    }

    .sorting::before {
        content: none !important;
    }

    .sorting::after {
        content: none !important;
    }

    .sorting_asc::before {
        content: none !important;
    }

    .sorting_asc::after {
        content: none !important;
    }

    .sorting_desc::after {
        content: none !important;
    }

    .sorting_desc::before {
        content: none !important;
    }
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

    <div class=" px-10">
        <div class="my-4">
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

<script type="text/javascript">
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
                },
                {
                    data: null, render: function (data, type, row) {
                        return ' <a href=' + "/users/" + row.id + "/delete" + ' class="btn btn-danger inline-block" >Delete</a>'
                    },
                }
            ],
        });
    });
</script>

</html>