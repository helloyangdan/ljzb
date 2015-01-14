<div class="modal-header">
	<h3><?php echo empty($user->id) ? '添加新用户' : '修改用户:' . $user->name; ?></h3>
</div>
<div class="modal-body">
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>用户名</td>
		<td><?php echo form_input('name', set_value('name', $user->name)); ?></td>
	</tr>
	<tr>
		<td>邮件地址</td>
		<td><?php echo form_input('email', set_value('email', $user->email)); ?></td>
	</tr>
	<tr>
		<td>密码</td>
		<td><?php echo form_password('password'); ?></td>
	</tr>
	<tr>
		<td>重复密码</td>
		<td><?php echo form_password('password_confirm'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', '确定', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>