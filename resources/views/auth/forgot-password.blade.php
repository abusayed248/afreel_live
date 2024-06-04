<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

   
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6 recent_activities p-3 m-5">
                <div class="mb-2">
                    Mot de passe oublié? Aucun problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d'en choisir un nouveau.
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf                

                    <div class="mb-3 row">
                        <div>
                            <x-input-label class="col-form-label" for="email" value="E-mail" />
                        </div>
                        <div class="">
                             <x-text-input id="email" class="form-control" placeholder="Entrer votre Email..." type="email" name="email" :value="old('email')" required />
                             <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-3 align-items-center">
                        <input class="form-control btn btn-success" type="submit" value="Lien de réinitialisation du mot de passe par e-mail">
                    </div>
                </form>
                
            </div>
        </div>
    </div>

</x-guest-layout>
