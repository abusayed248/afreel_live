<x-admin-app-layout>

    <div id="layoutSidenav">
       @include('admin.component.sidebar')
        <div id="layoutSidenav_content">
            <main class="mt-3">
                <div class="container mb-3">
                    <div class="row mt-5 justify-content-center">
                        <div class="col-md-6">
                            <div class="recent_activities card p-3">

                                <h3 class="d-flex align-content-center "><i class="fa-regular fa-file bc mx-2"></i>Create Admin</h3>

                                <form action="{{ route('admin.store') }}" method="post">
                                    @csrf

                                    <div class="m-3 row">
                                        <div class="col-md-6">
                                            <div>
                                                <label class="col-form-label">Email</label>
                                            </div>
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email..">

                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div>
                                                <label class="col-form-label">Password</label>
                                            </div>
                                            <input type="text" name="password" value="{{ old('paassword') }}" class="form-control" placeholder="Enter password..">

                                            @error('password')
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
