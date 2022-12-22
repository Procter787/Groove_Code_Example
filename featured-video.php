<?php
/* Flexible Content - Featured Video
* The template part for displaying flexible content
* <?php get_template_part( 'global-templates/featured-video' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/

?>


<?php if( get_row_layout() == 'featured_video' ): ?>
    <?php 
    $header = get_sub_field('header') ?? null;
    $descriptions = get_sub_field('description') ?? null;
    $linkTitle = get_sub_field('cta_text') ?? null;
    $link = get_sub_field('cta_link') ?? null;
    $image = get_sub_field('image') ?? null;
    $video = get_sub_field('video') ?? null;
    $details = get_sub_field('column_details') ?? null;
    $width = get_sub_field('column_width');
    $color = get_sub_field('background_color');
    $has_images = get_sub_field('has_images') ?? null;
    $image_column_width = get_sub_field('image_column_width');
    $bottom_images = get_sub_field('bottom_images') ?? null;
    $widthText = "";
    if ($width == "6") {
        $widthText = "col-sm-12 col-md-6";
        $description = array($descriptions['column_1'], $descriptions['column_2']);
    } elseif ($width == "4") {
        $widthText = "col-sm-12 col-md-6 col-lg-4";
        $description = array($descriptions['column_1'], $descriptions['column_2'], $descriptions['column_3']);
    } elseif ($width == "3") {
        $widthText = "col-sm-12 col-md-6 col-lg-3";
        $description = array($descriptions['column_1'], $descriptions['column_2'], $descriptions['column_3'], $descriptions['column_4']);
    } else {
        $widthText = "col-sm-12";
        $description = array($descriptions['column_1']);
    }
    $imageWidthText = "";
    if ($image_column_width == "6") {
        $imageWidthText = "col-sm-12 col-md-6";
        $bottom_image = array($bottom_images['column_1'], $bottom_images['column_2']);
    } elseif ($image_column_width == "4") {
        $imageWidthText = "col-sm-12 col-md-6 col-lg-4";
        $bottom_image = array($bottom_images['column_1'], $bottom_images['column_2'], $bottom_images['column_3']);
    } elseif ($image_column_width == "3") {
        $imageWidthText = "col-sm-12 col-md-6 col-lg-3";
        $bottom_image = array($bottom_images['column_1'], $bottom_images['column_2'], $bottom_images['column_3'], $bottom_images['column_4']);
    } else {
        $imageWidthText = "col-sm-12";
        $bottom_image = array($bottom_images['column_1']);
    }
    ?>
    <div class="featured-video <?php if ($color): echo 'has-background'; endif;?>" <?php if ($color): ?>style="background: <?php echo $color; ?>;"<?php endif; ?>>
        <div class="anchor" id="featured-video"></div>
        <div class="container<?php if ($color): echo ' padding'; endif; ?>">
            <?php if ($video || $image): ?>
            <div class="image-wrapper">
                <div class="image">
                    <div class="embed-container">
                        <?php if (!$image): echo '<div class="video-wrapper">'; endif; ?><?php echo $video; ?><?php if (!$image): echo '</div>'; endif; ?>
                        <?php if($image && $video): ?><button class="play-video"><img class="style-svg" style="max-width: 123px" alt="alt-text" src="<?php echo get_template_directory_uri() . '/images/play_video.svg';?>" /></button><?php endif; ?>
                        <?php if($image): ?><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Groove Block Image'; ?>" /><?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="content <?php if ($video || $image): echo 'pt-5'; endif; ?>">
                <?php if ($header) : echo "<h3>".$header."</h3>"; endif; ?>
                <?php if ($description) : ?>
                <div class="row">
                    <?php foreach($description as $column): ?>
                        <p class="<?php echo $widthText; ?>"><?php echo $column; ?></p>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if ($details) : ?>
                <div class="details row">
                    <?php foreach( $details as $detail ): 
                        $detail_header = $detail['detail_header'] ?? null;
                        $detail_info = $detail['detail_info'] ?? null;
                    ?>
                    <div class="detail col-sm-12 col-md-6 col-lg-4">
                        <?php if ($detail_header) : echo "<h5>".$detail_header."</h5>"; endif; ?>
                        <?php if ($detail_info) : echo "<p>".$detail_info."</p>"; endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if ($link) : ?>
                <a href="<?php echo esc_url($link); ?>">
                    <button><?php echo $linkTitle; ?></button>
                </a>
                <?php endif; ?>
                <?php if ($has_images) : ?>
                <div class="row images">
                    <?php foreach($bottom_image as $image): ?>
                        <div class="image-wrapper <?php echo $imageWidthText; ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Groove Block Image'; ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>