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
        endif;
    endwhile;

endif;
