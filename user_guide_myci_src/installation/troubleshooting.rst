#####################
Solución de problemas
#####################

Si ocurre que sin importar que ponga en la URL solamente se carga
su página predeterminada, podría ser que su servidor no soporta la
variable PATH_INFO necesaria para las URLs amigables en los motores
de búsqueda. Como primer paso, abra su archivo
application/config/config.php y pruebe otros valores alternativos
para $config['uri_protocol'] que están indicados en los comentarios
del código.

Se le recomendará que pruebe un par de ajustes alternativos. Si
después de haber intentado esto no funciona, tendrá que forzar
MyCI a agregar un signo de interrogación a su URL. Para hacerlo,
abra su archivo application/config/config.php y cambie esto::

	$config['index_page'] = "index.php";

Por esto::

	$config['index_page'] = "index.php?";

