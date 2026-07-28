<?php
if (!defined('HOST')) define('HOST', 'localhost');
if (!defined('USERNAME')) define('USERNAME', 'root');
if (!defined('PASSWORD')) define('PASSWORD', '');
if (!defined('DATABASE')) define('DATABASE', 'vegefood');

function getDbConnection()
{
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');
	return $conn;
}

function escapeSql($str)
{
	$conn = getDbConnection();
	$escaped = mysqli_real_escape_string($conn, $str);
	mysqli_close($conn);
	return $escaped;
}

/**
 * Su dung cho cac lenh: insert, update, delete
 */
function execute($sql)
{
	$conn = getDbConnection();
	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

/**
 * Thuc hien cau lenh insert va tra ve ID vua insert
 */
function executeGetId($sql)
{
	$conn = getDbConnection();
	mysqli_query($conn, $sql);
	$id = mysqli_insert_id($conn);
	mysqli_close($conn);
	return $id;
}

/**
 * Su dung cho cac lenh: select
 */
function executeResult($sql, $onlyOne = false)
{
	$conn = getDbConnection();
	$resultset = mysqli_query($conn, $sql);

	if (!$resultset) {
		mysqli_close($conn);
		return [];
	}
	if ($onlyOne) {
		$data = mysqli_fetch_array($resultset, MYSQLI_ASSOC);
	} else {
		$data = [];
		while (($row = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) != null) {
			$data[] = $row;
		}
	}
	mysqli_close($conn);

	return $data;
}