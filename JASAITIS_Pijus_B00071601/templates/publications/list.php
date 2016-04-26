<?php
?>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>URL</th>
    </tr>

    <?php
    foreach ($publications as $publication)
    {

        /**
         * @var $publication \Itb\Publication
         */
        ?>
        <tr>
            <td><?= $publication->getId() ?></td>
            <td><?= $publication->getTitle() ?></td>
            <td><?= $publication->getAuthor() ?></td>
            <td>
                <a href="<?= $publication->getUrl() ?>"><strong>[Download]</strong></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>