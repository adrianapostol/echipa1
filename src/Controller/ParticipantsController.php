<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Participants Controller
 *
 * @property \App\Model\Table\ParticipantsTable $Participants
 */
class ParticipantsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups', 'Users']
        ];
        $this->set('participants', $this->paginate($this->Participants));
        $this->set('_serialize', ['participants']);
    }

    /**
     * View method
     *
     * @param string|null $id Participant id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participant = $this->Participants->get($id, [
            'contain' => ['Groups', 'Users']
        ]);
        $this->set('participant', $participant);
        $this->set('_serialize', ['participant']);
    }

    /**
     * Add method
     *
     * @param null $groupId
     * @return \Cake\Network\Response|void
     */
    public function add($groupId = null)
    {
        $existing = $this->Participants->find('all', [
                'conditions' => [
                    'Participants.user_id' => $this->Auth->user('id'),
                    'Participants.group_id' => $groupId
                ]
            ]
        );

        $existing = $existing->toArray();

        $participant = $this->Participants->newEntity();
        $participant->user_id = $this->Auth->user('id');
        $participant->group_id = $groupId;

        if (count($existing)) {
            $this->Flash->success(__('Already joined'));
        } else if ($this->Participants->save($participant)) {
            $this->Flash->success(__('The participant has been saved.'));
        } else {
            $this->Flash->error(__('The participant could not be saved. Please, try again.'));
        }

        return $this->redirect(['controller' => 'groups', 'action' => 'view', $groupId]);

        if ($this->request->is('post')) {
            $participant = $this->Participants->patchEntity($participant, $this->request->data);
            if ($this->Participants->save($participant)) {
                $this->Flash->success(__('The participant has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The participant could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Participants->Groups->find('list', ['limit' => 200]);
        $users = $this->Participants->Users->find('list', ['limit' => 200]);
        $this->set(compact('participant', 'groups', 'users'));
        $this->set('_serialize', ['participant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Participant id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $participant = $this->Participants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participant = $this->Participants->patchEntity($participant, $this->request->data);
            if ($this->Participants->save($participant)) {
                $this->Flash->success(__('The participant has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The participant could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Participants->Groups->find('list', ['limit' => 200]);
        $users = $this->Participants->Users->find('list', ['limit' => 200]);
        $this->set(compact('participant', 'groups', 'users'));
        $this->set('_serialize', ['participant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Participant id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'get', 'delete']);
        $participant = $this->Participants->get($id);

        if ($this->Auth->user('id') !== $participant['user_id']) {
            $this->Flash->error(__('Be nice! Not your item'));
        } else {
            if ($this->Participants->delete($participant)) {
                $this->Flash->success(__('The participant has been deleted.'));
            } else {
                $this->Flash->error(__('The participant could not be deleted. Please, try again.'));
            }
        }

        return $this->redirect(['controller' => 'groups', 'action' => 'view', $participant['group_id']]);
    }
}
