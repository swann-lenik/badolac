<div class='submenu'>
    <?php foreach($modifiable as $t) : ?>
    <a href="<?php f::getUrl("/admin/modify/$t"); ?>" <?php print($table == $t ? "class='active'" : ""); ?>>Table <?php print($t); ?></a>
    <?php endforeach; ?>
</div>

<table id='adminFormAddLineTable'>
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
                    <?php elseif ( strpos($values['columns'][$field]->Comment, "userlist") !== false) : ?>
                        <select name="<?php print($field); ?>" onchange="recValue(<?php print($id); ?>, '<?php print($table); ?>', '<?php print($field); ?>', $(this).val());">
                            <option value="0">-</option>
                            <?php foreach($user as $id_user => $username) : ?>
                            <option value="<?php print($id_user); ?>" <?php print($value == $id_user ? "selected=\"selected\"" : ""); ?>><?php print($username); ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php elseif ( strpos($values['columns'][$field]->Comment, "parentlist") !== false) : ?>
                        <select name="<?php print($field); ?>" onchange="recValue(<?php print($id); ?>, '<?php print($table); ?>', '<?php print($field); ?>', $(this).val());">
                            <?php foreach($parent as $id_parent => $p) : ?>
                            <option value="<?php print($id_parent); ?>" <?php print($value == $id_parent ? "selected=\"selected\"" : ""); ?>><?php print($p->label); ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php else : ?>
                        <input type="text" name="<?php print($field); ?>" value="<?php print($value); ?>" placeholder="<?php print($field); ?>" onblur="recValue(<?php print($id); ?>, '<?php print($table); ?>', '<?php print($field); ?>', $(this).val());" size="10" />
                    <?php endif; ?>
                <?php else : ?>
                    <?php print($val = $value); ?>
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
                    <?php elseif ( strpos($value->Comment, "userlist") !== false) : ?>
                        <select name="<?php print($field); ?>">
                            <option value="0">-</option>
                            <?php foreach($user as $id_user => $username) : ?>
                            <option value="<?php print($id_user); ?>"><?php print($username); ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php elseif ( strpos($value->Comment, "parentlist") !== false) : ?>
                        <select name="<?php print($field); ?>">
                            <?php foreach($parent as $id_parent => $p) : ?>
                            <option value="<?php print($id_parent); ?>"><?php print($p->label); ?></option>
                            <?php endforeach; ?>
                        </select>

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

<?php if ( $table == "page" ) : ?>
<div class="reminder">
    Pour accéder à une page, le lien à saisir se construit de cette forme : <b>"/page/page/[#_de_page]"</b>
</div>
<div class="reminder">
    <u>Exemple :</u> Pour la page <b><?php print($values['datas'][$id]->title); ?></b>, le lien sera "<b>/page/page/<?php print($id); ?></b>"
</div>
<?php endif; ?>