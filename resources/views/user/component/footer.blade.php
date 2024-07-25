<div class="foot_sec pt-5">
    <div class="container pt-5 ">
        <div class="row f_link_div flex-wrap">
            <div class="col-md-4">
                <a class="" href=" ">
                    <img class="foot_logo" src="{{ asset('user') }}/img/logo-light.png" alt="">
                </a>
                <br>
                <address class="mt-3 address">
                    Powered by XCompany Abidjan,</br>
                    Angre 7ème tranche Café de Versailles </br>
                </address>
                    @php
                    $webSocialLinks = \App\Models\WebSocialLink::first();
                    @endphp
                <a class="pt-2 f_e" href="mailto:{{ $webSocialLinks->email }}">{{ $webSocialLinks->email }}</a>.<br>
                <a class="pt-2 f_e" href="tel:{{ $webSocialLinks->phone }}">{{ $webSocialLinks->phone }}</a>.<br>
                <div class=" d-flex mt-3">



                    <div class="media_icon tag_btn d-flex justify-content-center align-items-center">
                        <a href="{{ $webSocialLinks->fb }}">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                    <div class="media_icon tag_btn d-flex justify-content-center align-items-center"><a href="{{ $webSocialLinks->twitter }}">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a></div>
                    <div class="media_icon tag_btn d-flex justify-content-center align-items-center">
                        <a href="https://wa.me/{{ $webSocialLinks->phone }}?text=urlencodedtext">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                    <div class="media_icon tag_btn d-flex justify-content-center align-items-center"><a href="{{ $webSocialLinks->instagram }}">
                            <i class="fa-brands fa-instagram"></i>
                        </a></div>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <h5 class="text-bold fo_title">À propos de la société</h5>
                <p class="text-light py-3 ab_com">XCompany Côte d’Ivoire, entreprise de création de solutions web et de
                    mise en place de systèmes Domotique et électroniques de maisons connectés et d’installations de
                    dispositifs électroniques</p>
            </div>
            <div class="col-md-4 text-center">
                <h5 class="text-bold fo_title">Sujets utiles</h5>

                <ul>
                    <li><a target="_blank"
                            href="https://www.google.com/maps/place/XCompany/@5.3869379,-3.9883214,15z/data=!4m2!3m1!1s0x0:0x475ac4881d8810ad?sa=X&ved=1t:2428&hl=fr&ictx=111">Site
                            carte</a></li>
                    <li><a href="{{ route('policy-and-confidentiality') }}">Politique de confidentialité</a></li>
                </ul>
            </div>

        </div>
    </div>
    <div>

        <p class="f_p pt-3 text-center">Copyright &copy; <span id="FooterYear"></span> par la société</p>
    </div>
</div>
