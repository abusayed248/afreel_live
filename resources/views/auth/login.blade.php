<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div>
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">{{ Lang::get('login.modal') }}</h2>
                </div>
                <div class="modal-body ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf                

                        <div class="mb-3 row">
                            <div>
                                <x-input-label class="col-form-label" for="email" :value="__('Email')" />
                            </div>
                            <div class="">
                                <x-text-input id="email" class="form-control" placeholder="Votre e-mail" type="email" name="email" :value="old('email')" required />
                            </div>
                        </div>
                        <x-input-error class="text-danger" :messages="$errors->get('email')" class="mt-2" />

                        <div class="mb-3">
                            <div>
                                <x-input-label class="col-form-label" for="password" value="{{ Lang::get('login.page.password') }}" />
                            </div>

                            <div>
                                <x-text-input class="form-control" placeholder="Mot de passe" id="password" type="password" name="password" />
                            </div>
                        </div>
                        <x-input-error class="text-danger" :messages="$errors->get('password')" class="mt-2" />

                        <div class="mb-3 row">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="flex-1">
                                    <input id="remember_me" type="checkbox"  class="checkbox-custom" name="remember">
                                    <label for="remember_me" class="checkbox-custom-label">{{ Lang::get('login.page.rememberme') }}</label>
                                </div>
                                <div class="eltio_k2">
                                    <a href="{{ route('password.request') }}" class="theme-cl">{{ Lang::get('login.page.lost.password') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="d-flex align-items-center justify-content-between">
                                <input class="w-100 btn btn-success" type="submit" value="{{ Lang::get('login.modal') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="d-flex align-items-center justify-content-center">
                                <span>{{ Lang::get('login.page.notamembertext') }} <span><a class="fw-bold register_btn" href="{{ route('register') }}">{{ Lang::get('login.page.registertext') }}</a></span></span>
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


</x-guest-layout>
