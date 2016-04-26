<?php
?>
<div id="display_right">
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Project ID</th>
            <th>Supervisor ID</th>
        </tr>

        <?php
        foreach ($users as $user)
        {
            ?>
            <tr>
                <td><?= $user->getId() ?></td>
                <td><?= $user->getUsername() ?></td>
                <td><?= $user->getRole() ?></td>
                <td><?= $user->getProjectId() ?></td>
                <td><?= $user->getSupervisorId() ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>