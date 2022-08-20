<x-app-layout>
    <div class="flex flex-wrap -mx-3 ">
        <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
            <div
                class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                    <h5>Cross Transaction</h5>
                </div>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="flex-auto p-6">
                    <form action="{{ route('municipality.cross-transaction.store') }}" method="POST" role="form text-left">
                        @csrf
                        @method('POST')
                        <div class="mb-4">
                            <input type="text"
                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                autocomplete="off" required list="muni" name="municipality_name" placeholder="Municipality">
                            <datalist id="muni">
                                @foreach ($municipalities as $municipality)
                                    <option value="{{ $municipality->municipality_name }}" />
                                @endforeach

                            </datalist>

                        </div>
                        <div class="mb-4">
                            <input type="text"
                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                autocomplete="off" required list="equip" name="equipment_name" placeholder="Equipment">
                                <datalist id="equip">
                                    @foreach ($equipments as $equipment)
                                        <option value="{{ $equipment->equipment_name }}" />
                                    @endforeach
    
                                </datalist>
                        </div>
                        <div class="mb-4">
                            <input type="number" 
                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                placeholder="Quantity" name="quantity">
                        </div>

                        <div class="text-center">
                            <button type="submit"
                                class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Sign
                                up</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
