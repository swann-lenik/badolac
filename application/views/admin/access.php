<pre><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//f::v($pages);
//f::v($users);
?></pre>

<table>
    <thead>
        <tr>
            <th>Utilisateur</th>
            <?php foreach($pages as $controller => $list) : ?>
                <?php foreach($list as $action) : ?>
                <th><?php print($controller . "/" . $action); ?></th>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $username => $granted) : ?>
        <tr>
            <td><?php print($username); ?></td>
            <?php foreach($pages as $controller => $list) : ?>
                <?php foreach($list as $action) : ?>
                <td>
                    <input type="checkbox" name="granted[]" value="<?php print($controller . "/" . $action); ?>" onchange="grantAccess(<?php print($granted['id']); ?>, $(this).val(), $(this).is(':checked'));" <?php print(isset($granted['pages'][$controller][$action]) ? "checked=\"checked\"" : ""); ?> />
                </td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>