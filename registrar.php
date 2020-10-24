<?php
    session_start();
    require_once 'funciones.php';
    $con = conexion();
    $errores = '';

    if( !empty( $_SESSION[ 'nickname' ] ) ) {

        header( 'Location: subir.php' );

    }
    
    if ( $con ) {

        if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset( $_POST[ 'registrar' ] ) ) {

            $nick = filter_var( trim( $_POST[ 'nickname' ] ) , FILTER_SANITIZE_STRING );
            $pass = filter_var( $_POST[ 'password' ] , FILTER_SANITIZE_STRING );

            $imagen = empty( $_FILES[ 'foto' ]['name'] ) ? false : $_FILES[ 'foto' ][ 'tmp_name' ] ;
            
            if ( empty( $nick ) || empty( $pass ) ) {

                $errores = '- Datos oblogatorios * <br />';

            } else {

                if ( strpos( $nick , ' ' ) > 0 ) {

                    $errores = '- El nickname no debe llevar espacio <br />';
    
                }

            }

            if( $imagen ) {

                if ( !@getimagesize( $imagen ) ) {

                    $errores .= '- Formato de imagen no admitido <br />';

                }

            } else {

                $imagen = '';

            }

            $statement = $con -> prepare( 'SELECT COUNT(*) total FROM usuario WHERE nickname = :nickname' );
            $statement -> execute( array(
                'nickname' => $nick
            ) );

            $total =  (int) $statement -> fetch()[ 'total' ];

            if ( $total !== 0 ) {

                $errores .= '- El nickname ya está en uso <br />';

            }

            if ( empty( $errores ) ) {

                if( !empty( $imagen ) ) {

                    move_uploaded_file( $imagen , 'imagenes/avatar/'. 'by-' . $nick . '-photo-' . $_FILES[ 'foto' ][ 'name' ]  );
                    $imagen = 'by-' . $nick . '-photo-' . $_FILES[ 'foto' ][ 'name' ];
                
                }

                $passcrypt = hash( 'sha512' , $pass );

                $statement = $con -> prepare( 'INSERT INTO usuario ( id , nickname , pass , passcrypt , avatar ) VALUES ( null , :nickname, :pass, :passcrypt, :avatar )' );
                $statement -> execute( array(
                    'nickname' => $nick,
                    'pass' => $pass,
                    'passcrypt' => $passcrypt,
                    'avatar' => $imagen
                ) );
                
                header( 'Location: login.php' );

            }


        }
        
    }
    
    require_once 'views/registrar.view.php';