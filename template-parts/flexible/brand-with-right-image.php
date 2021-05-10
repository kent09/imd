<?php
$gallery = get_sub_field('brand');
$img = get_sub_field('image');
?>
<section class="brand-with-right-image">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5">
                <ul class="brand-wrapper d-flex flex-wrap justify-content-between align-items-center pl-0 ml-auto">
                    <?php if ($gallery) : ?>
                        <?php foreach ($gallery as $image_id) : ?>
                            <li class="text-center">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-md-6 offset-md-1 pr-0">
                <?php if ($img) : ?>
                    <div class="image-wrapper d-flex ml-auto">
                        <div class="img-skew-right skew-left-15 overflow-hidden">
                            <?php echo wp_get_attachment_image($img, $size, false, ['class' => 'skew-right-15']); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>