<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Periodicity'), ['action' => 'edit', $periodicity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Periodicity'), ['action' => 'delete', $periodicity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $periodicity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Periodicities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Periodicity'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="periodicities view large-10 medium-9 columns">
    <h2><?= h($periodicity->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Tiempo') ?></h6>
            <p><?= h($periodicity->tiempo) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($periodicity->id) ?></p>
        </div>
    </div>
</div>
