<?php
/**
 * Plugin Name: WordPress Plugin Template
 * Plugin URI:  http://www.ocean-internet.co.uk/wordpress/plugins/wordpress-plugin-template
 * Description: Template for developing OOP WordPress plugins.
 * Version:     0.0.4
 * Author:      Andy Weir <andy@ocean-internet.co.uk>
 * Author URI:  http://www.ocean-internet.co.uk
 * Licence:     GPL2
 */

/*  Copyright 2013  Andy Weir  (email : andy@ocean-internet.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once "includes/PluginTemplate.php";
$PluginTemplate = new PluginTemplate;

// Add Options Menu to /wp-admin
add_action('admin_menu', array($PluginTemplate, 'addOptionsMenu'));