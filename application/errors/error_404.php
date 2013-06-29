<?php

	$CI =& get_instance();
	
	$CI->data['subview'] = 'error_404_view';
	$CI->load->view('_layout_main', $CI->data);