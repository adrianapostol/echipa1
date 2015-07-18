<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ListItems Controller
 *
 * @property \App\Model\Table\ListItemsTable $ListItems
 */
class ListItemsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Lists', 'Users', 'Items']
        ];
        $this->set('listItems', $this->paginate($this->ListItems));
        $this->set('_serialize', ['listItems']);
    }

    /**
     * View method
     *
     * @param string|null $id List Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listItem = $this->ListItems->get($id, [
            'contain' => ['Lists', 'Users', 'Items']
        ]);
        $this->set('listItem', $listItem);
        $this->set('_serialize', ['listItem']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listItem = $this->ListItems->newEntity();
        if ($this->request->is('post')) {
            $listItem = $this->ListItems->patchEntity($listItem, $this->request->data);
            if ($this->ListItems->save($listItem)) {
                $this->Flash->success(__('The list item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The list item could not be saved. Please, try again.'));
            }
        }
        $lists = $this->ListItems->Lists->find('list', ['limit' => 200]);
        $users = $this->ListItems->Users->find('list', ['limit' => 200]);
        $items = $this->ListItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('listItem', 'lists', 'users', 'items'));
        $this->set('_serialize', ['listItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id List Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $listItem = $this->ListItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listItem = $this->ListItems->patchEntity($listItem, $this->request->data);
            if ($this->ListItems->save($listItem)) {
                $this->Flash->success(__('The list item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The list item could not be saved. Please, try again.'));
            }
        }
        $lists = $this->ListItems->Lists->find('list', ['limit' => 200]);
        $users = $this->ListItems->Users->find('list', ['limit' => 200]);
        $items = $this->ListItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('listItem', 'lists', 'users', 'items'));
        $this->set('_serialize', ['listItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id List Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listItem = $this->ListItems->get($id);
        if ($this->ListItems->delete($listItem)) {
            $this->Flash->success(__('The list item has been deleted.'));
        } else {
            $this->Flash->error(__('The list item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
