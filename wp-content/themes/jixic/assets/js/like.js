(function($) {
	
	"use strict";
	
	//------like end-----
	 var bunch_theme = {   
	   count: 0,
	   likeit: function(options, selector)
	   {
		options.action = '_bunch_ajax_callback';
		
		if( $(selector).data('_bunch_like_it') === true ){
		 bunch_theme.msg( 'You have already done this job', 'error' );
		 return;
		}
		
		$(selector).data('_bunch_like_it', true );
	
		bunch_theme.loading(true);
		
		$.ajax({
		 url: ajaxurl,
		 type: 'POST',
		 data:options,
		 dataType:"json",
		 success: function(res){
	
		  try{
		   var newjason = res;
	
		   if( newjason.code === 'fail'){
			$(selector).data('_bunch_like_it', false );
			bunch_theme.loading(false);
			bunch_theme.msg( newjason.msg, 'error' );
		   }else if( newjason.code === 'success' ){
			bunch_theme.loading(false);
			$(selector).data('_bunch_like_it', true );
			bunch_theme.msg( newjason.msg, 'success' );
		   }
		   
		  }
		  catch(e){
		   bunch_theme.loading(false);
		   $(selector).data('_bunch_like_it', false );
		   bunch_theme.msg( 'There was an error with request '+e.message, 'error' );
		   
		  }
		 }
		});
	   },
	   loading: function( show ){
		if( $('.ajax-loading' ).length === 0 ) {
		 $('body').append('<div class="ajax-loading" style="display:none;"></div>');
		}
		
		if( show === true ){
		 $('.ajax-loading').show('slow');
		}
		if( show === false ){
		 $('.ajax-loading').hide('slow');
		}
	   },
	   
	   msg: function( msg, type ){
		if( $('#pop' ).length === 0 ) {
		 $('body').append('<div style="display: none;" id="pop"><div class="pop"><div class="alert"><p></p></div></div></div>');
		}
		if( type === 'error' ) {
		 type = 'danger';
		}
		var alert_type = 'alert-' + type;
		
		$('#pop > .pop p').html( msg );
		$('#pop > .pop > .alert').addClass(alert_type);
		
		$('#pop').slideDown('slow').delay(5000).fadeOut('slow', function(){
		 $('#pop .pop .alert').removeClass(alert_type);
		});
		
		
	   },
	   
	  };
  
 //------like end-----
 
 	$('.jolly_like_it').on('click', function(e) {
		   
		 e.preventDefault();
		 
		 var opt = {subaction:'likeit', data_id:$(this).attr('data-id')};
		 bunch_theme.likeit( opt, this );
		 
		 setTimeout(function(){
		   window.location.reload(1);
		}, 1500);
		
		 return false;
	});/**like end*/
	
	$(".widget a, .footer-widget a").filter(function() {
        return !this.attributes['href'];
    }).parent('li').fadeOut();


})(window.jQuery);