<div class="relative flex flex-col min-w-0 break-words rounded-3xl bg-white mb-6 xl:mb-0 shadow-lg">
    <div class="flex-auto p-4">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
              {{ $slot }}
            </div>
            {{-- <div class="relative w-auto pl-4 flex-initial">
                <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                    <i class="far fa-chart-bar"></i>
                </div>
            </div> --}}
        </div>
      
    </div>
</div>
