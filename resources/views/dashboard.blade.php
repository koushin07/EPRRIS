<x-app-layout>

    <div class=" mx-auto w-full">
        <div>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                    <x-card.small-card>
                        <x-slot name="title">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                Total

                            </h5>
                        </x-slot>
                        <x-slot name="content">
                            @php
                                $total = $serviceable + $poor + $unusable;
                            @endphp
                            {{ $total }}
                        </x-slot>
                        <x-slot name="icon">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-gradient-to-b from-green-800 to-green-500">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </x-slot>
                    </x-card.small-card>
                </div>
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                    <x-card.small-card>
                        <x-slot name="title">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                Serviceable
                            </h5>

                        </x-slot>
                        <x-slot name="content">
                            {{ $serviceable }}
                        </x-slot>
                        <x-slot name="icon">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gradient-to-b from-blue-800 to-blue-500">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </x-slot>
                    </x-card.small-card>
                </div>
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                    <x-card.small-card>
                        <x-slot name="title">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                Poor
                            </h5>
                        </x-slot>

                        <x-slot name="content">
                            {{ $poor }}
                        </x-slot>
                        <x-slot name="icon">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gradient-to-b from-red-800 to-red-500">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </x-slot>
                    </x-card.small-card>
                </div>

                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                    <x-card.small-card>
                        <x-slot name="title">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                Unusable
                            </h5>
                        </x-slot>
                        <x-slot name="content">
                            {{ $unusable }}
                        </x-slot>
                        <x-slot name="icon">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </x-slot>
                    </x-card.small-card>
                </div>
            </div>
        </div>
    </div>


    <div class="flex flex-wrap mt-6 -mx-3">

        @livewire('dashboard.equipment-qty')
        <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <x-card.normal-card>
                <div class="p-4 pb-0 rounded-t-4">
                    <h6 class="mb-0 dark:text-white">Categories</h6>
                </div>
                <div class="flex-auto p-4">
                    <ul class="flex flex-col pl-0 mb-0 rounded-lg">


                        <li
                            class="relative flex justify-between py-2 pr-4 border-0 rounded-b-lg rounded-xl text-inherit">
                            <div class="flex items-center">

                                <div class="flex flex-col">
                                    <h6 class="mb-1 leading-normal text-size-sm text-slate-700 dark:text-white">
                                        Happy users</h6>
                                    <span class="leading-tight dark:text-white/80 text-size-xs"><span
                                            class="font-semibold">+ 430 </span></span>
                                </div>
                            </div>
                            <div class="flex">
                                <button
                                    class="group ease-in leading-pro text-size-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg></button>
                            </div>
                        </li>
                    </ul>
                </div>

            </x-card.normal-card>
        </div>

    </div>

</x-app-layout>
