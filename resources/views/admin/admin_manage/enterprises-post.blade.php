<x-admin-app-layout>
 <div id="layoutSidenav">
    @include('admin.component.sidebar')
      <div id="layoutSidenav_content">
            <main class="mt-3">
                <div class="container mb-3">
                    <div class="row mt-5 justify-content-center">
                        <div class="col-md-6">
                            <div class="recent_activities card p-3">

                                <h3 class="d-flex align-content-center "><i class="fa-regular fa-file bc mx-2"></i>Post</h3>

                                <form action="{{ route('admin.enterprises.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="m-3 row">
                                        <div class="col-md-12">
                                            <div>
                                                <label class="col-form-label">Post Title<span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title..">

                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div>
                                                <label class="col-form-label">Details<span class="text-danger">*</span></label>
                                            </div>
                                            <textarea type="text" name="details" class="form-control" placeholder="Details..">{{ old('title') }}</textarea>

                                            @error('details')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div>
                                                <label class="col-form-label">Email<span class="text-danger">*</span></label>
                                            </div>
                                            <input type="email" name="email" class="form-control" value="{{ old('title') }}" placeholder="Your Email">

                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <div>
                                                <label class="col-form-label">Photo</label>
                                            </div>
                                            <input type="file" name="photo" class="form-control " >
                                             @error('photo')
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
