<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="roles view large-10 medium-9 columns">
    <h2><?= h($role->rol) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Rol') ?></h6>
            <p><?= h($role->rol) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($role->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Expenses') ?></h4>
    <?php if (!empty($role->expenses)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Nombre') ?></th>
            <th><?= __('Comentarios') ?></th>
            <th><?= __('Valor') ?></th>
            <th><?= __('Fecha') ?></th>
            <th><?= __('Role Id') ?></th>
            <th><?= __('Type Id') ?></th>
            <th><?= __('Periodicity Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($role->expenses as $expenses): ?>
        <tr>
            <td><?= h($expenses->id) ?></td>
            <td><?= h($expenses->nombre) ?></td>
            <td><?= h($expenses->comentarios) ?></td>
            <td><?= h($expenses->valor) ?></td>
            <td><?= h($expenses->fecha) ?></td>
            <td><?= h($expenses->role_id) ?></td>
            <td><?= h($expenses->type_id) ?></td>
            <td><?= h($expenses->periodicity_id) ?></td>
            <td><?= h($expenses->user_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Expenses', 'action' => 'view', $expenses->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Expenses', 'action' => 'edit', $expenses->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Expenses', 'action' => 'delete', $expenses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expenses->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
