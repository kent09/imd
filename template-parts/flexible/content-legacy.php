<?php

$section_title = get_sub_field('section_title');
$desc = get_sub_field('description');
$image = get_sub_field('image');
?>

<section class="content-legary bg-light-blue pb-114 pt-130">
    <div class="container">
        <div class="row">
            <div class="col-md-11 d-flex align-items-center">
                <div class="content-wrapper">
                    <?php if ($section_title) : ?>
                        <div class="title font-size-13 text-green font-family-mont fw-bold text-uppercase pb-50">
                            <?php echo $section_title; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($desc) : ?>
                        <div class="description font-size-30 text-black">
                            <?php echo $desc; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="image-wrapper ml-auto">
                    <?php echo wp_get_attachment_image($image, 'full'); ?>
                </div>
            </div>
        </div>
    </div>
</section>