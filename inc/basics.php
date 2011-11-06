<?php

class Basics {
	
	static function init() {
		load_theme_textdomain('basics', get_template_directory() . '/lang');
	}
	
	static function setup() {
		load_theme_textdomain('basics', get_template_directory() . '/lang');
		
		add_theme_support('post-thumbnails');
		
		add_theme_support('menus');
		register_nav_menus(array(
			'primary_navigation' => __('Primary Navigation', 'basics'),
			'utility_navigation' => __('Utility Navigation', 'basics')
		));
	}
	
	static function nav_menu_dropdown_filter($items) {
		$dom = new DOMDocument();
		$dom->loadHTML($items);
		
		if ($nodes = $dom->getElementsByTagName('ul')) {
			for ($i = 0; $i < $nodes->length; $i++) {
				$node = $nodes->item($i);
				
				$class = $node->getAttribute('class');
				$node->setAttribute('class',$class . ' dropdown-menu');
				
				$parent = $node->parentNode;
				
				$class = $parent->getAttribute('class');
				$parent->setAttribute('class',$class . ' dropdown');
				
				for ($x = 0; $x < $parent->childNodes; $x++) {
					
					$child = $parent->childNodes->item($x);
					
					if ($child->nodeType != XML_ELEMENT_NODE) {
						continue;
					}
					
					if ($name = $child->nodeName == 'a') {
						$class = $child->getAttribute('class');
						$child->setAttribute('class',$class . ' dropdown-toggle');
						break;
					}
					
				}
				
			}
		}
		
		$items = $dom->saveHTML();
		return preg_replace('/.*?body\>(.*)\<\/body.*/si','$1',$items);
	}
	
	static function hooks() {
		add_action('generate_rewrite_rules', 	array('Basics','rewrite_rules'));
		add_action('mod_rewrite_rules', 		array('Basics','htaccess_rules'));
		add_action('admin_init', 				array('Basics','flush_rewrites'));
		add_action('init', 						array('Basics','init'));
		
		add_action('after_setup_theme', array('Basics', 'setup'));
		
		add_filter('wp_nav_menu_items', array('Basics', 'nav_menu_dropdown_filter'));
		
		$sidebars = array('Sidebar', 'Footer');
		foreach ($sidebars as $sidebar) {
			register_sidebar(array('name'=> $sidebar,
				'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="container">',
				'after_widget' => '</div></article>',
				'before_title' => '<h3>',
				'after_title' => '</h3>'
			));
		}
	}
	
	static function body_class() {
		$term = get_queried_object();
		if (is_single())
			$cat = get_the_category();
		if(!empty($cat))
			return $cat[0]->slug;
		elseif(isset($term->slug))
			return $term->slug;
		elseif(isset($term->page_name))
			return $term->page_name;
		elseif(isset($term->post_name))
			return $term->post_name;
		else
			return;
	}
	
	static function get_browser() {
		
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		
		$known = array(
			'msie', 'firefox','chrome', 'safari', 'webkit', 'opera', 'netscape',
			'konqueror', 'gecko', 'googlebot', 'googlebot-image', 'ask', 'msnbot-products'
		);
		
		$pattern = '#(?<browser>' . join('|', $known) .
		  ')[/ ]+(?<version>[0-9]+(?:\[0-9]+)?)#i';
		  
		if (!preg_match_all($pattern, $agent, $matches)) return 'browser_unknown';
		
		if($key = array_search('chrome', $matches['browser'])) {
			return array('name'=> $matches['browser'][$key], 'version' => $matches['version'][$key]);
		}
		
		$i = count($matches['browser'])-1;
		return 'browser_' . $matches['browser'][$i] . ' version_' . $matches['version'][$i];
		
	}
	
	static function language_attributes() {
		$attributes = array();
		$output = '';
		if (function_exists('is_rtl')) {
			if (is_rtl() == 'rtl') {
				$attributes[] = 'dir="rtl"';
			}
		}
		
		$lang = get_bloginfo('language');
		if ($lang && $lang !== 'en-US') {
			$attributes[] = "lang=\"$lang\"";
		} else {
			$attributes[] = 'lang="en"';
		}
	
		$output = implode(' ', $attributes);
		return $output;
	}
	
	static function rewrite_rules($content) {
		$theme_name = next(explode('/themes/', get_stylesheet_directory()));
		global $wp_rewrite;
		$new_non_wp_rules = array(
			'less/(.*)'      => 'wp-content/themes/'. $theme_name . '/less/$1',
			'js/(.*)'       => 'wp-content/themes/'. $theme_name . '/js/$1',
			'img/(.*)'      => 'wp-content/themes/'. $theme_name . '/img/$1',
			'plugins/(.*)'  => 'wp-content/plugins/$1'
		);
		$wp_rewrite->non_wp_rules += $new_non_wp_rules;
	}
	
	static function htaccess_rules($rules) {
		global $wp_filesystem;
	
		if (!defined('FS_METHOD')) define('FS_METHOD', 'direct');
		if (is_null($wp_filesystem)) WP_Filesystem(array(), ABSPATH);
		
		if (!defined('WP_CONTENT_DIR'))
		define('WP_CONTENT_DIR', ABSPATH . 'wp-content');	
	
		$theme_name = next(explode('/themes/', get_template_directory()));
		$filename = WP_CONTENT_DIR . '/themes/' . $theme_name . '/inc/h5bp-htaccess';
	
		$rules .= $wp_filesystem->get_contents($filename);
		
		return $rules;
	}
	
	static function flush_rewrites() {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}
	
}

Basics::hooks();