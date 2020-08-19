<html>
<body>
    <table>
        <tr>
            <th>Nome</th>
            <th>ID</th>
        </tr>
            <?php foreach ($query->getResult() as $row) : ?>
                    <tr>
                        <td><?php echo $row->file ?></td>
                        <img src="<?php echo $row->desc ?>" width="500" height="600">
                    </tr>
            <?php endforeach ?>
    </table>
</body>
</html>