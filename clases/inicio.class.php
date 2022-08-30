<?php 


class inicio{

    static function Activar(){
         global $wpdb;
        $sql ="CREATE TABLE IF NOT EXISTS {$wpdb->prefix}data(
            `Id` INT NOT NULL AUTO_INCREMENT,
            `Dato1` VARCHAR(45) NULL,
            `Dato2` VARCHAR(45) NULL,
            `ShortCode` VARCHAR(45) NULL,
            PRIMARY KEY (`Id`));";
         $wpdb->query($sql);        
    }

    static function Desactivar(){
        flush_rewrite_rules();
    }   

    static function crearMenu(){
        add_menu_page(
            'Prueba Wp',//Titulo de la pagina
            'Prueba Wp Menu',// Titulo del menu
            'manage_options', // Capability
            plugin_dir_path(__DIR__).'/admin/pantallainicio.php', 
            null, //function del contenido
             '',//icono 20*20
             '3' //priority
        );
    }

}








?>