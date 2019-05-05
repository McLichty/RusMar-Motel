<?php
// $Id: template.php,v 1.1.2.6.4.2 2011/01/11 01:08:49 dvessel Exp $

/**
 * The default group for NineSixty framework CSS files added to the page.
 */
define('CSS_NS_FRAMEWORK', -200);

// Call in 'ctools_cleanstring()' if ctools is active
if(module_exists('ctools')){
	define('RUSMAR_MOTEL_CTOOLS_PATH', drupal_get_path('module', 'ctools'));
	include RUSMAR_MOTEL_CTOOLS_PATH . '/includes/cleanstring.inc';
}

/**
 * Implements hook_preprocess_html
 */
function rusmar_motel_preprocess_html(&$vars) {
	// 'show-grid' turns on the grid
	//$vars['classes_array'][] = 'show-grid';
	if (module_exists('rdf')) {
		$vars['doctype'] = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+RDFa 1.1//EN">' . "\n";
		$vars['rdf']->version = ' version="HTML+RDFa 1.1"';
		$vars['rdf']->namespaces = $vars['rdf_namespaces'];
		$vars['rdf']->profile = ' profile="' . $vars['grddl_profile'] . '"';
	} else {
		$vars['doctype'] = '<!DOCTYPE html>' . "\n";
		$vars['rdf']->version = '';
		$vars['rdf']->namespaces = '';
		$vars['rdf']->profile = '';
	}
}
/**
 * Preprocessor for field.tpl.php template file.
 */
function rusmar_motel_preprocess_field(&$vars, $hook) {
	if($vars['element']['#field_name'] == 'body') {
		$vars['is_main_content'] = true; // when this is set to TRUE, all field divs are hidden
	}else{
		$vars['is_main_content'] = false;
	}
}
//function rusmar_motel_preprocess_views_view(&$vars) {
//	dpm($vars);
//}
/**
 * Preprocessor for block.tpl.php template file.
 */
function rusmar_motel_preprocess_block(&$vars, $hook) {
	// if ctools active, add the block title as a class to the block
	if(RUSMAR_MOTEL_CTOOLS_PATH) {
		/**
		 * The default ignore word list.
		 */
		$ignore_words = 'a, an, as, at, before, but, by, for, from, is, in, into, like, of, off, on, onto, per, since, than, the, this, that, to, up, via, with';
		$settings = array(
			'clean slash' => TRUE,
			'ignore words' => $ignore_words,
			'separator' => '-',
			'replacements' => array(),
			'transliterate' => FALSE,
			'reduce ascii' => TRUE,
			'max length' => FALSE,
			'lower case' => TRUE,
		);
		// clean up title with 'ctools_cleanstring()'
		$title = ctools_cleanstring($vars['elements']['#block']->title, $settings);
//		dpm($vars['elements']);

		array_push($vars['classes_array'], $title);
	}
}
/**
 * Preprocessor for node.tpl.php template file.
 */
function rusmar_motel_preprocess_node(&$vars, $hook) {
	//dpm($vars);
}
/**
 * Preprocessor for page.tpl.php template file.
 */
