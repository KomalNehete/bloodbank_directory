<?php
$institutes = Institute::getAll($conn);  // pass $conn to function
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Location</th>
        <th>Contact</th>
    </tr>

    <?php foreach($institutes as $i): ?>
    <tr>
        <td><?= $i['public_id'] ?></td>
        <td><?= $i['name'] ?></td>
        <td><?= $i['type'] ?></td>
        <td><?= $i['location'] ?></td>
        <td><?= $i['contact'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
