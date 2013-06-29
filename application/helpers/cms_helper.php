<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Dump Helper
 * Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if ( ! function_exists('dump')) {
	function dump ($var, $label = 'Dump', $echo = TRUE)
	{
		// Store dump in variable 
		ob_start();
		var_dump($var);
		$output = ob_get_clean();
		
		// Add formatting
		$output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
		$output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
		
		// Output
		if ($echo == TRUE) {
			echo $output;
		}
		else {
			return $output;
		}
	}
}

if ( ! function_exists('dump_exit')) {
	function dump_exit($var, $label = 'Dump', $echo = TRUE) {
		dump ($var, $label, $echo);
		exit;
	}
}

// ------------------------------------------------------------------------

/**
 * Add Meta Title
 *
 * 
 *
 * @access	public
 * @param	string
 * @return	void
 */
if ( ! function_exists('add_meta_title')) {
	function add_meta_title($str)
	{
		$CI =& get_instance();
		$CI->data['meta_title'] = e($str) . ' - ' . $CI->data['meta_title'];
	}
}

// ------------------------------------------------------------------------

/**
 * Get Meta Data
 *
 * 
 *
 * @access	public
 * @param	array
 * @return	void
 */
if ( ! function_exists('get_meta_data')) {
	function get_meta_data($article)
	{
		$CI =& get_instance();
		$meta = '<meta property="og:site_name" content="' . $CI->config->item('site_name') . '">' . PHP_EOL;
		$meta .= '<meta property="og:title" content="' . $CI->data['meta_title'] . '">' . PHP_EOL;
		$meta .= '<meta property="og:description" content="' . e(limit_to_numwords(strip_tags($article->body), 25)) . '">' . PHP_EOL;
		$meta .= '<meta property="og:url" content="' . site_url(article_link($article)) . '">' . PHP_EOL;
		$meta .= '<meta property="og:type" content="article">' . PHP_EOL;
		$meta .= '<meta property="og:image" content="'. site_url() . 'img/uploads/'. $article->filename . '">' . PHP_EOL;
		$meta .= '<meta name="keywords" content="' . e($article->tags) . '">' . PHP_EOL;
		$meta .= '<meta name="description" content="' . e(limit_to_numwords(strip_tags($article->body), 25)) . '">';
		$CI->data['meta_data'] = $meta;
	}
}

// ------------------------------------------------------------------------

/**
 * Edit Button
 *
 * 
 *
 * @access	public
 * @param	uri
 * @return	anchor
 */
if ( ! function_exists('btn_edit')) {
	function btn_edit($uri)
	{
		return anchor($uri, '<i class="icon-edit"></li>');
	}
}

/**
 * Delete Button
 *
 * 
 *
 * @access	public
 * @param	uri
 * @return	anchor
 */
if ( ! function_exists('btn_delete')) {
	function btn_delete($uri)
	{
		return anchor($uri, '<i class="icon-remove"></li>', 'data-toggle="modal"');
	}
}
if ( ! function_exists('delete_modal')) {
	function delete_modal($id, $title)
	{
		$link = site_url('/admin/articles/delete/' . $id);
		$str = '';
		$str .= '<div id="deleteModal' . $id . '" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
		$str .= '<div class="modal-header">';
		$str .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
		$str .= '<h3 id="myModalLabel">Confirm Delete</h3>';
		$str .= '</div>';
		$str .= '<div class="modal-body">';
		$str .= '<p>You are about to delete the article <strong>' . $title . '</strong>. This action cannot be undone. Are you sure?</p>';
		$str .= '</div>';
		$str .= '<div class="modal-footer">';
		$str .= '<a href="' . $link . '" role="button" class="btn btn-danger">Delete</a>';
		$str .= '<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>';
		$str .= '</div>';
		$str .= '</div>';
		return $str;
	}
}
// ------------------------------------------------------------------------

