<div class="container-xxl d-flex h-100">
    <ul class="menu-inner">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{route('indexDashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Home">Home</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('blogFrontend')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Blog">Blog</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('textToSpeechtools')}}" class="menu-link">
                <div data-i18n="Text To Speech Generator">Text To Speech Generator</div>
            </a>
        </li>


        <!-- Sub Tools -->
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Text Modification Formatting Tools">Text Modification Formatting Tools</div>
                <!-- Text Editor Tool -->
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('textConvertortools')}}" class="menu-link">
                        <div data-i18n="Convert Case">Convert Case</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('plantextConvertortools')}}" class="menu-link">
                        <div data-i18n="Plan Text Convert">Plan Text Convert</div>
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
                <li class="menu-item">
                    <a href="{{route('textItalictools')}}" class="menu-link">
                        <div data-i18n="Italic Text Generator">Italic Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('textBoldtools')}}" class="menu-link">
                        <div data-i18n="Bold Text Generator">Bold Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('textFindreplacetools')}}" class="menu-link">
                        <div data-i18n="Find Replace Text Generator">Find Replace Text Generator</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Social Media Text">Social Media Text</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('textSocialtools')}}" class="menu-link">
                        <div data-i18n="Social Media Text Generator">Social Media Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('textBubbletools')}}" class="menu-link">
                        <div data-i18n="Bubble Text Generator">Bubble Text Generator</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Coding & Data Translation Tools">Coding & Data Translation Tools</div>
                <!-- Text Editor Tool -->
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('textBycripttools')}}" class="menu-link">
                        <div data-i18n="Bycript Text Generator">Bycript Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('textBinarycodetools')}}" class="menu-link">
                        <div data-i18n="Binary Code Translator">Binary Code Translator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('textHexcodetools')}}" class="menu-link">
                        <div data-i18n="Hex Code Translator">Hex Code Translator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('textMorsecodetools')}}" class="menu-link">
                        <div data-i18n="Morse Code Translator">Morse Code Translator</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Website Page Condition Generator">Website Page Condition Generator</div>
                <!-- Text Editor Tool -->
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('contactUsPage')}}" class="menu-link">
                        <div data-i18n="Contact Us Text Generator"> Contact Us Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('aboutUsPage')}}" class="menu-link">
                        <div data-i18n="About Us Text Generator">About Us Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('privacyPolicyPage')}}" class="menu-link">
                        <div data-i18n="Privacy Policy Text Generator">Privacy Policy Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('termConditionPage')}}" class="menu-link">
                        <div data-i18n="Terms & Conditions Text Generator">Terms & Conditions Text Generator</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="More">More</div>
                <!-- Text Editor Tool -->
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('textduplicateLinetools')}}" class="menu-link">
                        <div data-i18n="Duplicate Line Remover Generator">Duplicate Line Remover Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('colorCodePicktools')}}" class="menu-link">
                        <div data-i18n="Gradient Color Picker && Code">Gradient Color Picker && Code</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('imageResizetools')}}" class="menu-link">
                        <div data-i18n="Image Resizer Generator">Image Resizer Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('jsonStringifytools')}}" class="menu-link">
                        <div data-i18n="Json Stringify Text Generator">Json Stringify Text Generator</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('slugifyUrltools')}}" class="menu-link">
                        <div data-i18n="Slug Url Text Generator">Slug Url Text Generator</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>