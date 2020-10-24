<?php
    session_start();
    require_once 'funciones.php';
    $cn = conexion();
    $error = '';

    if ( $cn ){

        $post_pagina = 8;
        $pagina = isset( $_GET[ 'pagina' ] ) ? ( int ) $_GET[ 'pagina' ] : 1 ;
        $inicio = ( $post_pagina * $pagina ) - $post_pagina ;

        $statement = $cn -> prepare( "SELECT SQL_CALC_FOUND_ROWS * FROM foto WHERE estado = true LIMIT $inicio , $post_pagina" );
        $statement -> execute();

        $fotos = $statement -> fetchAll();

        $statement = $cn -> prepare( 'SELECT FOUND_ROWS() as total' );
        $statement -> execute();
        $total_fotos = $statement -> fetch()[ 'total' ];
        $total_paginas = ceil( $total_fotos / $post_pagina );

        if( empty( $fotos ) ){

            if ( $total_fotos > 0 ) {

                header( 'Location: index.php' );

            }

        }

        $idUsuario = !empty( $_SESSION[ 'idNickname' ] ) ? $_SESSION[ 'idNickname' ] : '';
        $usuario = !empty( $_SESSION[ 'nickname' ] ) ? $_SESSION[ 'nickname' ] : '';
        $_SESSION[ 'pagina_anterior' ] = $pagina;
        
        require_once 'views/index.view.php';
        
    }
    

