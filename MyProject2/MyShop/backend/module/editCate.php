<div class="right-slide-head">
	<h2>修改分类信息</h2>
	<ul class="right-slide-nav">
		<li><span class="glyphicon glyphicon-home"></span><a href='index.php'>首页 &nbsp;</a> </li>
		<li><a href='listCate.php'>分类管理&nbsp;</a></li>
		<li class="active">修改分类信息&nbsp;</li>
	</ul><hr style="margin-bottom: 10px;" />
</div>
<form id="editcate_form" action="../core/cate.inc.php?act=editCate" method="post">
	<input type="hidden" name="id" value="<?php echo $row['id']?>"> 
	<p>分类名称：</p>
	<input type="text" name="cateName" placeholder="<?php echo $row['cateName']?>" class="form-control" style="max-width: 500px;margin: 8px 0 0 0;" />
	<p style="margin-top: 10px;">分类说明：</p>
	<textarea name="cateAbout" rows="5" cols="69" placeholder='请输入详细说明'></textarea><br/><br/>
	<button type="submit" class="btn btn-primary"> 更新</button>
	<a href="listCate.php" class="btn btn-default">取消</a>
</form>

