<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <x-container>
        <div class="flex justify-between items-center h-16">
         
  
            {{-- If logged in show name and nav dropdown. If guest, show a login/register button --}}
            <div class="hidden md:flex md:items-center md:justify-end basis-1/4">
                @guest
                    <div class="w-fit text-sm space-x-2">
                        <a href="{{route('login')}}" class="px-4 py-2 rounded-xl text-white m-0 bg-red-500 hover:bg-red-600 transition">{{__('Login')}}</a>
                        <a href="{{route('register')}}" class="px-4 py-2 border rounded-xl bg-neutral-50 hover:bg-neutral-100 transition">{{__('Register')}}</a>
                    </div>
                @endguest
                @auth
                   
                                    <div>{{ Auth::user()->name ?? '' }}</div>

                @endauth
            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </x-container>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        
        <div class="pt-2 pb-3 space-y-1">
            {{-- Show login and register links for guest --}}
            @guest
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            @endguest
            {{-- Show authed settings menu --}}
            @auth
              
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name ?? '' }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email ?? '' }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
            </div>
        </div>
    </div>
</nav>
