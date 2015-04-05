<?php
namespace App\Controller;
use Cake\I18n\Time;
use App\Controller\AppController;

/**
 * Expenses Controller
 *
 * @property \App\Model\Table\ExpensesTable $Expenses
 */
class ExpensesController extends AppController
{

    public $helpers = ['Url'];
    
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Types', 'Periodicities', 'Users']
        ];
        $this->set('expenses', $this->paginate($this->Expenses));
        $this->set('_serialize', ['expenses']);
    }

    /**
     * View method
     *
     * @param string|null $id Expense id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expense = $this->Expenses->get($id, [
            'contain' => ['Types', 'Periodicities', 'Users']
        ]);
        $this->set('expense', $expense);
        $this->set('_serialize', ['expense']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expense = $this->Expenses->newEntity();
        if ($this->request->is('post')) {
            $expense = $this->Expenses->patchEntity($expense, $this->request->data);
            
            $expense->user_id = $this->Auth->user('id');
            if ($this->Expenses->save($expense)) {
                $this->Flash->success('The expense has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The expense could not be saved. Please, try again.');
            }
        }
        $types = $this->Expenses->Types->find('list', ['limit' => 200]);
        $periodicities = $this->Expenses->Periodicities->find('list', ['limit' => 200]);
        $users = $this->Expenses->Users->find('list', ['limit' => 200]);
        $this->set(compact('expense', 'types', 'periodicities', 'users'));
        $this->set('_serialize', ['expense']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Expense id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expense = $this->Expenses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expense = $this->Expenses->patchEntity($expense, $this->request->data);
            if ($this->Expenses->save($expense)) {
                $this->Flash->success('The expense has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The expense could not be saved. Please, try again.');
            }
        }
        $types = $this->Expenses->Types->find('list', ['limit' => 200]);
        $periodicities = $this->Expenses->Periodicities->find('list', ['limit' => 200]);
        $users = $this->Expenses->Users->find('list', ['limit' => 200]);
        $this->set(compact('expense', 'types', 'periodicities', 'users'));
        $this->set('_serialize', ['expense']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Expense id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expense = $this->Expenses->get($id);
        if ($this->Expenses->delete($expense)) {
            $this->Flash->success('The expense has been deleted.');
        } else {
            $this->Flash->error('The expense could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
    
    
    
    public function inicio() {
       
        $now = Time::now();
        $mes = $now->month;
        $año = $now->year;
        $this->set('mes_num', $mes);
       
        $fecha ='2015-'.$mes.'-01';

        $q = $this->Expenses->find()->where(['fecha >' => $fecha]); // Ponemos un where para que solo traiga los gastos de este mes

        $this->set('actuales', $q->all());
        
        
        
        $mes = $this->getMes($mes);    
        $this->set('mes', $mes);
        
        $this->set('año', $año);
    }
    
    

    public function inicioAnterior($mes_num) {
        $fecha2 ='2015-'.$mes_num.'-01';
        $mes_num--;
        $fecha1 ='2015-'.$mes_num.'-01';
        $q = $this->Expenses->find()->where(['fecha >' => $fecha1])
                                    ->andWhere(['fecha <' => $fecha2]); // Ponemos un where para que solo traiga los gastos de este mes
        $this->set('actuales', $q->all());
        
        
        $now = Time::now();
    
        $año = $now->year;
        
        $this->set('mes_num', $mes_num);
        $mes = $this->getMes($mes_num);    
        $this->set('mes', $mes);
        $this->set('año', $año);
        
        $this->render('inicio');

    }
    
    
    public function inicioSiguiente($mes_num) {
        $fecha2 ='2015-'.$mes_num.'-01';
        $mes_num++;
        $fecha1 ='2015-'.$mes_num.'-01';
        $q = $this->Expenses->find()->where(['fecha >' => $fecha1])
                                    ->andWhere(['fecha <' => $fecha2]); // Ponemos un where para que solo traiga los gastos de este mes
        $this->set('actuales', $q->all());
        
        
        $now = Time::now();
    
        $año = $now->year;
        
        $this->set('mes_num', $mes_num);
        $mes = $this->getMes($mes_num);    
        $this->set('mes', $mes);
        $this->set('año', $año);
        
        $this->render('inicio');

    }
    
    public function nuevo() {
        $this->loadModel('Types');
        $q = $this->Types->find();
        $this->set('tipos', $q->all());
        
        $this->loadModel('Periodicities');
        $qu = $this->Periodicities->find();
        $this->set('periodos', $qu->all());
    
        
    }
    public function isAuthorized($user)
    {
        debug('auth', true);
        // All registered users can add articles
        if ($this->request->action === 'add') {
            return true;
        }
    
        // The owner of an article can edit and delete it
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $expenseId = (int)$this->request->params['pass'][0];
            if ($this->Expenses->isOwnedBy($expenseId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }
}
