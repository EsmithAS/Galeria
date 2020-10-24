<?php
    session_start();
    require_once 'funciones.php';

    $con = conexion();
    $errores = '';

    if( !empty( $_SESSION[ 'nickname' ] ) ) {

        header( 'Location: subir.php' );
        
    }

    if ( $con ) {

        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && $_POST[ 'ingresar' ] ) {

            $nickname = filter_var( trim( $_POST[ 'nickname' ] ) , FILTER_SANITIZE_STRING );
            $password = hash( 'sha512' , filter_var( $_POST[ 'password' ] , FILTER_SANITIZE_STRING ) );

            if( !empty( $nickname ) && !empty( $password ) ) {


                $statement = $con -> prepare( 'SELECT * FROM usuario WHERE nickname = :nickname AND passcrypt = :passcrypt' );
                $statement -> execute( array(
                    'nickname' => $nickname,
                    'passcrypt' => $password
                ) );
            
                $resultado =  $statement -> fetch();
                
                if( $resultado ) {
            
                    $_SESSION[ 'idNickname' ] = $resultado['id'];
                    $_SESSION[ 'nickname' ] = $resultado['nickname'];

                    header( 'Location: subir.php' );

            
                } else {
                    
                    $errores = '- Usuario o contraseña incorrecta <br />';
            
                }

            } else {

                $errores = '- Datos obligatorios (*) <br />';

            }

        }

    }


    require_once 'views/login.view.php';