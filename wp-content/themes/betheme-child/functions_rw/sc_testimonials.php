<?php
/**
 * Created by PhpStorm.
 * User: yailet
 * Date: 17-Mar-17
 * Time: 10:39 PM
 */

/* ---------------------------------------------------------------------------
 * Testimonials [testimonials]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_testimonials' ) )
{
    function sc_testimonials( $attr, $content = null )
    {
        extract(shortcode_atts(array(
            'category' 		=> '',
            'orderby' 		=> 'menu_order',
            'order' 		=> 'ASC',
            'style' 		=> '',
            'hide_photos' 	=> '',
        ), $attr));

        $args = array(
            'post_type' 			=> 'testimonial',
            'posts_per_page' 		=> -1,
            'orderby' 				=> $orderby,
            'order' 				=> $order,
            'ignore_sticky_posts' 	=> 1,
        );
        if( $category ) $args['testimonial-types'] = $category;

        $query_tm = new WP_Query();
        $query_tm->query( $args );

        // class
        $class = $style;

        if( $hide_photos ){
            $class .= ' hide-photos';
        }

        $output = '';
        if ($query_tm->have_posts())
        {
            $output .= '<div class="testimonials_slider '. $class .'">';

            // photos | pagination (style !== single-photo)
            if( $style != 'single-photo' && ! $hide_photos ){
                $output .= '<div class="slider_pager slider_images"></div>';
            }

            // testimonials | contant
            $output .= '<ul class="testimonials_slider_ul">';
            while ($query_tm->have_posts())
            {
                $query_tm->the_post();
                $output .= '<li>';

               /* $output .= '<div class="single-photo-img">';
                if( has_post_thumbnail() ){
                    $output .= get_the_post_thumbnail( null, 'testimonials', array('class'=>'scale-with-grid' ) );
                } else {
                    $output .= '<img class="scale-with-grid" src="'. THEME_URI .'/images/testimonials-placeholder.png" alt="'. get_post_meta(get_the_ID(), 'mfn-post-author', true) .'" />';
                }
                $output .= '</div>';*/

                $output .= '<div class="bq_wrapper">';
               // $output .= '<blockquote>'. get_the_content() .'</blockquote>';
                $output .=  get_the_content_with_formatting();
                $output .= '</div>';

                //$output .= '<div class="hr_dots"><span></span><span></span><span></span></div>';

                $output .= '<div class="author">';
                $output .= '<h5>';
                if( $link = get_post_meta(get_the_ID(), 'mfn-post-link', true) ) $output .= '<a target="_blank" href="'. $link .'">';
                $output .= get_post_meta(get_the_ID(), 'mfn-post-author', true);
                if( $link ) $output .= '</a>';
                $output .= '</h5>';
                //$output .= '<span class="company">'. get_post_meta(get_the_ID(), 'mfn-post-company', true) .'</span>';
                $output .= '</div>';

                $output .= '</li>';
            }
            wp_reset_query();
            $output .= '</ul>';

            // photos | pagination (style == single-photo)
            //if( $style == 'single-photo' ){
                $output .= '<div class="slider_pager slider_pagination"></div>';
            //}

            $output .= '</div>'."\n";
        }

        return $output;
    }
}

