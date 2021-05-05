<?php

if (have_rows('page_content')) :

    while (have_rows('page_content')) : the_row();
        if (get_row_layout() == 'content_with_side_gallery') :

            get_template_part('template-parts/flexible/content-side', 'gallery');

        endif;
    endwhile;

endif;
