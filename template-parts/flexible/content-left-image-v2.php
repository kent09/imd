<?php
$section_title = get_sub_field('section_title');
$title = get_sub_field('title');
$desc = get_sub_field('description');
$link = get_sub_field('contact_us');
$image = get_sub_field('image');

$size = 'full';
?>

<section class="content-left-image-v2 pb-114 pt-50">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 pl-0">
                <div class="image-wrapper mr-auto">
                    <div class="img-skew skew-right-15  overflow-hidden">
                        <?php echo wp_get_attachment_image($image, $size, false, ['class' => 'skew-left-15']); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5 offset-md-1">
                <div class="content-wrapper mr-auto">
                    <?php if ($section_title) : ?>
                        <div class="font-size-13 text-green font-family-mont fw-bold text-uppercase pb-40"><?php echo $section_title; ?></div>
                    <?php endif; ?>
                    <?php if ($title) : ?>
                        <div class="title font-size-30 text-black pb-30"><?php echo $title; ?></div>
                    <?php endif; ?>
                    <?php if ($desc) : ?>
                        <div class="description font-family-moth"><?php echo $desc; ?> </div>
                    <?php endif; ?>
                    <?php if ($link) : ?>
                        <div class="more-holder d-flex">
                            <a href="<?php echo $link['url']; ?>" class="green-line" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>