<script type="text/javascript">
	//下面用于多图片上传预览功能
	function setImagePreviews(avalue) {
	 var fileObj = document.getElementById("avafile");
	 var preview = document.getElementById("preview");
	 preview.innerHTML = "";
	 var fileList = fileObj.files;
	 for (var i = 0; i < fileList.length; i++) {   
	
	  preview.innerHTML += "<div style='display:inline-block' > <img id='img" + i + "' /> </div>";
	  var imgObjPreview = document.getElementById("img"+i); 
	  if (fileObj.files && fileObj.files[i]) {
	   //火狐下，直接设img属性
	   imgObjPreview.style.display = 'block';
	   imgObjPreview.style.width = '100px';
	   imgObjPreview.style.height = '100px';
	   //imgObjPreview.src = fileObj.files[0].getAsDataURL();
	   //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
	   imgObjPreview.src = window.URL.createObjectURL(fileObj.files[i]);
	  }
	  else {
	   //IE下，使用滤镜
	   fileObj.select();
	   var imgSrc = document.selection.createRange().text;
	   alert(imgSrc)
	   var localImagId = document.getElementById("img" + i);
	   //必须设置初始大小
	   localImagId.style.width = "100px";
	   localImagId.style.height = "100px";
	  }
	 } 
	
	 return true;
	}
</script>
<div class="right-slide-head">
	<h2>添加商品</h2>
	<ul class="right-slide-nav">
		<li><span class="glyphicon glyphicon-home"></span> 首页 &nbsp;</li>
		<li><a href="listPro.php">商品管理&nbsp;</a></li>
		<li class="active">添加商品&nbsp;</li>
	</ul><hr style="margin-bottom: 10px;" />
</div>
<form id="addpro_form" action="../core/pro.inc.php?act=addPro&promulgator=B<?php echo $_SESSION['adminId']?>" method="post" enctype="multipart/form-data">
	<label>商品名称：</label>
	<input name="Pname" type="text" class="form-control"  />
	<label>商品分类：&nbsp;</label>
	<select name="Cateid">
	<?php foreach($rows as $row):?>
		<option value="<?php echo $row['id'];?>"><?php echo $row['cateName'];?></option>
	<?php endforeach;?>
	</select><br />
	<label>商品价格：</label>
	<input name="mPrice" type="text" class="form-control" />
	<label>商品原价：</label>
	<input name="iPrice" type="text" class="form-control" />
	<label>成色：</label>
	<input name="NewOrOld" type="text" class="form-control" />
	<label>地址：</label>
	<input name="address" type="text" class="form-control" />
	<label>商品描述：</label><br />
	<textarea name="Pdesc" rows="5" cols="69"></textarea><br />
	<label>上传图片：</label>
	<div class="fileField" style="max-width:550px;height:50px;banckground-color:#eee;">
		<div id="preview"></div><br />
		<input type="file" name="myFile[]" id="avafile" multiple="multiple"onchange="javascript:setImagePreviews();" /><br />
 		<!--<img src="" id="preview_avator" /><br />-->
 		<button type="submit" class="btn btn-primary">上传</button>
 		<a href="listPro.php" class="btn btn-default"> 取消</a>
	</div>
	
</form>
