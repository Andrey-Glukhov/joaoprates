<div class="footer-wrap container">
    <div class="row">
        <div class="col-md-4">
        <h2 class="footer-column-header">Studio</h2>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem laudantium eos rem. Ab debitis ullam quaerat cupiditate laboriosam. Ea cum alias reiciendis molestias quis nostrum nulla quidem possimus dolor eveniet.
        </div>
        <div class="col-md-2">
            <h2>Link</h2>
            <div class="nav_menu_links">
                <?php
                    wp_nav_menu(array(
                    'theme_location' => 'footer_links_menu',
                    'container' => false,
                    'menu_class' => 'navbar-nav menu_wraper',
                    'items_wrap' => '<ul id="%1$s" class="nav-item %2$s">%3$s</ul>',
                    'item_spacing' => 'preserve'
                    )
                    );
                ?>
            </div>
        </div>
        <div class="col-md-2">
            <h2 class="footer-column-header">Support</h2>
            <div class="nav_menu_support">
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
        </div>
        <div class="col-md-2">
            <h2 class="footer-column-header">Socials</h2>
            <div class="nav_menu_social">
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