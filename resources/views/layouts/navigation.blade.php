<style>
    span {
        color: #949d99;
    }

    .brainsterTitle {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 150%;
        margin: 6% 0%;


    }

    /* body {
        margin: 0;
        overflow-x: hidden;
        margin-bottom: 4%;
    } */

    .profile-images-card1 {
        margin: auto;
        display: table;
        background: #fff;
        padding: 5px 5px;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        margin-top: 1%;
    }

    .profile-images1 {
        width: 30px;
        height: 30px;
        background: #fff;
        border-radius: 50%;
        overflow: hidden;
    }

    .profile-images1 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .navbar {
        display: flex;
        margin-left: 20%;
    }

    .profileImage1 {
        margin-left: 373%;
        margin-top: 6%;
    }

    .marginLeft {
        margin-left: 97.3% !important;
        margin-top: 2.6%
    }

    .btnLogout {
        border: none !important;
        background-color: #f6f6f6 !important;

    }

    .iconLogout:hover {
        color: black !important;
    }

    .aLogout {
        color: #949d99 !important;
        font-size: 10px !important;
    }

    .aLogout:hover {
        color: black !important;
    }

    .iconLogout {
        color: #949d99 !important;
    }

    /* .fixed {
        position: fixed !important;
    } */

    .navbar-sticky-top {
        position: fixed;
        z-index: 999;
        opacity: 1;
        width: 100%;
    }

    .navInDiv {
        background-color: #f6f6f6 !important;
    }

</style>


<nav x-data="{ open: false }" class="bg-white border-b    border-gray-100 ">
    <!-- Primary Navigation Menu -->
    <div class=" ">
        <div class=" max-w-7xl mx-auto   px-4 sm:px-6 lg:px-8">
            <div class="flex   justify-between h-16">
                <div class="navInDiv">
                    <div class="flex navInDiv navbar-sticky-top ">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <div class="navbar">
                                <p class="brainsterTitle">brainster<span>preneus</span></p>
                                <a href="{{ route('projects.index') }}" class="profileImage1">
                                    <div class="profile-images-card1">
                                        <div class="profile-images1">

                                            <img src="{{ Auth::user()->image }}" id="image">



                                        </div>
                                    </div>
                                </a>
                            </div>

                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                            </a>
                        </div>


                        <!-- Navigation Links -->
                        {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div> --}}
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex marginLeft navbar-sticky-top sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex btnLogout  items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

                                {{-- <div>{{ Auth::user()->name }}</div> --}}

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div><i class="fas fa-sort-down iconLogout"></i>




                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="aLogout">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    {{-- <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                {{-- <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div> --}}
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                {{-- <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form> --}}
            </div>
        </div>
    </div>
</nav>
