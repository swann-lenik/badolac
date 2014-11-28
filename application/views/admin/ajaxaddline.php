        <tr class='line_<?php print($id); ?>'>
            <?php foreach($values['datas'][$id] as $field => $value) : ?>
            <td>
                <?php if ( strpos($values['columns'][$field]->Comment, "modifiable") !== false ) : ?>
                    <?php if ( strpos($values['columns'][$field]->Comment, "textarea") !== false) : ?>
                        <textarea name="<?php print($field); ?>" onblur="recValue(<?php print($id); ?>, '<?php print($table); ?>', '<?php print($field); ?>', $(this).val());"><?php print($value); ?></textarea> 
                    <?php elseif ( strpos($values['columns'][$field]->Comment, "checkbox") !== false) : ?>
                        <input type="checkbox" name="<?php print($field); ?>" <?php print((int)$value == 1 ? " checked=\"checked\" " : ""); ?> onclick="recValue(<?php print($id); ?>, '<?php print($table); ?>', '<?php print($field); ?>', $(this).is(':checked'));" />
                    <?php else : ?>
                        <input type="text" name="<?php print($field); ?>" value="<?php print($value); ?>" placeholder="<?php print($field); ?>" onblur="recValue(<?php print($id); ?>, '<?php print($table); ?>', '<?php print($field); ?>', $(this).val());" size="10" />
                    <?php endif; ?>
                <?php else : ?>
                    <?php print($value); ?>
                <?php endif; ?>
            </td>
            <?php endforeach; ?>
            <td>DELETE</td>
        </tr>
