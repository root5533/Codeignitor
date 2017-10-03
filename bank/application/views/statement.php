<html>
<head>
    <title>Statement</title>
</head>
<body>

<?php echo form_open("user_transaction/statement_sort"); ?>
<select name="column">
    <option value="id">ID</option>
    <option value="date">Date</option>
    <option value="description">Description</option>
    <option value="debit">Debit</option>
    <option value="credit">Credit</option>
</select>

<input type="text" name="search" placeholder="Search">
<br>
<?php echo form_close(); ?>

<table>
    <tr style="font-weight: bold">
        <td>ID</td>
        <td>Date</td>
        <td>Description</td>
        <td>Debit</td>
        <td>Credit</td>
    </tr>
    <?php foreach ($result->result() as $row) { ?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><?php echo $row['debit'] ?></td>
        <td><?php echo $row['credit'] ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>