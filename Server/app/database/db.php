<?php
session_start();
require_once("connect.php");

function testPrint($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}


// Проверка запроса к базе данных
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

// Запрос на получение определенного количества данных с одной таблицы
function selectAny($table, $params = [], $number = 1)
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE `$key` = '$value'";
            } else {
                $sql = $sql . " AND `$key` = '$value'";
            }
            $i++;
        }
    }
    $sql = $sql . " LIMIT $number";


    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
    if ($number === 1) {
        return $query->fetch();
    }
    return $query->fetchAll();
}

// Вставка в таблицу
function insert($table, $params)
{
    global $pdo;
    $keys = "";
    $values = "";
    foreach ($params as $key => $value) {
        $keys = $keys . " `$key`,";
        $values = $values . " '$value',";
    }
    // Удаляет лишнюю запятую в конце
    $keys = substr_replace($keys, "", -1);
    $values = substr_replace($values, "", -1);

    $sql = "INSERT INTO `$table` ($keys) VALUES($values)";
    $query = $pdo->prepare($sql);
    testPrint($query);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}

// Функция для обновления по id
function update($table, $id, $params)
{
    global $pdo;
    $sql = "UPDATE `$table` SET ";
    foreach ($params as $key => $value) {
        $sql = $sql . " `$key` = '$value',";
    }
    // Удаляет лишнюю запятую в конце
    $sql = substr_replace($sql, "", -1);
    $sql = $sql . " WHERE `id` = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// Функция для удаления по параметру
function delete($table, $param)
{
    global $pdo;
    foreach ($param as $key => $value)
        $sql = "DELETE FROM `$table` WHERE `$key` = '$value'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
