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
                                class="la la-user-secret"></i>{{ __('dashboard.admins') }}<span
                                class="badge badge badge-success float-right mr-2">{{ $admins_count }}</span></a>
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

            @can('shipping')
                <li><a class="menu-item" href="#" data-i18n="nav.templates.horz.main"><i
                                class="la la-map"></i>{{ __('dashboard.countries') }}</a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.countries.index') }}"
                               data-i18n="nav.templates.horz.classic">{{ __('dashboard.countries') }}</a>
                        </li>
                    </ul>
                </li>
            @endcan


            @can('categories')
                <li><a class="menu-item" href="#" data-i18n="nav.templates.horz.main"><i
                                class="la la-user-secret"></i>{{ __('dashboard.categories') }}<span
                                class="badge badge badge-success float-right mr-2">{{ $categories_count }}</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.categories.index') }}"
                               data-i18n="nav.templates.horz.classic">{{ __('dashboard.categories') }}</a>
                        </li>
                        <li><a class="menu-item" href="{{ route('dashboard.categories.create') }}"
                               data-i18n="nav.templates.horz.top_icon">{{ __('dashboard.create_category') }}</a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('brands')
                <li><a class="menu-item" href="#" data-i18n="nav.templates.horz.main"><i
                                class="la la-user-secret"></i>{{ __('dashboard.brands') }}<span
                                class="badge badge badge-success float-right mr-2">{{ $brands_count }}</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.brands.index') }}"
                               data-i18n="nav.templates.horz.classic">{{ __('dashboard.brands') }}</a>
                        </li>
                        <li><a class="menu-item" href="{{ route('dashboard.brands.create') }}"
                               data-i18n="nav.templates.horz.top_icon">{{ __('dashboard.create_brand') }}</a>
                        </li>
                    </ul>
                </li>
            @endcan
            <li><a class="menu-item" href="#" data-i18n="nav.templates.horz.main"><i
                            class="la la-user-secret"></i>products<span
                            class="badge badge badge-success float-right mr-2">10</span></a>
                @can('attributes')
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.attributes.index') }}"
                               data-i18n="nav.templates.horz.classic">{{ __('dashboard.attributes') }}</a>
                        </li>
                    </ul>
                @endcan
            </li>
            @can('coupons')
                <li><a class="menu-item" href="{{ route('dashboard.coupons.index') }}"
                       data-i18n="nav.templates.horz.main"><i
                                class="la la-user-secret"></i>{{ __('dashboard.coupons') }}<span
                                class="badge badge badge-success float-right mr-2">{{ $coupons_count }}</span></a>
                </li>
            @endcan
            @can('faqs')
                <li><a class="menu-item" href="{{ route('dashboard.faqs.index') }}" data-i18n="nav.templates.horz.main"><i
                                class="la la-user-secret"></i>{{ __('dashboard.faq') }}<span
                                class="badge badge badge-success float-right mr-2">{{ $faqs_count }}</span></a>
                </li>
            @endcan
            @can('settings')
                <li><a class="menu-item" href="{{ route('dashboard.settings.index') }}"
                       data-i18n="nav.templates.horz.main"><i
                                class="la la-user-secret"></i>{{ __('dashboard.settings') }}</a>
                </li>
            @endcan
        </ul>
    </div>
</div>