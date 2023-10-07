<div class="app-brand demo">
    <a href="{{route('admin.adminPannel')}}" class="app-brand-link">
        <span><img src="{{asset('assets\img\icons\brands\onmedium_temp.png')}}" alt="" width="60" height="50" class="rounded-circle"></span>
        <span class="app-brand-text menu-text fw-bold">OnMediums</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>

<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item open">
        <a href="{{route('admin.adminPannel')}}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
    </li>

    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            <div data-i18n="Roles & Permissions">Roles & Permissions</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{route('admin.adminPannel')}}" class="menu-link">
                    <div data-i18n="Roles">Roles</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{route('admin.adminPannel')}}" class="menu-link">
                    <div data-i18n="Permission">Permission</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-lock"></i>
            <div data-i18n="Blog & Category">Blog & Category</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Category">Category</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{route('admin.category')}}" class="menu-link">
                            <div data-i18n="Add Category">Add Category</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Sub Category">Sub Category</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{route('admin.subCategory')}}" class="menu-link">
                            <div data-i18n="Add Sub Category">Add Sub Category</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Blog">Blog</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{route('admin.Blog')}}" class="menu-link">
                            <div data-i18n="Add Blog">Add Blog</div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>