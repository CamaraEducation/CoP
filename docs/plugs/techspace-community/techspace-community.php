<?php
/**
@package techspace-community 

*/


/*
Plugin Name: Techspace Community
Plugin URI: http:/membership.camaraireland.ie
Description: Membership Plugin 
Version: 1.0.0
Author: Camara PDC
License: GPLv2 or later
Text Domain: techspace-docummunity 
*/

if( ! defined('ABSPATH')) {
	die;
}

class TechspaceCommmunity
	{

function activate(){
	

	}
	
	function deactivate(){
		
	}
	
	
	function uninstall(){
	
	}
	
	}
	
	
	
if(class_exists('TechspaceCommmunity')){
$techspaceplugin = new TechspaceCommmunity();
}

//activation
register_activation_hook(__FILE__,array($techspaceplugin,'activate'));

//deactivate
register_deactivation_hook(__FILE__,array($techspaceplugin,'deactivate'));

//uninstall

