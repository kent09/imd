<?php

if (have_rows('page_content')) :

    while (have_rows('page_content')) : the_row();
        if (get_row_layout() == 'content_with_side_gallery') :
            get_template_part('template-parts/flexible/content-side', 'gallery');
        elseif (get_row_layout() == 'wheel_tab') :
            get_template_part('template-parts/flexible/content-wheel', 'tab');
        elseif (get_row_layout() == 'testimonial_tab') :
            get_template_part('template-parts/flexible/content-testimonial', 'tab');
        elseif (get_row_layout() == 'left_content_image') :
            get_template_part('template-parts/flexible/content-left', 'image');
        elseif (get_row_layout() == 'brand_with_right_image') :
            get_template_part('template-parts/flexible/brand-with-right', 'image');
        elseif (get_row_layout() == 'latest_news') :
            get_template_part('template-parts/flexible/content-latest', 'news');
        elseif (get_row_layout() == 'hero_banner') :
            get_template_part('template-parts/flexible/hero', 'banner');
        elseif (get_row_layout() == 'tablist') :
            get_template_part('template-parts/flexible/content-tab', 'list');
        elseif (get_row_layout() == 'tablist_without_top_content') :
            get_template_part('template-parts/flexible/tablist-without-top', 'content');
        elseif (get_row_layout() == 'our_partners') :
            get_template_part('template-parts/flexible/content-our', 'partner');
        elseif (get_row_layout() == 'enquire') :
            get_template_part('template-parts/flexible/content', 'enquire');
        elseif (get_row_layout() == 'our_success') :
            get_template_part('template-parts/flexible/content-our', 'success');
        elseif (get_row_layout() == 'meet_the_team') :
            get_template_part('template-parts/flexible/content-meet-the', 'team');
        elseif (get_row_layout() == 'content_right_image') :
            get_template_part('template-parts/flexible/content-right', 'image');
        elseif (get_row_layout() == 'content_left_image_v2') :
            get_template_part('template-parts/flexible/content-left-image', 'v2');
        elseif (get_row_layout() == 'hero_banner_with_overlay') :
            get_template_part('template-parts/flexible/hero-banner-with', 'overlay');
        elseif (get_row_layout() == 'content_success_list') :
            get_template_part('template-parts/flexible/content-success', 'list');
        elseif (get_row_layout() == 'content_legacy') :
            get_template_part('template-parts/flexible/content', 'legacy');
        elseif (get_row_layout() == 'content_testimonial') :
            get_template_part('template-parts/flexible/content', 'testimonial');
        elseif (get_row_layout() == 'content_successful_outcome') :
            get_template_part('template-parts/flexible/content-successful', 'outcome');
        elseif (get_row_layout() == 'content_contact_us') :
            get_template_part('template-parts/flexible/content-contact', 'us');
        endif;
    endwhile;

endif;
