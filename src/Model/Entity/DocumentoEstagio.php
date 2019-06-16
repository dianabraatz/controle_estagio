<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentosEstagio Entity
 *
 * @property int $documento_id
 * @property int $estagio_id
 * @property bool $entregue
 * @property \Cake\I18n\FrozenTime|null $data_entrega
 *
 * @property \App\Model\Entity\Documento $documento
 * @property \App\Model\Entity\Estagio $estagio
 */
class DocumentoEstagio extends Entity
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
        'documento_id' => true,
        'estagio_id' => true,
        'entregue' => true,
        'data_entrega' => true,
        'documento' => true,
        'estagio' => true
    ];
}
