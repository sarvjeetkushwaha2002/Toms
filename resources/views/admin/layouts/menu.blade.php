<div class="container-xxl d-flex h-100">
    <ul class="menu-inner">
        <!-- Dashboards -->
        <li class="menu-item active">
            <a href="{{route('indexDashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Home">Home</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Text Editor Tools">Text Editor Tool</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('textConvertortools')}}" class="menu-link">
                        <div data-i18n="Convert Case">Convert Case</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('textSmalltools')}}" class="menu-link">
                        <div data-i18n="Small Text Generator">Small Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('textWidetools')}}" class="menu-link">
                        <div data-i18n="Wide Text Generator">Wide Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('textStrikethroughtools')}}" class="menu-link">
                        <div data-i18n="Strikethrough Text Generator">Strikethrough Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('textReversetools')}}" class="menu-link">
                        <div data-i18n="Reverse Text Generator">Reverse Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('textTitleCasetools')}}" class="menu-link">
                        <div data-i18n="Title Case Text Generator">Title Case Text Generator</div>
                    </a>
                </li>
                <!-- <li class="menu-item">
                    <a href="{{route('textItalictools')}}" class="menu-link">
                        <div data-i18n="Italic Text Generator">Italic Text Generator</div>
                    </a>
                </li> -->
            </ul>
        </li>
    </ul>
</div>