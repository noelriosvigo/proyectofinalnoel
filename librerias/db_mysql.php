<?php

/**
 *	DB MySQL
 *
 *	Descripción: Librería para realizar las tareas más comunes con una base de datos MySQL
 *	Fecha: 20/01/2025
 *	Autor: Juan Pablo Barba Muñoz
 */

/**
 *	Abre una conexión MySQLi con los datos definidos en las constantes
 *
 *	@return Devuelve la conexión si se realiza correctamente o false en caso contrario
 */
function db_open()
{
	try {
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
		if ($conn) {
			mysqli_set_charset($conn, "utf8mb4");
		}
		return $conn;
	} catch (Exception $e) {
		return false;
	}
}


/**
 * Cierra la conexión que se pasa como parámetro
 */
function db_close($conn)
{
	try {
		return mysqli_close($conn);
	} catch (Exception $e) {
		return false;
	}
}

/**
 * Realiza una consulta. Está orientada a consultas SELECT
 *
 * @return array Devuelve un array con los resultados. false en caso contrario
 */
function db_query($conn, $sql, $values = null)
{
    try {
        if (!$conn) {
            throw new Exception("Conexión inválida");
        }

        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . mysqli_error($conn));
        }

        if ($values) {
            $types = str_repeat("s", count($values)); // Asumiendo que todos los valores son strings
            mysqli_stmt_bind_param($stmt, $types, ...$values);
        }

        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if (gettype($res) == 'boolean') {
            return $res;
        } else {
            $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
            mysqli_free_result($res);
            return $data;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


/**
 * Realiza un INSERT. Le pasamos el nombre de la tabla donde queramos insertar los datos
 * y un array asociativo con los datos que queramos insertar. Las claves deben corresponder
 * con campos existentes en la tabla.
 *
 * @param $conn conexión MySQLi que esté abierta
 * @param $table nombre de la tabla
 * @param $dto array asociativo con los datos a insertar
 * @return int Devuelve el id del elemento insertato o false en caso contrario.
 */
function db_insert($conn, $table, $dto) {
    unset($dto['id']); // Eliminamos el ID si está presente

    $fields = implode(', ', array_keys($dto));
    $placeholders = implode(', ', array_fill(0, count($dto), '?'));
    $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) return false;

    $types = str_repeat("s", count($dto)); // Suponiendo que todos los valores son strings
    mysqli_stmt_bind_param($stmt, $types, ...array_values($dto));

    mysqli_stmt_execute($stmt);
    return mysqli_insert_id($conn);
}


/**
 * Realiza un UPDATE. Le pasamos el nombre de la tabla que queramos actualizar,
 * un array asociativo con los datos. Las claves deben corresponder
 * con campos existentes en la tabla. El array debe incluir una clave id y su valor
 *
 * @param $conn conexión MySQLi que esté abierta
 * @param $table nombre de la tabla
 * @param $dto array asociativo con los datos a insertar
 * @return Devuelve el id del elemento insertato o false en caso contrario.
 */
function db_update($conn, $table, $dto) {
    if (!isset($dto['id'])) {
        return false;
    }

    $id = $dto['id'];
    unset($dto['id']);

    $fields = implode('=?, ', array_keys($dto)) . '=?';
    $sql = "UPDATE $table SET $fields WHERE id=?";

    $stmt = mysqli_prepare($conn, $sql);

    $values = array_values($dto);
    $values[] = $id; // Agregamos el ID al final

    $types = str_repeat("s", count($dto)) . "i"; // Tipos de datos (strings + integer para el ID)

    mysqli_stmt_bind_param($stmt, $types, ...$values);
    return mysqli_stmt_execute($stmt);
}


/**
 * Borrar la fila de la tabla cuyo id sea igual al que se pasa por parámetro
 *
 * @param $conn Conexión MySQLi
 * @param $table Nombre de la tabla
 * @param $id id de la fila
 * @return true si se ejecuta corre ctamente
 */
function db_delete_by_id($conn, $table, $id) {
    $stmt = mysqli_prepare($conn, "DELETE FROM $table WHERE id=?");
    if (!$stmt) return false;

    mysqli_stmt_bind_param($stmt, "i", $id); // "i" porque es un número entero
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt) > 0; // Retorna true si se eliminó alguna fila
}

// Verificar si es administrador
function esAdmin() {
    return isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin';
}

// Verificar si es usuario normal
function esUsuario() {
    return isset($_SESSION['rol']) && $_SESSION['rol'] == 'usuario';
}

// Proteger ruta de admin
function protegerAdmin() {
    if (!esAdmin()) {
        header('Location: ../index.php');
        exit();
    }
}

// Proteger ruta de usuario
function protegerUsuario() {
    if (!isset($_SESSION['logged_in'])) {
        header('Location: login.php');
        exit();
    }
}