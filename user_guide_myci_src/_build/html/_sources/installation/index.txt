############################
Instrucciones de instalación
############################

MyCI es instalado en cinco pasos:

#. Descomprima el paquete preferiblemente en la ruta que cumple la función
   de *localhost*.
#. Cambie el nombre de la carpeta *MyCI* por un nombre apropiado para su
   proyecto.
#. En el archivo .htaccess también modifique la tercera línea donde dice
   *MyCI* por el nombre elegido para su carpeta.
#. Abra el archivo application/config/config.php con su IDE preferido
   y cambie la base URL si es necesario. Si tiene intención de utilizar
   el cifrado o sesiones, establezca la clave de cifrado (Requiere la
   extensión *Mcrypt*).
#. Si va a usar base de datos, abra el archivo application/config/database.php
   con un IDE y configura su base de datos.

Si usted desea aumentar la seguridad ocultando la ubicación de sus archivos
de MyCI puede cambiar el nombre de las carpetas *system* y *application*
por uno personalizado y más discreto. Si lo decide cambiar los nombres, debe
abrir el archivo index.php principal y establecer las variables $system_path y
$application_folder al principio del archivo con el nuevo nombre elegido.

Para tener una mejor seguridad, tanto la carpeta *system* como *application*
deben estar por encima de la raíz del sitio web, de tal manera que no se pueda
acceder directamente a través de un navegador. Por defecto, los archivos htaccess
son incluidos en cada carpeta para ayudar a prevenir el acceso directo, pero lo
mejor es eliminar por completo los directorios del acceso público en caso de que
haya cambios en la configuración del servidor o no funcione correctamente los
archivos *htaccess* en el servidor.

Una medida de seguridad adicional para tomar en entornos de producción es
deshabilitar el informe de errores de PHP y cualquier otra funcionalidad solamente
de desarrollo. En MyCI, esto se puede hacer mediante el establecimiento del entorno,
que se describe con más detalle en la página <../general/security>`.

¡Y puff eso es todo!

Si eres nuevo en MyCI, por favor lead la sección :doc:`Getting
Started `<../overview/getting_started>` de la guía de usuario
para empezar a aprender cómo construir aplicaciones PHP dinámicas. 

.. toctree::
	:hidden:
	:titlesonly:

	downloads
	self
	upgrading
	troubleshooting

