###################
Registro de cambios
###################

En CI Version 3.0 (Planeado)
============================

Release Date: Not Released

-  License

   -  CodeIgniter has been relicensed with the `MIT License <http://opensource.org/licenses/MIT>`_, eliminating its old proprietary licensing.

-  General Changes

   -  PHP 5.1.6 is no longer supported. CodeIgniter now requires PHP 5.2.4 and recommends PHP 5.4+ or newer to be used.
   -  Changed filenaming convention (class file names now must be Ucfirst and everything else in lowercase).
   -  Changed the default database driver to 'mysqli' (the old 'mysql' driver is DEPRECATED).
   -  ``$_SERVER['CI_ENV']`` can now be set to control the ``ENVIRONMENT`` constant.
   -  Added an optional backtrace to php-error template.
   -  Added Android to the list of user agents.
   -  Added Windows 7, Windows 8, Windows 8.1, Android, Blackberry, iOS and PlayStation 3 to the list of user platforms.
   -  Added Fennec (Firefox for mobile) to the list of mobile user agents.
   -  Ability to log certain error types, not all under a threshold.
   -  Added support for pem, p10, p12, p7a, p7c, p7m, p7r, p7s, crt, crl, der, kdb, rsa, cer, sst, csr Certs to mimes.php.
   -  Added support for pgp, gpg, zsh and cdr files to mimes.php.
   -  Added support for 3gp, 3g2, mp4, wmv, f4v, vlc Video files to mimes.php.
   -  Added support for m4a, aac, m4u, xspf, au, ac3, flac, ogg, wma Audio files to mimes.php.
   -  Added support for kmz and kml (Google Earth) files to mimes.php.
   -  Added support for ics Calendar files to mimes.php.
   -  Added support for rar, jar and 7zip archives to mimes.php.
   -  Updated support for xml ('application/xml') and xsl ('application/xml', 'text/xsl') files in mimes.php.
   -  Updated support for doc files in mimes.php.
   -  Updated support for docx files in mimes.php.
   -  Updated support for php files in mimes.php.
   -  Updated support for zip files in mimes.php.
   -  Updated support for csv files in mimes.php.
   -  Added Romanian, Greek, Vietnamese and Cyrilic characters in *application/config/foreign_characters.php*.
   -  Changed logger to only chmod when file is first created.
   -  Removed previously deprecated SHA1 Library.
   -  Removed previously deprecated use of ``$autoload['core']`` in *application/config/autoload.php*.
      Only entries in ``$autoload['libraries']`` are auto-loaded now.
   -  Removed previously deprecated EXT constant.
   -  Updated all classes to be written in PHP 5 style, with visibility declarations and no ``var`` usage for properties.
   -  Added an Exception handler.
   -  Moved error templates to *application/views/errors/* and made the path configurable via ``$config['error_views_path']``.
   -  Added support non-HTML error templates for CLI applications.
   -  Moved the Log class to *application/core/*
   -  Global config files are loaded first, then environment ones. Environment config keys overwrite base ones, allowing to only set the keys we want changed per environment.
   -  Changed detection of ``$view_folder`` so that if it's not found in the current path, it will now also be searched for under the application folder.
   -  Path constants BASEPATH, APPPATH and VIEWPATH are now (internally) defined as absolute paths.
   -  Updated email validation methods to use ``filter_var()`` instead of PCRE.
   -  Changed environment defaults to report all errors in *development* and only fatal ones in *testing*, *production* but only display them in *development*.
   -  Updated *ip_address* database field lengths from 16 to 45 for supporting IPv6 address on :doc:`Trackback Library <libraries/trackback>` and :doc:`Captcha Helper <helpers/captcha_helper>`.
   -  Removed *cheatsheets* and *quick_reference* PDFs from the documentation.
   -  Added availability checks where usage of dangerous functions like ``eval()`` and ``exec()`` is required.
   -  Added support for changing the file extension of log files using ``$config['log_file_extension']``.
   -  Added support for turning newline standardization on/off via ``$config['standardize_newlines']`` and set it to FALSE by default.
   -  Added configuration setting ``$config['composer_autoload']`` to enable loading of a `Composer <https://getcomposer.org/>`_ auto-loader.
   -  Removed the automatic conversion of 'programmatic characters' to HTML entities from the :doc:`URI Library <libraries/uri>`.
   -  Changed log messages that say a class or file was loaded to "info" level instead of "debug", so that they don't pollute log files when ``$config['log_threshold']`` is set to 2 (debug).

-  Helpers

   -  :doc:`Date Helper <helpers/date_helper>` changes include:

      - Added an optional third parameter to :func:`timespan()` that constrains the number of time units displayed.
      - Added an optional parameter to :func:`timezone_menu()` that allows more attributes to be added to the generated select tag.
      - Added function :func:`date_range()` that generates a list of dates between a specified period.
      - Deprecated ``standard_date()``, which now just uses the native ``date()`` with `DateTime constants <http://www.php.net/manual/en/class.datetime.php#datetime.constants.types>`_.
      - Changed :func:`now()` to work with all timezone strings supported by PHP.
      - Changed :func:`days_in_month()` to use the native ``cal_days_in_month()`` PHP function, if available.

   -  :doc:`URL Helper <helpers/url_helper>` changes include:

      - Deprecated *separator* options **dash** and **underscore** for function :func:`url_title()` (they are only aliases for '-' and '_' respectively).
      - :func:`url_title()` will now trim extra dashes from beginning and end.
      - :func:`anchor_popup()` will now fill the *href* attribute with the URL and its JS code will return FALSE instead.
      - Added JS window name support to the :func:`anchor_popup()` function.
      - Added support for menubar attribute to the :func:`anchor_popup()`.
      - Added support (auto-detection) for HTTP/1.1 response codes 303, 307 in :func:`redirect()`.
      - Changed :func:`redirect()` to choose the **refresh** method only on IIS servers, instead of all servers on Windows (when **auto** is used).
      - Changed :func:`anchor()`, :func:`anchor_popup()`, and :func:`redirect()` to support protocol-relative URLs (e.g. *//ellislab.com/codeigniter*).

   -  :doc:`HTML Helper <helpers/html_helper>` changes include:

      - Added more doctypes.
      - Changed application and environment config files to be loaded in a cascade-like manner.
      - Changed :func:`doctype()` to cache and only load once the doctypes array.
      - Deprecated functions ``nbs()`` and ``br()``, which are just aliases for the native ``str_repeat()`` with ``&nbsp;`` and ``<br />`` respectively.

   -  :doc:`Inflector Helper <helpers/inflector_helper>` changes include:

      - Changed :func:`humanize()` to allow passing an input separator as its second parameter.
      - Changed :func:`humanize()` and :func:`underscore()` to utilize `mbstring <http://php.net/mbstring>`_, if available.
      - Changed :func:`plural()` and :func:`singular()` to avoid double pluralization and support more words.

   -  :doc:`Download Helper <helpers/download_helper>` changes include:

      - Added an optional third parameter to :func:`force_download()` that enables/disables sending the actual file MIME type in the Content-Type header (disabled by default).
      - Added a work-around in :func:`force_download()` for a bug Android <= 2.1, where the filename extension needs to be in uppercase.
      - Added support for reading from an existing file path by passing NULL as the second parameter to :func:`force_download()` (useful for large files and/or safely transmitting binary data).

   -  :doc:`Form Helper <helpers/form_helper>` changes include:

      - :func:`form_dropdown()` will now also take an array for unity with other form helpers.
      - :func:`form_prep()` is now DEPRECATED and only acts as an alias for :doc:`common function <general/common_functions>` :func:`html_escape()`.

   -  :doc:`Security Helper <helpers/security_helper>` changes include:

      - :func:`do_hash()` now uses PHP's native ``hash()`` function (supporting more algorithms) and is deprecated.
      - :func:`strip_image_tags()` is now an alias for the same method in the :doc:`Security Library <libraries/security>`.

   -  :doc:`Smiley Helper <helpers/smiley_helper>` changes include:

      - Deprecated the whole helper as too specific for CodeIgniter.
      - Removed previously deprecated function ``js_insert_smiley()``.
      - Changed application and environment config files to be loaded in a cascade-like manner.
      - The smileys array is now cached and loaded only once.

   -  :doc:`File Helper <helpers/file_helper>` changes include:

      - :func:`set_realpath()` can now also handle file paths as opposed to just directories.
      - Added an optional paramater to :func:`delete_files()` to enable it to skip deleting files such as *.htaccess* and *index.html*.
      - Deprecated function ``read_file()`` - it's just an alias for PHP's native ``file_get_contents()``.

   -  :doc:`String Helper <helpers/string_helper>` changes include:

      - Deprecated function ``repeater()`` - it's just an alias for PHP's native ``str_repeat()``.
      - Deprecated function ``trim_slashes()`` - it's just an alias for PHP's native ``trim()`` (with a slash as its second argument).
      - Deprecated randomization type options **unique** and **encrypt** for funcion :func:`random_string()` (they are only aliases for **md5** and **sha1** respectively).

   -  :doc:`CAPTCHA Helper <helpers/captcha_helper>` changes include:

      - Added *word_length* and *pool* options to allow customization of the generated word.
      - Added *colors* configuration to allow customization for the *background*, *border*, *text* and *grid* colors.
      - Added *filename* to the returned array elements.
      - Updated to use `imagepng()` in case that `imagejpeg()` isn't available.
      - Added **font_size** option to allow customization of font size.
      - Added **img_id** option to set id attribute of captcha image.

   -  :doc:`Text Helper <helpers/text_helper>` changes include:

      - Changed the default tag for use in :func:`highlight_phrase()` to ``<mark>`` (formerly ``<strong>``).
      - Changed :func:`character_limiter()`, :func:`word_wrap()` and :func:`ellipsize()` to utilize `mbstring <http://php.net/mbstring>`_ or `iconv <http://php.net/iconv>`_, if available.

   -  :doc:`Directory Helper <helpers/directory_helper>` :func:`directory_map()` will now append ``DIRECTORY_SEPARATOR`` to directory names in the returned array.
   -  :doc:`Array Helper <helpers/array_helper>` :func:`element()` and :func:`elements()` now return NULL instead of FALSE when the required elements don't exist.
   -  :doc:`Language Helper <helpers/language_helper>` :func:`lang()` now accepts an optional list of additional HTML attributes.
   -  Deprecated the :doc:`Email Helper <helpers/email_helper>` as its ``valid_email()``, ``send_email()`` functions are now only aliases for PHP native functions ``filter_var()`` and ``mail()`` respectively.

