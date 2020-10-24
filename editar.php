<?php
    session_start();
    require_once 'funciones.php';
    
    $cn = conexion();
    $error = '';
    $accion = 'Edita';
    $pagina_anterior = isset( $_SESSION[ 'pagina_anterior' ] ) ? ( 'index.php?pagina=' . $_SESSION[ 'pagina_anterior' ] ) : 'index.php';

    if( empty( $_SESSION[ 'nickname' ] ) ) {

        header( 'Location: login.php' );

    }
    
    if( $cn ) {
        
        $id = isset( $_GET[ 'id' ] ) ? (int) $_GET[ 'id' ] : false;
        $idUsuario = $_SESSION[ 'idNickname' ];

        $statement = $cn -> prepare( 'SELECT * FROM foto WHERE id = :id AND idUsuario = :idUsuario AND estado = true' );
        $statement -> execute( array( 
            'id' => $id,
            'idUsuario' => $idUsuario
        ) );

        $foto = $statement -> fetch();

        if ( !$foto ) {

            header( 'Location: index.php' );

        } 

        if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset( $_POST[ 'guardar' ] ) ) {
            
            $titulo = filter_var( trim( $_POST[ 'titulo' ] ) , FILTER_SANITIZE_STRING );
            $nomFoto = '';
            $descripcion = filter_var( trim( $_POST[ 'descripcion' ] ) , FILTER_SANITIZE_STRING );
            $nick = $_SESSION[ 'nickname' ];

            $checkImage = @getimagesize( $_FILES[ 'foto' ][ 'tmp_name' ] );

            if ( !empty( $titulo ) && !empty( $descripcion ) ) {

                if ( empty( $_FILES[ 'foto' ][ 'name' ] ) ) {

                    $nomFoto = $_POST[ 'fotoAnt' ] ;
                    
                } else {
                    
                    if ( $checkImage ) {
                        
                        $nomFoto = 'by-' . $nick . '-photo-' . $_FILES[ 'foto' ][ 'name' ] ;
                        move_uploaded_file( $_FILES[ 'foto' ][ 'tmp_name' ] , 'imagenes/' . $nomFoto );

                    } else {

                        $error = 'Formato de imagen incorrecto';

                    }

                }
                
                $statementU = $cn -> prepare( 'UPDATE foto SET titulo = :titulo , img = :imagen , descripcion = :descripcion WHERE id = :id' );
                $statementU -> execute ( array( 
                    'titulo' => $titulo,
                    'imagen' => $nomFoto,
                    'descripcion' => $descripcion,
                    'id' => $id
                ) );
                
                header( 'Location: foto.php?id=' . $id );

            } else {

                $error = 'Rellene los datos correspondientes';

            }

        }


        require_once 'views/subir.view.php';

        

    }
