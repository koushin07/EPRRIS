
<div class="mt-5 md:mt-0 md:col-span-2">
    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            send
        </h3>
        <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-toggle="editUserModal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <form action="{{ route('municipality.transaction.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">



                <div class="col-span-6 sm:col-span-3 space-y-2">
                    <input class="mb-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md" 
                type="number" name="quantity" id="quantity" placeholder="Quantity">
                    <label for="municipality_name" class="block text-sm font-medium text-gray-700">Municipality</label>
                    <x-input class="form-select block mt-1 w-full" list="muni" name="municipality_name" autocomplete="off"
                        required />

                    <datalist id="muni">
                        @foreach ($municipalities as $municipality)
                            <option value="{{ $municipality->municipality_name }}" />
                        @endforeach

                    </datalist>

                    <x-label for="equipment_name" :value="__('Equipment')" />
                    <x-input class="form-select block mt-1 w-full" list="equip" name="equipment_name" autocomplete="off"
                    required />

                <datalist id="equip">
                    @foreach ($equipments as $equipment)
                        <option value="{{ $equipment->equipment_name }}" />
                    @endforeach

                </datalist>
                    
                </div>
            </div>

            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('municipality.cross-transaction.create') }}">
                    Contact Province
                </a>
    
                 <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
    
            </div>


        </div>
    </form>
</div>
