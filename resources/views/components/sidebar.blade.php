@props(['title'])

<div class="drawer lg:drawer-open">
    <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Navbar -->
        <nav class="navbar w-full bg-base-300 justify-between">
            <div class="flex justify-center items-center">
                <label for="my-drawer-4" aria-label="open sidebar" class="btn btn-square btn-ghost">
                    <!-- Sidebar toggle icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round"
                        stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor"
                        class="my-1.5 inline-block size-4">
                        <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                        </path>
                        <path d="M9 4v16"></path>
                        <path d="M14 10l2 2l-2 2"></path>
                    </svg>
                </label>
                <div class="px-4">{{ $title }}</div>

            </div>
            <div>
                @auth
                    <a href="/logout" class="btn btn-accent">Logout</a>
                @endauth
                @guest

                    <a href="/register" class="btn btn-primary">Register</a>
                    <a href="/login" class="btn btn-secondary">Login</a>
                @endguest
            </div>
        </nav>
        <!-- Page content here -->
        <main class="pt-4 px-4">
            {{ $slot }}
        </main>
    </div>

    <div class="drawer-side md:drawer-open is-drawer-close:overflow-visible">
        <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
        <div
            class="flex min-h-full flex-col justify-between items-start bg-base-200 is-drawer-close:w-14 is-drawer-open:w-52">

            <!-- Sidebar content here -->
            <ul class="menu w-full grow">
                <!-- List item -->
                <li>
                    <a href="/"
                        class="is-drawer-close:tooltip is-drawer-close:tooltip-right {{ request()->is('/') ? 'menu-active' : '' }}"
                        data-tip="Homepage">
                        <!-- Home icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round"
                            stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor"
                            class="my-1.5 inline-block size-4">
                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path>
                            <path
                                d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                            </path>
                        </svg>
                        <span class="is-drawer-close:hidden">Homepage</span>
                    </a>
                </li>

                <!-- List item -->
                @can('view_users')
                    <li>
                        <a href="/users"
                            class="is-drawer-close:tooltip is-drawer-close:tooltip-right {{ request()->is('users*') ? 'menu-active' : '' }}"
                            data-tip="Users">
                            <x-lucide-users class="size-4" /> <span class="is-drawer-close:hidden">Users</span>
                        </a>
                    </li>
                @endcan
                @can('view_roles')
                    <li>
                        <a href="/roles"
                            class="is-drawer-close:tooltip is-drawer-close:tooltip-right {{ request()->is('roles*') ? 'menu-active' : '' }}"
                            data-tip="Roles">
                            <x-lucide-lock-keyhole class="size-4" /> <span class="is-drawer-close:hidden">Roles</span>
                        </a>
                    </li>
                @endcan

                @can('view_permissions')
                    <li>
                        <a href="/permissions"
                            class="is-drawer-close:tooltip is-drawer-close:tooltip-right {{ request()->is('permissions*') ? 'menu-active' : '' }}"
                            data-tip="Permissions">
                            <x-heroicon-o-key class="size-4" /> <span class="is-drawer-close:hidden">Permissions</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
