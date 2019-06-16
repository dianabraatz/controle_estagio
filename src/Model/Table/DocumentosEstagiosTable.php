<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DocumentosEstagios Model
 *
 * @property \App\Model\Table\DocumentosTable|\Cake\ORM\Association\BelongsTo $Documentos
 * @property \App\Model\Table\EstagiosTable|\Cake\ORM\Association\BelongsTo $Estagios
 *
 * @method \App\Model\Entity\DocumentosEstagio get($primaryKey, $options = [])
 * @method \App\Model\Entity\DocumentosEstagio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DocumentosEstagio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentosEstagio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentosEstagio saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentosEstagio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentosEstagio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentosEstagio findOrCreate($search, callable $callback = null, $options = [])
 */
class DocumentosEstagiosTable extends Table
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

        $this->setTable('documentos_estagios');

        $this->belongsTo('Documentos', [
            'foreignKey' => 'documento_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Estagios', [
            'foreignKey' => 'estagio_id',
            'joinType' => 'INNER'
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
            ->boolean('entregue')
            ->allowEmptyString('entregue', false);

        $validator
            ->dateTime('data_entrega')
            ->allowEmptyDateTime('data_entrega');

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
        $rules->add($rules->existsIn(['documento_id'], 'Documentos'));
        $rules->add($rules->existsIn(['estagio_id'], 'Estagios'));

        return $rules;
    }
}
