<style>
    table {
        width:500px;
        border: 1px solid grey;
        margin-left: auto;
        margin-right: auto;
    }

    th {
        height:30px;
        border: 1px solid grey;
        font-size: 18px;
    }

    td {
        height: 30px;
        border: 1px solid grey;
        font-size: 18px;
    }

    h1 {
        text-align: center;
    }
</style>
<div style="display: flex;flex-direction: column;">
    <a href="index.html">Назад</a>
    <h1>Наш товар</h1>
    <table>
        <tr>
            <th>Desc</th>
            <th>Price</th>
        </tr>
    <?php
    $id = 'id';
    $lang = '';
    if ($lang == 'en'){
        $products = [];
        foreach ($products as $row){
            echo "
        <tr>
            <td>
                <a href='http://localhost:8006/product?ID={$row['ID']}'>{$row['description']}</a>
            </td>
            <td>{$row['price']}</td>
        </tr>
        ";
        }
    }
    else {
        foreach ($products as $row){
            echo "
        <tr>
            <td>
                <a href='http://localhost:8006/product?ID={$row['ID']}'>{$row['description']}</a>
            </td>
            <td>{$row['price']}</td>
        </tr>
        ";
        }
    }?>
</div>

