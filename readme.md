## Laravel PHP Framework
Presentó pruebas para la empresa Gravility colombia
Este Proyecto se encuentra desplegado en los servidores de Koding un sistema de máquinas virtuales para desarrolladores en la versión gratuita
el servidor después de 30 minutos de inactividad se suspende si encuentran el servidor caído comuniquense a que hora ingresara para activar y mantener activo email: hammer92@hotmail.es celular: 301 275 9504
## Configuración Servidor local
para configurar el proyecto a nivel local ubíquese en la carpeta pública de su servidor y ejecute los siguientes comandos
1. git clone https://github.com/hammer92/Gravility.local.git(previa instalacion y configuracion de git)
2. ingreso a la carpeta y ejecutar el comando (composer install)
3. asignar permisos a la carpeta en el caso de tener servidor linux 
4. copio el archivo .env.example y lo renombró como .env editar y configurar mi acceso a la base de datos
5. php artisan migrate:install (para crear las tablas )
6. php artisan key:generate(generamos la key de seguridad)

