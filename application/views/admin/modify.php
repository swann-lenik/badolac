<div class='submenu'>
    <?php foreach($modifiable as $t) : ?>
    <a href="/codeigniter/index.php/admin/modify/<?php print($t); ?>" <?php print($table == $t ? "class='active'" : ""); ?>>Table <?php print($t); ?></a>
    <?php endforeach; ?>
</div>

<table>
    <thead>
        <tr>
            <?php foreach($values['columns'] as $name => $column) : ?>
            <th><?php print($name); ?></th>
            <?php endforeach; ?>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($values['datas'] as $id => $data) : ?>
        <tr class="line_<?php print($id); ?>">
            <?php foreach($data as $field => $value) : ?>
            <td>
                <?php if ( strpos($values['columns'][$field]->Comment, "modifiable") !== false ) : ?>
                    <?php if ( strpos($values['columns'][$field]->Comment, "textarea") !== false) : ?>
                        <textarea name="<?php print($field); ?>" onblur="recValue(<?php print($id); ?>, '<?php print($table); ?>', '<?php print($field); ?>', $(this).val());"><?php print($value); ?></textarea> 
                    <?php elseif ( strpos($values['columns'][$field]->Comment, "checkbox") !== false) : ?>
                        <input type="checkbox" name="<?php print($field); ?>" <?php print((int)$value == 1 ? " checked=\"checked\" " : ""); ?> value="1" onclick="recValue(<?php print($id); ?>, '<?php print($table); ?>', '<?php print($field); ?>', $(this).is(':checked'));" />
                    <?php else : ?>
                        <input type="text" name="<?php print($field); ?>" value="<?php print($value); ?>" placeholder="<?php print($field); ?>" onblur="recValue(<?php print($id); ?>, '<?php print($table); ?>', '<?php print($field); ?>', $(this).val());" size="10" />
                    <?php endif; ?>
                <?php else : ?>
                    <?php print($value); ?>
                <?php endif; ?>
            </td>
            <?php endforeach; ?>
            <td><a href="javascript:" onclick="delValue('<?php print($table); ?>','<?php print($id); ?>')">DELETE</a></td>
        </tr>
        <?php endforeach; ?>
        <tr class="adminFormAddLineTR">
            <form method="POST" action="#" id="adminFormAddLine">
            <?php foreach($values['columns'] as $field => $value) : ?>
            <td>
                <?php if ( strpos($value->Comment, "modifiable") !== false ) : ?>
                    <?php if ( strpos($value->Comment, "textarea") !== false) : ?>
                        <textarea name="<?php print($field); ?>"></textarea> 
                    <?php elseif ( strpos($value->Comment, "checkbox") !== false) : ?>
                        <input type="checkbox" name="<?php print($field); ?>" />
                    <?php else : ?>
                        <input type="text" name="<?php print($field); ?>" value="" placeholder="<?php print($field); ?>" size="10" />
                    <?php endif; ?>
                <?php else : ?>
                    <?php print("Auto"); ?>
                <?php endif; ?>
            </td>
            <?php endforeach; ?>
            <td><a href="javascript:" onclick="recNewValue('<?php print($table); ?>','<?php print($session['userid']); ?>')">ADD</a></td>
            </form>
        </tr>
    </tbody>
</table>