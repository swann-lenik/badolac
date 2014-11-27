<form method="POST" action="#">

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
        <tr>
            <?php foreach($data as $field => $value) : ?>
            <td>
                <?php if ( strpos($values['columns'][$field]->Comment, "modifiable") !== false ) : ?>
                    <?php if ( strpos($values['columns'][$field]->Comment, "textarea") !== false) : ?>
                        <textarea name="<?php print($field); ?>[]" onblur="recValue('<?php print($table); ?>', '<?php print($field); ?>', $(this).val());"><?php print($value); ?></textarea> 
                    <?php elseif ( strpos($values['columns'][$field]->Comment, "checkbox") !== false) : ?>
                        <input type="checkbox" name="<?php print($field); ?>[]" <?php print((int)$value == 1 ? " checked=\"checked\" " : ""); ?> onclick="recValue('<?php print($table); ?>', '<?php print($field); ?>', $(this).is(':checked'));" />
                    <?php else : ?>
                        <input type="text" name="<?php print($field); ?>[]" value="<?php print($value); ?>" placeholder="<?php print($field); ?>" onblur="recValue('<?php print($table); ?>', '<?php print($field); ?>', $(this).val());" size="10" />
                    <?php endif; ?>
                <?php else : ?>
                    <?php print($value); ?>
                <?php endif; ?>
            </td>
            <?php endforeach; ?>
            <td>DELETE</td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <?php foreach($values['columns'] as $field => $value) : ?>
            <td>
                <?php if ( strpos($value->Comment, "modifiable") !== false ) : ?>
                    <?php if ( strpos($value->Comment, "textarea") !== false) : ?>
                        <textarea name="<?php print($field); ?>[]" onblur="recValue('<?php print($table); ?>', '<?php print($field); ?>', $(this).val());"></textarea> 
                    <?php elseif ( strpos($value->Comment, "checkbox") !== false) : ?>
                        <input type="checkbox" name="<?php print($field); ?>[]" onclick="recValue('<?php print($table); ?>', '<?php print($field); ?>', $(this).is(':checked'));" />
                    <?php else : ?>
                        <input type="text" name="<?php print($field); ?>[]" value="" placeholder="<?php print($field); ?>" onblur="recValue('<?php print($table); ?>', '<?php print($field); ?>', $(this).val());" size="10" />
                    <?php endif; ?>
                <?php else : ?>
                    <?php print(""); ?>
                <?php endif; ?>
            </td>
            <?php endforeach; ?>
            <td>ADD</td>
        </tr>
    </tbody>
</table>
    
</form>
<?php //echo "<pre>"; var_dump($values['columns']); echo "</pre>"; ?>

<script type="text/javascript">
    function recValue(attr1, attr2, attr3) {
        alert(attr1 + attr2 + attr3);
    }
</script>