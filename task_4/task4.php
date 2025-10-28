<?php
$json = file_get_contents('mock_deals.json');
$data = json_decode($json, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Сделки</title>
</head>
<body>

<select id="filter">
    <option value="all">Все сделки</option>
    <option value="WON">Только WON</option>
    <option value="LOSE">Только LOSE</option>
</select>

<table>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Статус</th>
        <th>Сумма</th>
    </tr>
    <?php foreach ($data as $deal): ?>
        <tr class="deal" data-status="<?php echo $deal['status']; ?>">
            <td><?php echo $deal['id']; ?></td>
            <td><?php echo $deal['title']; ?></td>
            <td><?php echo $deal['status']; ?></td>
            <td><?php echo $deal['amount']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
    var filter = document.getElementById('filter');
    var rows = document.getElementsByClassName('deal');

    filter.addEventListener('change', function() {
        var status = this.value;

        for (var i = 0; i < rows.length; i++) {
            if (status === 'all' || rows[i].dataset.status === status) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
</script>

</body>
</html>