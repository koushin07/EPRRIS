<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

    <style>
        input::-webkit-calendar-picker-indicator {
            opacity: 0;
        }
    </style>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class=" font-sans" 
    x-data="{ modal: false,
         dropdown: true,
         }" x-cloak
    style="background: linear-gradient(110deg, #3b3efd 50%, #453ae6 60%);">


    <div class="w-full h-full">

        <div class="flex flex-no-wrap bg-fixed ">
            @auth
                <x-sidebar />
            @endauth


            <div class="container mx-auto  md:w-4/5 pb-10 h-64  w-11/12  bg-gradient-to-b to-yellow-300 from-yellow-500 "
                style="border-bottom-left-radius: 40%;
            border-bottom-right-radius: 40%;">
                <!-- component -->

                @auth
                    @include('layouts.partials.navbar')
                @endauth


                {{ $slot }}


            </div>


        </div>
        <a class="fixed px-4 py-2 bg-transparent  cursor-pointer bottom-8 right-8 text-size-xl z-990  text-slate-700">
            <div onclick="Livewire.emit('openModal', 'send')"
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-2xl  rounded-full bg-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 center mb-1 ml-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="rotate: 40deg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
            </div>
        </a>
    </div>


    @livewireScripts
    @livewire('livewire-ui-modal')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        var sideBar = document.getElementById("mobile-nav");
        var openSidebar = document.getElementById("openSideBar");
        var closeSidebar = document.getElementById("closeSideBar");
        sideBar.style.transform = "translateX(-260px)";

        function sidebarHandler(flag) {
            if (flag) {
                sideBar.style.transform = "translateX(0px)";
                openSidebar.classList.add("hidden");
                closeSidebar.classList.remove("hidden");
            } else {
                sideBar.style.transform = "translateX(-260px)";
                closeSidebar.classList.add("hidden");
                openSidebar.classList.remove("hidden");
            }
        }
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    @if (Session::has('success'))
        <script>
            toastr["success"]('{!! session::get('success') !!}')
            // toastr.success('{!! session::get('equipment_added') !!}')
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr["error"]('{!! session::get('error') !!}')
            // toastr.success('{!! session::get('equipment_added') !!}')
        </script>
    @endif
</body>

</html>
