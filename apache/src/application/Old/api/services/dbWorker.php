<?php

function getDbObject()
{
    $mysqli = new mysqli("db", "admin", "admin", "appDB");
    return $mysqli;
}

function getTools($offset, $limit)
{
    $mysqli = getDbObject();
    $result = $mysqli->query("SELECT * FROM tools LIMIT $limit OFFSET $offset");
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    $mysqli->close();
    return $products;
}

function getUsers($offset, $limit)
{
    $mysqli = getDbObject();
    $result = $mysqli->query("SELECT * FROM users LIMIT $limit OFFSET $offset");
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    $mysqli->close();
    return $users;
}

function addItemToTools($name, $price, $description)
{
    $mysqli = getDbObject();
    $result = $mysqli->query("INSERT INTO tools (product_name, product_price, product_desc) VALUES ('$name', '$price', '$description')");
    $mysqli->close();
    return $result;
}

function addUser($name, $password)
{
    $mysqli = getDbObject();
    $result = $mysqli->query("INSERT INTO users (login, password) VALUES ('$name', '$password')");
    $mysqli->close();
    return $result;
}

function updateToolsInCatalog($id, $name, $price, $description)
{
    $mysqli = getDbObject();
    $result = $mysqli->query("UPDATE tools SET product_name = '$name', product_price = '$price', product_desc = '$description' WHERE id = '$id'");
    $mysqli->close();
    return $result;
}

function deleteToolsItem($id)
{
    $mysqli = getDbObject();
    $result = $mysqli->query("DELETE FROM tools WHERE id = '$id'");
    $mysqli->close();
    return $result;
}

function deleteUser($id)
{
    $mysqli = getDbObject();
    $result = $mysqli->query("DELETE FROM users WHERE id = '$id'");
    $mysqli->close();
    return $result;
}
