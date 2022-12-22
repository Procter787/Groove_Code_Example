<?php
/* Flexible Content - Parallax Slider
* The template part for displaying flexible content
* <?php get_template_part( 'global-templates/parallax-slider' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/

?>

<?php if( get_row_layout() == 'parallax_slider' ): ?>
    <?php
        $header = get_sub_field('header');
        $blocks = get_sub_field('blocks');
        $overlay = get_sub_field("overlay");
        $opacity = get_sub_field("overlay_opacity");
        $page = get_queried_object();
        $ID = get_page_by_title($page->label)->ID ?? $page->ID ?? get_the_ID();
        $shift = get_field("transparent_header", $ID);
    ?>
    <div class="ag-container-shops<?php if ($shift): echo " shift-up"; endif;?>">
        <div class="container">
            <div class="headers">
                <h2><?php echo $header; ?></h2>
            </div>
        </div>
        <div class="js-flickity-slider">
            <?php foreach( $blocks as $block ): 
            $title = $block['title'];
            $client = $block['client'];
            $solutions = $block["solutions"];
            $buttonTitle = $block["cta_text"];
            $buttonLink = $block["cta_link"];
            $image = $block['image']; ?>
            <div class="js-carousel-cell">
                <a class="white" href="<?php echo esc_url($buttonLink); ?>">
                    <div class="ag-shop-card_box-wrap">
                        <div class="ag-shop-card_box">
                            <div class="ag-shop-card_body">
                                <?php if ($overlay): ?>
                                <div class="image-overlay" style="<?php if ($overlay): echo 'background: '.$overlay.';'; endif; if ($opacity == 100): echo 'opacity: 1'; else: echo 'opacity: .'.$opacity; endif;?>"></div>
                                <?php endif; ?>
                                <div class="js-card-bg ag-card-bg" style="background-image: url(<?php echo esc_url($image['url']); ?>);"></div>
                                <div class="content">
                                    <?php if ($client): ?><h4 class="client"><?php echo $client; ?></h4><?php endif; ?>
                                    <?php if ($title): ?><h4 class="title"><?php echo $title; ?></h4><?php endif; ?>
                                    <?php if ($buttonTitle) : ?>
                                    <p class="link"><?php echo $buttonTitle; ?></p>
                                    <?php endif; ?>
                                    <?php if ($solutions): ?>
                                </div>
                                <div class="solutions">
                                    <p class="solution-list">Solutions</p>
                                    <?php foreach ($solutions as $solution) : ?>
                                        <p class="solution"><?php echo $solution->post_title; ?></h3>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>