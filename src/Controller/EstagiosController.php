<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Estagios Controller
 *
 * @property \App\Model\Table\EstagiosTable $Estagios
 *
 * @method \App\Model\Entity\Estagio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstagiosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Alunos', 'Empresas']
        ];
        $busca = $this->request->data('busca');
        if(!empty($busca)){
            $this->paginate = [
                'contain' => ['Alunos', 'Empresas'],
                'conditions' => array (
                    'OR' => array(
                        array('alunos.nome LIKE' => '%'.$busca.'%'),
                        array('empresas.nome LIKE ' => '%'.$busca.'%')))
            ];
        }
        $estagios = $this->paginate($this->Estagios);

        $this->set(compact('estagios'));
    }

    /**
     * View method
     *
     * @param string|null $id Estagio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estagio = $this->Estagios->get($id, [
            'contain' => ['Alunos', 'Empresas']
        ]);

        $this->set('estagio', $estagio);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estagio = $this->Estagios->newEntity();
        if ($this->request->is('post')) {
            $estagio = $this->Estagios->patchEntity($estagio, $this->request->getData());
            if ($this->Estagios->save($estagio)) {
                $this->Flash->success(__('The estagio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estagio could not be saved. Please, try again.'));
        }
        $alunos = $this->Estagios->Alunos->find('list', ['limit' => 200]);
        $empresas = $this->Estagios->Empresas->find('list', ['limit' => 200]);
        $this->set(compact('estagio', 'alunos', 'empresas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estagio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estagio = $this->Estagios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estagio = $this->Estagios->patchEntity($estagio, $this->request->getData());
            if ($this->Estagios->save($estagio)) {
                $this->Flash->success(__('The estagio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estagio could not be saved. Please, try again.'));
        }
        $alunos = $this->Estagios->Alunos->find('list', ['limit' => 200]);
        $empresas = $this->Estagios->Empresas->find('list', ['limit' => 200]);
        $this->set(compact('estagio', 'alunos', 'empresas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estagio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estagio = $this->Estagios->get($id);
        if ($this->Estagios->delete($estagio)) {
            $this->Flash->success(__('The estagio has been deleted.'));
        } else {
            $this->Flash->error(__('The estagio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
