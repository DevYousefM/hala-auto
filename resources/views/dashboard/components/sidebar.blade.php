<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="">
                    <a href="{{ route('dashboard.index') }}">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text"> {{ trans('site.dashboard') }} </span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dashboard.products.index') }}">
                        <span class="nav-icon uil uil-gift"></span>
                        <span class="menu-text"> Offers </span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dashboard.sliders.index') }}">
                        <span class="nav-icon uil uil-arrows-h-alt"></span>
                        <span class="menu-text"> Sliders </span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dashboard.branches.index') }}">
                        <span class="nav-icon uil uil-code-branch"></span>
                        <span class="menu-text"> Branches </span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dashboard.terms.index') }}">
                        <span class="nav-icon uil uil-notes"></span>
                        <span class="menu-text">Terms And Conditions</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
