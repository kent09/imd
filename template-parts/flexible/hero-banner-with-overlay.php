<?php 
    $show_info = get_sub_field('show_right_info');
    $show_form = get_sub_field('show_contact_form');
    $show_brand = get_sub_field('show_brand');
    $title = get_sub_field('title');
    $desc = get_sub_field('description');
    $right_info = get_sub_field('right_info');
    $brand_img = get_sub_field('brand_logo');
    $image = get_sub_field('hero_banner');
    $form = get_sub_field('form');

    $show = get_sub_field('show');

    global $post;
    $post_slug = $post->post_name;
    $bg = "";
    if($post_slug == "contact-us") {
        $bg = 'contact-overlay';
    }

?>

<section class="hero-banner-with-overlay d-flex positive-relative">
    <div class="overlay position-absolute <?php echo $bg; ?>"></div>
    <div class="img bg-position-size position-absolute" style="background-image:url('<?php echo $image; ?>')"></div>
    <div class="container mt-auto position-relative">
        <div class="row">
            <div class="col">
                <div class="hero__content pb-40">
                    <?php if($title): ?>
                        <div class="title font-size-62 text-white pb-5 mb-0"><?php echo $title; ?></div>
                    <?php endif; ?>
                    <?php if($desc): ?>
                        <div class="description font-size-20 text-white"><?php echo $desc; ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($show == "form"): ?>
                <div class="col-md-6">
                    <div class="form-wrapper">
                        <?php echo do_shortcode($form); ?>
                    </div>
                </div>
            <?php endif;?>

            <?php if($show == "info"): ?>
                <div class="col-md-4 mt-auto">
                    <div class="right-info font-family-mont text-white">
                        <?php if($right_info['title']): ?>
                            <div class="small-title font-size-16">
                                <?php echo $right_info['title']; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($right_info['description']): ?>
                            <div class="description font-size-24">
                                <?php echo $right_info['description']; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($right_info['link']): ?>
                            <a href="<?php echo $right_info['link']; ?>"><i class="round-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if($show == "brand"): ?>
        <div class="brand-image position-absolute parallelogram skew-right">
            <?php echo wp_get_attachment_image($brand_img, 'full', false, ['class' => 'skew-left'] ); ?>
        </div>
    <?php endif; ?>
</section>