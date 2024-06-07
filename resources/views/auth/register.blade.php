<x-guest-layout>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('user') }}/img/banner-6-removebg.png" alt="" srcset="">
                </div>
                <div class="col-md-6">
                    <div class="col-md-10">
                        <h1 class="mb-2">{{ Lang::get('login.page.registertext') }}</h1>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <div>
                                    <x-input-label class="col-form-label" for="fullname" value="Nom comple" />
                                </div>
                                <div class="">
                                    <x-text-input id="fullname" placeholder="Nom comple" class="form-control" type="text" name="fullname" :value="old('fullname')" required />
                                </div>
                            </div>

                            @error('fullname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <div>
                                    <x-input-label id="username" class="col-form-label" for="username" value="nom d'utilisateur" />
                                </div>
                                <div>
                                    <x-text-input id="username" class="form-control" placeholder="nom d'utilisateur" type="text" name="username" :value="old('username')" required />
                                </div>
                            </div>

                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <div>
                                    <x-input-label class="col-form-label" for="email" value="{{ Lang::get('register.page.email.text') }}" />
                                </div>
                                <div class="">
                                    <x-text-input id="email" class="form-control" placeholder="{{ Lang::get('register.page.email.placeholder.text') }}" type="email" name="email" :value="old('email')" required />
                                </div>
                            </div>

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <x-input-label for="password" class="col-form-label" value="{{ Lang::get('register.page.password.text') }}" />

                                <div class="">
                                    <x-text-input id="password" class="form-control" type="password" placeholder="{{ Lang::get('register.page.password.placeholder.text') }}" name="password" />
                                </div>
                            </div>

                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <x-input-label for="password_confirmation" class="col-form-label" value="{{ Lang::get('register.page.confirm.password.text') }}" />
            
                                <div class="">
                                    <x-text-input id="password_confirmation" class="form-control" type="password" placeholder="{{ Lang::get('register.page.confirm.password.placeholder.text') }}"  name="password_confirmation" required/>
                                </div>
                            </div>

                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <x-input-label for="country" class="col-form-label" value="{{ Lang::get('register.page.country.text') }}" />
                
                                    <div class="">
                                        <x-text-input id="country" class="form-control" type="text" :value="old('country')" placeholder="{{ Lang::get('register.page.country.text') }}"  name="country" required/>
                                    </div>
                                </div>

                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="col-md-6">
                                    <x-input-label for="city" class="col-form-label" value="{{ Lang::get('register.page.city.text') }}" />
                
                                    <div class="">
                                        <x-text-input id="city" class="form-control" :value="old('city')" type="text" placeholder="{{ Lang::get('register.page.city.text') }}"  name="city" required/>
                                    </div>
                                </div>

                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            

                            <div class="mb-3 row">
                                <x-input-label class="col-form-label" for="photo" :value="__('Photo')" />
            
                                <div class="">
                                    <input type="file" class="dropify" data-height="145" name="photo" />
                                </div>
                            </div>

                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <div class="d-flex align-items-center justify-content-between">
                                    <input class="w-100 btn btn-success" type="submit" value="Créer un compte">
                                </div>
                            </div>
                        </form>

                        <div class="social-login">
                            <a href="{{ url('/login/google') }}" class="d-flex social-pd">
                                <span class="w-25"><i class="fa-brands fa-google"></i></span>
                                <span class="w-75">{{ Lang::get('login.page.continuewithgoogletext') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
</x-guest-layout>
