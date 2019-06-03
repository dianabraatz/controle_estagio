<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

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
        'empresa' => true
    ];
}
