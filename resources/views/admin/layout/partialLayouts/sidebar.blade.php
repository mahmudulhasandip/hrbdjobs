<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0"
        m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item {{ ($menu_active == 'dashboard') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="/admin/home" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Dashboard
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item {{ ($menu_active == 'industry') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="/admin/industry" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-industry"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Industry
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item {{ ($menu_active == 'industry') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{ route('admin.institute.list') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-institution"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Institute
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item {{ ($menu_active == 'job_designation') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="/admin/job_designation" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-street-view"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Job Designation
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item {{ ($menu_active == 'job_category') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="/admin/job_category" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-dedent"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Job Category
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item {{ ($menu_active == 'job_level') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="/admin/job_level" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-pencil"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Job Level
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item {{ ($menu_active == 'skill') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="/admin/skills" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-mortar-board"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Skills
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item {{ ($menu_active == 'job_experience') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="/admin/job_experience" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-mortar-board"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Job Experience
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item {{ ($menu_active == 'job_package') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="/admin/job_packages" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-cart-plus"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Job Packages
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item {{ ($menu_active == 'featured_packages') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="/admin/featured_packages" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-cart-plus"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Featured Packages
                            </span>
                        </span>
                    </span>
                </a>
            </li>



            <li class="m-menu__item  m-menu__item--submenu {{ ($menu_active == 'employer_list') ? 'm-menu__item--active' : '' }}" aria-haspopup="true"
                m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon la la-users"></i>
                    <span class="m-menu__link-text">
                        Employer
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item {{ ($menu_active == 'employer_list') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="/admin/employer/list" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Employer List
                                </span>
                            </a>
                        </li>

                        <li class="m-menu__item {{ ($menu_active == 'employer_package_list') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="/admin/employer/package/list" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Employer Packages
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item {{ ($menu_active == 'employer_payment_history') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="/admin/employer/payment/history" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Payment History
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="m-menu__item {{ ($menu_active == 'job_post_list') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="/admin/job/post/list" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-newspaper-o"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                All Posted Jobs
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item {{ ($menu_active == 'cvbank') ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{ route('admin.cvbank') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-pencil-square"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                CV Bank
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            {{-- menu headline --}} {{--
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Components
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li> --}} {{-- end menu headline --}}

        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->