-  Database

   -  DEPRECATED the 'mysql', 'sqlite', 'mssql' and 'pdo/dblib' (also known as 'pdo/mssql' or 'pdo/sybase') drivers.
   -  Added **dsn** configuration setting for drivers that support DSN strings (PDO, PostgreSQL, Oracle, ODBC, CUBRID).
   -  Added **schema** configuration setting (defaults to *public*) for drivers that might need it (currently used by PostgreSQL and ODBC).
   -  Added subdrivers support (currently only used by PDO).
   -  Added an optional database name parameter to ``db_select()``.
   -  Removed ``protect_identifiers()`` and renamed internal method ``_protect_identifiers()`` to it instead - it was just an alias.
   -  Renamed internal method ``_escape_identifiers()`` to ``escape_identifiers()``.
   -  Updated ``escape_identifiers()`` to accept an array of fields as well as strings.
   -  MySQL and MySQLi drivers now require at least MySQL version 5.1.
   -  Added a ``$persistent`` parameter to ``db_connect()`` and changed ``db_pconnect()`` to be an alias for ``db_connect(TRUE)``.
   -  ``db_set_charset()`` now only requires one parameter (collation was only needed due to legacy support for MySQL versions prior to 5.1).
   -  ``db_select()`` will now always (if required by the driver) be called by ``db_connect()`` instead of only when initializing.
   -  Replaced the ``_error_message()`` and ``_error_number()`` methods with ``error()``, which returns an array containing the last database error code and message.
   -  Improved ``version()`` implementation so that drivers that have a native function to get the version number don't have to be defined in the core ``DB_driver`` class.
   -  Added capability for packages to hold *config/database.php* config files.
   -  Added MySQL client compression support.
   -  Added encrypted connections support (for *mysql*, *sqlsrv* and PDO with *sqlsrv*).
   -  Removed :doc:`Loader Class <libraries/loader>` from Database error tracing to better find the likely culprit.
   -  Added support for SQLite3 database driver.
   -  Added Interbase/Firebird database support via the *ibase* driver.
   -  Added ODBC support for ``create_database()``, ``drop_database()`` and ``drop_table()`` in :doc:`Database Forge <database/forge>`.
   -  Added **save_queries** configuration setting to *application/config/database.php* (defaults to ``TRUE``).
   -  Added support to binding arrays as ``IN()`` sets in ``query()``.

   -  :doc:`Query Builder <database/query_builder>` changes include:

      - Renamed the Active Record class to Query Builder to remove confusion with the Active Record design pattern.
      - Added the ability to insert objects with ``insert_batch()``.
      - Added new methods that return the SQL string of queries without executing them: ``get_compiled_select()``, ``get_compiled_insert()``, ``get_compiled_update()``, ``get_compiled_delete()``.
      - Added an optional parameter that allows to disable escaping (useful for custom fields) for methods ``join()``, ``order_by()``, ``where_in()``, ``or_where_in()``, ``where_not_in()``, ``or_where_not_in()``, ``insert()``, ``insert_batch()``.
      - Added support for ``join()`` with multiple conditions.
      - Added support for *USING* in ``join()``.
      - Added support for *EXISTS* in ``where()``.
      - Added seed values support for random ordering with ``order_by(seed, 'RANDOM')``.
      - Changed ``limit()`` to ignore NULL values instead of always casting to integer.
      - Changed ``offset()`` to ignore empty values instead of always casting to integer.
      - Methods ``insert_batch()`` and ``update_batch()`` now return an integer representing the number of rows affected by them.
      - Methods ``where()``, ``or_where()``, ``having()`` and ``or_having()`` now convert trailing  ``=`` and ``<>``,  ``!=`` SQL operators to ``IS NULL`` and ``IS NOT NULL`` respectively when the supplied comparison value is ``NULL``.
      - Added method chaining support to ``reset_query()``, ``start_cache()``, ``stop_cache()`` and ``flush_cache()``.

   -  :doc:`Database Results <database/results>` changes include:

      - Added a constructor to the ``DB_result`` class and moved all driver-specific properties and logic out of the base ``DB_driver`` class to allow better abstraction.
      - Added method ``unbuffered_row()`` for fetching a row without prefetching the whole result (consume less memory).
      - Renamed former method ``_data_seek()`` to ``data_seek()`` and made it public.

   -  Improved support for the MySQLi driver, including:

      - OOP style usage of the PHP extension is now used, instead of the procedural aliases.
      - Server version checking is now done via ``mysqli::$server_info`` instead of running an SQL query.
      - Added persistent connections support for PHP >= 5.3.
      - Added support for configuring socket pipe connections.
      - Added support for ``backup()`` in :doc:`Database Utilities <database/utilities>`.
      - Changed methods ``trans_begin()``, ``trans_commit()`` and ``trans_rollback()`` to use the PHP API instead of sending queries.

   -  Improved support of the PDO driver, including:

      - Added support for ``create_database()``, ``drop_database()`` and ``drop_table()`` in :doc:`Database Forge <database/forge>`.
      - Added support for ``list_fields()`` in :doc:`Database Results <database/results>`.
      - Subdrivers are now isolated from each other instead of being in one large class.

   -  Improved support of the PostgreSQL driver, including:

      - ``pg_version()`` is now used to get the database version number, when possible.
      - Added ``db_set_charset()`` support.
      - Added support for ``optimize_table()`` in :doc:`Database Utilities <database/utilities>` (rebuilds table indexes).
      - Added boolean data type support in ``escape()``.
      - Added ``update_batch()`` support.
      - Removed ``limit()`` and ``order_by()`` support for *UPDATE* and *DELETE* queries as PostgreSQL does not support those features.
      - Added a work-around for dead persistent connections to be re-created after a database restart.
      - Changed ``db_connect()`` to include the (new) **schema** value into Postgre's **search_path** session variable.
      - ``pg_escape_literal()`` is now used for escaping strings, if available.

   -  Improved support of the CUBRID driver, including:

      - Added DSN string support.
      - Added persistent connections support.
      - Improved ``list_databases()`` in :doc:`Database Utility <database/utilities>` (until now only the currently used database was returned).

   -  Improved support of the MSSQL and SQLSRV drivers, including:

      - Added random ordering support.
      - Added support for ``optimize_table()`` in :doc:`Database Utility <database/utilities>`.
      - Added escaping with *QUOTE_IDENTIFIER* setting detection.
      - Added port handling support for UNIX-based systems (MSSQL driver).
      - Added *OFFSET* support for SQL Server 2005 and above.
      - Added ``db_set_charset()`` support (MSSQL driver).
      - Added a *scrollable* property to enable configuration of the cursor to use (SQLSRV driver).
      - Added support and auto-detection for the ``SQLSRV_CURSOR_CLIENT_BUFFERED`` scrollable cursor flag (SQLSRV driver).
      - Changed default behavior to not use ``SQLSRV_CURSOR_STATIC`` due to performance issues (SQLSRV driver).

   -  Improved support of the Oracle (OCI8) driver, including:

      - Added DSN string support (Easy Connect and TNS).
      - Added support for ``drop_table()`` in :doc:`Database Forge <database/forge>`.
      - Added support for ``list_databases()`` in :doc:`Database Utilities <database/utilities>`.
      - Generally improved for speed and cleaned up all of its components.
      - ``num_rows()`` is now only called explicitly by the developer and no longer re-executes statements.

   -  Improved support of the SQLite driver, including:

      - Added support for ``replace()`` in :doc:`Query Builder <database/query_builder>`.
      - Added support for ``drop_table()`` in :doc:`Database Forge <database/forge>`.

   -  :doc:`Database Forge <database/forge>` changes include:

      - Added an optional second parameter to ``drop_table()`` that allows adding the **IF EXISTS** condition, which is no longer the default.
      - Added support for passing a custom database object to the loader.
      - Added support for passing custom table attributes (such as ``ENGINE`` for MySQL) to ``create_table()``.
      - Added support for usage of the *FIRST* clause in ``add_column()`` for MySQL and CUBRID.
      - Added partial support for field comments (MySQL, PostgreSQL, Oracle).
      - Deprecated ``add_column()``'s third method. *AFTER* clause should now be added to the field definition array instead.
      - Overall improved support for all of the drivers.

   -  :doc:`Database Utility <database/utilities>` changes include:

      - Added support for passing a custom database object to the loader.
      - Modified the class to no longer extend :doc:`Database Forge <database/forge>`, which has been a deprecated behavior for awhile.
      - Overall improved support for all of the drivers.
      - Added *foreign_key_checks* option to MySQL/MySQLi backup, allowing statement to disable/re-enable foreign key checks to be inserted into the backup output.

