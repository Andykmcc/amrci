</div>
<footer role="contentinfo" class='container'>
    <div id="inner-footer" class="">
	<hr />
        <div id="widget-footer" class="clearfix row">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
            <?php endif; ?>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
            <?php endif; ?>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
            <?php endif; ?>
        </div>
					
		<nav class="clearfix">
			<?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
		</nav>

        <div class="row">
			<div class="col-xs-12 col-3-sm col-3-md col-3-lg">
				<p class="attribution pull-right">&copy; 2013 <?php bloginfo('name'); ?></p>
			</div>

		</div> <!-- end #inner-footer -->
	</div> <!-- end #container -->
</footer> <!-- end footer -->
    		
    		
    				
    <!--[if lt IE 7 ]>
    	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
    <![endif]-->

    <?php wp_footer(); // js scripts are inserted using this function ?>

</body>

</html>