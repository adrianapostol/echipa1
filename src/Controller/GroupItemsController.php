<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GroupItems Controller
 *
 * @property \App\Model\Table\GroupItemsTable $GroupItems
 */
class GroupItemsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups', 'Users', 'Items']
        ];
        $this->set('groupItems', $this->paginate($this->GroupItems));
        $this->set('_serialize', ['groupItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Group Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $groupItem = $this->GroupItems->get($id, [
            'contain' => ['Groups', 'Users', 'Items']
        ]);
        $this->set('groupItem', $groupItem);
        $this->set('_serialize', ['groupItem']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $groupItem = $this->GroupItems->newEntity();
        if ($this->request->is('post')) {
            $groupItem = $this->GroupItems->patchEntity($groupItem, $this->request->data);
            if ($this->GroupItems->save($groupItem)) {
                $this->Flash->success(__('The group item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group item could not be saved. Please, try again.'));
            }
        }
        $groups = $this->GroupItems->Groups->find('list', ['limit' => 200]);
        $users = $this->GroupItems->Users->find('list', ['limit' => 200]);
        $items = $this->GroupItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('groupItem', 'groups', 'users', 'items'));
        $this->set('_serialize', ['groupItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $groupItem = $this->GroupItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $groupItem = $this->GroupItems->patchEntity($groupItem, $this->request->data);
            if ($this->GroupItems->save($groupItem)) {
                $this->Flash->success(__('The group item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group item could not be saved. Please, try again.'));
            }
        }
        $groups = $this->GroupItems->Groups->find('list', ['limit' => 200]);
        $users = $this->GroupItems->Users->find('list', ['limit' => 200]);
        $items = $this->GroupItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('groupItem', 'groups', 'users', 'items'));
        $this->set('_serialize', ['groupItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $groupItem = $this->GroupItems->get($id);
        if ($this->GroupItems->delete($groupItem)) {
            $this->Flash->success(__('The group item has been deleted.'));
        } else {
            $this->Flash->error(__('The group item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
