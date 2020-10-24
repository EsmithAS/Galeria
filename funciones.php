<?php
    // error_reporting(0);
    function conexion () {

        try {

            $conexion = new PDO( 'mysql:host=localhost;dbname=db_galeria' , 'root' , '' );
            return $conexion;

        } catch ( PDOException $e ) {

            return false;

        }

    }

    