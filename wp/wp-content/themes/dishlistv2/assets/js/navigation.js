/* global dishlistv2ScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation area.
 */

(function( $ ) {
	var clickStat;
	$(".menu-toggle").click(()=>{
		var navitems = $(".menu-item");
		if (navitems.css( "display" ) === "block") {
			navitems.css( "display", "none" );
			clickStat=0;
		} else {
			navitems.css( "display", "block" );
			clickStat=1;
		}
	})
	
	$( window ).resize(() =>{
		var x=document.documentElement.clientWidth;
		
		if(x>=768){
			$(".menu-item").css( "display", "inline-block" );
		} else {
			//console.log(x);
			$(".menu-item").css( "display", "none" );
			if(clickStat===0){
				$(".menu-item").css( "display", "none" );
			} else if (clickStat===1){
				$(".menu-item").css( "display", "block" );
			} 
		}
			

	})

})( jQuery );