/**
 * Article Link
 *
 * 
 *
 * @access	public
 * @param	array
 * @return	string
 */
if ( ! function_exists('article_link')) {
	function article_link($article)
	{
		return 'articles/' . intval($article->id) . '/' . e($article->slug);
	}
}

/**
 * Article Links
 *
 * 
 *
 * @access	public
 * @param	array
 * @return	string
 */
if ( ! function_exists('article_links')) {
	function article_links($articles)
	{
		$str = '<ul>';
		foreach ($articles as $article)
		{
			$url = article_link($article);
			$str .= '<li>';
			$str .= '<h3>' . anchor($url, e($article->title)) . ' ></h3>';
			$str .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
			$str .= '</li>';
		}
		$str .= '</ul>';
		return $str;
	}
}

// ------------------------------------------------------------------------

/**
 * Get Excerpt
 *
 * 
 *
 * @access	public
 * @param	array
 * @return	string
 */
if ( ! function_exists('get_excerpt')) {
	function get_excerpt($article, $numwords = 30)
	{
		$str = '';
		$url = 'articles/' . intval($article->id) . '/' . e($article->slug);
		$str .= '<h1>' . anchor($url, e($article->title)) . '</h1>';
		$str .= '<h4>' . date('F jS, Y', strtotime($article->pubdate)) . '</h4>';
		$str .= '<p>' . e(limit_to_numwords(strip_tags($article->body), $numwords)) . anchor($url, ' {...}', array('title' => e($article->title))) . '</p>';
		return $str;
	}
}

/**
 * Limit Words
 *
 * 
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('limit_to_numwords')) {
	function limit_to_numwords($str, $numwords)
	{
		$excerpt = explode(' ', $str, $numwords + 1);
		if (count($excerpt) >= $numwords) {
			array_pop($excerpt);
		}

		$excerpt = implode(' ', $excerpt);
		return $excerpt;
	}
}

// ------------------------------------------------------------------------

/**
 * Escape
 *
 * 
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('e')) {
	function e($str)
	{
		return htmlentities($str);
	}
}

// ------------------------------------------------------------------------

/**
 * Get Menu
 *
 * 
 *
 * @access	public
 * @param	array
 * @return	string
 */
if ( ! function_exists('get_menu')) {
	function get_menu($array, $child = FALSE)
	{
		$CI =& get_instance();
		$str = '';

		if (count($array))
		{
			$str .= $child == FALSE ? '<ul class="menu">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;

			foreach ($array as $item) {
				
				$active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;

				if (isset($item['children']) && count($item['children']))
				{
					$str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
					$str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="' . site_url(e($item['slug'])) . '">' . e($item['title']);
					$str .= '<b class="caret"></b></a>' . PHP_EOL;
					$str .= get_menu($item['children'], TRUE);
				}
				else
				{
					$str .= $active ? '<li class="active">' : '<li>';
					$str .= $item['slug'] === 'contact' ? '<a href="#contactModal" role="button" data-toggle="modal">' . e($item['title']) . '</a>' : '<a href="' . site_url(e($item['slug'])) . '">' . e($item['title']) . '</a>';
				}

				$str .= '</li>' . PHP_EOL;
			}

			$str .= '</ul>' . PHP_EOL;
		}

		return $str;
	}
}

// ------------------------------------------------------------------------

/**
 * Menu Anchor
 *
 * 
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('menu_anchor'))
{
	function menu_anchor($uri = '', $title = '')
	{
		$title = (string) $title;

		if ( ! is_array($uri))
		{
			$site_url = ( ! preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;
		}
		else
		{
			$site_url = site_url($uri);
		}

		if ($title == '')
		{
			$title = $site_url;
		}

		$current_url = ( ! empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		
		$attributes = ($site_url === $current_url) ? 'class="active"' : '';

		return '<li ' . $attributes . '><a href="' . $site_url . '">' . $title . '</a></li>';
	}
}