<?php
$title = get_sub_field('title');
$desc = get_sub_field('description');
?>

<section class="wheel-tab pt-114 pb-120 bg-light-blue">
    <!-- <div id="sample" style="height: 700px;">
    </div>
    <div id="sample-tooltip"></div> -->
    <div class="container">
        <?php if ($title) : ?>
            <div class="title font-size-13 text-green font-family-mont fw-bold text-uppercase pb-100"><?php echo $title; ?></div>
        <?php endif; ?>
        <?php if (have_rows('tabs')) : ?>
            <div id="wheel-tab" class="wheel-tab-wrapper ml-auto mr-auto">
                <div>
                    <!-- <ul class="nav nav-tabs ml-0" role="tablist">
                    <?php $i = 0; ?>
                    <?php while (have_rows('tabs')) : the_row();  ?>
                        <?php $title = get_sub_field('title'); ?>
                        <li>
                            <a href="#" <?php echo $i == 0 ? 'class="active"' : ''; ?> class data-bs-toggle="tab" data-bs-target="#<?php echo str_replace(" ", "-", strtolower($title)); ?>" role="tab" <?php echo $i != 0 ? 'aria-selected="false"' : 'aria-selected="true"';  ?>><?php echo $title; ?></a>
                        </li>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </ul> -->
                    <div class="tab-content">
                        <?php $i = 0; ?>
                        <?php while (have_rows('tabs')) : the_row();  ?>
                            <?php
                            $title = get_sub_field('title');
                            $desc = get_sub_field('description');
                            $more = get_sub_field('more_info');
                            ?>
                            <div class="tab-pane fade <?php echo $i != 0 ? "" : 'show active';  ?>" role="tabpanel" id="<?php echo str_replace(" ", "-", strtolower($title)); ?>">
                                <div class="description"><?php echo $desc; ?></div>
                                <?php if ($more) : ?>
                                    <div class="more-info">
                                        <a href="<?php echo $more['url']; ?>" target="<?php echo $more['target']; ?>"><?php echo $more['title']; ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php $i++; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>