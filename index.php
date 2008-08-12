<?php

	/**
	 * Elgg index page for web-based applications
	 * 
	 * @package Elgg
	 * @subpackage Core
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	/**
	 * Start the Elgg engine
	 */
		require_once(dirname(__FILE__) . "/engine/start.php");
		
		
		if (!trigger_plugin_hook('index','system',null,false)) {
	
			/**
		      * Check to see if user is logged in, if not display login form
		      **/
				
				if (isloggedin()) forward('pg/dashboard');
			
	        //Load the front page
	        	global $CONFIG;
	        	$title = elgg_view_title($CONFIG->site->title);
	        	set_context('search');
		        $content = list_registered_entities();
		        set_context('main');
		        global $autofeed;
		        $autofeed = false;
		        $content = elgg_view_layout('two_column_left_sidebar', '', $content, elgg_view("account/forms/login"));
		        echo page_draw(null, $content);
		
		}



?>