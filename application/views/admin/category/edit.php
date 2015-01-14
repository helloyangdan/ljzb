<h3><?php echo empty($category->id) ? '添加分类' : '修改分类 ' . $category->title; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart(); ?>
<table class="table">
	<tr>
		<td>上级分类</td>
		<td><?php echo form_dropdown('parent_id', $categories_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $category->parent_id); ?></td>
	</tr>
	<tr>
		<td>分类名称</td>
		<td><?php echo form_input('title', set_value('title', $category->title)); ?></td>
	</tr>
	<tr>
		<td>排序</td>
		<td><?php echo form_input('order', set_value('order', $category->order)); ?></td>
	</tr>
	<tr>
		<td>广告图片</td>
		<td>
            <input type="file" value="" name="picture" id="picture" class="input-xlarge" style="height:24px;">
            
        </td>
	</tr>
	<tr>
		<td></td>
		<td>
			<?php if(!empty($category->picture) ):?>
                <img height="40" src="<?php echo base_url($category->picture);?>" />
            <?php endif;?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', '保存', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
