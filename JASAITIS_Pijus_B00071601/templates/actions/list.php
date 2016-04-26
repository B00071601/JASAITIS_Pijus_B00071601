<?php
?>

<table>
    <tr>
        <th>ID</th>
        <th>Description</th>
        <th>Deadline</th>
        <th>Status</th>
    </tr>

    <?php
    foreach ($actions as $action)
    {
        ?>
        <tr>
            <td><?= $action->getId() ?></td>
            <td><?= $action->getDescription() ?></td>
            <td><?= $action->getDeadline() ?></td>
            <td><?= $action->getStatus() ?></td>
        </tr>
        <?php
    }
    ?>
</table>