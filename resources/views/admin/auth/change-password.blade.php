<x-admin-app-layout>

    <div id="layoutSidenav">
       @include('admin.component.sidebar')
        <div id="layoutSidenav_content">
            <main class="mt-3">
                <div class="container mb-3">
                    <div class="row mt-5 justify-content-center">
                        <div class="col-md-6">
                            <div class="recent_activities card p-3">

                                <h3 class="d-flex align-content-center "><i class="fa-regular fa-file bc mx-2"></i>Change Password</h3>

                                <form action="{{ route('admin.password.change') }}" method="post">
                                    @csrf

                                    <div class="m-3 row">
                                        <div class="col-md-6">
                                            <div>
                                                <label class="col-form-label">Your Old Password <span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" name="old_password" value="{{ old('old_password') }}" class="form-control" placeholder="Old password..">

                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div>
                                                <label class="col-form-label">Password</label>
                                            </div>
                                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Type new password..">

                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 

                                        <div class="col-md-6">
                                            <div>
                                                <label class="col-form-label">New Password</label>
                                            </div>
                                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="Type confirm password..">

                                            @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                    </div>


                                    <div class="m-3 row">
                                        <div class=" mt-3">
                                            <input class="w-100 btn btn-success" type="submit" value="Submit">
                                        </div>
                                    </div>
                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
</x-admin-app-layout>
