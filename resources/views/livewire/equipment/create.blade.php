<div class="mt-5 md:mt-0 md:col-span-2">
    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="equipment_name" class="block text-sm font-medium text-gray-700">Equipment
                            Name</label>
                        <input type="text" name="equipment_name" id="equipment_name"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            required="">
                        @error('equipment_name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select type="text" name="status" id="status"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            required="">

                            <option value="Serviceable">Serviceable</option>
                            <option value="Poor">Poor</option>
                            <option value="Unusable">Unusable</option>


                        </select>
                        @error('status')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="model_number" class="block text-sm font-medium text-gray-700">Model
                            Number</label>
                        <input type="number" name="model_number" id="model_number" required=""
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>



                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="serial_number" class="block text-sm font-medium text-gray-700">Serial Number</label>
                        <input type="number" name="serial_number" id="serial_number" required=""
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>


                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="unit" class="block text-sm font-medium text-gray-700">Unit
                        </label>
                        <input type="number" name="unit" id="unit" required=""
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="code" class="block text-sm font-medium text-gray-700">Code
                        </label>
                        <input type="text" name="code" id="code"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            required="">

                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="asset_id" class="block text-sm font-medium text-gray-700">asset ID
                        </label>
                        <input type="number" name="asset_id" id="asset_id"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            required="">

                    </div>



                </div>


                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category" required=""
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <option value="Category1">Category 1</option>
                        <option value="Category2">Category 2</option>
                        <option value="Category3">Category 3</option>
                    </select>
                </div>




                <div class="col-span-6">
                    <label for="asset_desc" class="block text-sm font-medium text-gray-700">Asset Description</label>
                    <input type="text" name="asset_desc" id="asset_desc" required=""
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6">
                    <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                    <input type="text" name="remarks" id="remarks" required=""
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>




            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
        </div>
    </form>
</div>
