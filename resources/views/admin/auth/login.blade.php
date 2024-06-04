<x-admin-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div>
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h2 class="modal-title">{{ Lang::get('admin.login.text') }}</h2>
                </div>
                <div class="modal-body ">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf                

                        <div class="mb-3 row">
                            <div>
                                <x-input-label class="col-form-label" for="email" :value="__('Email')" />
                            </div>
                            <div class="">
                                <x-text-input id="email" class="form-control" placeholder="Your Email" type="email" name="email" :value="old('email')" required />
                            </div>
                        </div>
                        <x-input-error class="text-danger" :messages="$errors->get('email')" class="mt-2" />

                        <div class="mb-3">
                            <div>
                                <x-input-label class="col-form-label" for="password" value="{{ Lang::get('login.page.password') }}" />
                            </div>

                            <div>
                                <x-text-input class="form-control" placeholder="Password" id="password" type="password" name="password" />
                            </div>
                        </div>
                        <x-input-error class="text-danger" :messages="$errors->get('password')" class="mt-2" />

                        <div class="mb-3 row">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="flex-1">
                                    <input id="remember_me" type="checkbox"  class="checkbox-custom" name="remember">
                                    <label for="remember_me" class="checkbox-custom-label">{{ Lang::get('login.page.rememberme') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 align-items-center row">
                            <input class="w-100 btn btn-success w-100" type="submit" value="{{ Lang::get('login.modal') }}">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


</x-admin-guest-layout>
