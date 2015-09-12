(function($) {
    "use strict";

	// sidebar toggle
	$( "a.slideout-toggle" ).on( "click", function(e) {
		e.preventDefault();
		
		$( "html, body" ).animate({ scrollTop: 0 }, 0);
		$( "#push, #slideout" ).toggleClass( "toggled" );
		$( "a.slideout-toggle i" ).toggleClass( "icon-close" );
	});
	
	// fullscreen image toggle
	$( "a.toggle-image" ).on( "click", function(e) {
		e.preventDefault();
		
		$( "html, body" ).animate({ scrollTop: 0 }, 0);
		$( "#content" ).toggleClass( "toggled" );
		$( "a.toggle-image i" ).toggleClass( "icon-compress" );
	});
	
	// set default search text
    $('#searchform input[type="text"]').attr('placeholder', 'Search...');
    
    // add button class to postnavi
    $( ".postnavi a" ).addClass( "button" );

    // reading progress
    var getMax = function()
    {
	    return $( document ).height() - $( window ).height();
	}
	    
	var getValue = function()
	{
		return $( window ).scrollTop();
	}
	    
	if ( 'max' in document.createElement( 'progress' )) 
	{
	    var progressBar = $( 'progress' );
	        
	    progressBar.attr({ max: getMax() });
	
	    $( document ).on('scroll', function()
	    {
	    	progressBar.attr({ value: getValue() });
	    });
	      
	    $( window ).resize(function()
	    {
	    	progressBar.attr({ max: getMax(), value: getValue() });
	    }); 
	  
	} 
	else 
	{
	    var progressBar = $( '.progress-bar' ), max = getMax(), value, width;
	        
	    var getWidth = function() 
	    {
	      	value = getValue();            
		  	width = (value/max) * 100;
		  	width = width + '%';
	      
		  	return width;
	    }
	        
	    var setWidth = function()
	    {
	    	progressBar.css({ width: getWidth() });
	    }
	        
	    $( document ).on( 'scroll', setWidth );
	    
	    $( window ).on('resize', function()
	    {
	    	max = getMax();
			setWidth();
	    });
	}
    
    // prettyprint
    $( "pre" ).addClass( "prettyprint" );
})(jQuery);