{{-- <form method="post" action="{{ route('equipment.update', $equipment->id) }}" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
    @csrf
    @method('PUT')
    <!-- Modal header -->
    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
           Equipment
        </h3>
        
    </div>
    <!-- Modal body -->
    <div class="p-6 space-y-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="equipment_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipment
                    Name</label>
                <input type="text" name="equipment_name" id="equipment_name"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:value-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   value="{{ $equipment->equipment_name }}" required="">
                   @error('equipment_name')
                   <p class="text-sm text-red-600">{{ $message }}</p>
               @enderror
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="status"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <input type="text" name="status" id="status"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:value-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $equipment->status }}" required="">
                    @error('status')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="model_number"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model
                    Number</label>
                <input type="number" name="model_number" id="model_number"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:value-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $equipment->model_number }}" required="">
                    @error('model_number')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="serial_number"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial Number
                </label>
                <input type="number" name="serial_number" id="serial_number"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:value-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $equipment->serial_number }}" required="">
                    @error('number')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="unit"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
                <input type="number" name="unit" id="unit"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:value-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $equipment->unit }}" required="">
                    @error('unit')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="code"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                <input type="number" name="code" id="code"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:value-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $equipment->code }}" required="">
                    @error('unit')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="asset_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asset ID</label>
                <input type="number" name="asset_id" id="asset_id"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:value-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $equipment->asset_id }}" required="">
                    @error('asset_id')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <input type="number" name="category" id="category"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:value-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $equipment->category }}" required="">
                    @error('category')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="asset_desc"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asset Description
                </label>
                <input type="text" name="asset_desc" id="asset_desc"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:value-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $equipment->asset_desc }}" required="">
                    @error('asset_desc')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="remarks"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks
                </label>
                <input type="text" name="remarks" id="remarks"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:value-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $equipment->remarks }}"  required="">
                    @error('remarks')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <!-- Modal footer -->
    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save
            all</button>
    </div>
</form> --}}

<div class="mt-5 md:mt-0 md:col-span-2">
    <form action="{{ route('equipment.update', $equipment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="equipment_name" class="block text-sm font-medium text-gray-700">Equipment
                            Name</label>
                        <input type="text" name="equipment_name" id="equipment_name"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $equipment->equipment_name }}" required="">
                        @error('equipment_name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select type="text" name="status" id="status"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            required="">
                            <option value="{{ $equipment->status }}" selected disabled hidden>
                                {{ $equipment->status }}
                            </option>
                            <option value="Serviceable">Serviceable</option>
                            <option value="Poor">Poor</option>
                            <option value="Unusable">Unusable</option>


                        </select>
                    </div>



                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="model_number" class="block text-sm font-medium text-gray-700">Model
                            Number</label>
                        <input type="number" name="model_number" id="model_number"
                            value="{{ $equipment->model_number }}" required=""
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>



                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="serial_number" class="block text-sm font-medium text-gray-700">Serial Number</label>
                        <input type="number" name="serial_number" id="serial_number"
                            value="{{ $equipment->serial_number }}" required=""
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>


                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="unit" class="block text-sm font-medium text-gray-700">Unit
                        </label>
                        <input type="number" name="unit" id="unit" value="{{ $equipment->unit }}"
                            required=""
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="code" class="block text-sm font-medium text-gray-700">Code
                        </label>
                        <input type="text" name="code" id="code"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $equipment->code }}" required="">

                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="asset_id" class="block text-sm font-medium text-gray-700">asset ID
                        </label>
                        <input type="number" name="asset_id" id="asset_id"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $equipment->asset_id }}" required="">

                    </div>



                </div>


                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category" required=""
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="none" selected disabled hidden>
                            {{ $equipment->category }}
                        </option>
                        <option value="Category1">Category 1</option>
                        <option value="Category2">Category 2</option>
                        <option value="Category3">Category 3</option>
                    </select>
                </div>




                <div class="col-span-6">
                    <label for="asset_desc" class="block text-sm font-medium text-gray-700">Asset Description</label>
                    <input type="text" name="asset_desc" id="asset_desc" value="{{ $equipment->asset_desc }}"
                        required=""
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6">
                    <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                    <input type="text" name="remarks" id="remarks" value="{{ $equipment->remarks }}"
                        required=""
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>




            </div>
            @can('update', $equipment)
                 <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
            @endcan
           
        </div>
    </form>
</div>
