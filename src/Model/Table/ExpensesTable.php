<?php
namespace App\Model\Table;

use App\Model\Entity\Expense;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Expenses Model
 */
class ExpensesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('expenses');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id'
        ]);
        $this->belongsTo('Periodicities', [
            'foreignKey' => 'periodicity_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->allowEmpty('nombre')
            ->notEmpty('nombre')
            ->allowEmpty('comentarios')
            ->notEmpty('valor')
            ->add('valor', 'valid', ['rule' => 'numeric', 'message' => 'Este valor tiene que ser un número'])
            ->add('fecha', 'valid', ['rule' => 'date'])
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha')
            //->add('role_id', 'valid', ['rule' => 'numeric'])
            //->requirePresence('role_id', 'create')
            //->notEmpty('role_id')
            ->add('type_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('type_id')
            ->add('periodicity_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('periodicity_id')
            ->add('user_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('user_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['type_id'], 'Types'));
        $rules->add($rules->existsIn(['periodicity_id'], 'Periodicities'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
    
    public function isOwnedBy($expenseId, $userId) {
        return $this->exists(['id' => $expenseId, 'user_id' => $userId]);
    }
}
