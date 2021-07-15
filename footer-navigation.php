<div class="footer-wrap container-fluid page-padding">
    <div class="row footer_wrapper justify-content-between" style="margin-right:0; margin-left:0;">
        <div class="col-sm-6">
            <h2 class="footer-column-header">Studio</h2>
            <p class="display-big-screen">João Prates Photography<br>
                Malakkastraat 113<br>
                2585 SL The Hague, the Netherlands<br>
                +31 6 8103 2216<br>
                VAT number: NL687121061B01<br>
                KvK number: 50227548
            </p>
            <p class="display-small-screen">
                João Prates Photography
                Malakkastraat 113<br>
                2585 SL The Hague, the Netherlands
                +31(0)681032216<br>
                VAT number: NL687121061B01
                KvK number: 50227548
            </p>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-6">
            <div class="support_social_wrapper">
         
                    
                    <div class="nav_menu_support">
                    <h2 class="footer-column-header">Support</h2>
                        <?php
                    wp_nav_menu(array(
                    'theme_location' => 'footer_support_menu',
                    'container' => false,
                    'menu_class' => 'navbar-nav menu_wraper',
                    'items_wrap' => '<ul id="%1$s" class="nav-item %2$s">%3$s</ul>',
                    'item_spacing' => 'preserve'
                    )
                    );
                ?>
                    </div>


                    
                    <div class="nav_menu_social">
                    <h2 class="footer-column-header">Socials</h2>
                        <?php
                    wp_nav_menu(array(
                    'theme_location' => 'footer_social_menu',
                    'container' => false,
                    'menu_class' => 'navbar-nav menu_wraper',
                    'items_wrap' => '<ul id="%1$s" class="nav-item %2$s">%3$s</ul>',
                    'item_spacing' => 'preserve'
                    )
                    );
                ?>
                    </div>

           
            </div>

        </div>
       <div class="col-12 social-icons d-sm-flex d-md-none">
            <a target="_black" href="https://www.instagram.com/joao_prates1/"><i class="fab fa-instagram-square"></i></a>
            <a target="_black" href="https://www.facebook.com/joaopratesphotos"><i class="fab fa-facebook-square"></i></a>
            <a target="_black" href="https://www.linkedin.com/in/joao-prates-41233040/"><i class="fab fa-linkedin"></i></a>
            <a target="_black" href="mailto: hello@joaoprates.com"><i class="fas fa-envelope-square"></i></a>
       </div> 
       <div class="col-12 social-icons d-none d-sm-none d-md-flex">
       <i class="fab fa-cc-paypal"></i>
       <i class="fas fa-credit-card"></i>
       <i class="fab fa-ideal"></i>

       </div> 

    </div>
    <div class="row">
        <div class="col-12">
            <p class="current_year">© 2021 João Prates Photography</p>
        </div>
    </div>
</div>