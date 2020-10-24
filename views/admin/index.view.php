<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/tailwind.min.css">
</head>
<body>
    <body class="bg-gray-900 w-full h-screen">
        <main class="container mx-auto">
            <nav class="w-full py-5 flex flex-col items-center">
                <h1 class="text-gray-400 font-semibold text-4xl my-4">Fotos</h1>
                <ul class="text-gray-500 text-sm flex justify-end space-x-8">
                    <li class="hover:bg-gray-500 hover:text-gray-900 px-2 py-1 transition duration-500"><a href="#">Fotos</a></li>
                    <li class="hover:bg-gray-500 hover:text-gray-900 px-2 py-1 transition duration-500"><a href="#">Usuarios</a></li>
                    <li class="hover:bg-gray-500 hover:text-gray-900 px-2 py-1 transition duration-500"><a href="#">Configuración</a></li>
                </ul>
            </nav>
            <section class="w-full">
                <table class="w-4/6 mx-auto mt-5">
                    <thead>
                        <tr class="bg-gray-800 text-gray-400">
                            <th class="py-4 text-center">Id</th>
                            <th class="py-4 text-center">Titulo</th>
                            <th class="py-4 text-center">Imagen</th>
                            <th class="py-4 text-center">Propietario</th>
                            <th class="py-4 text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="transition duration-700 text-gray-600 border-l-4 border-transparent hover:border-teal-400 cursor-pointer">
                            <td class="py-4 text-center">1</td>
                            <td class="py-4 text-center">Paseo en familia</td>
                            <td class="py-4 text-center w-20"><img src="imagenes/by-esmithas-photo-IMG-20180305-WA0033.jpg" alt=""></td>
                            <td class="py-4 text-center">Nickanme</td>
                        </tr>
                        <tr class="transition duration-700 text-gray-600 border-l-4 border-transparent hover:border-teal-400 cursor-pointer">
                            <td class="py-4 text-center">1</td>
                            <td class="py-4 text-center">Paseo en familia</td>
                            <td class="py-4 text-center w-20"><img src="imagenes/by-esmithas-photo-IMG-20180305-WA0033.jpg" alt=""></td>
                            <td class="py-4 text-center">Nickanme</td>
                            <td class="text-center">
                                <label class="w-8 h-8 border-2 border-teal-400 rounded-full inline-flex justify-center items-center">
                                    <span id="span2" class="inline-block p-2 bg-teal-400 rounded-full"></span>
                                    <input type="checkbox" name="estado" id="chk2" class="hidden" onclick="estado(this.id)">
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </body>
</body>
</html>
<script>

    function estado ( id ) {
        
        const chk = document.querySelector( '#'+id );
        if (chk.checked) {
            console.log( chk.parentElement);
            
        }


    }
</script>