<?php
/* Flexible Content - Slice Banner
* The template part for displaying flexible content
* <?php get_template_part( 'global-templates/Slice Banner' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/

?>

<?php if( get_row_layout() == 'slice_banner' ): ?>
    <?php $shift = get_field("transparent_header");
    $slides = get_sub_field('slides');?>
    <div class="slice-banner<?php if ($shift): echo " shift-up"; endif;?>">
        <div class="slideshow">
            <div class="slider">
                <?php foreach( $slides as $slide ): 
                    $header = $slide['header'];
                    $sub = $slide['sub_header'];
                    $overlay = $slide["overlay"];
                    $buttonTitle = $slide["cta_text"];
                    $buttonLink = $slide["cta_link"];
                    $opacity = $slide["overlay_opacity"];
                    $hero_image = $slide['image'];
                ?>
                <div class="hero-slide">
                    <div class="container">
                        <div class="headers">
                            <h2 class="h1"><?php echo $header; ?></h2>
                            <p><?php echo $sub; ?></p>
                            <?php if ($buttonLink): ?>
                            <div class="cta">
                                <a href="<?php echo $buttonLink;?>"><button><?php echo $buttonTitle; ?></button></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($overlay): ?>
                        <div class="image-overlay" style="<?php if ($overlay): echo 'background: '.$overlay.';'; endif; if ($opacity == 100): echo 'opacity: 1'; else: echo 'opacity: .'.$opacity; endif;?>"></div>
                        <div class="overlay-image">
                            <?php if ($hero_image): ?><img class="hero-image" src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']) ?: 'Groove Hero Image'; ?>" /><?php endif; ?>
                        </div>
                        <div class="slice-border"></div>
                    <?php else: ?>
                        <?php if ($hero_image): ?><img class="hero-image" src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']) ?: 'Groove Hero Image'; ?>" /><?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>