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

    </style>
    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class=" font-sans scrollbar scrollbar-hidden-x" x-data="{
    modal: false,
    dropdown: true,
    notif: false,
}" x-cloak
    style="background: linear-gradient(110deg, #83B4B3 50%, #9bc9c8 60%);">


    <div class="w-full h-full">

        <div class="flex flex-no-wrap bg-fixed ">
            @auth
                <x-sidebar />
            @endauth


            <div class="container mx-auto  md:w-4/5 pb-10 h-64  w-11/12  bg-gradient-to-b to-yellow-300 from-yellow-500"
                style="border-bottom-left-radius: 40%;
            border-bottom-right-radius: 40%;">
                <!-- component -->

                @auth
                    @include('layouts.partials.navbar')
                @endauth

                @auth
                    {{ $slot }}

                    @can('municipality')
                        @livewire('notifications.municipality.notif-tab')
                    @endcan
                    @can('province')
                        @livewire('notifications.province.notif-tab')
                    @endcan

                    @if (auth()->user()->role =='rdrrmc')
                        @livewire('notifications.rdrrmc.notif-tab')
                    @endif


                @endauth



            </div>


        </div>
        <a x-show="!notif"
            class="fixed px-4 py-2 bg-transparent  cursor-pointer bottom-8 right-8 text-size-xl z-990  text-slate-700">
            <div onclick="Livewire.emit('openModal', 'send')"
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-2xl  rounded-full bg-slate-400">
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



    @if (Session::has('success'))
        <script>
            toastr["success"]('{!! session::get('success') !!}')
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr["error"]('{!! session::get('error') !!}')
        </script>
    @endif
    @if (auth()->user()->role == 'municipality')
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                Echo.private('requestSend.{{ auth()->user()->municipality_id }}').listen("MunicipalityTransactionEvent",
                    (e) => {
                        console.log(e.owner.owner.equipment[0].equipment_name)
                        window.livewire.emit("notif");
                        Swal.fire({
                            icon: "warning",
                            title: 'Request Recieve',
                            html: `Municipality of ${e.owner.sender.municipality_name} Request <br> for ${e.owner.owner.equipment[0].equipment_name} Equipment`,

                            footer: '<a href="">Why do I have this issue?</a>',
                        });
                    });



            })
        </script>
    @endif

    @if (auth()->user()->role == 'province')
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                Echo.private('MtoPtransaction.{{ auth()->user()->province_id }}').listen("MtoPTransactionEvent", (
                    e) => {
                    window.livewire.emit("notif");
                    Swal.fire({
                        icon: "warning",
                        title: 'New Request',
                        text: "Cross Transaction Recieve",
                    });
                })
            })
        </script>
    @endif
    @if (auth()->user()->role == 'rdrrmc')
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                Echo.private('toAdmin.{{ auth()->user()->role }}').listen("toAdminTransactionEvent", (
                    e) => {
                    window.livewire.emit("notif");
                    Swal.fire({
                        icon: "warning",
                        title: 'New Request',
                        text: "Cross Transaction Recieve",
                    });
                })
            })
        </script>
    @endif



</body>

</html>
