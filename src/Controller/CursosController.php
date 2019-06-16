<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Cursos Controller
 *
 * @property \App\Model\Table\CursosTable $Cursos
 *
 * @method \App\Model\Entity\Curso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CursosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $cursos = $this->paginate($this->Cursos);

        $this->set(compact('cursos'));
    }

    /**
     * View method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => ['Documentos', 'Alunos']
        ]);

        $this->set('curso', $curso);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $curso = $this->Cursos->newEntity();
        if ($this->request->is('post')) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            if ($this->Cursos->save($curso)) {
                $this->Flash->success(__('The curso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The curso could not be saved. Please, try again.'));
        }
        $documentos = $this->Cursos->Documentos->find('list', ['limit' => 200]);
        $this->set(compact('curso', 'documentos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => ['Documentos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            if ($this->Cursos->save($curso)) {
                $this->Flash->success(__('The curso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The curso could not be saved. Please, try again.'));
        }
        $documentos = $this->Cursos->Documentos->find('list', ['limit' => 200]);
        $this->set(compact('curso', 'documentos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $curso = $this->Cursos->get($id);
        if ($this->Cursos->delete($curso)) {
            $this->Flash->success(__('The curso has been deleted.'));
        } else {
            $this->Flash->error(__('The curso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function checklist($id = null)
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            /** @var Array.<Array.<Boolean>> $documentos_estagios */
            $documentos_estagios = [];

            if (isset($data['documentos_estagios'])) {
                $documentos_estagios = $data['documentos_estagios'];
            }

            $DocumentosEstagios = TableRegistry::getTableLocator()->get('DocumentosEstagios');

            $records = [];

            foreach ($documentos_estagios as $estagio_id => $estagio) {
                foreach ($estagio as $documento_id => $documento) {
                    $record = $DocumentosEstagios->find()->where([
                        'documento_id' => $documento_id,
                        'estagio_id' => $estagio_id
                    ])->first();

                    if ($record === null) {
                        $record = $DocumentosEstagios->newEntity([
                            'estagio_id' => $estagio_id,
                            'documento_id' => $documento_id
                        ]);
                    }

                    $record->entregue = !!$documento['entregue'];
                    $records[] = $record;
                }
            }

            if ($DocumentosEstagios->saveMany($records)) {
                $this->Flash->success(__('Changes were saved.'));
            } else {
                $this->Flash->error(__('Changes could not be saved. Please try again.'));
            }
        }

        $this->paginate = [
            'contain' => [
                'Documentos',
                'Empresas',
                'Alunos',
                'Alunos.Cursos',
                'Alunos.Cursos.Documentos',
                'DocumentosEstagios',
            ],
            'conditions' => [
                'Alunos.curso_id' => $id
            ],
            'sortWhitelist' => [
                'Alunos.nome',
                'ano'
            ]
        ];

        $curso = $this->Cursos->get($id, [
            'contain' => [
                'Documentos'
            ]
        ]);

        $Estagios = TableRegistry::getTableLocator()->get('Estagios');
        $estagios = $this->paginate($Estagios);

        $this->set(compact('curso', 'estagios'));
    }
}
