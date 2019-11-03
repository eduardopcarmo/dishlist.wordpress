/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function( $ ) {
    var winWidth=document.documentElement.clientWidth;
    if(winWidth>768){
        $(".main-area button").removeClass("btn-primary");
        $(".main-area button").addClass("btn-outline-primary");
        $(".fqa-area button").removeClass("btn-primary");
        $(".fqa-area button").addClass("btn-outline-primary");
        
    } 
	
    $( window ).resize(() =>{
        var winX=document.documentElement.clientWidth;
        if(winX<768){
            $(".main-area button").removeClass("btn-outline-primary");
            $(".main-area button").addClass("btn-primary");
            $(".fqa-area button").removeClass("btn-outline-primary");
            $(".fqa-area button").addClass("btn-primary");
            
            
        } else {
            $(".main-area button").removeClass("btn-primary");
            $(".main-area button").addClass("btn-outline-primary");
            $(".fqa-area button").removeClass("btn-primary");
            $(".fqa-area button").addClass("btn-outline-primary");
           
        }
    });


})( jQuery );
