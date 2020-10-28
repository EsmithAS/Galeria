<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <link rel="shortcut icon" href="icons/galeria.ico" type="image/x-icon">
    <title>Registrate</title>
    <link rel="stylesheet" href="css/tailwind.min.css">
</head>
<body class="bg-gray-900">
    <div class="container mx-auto">
        <header class="w-4/5 md:w-3/5 xl:w-2/5 mx-auto mb-10 mt-12">
            <h1 class="text-gray-400 text-3xl">Registrate!!</h1>
            <p class="text-gray-700 text-sm">Obten tu nickname en tan solo 3 click.</p>
        </header>
        <section class="w-4/5 md:w-2/5 lg:w-2/4 xl:w-1/4 mx-auto mb-10">
            <div class="w-full">
                <form class="w-full" action="<?php htmlspecialchars( $_SERVER[ 'PHP_SELF' ] ); ?>" method="POST" enctype="multipart/form-data">
                    <div class="w-full flex items-center space-x-5 bg-gray-800 px-8 py-5 rounded-t-lg">
                        <div class="avatar rounded-full bg-gray-900">
                            <label for="foto" class="p-2 sm:p-4 lg:p-5 flex flex-col justify-center items-center cursor-pointer w-full text-gray-500 outline-none bg-transparent">
                                <img src="icons/cargar.svg" alt="" class="w-4 sm:w-5 lg:w-6 h-4 sm:h-5 lg:h-6">
                                <span class="text-xs sm:text-sm">Avatar</span>
                                <input class="hidden" type="file" name="foto" id="foto">
                            </label>
                        </div>
                        <div class="flex flex-col space-y-5">
                            <div class="nickname w-full">
                                <label for="nickname" class="block text-xs text-gray-500"><span class="text-gray-600">(*)</span> Nick:</label>
                                <input id="nickname" name="nickname" type="text" class="w-full px-2 py-px outline-none py- border-b border-gray-900 bg-transparent text-gray-500 text-sm" onKeyup="validar(this.id)">
                            </div>
                            <div class="password w-full">
                                <label for="password" class="block text-xs text-gray-500"><span class="text-gray-600">(*)</span> Password:</label>
                                <input id="password" name="password" type="password" class="w-full px-2 py-px outline-none py- border-b border-gray-900 bg-transparent text-gray-500 text-sm" onKeyup="validar(this.id)">
                            </div>
                        </div>                        
                    </div>
                    <div>
                        <p id="error" class="text-gray-700 text-xs px-2 py-2">
                            <?php echo $errores; ?>
                        </p>
                    </div>
                    <div>
                        <input type="submit" value="Registrar" name="registrar" class="transition duration-500 outline-none cursor-pointer w-full px-4 py-2 text-sm text-teal-400 bg-gray-900 border-b border-gray-900 hover:border-teal-400 shadow-lg">
                    </div>
                    <div class="my-2">
                        <a href="login.php" class="inline-block w-full my-5 text-center text-xs text-teal-500">¿Tienes un nickname?</a>
                    </div>
                </form>

                <div class="w-full flex justify-center">
                    <a href="<?php echo isset( $pagina_anterior ) ? $pagina_anterior : 'index.php'; ?>" class="my-5 px-5 py-1 border border-teal-400 rounded-full text-sm text-teal-400 hover:bg-teal-400 hover:text-teal-900 transition duration-500">Ir a galería</a>
                </div>
            </div>
        </section>
        <footer class="mt-4">
            <p class="text-center text-gray-700">Esmith Alama Sánchez &copy; 2020</p>
        </footer>
    </div>
    <script src="js/app.js"></script>
</body>
</html>