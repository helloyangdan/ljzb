<h3><?php echo empty($article->id) ? '添加文章' : '编辑文章： ' . $article->title; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart(); ?>
<table class="table">
	<tr>
		<td>发布时间</td>
		<td><?php echo form_input('pubdate', set_value('pubdate', $article->pubdate), 'class="datepicker"'); ?></td>
	</tr>
	<tr>
		<td>文章标题</td>
		<td><?php echo form_input('title', set_value('title', $article->title)); ?></td>
	</tr>
	<tr>
		<td>文章分类</td>
		<td><?php echo form_dropdown('category', $categories, $this->input->post('category') ? $this->input->post('category') : $article->category); ?></td>
	</tr>
    <tr>
        <td>封面图</td>
        <td>
            <input type="file" value="" name="thumb" id="thumb" class="input-xlarge" style="height:24px;">
            <?php if(!empty($article->thumb) ):?>
                <img width="118" height="37" src="<?php echo base_url($article->thumb);?>" />
            <?php endif;?>
        </td>
    </tr>
	<tr>
		<td>正文内容</td>
		<td><?php echo $article->content;
            //form_textarea('body', set_value('body', $article->body) ); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', '保存', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>

<script>
$(function() {
	$('.datepicker').datepicker({ format : 'yyyy-mm-dd' });
});
</script>