<?php
/* Flexible Content - Testimonial Slider
* The template part for displaying flexible content
* <?php get_template_part( 'global-templates/testimonial-slider' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/

?>


<?php if( get_row_layout() == 'testimonial_slider' ): ?>
    <?php 
    $testimonials = get_sub_field('testimonials');
    $color = get_sub_field("background_color"); 
    $buttonLink = get_sub_field("all_testimonials_link"); 
    $average_review_score = get_field('average_review_score', 'options');
    $total_reviews = get_field('total_reviews', 'options');
    ?>
    <div class="testimonial-container <?php if ($color): echo 'has-background'; endif;?>" <?php if ($color): ?>style="background: <?php echo $color; ?>;"<?php endif; ?>>
        <div class="container testimonial-slider<?php if ($color): echo ' padding'; endif; ?>">
            <?php if (get_sub_field("header")): ?><h3><?php echo get_sub_field("header"); ?></h3><?php endif; ?>
            <a href="https://www.google.com/search?q=groove+technologies&rlz=1C1CHFX_enUS787US787&oq=groove+tech&aqs=chrome.0.0i355i512j46i175i199i512j69i57j0i457i512j46i512j69i60l2j69i61.2777j0j7&sourceid=chrome&ie=UTF-8#lrd=0x875261e8c02b675d:0x44c23c4aa91fc3e4,1,,," target="_blank">
                <span class="average"><?php echo $average_review_score; ?></span>
                <div class='rating'>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <span><?php echo $total_reviews; ?> Google Reviews</span>
            </a>
            <div class="owl-carousel reviews-carousel owl-theme">
                <?php foreach( $testimonials as $testimonial ): 
                    $person = $testimonial['person'] ?? null;
                    $quote = $testimonial['quote'] ?? null;
                    $stars = (int)$testimonial['stars'];
                ?>
                <div class="testimonial-slide">
                    <div class="details">
                        <?php if ($person): ?><div class="person"><?php echo $person; ?></div><?php endif; ?>
                        <div class="stars">
                            <?php for ($i = 0; $i < $stars; $i++) :?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="testimonial" data-collapse-limit="300"><?php echo $quote; ?></div>
                    <?php if ($buttonLink): ?>
                        <a href="<?php if (strpos($buttonLink, 'telephone')): echo 'tel:'.$phone; else: echo $buttonLink; endif;?>">Read More</a>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>