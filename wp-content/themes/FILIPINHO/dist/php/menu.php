<div class="menu">
    <div class="btn-hamburger">
        <div class="btn-left"></div>
        <div class="btn-right"></div>
    </div>

    <nav class="menu-items">
        <ul class="d-flex flex-column" id="menu">
            <?php
                wp_nav_menu( array(
                    'items_wrap'      => '%3$s',
                    'theme_location' => 'header_menu'
                ) );
            ?>
        </ul>
    </nav>

</div>