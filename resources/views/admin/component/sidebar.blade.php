 <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion shadow-lg" id="sidenavAccordion">
        <div class="sb-sidenav-menu shadow mt-4">
            <div class="nav">
               <a class="nav-link" href="{{ route('admin.payment.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Payment Request
                </a>
                <a class="nav-link" href="{{ route('admin.withdraw.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Withdraw Request
                </a>

                <a class="nav-link" href="{{ route('admin.website.social.links') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Website Social Links
                </a>

                <a class="nav-link" href="{{ route('admin.user.management') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    User Management
                </a>
                
            </div>
        </div>
    </nav>
</div>
