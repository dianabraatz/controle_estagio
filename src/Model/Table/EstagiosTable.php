<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estagios Model
 *
 * @property \App\Model\Table\AlunosTable|\Cake\ORM\Association\BelongsTo $Alunos
 * @property \App\Model\Table\EmpresasTable|\Cake\ORM\Association\BelongsTo $Empresas
 *
 * @method \App\Model\Entity\Estagio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Estagio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Estagio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estagio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estagio saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estagio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Estagio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estagio findOrCreate($search, callable $callback = null, $options = [])
 */
class EstagiosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('estagios');
        $this->setDisplayField('ano');
        $this->setPrimaryKey('id');

        $this->belongsTo('Alunos', [
            'foreignKey' => 'aluno_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsToMany('Documentos', [
            'through' => 'DocumentosEstagios',
            'foreignKey' => 'estagio_id',
            'targetForeignKey' => 'documento_id'
        ]);

        $this->hasMany('DocumentosEstagios');
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('ano')
            ->requirePresence('ano', 'create')
            ->allowEmptyString('ano', false);

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
        $rules->add($rules->existsIn(['aluno_id'], 'Alunos'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));

        return $rules;
    }
}
