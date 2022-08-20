<div class="block relative" >
    {{-- href="{{ route('municipality.transaction.show',[auth()->id()]) }}" --}}
    <button type="button" class="inline-block py-2 px-3 hover:shadow-lg rounded-full relative"  wire:click.prevent="read"
     @click="notif = true">
        <div class="flex items-center h-5" >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>

            @if (!$notification->isEmpty())
              <div class="inline-flex  absolute -top-0  -right-0  w-3 h-3   bg-sky-500 rounded-full ">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
            </div>
            @endif
          


        </div>
    </button>

</div>
