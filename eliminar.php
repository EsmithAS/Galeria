<?php
    session_start();
    require_once 'funciones.php';
    $con = conexion();
    
    if ( empty( $_SESSION[ 'nickname' ] ) ) {

        header( 'Location: login.php' );

    }

    if ( $con ) {
        
        $id = isset( $_GET[ 'id' ] ) ? (int) $_GET[ 'id' ] : false;
        $idUsuario = $_SESSION[ 'idNickname' ];

        if( $id ) {

            $statement = $con -> prepare( 'UPDATE foto SET estado = false WHERE id = :id AND idUsuario = :idUsuario' );
            $statement -> execute( array(
                'id' => $id,
                'idUsuario' => $idUsuario
            ) );

            header( 'Location: index.php' );

        } else {

            header( 'Location: index.php' );
            
        }

    } else {

        header( 'Location: index.php' );

    }
