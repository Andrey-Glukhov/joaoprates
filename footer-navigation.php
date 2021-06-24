<div class="footer-wrap container">
    <div class="row footer_wrapper justify-content-between">
        <div class="col-md-4">
            <h2 class="footer-column-header">Studio</h2>
            <p>João Prates Photography<br>
                Malakkastraat 113<br>
                2585 SL The Hague, the Netherlands<br>
                +31 6 8103 2216<br>
                VAT number: NL687121061B01<br>
                KvK number: 50227548
            </p>
        </div>
        <div class="col-md-4">
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

    </div>
    <div class="row">
        <div class="col-12">
            <p class="current_year">© 2021 João Prates Photography</p>
        </div>
    </div>
</div>