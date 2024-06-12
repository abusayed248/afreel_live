<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion shadow-lg" id="sidenavAccordion">
        <div class="sb-sidenav-menu shadow mt-4">
            <div class="nav">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Afreel User
                </a>
                <a class="nav-link" href="{{ route('admin.withdraw.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Withdraw Request
                </a>

                <a class="nav-link" href="{{ route('admin.refund.request') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Refund Request
                </a>

                <a class="nav-link" href="{{ route('admin.website.social.links') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Company contact
                </a>

                @if(Auth::guard('admin')->user()->type == 1)

                <a class="nav-link" href="{{ route('admin.manages') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Admin Manages
                </a>
                @endif

                <a class="nav-link" href="{{ route('admin.change.password.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Change Password
                </a>

            </div>
        </div>
    </nav>
</div>