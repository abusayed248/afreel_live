<div class="col-md-4 col-xs-1">
    <div class="side_nav">
        <nav class="navbar navbar-expand-lg">
            <div class="w-100">
                <button class="navbar-toggler w-100" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <div class="d-flex justify-content-between">
                        <p>Open Profile Manu</p> <i class="fa-solid fa-arrow-down-wide-short"></i>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                    <ul class="side_nav_ul">
                        <li><a href="{{ route('user.dashboard') }}"><span>Dashboard</span></a></li>
                        <li><a href="{{ route('candidate.detail') }}"><span>My Profile</span></a></li>
                        <li><a href="{{ route('message') }}"><span>Massages</span></a></li>
                        <li><a href="{{ route('user.profile.edit') }}"><span>Edit Profile</span></a></li>
                        <li><a href=""><span>Change Password</span></a></li>
                        <li><a href=""><span>Delete Account</span></a></li>
                        <li><a href=""><span>Log Out</span></a></li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
</div>