<section>
	<h2>页面管理</h2>
	<?php echo anchor('admin/page/edit', '<i class="icon-plus"></i> 添加页面'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>标题</th>
				<th>上级</th>
				<th>编辑</th>
				<th>删除</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($pages)): foreach($pages as $page): ?>	
		<tr>
			<td><?php echo anchor('admin/page/edit/' . $page->id, $page->title); ?></td>
			<td><?php echo $page->parent_slug; ?></td>
			<td><?php echo btn_edit('admin/page/edit/' . $page->id); ?></td>
			<td><?php echo btn_delete('admin/page/delete/' . $page->id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">没有数据.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>