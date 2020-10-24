<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir</title>
    <link rel="stylesheet" href="css/tailwind.min.css">
    <style>
        textarea {
            min-height : 70px;
            max-height : 150px;
        }
    </style>
</head>
<body class="bg-gray-900">
    <div class="container mx-auto">
        <header class="mb-6 mt-10">
            <h1 class="text-center text-white text-3xl"><?php echo $accion; ?> tu foto</h1>
        </header>
        <section class="w-full flex flex-col items-center mb-4">
            <form class="cont-foto w-4/5 md:w-3/5 xl:w-2/5" action="<?php htmlspecialchars( $_SERVER[ 'PHP_SELF' ] ); ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-6">
                    <label class="block w-full text-teal-700 text-sm" for="titulo">Título</label>
                    <input class="block w-full text-gray-500 px-4 py-2 outline-none rounded-none bg-transparent border border-gray-700 focus:border-gray-600" type="text" name="titulo" id="titulo" value="<?php echo !empty( $foto ) ? $foto[ 'titulo' ] : '' ; ?>" onKeyup="validar(this.id)">
                </div>
                <div class="my-6">
                    <label class="block w-full text-teal-700 text-sm" for="foto">Foto</label>
                    <label for="foto" class="flex justify-start items-center cursor-pointer w-full text-gray-500 px-4 outline-none rounded-none bg-transparent border border-gray-700 hover:border-gray-600">
                        <img src="icons/cargar.svg" alt="" class="mx-5 my-2">
                        <span class="text-sm">Selecciona la foto</span>
                        <input class="hidden" type="file" name="foto" id="foto">
                        <input type="hidden" name="fotoAnt" value="<?php echo !empty( $foto ) ? $foto[ 'img' ] : '' ; ?>">
                    </label>
                </div>
                <div class="my-6">
                    <label class="block w-full text-teal-700 text-sm" for="descripcion">Descripción</label>
                    <textarea class="block w-full text-gray-500 px-4 py-1 outline-none rounded-none bg-transparent border border-gray-700 focus:border-gray-600" name="descripcion" id="descripcion" cols="30" rows="5" onKeyup="validar(this.id)"><?php echo !empty( $foto ) ? $foto[ 'descripcion' ] : '' ; ?></textarea>
                </div>
                <p id="error" class="text-red-400 text-xs"> <?php echo !empty( $error ) ? $error : '' ; ?> </p>
                <input type="submit" name="guardar" value="Guardar Foto" class="outline-none float-right bg-teal-500 text-teal-900 px-10 py-1 cursor-pointer hover:bg-teal-800 hover:text-teal-400">
            </form>
            <a href="<?php echo isset( $pagina_anterior ) ? $pagina_anterior : 'index.php'; ?>" class="my-5 px-5 py-1 border border-teal-400 rounded-full text-sm text-teal-400 hover:bg-teal-400 hover:text-teal-900 transition duration-500">Ir a galería</a>
        </section>
        <footer class="mt-4">
            <p class="text-center text-gray-700">Esmith Alama Sánchez &copy; 2020</p>
        </footer>
    </div>
    <script src="js/app.js"></script>
</body>
</html>