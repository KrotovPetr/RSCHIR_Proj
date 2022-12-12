<style>
    *{
        font-size: 16px;
    }
    /* внешние границы таблицы серого цвета толщиной 1px */
    table {
        border: 1px solid grey;
        margin-left: auto;
        margin-right: auto;
        width:700px;
        height:fit-content;
    }

    /* границы ячеек первого ряда таблицы */
    th {
        border: 1px solid grey;
        padding:10px;
    }

    /* границы ячеек тела таблицы */
    td {
        border: 1px solid grey;
        padding:10px;
    }

    h1 {
        text-align: center;
        margin: 0 0 20px 0;
    }
</style>
<div style="display: flex;flex-direction: column;">
    <h1>Таблица пользователей</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
        </tr>
    <?php
    foreach ($users as $row)
    { echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['surname']}</td></tr>"; } ?>
</div>


