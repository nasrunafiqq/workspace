<!DOCTYPE html>
<html lang="en" class="">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workspace</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-300 ">
    <!--
        This example requires updating your template:

        ```
        <html class="h-full bg-gray-100">
        <body class="h-full">
        ```
        -->
    <div class="flex flex-col h-screen">
        <nav class="bg-gray-100 ">
            <div class="mx-auto px-14 shadow">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="/">
                                <img class="w-logo" src="{{ Vite::asset('resources/images/workspace-logo.png') }}"
                                    alt="Your Company">
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <x-nav-link href="/" :active="request()->is('/')">welcome</x-nav-link>
                                @auth
                                    <x-nav-link href="/home" :active="request()->is('home')">Home</x-nav-link>
                                    <x-nav-link href="/team" :active="request()->is('team')">Team</x-nav-link>
                                    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <x-nav-link type="submit">logout</x-nav-link>
                                    </form>
                                   
                                @endAuth
                            </div>
                        </div>
                    </div>

                    @Auth
                        <div class="hidden md:block">
                            <div class="ml-4 flex items-center md:ml-6">
                                <button type="button"
                                    class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">View notifications</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                    </svg>
                                </button>

                                <!-- Profile dropdown -->
                                <div class="relative ml-3">
                                    <div>
                                        <button type="button"
                                            class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="absolute -inset-1.5"></span>
                                            <span class="sr-only">Open user menu</span>
                                            <img class="h-8 w-8 rounded-full"
                                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="">
                                        </button>
                                    </div>

                                    <!--
                                                                                        Dropdown menu, show/hide based on menu state.
                                                                        
                                                                                        Entering: "transition ease-out duration-100"
                                                                                            From: "transform opacity-0 scale-95"
                                                                                            To: "transform opacity-100 scale-100"
                                                                                        Leaving: "transition ease-in duration-75"
                                                                                            From: "transform opacity-100 scale-100"
                                                                                            To: "transform opacity-0 scale-95"
                                                                                        -->

                                    {{-- hide for future use --}}
                                    {{-- <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endAuth

                    @guest
                        <div class=" space-x-2">
                            <x-nav-button href="/login">
                                Login
                            </x-nav-button>
                            <x-nav-button href="/register">
                                Register
                            </x-nav-button>
                        </div>
                    @endguest

                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            {{-- <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                        aria-current="page">Dashboard</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                            <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                        </div>
                        <button type="button"
                            class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                            Profile</a>
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                            out</a>
                    </div>
                </div>
            </div> --}}
        </nav>


        <header class="bg-black shadow-xl">
            <div class=" max-w-7xl py-6 px-14 ">
                <h1 class="text-3xl font-bold tracking-tight text-white">{{ $heading }}</h1>
            </div>
        </header>



        @auth
            <main class="flex-1 mt-5 ">
                <section class="flex px-14 space-x-8 h-full item-start ">
                    <div class="rounded-lg h-fit bg-white w-1/4 overflow-hidden px-6 py-6">
                        <div class=" flex space-x-3 items-center  mb-3">
                            <div class="w-full relative items-center">
                                <span class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </span>
                                <input type="text"
                                    class="block w-full ps-10 text-sm rounded-lg w-full p-2 border-2 border-black"
                                    placeholder="quick search">
                            </div>
                            <x-button>
                                search
                            </x-button>
                        </div>
                        <hr>
                        <div class="flex flex-col mt-3">
                            <a href="/about"
                                class="flex-1 hover:bg-black group hover:text-white rounded-lg pt-2 transition-all duration-300">
                                <span class="inline-flex space-x-3 ">
                                    <svg class="w-6 h-6 text-gray-800 ml-[5px] group-hover:text-white fill-current transition-all duration-300"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill=""
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z">
                                        </path>
                                    </svg>
                                    <p class="text-[15px]">Calendar</p>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col w-3/4">
                        {{ $slot }}
                    </div>
                </section>
            </main>
        @endAuth

        @guest
            <main class="flex-1 ">
                <section class=" h-full grid place-items-center ">
                    {{ $slot }}
                </section>
            </main>
        @endguest

    </div>

    <!-- The Modal -->
    <div id="modal"
        class="hidden fixed top-0 left-0 z-80 
            w-screen h-screen bg-black/70 flex 
            justify-center items-center"
        onclick="closeModal()">

        <!-- The close button -->
        <a class="fixed z-90 top-6 right-8 
            text-white text-5xl font-medium" href="javascript:void(0)"
            onclick="closeModal()">
            ×
        </a>

        <!-- A big image will be displayed here -->
        <img id="modal-img" class="max-w-[800px] max-h-[600px] object-cover" />
    </div>
</body>

<script>
    // Get all the img elements in the grid
    var images = document.querySelectorAll('.grid img');

    // Loop through each img element
    images.forEach(function(img) {

        // Add a click event listener to each img element
        img.addEventListener('click', function() {
            showModal(img.src);
        });
    });

    // Get the modal by id
    var modal = document.getElementById("modal");

    // Get the modal image tag
    var modalImg = document.getElementById("modal-img");

    // This function is called when a small image is clicked
    function showModal(src) {
        modal.classList.remove('hidden');
        modalImg.src = src;
    }

    // This function is called when the close button is clicked
    function closeModal() {
        modal.classList.add('hidden');
    }
</script>

</html>
