<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>Toggle
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>



            <!-- Divider -->
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{ route("admin.register.today") }}" class="{{ request()->is("admin/registers/today") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-book"></i>
                        {{ __('Today\'s Register') }}
                    </a>
                </li>
                {{-- Nursery Menu --}}
                @can('nursery_register_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/sessions*")||request()->is("admin/registers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">
                            </i>
                            {{ trans('cruds.nurseryRegister.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('session_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/sessions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.sessions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-calendar-alt">
                                        </i>
                                        {{ trans('cruds.session.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('register_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/registers/index") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.registers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fab fa-readme">
                                        </i>
                                        {{ __('Registers') }}
                                    </a>
                                </li>
                            @endcan
                            @can('register_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/registers/create") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.registers.create") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fab fa-readme">
                                        </i>
                                        {{ trans('global.create') }} {{ __('Register') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                {{-- Family Menu --}}
                @can('family_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/children*")||request()->is("admin/carers*")||request()->is("admin/bookings*")||request()->is("admin/families*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">
                            </i>
                            {{ trans('cruds.familyManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('family_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/families*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.families.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-users">
                                        </i>
                                        {{ trans('cruds.family.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('child_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/children*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.children.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-child">
                                        </i>
                                        {{ __('children') }}
                                    </a>
                                </li>
                            @endcan
                            @can('carer_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/carers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.carers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-friends">
                                        </i>
                                        {{ __('Parents') }}
                                    </a>
                                </li>
                            @endcan
                            @can('booking_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/bookings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.bookings.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-book">
                                        </i>
                                        {{ trans('cruds.child.title') }}-{{ trans('cruds.booking.title') }}
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan

                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    <hr class="mb-6 md:min-w-full" />
                    <li class="items-center">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0">
                            {{ __('User Panel') }}
                        </a>
                    </li>
                    @can('profile_password_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.password.edit") }}" class="{{ request()->is("profile/password") || request()->is("profile/password/*") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fas fa-cogs"></i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <!-- Divider -->
                <hr class="mb-6 md:min-w-full" />

                @can('user_management_access')
                    <li class="items-center">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0">
                            {{ __('Admin Panel') }}
                        </a>
                    </li>

                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*")||request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan

                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan

                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan

                            @can('audit_log_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.audit-logs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file-alt">
                                        </i>
                                        {{ trans('cruds.auditLog.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan


                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
