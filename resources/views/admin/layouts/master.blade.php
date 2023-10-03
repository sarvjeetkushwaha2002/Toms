<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="horizontal-menu-template">

<head>
    @include('admin.layouts.head')
    <style>
        #template-customizer .template-customizer-open-btn {
            background: #f8f7fa;
            display: none !important;
        }

        #template-customizer .template-customizer-open-btn::before {
            background-image: url('assets/img/icons/brands/onmedium_temp.png');
        }
    </style>
    @stack('style')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <!-- Navbar -->
            <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                @include('admin.layouts.header')
            </nav>

            <!-- / Navbar -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
                    <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
                        @include('admin.layouts.menu')
                    </aside>
                    <!-- / Menu -->

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content-main')
                        <div class="col-12 mb-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    <div class="card-title mb-0 text-center">
                                        <h5 class="mb-0">Use For Tools By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1" role="tablist">
                                        <li class="nav-item bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textConvertortools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Convert Case
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textSmalltools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Small text Tool
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textWidetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Wide text Tool
                                            </a>
                                        </li>
                                        <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textReversetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Reverse Text Tool
                                            </a>
                                        </li>
                                        <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textStrikethroughtools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Strikethrough Text Tool
                                            </a>
                                        </li>
                                        <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textTitleCasetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Title Case Text Tool
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('plantextConvertortools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Plan Text Convert Tool
                                            </a>
                                        </li>
                                        <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textItalictools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Italic Text Tool
                                            </a>
                                        </li>
                                        <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textBoldtools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Blod Text Tool
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2" role="presentation">
                                            <a href="{{route('textSocialtools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Social Media Text Tool
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2" role="presentation">
                                            <a href="{{route('textBubbletools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Bubble Text Tool
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textFindreplacetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Find And Replace Text Tool
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textduplicateLinetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Duplicate Line Remover Tool
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textBycripttools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Bycript Hash Generator
                                            </a>
                                        </li>
                                        <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textBinarycodetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Binary Code Translator
                                            </a>
                                        </li>
                                        <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textHexcodetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Hex Code Translator
                                            </a>
                                        </li>
                                        <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                                            <a href="{{route('textMorsecodetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Morse Code Translator
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2" role="presentation">
                                            <a href="{{route('termConditionPage')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Terms & Conditions Text Generator
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2" role="presentation">
                                            <a href="{{route('privacyPolicyPage')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Privacy Policy Text Generator
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2" role="presentation">
                                            <a href="{{route('contactUsPage')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                Contact Us Text Generator
                                            </a>
                                        </li>
                                        <li class="nav-item bg-label-secondary rounded p-2" role="presentation">
                                            <a href="{{route('aboutUsPage')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                                                About Us Text Generator
                                            </a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a href="javascript:void(0);" class="nav-link btn d-flex align-items-center justify-content-center disabled" role="tab" data-bs-toggle="tab" aria-selected="false" tabindex="-1">
                                                <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-plus ti-sm"></i></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        @include('admin.layouts.footer')
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>

            <!--/ Layout container -->
        </div>
    </div>

    <!-- Overlay -->
    <!-- <div class="layout-overlay layout-menu-toggle"></div> -->

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!--/ Layout wrapper -->
    @include('admin.layouts.foot')
    @stack('scripts')
</body>

</html>