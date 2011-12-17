<?php
/*
Plugin Name: Members List with advanced features
Plugin URI: https://github.com/Sohag07Hasan
Description: List your members with pagination and search capabilities.
Author: Matthew Praetzel edit by Mahibul Hasan
Version: 3.5.4
Author URI: http://sohag07hasan.elance.com/
Licensing : http://www.gnu.org/licenses/gpl-3.0.txt
*/

////////////////////////////////////////////////////////////////////////////////////////////////////
//
//		File:
//			init.php
//		Description:
//			This file initializes the Wordpress Plugin - Members List Plugin
//		Actions:
//			1) list members
//			2) search through members
//			3) perform administrative actions
//		Date:
//			Added on January 29th 2009
//		Version:
//			3.5.4
//		Copyright:
//			Copyright (c) 2010 Matthew Praetzel.
//		License:
//			This software is licensed under the terms of the GNU Lesser General Public License v3
//			as published by the Free Software Foundation. You should have received a copy of of
//			the GNU Lesser General Public License along with this software. In the event that you
//			have not, please visit: http://www.gnu.org/licenses/gpl-3.0.txt
//
////////////////////////////////////////////////////////////////////////////////////////////////////

/****************************************Commence Script*******************************************/

//                                *******************************                                 //
//________________________________** ADD EVENTS                **_________________________________//
//////////////////////////////////**                           **///////////////////////////////////
//                                **                           **                                 //
//                                *******************************                                 //
//register_activation_hook(__FILE__,'');
//                                *******************************                                 //
//________________________________** INCLUDES                  **_________________________________//
//////////////////////////////////**                           **///////////////////////////////////
//                                **                           **                                 //
//                                ******************************* 
                               
define('MEMEBERS',plugins_url('',__FILE__));                               
require_once(dirname(__FILE__).'/conf.php');

/****************************************Terminate Script******************************************/
?>
