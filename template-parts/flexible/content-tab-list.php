<?php
$top = get_sub_field('top_title');
$top_desc = get_sub_field('top_description');
$tablist_title = get_sub_field('tablist_title');

$right_image = get_sub_field('right_image');
$right_side_content = get_sub_field('right_content');
$right_contact = get_sub_field('contact_us');

$size = 'full';
?>
<section class="content-tab-list">
    <?php if ($top) : ?>
        <div class="title font-size-13 text-green font-family-mont fw-bold text-uppercase pb-30">
            <?php echo $top; ?>
        </div>
    <?php endif; ?>
    <?php if ($top_desc) : ?>
        <div class="description font-size-30 ml-auto mr-auto">
            <?php echo $top_desc; ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <?php if ($tablist_title) : ?>
            <div class="font-size-13 text-green font-family-mont fw-bold text-uppercase pb-30">
                <?php echo $tablist_title; ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php if (have_rows('tablist')) : ?>
                <div class="col">
                    <ul class="list">
                        <?php while (have_rows('tablist')) : the_row();  ?>
                            <?php $title = get_sub_field('title'); ?>
                            <?php $content = get_sub_field('content'); ?>
                            <?php $show_contact = get_sub_field('show_contact'); ?>
                            <?php $contact = get_sub_field('contact'); ?>

                            <li>
                                <div class="tab_title">
                                    <?php echo $title; ?>
                                </div>
                                <div class="tab_description">
                                    <?php if ($content) : ?>
                                        <div class="content_wrapper">
                                            <?php echo $content; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($show_contact) : ?>
                                        <?php $avatar = $contact['avatar']; ?>
                                        <?php $name = $contact['name']; ?>
                                        <?php $prof = $contact['profession']; ?>
                                        <?php $contact_btn = $contact['contact']; ?>
                                        <div class="contact-with">
                                            <?php if ($avatar) : ?>
                                                <div class="avatar">
                                                    <?php echo wp_get_attachment_image($avatar, $size); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="name">
                                                <?php if ($name) : ?>
                                                    <div><?php echo $name; ?></div>
                                                <?php endif; ?>
                                                <?php if ($prof) : ?>
                                                    <div><?php echo $prof; ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if ($contact_btn) : ?>
                                                <a href="<?php echo $contact_btn['url']; ?>" target="<?php echo $contact_btn['target']; ?>">
                                                    <?php echo $contact_btn['title']; ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="col-lg-4 offset-lg-1">
                <div class="right-content">
                    <?php if ($right_image) : ?>
                        <div class="img_wrapper">
                            <?php echo wp_get_attachment_image($right_image, $size); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($right_side_content) : ?>
                        <p><?php echo $right_side_content; ?></p>
                    <?php endif; ?>
                    <?php if ($right_contact) : ?>
                        <a href="<?php echo $right_contact['url']; ?>" target="<?php echo $right_contact['target']; ?>">
                            <?php echo $right_contact['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>