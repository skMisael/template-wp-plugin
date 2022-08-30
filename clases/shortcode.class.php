<?php 


class shortcode{

    static function show($atribs){
      	global $wpdb;
      	$id = $atribs['id'];
        $tabla = "{$wpdb->prefix}data";
        $query = "SELECT * FROM $tabla WHERE Id = '$id'";
        $datos = $wpdb->get_results($query,ARRAY_A);
       
        $html ='<table class="wp-list-table widefat fixed striped pages">
                <thead>
                    <th >Id</th>
                    <th >Dato 1</th>
                    <th >Dato 2</th>
                </thead>
                <tbody id="the-list">';
                    
                        foreach ($datos as $key => $value) {
                          $html.= "
                                <tr>
                                    <td>".$value['Id']."</td>
                                    <td>".$value['Dato1']."</td>
                                    <td>".$value['Dato2']."</td>                                  
                                </tr>";
                        }

                   
               $html .= '</tbody>
        </table>';
        return $html;
    }



}