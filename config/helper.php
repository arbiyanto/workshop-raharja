<?php

/**
 * Run Query to MySQL
 *
 * @param string $query
 * @param array $data
 * @return \PDO
 */
function runQuery($query, $data = null) {
    global $connection;
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    return $stmt;
}

/**
 * Filter Data
 * Remove every HTML tags and Whitespace from both sides of string
 *
 * @param array | string $data
 * @return array | string
 */
function removeHTML($data) {
	if(is_array($data)) {
		foreach($data as $d_key => $d_val) {
			$data[$d_key] = htmlspecialchars(strip_tags(trim($d_val)));
		}
	}else{
		$data = htmlspecialchars(strip_tags(trim($data)));
	}
	return $data;
}