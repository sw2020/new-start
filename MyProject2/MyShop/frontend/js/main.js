//用户名、密码表单验证
//function func(){
//	var x=document.forms["myForm"]["fname"].value;
//	var y=document.forms["myForm"]["pname"].value;
//	if(x==null || x==""){
//		document.getElementById("box1-p1").innerHTML="用户名不能为空";
//		return false;
//	}else {
//		document.getElementById("box1-p1").innerHTML="&nbsp";
//	}				
//	if(y==null || y==""){
//		document.getElementById("box1-p2").innerHTML="密码不能为空";
//		return false;
//	}else{
//		document.getElementById("box1-p2").innerHTML="&nbsp";
//	}
//}
			

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
    
	$('.floatPanel .ctrlPanel a:eq(2) span').mousemove(function(){
    	$('#QRcode img').css('transform','translateX(0)');
    });
    $('.floatPanel .ctrlPanel').children('a').eq(2).mouseleave(function(){
    	$('#QRcode img').css('transform','translateX(100px)');
    });
    
    //商品描述 隐藏多余文字
    $(".about_Pro").each(function(){
		var maxlength=34;
		if($(this).text().length>maxlength){
			$(this).text($(this).text().substring(0,maxlength));
			$(this).html($(this).html()+'...');}
	});
    
    //搜索商品
    $("#search_btn").click(function(){
		var val = $("#search_all").val();
		window.location="searchResult.php?keyword="+val;
	});
	
	$("#search_btn2").click(function(){
		var val = $("#search_all").val();
		window.location="../searchResult.php?keyword="+val;
	});
	
	//立即购买
	$("#buy_now").click(function(){
		var val = $("#proid").val();
		window.location="../shopcar.php?keyword="+val;
	});
	
	//上传头像，图片预览
	$("#avafile,#uploadfile").change(function(){   
	   var file = this.files[0];
	   if (window.FileReader) {    
            var reader = new FileReader();    
            reader.readAsDataURL(file);    
            //监听文件读取结束后事件    
            reader.onloadend = function (e) {
            	$("#preview_avator").attr("src",e.target.result);    //e.target.result就是最后的路径地址
            };    
	    } 
	});	
});

// $('#'+$(this).attr('id')+'content').fadeIn();

