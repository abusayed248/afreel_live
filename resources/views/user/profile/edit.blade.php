<x-app-layout>


    <section>
        <div class="container mb-3">
            <div class="row">

                @include('user.component.sidebar')

                <div class="col-md-8">
                    <div>
                        <div class="accoun_sec">
                            <div>
                                <h5 class="d-flex justify-content-start align-items-center mb-3"><i
                                        class="fa-regular fa-user bc account_icon"></i>Mon compte
                                </h5>
                            </div>
                            <form method="post" action="{{ route('user.update.info') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 row">

                                    <div class="col-md-6">
                                        <label class="col-form-label">Nom et prénom</label>
                                        <div>
                                            <input type="text" class="form-control" name="fullname"
                                                value="{{ $user->fullname }}" placeholder="Ton nom complet">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Titre d'emploi</label>
                                        <div>
                                            <input type="text" class="form-control" name="job_title"
                                                value="{{ $user->job_title }}" placeholder="Nom du travail">
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Téléphone</label>
                                        <div class="">
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $user->phone }}" placeholder="Votre numéro de téléphone">
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">E-mail</label>
                                        <div class="">
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $user->email }}" placeholder="Votre e-mail">
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <div>
                                            <label class="col-form-label">Type d'emploi</label>
                                        </div>
                                        <select class="form-select w-100" name="job_type">
                                            <option selected disabled selected>Sélectionnez-en un</option>
                                            <option {{ $user->job_type == 'À temps plein'?'selected':'' }}
                                                value="À temps plein">À temps plein</option>
                                            <option {{ $user->job_type == 'À temps partiel'?'selected':'' }}
                                                value="À temps partiel">À temps partiel</option>
                                            <option {{ $user->job_type == 'Free-lance'?'selected':'' }}
                                                value="Free-lance">Free-lance</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <label class="col-form-label">catégorie d'emploi</label>
                                        </div>
                                        <select class="form-select w-100" name="job_category">
                                            <option selected disabled selected>Sélectionnez-en un</option>
                                             <option {{ $user->job_category == 'itprograming'?'selected':'' }}
                                                value="itprograming">IT & Programming</option>
                                            <option {{ $user->job_category == 'graphicdesign'?'selected':'' }}
                                                value="graphicdesign">Graphic Design & Multimedia</option>
                                            <option {{ $user->job_category == 'writing'?'selected':'' }}
                                                value="writing">Writing, Content</option>
                                            <option {{ $user->job_category == 'dataentry'?'selected':'' }}
                                                value="dataentry">Data Entry & Admin</option>
                                            <option {{ $user->job_category == 'finance'?'selected':'' }}
                                                value="finance">Finance & Accounting</option>
                                            <option {{ $user->job_category == 'salesmarketing'?'selected':'' }}
                                                value="salesmarketing">Sales & Marketing</option>
                                            <option {{ $user->job_category == 'customersupport'?'selected':'' }}
                                                value="customersupport">Customer Support & Service</option>
                                            <option {{ $user->job_category == 'socialmediaseo'?'selected':'' }}
                                                value="socialmediaseo">Social Media, SEO & SEM</option>
                                            <option {{ $user->job_category == 'mobileapplication'?'selected':'' }}
                                                value="mobileapplication">Mobile Application</option>
                                            <option {{ $user->job_category == 'music'?'selected':'' }}
                                                value="music">Music & Audio</option>
                                            <option {{ $user->job_category == 'others'?'selected':'' }}
                                                value="others">Others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <div>
                                            <label class="col-form-label">High School</label>
                                        </div>
                                        <input type="text" name="school" value="{{ $user->school }}"
                                            class="form-control" placeholder="High School Name">
                                    </div>

                                    <div class="col-md-6">
                                        <div>
                                            <label class="col-form-label">High School Passing Year</label>
                                        </div>
                                        <input type="text" name="school_passing_year" value="{{ $user->school_passing_year }}"
                                            class="form-control" placeholder="High School Passing Year">

                                        @error('school_passing_year')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <div>
                                            <label class="col-form-label">Inter Medium</label>
                                        </div>
                                        <input type="text" name="inter" value="{{ $user->inter }}"
                                            class="form-control" placeholder="Inter Medium Name">
                                    </div>

                                    <div class="col-md-6">
                                        <div>
                                            <label class="col-form-label">Inter Medium Passing Year</label>
                                        </div>
                                        <input type="text" name="inter_passing_year" value="{{ $user->inter_passing_year }}"
                                            class="form-control" placeholder="High School Passing Year">

                                        @error('inter_passing_year')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <div>
                                            <label class="col-form-label">Graduation</label>
                                        </div>
                                        <input type="text" name="graduation" value="{{ $user->graduation }}"
                                            class="form-control" placeholder="Graduation">
                                    </div>

                                    <div class="col-md-6">
                                        <div>
                                            <label class="col-form-label">Graduation Passing Year</label>
                                        </div>
                                        <input type="text" name="graduation_passing_year" value="{{ $user->graduation_passing_year }}"
                                            class="form-control" placeholder="Graduation Passing Year">
                                            
                                        @error('graduation_passing_year')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <div>
                                            <label class="col-form-label">Certification</label>
                                        </div>
                                        <input type="text" name="certified" value="{{ $user->certified }}"
                                            class="form-control" placeholder="Your Certification">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-form-label">Tag</label>
                                        {{-- {{ dd($user->tag) }} --}}

                                        <input type="text" id="tag" value="@isset($user->tag) @foreach($user->tag as $key => $tag) {{ $tag }} @endforeach @endisset" name="tag" class="form-control"
                                            data-role="tagsinput">
                                    </div>
                                </div>

                                <div class="mb-3 row">

                                    <div class="col-md-6">
                                        <label class="col-form-label">Country</label>
                                        <div>
                                            <input type="text" name="country" class="form-control"
                                                value="{{ $user->country }}" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">City</label>
                                        <div>
                                            <input type="text" name="city" class="form-control"
                                                value="{{ $user->city }}" placeholder="City">
                                        </div>
                                    </div>

                                </div>

                                

                                <div class="row mt-3">
                                    <div class="col-md-6 ">
                                        <img class="old_pic" src="{{asset(Auth::user()->photo)}}" alt="">
                                        <input type="hidden" name="old_photo" value="{{ Auth::user()->photo }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="photo" type="file" class="dropify" data-height="145" />
                                    </div>
                                    @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class=" mt-3">
                                    <div class="accoun_btn_div">
                                         <label class="col-form-label" form="bio">Bio</label>
                                         <textarea class="col-form-label w-100 p-3" name="bio" placeholder="Job Description">{{ $user->about_info }}</textarea>
                                    </div>
                                </div>

                                <div class=" mt-3">
                                    <div class="accoun_btn_div">
                                        <input class="w-100 btn btn-success" type="submit" value="Add Account Info">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div>
                        <div class="accoun_sec">
                            <div>
                                <h5 class="d-flex justify-content-start align-items-center mb-3"><i
                                        class="fa-regular fa-share-from-square bc account_icon"></i>Social Accounts

                                </h5>
                            </div>
                            <form method="post" action="{{ route('social.account.update') }}">
                                @csrf

                                @php
                                $social_media_link = \App\Models\SocialMedia::first();
                                @endphp

                                <div class="mb-3 row">

                                    <div class="col-md-6">
                                        <label class="col-form-label">Facebook</label>
                                        <div>
                                            <input type="text" name="fb" class="form-control"
                                                value="{{ $social_media_link->fb }}"
                                                placeholder="https://www.facebook.com/">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Twitter</label>
                                        <div>
                                            <input type="text" name="twitter" class="form-control"
                                                value="{{ $social_media_link->twitter }}"
                                                placeholder="https://www.twitter.com/">
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">LinkedIn</label>
                                        <div class="">
                                            <input type="text" name="linkedin" class="form-control"
                                                value="{{ $social_media_link->linkedin }}"
                                                placeholder="https://www.linkedin.com/">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Instagram</label>
                                        <div class="">
                                            <input type="text" name="instagram" class="form-control"
                                                value="{{ $social_media_link->instagram }}"
                                                placeholder="https://www.instagram.com/">
                                        </div>
                                    </div>

                                </div>
                                <div class=" mt-3">
                                    <div class="accoun_btn_div">
                                        <input class="w-100 btn btn-success" type="submit" value="Add Social Account">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @push('script')
    <link rel="stylesheet" href="{{ asset('user') }}/css/bootstrap-tagsinput.css">
    <script src="{{ asset('user') }}/js/bootstrap-tagsinput.js"></script>
    
    <script>
        $("#tag").tagsinput()
    </script>
    @endpush

</x-app-layout>