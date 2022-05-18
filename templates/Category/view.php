<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Category'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="category view content">
            <h3><?= h($category->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Post') ?></h4>
                <?php if (!empty($category->post)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Tittle') ?></th>
                            <th><?= __('Brief') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->post as $post) : ?>
                        <tr>
                            <td><?= h($post->id) ?></td>
                            <td><?= h($post->tittle) ?></td>
                            <td><?= h($post->brief) ?></td>
                            <td><?= h($post->content) ?></td>
                            <td><?= h($post->image) ?></td>
                            <td><?= h($post->created) ?></td>
                            <td><?= h($post->category_id) ?></td>
                            <td><?= h($post->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Post', 'action' => 'view', $post->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Post', 'action' => 'edit', $post->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Post', 'action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
