<div class="modal-header">
	<h3>登录</h3>
	<p>请输入账号密码登录后台</p>
</div>
<div class="modal-body">
<?php echo validation_errors(); ?>
<?php echo form_open();?>
<table class="table">
	<tr>
		<td>账号</td>
		<td><?php echo form_input('email'); ?></td>
	</tr>
	<tr>
		<td>密码</td>
		<td><?php echo form_password('password'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', '登录', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>