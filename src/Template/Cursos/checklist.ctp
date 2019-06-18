<?php
$cabecalhoDocumentos = [];

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso $curso
 * @var \App\Model\Entity\Aluno[] $estagios
 */
?>
<div class="cursos index content">
    <h3><?= __('Checklist') ?></h3>
    <h4 style="border: none;"><?= $curso->nome ?></h4>
    <?= $this->Form->create() ?>
    <?= $this->Form->button(h('Salvar')) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Alunos.nome', 'Aluno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Empresas.nome', 'Empresa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ano') ?></th>
                <?php foreach($curso->documentos as $documento): ?>
                <?php $cabecalhoDocumentos[] = $documento->id; ?>
                <th scope="col"><?= $documento->nome ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estagios as $estagio): ?>
            <?php /** @var \App\Model\Entity\Estagio $estagio */ ?>
            <tr>
                <td><?= $estagio->aluno->nome ?></td>
                <td><?= $estagio->empresa->nome ?></td>
                <td><?= h($estagio->ano) ?></td>
                <?php
                    /** @var \App\Model\Entity\DocumentoEstagio[] $documentos_estagios */
                    $documentos_estagios = $estagio->documentos_estagios_curso;
                    $list = array_map(function($cab) use ($documentos_estagios) {
                        $ret = null;
                        foreach ($documentos_estagios as $de) {
                            if ($de->documento_id === $cab) {
                                $ret = $de;
                                break;
                            }
                        }
                        return $ret;
                    }, $cabecalhoDocumentos);
                ?>
                <?php foreach ($list as $cd): ?>
                <td><?= $this->Form->checkbox('DocumentosEstagios.entregue', [
                    'checked' => $cd->entregue,
                    'name' => "documentos_estagios[{$cd->estagio_id}][{$cd->documento_id}][entregue]"
                ]) ?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Form->end() ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
