<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Expense'), ['action' => 'edit', $expense->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Expense'), ['action' => 'delete', $expense->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expense->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Expenses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expense'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Periodicities'), ['controller' => 'Periodicities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Periodicity'), ['controller' => 'Periodicities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="expenses view large-10 medium-9 columns">
    <h2><?= h($expense->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nombre') ?></h6>
            <p><?= h($expense->nombre) ?></p>
            <h6 class="subheader"><?= __('Comentarios') ?></h6>
            <p><?= h($expense->comentarios) ?></p>
            <h6 class="subheader"><?= __('Valor') ?></h6>
            <p><?= h($expense->valor) ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= $expense->has('type') ? $this->Html->link($expense->type->nombre, ['controller' => 'Types', 'action' => 'view', $expense->type->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Periodicity') ?></h6>
            <p><?= $expense->has('periodicity') ? $this->Html->link($expense->periodicity->tiempo, ['controller' => 'Periodicities', 'action' => 'view', $expense->periodicity->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $expense->has('user') ? $this->Html->link($expense->user->id, ['controller' => 'Users', 'action' => 'view', $expense->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($expense->id) ?></p>
            <h6 class="subheader"><?= __('Role Id') ?></h6>
            <p><?= $this->Number->format($expense->role_id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Fecha') ?></h6>
            <p><?= h($expense->fecha) ?></p>
        </div>
    </div>
</div>
