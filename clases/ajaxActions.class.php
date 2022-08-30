<?php 


class ajaxActions{

	static function agregarData(){
		$nonce = $_POST['nonce'];//validacioon
	    if(!wp_verify_nonce($nonce, 'seg2022')){
	        echo 0;
	        return;
	    }

	   $data1 = $_POST['data1'];
	   $data2 = $_POST['data2'];
       global $wpdb;
	   $tabla = "{$wpdb->prefix}data";
	   $datos = [
	      // 'Id' => null,
	      'Dato1' => $data1,
	      'Dato2' => $data2
	   ];
	   $respuesta =  $wpdb->insert($tabla,$datos);



	     return $respuesta;
	}

	static function eliminarData(){
		 $nonce = $_POST['nonce'];
	    if(!wp_verify_nonce($nonce, 'seg2022')){
	        echo 0;
	        return;
	    }

	    $id = $_POST['id'];
	    global $wpdb;
	    $tabla = "{$wpdb->prefix}data";
	    $res = $wpdb->delete($tabla,array('Id' =>$id));
	    return $res;
	}


}









?>