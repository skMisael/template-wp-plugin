<?php 

function pantallaInicio(){
	global $wpdb;
	$tabla = "{$wpdb->prefix}data";
	$query = "SELECT * FROM $tabla";

    $dataResult = $wpdb->get_results($query,ARRAY_A);
    return $dataResult;
}

?>