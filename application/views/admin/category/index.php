<section>
	<h2>分类管理</h2>
	<?php echo anchor('admin/category/edit', '<i class="icon-plus"></i> 添加分类'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>分类名称</th>
				<th>排序</th>
				<th>编辑</th>
				<th>删除</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($categories)): foreach($categories as $category): ?>
		<tr>
			<td><?php echo anchor('admin/category/edit/' . $category['id'], $category['title']); ?></td>
			<td><?php echo $category['order']; ?></td>
			<td><?php echo btn_edit('admin/category/edit/' . $category['id']); ?></td>
			<td><?php echo btn_delete('admin/category/delete/' . $category['id']); ?></td>
		</tr>

    <?php if(!empty($category['children'])):foreach($category['children'] as $v):?>
        <tr>
            <td><?php echo anchor('admin/category/edit/' . $v['id'], '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--'.$v['title']); ?></td>
            <td><?php echo $v['order']; ?></td>
            <td><?php echo btn_edit('admin/category/edit/' . $v['id']); ?></td>
            <td><?php echo btn_delete('admin/category/delete/' . $v['id']); ?></td>
        </tr>
    <?php endforeach;endif;?>

<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="4">没有找到任何分类.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>