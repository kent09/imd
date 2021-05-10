<?php
$desc = get_sub_field('description');
$more = get_sub_field('more');
$count1 = get_sub_field('transformed');
$count2 = get_sub_field('active');
$size = 'full';
$string = [];
?>
<section class="testimonial-tab bg-dark-green text-white pt-130 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="content">
                    <?php if ($desc) : ?>
                        <div class="desc font-size-30"><?php echo $desc; ?></div>
                    <?php endif; ?>
                    <div class="more-holder d-flex mt-auto">
                        <a href="<?php echo $more['url']; ?>" target="<?php echo $more['target']; ?>" class="text-white light-green-line">
                            <?php echo $more['title']; ?>
                        </a>
                    </div>
                    <div class="counter-wrapper pt-114">
                        <ul class="ml-0 d-flex">
                            <li>
                                <div class="counter text-green font-size-100"><?php echo $count1['number']; ?></div>
                                <p class="mb-0"><?php echo $count1['label']; ?></p>
                            </li>
                            <li>
                                <div class="counter text-green font-size-100"><?php echo $count2['number']; ?></div>
                                <p class="mb-0"><?php echo $count2['label']; ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php if (have_rows('tabs')) : ?>
                <div class="col-md-6">
                    <div class="tab-wrapper">
                        <div class="tab-content">
                            <?php $i = 0; ?>
                            <?php while (have_rows('tabs')) : the_row();  ?>
                                <?php
                                $logo = get_sub_field('logo');
                                $desc = get_sub_field('testimonial');
                                $more = get_sub_field('more');
                                $rand_string = generateRandomString();
                                array_push($string, $rand_string);
                                ?>
                                <div class="tab-pane h-full fade <?php echo $i != 0 ? "" : 'show active';  ?>" role="tabpanel" id="<?php echo $rand_string; ?>">
                                    <?php if ($logo) : ?>
                                        <div class="logo">
                                            <?php echo wp_get_attachment_image($logo, $size); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="description font-size-20"><?php echo $desc; ?></div>
                                    <?php if ($more) : ?>
                                        <div class="about-more mt-auto d-flex">
                                            <a href="<?php echo $more['url']; ?>" target="<?php echo $more['target']; ?>" class="font-family-mont fw-bold"><?php echo $more['title']; ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                        </div>
                        <ul class="nav nav-tabs ml-0" role="tablist">
                            <?php $i = 0; ?>
                            <?php while (have_rows('tabs')) : the_row();  ?>
                                <?php $tab_logo = get_sub_field('tab_logo'); ?>
                                <li>
                                    <a href="#" data-bs-toggle="tab" <?php echo $i == 0 ? 'class="active"' : ''; ?> data-bs-target="#<?php echo $string[$i]; ?>" role="tab" <?php echo $i != 0 ? 'aria-selected="false"' : 'aria-selected="true"';  ?>><?php echo wp_get_attachment_image($tab_logo, $size); ?></a>
                                </li>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>