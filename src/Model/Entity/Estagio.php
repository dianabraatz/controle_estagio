<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Estagio Entity
 *
 * @property int $aluno_id
 * @property int $empresa_id
 * @property int $id
 * @property int $ano
 *
 * @property \App\Model\Entity\Aluno $aluno
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Documento[] $documentos
 */
class Estagio extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'aluno_id' => true,
        'empresa_id' => true,
        'ano' => true,
        'aluno' => true,
        'empresa' => true,
        'documentos_estagios' => true
    ];

    protected function _getDocumentosEstagiosCurso()
    {
        /** @var \App\Model\Table\DocumentosEstagiosTable $DocumentosEstagios */
        $DocumentosEstagios = TableRegistry::getTableLocator()->get('DocumentosEstagios');

        /** @var \App\Model\Table\DocumentosTable $Documentos */
        $Documentos = TableRegistry::getTableLocator()->get('Documentos');

        $id_documentos =  array_map(function($elem) {
            return $elem->id;
        }, $this->documentos);

        $missing_documentos = $Documentos->find();
        if (count($id_documentos)) {
            $missing_documentos->where([
                'id NOT IN' => $id_documentos
            ]);
        }

        $de = $this->documentos_estagios;

        foreach ($missing_documentos as $md) {
            $de[] = $DocumentosEstagios->newEntity([
                'estagio_id' => $this->id,
                'documento_id' => $md->id,
                'entregue' => false
            ]);
        }

        return $de;
    }
}
