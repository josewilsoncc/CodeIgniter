###########################
Requerimientos del servidor
###########################

Se recomienda la versión 5.4 de `PHP <http://www.php.net/>`_ o posterior.

Se puede trabajar en la versión 5.2.4, pero se recomienda encarecidamente
no usar dicha versión, debido a los posibles problemas de seguridad y
rendimiento, así como características que faltan en ella.

Se requiere una base de datos para la mayoría de aplicaciones web. Las
bases de datos soportadas actualmente son:

  - MySQL (5.1+) a través de los drivers *mysql* (deprecated), *mysqli* y *pdo*
  - Oracle a través de los drivers *oci8* y *pdo*
  - PostgreSQL a través de los drivers *postgre* y *pdo*
  - MS SQL a través de los drivers *mssql*, *sqlsrv* (versión 2005 y above solamente) y *pdo*
  - SQLite a través de los drivers *sqlite* (versión 2), *sqlite3* (versión 3) y *pdo*
  - CUBRID a través de los drivers *cubrid* y *pdo*
  - Interbase/Firebird a través de los drivers *ibase* y *pdo*
  - ODBC a través de los drivers *odbc* y *pdo* (usted debe saber que ODBC es en realidad una capa de abstracción)