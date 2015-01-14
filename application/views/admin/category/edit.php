<h3><?php echo empty($category->id) ? '添加分类' : '修改分类 ' . $category->title; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Parent</td>
		<td><?php echo form_dropdown('parent_id', $categories_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $category->parent_id); ?></td>
	</tr>
	<tr>
		<td>Title</td>
		<td><?php echo form_input('title', set_value('title', $category->title)); ?></td>
	</tr>
	<tr>
		<td>Order</td>
		<td><?php echo form_input('order', set_value('order', $category->order)); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
