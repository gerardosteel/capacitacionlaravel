 # capacitacionlaravel

#con el comando php artisan -serve se crea un servidor local

#crear rutas o enmascarar las rutas en routes/web.php

#configuracion para conectar a una base de datos en el archivo .env

#en la carptea Layouts va el molde de nuestra pagina

#con el @export y el @yield se renderizan las vistas

#crear una nueva migracion cuando se modifique la base datos, para agregar o cambiar atributos
#php artisan make:migration change_field_nombrecampo_to_nombretabla --table=nombretabla

#para usar el softdelete es agregar la fachada el "use" y aplicarlo con un delete de eloquent, si lo usamos
#con un destroy se eliminara el registro a nivel real y no logico

#para generar datos de prueba con un seeder generamos el archivo semilla con el comando
# php artisan make:seed NombreTablaSingularTablaSeeder

#luego ponemos en el metodo run() los datos que se generaran y luego lo ejecutamos con el comando
#php artisan db:seed

#para crear modelos con artisan con el comando php artisan make:model NombreTablaSingularMayuscula

#para añadir comportamiento a la hora de hacer modificaciones a la tabla se hacen funciones en el modelo de la tabla