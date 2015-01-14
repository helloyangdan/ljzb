<section>
    <h2>产品管理</h2>
    <?php echo form_open_multipart(); ?>
    分类:<?php echo form_dropdown('category', $categories, $id); ?> <?php echo form_submit('submit', '搜索', 'class="btn btn-primary"'); ?>
    <?php echo form_close();?>


    <?php echo anchor('admin/product/edit', '<i class="icon-plus"></i> 添加产品'); ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>标题</th>
            <th>分类</th>
            <th>图片</th>
            <th>排序</th>
            <th>编辑</th>
            <th>删除</th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($arr)): foreach($arr as $v): ?>
            <tr>
                <td><?php echo anchor('admin/product/edit/' . $v['id'], $v['title']); ?></td>
                <td><?php echo $v['category_title'];?></php></td>
                <td><img style="height:100px;" src="<?php echo $v['picture'];?>" /></td>
                <td><?php echo $v['order'];?></php></td>
                <td><?php echo btn_edit('admin/product/edit/' . $v['id']); ?></td>
                <td><?php echo btn_delete('admin/product/delete/' . $v['id']); ?></td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">没有找到任何数据.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>

<?php echo $page;?>
