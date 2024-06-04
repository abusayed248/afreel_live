<x-guest-layout>

     <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
   
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6 recent_activities p-3 m-5">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf  

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">              

                    <div class="mb-3 row">
                        <div>
                            <x-input-label class="col-form-label" for="email" value="E-mail" />
                        </div>
                        <div class="">
                             <x-text-input id="email" class="form-control" placeholder="Entrer votre Email..." type="email" name="email" :value="old('email', $request->email)" required />
                             <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label class="col-form-label" for="password" value="Mot de passe" />
                            <x-text-input id="password" class="form-control" type="password" name="password" placeholder="Mot de passe" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label class="col-form-label" for="password_confirmation" value="Confirmez le mot de passe" />

                            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmez le mot de passe" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-3 align-items-center">
                        <input class="form-control btn btn-success" type="submit" value="réinitialiser le mot de passe">
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</x-guest-layout>
