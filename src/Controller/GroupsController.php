<?php 

namespace App\Controller;

use App\Controller\AppController;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 */
class GroupsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $userId = $this->Auth->user('id');
        $today = (new \DateTime())->setTime(0, 0);
        $this->paginate = [
            'contain' => ['Users', 'Locations']
        ];
        $lunchGroups = $this->Groups
            ->find()
            ->select(['id', 'user_id', 'name', 'due_date', 'started'])
            ->where(['type =' => 'lunch', 'ended IS' => NULL, 'due_date >' => $today->format('Y-m-d')])
            ->order(['due_date' => 'ASC']);

        $cateringGroups = $this->Groups
            ->find()
            ->select(['id', 'user_id', 'name', 'due_date', 'started'])
            ->where(['type =' => 'catering', 'ended IS' => NULL, 'due_date >' => $today->format('Y-m-d')])
            ->order(['due_date' => 'ASC']);

        $this->set('lunchGroups', $lunchGroups);
        $this->set('cateringGroups', $cateringGroups);
        $this->set('userId', $userId);
        $this->set('_serialize', ['lunchGroups', 'cateringGroups', 'userId']);
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Users', 'Locations', 'GroupItems', 'Participants']
        ]);

        $this->set('items', $group[$group['type'] == 'catering' ? 'group_items' : 'participants']);
        $this->set('group', $group);
        $this->set('groupType', $group->type);
        $this->set('_serialize', ['group']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
        $users = $this->Groups->Users->find('list', ['limit' => 200]);
        $locations = $this->Groups->Locations->find('list', ['limit' => 200]);
        $this->set(compact('group', 'users', 'locations'));
        $this->set('_serialize', ['group']);
    }

    public function addCatering()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            $group->type = 'catering';
            $group->user_id = $this->Auth->user('id');

            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
        $users = $this->Groups->Users->find('list', ['limit' => 200]);
        $locations = $this->Groups->Locations->find('list', ['limit' => 200]);
        $this->set(compact('group', 'users', 'locations'));
        $this->set('_serialize', ['group']);
    }

    public function addLunch()
    {
        $group = $this->Groups->newEntity();

        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            $group->type = 'lunch';
            $group->user_id = $this->Auth->user('id');

            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
        $users = $this->Groups->Users->find('list', ['limit' => 200]);
        $locations = $this->Groups->Locations->find('list', ['limit' => 200]);
        $this->set(compact('group', 'users', 'locations'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
        $users = $this->Groups->Users->find('list', ['limit' => 200]);
        $locations = $this->Groups->Locations->find('list', ['limit' => 200]);
        $this->set(compact('group', 'users', 'locations'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
