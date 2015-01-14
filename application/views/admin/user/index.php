<section>
	<h2>管理员</h2>
	<?php echo anchor('admin/user/edit', '<i class="icon-plus"></i> 添加管理员'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>邮件地址</th>
				<th>编辑</th>
				<th>删除</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($users)): foreach($users as $user): ?>	
		<tr>
			<td><?php echo anchor('admin/user/edit/' . $user->id, $user->email); ?></td>
			<td><?php echo btn_edit('admin/user/edit/' . $user->id); ?></td>
			<td><?php echo btn_delete('admin/user/delete/' . $user->id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any users.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>