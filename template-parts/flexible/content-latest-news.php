<?php
$title = get_sub_field('title');
$read_all = get_sub_field('read_all');
$size = 'full';
?>

<section class="latest-news bg-light-blue">
    <div class="container">
        <header class="row align-items-center ">
            <div class="col-md-6">
                <?php if ($title) : ?>
                    <h2 class="title mb-0"><?php echo $title; ?></h2>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="read-all">
                    <a href="<?php echo $read_all['url']; ?>" target="<?php echo $read_all['target']; ?>" class="font-family-mont"><?php echo $read_all['title']; ?></a>
                </div>
            </div>
        </header>
        <div class="row">
            <?php
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 2,
                'post_status' => 'publish'
            ));
            foreach ($recent_posts as $recent) :
                $image = get_the_post_thumbnail($recent['ID'], $size);
            ?>
                <div class="col-lg-6">
                    <div class="post-wrapper h-full d-flex bg-white">
                        <?php if ($image) : ?>
                            <div class="feature-image position-relative">
                                <?php $feature = get_field('feature', $recent['ID']); ?>
                                <?php if ($feature) : ?>
                                    <div class="feature font-size-13 text-white position-absolute d-flex align-items-center font-family-mont">FEATURED</div>
                                <?php endif; ?>
                                <?php echo $image; ?>
                            </div>
                        <?php endif; ?>
                        <div class="content d-flex flex-column">
                            <div class="post-title"><?php echo $recent['post_title']; ?></div>
                            <div class="excerpt font-family-mont"><?php echo wp_trim_words(get_the_content(null, false, $recent['ID']), 20); ?></div>
                            <div class="more-holder d-flex mt-auto pt-20">
                                <a href="<?php echo get_permalink($recent['ID']); ?>" target="<?php echo $read_all['target']; ?>" class="green-line">
                                    Read more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>