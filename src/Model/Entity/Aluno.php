<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Aluno Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $rg
 * @property string $cpf
 * @property string $email
 * @property int $curso_id
 *
 * @property \App\Model\Entity\Curso $curso
 * @property \App\Model\Entity\Empresa[] $empresas
 */
class Aluno extends Entity
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
        'nome' => true,
        'rg' => true,
        'cpf' => true,
        'email' => true,
        'curso_id' => true,
        'curso' => true,
        'empresas' => true
    ];
}
