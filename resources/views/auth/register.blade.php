<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
        x-data="{ municipality: true, province: false }">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>


        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tabFill"
                role="tablist">
                <li class="nav-item flex-auto text-center" role="presentation">
                    <a @click="municipality = true; province = ! municipality"
                        :class="municipality ? 'border-blue-600' : ''"
                        class="cursor-pointer nav-link w-full block font-medium text-xs leading-tight  uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:bg-gray-100 focus:border-transparent   "
                        id="tabs-home-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-homeFill" role="tab"
                        aria-controls="tabs-homeFill" aria-selected="true">Municipality</a>
                </li>
                <li class="nav-item flex-auto text-center" role="presentation">
                    <a @click="municipality = false; province = ! municipality"
                        :class="province ? 'border-blue-600' : ''"
                        class="cursor-pointer nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0  border-b-2 border-transparent px-6 py-3 my-2  hover:bg-gray-100 focus:border-transparent " "
                        id="tabs-profile-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-profileFill"
                        role="tab" aria-controls="tabs-profileFill" aria-selected="false"> Province</a>
                </li>

            </ul>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            {{-- MUNICIPALITY FORM --}}
            <template x-if="municipality" >
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <x-input class="hidden" type="text" value="municipality" name="role"/>
                    <div >
                        <x-label for="municipality" :value="__('Municipality')" />

                        <x-input class="form-select block mt-1 w-full" list="muni"
                            name="municipality"  autocomplete="off" required />
                            
                            <datalist id="muni">
                             @foreach ($municipalities as $municipality)
                        <option value="{{ $municipality->municipality_name }}" />
                        @endforeach

                        </datalist>
                    </div>
                    <!-- Name -->
                    
                    {{-- <div class="mt-4">
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus />
                    </div> --}}

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required />
                    </div>
                   
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="ml-4">
                            {{ __('Register as Municipality') }}
                        </x-button>
                    </div>
                </form>
            </template>
            {{-- PROVINCE FORM --}}
            <template x-if="province" >
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <x-input class="hidden" type="text" value="province" name="role"/>
                    <div >
                        <x-label for="province" :value="__('Province')" />

                        <x-input class="form-select block mt-1 w-full" list="prov"
                            name="province"  autocomplete="off" required />
                            
                            <datalist id="prov">
                             @foreach ($provinces as $province)
                        <option value="{{ $province->province_name }}" />
                        @endforeach

                        </datalist>
                    </div>
                    <!-- Name -->
                    {{-- <div class="mt-4">
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus />
                    </div> --}}

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required />
                    </div>
                   
                    
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-button class="ml-4">
                {{ __('Register as province') }}
            </x-button>
        </div>
        </form>
        </template>

    </div>
    </div>
    {{-- <x-auth-card>
        <x-slot name="logo">
           
        </x-slot>

       
      

     
    </x-auth-card> --}}
</x-guest-layout>
