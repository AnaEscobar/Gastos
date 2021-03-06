<div class="actions columns large-2 medium-3">
    <h3><?= __('Acciones') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Volver'), ['action' => 'inicio']) ?></li>
        <li><?= $this->Html->link(__('Mostrar categorías'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear categoría'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Mostrar periodos'), ['controller' => 'Periodicities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo periodo'), ['controller' => 'Periodicities', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="expenses form large-10 medium-9 columns">
    <?= $this->Form->create($expense); ?>
    <fieldset>
        <legend><?= __('Add Expense') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('comentarios');
            echo $this->Form->input('valor');
            echo $this->Form->input('fecha');
            echo $this->Form->input('Categoría', ['options' => $types, 'empty' => true]);
            echo $this->Form->input('Repetición', ['options' => $periodicities, 'empty' => true]);
         //   echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>




