<div class="view">
    <table>
        <tr>
            <td width="100px" class="text-to-center">
                <?=CHtml::link(CHtml::image($data->icon, $data->name), array('view', 'id'=>$data->id)); ?>
            </td>
            <td width="200px">
                <big><?=CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?></big>
                <br />
                <?=CHtml::encode($data->slogan); ?>
            </td>
            <td>
                <?=$data->short_info; ?>
            </td>
        </tr>
    </table>
</div>