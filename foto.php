<?php
    session_start();
    require_once 'funciones.php';
    
    $cn = conexion();
    $id = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] : false ;

    if ( !$id ){

        header( 'Location: index.php' );

    }

    if( $cn ){

        $statement = $cn -> prepare( 'SELECT * FROM foto WHERE id = :id AND estado = true' );
        $statement -> execute( array(
            'id' => $id
        ) );
        
        $foto = $statement -> fetch();

        $usFoto = $cn -> prepare( 'SELECT * FROM usuario WHERE id = :id' );
        $usFoto -> execute( array(
            'id' => $foto[ 'idUsuario' ]
        ) );
        $usuario = $usFoto -> fetch();
        $avatar = $usuario[ 'avatar' ] ;
        $nickname = $usuario[ 'nickname' ] ;

        $pagina_anterior = isset( $_SESSION[ 'pagina_anterior' ] ) ? ( 'index.php?pagina=' . $_SESSION[ 'pagina_anterior' ] ) : 'index.php';
        if( empty( $foto ) ){

            header( 'Location: index.php' );

        }

        require_once 'views/foto.view.php';
    }
