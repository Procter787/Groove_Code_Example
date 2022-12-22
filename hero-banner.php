<?php
/* Flexible Content - Hero Block
* The template part for displaying flexible content
* <?php get_template_part( 'global-templates/hero-block' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/

?>

<?php if( get_row_layout() == 'hero_banner' ): ?>
    <?php 
    $shift = get_field("transparent_header");
    $header = get_sub_field("header");
    $overlay = get_sub_field("overlay");
    $opacity = get_sub_field("overlay_opacity");
    $hero_image = get_sub_field('image'); ?>
    <div class="hero-banner<?php if ($shift): echo " shift-up"; endif;?>">
        <div class="container">
            <h1 class="h2"><?php echo $header; ?></h1>
        </div>
        <?php if ($overlay): ?>
            <div class="image-overlay" style="<?php if ($overlay): echo 'background: '.$overlay.';'; endif; if ($opacity == 100): echo 'opacity: 1'; else: echo 'opacity: .'.$opacity; endif;?>"></div>
            <div class="overlay-image">
                <?php if ($hero_image): ?><img class="hero-image" src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']) ?: 'Groove Hero Image'; ?>" /><?php endif; ?>
            </div>
        <?php else: ?>
            <?php if ($hero_image): ?><img class="hero-image" src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']) ?: 'Groove Hero Image'; ?>" /><?php endif; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>