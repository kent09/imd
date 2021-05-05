<?php

$description = get_sub_field('description');
$more = get_sub_field('more');
$gallery = get_sub_field('gallery');
$size = 'full';
?>
<section class="content-with-gallery bg-light-blue pt-150 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="content-holder">
                    <?php if ($description) : ?>
                        <div class="max-width-600 font-size-30">
                            <?php echo $description; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($more) : ?>
                        <div class="more-holder d-flex">
                            <a href="<?php echo $more['url']; ?>" target="<?php echo $more['target']; ?>">
                                <?php echo $more['title']; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="brand-gallery d-flex">
                    <?php if ($gallery) : ?>
                        <?php foreach ($gallery as $image_id) : ?>
                            <div class="b__wrapper">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>