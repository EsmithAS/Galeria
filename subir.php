<?php
    session_start();
    require_once 'funciones.php';

    $cn = conexion();
    $error = '';
    $accion = 'Sube';

    if( empty( $_SESSION[ 'nickname' ] ) ) {

        header( 'Location: login.php' );

    }

    if( !$cn ){

        $error = 'Tuvimos un error al conectar con la base de datos';

    } else {
        
        if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' && $_FILES[ 'foto' ] ) {

            $nick = $_SESSION[ 'nickname' ];
            $idNick = $_SESSION[ 'idNickname' ];
            $carpeta = 'imagenes/';
            $titulo = filter_var( trim( $_POST[ 'titulo' ] ) , FILTER_SANITIZE_STRING );
            $urlFoto = $carpeta . 'by-' . $nick . '-photo-' . $_FILES[ 'foto' ][ 'name' ];
            $descripcion = filter_var( trim( $_POST[ 'descripcion' ] ) , FILTER_SANITIZE_STRING );

            $check = @getimagesize( $_FILES[ 'foto' ][ 'tmp_name' ] );
            
            if ( !empty( $titulo ) && !empty( $descripcion ) ){

                if( $check ) {

                    move_uploaded_file( $_FILES[ 'foto' ][ 'tmp_name' ] , $urlFoto );

                    $statement = $cn -> prepare( 'INSERT INTO foto ( idUsuario , titulo , img , descripcion , estado ) VALUES ( :idUsuario , :titulo , :img , :descripcion , :estado )' );
                    $statement -> execute ( array(
                        'idUsuario' => ( int ) $idNick,
                        'titulo' => $titulo,
                        'img' => 'by-' . $nick . '-photo-' . $_FILES[ 'foto' ][ 'name' ],
                        'descripcion' => $descripcion,
                        'estado' => true
                    ));

                } else {

                    $error = 'Ingrese una imagen con un formato válido';

                }
                
            } else {
                
                $error = 'Debe llenar los datos solicitados';

            }


        }

        require_once 'views/subir.view.php';
    }
