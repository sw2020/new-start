$(function(){
	//sec-menu
    $('#menu .nav a').mousemove(function(event){
		$('.menu-box').hide(); 
    	$($(this).attr('href')).show();
    });
	
	$('.menu-box').on('mouseleave', function(e) {
		$('.menu-box').hide();  
	});
	
	$('#menu').on('mouseleave', function(e) {
		e.stopPropagation();//阻止移除菜单的时候，Box消失
		$('.menu-box').hide();  //移出Box的时候，Box消失
	});
	
    //tab
    $('#mytabs a').mousemove(function(e){
    	$(this).tab('show');
    });
});

// $('#'+$(this).attr('id')+'content').fadeIn();