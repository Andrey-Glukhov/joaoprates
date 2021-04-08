<nav class="navbar navbar-expand-md">
<a class="navbar-brand"><img src="http://localhost:8888/JoaoPrates/wordpress/wp-content/uploads/2021/04/Logo_variation_02-4.png"/></a>
<button class="navbar-toggler menu-btn" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
  <div class="navbar-toggler-icon animated-icon1"> <span></span><span></span><span></span> </div>
</button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo03" style="padding:0;">
    <div class="nav_menu_left">

                <?php
                wp_nav_menu(array(
                  'theme_location' => 'primary_left',
                  'container' => false,
                  'menu_class' => 'navbar-nav menu_wraper',
                  'items_wrap' => '<ul id="%1$s" class="nav-item %2$s">%3$s</ul>',
                  'item_spacing' => 'preserve'
                )
              );
              ?>
    </div>
    <div class="nav_menu_right">

      <?php
        wp_nav_menu(array(
          'theme_location' => 'primary_right',
          'container' => false,
          'menu_class' => 'navbar-nav menu_wraper',
          'items_wrap' => '<ul id="%1$s" class="nav-item %2$s">%3$s</ul>',
          'item_spacing' => 'preserve'
        )
        );
      ?>
    </div>
  </div>
  
</nav>
