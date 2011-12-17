/**************************************************************************************************/
/*
/*		File:
/*			scripts.js
/*		Description:
/*			This file contains Javascript for the front-end aspects of the plugin.
/*		Date:
/*			Added on January 29th 2009
/*		Copyright:
/*			Copyright (c) 2009 Matthew Praetzel.
/*		License:
/*			License:
/*			This software is licensed under the terms of the GNU Lesser General Public License v3
/*			as published by the Free Software Foundation. You should have received a copy of of
/*			the GNU Lesser General Public License along with this software. In the event that you
/*			have not, please visit: http://www.gnu.org/licenses/gpl-3.0.txt
/*
/**************************************************************************************************/

/*-----------------------
	Initialize
-----------------------*/
(function($) {
		  
	$(document).ready(function () {
		
		$('#query').bind('focus',function (){
			if(this.value=='search...') { this.value='';$('#query').toggleClass('focus'); }
		});
		$('#query').bind('blur',function (){
			if(this.value=='') { this.value='search...';$('#query').toggleClass('focus'); }
		});
		
		
		//if the check box is checked
		$('.list_filtering').bind('click',function(){
			if($(this).attr('checked') == 'checked'){
				var link = $(this).val();
				window.location.href = link;
			}
		});
		
		
	});

})(jQuery);
