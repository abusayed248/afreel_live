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
                <a class="pt-2 f_e" href="mailto:support@afreel.com">support@afreel.com</a>.<br>
                <div class=" d-flex mt-3">

                    @php
                    $webSocialLinks = \App\Models\WebSocialLink::first(); 
                    @endphp 
                   
                    <div class="media_icon tag_btn d-flex justify-content-center align-items-center">
                        <a href="{{ $webSocialLinks->fb }}">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                    <div class="media_icon tag_btn d-flex justify-content-center align-items-center"><a href="{{ $webSocialLinks->twitter }}">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a></div>
                    <div class="media_icon tag_btn d-flex justify-content-center align-items-center">
                        <a href="{{ $webSocialLinks->linkedin }}">
                            <i class="fa-brands fa-linkedin"></i>
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
                    mise en place de systèmes démotiques et électroniques de maisons connectés et d’installations de
                    dispositifs électroniques</p>
            </div>
            <div class="col-md-4 text-center">
                <h5 class="text-bold fo_title">Sujets utiles</h5>

                <ul>
                    <li><a target="_blank"
                            href="https://www.google.com/maps/place/Cafe+de+Versailles/@5.386634,-3.990017,17z/data=!4m8!3m7!1s0xfc19370c07e91c5:0x2a167ea9689b5903!8m2!3d5.3866287!4d-3.9874421!9m1!1b1!16s%2Fg%2F11h409czvz?entry=ttu">Site
                            carte</a></li>
                    <li><a href="">Politique de confidentialité</a></li>
                </ul>
            </div>

        </div>
    </div>
    <div>

        <p class="f_p pt-3 text-center">Copyright &copy; <span id="FooterYear"></span> par la société</p>
    </div>
</div>