<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Periodicity'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="periodicities index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('tiempo') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($periodicities as $periodicity): ?>
        <tr>
            <td><?= $this->Number->format($periodicity->id) ?></td>
            <td><?= h($periodicity->tiempo) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $periodicity->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $periodicity->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $periodicity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $periodicity->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
