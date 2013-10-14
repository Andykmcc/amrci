<?php
/**
 * Property Default Template for Single Property View
 *
 * Overwrite by creating your own in the theme directory called either:
 * property.php
 * or add the property type to the end to customize further, example:
 * property-building.php or property-floorplan.php, etc.
 *
 * By default the system will look for file with property type suffix first,
 * if none found, will default to: property.php
 *
 * Copyright 2010 Andy Potanin <andy.potanin@twincitiestech.com>
 *
 * @version 1.3
 * @author Andy Potanin <andy.potnain@twincitiestech.com>
 * @package WP-Property
*/

// Uncomment to disable fancybox script being loaded on this page
//wp_deregister_script('wpp-jquery-fancybox');
//wp_deregister_script('wpp-jquery-fancybox-css');
?>

<?php get_header(); ?>
<?php the_post(); ?>

<script type="text/javascript">
    var map;
    var marker;
    var infowindow;

    jQuery(document).ready(function() {

      if(typeof jQuery.fn.fancybox == 'function') {
        jQuery("a.fancybox_image, .gallery-item a").fancybox({
          'transitionIn'  :  'elastic',
          'transitionOut'  :  'elastic',
          'speedIn'    :  600,
          'speedOut'    :  200,
          'overlayShow'  :  false
        });
      }

      if(typeof google == 'object') {
        initialize_this_map();
      } else {
        jQuery("#property_map").hide();
      }

    });


  function initialize_this_map() {
    <?php if($coords = WPP_F::get_coordinates()): ?>
    var myLatlng = new google.maps.LatLng(<?php echo $coords['latitude']; ?>,<?php echo $coords['longitude']; ?>);
    var myOptions = {
      zoom: <?php echo (!empty($wp_properties['configuration']['gm_zoom_level']) ? $wp_properties['configuration']['gm_zoom_level'] : 13); ?>,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    map = new google.maps.Map(document.getElementById("property_map"), myOptions);

    infowindow = new google.maps.InfoWindow({
      content: '<?php echo WPP_F::google_maps_infobox($post); ?>',
      maxWidth: 500
    });

     marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: '<?php echo addslashes($post->post_title); ?>',
      icon: '<?php echo apply_filters('wpp_supermap_marker', '', $post->ID); ?>'
    });

    google.maps.event.addListener(infowindow, 'domready', function() {
    document.getElementById('infowindow').parentNode.style.overflow='hidden';
    document.getElementById('infowindow').parentNode.parentNode.style.overflow='hidden';
   });

   setTimeout("infowindow.open(map,marker);",1000);

    <?php endif; ?>
  }
</script>

<div class='row'>
    <div class='col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-9 col-lg-offset-3'>

        <div id="container" class="<?php wpp_css('property::container', array((!empty($post->property_type) ? $post->property_type . "_container" : ""))); ?>">
            <div id="content" class="<?php wpp_css('property::content', "property_content"); ?>" role="main">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="<?php wpp_css('property::title', "building_title_wrapper"); ?>">
                        <h1 class="property-title entry-title"><?php the_title(); ?></h1>
                        <h3 class="entry-subtitle"><?php the_tagline(); ?></h3>
                    </div>
                    <?php 
                    if ( has_post_thumbnail() ) { ?>
                    <p>
                        <?php the_post_thumbnail('full'); ?>
                    </p>
                    <?php 
                    } 
                    ?>
                    
                    <div class="<?php wpp_css('property::entry_content', "entry-content"); ?>">
                        <div class="<?php wpp_css('property::the_content', "wpp_the_content"); ?>"><?php @the_content(); ?></div>

                        <?php if(!empty($wp_properties['taxonomies'])) foreach($wp_properties['taxonomies'] as $tax_slug => $tax_data): ?>
                            <?php if(get_features("type={$tax_slug}&format=count")):  ?>
                                <div class="<?php echo $tax_slug; ?>_list">
                                    <h2><?php echo $tax_data['label']; ?></h2>
                                    <ul class="clearfix">
                                        <?php get_features("type={$tax_slug}&format=list&links=true"); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php if(is_array($wp_properties['property_meta'])): ?>
                            <?php foreach($wp_properties['property_meta'] as $meta_slug => $meta_title):
                              if(empty($post->$meta_slug) || $meta_slug == 'tagline')
                                continue;
                            ?>
                                <h2><?php echo $meta_title; ?></h2>
                                <p><?php echo  do_shortcode(html_entity_decode($post->$meta_slug)); ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>


                        <?php if(WPP_F::get_coordinates()): ?>
                            <div id="property_map" class="<?php wpp_css('property::property_map'); ?>" style="width:100%; height:450px"></div>
                        <?php endif; ?>

                        <?php if($post->post_parent): ?>
                            <a href="<?php echo $post->parent_link; ?>" class="<?php wpp_css('btn', "btn btn-return"); ?>"><?php _e('Return to building page.','wpp') ?></a>
                        <?php endif; ?>

                    </div><!-- .entry-content -->
                </div><!-- #post-## -->
            </div><!-- #content -->
        </div><!-- #container -->
    </div>
</div>

<?php get_footer(); ?>