-  Libraries

   -  Added a new :doc:`Encryption Library <libraries/encryption>` to replace the old, largely insecure :doc:`Encrypt Library <libraries/encrypt>`.

   -  :doc:`Encrypt Library <libraries/encrypt>` changes include:

      -  Deprecated the library in favor of the new :doc:`Encryption Library <libraries/encryption>`.
      -  Added support for hashing algorithms other than SHA1 and MD5.
      -  Removed previously deprecated ``sha1()`` method.

   -  :doc:`Session Library <libraries/sessions>` changes include:

      -  Completely re-written the library to use self-contained drivers via ``$config['sess_driver']``.
      -  Added 'files', 'database', 'redis' and 'memcached' drivers (using 'files' by default).
      -  Added ``$config['sess_save_path']`` setting to specify where the session data is stored, depending on the driver.
      -  Dropped support for storing session data in cookies (which renders ``$config['sess_encrypt_cookie']`` useless and is therefore also removed).
      -  Dropped official  support for storing session data in databases other than MySQL and PostgreSQL.
      -  Changed table structure for the 'database' driver.
      -  Added a new **tempdata** feature that allows setting userdata items with expiration time (``mark_as_temp()``, ``tempdata()``, ``set_tempdata()``, ``unset_tempdata()``).
      -  Changed method ``keep_flashdata()`` to also accept an array of keys.
      -  Changed methods ``userdata()``, ``flashdata()`` to return an array of all userdata/flashdata when no parameter is passed.
      -  Deprecated method ``all_userdata()`` - it is now just an alias for ``userdata()`` with no parameters.
      -  Added method ``has_userdata()`` that verifies the existence of a userdata item.
      -  Added *debug* level log messages for key events in the session validation process.
      -  Dropped support for the *sess_match_useragent* option.

   -  :doc:`File Uploading Library <libraries/file_uploading>` changes include:

      -  Added method chaining support.
      -  Added support for using array notation in file field names.
      -  Added **max_filename_increment** and **file_ext_tolower** configuration settings.
      -  Added **min_width** and **min_height** configuration settings for images.
      -  Added **mod_mime_fix** configuration setting to disable suffixing multiple file extensions with an underscore.
      -  Added the possibility pass **allowed_types** as an array.
      -  Added an ``$index`` parameter to the method ``data()``.
      -  Added a ``$reset`` parameter to method ``initialize()``.
      -  Removed method ``clean_file_name()`` and its usage in favor of :doc:`Security Library <libraries/security>`'s ``sanitize_filename()``.
      -  Removed method ``mimes_types()``.
      -  Changed ``CI_Upload::_prep_filename()`` to simply replace all (but the last) dots in the filename with underscores, instead of suffixing them.

   -  :doc:`Calendar Library <libraries/calendar>` changes include:

      -  Added method chaining support.
      -  Added configuration to generate days of other months instead of blank cells.
      -  Added auto-configuration for *next_prev_url* if it is empty and *show_prev_next* is set to TRUE.
      -  Added support for templating via an array in addition to the encoded string.
      -  Changed method ``get_total_days()`` to be an alias for :doc:`Date Helper <helpers/date_helper>` :func:`days_in_month()`.

   -  :doc:`Cart Library <libraries/cart>` changes include:

      -  Deprecated the library as too specific for CodeIgniter.
      -  Added method ``remove()`` to remove a cart item, updating with quantity of 0 seemed like a hack but has remained to retain compatibility.
      -  Added method ``get_item()`` to enable retrieving data for a single cart item.
      -  Added unicode support for product names.
      -  Added support for disabling product name strictness via the ``$product_name_safe`` property.
      -  Changed ``insert()`` method to auto-increment quantity for an item when inserted twice instead of resetting it.
      -	 Changed ``update()`` method to support updating all properties attached to an item and not to require 'qty'.

   -  :doc:`Image Manipulation Library <libraries/image_lib>` changes include:

      -  The ``initialize()`` method now only sets existing class properties.
      -  Added support for 3-length hex color values for *wm_font_color* and *wm_shadow_color* properties, as well as validation for them.
      -  Class properties *wm_font_color*, *wm_shadow_color* and *wm_use_drop_shadow* are now protected, to avoid breaking the ``text_watermark()`` method if they are set manually after initialization.
      -  If property *maintain_ratio* is set to TRUE, ``image_reproportion()`` now doesn't need both width and height to be specified.
      -  Property *maintain_ratio* is now taken into account when resizing images using ImageMagick library.
      -  Added support for maintaining transparency for PNG images when watermarking.
      -  Added a **file_permissions** setting.

   -  :doc:`Form Validation Library <libraries/form_validation>` changes include:

      -  Added method ``error_array()`` to return all error messages as an array.
      -  Added method ``set_data()`` to set an alternative data array to be validated instead of the default ``$_POST``.
      -  Added method ``reset_validation()`` which resets internal validation variables in case of multiple validation routines.
      -  Added support for setting error delimiters in the config file via ``$config['error_prefix']`` and ``$config['error_suffix']``.
      -  Internal method ``_execute()`` now considers input data to be invalid if a specified rule is not found.
      -  Removed method ``is_numeric()`` as it exists as a native PHP function and ``_execute()`` will find and use that (the **is_numeric** rule itself is deprecated since 1.6.1).
      -  Native PHP functions used as rules can now accept an additional parameter, other than the data itself.
      -  Updated method ``set_rules()`` to accept an array of rules as well as a string.
      -  Fields that have empty rules set no longer run through validation (and therefore are not considered erroneous).
      -  Added rule **differs** to check if the value of a field differs from the value of another field.
      -  Added rule **valid_url**.
      -  Added support for named parameters in error messages.
      -  :doc:`Language <libraries/language>` line keys must now be prefixed with **form_validation_**.
      -  Added rule **alpha_numeric_spaces**.
      -  Added support for custom error messages per field rule.
      -  Added support for callable rules when they are passed as an array.
      -  Added support for non-ASCII domains in **valid_email** rule, depending on the Intl extension.

   -  :doc:`Caching Library <libraries/caching>` changes include:

      -  Added Wincache driver.
      -  Added Redis driver.
      -  Added a *key_prefix* option for cache IDs.
      -  Updated driver ``is_supported()`` methods to log at the "debug" level.
      -  Added option to store raw values instead of CI-formatted ones (APC, Memcache).
      -  Added atomic increment/decrement feature via ``increment()``, ``decrement()``.

   -  :doc:`E-mail Library <libraries/email>` changes include:

      -  Added a custom filename parameter to ``attach()`` as ``$this->email->attach($filename, $disposition, $newname)``.
      -  Added possibility to send attachment as buffer string in ``attach()`` as ``$this->email->attach($buffer, $disposition, $newname, $mime)``.
      -  Added possibility to attach remote files by passing a URL.
      -  Added method ``attachment_cid()`` to enable embedding inline attachments into HTML.
      -  Added dsn (delivery status notification) option.
      -  Renamed method ``_set_header()`` to ``set_header()`` and made it public to enable adding custom headers.
      -  Successfully sent emails will automatically clear the parameters.
      -  Added a *return_path* parameter to the ``from()`` method.
      -  Removed the second parameter (character limit) from internal method ``_prep_quoted_printable()`` as it is never used.
      -  Internal method ``_prep_quoted_printable()`` will now utilize the native ``quoted_printable_encode()``, ``imap_8bit()`` functions (if available) when CRLF is set to "\r\n".
      -  Default charset now relies on the global ``$config['charset']`` setting.
      -  Removed unused protected method ``_get_ip()`` (:doc:`Input Library <libraries/input>`'s ``ip_address()`` should be used anyway).
      -  Internal method ``_prep_q_encoding()`` now utilizes PHP's *mbstring* and *iconv* extensions (when available) and no longer has a second (``$from``) argument.
      -  Added an optional parameter to ``print_debugger()`` to allow specifying which parts of the message should be printed ('headers', 'subject', 'body').
      -  Added SMTP keepalive option to avoid opening the connection for each ``send()`` call. Accessible as ``$smtp_keepalive``.
      -  Public method ``set_header()`` now filters the input by removing all "\\r" and "\\n" characters.
      -  Added support for non-ASCII domains in ``valid_email()``, depending on the Intl extension.

   -  :doc:`Pagination Library <libraries/pagination>` changes include:

      -  Deprecated usage of the "anchor_class" setting (use the new "attributes" setting instead).
      -  Added method chaining support to ``initialize()`` method.
      -  Added support for the anchor "rel" attribute.
      -  Added support for setting custom attributes.
      -  Added support for language translations of the *first_link*, *next_link*, *prev_link* and *last_link* values.
      -  Added support for ``$config['num_links'] = 0`` configuration.
      -  Added ``$config['reuse_query_string']`` to allow automatic repopulation of query string arguments, combined with normal URI segments.
      -  Added ``$config['use_global_url_suffix']`` to allow overriding the library 'suffix' value with that of the global ``$config['url_suffix']`` setting.
      -  Removed the default ``&nbsp;`` from a number of the configuration variables.

   -  :doc:`Profiler Library <general/profiling>` changes include:

      -  Database object names are now being displayed.
      -  The sum of all queries running times in seconds is now being displayed.
      -  Added support for displaying the HTTP DNT ("Do Not Track") header.
      -  Added support for displaying ``$_FILES``.

   -  :doc:`Migration Library <libraries/migration>` changes include:

      -  Added support for timestamp-based migrations (enabled by default).
      -  Added ``$config['migration_type']`` to allow switching between *sequential* and *timestamp* migrations.

   -  :doc:`XML-RPC Library <libraries/xmlrpc>` changes include:

      -  Added the ability to use a proxy.
      -  Added Basic HTTP authentication support.

   -  :doc:`User Agent Library <libraries/user_agent>` changes include:

      - Added check to detect if robots are pretending to be mobile clients (helps with e.g. Google indexing mobile website versions).
      - Added method ``parse()`` to allow parsing a custom user-agent string, different from the current visitor's.

   -  :doc:`HTML Table Library <libraries/table>` changes include:

      - Added method chaining support.
      - Added support for setting table class defaults in a config file.

   -  :doc:`Zip Library <libraries/zip>` changes include:

      - Method ``read_file()`` can now also alter the original file path/name while adding files to an archive.
      - Added support for changing the compression level.

   -  :doc:`Trackback Library <libraries/trackback>` method ``receive()`` will now utilize ``iconv()`` if it is available but ``mb_convert_encoding()`` is not.

-  Core

   -  :doc:`Routing <general/routing>` changes include:

      -  Added support for multiple levels of controller directories.
      -  Added support for per-directory *default_controller* and *404_override* classes.
      -  Added possibility to route requests using HTTP verbs.
      -  Added possibility to route requests using callbacks.
      -  Added a new reserved route (*translate_uri_dashes*) to allow usage of dashes in the controller and method URI segments.
      -  Deprecated methods ``fetch_directory()``, ``fetch_class()`` and ``fetch_method()`` in favor of their respective public properties.
      -  Removed method ``_set_overrides()`` and moved its logic to the class constructor.

   -  :doc:`URI Library <libraries/uri>` changes include:

      -  Added conditional PCRE UTF-8 support to the "invalid URI characters" check and removed the ``preg_quote()`` call from it to allow more flexibility.
      -  Renamed method ``_filter_uri()`` to ``filter_uri()``.
      -  Changed method ``filter_uri()`` to accept by reference and removed its return value.
      -  Changed private methods to protected so that MY_URI can override them.
      -  Renamed internal method ``_parse_cli_args()`` to ``_parse_argv()``.
      -  Renamed internal method ``_detect_uri()`` to ``_parse_request_uri()``.
      -  Changed ``_parse_request_uri()`` to accept absolute URIs for compatibility with HTTP/1.1 as per `RFC2616 <http://www.ietf.org/rfc/rfc2616.txt>`.
      -  Added protected method ``_parse_query_string()`` to URI paths in the the **QUERY_STRING** value, like ``_parse_request_uri()`` does.
      -  Changed URI string detection logic to try the **PATH_INFO** variable first when auto-detecting.
      -  Removed methods ``_remove_url_suffix()``, ``_explode_segments()`` and moved their logic into ``_set_uri_string()``.
      -  Removed method ``_fetch_uri_string()`` and moved its logic into the class constructor.
      -  Removed method ``_reindex_segments()``.

   -  :doc:`Loader Library <libraries/loader>` changes include:

      -  Added method chaining support.
      -  Added method ``get_vars()`` to the Loader to retrieve all variables loaded with ``$this->load->vars()``.
      -  ``_ci_autoloader()`` is now a protected method.
      -  Added autoloading of drivers with ``$autoload['drivers']``.
      -  ``$config['rewrite_short_tags']`` now has no effect when using PHP 5.4 as ``<?=`` will always be available.
      -  Changed method ``config()`` to return whatever ``CI_Config::load()`` returns instead of always being void.
      -  Added support for library and model aliasing on autoload.
      -  Changed method ``is_loaded()`` to ask for the (case sensitive) library name instead of its instance name.
      -  Removed ``$_base_classes`` property and unified all class data in ``$_ci_classes`` instead.
      -  Added method ``clear_vars()`` to allow clearing the cached variables for views.

   -  :doc:`Input Library <libraries/input>` changes include:

      -  Added ``method()`` to retrieve ``$_SERVER['REQUEST_METHOD']``.
      -  Added support for arrays and network addresses (e.g. 192.168.1.1/24) for use with the *proxy_ips* setting.
      -  Added method ``input_stream()`` to aid in using **php://input** stream data such as one passed via PUT, DELETE and PATCH requests.
      -  Changed method ``valid_ip()`` to use PHP's native ``filter_var()`` function.
      -  Changed internal method ``_sanitize_globals()`` to skip enforcing reversal of *register_globals* in PHP 5.4+, where this functionality no longer exists.
      -  Changed methods ``get()``, ``post()``, ``get_post()``, ``cookie()``, ``server()``, ``user_agent()`` to return NULL instead of FALSE when no value is found.
      -  Changed default value of the ``$xss_clean`` parameter to NULL for all methods that utilize it, the default value is now determined by the ``$config['global_xss_filtering']`` setting.
      -  Added method ``post_get()`` and changed ``get_post()`` to search in GET data first. Both methods' names now properly match their GET/POST data search priorities.
      -  Changed method ``_fetch_from_array()`` to parse array notation in field name.
      -  Changed method ``_fetch_from_array()`` to allow retrieving multiple fields at once.
      -  Added an option for ``_clean_input_keys()`` to return FALSE instead of terminating the whole script.
      -  Deprecated the ``is_cli_request()`` method, it is now an alias for the new :func:`is_cli()` common function.
      -  Added an ``$xss_clean`` parameter to method ``user_agent()`` and removed the ``$user_agent`` property.

   -  :doc:`Common functions <general/common_functions>` changes include:

      -  Added function :func:`get_mimes()` to return the *application/config/mimes.php* array.
      -  Added support for HTTP code 303 ("See Other") in :func:`set_status_header()`.
      -  Removed redundant conditional to determine HTTP server protocol in :func:`set_status_header()`.
      -  Renamed ``_exception_handler()`` to ``_error_handler()`` and replaced it with a real exception handler.
      -  Changed ``_error_handler()`` to respect php.ini *display_errors* setting.
      -  Added function :func:`is_https()` to check if a secure connection is used.
      -  Added function :func:`is_cli()` to replace the ``CI_Input::is_cli_request()`` method.
      -  Added function :func:`function_usable()` to work around a bug in `Suhosin <http://www.hardened-php.net/suhosin/>`.
      -  Removed the third (`$php_error`) argument from function :func:`log_message()`.
      -  Changed internal function ``load_class()`` to accept a constructor parameter instead of (previously unused) class name prefix.
      -  Removed default parameter value of :func:`is_php()`.
      -  Added a second argument ``$double_encode`` to :func:`html_escape()`.
      -  Changed function ``config_item()`` to return NULL instead of FALSE when no value is found.

   -  :doc:`Output Library <libraries/output>` changes include:

      -  Added a second argument to method ``set_content_type()`` that allows setting the document charset as well.
      -  Added methods ``get_content_type()`` and ``get_header()``.
      -  Added method ``delete_cache()``.
      -  Added configuration option ``$config['cache_query_string']`` to enable taking the query string into account when caching.
      -  Changed caching behavior to compress the output before storing it, if ``$config['compress_output']`` is enabled.

   -  :doc:`Config Library <libraries/config>` changes include:

      -  Changed ``site_url()`` method  to accept an array as well.
      -  Removed internal method ``_assign_to_config()`` and moved its implementation to *CodeIgniter.php* instead.
      -  ``item()`` now returns NULL instead of FALSE when the required config item doesn't exist.
      -  Added an optional second parameter to both ``base_url()`` and ``site_url()`` that allows enforcing of a protocol different than the one in the *base_url* configuration setting.
      -  Added HTTP "Host" header character validation to prevent cache poisoning attacks when ``base_url`` auto-detection is used.

   -  :doc:`Security Library <libraries/security>` changes include:

      -  Added ``$config['csrf_regeneration']``, which makes CSRF token regeneration optional.
      -  Added ``$config['csrf_exclude_uris']``, allowing for exclusion of URIs from the CSRF protection (regular expressions are supported).
      -  Added method ``strip_image_tags()``.
      -  Added method ``get_random_bytes()`` and switched CSRF & XSS token generation to use it.
      -  Modified method ``sanitize_filename()`` to read a public ``$filename_bad_chars`` property for getting the invalid characters list.
      -  Return status code of 403 instead of a 500 if CSRF protection is enabled but a token is missing from a request.

   -  :doc:`Language Library <libraries/language>` changes include:

      -  Changed method ``load()`` to filter the language name with ``ctype_alpha()``.
      -  Changed method ``load()`` to also accept an array of language files.
      -  Added an optional second parameter to method ``line()`` to disable error logging for line keys that were not found.
      -  Language files are now loaded in a cascading style with the one in **system/** always loaded and overriden afterwards, if another one is found.

   -  :doc:`Hooks Library <general/hooks>` changes include:

      -  Added support for closure hooks (or anything that ``is_callable()`` returns TRUE for).
      -  Renamed method ``_call_hook()`` to ``call_hook()``.
      -  Class instances are now stored in order to maintain their state.

   -  UTF-8 Library changes include:

      -  ``UTF8_ENABLED`` now requires only one of `Multibyte String <http://php.net/mbstring>`_ or `iconv <http://php.net/iconv>`_ to be available instead of both.
      -  Changed method ``clean_string()`` to utilize ``mb_convert_encoding()`` if it is available.
      -  Renamed method ``_is_ascii()`` to ``is_ascii()`` and made it public.

   -  Log Library changes include:

      -  Added a ``$config['log_file_permissions']`` setting.
      -  Changed the library constructor to try to create the **log_path** directory if it doesn't exist.
      -  Added support for microseconds ("u" date format character) in ``$config['log_date_format']``.

   -  Added `compatibility layers <general/compatibility_functions>` for:

      - `Multibyte String <http://php.net/mbstring>`_ (limited support).
      - `Hash <http://php.net/hash>`_ (``hash_equals()``, ``hash_pbkdf2()``).
      - `Password Hashing <http://php.net/password>`_.
      - `Standard Functions ``array_column()``, ``array_replace()``, ``array_replace_recursive()``, ``hex2bin()``, ``quoted_printable_encode()``.

   -  Removed ``CI_CORE`` boolean constant from *CodeIgniter.php* (no longer Reactor and Core versions).
   -  Added support for HTTP-Only cookies with new config option *cookie_httponly* (default FALSE).
   -  ``$config['time_reference']`` now supports all timezone strings supported by PHP.
   -  Fatal PHP errors are now also passed to ``_error_handler()``, so they can be logged.


Bug fixes for 3.0
------------------

-  Fixed a bug where ``unlink()`` raised an error if cache file did not exist when you try to delete it.
-  Fixed a bug (#181) - a typo in the form validation language file.
-  Fixed a bug (#159, #163) - :doc:`Query Builder <database/query_builder>` nested transactions didn't work properly due to ``$_trans_depth`` not being incremented.
-  Fixed a bug (#737, #75) - :doc:`Pagination <libraries/pagination>` anchor class was not set properly when using initialize method.
-  Fixed a bug (#419) - :doc:`URL Helper <helpers/url_helper>` :func:`auto_link()` didn't recognize URLs that come after a word boundary.
-  Fixed a bug (#724) - :doc:`Form Validation Library <libraries/form_validation>` rule **is_unique** didn't check if a database connection exists.
-  Fixed a bug (#647) - :doc:`Zip Library <libraries/zip>` internal method ``_get_mod_time()`` didn't suppress possible "stat failed" errors generated by ``filemtime()``.
-  Fixed a bug (#157, #174) - :doc:`Image Manipulation Library <libraries/image_lib>` method ``clear()`` didn't completely clear properties.
-  Fixed a bug where :doc:`Database Forge <database/forge>` method ``create_table()`` with PostgreSQL database could lead to fetching the whole table.
-  Fixed a bug (#795) - :doc:`Form Helper <helpers/form_helper>` :func:`form_open()` didn't add the default form *method* and *accept-charset* when an empty array is passed to it.
-  Fixed a bug (#797) - :doc:`Date Helper <helpers/date_helper>` :func:`timespan()` was using incorrect seconds for year and month.
-  Fixed a bug in :doc:`Cart Library <libraries/cart>` method ``contents()`` where if called without a TRUE (or equal) parameter, it would fail due to a typo.
-  Fixed a bug (#406) - SQLSRV DB driver not returning resource on ``db_pconnect()``.
-  Fixed a bug in :doc:`Image Manipulation Library <libraries/image_lib>` method ``gd_loaded()`` where it was possible for the script execution to end or a PHP E_WARNING message to be emitted.
-  Fixed a bug in the :doc:`Pagination library <libraries/pagination>` where when use_page_numbers=TRUE previous link and page 1 link did not have the same url.
-  Fixed a bug (#561) - errors in :doc:`XML-RPC Library <libraries/xmlrpc>` were not properly escaped.
-  Fixed a bug (#904) - :doc:`Loader Library <libraries/loader>` method ``initialize()`` caused a PHP Fatal error to be triggered if error level E_STRICT is used.
-  Fixed a hosting edge case where an empty ``$_SERVER['HTTPS']`` variable would evaluate to 'on'.
-  Fixed a bug (#154) - :doc:`Session Library <libraries/sessions>` method ``sess_update()`` caused the session to be destroyed on pages where multiple AJAX requests were executed at once.
-  Fixed a possible bug in :doc:`Input Libary <libraries/input>` method ``is_ajax_request()`` where some clients might not send the X-Requested-With HTTP header value exactly as 'XmlHttpRequest'.
-  Fixed a bug (#1039) - :doc:`Database Utilities <database/utilities>` internal method ``_backup()`` method failed for the 'mysql' driver due to a table name not being escaped.
-  Fixed a bug (#1070) - ``CI_DB_driver::initialize()`` didn't set a character set if a database is not selected.
-  Fixed a bug (#177) - :doc:`Form Validation Library <libraries/form_validation>` method ``set_value()`` didn't set the default value if POST data is NULL.
-  Fixed a bug (#68, #414) - :Oracle's ``escape_str()`` didn't properly escape LIKE wild characters.
-  Fixed a bug (#81) - ODBC's ``list_fields()`` and ``field_data()`` methods skipped the first column due to ``odbc_field_*()`` functions' index starting at 1 instead of 0.
-  Fixed a bug (#129) - ODBC's ``num_rows()`` method returned -1 in some cases, due to not all subdrivers supporting the ``odbc_num_rows()`` function.
-  Fixed a bug (#153) - E_NOTICE being generated by ``getimagesize()`` in the :doc:`File Uploading Library <libraries/file_uploading>`.
-  Fixed a bug (#611) - SQLSRV's error handling methods used to issue warnings when there's no actual error.
-  Fixed a bug (#1036) - ``is_write_type()`` method in the :doc:`Database Library <database/index>` didn't return TRUE for RENAME queries.
-  Fixed a bug in PDO's ``_version()`` method where it used to return the client version as opposed to the server one.
-  Fixed a bug in PDO's ``insert_id()`` method where it could've failed if it's used with Postgre versions prior to 8.1.
-  Fixed a bug in CUBRID's ``affected_rows()`` method where a connection resource was passed to ``cubrid_affected_rows()`` instead of a result.
-  Fixed a bug (#638) - ``db_set_charset()`` ignored its arguments and always used the configured charset instead.
-  Fixed a bug (#413) - Oracle's error handling methods used to only return connection-related errors.
-  Fixed a bug (#1101) - :doc:`Database Result <database/results>` method ``field_data()`` for 'mysql', 'mysqli' drivers was implemented as if it was handling a DESCRIBE result instead of the actual result set.
-  Fixed a bug in Oracle's :doc:`Database Forge <database/forge>` method ``_create_table()`` where it failed with AUTO_INCREMENT as it's not supported.
-  Fixed a bug (#1080) - when using the SMTP protocol, :doc:`Email Library <libraries/email>` method ``send()`` was returning TRUE even if the connection/authentication against the server failed.
-  Fixed a bug (#306) - ODBC's ``insert_id()`` method was calling non-existent function ``odbc_insert_id()``, which resulted in a fatal error.
-  Fixed a bug in Oracle's :doc:`Database Result <database/results>` implementation where the cursor ID passed to it was always NULL.
-  Fixed a bug (#64) - Regular expression in *DB_query_builder.php* failed to handle queries containing SQL bracket delimiters in the JOIN condition.
-  Fixed a bug in the :doc:`Session Library <libraries/sessions>` where a PHP E_NOTICE error was triggered by ``_unserialize()`` due to results from databases such as MSSQL and Oracle being space-padded on the right.
-  Fixed a bug (#501) - :doc:`Form Validation Library <libraries/form_validation>` method ``set_rules()`` depended on ``count($_POST)`` instead of actually checking if the request method 'POST' before aborting.
-  Fixed a bug (#136) - PostgreSQL and MySQL's ``escape_str()`` method didn't properly escape LIKE wild characters.
-  Fixed a bug in :doc:`Loader Library <libraries/loader>` method ``library()`` where some PHP versions wouldn't execute the class constructor.
-  Fixed a bug (#88) - An unexisting property was used for configuration of the Memcache cache driver.
-  Fixed a bug (#14) - :doc:`Database Forge <database/forge>` method ``create_database()`` didn't utilize the configured database character set.
-  Fixed a bug (#23, #1238) - :doc:`Database Caching <database/caching>` method ``delete_all()`` used to delete .htaccess and index.html files, which is a potential security risk.
-  Fixed a bug in :doc:`Trackback Library <libraries/trackback>` method ``validate_url()`` where it didn't actually do anything, due to input not being passed by reference.
-  Fixed a bug (#11, #183, #863) - :doc:`Form Validation Library <libraries/form_validation>` method ``_execute()`` silently continued to the next rule, if a rule method/function is not found.
-  Fixed a bug (#122) - routed URI string was being reported incorrectly in sub-directories.
-  Fixed a bug (#1241) - :doc:`Zip Library <libraries/zip>` method ``read_dir()`` wasn't compatible with Windows.
-  Fixed a bug (#306) - ODBC driver didn't have an ``_insert_batch()`` method, which resulted in fatal error being triggered when ``insert_batch()`` is used with it.
-  Fixed a bug in MSSQL and SQLSrv's ``_truncate()`` where the TABLE keyword was missing.
-  Fixed a bug in PDO's ``trans_commit()`` method where it failed due to an erroneous property name.
-  Fixed a bug (#798) - :doc:`Query Builder <database/query_builder>` method ``update()`` used to ignore LIKE conditions that were set with ``like()``.
-  Fixed a bug in Oracle's and MSSQL's ``delete()`` methods where an erroneous SQL statement was generated when used with ``limit()``.
-  Fixed a bug in SQLSRV's ``delete()`` method where ``like()`` and ``limit()`` conditions were ignored.
-  Fixed a bug (#1265) - Database connections were always closed, regardless of the 'pconnect' option value.
-  Fixed a bug (#128) - :doc:`Language Library <libraries/language>` did not correctly keep track of loaded language files.
-  Fixed a bug (#1349) - :doc:`File Uploading Library <libraries/file_uploading>` method ``get_extension()`` returned the original filename when it didn't have an actual extension.
-  Fixed a bug (#1273) - :doc:`Query Builder <database/query_builder>` method ``set_update_batch()`` generated an E_NOTICE message.
-  Fixed a bug (#44, #110) - :doc:`File Uploading Library <libraries/file_uploading>` method ``clean_file_name()`` didn't clear '!' and '#' characters.
-  Fixed a bug (#121) - :doc:`Database Results <database/results>` method ``row()`` returned an array when there's no actual result to be returned.
-  Fixed a bug (#319) - SQLSRV's ``affected_rows()`` method failed due to a scrollable cursor being created for write-type queries.
-  Fixed a bug (#356) - :doc:`Database <database/index>` driver 'postgre' didn't have an ``_update_batch()`` method, which resulted in fatal error being triggered when ``update_batch()`` is used with it.
-  Fixed a bug (#784, #862) - :doc:`Database Forge <database/forge>` method ``create_table()`` failed on SQLSRV/MSSQL when used with 'IF NOT EXISTS'.
-  Fixed a bug (#1419) - :doc:`Driver Library <general/creating_drivers>` had a static variable that was causing an error.
-  Fixed a bug (#1411) - the :doc:`Email Library <libraries/email>` used its own short list of MIMEs instead the one from *config/mimes.php*.
-  Fixed a bug where php.ini setting *magic_quotes_runtime* wasn't turned off for PHP 5.3 (where it is indeed deprecated, but not non-existent).
-  Fixed a bug (#666) - :doc:`Output Library <libraries/output>` method ``set_content_type()`` didn't set the document charset.
-  Fixed a bug (#784, #861) - :doc:`Database Forge <database/forge>` method ``create_table()`` used to accept constraints for MSSQL/SQLSRV integer-type columns.
-  Fixed a bug (#706) - SQLSRV/MSSSQL :doc:`Database <database/index>` drivers didn't escape field names.
-  Fixed a bug (#1452) - :doc:`Query Builder <database/query_builder>` method ``protect_identifiers()`` didn't properly detect identifiers with spaces in their names.
-  Fixed a bug where :doc:`Query Builder <database/query_builder>` method ``protect_identifiers()`` ignored its extra arguments when the value passed to it is an array.
-  Fixed a bug where :doc:`Query Builder <database/query_builder>` internal method ``_has_operator()`` didn't detect BETWEEN.
-  Fixed a bug where :doc:`Query Builder <database/query_builder>` method ``join()`` failed with identifiers containing dashes.
-  Fixed a bug (#1264) - :doc:`Database Forge <database/forge>` and :doc:`Database Utilities <database/utilities>` didn't update/reset the databases and tables list cache when a table or a database is created, dropped or renamed.
-  Fixed a bug (#7) - :doc:`Query Builder <database/query_builder>` method ``join()`` only escaped one set of conditions.
-  Fixed a bug (#1321) - ``CI_Exceptions`` couldn't find the *errors/* directory in some cases.
-  Fixed a bug (#1202) - :doc:`Encrypt Library <libraries/encrypt>` ``encode_from_legacy()`` didn't set back the encrypt mode on failure.
-  Fixed a bug (#145) - :doc:`Database Class <database/index>` method ``compile_binds()`` failed when the bind marker was present in a literal string within the query.
-  Fixed a bug in :doc:`Query Builder <database/query_builder>` method ``protect_identifiers()`` where if passed along with the field names, operators got escaped as well.
-  Fixed a bug (#10) - :doc:`URI Library <libraries/uri>` internal method ``_detect_uri()`` failed with paths containing a colon.
-  Fixed a bug (#1387) - :doc:`Query Builder <database/query_builder>` method ``from()`` didn't escape table aliases.
-  Fixed a bug (#520) - :doc:`Date Helper <helpers/date_helper>` function :func:``nice_date()`` failed when the optional second parameter is not passed.
-  Fixed a bug (#167) - ``$config['permitted_uri_chars']`` didn't affect URL-encoded characters.
-  Fixed a bug (#318) - :doc:`Profiling Library <general/profiling>` setting *query_toggle_count* was not settable as described in the manual.
-  Fixed a bug (#938) - :doc:`Config Library <libraries/config>` method ``site_url()`` added a question mark to the URL string when query strings are enabled even if it already existed.
-  Fixed a bug (#999) - :doc:`Config Library <libraries/config>` method ``site_url()`` always appended ``$config['url_suffix']`` to the end of the URL string, regardless of whether a query string exists in it.
-  Fixed a bug where :doc:`URL Helper <helpers/url_helper>` function :func:`anchor_popup()` ignored the attributes argument if it is not an array.
-  Fixed a bug (#1328) - :doc:`Form Validation Library <libraries/form_validation>` didn't properly check the type of the form fields before processing them.
-  Fixed a bug (#79) - :doc:`Form Validation Library <libraries/form_validation>` didn't properly validate array fields that use associative keys or have custom indexes.
-  Fixed a bug (#427) - :doc:`Form Validation Library <libraries/form_validation>` method ``strip_image_tags()`` was an alias to a non-existent method.
-  Fixed a bug (#1545) - :doc:`Query Builder <database/query_builder>` method ``limit()`` wasn't executed properly under Oracle.
-  Fixed a bug (#1551) - :doc:`Date Helper <helpers/date_helper>` function :func:`standard_date()` didn't properly format *W3C* and *ATOM* standard dates.
-  Fixed a bug where :doc:`Query Builder <database/query_builder>` method ``join()`` escaped literal values as if they were fields.
-  Fixed a bug (#135) - PHP Error logging was impossible without the errors being displayed.
-  Fixed a bug (#1613) - :doc:`Form Helper <helpers/form_helper>` functions :func:`form_multiselect()`, :func:`form_dropdown()` didn't properly handle empty array option groups.
-  Fixed a bug (#1605) - :doc:`Pagination Library <libraries/pagination>` produced incorrect *previous* and *next* link values.
-  Fixed a bug in SQLSRV's ``affected_rows()`` method where an erroneous function name was used.
-  Fixed a bug (#1000) - Change syntax of ``$view_file`` to ``$_ci_view_file`` to prevent being overwritten by application.
-  Fixed a bug (#1757) - :doc:`Directory Helper <helpers/directory_helper>` function :func:`directory_map()` was skipping files and directories named '0'.
-  Fixed a bug (#1789) - :doc:`Database Library <database/index>` method ``escape_str()`` escaped quote characters in LIKE conditions twice under MySQL.
-  Fixed a bug (#395) - :doc:`Unit Testing Library <libraries/unit_testing>` method ``result()`` didn't properly check array result columns when called from ``report()``.
-  Fixed a bug (#1692) - :doc:`Database Class <database/index>` method ``display_error()`` didn't properly trace the possible error source on Windows systems.
-  Fixed a bug (#1745) - :doc:`Database Class <database/index>` method ``is_write_type()`` didn't return TRUE for LOAD queries.
-  Fixed a bug (#1765) - :doc:`Database Class <database/index>` didn't properly detect connection errors for the 'mysqli' driver.
-  Fixed a bug (#1257) - :doc:`Query Builder <database/query_builder>` used to (unnecessarily) group FROM clause contents, which breaks certain queries and is invalid for some databases.
-  Fixed a bug (#1709) - :doc:`Email <libraries/email>` headers were broken when using long email subjects and \r\n as CRLF.
-  Fixed a bug where ``MB_ENABLED`` constant was only declared if ``UTF8_ENABLED`` was set to TRUE.
-  Fixed a bug where the :doc:`Session Library <libraries/sessions>` accepted cookies with *last_activity* values being in the future.
-  Fixed a bug (#1897) - :doc:`Email Library <libraries/email>` triggered PHP E_WARNING errors when *mail* protocol used and ``to()`` is never called.
-  Fixed a bug (#1409) - :doc:`Email Library <libraries/email>` didn't properly handle multibyte characters when applying Q-encoding to headers.
-  Fixed a bug where :doc:`Email Library <libraries/email>` ignored its *wordwrap* setting while handling alternative messages.
-  Fixed a bug (#1476, #1909) - :doc:`Pagination Library <libraries/pagination>` didn't take into account actual routing when determining the current page.
-  Fixed a bug (#1766) - :doc:`Query Builder <database/query_builder>` didn't always take into account the *dbprefix* setting.
-  Fixed a bug (#779) - :doc:`URI Class <libraries/uri>` didn't always trim slashes from the *uri_string* as shown in the documentation.
-  Fixed a bug (#134) - :doc:`Database Caching <database/caching>` method ``delete_cache()`` didn't work in some cases due to *cachedir* not being initialized properly.
-  Fixed a bug (#191) - :doc:`Loader Library <libraries/loader>` ignored attempts for (re)loading databases to ``get_instance()->db`` even when the old database connection is dead.
-  Fixed a bug (#1255) - :doc:`User Agent Library <libraries/user_agent>` method ``is_referral()`` only checked if ``$_SERVER['HTTP_REFERER']`` exists.
-  Fixed a bug (#1146) - :doc:`Download Helper <helpers/download_helper>` function :func:`force_download()` incorrectly sent *Cache-Control* directives *pre-check* and *post-check* to Internet Explorer.
-  Fixed a bug (#1811) - :doc:`URI Library <libraries/uri>` didn't properly cache segments for ``uri_to_assoc()`` and ``ruri_to_assoc()``.
-  Fixed a bug (#1506) - :doc:`Form Helpers <helpers/form_helper>` set empty *name* attributes.
-  Fixed a bug (#59) - :doc:`Query Builder <database/query_builder>` method ``count_all_results()`` ignored the DISTINCT clause.
-  Fixed a bug (#1624) - :doc:`Form Validation Library <libraries/form_validation>` rule **matches** didn't property handle array field names.
-  Fixed a bug (#1630) - :doc:`Form Helper <helpers/form_helper>` function :func:`set_value()` didn't escape HTML entities.
-  Fixed a bug (#142) - :doc:`Form Helper <helpers/form_helper>` function :func:`form_dropdown()` didn't escape HTML entities in option values.
-  Fixed a bug (#50) - :doc:`Session Library <libraries/sessions>` unnecessarily stripped slashed from serialized data, making it impossible to read objects in a namespace.
-  Fixed a bug (#658) - :doc:`Routing <general/routing>` wildcard **:any** didn't work as advertised and matched multiple URI segments instead of all characters within a single segment.
-  Fixed a bug (#1938) - :doc:`Email Library <libraries/email>` removed multiple spaces inside a pre-formatted plain text message.
-  Fixed a bug (#388, #705) - :doc:`URI Library <libraries/uri>` didn't apply URL-decoding to URI segments that it got from **REQUEST_URI** and/or **QUERY_STRING**.
-  Fixed a bug (#122) - :doc:`URI Library <libraries/uri>` method ``ruri_string()`` didn't include a directory if one is used.
-  Fixed a bug - :doc:`Routing Library <general/routing>` didn't properly handle *default_controller* in a subdirectory when a method is also specified.
-  Fixed a bug (#953) - :doc:`post_controller_constructor hook <general/hooks>` wasn't called with a *404_override*.
-  Fixed a bug (#1220) - :doc:`Profiler Library <general/profiling>` didn't display information for database objects that are instantiated inside models.
-  Fixed a bug (#1978) - :doc:`Directory Helper <helpers/directory_helper>` function :func:`directory_map()`'s return array didn't make a distinction between directories and file indexes when a directory with a numeric name is present.
-  Fixed a bug (#777) - :doc:`Loader Library <libraries/loader>` didn't look for helper extensions in added package paths.
-  Fixed a bug (#18) - :doc:`APC Cache <libraries/caching>` driver didn't (un)serialize data, resulting in failure to store objects.
-  Fixed a bug (#188) - :doc:`Unit Testing Library <libraries/unit_testing>` filled up logs with error messages for non-existing language keys.
-  Fixed a bug (#113) - :doc:`Form Validation Library <libraries/form_validation>` didn't properly handle empty fields that were specified as an array.
-  Fixed a bug (#2061) - :doc:`Routing Class <general/routing>` didn't properly sanitize directory, controller and function triggers with **enable_query_strings** set to TRUE.
-  Fixed a bug - SQLSRV didn't support ``escape_like_str()`` or escaping an array of values.
-  Fixed a bug - :doc:`Database Results <database/results>` method ``list_fields()`` didn't reset its field pointer for the 'mysql', 'mysqli' and 'mssql' drivers.
-  Fixed a bug (#73) - :doc:`Security Library <libraries/security>` method ``sanitize_filename()`` could be tricked by an XSS attack.
-  Fixed a bug (#2211) - :doc:`Migration Library <libraries/migration>` extensions couldn't execute ``CI_Migration::__construct()``.
-  Fixed a bug (#2255) - :doc:`Email Library <libraries/email>` didn't apply *smtp_timeout* to socket reads and writes.
-  Fixed a bug (#2239) - :doc:`Email Library <libraries/email>` improperly handled the Subject when used with *bcc_batch_mode* resulting in E_WARNING messages and an empty Subject.
-  Fixed a bug (#2234) - :doc:`Query Builder <database/query_builder>` didn't reset JOIN cache for write-type queries.
-  Fixed a bug (#2298) - :doc:`Database Results <database/results>` method ``next_row()`` kept returning the last row, allowing for infinite loops.
-  Fixed a bug (#2236, #2639) - :doc:`Form Helper <helpers/form_helper>` functions :func:`set_value()`, :func:`set_select()`, :func:`set_radio()`, :func:`set_checkbox()` didn't parse array notation for keys if the rule was not present in the :doc:`Form Validation Library <libraries/form_validation>`.
-  Fixed a bug (#2353) - :doc:`Query Builder <database/query_builder>` erroneously prefixed literal strings with **dbprefix**.
-  Fixed a bug (#78) - :doc:`Cart Library <libraries/cart>` didn't allow non-English letters in product names.
-  Fixed a bug (#77) - :doc:`Database Class <database/index>` didn't properly handle the transaction "test mode" flag.
-  Fixed a bug (#2380) - :doc:`URI Routing <general/routing>` method ``fetch_method()`` returned 'index' if the requested method name matches its controller name.
-  Fixed a bug (#2388) - :doc:`Email Library <libraries/email>` used to ignore attachment errors, resulting in broken emails being sent.
-  Fixed a bug (#2498) - :doc:`Form Validation Library <libraries/form_validation>` rule **valid_base64** only checked characters instead of actual validity.
-  Fixed a bug (#2425) - OCI8 :doc:`database <database/index>` driver method ``stored_procedure()`` didn't log an error unless **db_debug** was set to TRUE.
-  Fixed a bug (#2490) - :doc:`Database Class <database/queries>` method ``query()`` returning boolean instead of a result object for PostgreSQL-specific *INSERT INTO ... RETURNING* statements.
-  Fixed a bug (#249) - :doc:`Cache Library <libraries/caching>` didn't properly handle Memcache(d) configurations with missing options.
-  Fixed a bug (#180) - :func:`config_item()` didn't take into account run-time configuration changes.
-  Fixed a bug (#2551) - :doc:`Loader Library <libraries/loader>` method ``library()`` didn't properly check if a class that is being loaded already exists.
-  Fixed a bug (#2560) - :doc:`Form Helper <helpers/form_helper>` function :func:`form_open()` set the 'method="post"' attribute only if the passed attributes equaled an empty string.
-  Fixed a bug (#2585) - :doc:`Query Builder <database/query_builder>` methods ``min()``, ``max()``, ``avg()``, ``sum()`` didn't escape field names.
-  Fixed a bug (#2590) - :doc:`Common function <general/common_functions>` :func:`log_message()` didn't actually cache the ``CI_Log`` class instance.
-  Fixed a bug (#2609) - :doc:`Common function <general/common_functions>` :func:`get_config()` optional argument was only effective on first function call. Also, it can now add items, in addition to updating existing items.
-  Fixed a bug in the 'postgre' :doc:`database <database/index>` driver where the connection ID wasn't passed to ``pg_escape_string()``.
-  Fixed a bug (#33) - Script execution was terminated when an invalid cookie key was encountered.
-  Fixed a bug (#2681) - :doc:`Security Library <libraries/security>` method ``entity_decode()`` used the `PREG_REPLACE_EVAL` flag, which is deprecated since PHP 5.5.
-  Fixed a bug (#2691) - nested :doc:`database <database/index>` transactions could end in a deadlock when an error is encountered with *db_debug* set to TRUE.
-  Fixed a bug (#2515) - ``_exception_handler()`` used to send the 200 "OK" HTTP status code and didn't stop script exection even on fatal errors.
-  Fixed a bug - Redis :doc:`Caching <libraries/caching>` driver didn't handle connection failures properly.
-  Fixed a bug (#2756) - :doc:`Database Class <database/index>` executed the MySQL-specific `SET SESSION sql_mode` query for all drivers when the 'stricton' option is set.
-  Fixed a bug (#2579) - :doc:`Query Builder <database/query_builder>` "no escape" functionality didn't work properly with query cache.
-  Fixed a bug (#2237) - :doc:`Parser Library <libraries/parser>` failed if the same tag pair is used more than once within a template.
-  Fixed a bug (#2268) - :doc:`Security Library <libraries/security>` didn't properly match JavaScript events.
-  Fixed a bug (#2143) - :doc:`Form Validation Library <libraries/form_validation>` didn't check for rule groups named in a *controller/method* manner when trying to load from a config file.
-  Fixed a bug (#2762) - :doc:`Hooks Class <general/hooks>` didn't properly check if the called class/function exists.
-  Fixed a bug (#148) - :doc:`Input Library <libraries/input>` internal method ``_clean_input_data()`` assumed that it data is URL-encoded, stripping certain character sequences from it.
-  Fixed a bug (#346) - with ``$config['global_xss_filtering']`` turned on, the ``$_GET``, ``$_POST``, ``$_COOKIE`` and ``$_SERVER`` superglobals were overwritten during initialization time, resulting in XSS filtering being either performed twice or there was no possible way to get the original data, even though options for this do exist.
-  Fixed an edge case (#555) - :doc:`User Agent Library <libraries/user_agent>` reported an incorrect version Opera 10+ due to a non-standard user-agent string.
-  Fixed a bug (#133) - :doc:`Text Helper <helpers/text_helper>` :func:`ascii_to_entities()` stripped the last character if it happens to be in the extended ASCII group.
-  Fixed a bug (#2822) - ``fwrite()`` was used incorrectly throughout the whole framework, allowing incomplete writes when writing to a network stream and possibly a few other edge cases.
-  Fixed a bug where :doc:`User Agent Library <libraries/user_agent>` methods ``accept_charset()`` and ``accept_lang()`` didn't properly parse HTTP headers that contain spaces.
-  Fixed a bug where *default_controller* was called instad of triggering a 404 error if the current route is in a controller directory.
-  Fixed a bug (#2737) - :doc:`XML-RPC Library <libraries/xmlrpc>` used objects as array keys, which triggered E_NOTICE messages.
-  Fixed a bug (#2729) - :doc:`Security Library <libraries/security>` internal method ``_validate_entities()`` used overly-intrusive ``preg_replace()`` patterns that produced false-positives.
-  Fixed a bug (#2771) - :doc:`Security Library <libraries/security>` method ``xss_clean()`` didn't take into account HTML5 entities.
-  Fixed a bug (#2856) - ODBC method ``affected_rows()`` passed an incorrect value to ``odbc_num_rows()``.
-  Fixed a bug (#43) :doc:`Image Manipulation Library <libraries/image_lib>` method ``text_watermark()`` didn't properly determine watermark placement.
-  Fixed a bug where :doc:`HTML Table Library <libraries/table>` ignored its *auto_heading* setting if headings were not already set.
-  Fixed a bug (#2364) - :doc:`Pagination Library <libraries/pagination>` appended the query string (if used) multiple times when there are successive calls to ``create_links()`` with no ``initialize()`` in between them.
-  Partially fixed a bug (#261) - UTF-8 class method ``clean_string()`` generating log messages and/or not producing the desired result due to an upstream bug in iconv.
-  Fixed a bug where ``CI_Xmlrpcs::parseRequest()`` could fail if ``$HTTP_RAW_POST_DATA`` is not populated.
-  Fixed a bug in :doc:`Zip Library <libraries/zip>` internal method ``_get_mod_time()`` where it was not parsing result returned by ``filemtime()``.
-  Fixed a bug (#3161) - :doc:`Cache Library <libraries/caching>` methods `increment()`, `decrement()` didn't auto-create non-existent items when using redis and/or file storage.
-  Fixed a bug (#3189) - :doc:`Parser Library <libraries/parser>` used double replacement on ``key->value`` pairs, exposing a potential template injection vulnerability.