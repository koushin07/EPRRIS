<div>
    <div class="px-4 py-3   sm:px-6">
        <span class="font-sans text-xl subpixel-antialiased leading-relaxed text-clip hover:italic">{{ $name->province_name }}</span>
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
                    wire:model="search" placeholder="Search in {{ $name->province_name }}">
            </div>
            <div class="mr-3">

                <!-- Dropdown menu -->
              



            </div>

        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="py-3 px-6 text-center">
                        Municipality Name
                    </th>
                    <th scope="col" class="py-3 px-6 text-center">
                        Equipment
                    </th>
                    <th scope="col" class="py-3 px-6 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($municipalities as $municipality)
                    <tr
                        class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="items-center py-4 text-center text-gray-900 whitespace-nowrap dark:text-white">

                            <div class="pl-3 text-center">
                                <div class="text-base text-center font-semibold">{{ $municipality->municipality_name }}</div>
                                {{-- <div class="font-normal text-gray-500">neil.sims@flowbite.com</div> --}}
                            </div>
                        </th>
                        <th scope="row"
                        class="items-center py-4 text-center text-gray-900 whitespace-nowrap dark:text-white">

                        <div class="pl-3 text-center">
                            <div class="text-base text-center font-semibold">{{ $municipality->equipment_count }}</div>
                            {{-- <div class="font-normal text-gray-500">neil.sims@flowbite.com</div> --}}
                        </div>
                    </th>
                      
                        {{-- @click="modal = ! modal" --}}
                        <td class="py-4 px-6">
                            <!-- Modal toggle -->
                            <a 
                                href="{{ route('equipment.show', [$municipality->id]) }}"  type="button"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">details</a>

                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

        <div class="bg-white">

            {{ $municipalities->onEachSide(1)->links('vendor.livewire.tailwind') }}


        </div>

    </div>
</div>
