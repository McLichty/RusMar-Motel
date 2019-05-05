<?php
?><!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<head>
	<?php print $head; ?>
	<title><?php print $head_title; ?></title>
	<!-- Only load main CSS files if greater the ie6 -->
	<!--[if ! lte IE 6]><!-->
	<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
	<?php print $styles; ?>
	<!--<![endif]-->
	<!--[if lte IE 6]>
	<link rel="stylesheet" href="http://universal-ie6-css.googlecode.com/files/ie6.1.1.css" media="screen, projection">
	<![endif]-->
	<?php print $scripts; ?>
	<!--[if lt IE 9]><link href='sites/all/themes/rusmar_motel/css/ie.css' rel='stylesheet' type='text/css'><![endif]-->
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
	<div id="skip-link">
		<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
	</div>

	<?php print $page_top; ?>

	<div id="page" class="container-32 clearfix">
	
		<div id="site-header" class="grid-12 clearfix">
			<div id="branding" class="grid-12 clearfix">
				<?php if ($logo): ?>
				<img id="logo" src="<?php print $logo ?>" alt="<?php print $site_name ?>" />
				<?php endif; ?>
				<?php /* if ($title): ?><h1 id="site-name" class="page-title grid-3 omega"><?php print $title; ?></h1><?php endif; */ ?>
				<?php if ($site_slogan): ?>
				<div id="site-slogan" class="grid-3 omega"><?php print $site_slogan; ?></div>
				<?php endif; ?>
			</div>
			<?php if ($sidebar_first): ?>
			<div id="sidebar-left" class="column sidebar region grid-12">
				<?php print $sidebar_first; ?>
			</div> <?php /* /#sidebar-left */?>
			<?php endif; ?>
			<img src="<?php echo base_path() . path_to_theme(); ?>/img/graphics/palmtree_L.png" title="Palm tree to the left" class="palmtree_L" />
		</div> <?php /* /#site-header */?>
		
		<div class="column <?php print ns('grid-20'); ?>">
			<div id="main-content-top" class="clearfix">
				<?php if($promotion_alpha): ?>
				<div id="promotion-alpha" class="grid-10 alpha">
					<?php print $promotion_alpha; ?>
				</div>
				<?php endif; ?>
				<div id="promotion-omega" class="grid-10 omega <?php echo ns('prefix-10', $promotion_alpha, 10); ?>">
					<img src="<?php echo base_path() . path_to_theme(); ?>/img/logos/pet_friendly.png" />
				</div>
			</div>
			<?php if ($highlighted || $header): ?>
			<div id="site-subheader" class="prefix-1 suffix-1 clearfix">
				<?php if ($highlighted): ?>
				<div id="highlighted" class="<?php print ns('grid-14', $header, 7); ?>">
					<?php print $highlighted; ?>
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
					<?php print $help; ?>
					<?php print $content; ?>
				</div>
			
				<?php print $feed_icons; ?>
			</div> <?php /* /#main */?>
			<img src="<?php echo base_path() . path_to_theme(); ?>/img/graphics/palmtree_R.png" title="Palm tree to the right" class="palmtree_R" />
		</div>
	
		<?php if ($sidebar_second): ?>
		<div id="sidebar-right" class="column sidebar region grid-8">
			<?php print $sidebar_second; ?>
		</div> <?php /* /#sidebar-right */?>
		<?php endif; ?>
	
		<div id="footer" class="">
			<?php if ($footer): ?>
			<div id="footer-region" class="region grid-32 clearfix">
				<?php print $footer; ?>
			</div>
			<?php endif; ?>
		</div> <?php /* /#footer */?>
	
	</div>
	<?php print $page_bottom; ?>

</body>
</html>
