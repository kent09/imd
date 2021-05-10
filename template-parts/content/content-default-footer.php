<?php
$brand_logo = get_field('tech_logo', 'option');
$copy = get_field('copy_right', 'option');
$logo = get_field('footer_logo', 'option');
$linkedin = get_field('linkedin', 'option');
?>
<div class="container default-footer">
    <div class="footer-nav d-flex align-items-center pb-60">
        <?php if ($logo) : ?>
            <div class="footer-logo d-flex align-items-center">
                <a href="<?php bloginfo('url'); ?>">
                    <?php echo wp_get_attachment_image($logo, "full"); ?>
                </a>
                <?php if ($linkedin) : ?>
                    <div class="linkedin"><a href="<?php echo $linkedin  ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/linkedin.svg" /></a></div>
                <?php endif; ?>
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
    <div class="footer-info text-white d-flex align-items-center">
        <?php if ($copy) : ?>
            <div class="copyright">
                <?php echo $copy; ?>
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
        </div>
    </div>
</div>