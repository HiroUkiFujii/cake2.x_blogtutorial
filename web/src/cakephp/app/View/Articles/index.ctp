<h1>Blog articles</h1>
<?php echo $this->Html->link('Add Post',array('controller' => 'articles', 'action' => 'add'));?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?php echo $article['Articles']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($article['Articles']['title'],
            array('controller' => 'articles','action'=>'view',$article['Articles']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink('Delete',array('action'=>'delete',$article['Articles']['id']),
            array('confirm'=>'Are you sure?'));?>
        </td>
        <td>
            <?php
             echo $this->Html->link('Edit',
            array('controller' => 'articles','action'=>'edit',$article['Articles']['id'])); ?>
        </td>
        <td><?php echo $article['Articles']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($article); ?>
</table>