<section>
	<h2>文章管理</h2>
	<?php echo anchor('admin/article/edit', '<i class="icon-plus"></i> 添加文章'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>标题</th>
                <th>分类</th>
				<th>发布时间</th>
                <th>修改时间</th>
				<th>编辑</th>
				<th>删除</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($arr)): foreach($arr as $article): ?>
		<tr>
			<td><?php echo anchor('admin/article/edit/' . $article['id'], $article['title']); ?></td>
            <td><?php echo $article['category_title'];?></php></td>
			<td><?php echo $article['pubdate']; ?></td>
            <td><?php echo $article['modified'];?></td>
			<td><?php echo btn_edit('admin/article/edit/' . $article['id']); ?></td>
			<td><?php echo btn_delete('admin/article/delete/' . $article['id']); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="4">没有找到任何文章.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>

<?php echo $page;?>
