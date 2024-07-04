<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="img-fluid" src="{{ asset('user') }}/img/logo.png" alt="">
             </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">{{
                            Lang::get('homepage.nav.home') }}</a>
                    </li>
                        @php
                          $user = auth()->user();
                         @endphp

                        @if (!empty($user->user_type))
                                @if ($user->user_type == "Travailleurs")
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('find.job') }}">
                                    {{ Lang::get('homepage.nav.findJob') }}
                                </a>
                            </li>
                        @else
                             <li class="nav-item">
                                <a class="nav-link active" aria-current="page"  href="{{ route('all.candidates') }}">
                                   Candidats
                                </a>
                            </li>
                         @endif
                        @endif

                          <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('message') }}">
                            Messages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('user.dashboard') }}">
                           Mes boulots
                        </a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('complete.jobs') }}">
                            Travaux terminés
                        </a>
                    </li>
                    @endauth
                </ul>
                <div class="login_nav_pic">

                    @guest
                    <button type="button" class="sign_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-regular fa-user"></i>
                        <span>Se connecter</span>
                    </button>
                    @endguest

                    @auth

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img height="50" width="50" class=""
                                src="{{ auth()->user()->photo? asset(auth()->user()->photo): auth()->user()->photo }}"
                                alt="">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item  text-center" href="{{ route('candidate.detail') }}">Votre
                                    profil</a>
                            </li>
                            <li class="dropdown-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                                                                                                    this.closest('form').submit();">
                                        {{ Lang::get('logout.text') }}
                                    </x-dropdown-link>
                                </form>

                            </li>

                        </ul>
                    </li>
                    @endauth


                </div>
                @auth
                 <div class="m-1">
                                    <a href="{{ route('user.withdraw') }}" class="btn btn-success text-white">
                                        {{-- <i class="fa-solid fa-plus"></i> --}}
                                        <span>Portefeuille: {{ Auth::user()->wallet }}</span>
                                    </a>
                                </div>
                  @endauth

                <div class=" m-1">
                    <a href="{{ route('user.job.post') }}" class="btn text-white post_btn">
                        <i class="fa-solid fa-plus"></i>
                        <span>{{ Lang::get('post.a.job.text') }}</span>
                    </a>
                </div>

            </div>
        </div>
    </nav>
</div>
