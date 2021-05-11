<?php 
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $brand = get_sub_field('brands');
    $size = 'full';
?>
<section class="our-partner pt-130 pb-114 bg-light-blue">
    <div class="container">
        <?php if($title): ?>
        <div class="title font-size-13 text-green font-family-mont fw-bold text-uppercase pb-30 text-center">
            <?php echo $title; ?>
        </div>
        <?php endif; ?>
        <?php if($description): ?>
            <div class="description font-size-30 ml-auto mr-auto text-center">
                <?php echo $description; ?>
            </div>
        <?php endif; ?>

        <?php if( $brand ): ?>
            <ul class="brand-gallery-wrapper d-flex align-items-center justify-content-center flex-wrap">
                <?php foreach( $brand as $image_id ): ?>
                    <li class="d-flex align-items-center justify-content-center">
                        <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                    </li>
                <?php endforeach; ?>
                </ul>
        <?php endif; ?>

    </div>
</section>