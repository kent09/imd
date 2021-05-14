<?php
$avatar = get_sub_field('avatar');
$title = get_sub_field('title');
$prof = get_sub_field('profession');
$contact = get_sub_field('connect_with');
$send_email = get_sub_field('send_email');
$size = "full";
$show_icon = get_sub_field('show_icon');
?>
<section class="content-enquire container">

    <div class="bg-light-blue d-flex position-relative">
        <div class="content position-relative">
            <?php if ($title) : ?>
                <div class="title font-size-30 text-black">
                    <?php echo $title; ?>
                </div>
            <?php endif; ?>
            <?php if ($prof) : ?>
                <div class="prof d-flex align-items-center">
                    <?php echo $show_icon ? '<i class="linkedin mr-10"></i>' : ''; ?><?php echo $prof; ?>
                </div>
            <?php endif; ?>

            <div class="btn-wrapper d-flex pt-60">
                <a href="<?php echo $contact['url']; ?>" target="<?php echo $contact['target']; ?>" class="contact-with-btn d-flex align-items-center"><?php echo $show_icon ? '<i class="phone mr-10"></i>' : '<i class="linkedin mr-10"></i>'; ?><?php echo $contact['title']; ?></a>
                <a href="<?php echo $send_email['url']; ?>" target="<?php echo $send_email['target']; ?>" class="contact-us-btn d-flex align-items-center"><?php echo $show_icon ? '<i class="mail mr-10"></i>' : ''; ?><?php echo $send_email['title']; ?></a>
            </div>
        </div>
        <div class="avatar-wrapper position-absolute">
            <?php echo wp_get_attachment_image($avatar, $size); ?>
        </div>
    </div>
</section>