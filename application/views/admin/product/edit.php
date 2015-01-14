<h3><?php echo empty($p->id) ? '添加产品' : '编辑产品： ' . $p->title; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart(); ?>
<table class="table">

	<tr>
		<td>产品标题</td>
		<td><?php echo form_input('title', set_value('title', $p->title)); ?></td>
	</tr>
	<tr>
		<td>产品分类</td>
		<td><?php echo form_dropdown('category', $categories, $this->input->post('category') ? $this->input->post('category') : $p->category); ?></td>
	</tr>
    <tr>
        <td>排序</td>
        <td><?php echo form_input('order', set_value('order', $p->order)); ?></td>
    </tr>
	<tr>
		<td>产品图片</td>
		<td>
            <input type="file" value="" name="picture" id="picture" class="input-xlarge" style="height:24px;">
            <?php if(!empty($p->picture) ):?>
                <img width="200" src="<?php echo base_url($p->picture);?>" />
            <?php endif;?>
        </td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', '保存', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>

