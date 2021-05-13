<?php
$image = get_sub_field('building');
?>

<section class="content-contact-us pb-90 pt-130">
    <div class="container d-flex flex-nowrap">

        <?php if (have_rows('contact_info')) : ?>
            <?php while (have_rows('contact_info')) : the_row();  ?>
                <?php
                $address = get_sub_field('address');
                $title = get_sub_field('title');
                $phone = get_sub_field('phone');
                $email = get_sub_field('email');
                $map = get_sub_field('map');
                ?>
                <div class="contact-info text-black">
                    <?php if ($title) : ?>
                        <div class="title font-size-30 pb-20">
                            <?php echo $title; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($address) : ?>
                        <div class="address font-family-mont pb-30">
                            <i class="icon pin"></i><?php echo $address; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($phone) : ?>
                        <div class="phone pb-10">
                            <a href="<?php echo $phone['url']; ?>" class="font-family-mont text-black" target="<?php echo $phone['target']; ?>">
                                <i class="icon phone"></i><?php echo $phone['title']; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($email) : ?>
                        <div class="email pb-40">
                            <a href="<?php echo $email['url']; ?>" class="font-family-mont text-black" target="<?php echo $email['target']; ?>">
                                <i class="icon envelop"></i><?php echo $email['title']; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($map) : ?>
                        <div class="map">
                            <?php echo $map; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="image-holder ml-auto">
            <?php echo wp_get_attachment_image($image, 'full'); ?>
        </div>
    </div>
</section>