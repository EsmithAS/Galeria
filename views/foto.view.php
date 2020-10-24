<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto</title>
    <link rel="stylesheet" href="css/tailwind.min.css">
</head>
<body class="bg-gray-900 min-h-screen">
    <div class="container mx-auto">
        <header class="w-full bg-gray-900 sticky top-0 py-6 z-10">
            <h1 class="text-center text-white text-3xl"><?php echo !empty( $foto[ 'titulo' ] ) ? $foto[ 'titulo' ] : $foto[ 'img' ] ; ?></h1>
        </header>
        <section class="w-full flex flex-col items-center my-6">
            <div class="mb-24 cont-foto w-3/5 flex flex-col md:flex-row justify-center">
                <div class="relative w-full md:w-2/3">
                    <div class="absolute flex items-center bg-white shadow-lg px-4 py-2 rounded-r-full">
                        <div class="w-6 sm:w-8 lg:w-12 h-6 sm:h-8 lg:h-12 rounded-full bg-gray-400 overflow-hidden">
                            <?php if( !empty( $avatar ) ) :?>
                                <img src="imagenes/avatar/<?php echo $avatar; ?>" alt="<?php echo $foto[ 'titulo' ] ; ?>" alt="" srcset="" class="w-full h-full object-cover">
                            <?php else :?>
                                <span class="flex w-full h-full items-center justify-center text-gray-800 font-bold"><?php echo strtoupper( substr( $nickname , 0 , 1 ) ); ?></span>
                            <?php endif; ?>
                        </div>
                        <h3 class="text-gray-700 text-xs sm:text-base px-2 sm:px-3 lg:px-4"><?php echo $nickname; ?></h3>
                    </div>
                    <img src="imagenes/<?php echo $foto[ 'img' ] ; ?>" alt="<?php echo $foto[ 'titulo' ] ; ?>" class="w-full">
                </div>
                <div class="w-full md:w-64 px-6 py-5 bg-white">
                    <h2 class="text-gray-700 text-md md:text-xl font-semibold">Descripción</h2>
                    <p class="text-gray-700 text-sm md:text-md my-4">
                        <?php echo $foto[ 'descripcion' ] ; ?>
                    </p>
                </div>
            </div>
            <div class="bg-gray-900 w-full pb-20 pt-10 fixed flex justify-center z-10 bottom-0">
                <a href="<?php echo $pagina_anterior; ?>" class="px-5 py-1 border border-teal-400 rounded-full text-sm text-teal-400 hover:bg-teal-400 hover:text-teal-900 transition duration-500">&laquo; Regresar</a>
            </div>
        </section>
    </div>
    <footer class="py-6 bg-gray-900 w-full fixed bottom-0 z-10">
        <p class="text-center text-gray-700 text-sm md:text-md">Esmith Alama Sánchez &copy; 2020</p>
    </footer>
</body>
</html>