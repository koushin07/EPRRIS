<div>
    <div class="px-4 py-3  text-right sm:px-6">
        <button wire:click="$emit('openModal', 'equipment.create')"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md
             text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Create
        </button>
    </div>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="flex justify-between items-center py-4 bg-white dark:bg-gray-800">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative ml-3">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search-equipments"
                    class=" block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 
                     focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
                      dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="search" placeholder="Search for Equipment">
            </div>
            <div class="mr-3">

                <!-- Dropdown menu -->
                <x-dropdown>
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none
                             hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5
                              dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600
                               dark:focus:ring-gray-700"
                            type="button">

                            Sort By
                            <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                            <li>
                                <a href="javascript:void(0)"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    wire:click="sorting('')">all</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    wire:click="sorting('Serviceable')">Serviceable</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    wire:click="sorting('Poor')">Poor</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    wire:click="sorting('Unusable')">Unusable</a>
                            </li>

                        </ul>

                    </x-slot>

                </x-dropdown>



            </div>

        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="py-3 px-6">
                        Equipment Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Serial Number
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($equipments as $equipment)
               
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" 
                            @class([
                                'flex items-center py-4  text-gray-900 whitespace-nowrap dark:text-white ',
                                'border-l-4 border-l-green-600' => auth()->user()->municipality_id == $equipment->municipality_id,
                            ])>

                            <div class="pl-3">
                                <div class="text-base font-semibold ">{{ $equipment->equipment_name }}</div>
                                {{-- <div class="font-normal text-gray-500">neil.sims@flowbite.com</div> --}}
                            </div>
                        </th>
                        <td class="py-4 px-6">
                            {{ $equipment->serial_number }}
                        </td>
                        @if ($equipment->status == 'Serviceable')
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class=" bg-blue-400 rounded-3xl px-1 text-white font-medium mr-2">Serviceable
                                    </div>
                                </div>
                            </td>
                        @endif
                        @if ($equipment->status == 'Poor')
                            <td class="py-4 px-6">
                                <div class="flex items-center ">
                                    <div class="bg-red-500 rounded-3xl px-1 text-white font-medium mr-2">Poor</div>
                                </div>
                            </td>
                        @endif
                        @if ($equipment->status == 'Unusable')
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="bg-rose-400 rounded-3xl px-1 text-white font-medium mr-2">Unusable</div>
                                </div>
                            </td>
                        @endif
                        {{-- @click="modal = ! modal" --}}
                        <td class="py-4 px-6">
                            <!-- Modal toggle -->
                            <a wire:click='$emit("openModal", "equipment.edit", {{ json_encode([$equipment]) }})'
                                href="javascript:void(0)" type="button"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">details</a>

                        </td>
                    </tr>
                @empty
              
                <td class="py-4 px-6 bg-white">
                    <div class="flex items-center bg">
                        <div class="text-base font-semibold">No Record</div>
                    </div>
                </td>
                <td class="py-4 px-6 bg-white">
                   
                </td>
                <td class="py-4 px-6 bg-white">
                   
                </td>
                <td class="py-4 px-6 bg-white">
                   
                </td>
                   
                @endforelse


            </tbody>
        </table>

        <div class="bg-white">

            {{ $equipments->onEachSide(1)->links('vendor.livewire.tailwind') }}


        </div>

    </div>
</div>
