<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Periodicities Controller
 *
 * @property \App\Model\Table\PeriodicitiesTable $Periodicities
 */
class PeriodicitiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('periodicities', $this->paginate($this->Periodicities));
        $this->set('_serialize', ['periodicities']);
    }

    /**
     * View method
     *
     * @param string|null $id Periodicity id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $periodicity = $this->Periodicities->get($id, [
            'contain' => []
        ]);
        $this->set('periodicity', $periodicity);
        $this->set('_serialize', ['periodicity']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $periodicity = $this->Periodicities->newEntity();
        if ($this->request->is('post')) {
            $periodicity = $this->Periodicities->patchEntity($periodicity, $this->request->data);
            if ($this->Periodicities->save($periodicity)) {
                $this->Flash->success('The periodicity has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The periodicity could not be saved. Please, try again.');
            }
        }
        $this->set(compact('periodicity'));
        $this->set('_serialize', ['periodicity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Periodicity id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $periodicity = $this->Periodicities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $periodicity = $this->Periodicities->patchEntity($periodicity, $this->request->data);
            if ($this->Periodicities->save($periodicity)) {
                $this->Flash->success('The periodicity has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The periodicity could not be saved. Please, try again.');
            }
        }
        $this->set(compact('periodicity'));
        $this->set('_serialize', ['periodicity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Periodicity id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $periodicity = $this->Periodicities->get($id);
        if ($this->Periodicities->delete($periodicity)) {
            $this->Flash->success('The periodicity has been deleted.');
        } else {
            $this->Flash->error('The periodicity could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
