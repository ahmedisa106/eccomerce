<style>


</style>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item"><a href="{{aurl('')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.home')</span></a>

            </li>

            <li class="nav-item" style="{{active_menu('admins')[1]}}"><a href="{{aurl('admins')}}"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.admins')</span></a>


            </li>

            <li class="nav-item" style="{{active_menu('users')[0]}}"><a><i class="la la-user-secret"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.users')</span></a>
                <ul class="menu-content " style="{{active_menu('users')[1]}}">
                    <li class=" nav-item"><a href="{{aurl('users')}}"><i class="la la-user-secret"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.users_all')</span></a>
                    </li>
                    <li class=" nav-item"><a href="{{aurl('users')}}?level=user"><i class="la la-user-secret"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.user')</span></a>
                    </li>
                    <li class=" nav-item"><a href="{{aurl('users')}}?level=vendor"><i class="la la-user-secret"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.vendor')</span></a>
                    </li>
                    <li class=" nav-item"><a href="{{aurl('users')}}?level=company"><i class="la la-user-secret"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('admin.company')</span></a>
                    </li>


                </ul>

            </li>


        </ul>

    </div>
</div>
