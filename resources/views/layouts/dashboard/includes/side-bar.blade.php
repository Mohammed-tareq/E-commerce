<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title"
                                                                                    data-i18n="nav.templates.main">Templates</span></a>
                <ul class="menu-content">

                    <li><a class="menu-item" href="#" data-i18n="nav.templates.horz.main">Horizontal</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="../horizontal-menu-template"
                                   data-i18n="nav.templates.horz.classic">Classic</a>
                            </li>
                            <li><a class="menu-item" href="../horizontal-menu-template-nav"
                                   data-i18n="nav.templates.horz.top_icon">Full Width</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            @can('roles')
                <li><a class="menu-item" href="#" data-i18n="nav.templates.horz.main"><i
                                class="la la-shield"></i>{{ __('dashboard.roles') }}</a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.roles.index') }}"
                               data-i18n="nav.templates.horz.classic">{{ __('dashboard.roles') }}</a>
                        </li>
                        <li><a class="menu-item" href="{{ route('dashboard.roles.create') }}"
                               data-i18n="nav.templates.horz.top_icon">{{ __('dashboard.create.role') }}</a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('admins')
                <li><a class="menu-item" href="#" data-i18n="nav.templates.horz.main"><i
                                class="la la-user-secret"></i>{{ __('dashboard.admins') }}</a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.admins.index') }}"
                               data-i18n="nav.templates.horz.classic">{{ __('dashboard.admins') }}</a>
                        </li>
                        <li><a class="menu-item" href="{{ route('dashboard.admins.create') }}"
                               data-i18n="nav.templates.horz.top_icon">{{ __('dashboard.create_admin') }}</a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>