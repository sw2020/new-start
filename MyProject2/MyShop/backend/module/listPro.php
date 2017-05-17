<?php 
$cateName = getAllCateName() ;
?>
<div class="right-slide-head">
	<h2>商品列表</h2>
	<ul class="right-slide-nav">
		<li><span class="glyphicon glyphicon-home"></span><a href="index.php">首页 &nbsp;</a> </li>
		<li><a href="listPro.php">商品管理&nbsp;</a></li>
		<li>商品列表&nbsp;</li>
	</ul><hr style="margin-bottom: 10px;" />
	<button onclick="addPro()" type="button" class="btn"><span class="glyphicon glyphicon-plus"></span> 添加</button>
<!-- 	<button type="button" class="btn"><span class="glyphicon glyphicon-trash"></span> 删除</button><br /><br /> -->
	<div class="row" style="padding-right: 20px; width: 99%;">
		<div class="col-md-9">
			<div class="form-group form-inline"><label class="control-label">请输入要查询的名称</label> <input type="text" id="Pro_val" class="form-control" /></div>
		</div>
		<div class="col-md-3">
			<div class="pull-right"> 
				<button type="button" class="btn" id="search_btn"> 搜索</button>
				<button type="reset" class="btn" id="reset_btn"> 重置</button>
			</div>
		</div>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
					<th>商品编号</th>
					<th>商品名称</th>
					<th>商品分类</th>
					<th>原       价</th>
					<th>现       价</th>
					<th>发布时间</th>
					<th>发布者</th>
					<th>操        作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($rows as $row): ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['Pname']; ?></td>
				<td><?php $x=$row['Cateid'];echo $cateName[$x-1]['cateName']; ?></td>
				<td><?php echo $row['iPrice']; ?></td>
				<td><?php echo $row['mPrice']; ?></td>
				<td><?php echo $row['pubTime']; ?></td>
				<td><?php echo $row['promulgator']?></td>
				<td>
					<a onclick="editPro(<?php echo  $row['id'];?>)"><span class="glyphicon glyphicon-pencil"></span> 修改</a>&nbsp;
					<a onclick="delPro(<?php echo  $row['id'];?>)"><span class="glyphicon glyphicon-trash"></span> 删除</a>
				</td>
			</tr>
			
			<?php endforeach; ?>
		</tbody>
	</table>
	<p class="col-md-5">第<?php echo $page;?>-<?php echo $totalRows;?>条，共<?php echo $totalRows;?>条数据.</p>
	<div class="pull-right">
		<?php 
			$where=($where==null)?null:"&".$where;
			$url = $_SERVER ['PHP_SELF'];
			$index = ($page == 1) ? "首页" : "<a href='{$url}?page=1{$where}'>首页</a>";
			$last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
			$prevPage=($page>=1)?$page-1:1;
			$nextPage=($Page>=$totalPage)?$totalPage:$page+1;
			$prev = ($page == 1) ? "上一页" : "<a href='{$url}?page={$prevPage}{$where}'>上一页</a>";
			$next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page={$nextPage}{$where}'>下一页</a>";
			$str = "总共{$totalPage}页/当前是第{$page}页";
			for($i = 1; $i <= $totalPage; $i ++) {
				//当前页无连接
				if ($page == $i) {
					$p .= "<li class='active'><a href='javascript:void(0)'>{$i}</a></li>";
				} else {
					$p .= "<li><a href='{$url}?page={$i}{$where}'>{$i}</a></li>";
				}
			}
		?>
		  <nav aria-label="">
			  <ul class="pagination">
			    <li class="disabled">
			      <span>
			        <span aria-hidden="true"><?php echo $index;?></span>
			      </span>
			    </li>
			    <li>
			      <span><?php echo $prev;?></span>
			    </li>
			     <?php echo $p;?>
			     <li>
			      <span><?php echo $next;?></span>
			    </li>
			     <li>
			      <span><?php echo $last;?></span>
			    </li>
			 </ul>
			</nav>
		</nav>
	</div>
</div>