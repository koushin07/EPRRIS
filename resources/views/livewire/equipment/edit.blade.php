
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
                        <input type="text" name="equipment_name" id="equipment_name"  {{ auth()->user()->municipality_id == $equipment->municipality_id ? '' : 'disabled' }}
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
                            required=""  {{ auth()->user()->municipality_id == $equipment->municipality_id ? '' : 'disabled' }}>
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
                            value="{{ $equipment->model_number }}" required=""  {{ auth()->user()->municipality_id == $equipment->municipality_id ? '' : 'disabled' }}
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>



                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="serial_number" class="block text-sm font-medium text-gray-700">Serial Number</label>
                        <input type="number" name="serial_number" id="serial_number"
                            value="{{ $equipment->serial_number }}" required=""  {{ auth()->user()->municipality_id == $equipment->municipality_id ? '' : 'disabled' }}
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>


                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="unit" class="block text-sm font-medium text-gray-700">Unit
                        </label>
                        <input type="number" name="unit" id="unit" value="{{ $equipment->unit }}"
                            required=""  {{ auth()->user()->municipality_id == $equipment->municipality_id ? '' : 'disabled' }}
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="code" class="block text-sm font-medium text-gray-700">Code
                        </label>
                        <input type="text" name="code" id="code"  {{ auth()->user()->municipality_id == $equipment->municipality_id ? '' : 'disabled' }}
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $equipment->code }}" required="">

                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="asset_id" class="block text-sm font-medium text-gray-700">asset ID
                        </label>
                        <input type="number" name="asset_id" id="asset_id"  {{ auth()->user()->municipality_id == $equipment->municipality_id ? '' : 'disabled' }}
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $equipment->asset_id }}" required="">

                    </div>



                </div>


                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category" required=""  {{ auth()->user()->municipality_id == $equipment->municipality_id ? '' : 'disabled' }}
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
                        required=""  {{ auth()->user()->municipality_id == $equipment->municipality_id ? '' : 'disabled' }}
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6">
                    <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                    <input type="text" name="remarks" id="remarks" value="{{ $equipment->remarks }}"
                        required=""  {{ auth()->user()->municipality_id == $equipment->municipality_id ? '' : 'disabled' }}
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>




            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    {{ auth()->user()->municipality_id == $equipment->municipality_id ? '' : 'disabled' }}
                    @class([
                        'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 
                                        hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500',
                                        'cursor-not-allowed' => auth()->user()->municipality_id != $equipment->municipality_id
                    ]) >Edit</button>
            </div>


        </div>
    </form>
</div>
