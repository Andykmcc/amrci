<?php
/**
 * WP-Property Overview Template
 *
 * To customize this file, copy it into your theme directory, and the plugin will
 * automatically load your version.
 *
 * You can also customize it based on property type.  For example, to create a custom
 * overview page for 'building' property type, create a file called property-overview-building.php
 * into your theme directory.
 *
 *
 * Settings passed via shortcode:
 * $properties: either array of properties or false
 * $show_children: default true
 * $thumbnail_size: slug of thumbnail to use for overview page
 * $thumbnail_sizes: array of image dimensions for the thumbnail_size type
 * $fancybox_preview: default loaded from configuration
 * $child_properties_title: default "Floor plans at location:"
 *
 *
 *
 * @version 1.4
 * @author Andy Potanin <andy.potnain@twincitiestech.com>
 * @package WP-Property
*/?>
<?php
if ( have_properties() ) {
    $thumbnail_dimentions = WPP_F::get_image_dimensions($wpp_query['thumbnail_size']);
?>

  <?php foreach ( returned_properties('load_gallery=false') as $property) {  ?>

    <div class='row overview-item'>
        <div class='col-md-12'>
            <h4>
                <a <?php echo $in_new_window; ?> href="<?php echo $property['permalink']; ?>"><strong><?php echo $property['post_title']; ?></strong></a>
                <?php if($property['is_child']): ?>
                    of <a <?php echo $in_new_window; ?> href='<?php echo $property['parent_link']; ?>'><?php echo $property['parent_title']; ?></a>
                <?php endif; ?>
            </h4>
            <div>
            <?php property_overview_image_MODIFIED(); ?>
            </div>
            <?php if($property['custom_attribute_overview'] || $property['tagline']): ?>
                <p class="overview-tagline">
                    <?php if($property['custom_attribute_overview']): ?>
                        <?php echo $property['custom_attribute_overview']; ?>
                    <?php elseif($property['tagline']): ?>
                        <?php echo $property['tagline']; ?>
                    <?php endif; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <?php } /** end of the propertyloop. */ ?>
    
<?php } else {  ?>
<div class="wpp_nothing_found">
   <p><?php echo sprintf(__('Sorry, no properties found - try expanding your search, or <a href="%s">view all</a>.','wpp'), site_url().'/'.$wp_properties['configuration']['base_slug']); ?></p>
</div>
<?php } ?>