<div class="right-slide-head">
	<h2>添加分类</h2>
	<ul class="right-slide-nav">
		<li><span class="glyphicon glyphicon-home"></span><a href="index.php">首页 &nbsp;</a></li>
		<li><a href="listCate.php">分类管理&nbsp;</a></li>
		<li>添加分类&nbsp;</li>
	</ul><hr style="margin-bottom: 10px;" />
</div>
<form id="addcate_form" action="../core/cate.inc.php?act=addCate" method="post">
	<p>分类名称：</p>
	<input type="text" name="cateName" placeholder="请输入分类名称" class="form-control" style="max-width: 500px;margin: 8px 0 0 0;" />
	<p style="margin-top: 10px;">分类说明：</p>
	<textarea name="cateAbout" rows="5" cols="69" style="resize: none"></textarea><br/><br/>
	<button type="submit" class="btn btn-primary"> 添加</button>
	<a href="listCate.php" class="btn btn-default">取消</a>
</form>