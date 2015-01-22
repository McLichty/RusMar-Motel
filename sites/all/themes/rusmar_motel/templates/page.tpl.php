<?php
// $Id: page.tpl.php,v 1.1.2.2.4.2 2011/01/11 01:08:49 dvessel Exp $
?>
<div id="page" class="container-32 clearfix">

	<div id="site-header" class="grid-12 clearfix">
		<div id="branding" class="grid-12 clearfix">
			<?php if ($linked_logo_img): ?>
			<span id="logo" class=""><?php print $linked_logo_img; ?></span>
			<?php endif; ?>
			<?php if ($linked_site_name): ?>
			<h1 id="site-name" class="grid-3 omega"><?php print $linked_site_name; ?></h1>
			<?php endif; ?>
			<?php if ($site_slogan): ?>
			<div id="site-slogan" class="grid-3 omega"><?php print $site_slogan; ?></div>
			<?php endif; ?>
		</div>
		<?php if ($page['search_box']): ?>
		<div id="search-box" class="grid-6 prefix-10"><?php print render($page['search_box']); ?></div>
		<?php endif; ?>
		<?php if ($main_menu_links): ?>
		<div id="site-menu" class="grid-12 clearfix">
			<?php print $main_menu_links; ?>
		</div>
		<?php endif; ?>
		<?php if ($page['sidebar_first']): ?>
		<div id="sidebar-left" class="column sidebar region grid-12">
			<?php print render($page['sidebar_first']); ?>
		</div> <?php /* /#sidebar-left */?>
		<?php endif; ?>
		<img src="<?php echo base_path() . path_to_theme(); ?>/img/graphics/palmtree_L.png" title="Palm tree to the left" class="palmtree_L" />
	</div> <?php /* /#site-header */?>
	
	<div class="column <?php print ns('grid-20'); ?>">
		<div id="main-content-top" class="clearfix">
			<?php if($page['promotion_alpha']): ?>
			<div id="promotion-alpha" class="grid-10 alpha">
				<?php print render($page['promotion_alpha']); ?>
			</div>
			<?php endif; ?>
			<div id="promotion-omega" class="grid-10 omega <?php echo ns('prefix-10', $page['promotion_alpha'], 10); ?>">
				<?php /*?><a href="http://www.bringfido.com/lodging/152394/" title="Bring Fido"><img src="<?php echo base_path() . path_to_theme(); ?>/img/logos/pet_friendly.png" /></a><?php */?>
				<!--url's used in the movie-->
				<!--text used in the movie-->
				<!-- saved from url=(0013)about:internet -->
				<script language="JavaScript" type="text/javascript">
					AC_FL_RunContent(
						'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0',
						'width', '273',
						'height', '108',
						'src', '<?php echo base_path() . path_to_theme(); ?>/img/logos/pets_allowed',
						'quality', 'high',
						'pluginspage', 'http://www.adobe.com/go/getflashplayer',
						'align', 'middle',
						'play', 'true',
						'loop', 'true',
						'scale', 'showall',
						'wmode', 'transparent',
						'devicefont', 'false',
						'id', 'pets_allowed',
						'bgcolor', '#ffffff',
						'name', 'pets_allowed',
						'menu', 'true',
						'allowFullScreen', 'false',
						'allowScriptAccess','sameDomain',
						'movie', '<?php echo base_path() . path_to_theme(); ?>/img/logos/pets_allowed',
						'salign', ''
						); //end AC code
				</script>
				<noscript>
					<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="273" height="108" id="pets_allowed" align="middle">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="allowFullScreen" value="false" />
					<param name="movie" value="<?php echo base_path() . path_to_theme(); ?>/img/logos/pets_allowed.swf" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" />	<embed src="<?php echo base_path() . path_to_theme(); ?>/img/logos/pets_allowed.swf" quality="high" wmode="transparent" bgcolor="#ffffff" width="273" height="108" name="pets_allowed" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" />
					</object>
				</noscript>
			</div>
		</div>
		<?php if ($secondary_menu_links): ?>
		<div id="site-utility-menu">
			<?php print $secondary_menu_links; ?>
		</div>
		<?php endif; ?>
		<?php if ($page['highlighted'] || $page['header']): ?>
		<div id="site-subheader" class="prefix-1 suffix-1 clearfix">
			<?php if ($page['highlighted']): ?>
			<div id="highlighted" class="<?php print ns('grid-14', $page['header'], 7); ?>">
				<?php print render($page['highlighted']); ?>
			</div>
			<?php endif; ?>
			
			<?php if ($page['header']): ?>
			<div id="header-region" class="region <?php print ns('grid-14', $page['highlighted'], 7); ?> clearfix">
				<?php print render($page['header']); ?>
			</div>
			<?php endif; ?>
		</div> <?php /* /#site-subheader */?>
		<?php endif; ?>
		<div id="main">
			<?php if ($tabs): ?>
			<div class="tabs"><?php print render($tabs); ?></div>
			<?php endif; ?>
			<?php print $breadcrumb; ?>
	
			<?php print render($title_prefix); ?>
			<?php if ($title): ?>
			<h1 class="title" id="page-title"><?php print $title; ?></h1>
			<?php endif; ?>
			<?php print render($title_suffix); ?>      
			<div id="main-content" class="region clearfix">
				<?php print $messages; ?>
				<?php print render($page['help']); ?>
				<?php print render($page['content']); ?>
			</div>
		
			<?php print $feed_icons; ?>
		</div> <?php /* /#main */?>
		<img src="<?php echo base_path() . path_to_theme(); ?>/img/graphics/palmtree_R.png" title="Palm tree to the right" class="palmtree_R" />
	</div>

	<?php if ($page['sidebar_second']): ?>
	<div id="sidebar-right" class="column sidebar region grid-8">
		<?php print render($page['sidebar_second']); ?>
	</div> <?php /* /#sidebar-right */?>
	<?php endif; ?>

	<div id="footer" class="">
		<?php if ($page['footer']): ?>
		<div id="footer-region" class="region grid-32 clearfix">
			<?php print render($page['footer']); ?>
		</div>
		<?php endif; ?>
	</div> <?php /* /#footer */?>

</div>