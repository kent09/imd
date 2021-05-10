<?php

$description = get_sub_field('description');
$more = get_sub_field('more');
$gallery = get_sub_field('gallery');
$size = 'full';
?>
<section class="content-with-gallery bg-light-blue pt-150 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="content-holder d-flex flex-column h-full">
                    <?php if ($description) : ?>
                        <div class="max-width-600 font-size-30">
                            <?php echo $description; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($more) : ?>
                        <div class="more-holder d-flex mt-auto pt-20">
                            <a href="<?php echo $more['url']; ?>" target="<?php echo $more['target']; ?>" class="green-line">
                                <?php echo $more['title']; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="brand-gallery d-flex flex-wrap">
                    <?php if ($gallery) : ?>
                        <?php foreach ($gallery as $image_id) : ?>
                            <div class="b__wrapper w-half d-flex align-items-center bg-white justify-content-center">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>