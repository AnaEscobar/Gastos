<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Periodicities'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="periodicities form large-10 medium-9 columns">
    <?= $this->Form->create($periodicity); ?>
    <fieldset>
        <legend><?= __('Add Periodicity') ?></legend>
        <?php
            echo $this->Form->input('tiempo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>