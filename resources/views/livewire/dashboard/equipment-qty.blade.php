<div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
    <x-card.normal-card>
        <div class="p-4 pb-0 mb-0 rounded-t-4">
            <div class="flex justify-between">
                <h6 class=" dark:text-white mb-3 font-bold">Equipments</h6>

                

            </div>

        </div>
        <div class="overflow-x-auto ps">
            <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                <tbody>
                    @foreach ($duplicates as $duplicate)
                        <tr>
                            <td
                                class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                <div class="flex items-center px-2 py-1">

                                    <div class="ml-6">
                                        <p
                                            class="mb-0 font-semibold leading-tight dark:text-white text-size-xs dark:opacity-60">
                                            Equipment:</p>
                                        <h6 class="mb-0 leading-normal text-size-sm dark:text-white">
                                            {{ $duplicate->equipment_name }}
                                        </h6>
                                    </div>
                                </div>
                            </td>


                            <td
                                class="p-2 leading-normal align-middle bg-transparent border-b text-size-sm whitespace-nowrap dark:border-white/40">
                                <div class="flex-1 text-center">
                                    <p
                                        class="mb-0 font-semibold leading-tight dark:text-white text-size-xs dark:opacity-60">
                                        Quantity:</p>
                                    <h6 class="mb-0 leading-normal text-size-sm dark:text-white">{{ $duplicate->qty }}
                                    </h6>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $duplicates->onEachSide(1)->links() }}
            <div class="d-flex justify-content-center">


            </div>

        </div>

    </x-card.normal-card>
</div>
