<?php
$img = get_sub_field('image');
$desc = get_sub_field('description');
$more = get_sub_field('join');
$size = 'full';
?>
<section class="left-image-content pt-114">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 pl-0">
                <?php if ($img) : ?>
                    <div class="image-wrapper bg-with-line">
                        <div class="img-skew skew-left-15 overflow-hidden">
                            <?php echo wp_get_attachment_image($img, $size, false, ['class' => 'skew-right-15']); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="description mr-auto">
                    <?php if ($desc) : ?>
                        <div class="content font-size-30">
                            <?php echo $desc; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($more) : ?>
                        <div class="more-holder d-flex mt-auto">
                            <a href="<?php echo $more['url']; ?>" target="<?php echo $more['target']; ?>" class="green-line">
                                <?php echo $more['title']; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>