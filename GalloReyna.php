<?php 
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Plugin Name:       Gallo Reyna
 * Plugin URI:        https://galloreyna.com
 * Description:       Plugin basico de prueba.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Misael Pereyra
 * Author URI:        https://galloreyna.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://galloreyna.com/my-plugin/
 * Text Domain:       gallo-reyna
 * Domain Path:       /languages
 **/

//requires
require_once dirname(__FILE__) . '/clases/inicio.class.php';
require_once dirname(__FILE__) . '/clases/ajaxActions.class.php';
require_once dirname(__FILE__) . '/clases/shortcode.class.php';

//inicio
register_activation_hook(__FILE__,'inicio::Activar');
register_deactivation_hook(__FILE__,'inicio::Desactivar');


//Agregamos al menu de admin
add_action('admin_menu','inicio::crearMenu');




//Agregamos css y js
function addBoostrap($hook){   
    if($hook != "GalloReyna/admin/pantallainicio.php"){//verificamos que sea el mismo url
        return ;
    }
    wp_enqueue_script('bootstrapJs',plugins_url('admin/assets/bootstrap/js/bootstrap.min.js',__FILE__),array('jquery'));//agregamos a la cola
}
add_action('admin_enqueue_scripts','addBoostrap');

function addBootstrapCSS($hook){
    if($hook != "GalloReyna/admin/pantallainicio.php"){
        return ;
    }
    wp_enqueue_style('bootstrapCSS',plugins_url('admin/assets/bootstrap/css/bootstrap.min.css',__FILE__));
}
add_action('admin_enqueue_scripts','addBootstrapCSS');

//Js personalizado
function addJsfunctions($hook){
    if($hook != "GalloReyna/admin/pantallainicio.php"){
        return ;
    }
    wp_enqueue_script('JsFunctions',plugins_url('admin/assets/js/functions.js',__FILE__),array('jquery'));
    wp_localize_script('JsFunctions','SolicitudesAjax',[
        'url' => admin_url('admin-ajax.php'),
        'seguridad' => wp_create_nonce('seg2022')//palabra clave
    ]);//para usar ajax
}
add_action('admin_enqueue_scripts','addJsfunctions');

//agregamos las acciones de ajax
add_action('wp_ajax_agregarData','ajaxActions::agregarData');
add_action('wp_ajax_eliminarData','ajaxActions::eliminarData');


//ShortCode
add_shortcode("ENC","shortcode::show");






?>