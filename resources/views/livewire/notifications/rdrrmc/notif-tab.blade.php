<div x-show="notif" @click.outside="notif = false"
    class=" z-sticky shadow-soft-3xl w-90 ease-soft fixed top-0 left-auto flex h-full min-w-0
     flex-col break-words rounded-none border-0 bg-white bg-clip-border px-2.5 duration-200 right-0"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-4"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 transform translate-x-4">
    <div class="px-5 pt-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
        <div class="flex justify-between items-start p-4 dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Notification
            </h3>
            <button type="button" @click="notif = false"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent">

    <div class="flex-auto p-6 pt-0 sm:pt-4  overflow-auto scrollbar">

        <div>
            <h6 class="mb-0">Equipment Request</h6>
        </div>
        @forelse ($borrows as $borrow)
            <div class="w-full p-3 mt-4 bg-white rounded shadow flex flex-shrink-0" x-data="{ expand: false }"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95">
                <div tabindex="0" aria-label="group icon" role="img"
                    class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex flex-shrink-0 items-center justify-center">
                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg3.svg" alt="icon" />

                </div>

                <div class="pl-3 w-full">
                    <div class="flex items-center justify-between w-full ">
                        <p tabindex="0" class="focus:outline-none text-sm leading-none">
                            Municipality of
                            <span class="text-indigo-700">{{ $borrow->municipality_name }}
                            </span>
                            <br> request {{ $borrow->quantity }}
                            <span class="text-indigo-700">{{ $borrow->equipment_name }}</span>
                        </p>
                        <div role="button" @click="expand = ! expand" class="focus:outline-none cursor-pointer ml-4 ">
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': expand }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>

                        </div>
                    </div>
                    <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500 mb-2">
                        {{ $borrow->created_at }}
                    </p>
                    <div class="flex ml-2 items-center justify-between w-full" x-show="expand" x-collapse>
                        <div class="flex items-center justify-between w-full">
                            <span wire:click.prevent="decision('accept', {{ $borrow->id }})"
                                class="text-white antialiased self-center text-sm px-1 border rounded-3xl border-green-500 bg-green-500 cursor-pointer">
                                Accept
                            </span>
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <span wire:click.prevent="decision('deny', {{ $borrow->id }})"
                                class="text-white antialiased self-center text-sm px-1 border rounded-3xl border-red-500 bg-red-500 cursor-pointer">
                                Deny
                            </span>
                        </div>
                    </div>

                </div>



            </div>
        @empty
            <div class="w-full p-3 mt-4 bg-white rounded shadow flex flex-shrink-0">
                <div class="pl-3 w-full">
                    <div class="flex items-center justify-between w-full ">
                        <p tabindex="0" class="focus:outline-none text-sm leading-none">
                            No Notificiation
                        </p>



                    </div>
                </div>


            </div>
        @endforelse



    </div>
</div>
