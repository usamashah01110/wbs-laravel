<nav
    id="sidebar"
    class="bg-[#3A5F8F] text-gray-100 w-64 h-full flex-shrink-0 transition-all duration-300 flex flex-col justify-between"
>
    <div>
        <div class="p-4">
            <button id="sidebarToggle" class="text-gray-400 hover:text-white">
                <i id="toggleArrow" class="fas fa-arrow-left"></i>
            </button>
        </div>
        <ul>
            <li
                id="dashboardLink"
                class="hover:bg-gray-700 px-4 py-2 flex items-center gap-4 cursor-pointer"
            >
                <i class="fas fa-tachometer-alt h-6 w-6"></i>
                <span class="sidebar-text">Dashboard</span>
            </li>
            <li
                id="myAccountLink"
                class="hover:bg-gray-700 px-4 py-2 flex items-center gap-4 cursor-pointer"
            >
                <i class="fas fa-user-circle h-6 w-6"></i>
                <span class="sidebar-text">My Account</span>
            </li>
            <li
                id="logoutLink"
                class="hover:bg-gray-700 px-4 py-2 flex items-center gap-4 cursor-pointer"
            >
                <i class="fas fa-sign-out-alt h-6 w-6"></i>
                <span class="sidebar-text">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </span>
            </li>
        </ul>
    </div>
</nav>
