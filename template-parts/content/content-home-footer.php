<div class="container">
    <div class="footer-nav d-flex align-items-center pb-30">
        <?php $logo = get_field('footer_logo', 'option'); ?>
        <?php if ($logo) : ?>
            <div class="footer-logo">
                <a href="<?php bloginfo('url'); ?>">
                    <?php echo wp_get_attachment_image($logo, "full"); ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="nav ml-auto">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-menu',
                    'menu_id'        => 'footer-menu',
                    ''
                )
            );
            ?>
            <?php $linkedin = get_field('linkedin', 'option'); ?>
            <?php if ($linkedin) : ?>
                <div class="linkedin"><a href="<?php echo $linkedin  ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/linkedin.svg" /></a></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer-info text-white d-flex">
        <?php $copy = get_field('copy_right', 'option'); ?>
        <?php $brand_logo = get_field('tech_logo', 'option'); ?>
        <?php if ($copy) : ?>
            <div class="copyright mt-auto">
                <?php echo $copy; ?>
            </div>
        <?php endif; ?>
        <?php if ($brand_logo) : ?>
            <ul class="brand-list d-flex mb-0 p-0 ml-auto">
                <?php foreach ($brand_logo as $image_id) : ?>
                    <li>
                        <?php echo wp_get_attachment_image($image_id, 'full'); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>