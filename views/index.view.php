<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <link rel="shortcut icon" href="icons/galeria.ico" type="image/x-icon">
    <title>Galeria</title>
    <link rel="stylesheet" href="css/tailwind.min.css">
</head>
<body class="bg-gray-900 relative w-full min-h-screen">
    <div class="rounded-lg menu bottom-0 right-0 mr-0 my-6 lg:my-10 lg:mr-8 space-y-5 z-10 bg-gray-900 p-1 fixed">            
        <a href="login.php" class="transition duration-500 w-10 h-10 p-2 border-2 border-transparent hover:border-teal-400 flex items-center">
            <img src="icons/cuadro.svg" alt="" > 
        </a>
        <?php if ( $idUsuario !== '' ) :?>
            <a href="cerrar.php" class="transition duration-500 w-10 h-10 p-2 border-2 border-transparent hover:border-teal-400 flex items-center">
                <img src="icons/log-out.svg" alt="" >
            </a>
        <?php endif; ?>
        <?php if ( $usuario == 'esmithas' ) :?>    
            <a href="admin.php" class="transition duration-500 w-10 h-10 p-2 border-2 border-transparent hover:border-teal-400 flex items-center">
                <img src="icons/settings.svg" alt="" > 
            </a>
        <?php endif; ?>
    </div>
    <div class="container mx-auto">
        <header>
            <h1 class="text-white text-center text-2xl md:text-3xl py-10">Galería de fotos</h1>
        </header>
        
        <section class="w-4/5 mx-auto">

            <?php if ( empty( $fotos ) ) :?>
                <div class="flex justify-center items-center w-full h-64">
                    <h3 class="text-center text-gray-700 text-2xl">Sé el primero en compartir tu foto</h3>
                </div>
            <?php else :?>
                <div class="fotos grid grid-col-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <?php foreach( $fotos as $foto ) :?>

                        <div class="foto relative border-4 hover:border-teal-400 transition duration-500 h-40 flex items-center justify-center overflow-hidden">
                            <a href="foto.php?id=<?php echo $foto['id']; ?>">
                                <img src="imagenes/<?php echo $foto['img']; ?>" alt="<?php echo $foto['nombre']; ?>" class="object-cover object-center h-48 w-full">
                            </a>
                            <?php if ( $foto['idUsuario'] === $idUsuario ) :?>
                                <div class="absolute top-0 right-0">
                                    <a href="editar.php?id=<?php echo $foto['id']; ?>" class="transiton duration-500 inline-block w-8 h-8 p-2 inline-flex items-center justify-center rounded-full bg-gray-800 hover:bg-gray-900"><img src="" alt="" srcset="icons/editar.svg"></a>
                                    <a href="eliminar.php?id=<?php echo $foto['id']; ?>" class="transiton duration-500 inline-block w-8 h-8 p-2 inline-flex items-center justify-center rounded-full bg-gray-800 hover:bg-gray-900"><img src="" alt="" srcset="icons/eliminar.svg"></a>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php endforeach ?>
                </div>
                <div class="paginacion mt-5">

                    <?php if( $pagina > 1 ) :?>

                        <a href="index.php?pagina=<?php echo $pagina - 1; ?>" class="float-left flex items-center justify-center w-12 h-12 md:w-auto md:h-auto md:px-4 md:py-1 border border-teal-400 rounded-full text-2xl md:text-sm text-teal-400 hover:bg-teal-400 hover:text-teal-900 transition duration-500">&laquo; <span class="hidden md:inline">Página anterior</span></a>
                    
                    <?php endif ?>
                    <?php if( $pagina != $total_paginas ) :?>

                        <a href="index.php?pagina=<?php echo $pagina + 1; ?>" class="float-right flex items-center justify-center w-12 h-12 md:w-auto md:h-auto md:px-4 md:py-1 border border-teal-400 rounded-full text-2xl md:text-sm text-teal-400 hover:bg-teal-400 hover:text-teal-900 transition duration-500"><span class="hidden md:inline">Página siguiente</span> &raquo;</a>
                        
                    <?php endif ?>
                    
                </div>
            <?php endif ?>
        </section>
        
        <footer class="w-full flex justify-center items-center relative py-4">
            <p class="mt-5 text-gray-700 text-center">
                Esmith Alama Sanchez &copy; 2020
            </p>
        </footer>
    </div>
    <div id="mensaje" class="bg-gray-900 bg-opacity-75 absolute inset-0">
        <div class="bg-gray-900 bg-opacity-75 absolute inset-0 flex flex-col items-center pt-32">
            <div class="my-4 mx-3">
                <h2 class="text-5xl text-gray-400">Hola</h2>
                <p class="text-gray-400">Puedes dejarme un recuerdo desde el siguiente icono</p>
            </div>
            <div class="my-8 flex items-center justify-center space-x-4">
                <span class="w-10 h-10 inline-block">
                    <img src="icons/cuadro.svg" alt=""> 
                </span>
                <span class="w-40 h-px bg-teal-400 inline-block"></span>
                <span class="w-12 h-12 inline-block p-1 border-2 border-teal-400">
                    <img src="icons/cuadro.svg" alt=""> 
                </span>
            </div>
            <div class="my-10">
                <button id="btnCerrar" class="transition duration-500 px-8 py-1 border border-teal-400 text-teal-400 rounded-full hover:bg-teal-400 hover:text-teal-700 focus:outline-none">Entendido</button>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>