function rusmar_motel_preprocess_page(&$vars, $hook) {

	// For easy printing of variables.
	$vars['logo_img'] = '';
	if (!empty($vars['logo'])) {
		$vars['logo_img'] = theme('image', array(
			'path'	=> $vars['logo'],
			'alt'	 => t('Home'),
			'title' => t('Home'),
		));
	}
	$vars['linked_logo_img']	= '';
	if (!empty($vars['logo_img'])) {
		$vars['linked_logo_img'] = l($vars['logo_img'], '<front>', array(
			'attributes' => array(
				'rel'	 => 'home',
				'title' => t('Home'),
			),
			'html' => TRUE,
		));
	}
	$vars['linked_site_name'] = '';
	if (!empty($vars['site_name'])) {
		$vars['linked_site_name'] = l($vars['site_name'], '<front>', array(
			'attributes' => array(
				'rel'	 => 'home',
				'title' => t('Home'),
			),
		));
	}

	// Site navigation links.
	$vars['main_menu_links'] = '';
	if (isset($vars['main_menu'])) {
		$vars['main_menu_links'] = theme('links__system_main_menu', array(
			'links' => $vars['main_menu'],
			'attributes' => array(
				'id' => 'main-menu',
				'class' => array('inline', 'main-menu'),
			),
			'heading' => array(
				'text' => t('Main menu'),
				'level' => 'h2',
				'class' => array('element-invisible'),
			),
		));
	}
	$vars['secondary_menu_links'] = '';
	if (isset($vars['secondary_menu'])) {
		$vars['secondary_menu_links'] = theme('links__system_secondary_menu', array(
			'links' => $vars['secondary_menu'],
			'attributes' => array(
				'id'		=> 'secondary-menu',
				'class' => array('inline', 'secondary-menu'),
			),
			'heading' => array(
				'text' => t('Secondary menu'),
				'level' => 'h2',
				'class' => array('element-invisible'),
			),
		));
	}

}
function rusmar_motel_links__system_main_menu(&$vars) {
//	foreach ($vars['links'] as &$link) {
		// do what you need here...
//		$link['title'] = '<span>' . $link['title'] . '</span>';
//		$link['html'] = TRUE;
//		$link['attributes']['class'] = $i;
//		$i++;
//	}
	return rusmar_motel_links($vars);
}
function rusmar_motel_links($variables) {
	$links = $variables['links'];
	$attributes = $variables['attributes'];
	$heading = $variables['heading'];
	global $language_url;
	$output = '';

	if (count($links) > 0) {
		$output = '';
		// Treat the heading first if it is present to prepend it to the
		// list of links.
		if (!empty($heading)) {
			if (is_string($heading)) {
				// Prepare the array that will be used when the passed heading
				// is a string.
				$heading = array(
					'text' => $heading,
					// Set the default level of the heading. 
					'level' => 'h2',
				);
			}
			$output .= '<' . $heading['level'];
			if (!empty($heading['class'])) {
				$output .= drupal_attributes(array('class' => $heading['class']));
			}
			$output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
		}
		$output .= '<ul' . drupal_attributes($attributes) . '>';

		$num_links = count($links);
		$i = 1;

		foreach ($links as $key => $link) {
			$class = array($key);

			// add a count number of the menu item
			$class[] = 'menu-item-' . $i;
			// Add first, last and active classes to the list of links to help out themers.
			if ($i == 1) {
				$class[] = 'first';
			}
			if ($i == $num_links) {
				$class[] = 'last';
			}
			if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
					 && (empty($link['language']) || $link['language']->language == $language_url->language)) {
				$class[] = 'active';
			}
			$output .= '<li' . drupal_attributes(array('class' => $class)) . '>';
			if (isset($link['href'])) {
				// Pass in $link as $options, they share the same keys.
				$output .= l($link['title'], $link['href'], $link);
			}
			elseif (!empty($link['title'])) {
				// Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
				if (empty($link['html'])) {
					$link['title'] = check_plain($link['title']);
				}
				$span_attributes = '';
				if (isset($link['attributes'])) {
					$span_attributes = drupal_attributes($link['attributes']);
				}
				$output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
			}
			$i++;
			$output .= "</li>\n";
		}
		$output .= '</ul>';
	}
	return $output;
}
/**
 * Contextually adds 960 Grid System classes.
 *
 * The first parameter passed is the *default class*. All other parameters must
 * be set in pairs like so: "$variable, 3". The variable can be anything available
 * within a template file and the integer is the width set for the adjacent box
 * containing that variable.
 *
 *	class="<?php print ns('grid-16', $var_a, 6); ?>"
 *
 * If $var_a contains data, the next parameter (integer) will be subtracted from
 * the default class. See the README.txt file.
 */
function ns() {
	$args = func_get_args();
	$default = array_shift($args);
	// Get the type of class, i.e., 'grid', 'pull', 'push', etc.
	// Also get the default unit for the type to be procesed and returned.
	list($type, $return_unit) = explode('-', $default);

	// Process the conditions.
	$flip_states = array('var' => 'int', 'int' => 'var');
	$state = 'var';
	foreach ($args as $arg) {
		if ($state == 'var') {
			$var_state = !empty($arg);
		}
		elseif ($var_state) {
			$return_unit = $return_unit - $arg;
		}
		$state = $flip_states[$state];
	}

	$output = '';
	// Anything below a value of 1 is not needed.
	if ($return_unit > 0) {
		$output = $type . '-' . $return_unit;
	}
	return $output;
}

/**
 * Implements hook_css_alter.
 * 
 * This rearranges how the style sheets are included so the framework styles
 * are included first.
 *
 * Sub-themes can override the framework styles when it contains css files with
 * the same name as a framework style. This mirrors the behavior of the 6--1
 * release of NineSixty warts and all. Future versions will make this obsolete.
 */
function rusmar_motel_css_alter(&$css) {
	global $theme_info, $base_theme_info;

	// Dig into the framework .info data.
	$framework = !empty($base_theme_info) ? $base_theme_info[0]->info : $theme_info->info;

	// Ensure framework CSS is always first.
	$on_top = CSS_NS_FRAMEWORK;

	// Pull framework styles from the themes .info file and place them above all stylesheets.
	if (isset($framework['stylesheets'])) {
		foreach ($framework['stylesheets'] as $media => $styles_from_960) {
			foreach ($styles_from_960 as $style_from_960) {
				// Force framework styles to come first.
				if (strpos($style_from_960, 'framework') !== FALSE) {
					$css[$style_from_960]['group'] = $on_top;
					// Handle styles that may be overridden from sub-themes.
					foreach (array_keys($css) as $style_from_var) {
						if ($style_from_960 != $style_from_var && basename($style_from_960) == basename($style_from_var)) {
							$css[$style_from_var]['group'] = $on_top;
						}
					}
				}
			}
		}
	}
}
