<?php
	define('SERVER_INSTANCE', 'dev');

	switch (SERVER_INSTANCE) {
		case 'dev':
			define ('__DOCROOT__', '/var/www/qcodo-website/wwwroot');
			define ('__VIRTUAL_DIRECTORY__', '');
			define ('__SUBDIRECTORY__', '');

			define('DB_CONNECTION_1', serialize(array(
				'adapter' => 'MySqli5',
				'server' => 'localhost',
				'port' => null,
				'database' => 'qcodo_website',
				'username' => 'root',
				'password' => '',
				'encoding' => 'utf8',
				'profiling' => false)));
			break;

		case 'prod':
			break;
	}

	define('ALLOW_REMOTE_ADMIN', false);
	define ('__URL_REWRITE__', 'none');

	define('QCODO_EMAILER', 'Qcodo.com Message <not_moderated@qcodo.com>');
	define('__SEARCH_INDEXES__', __DOCROOT__ . '/../search_indexes');
	define('__WIKI_FILE_REPOSITORY__', __DOCROOT__ . '/../wiki_assets');

	define ('__DEVTOOLS_CLI__', __DOCROOT__ . __SUBDIRECTORY__ . '/../_devtools_cli');
	define ('__INCLUDES__', __DOCROOT__ .  __SUBDIRECTORY__ . '/includes');
	define ('__QCODO__', __INCLUDES__ . '/qcodo');
	define ('__QCODO_CORE__', __INCLUDES__ . '/qcodo/_core');
	define ('__DATA_CLASSES__', __INCLUDES__ . '/data_classes');
	define ('__DATAGEN_CLASSES__', __INCLUDES__ . '/data_classes/generated');
	define ('__DATA_META_CONTROLS__', __INCLUDES__ . '/data_meta_controls');
	define ('__DATAGEN_META_CONTROLS__', __INCLUDES__ . '/data_meta_controls/generated');

	define ('__DEVTOOLS__', null);
	define ('__FORM_DRAFTS__', null);
	define ('__PANEL_DRAFTS__', null);
	define ('__EXAMPLES__', null);

	define ('__JS_ASSETS__', __SUBDIRECTORY__ . '/assets/js');
	define ('__CSS_ASSETS__', __SUBDIRECTORY__ . '/assets/css');
	define ('__IMAGE_ASSETS__', __SUBDIRECTORY__ . '/assets/images');
	define ('__PHP_ASSETS__', __SUBDIRECTORY__ . '/assets/php');

	if ((function_exists('date_default_timezone_set')) && (!ini_get('date.timezone')))
		date_default_timezone_set('America/Los_Angeles');

	define('ERROR_PAGE_PATH', __PHP_ASSETS__ . '/_core/error_page.php');
//	define('ERROR_LOG_PATH', __INCLUDES__ . '/error_log');

//	define('ERROR_FRIENDLY_PAGE_PATH', __PHP_ASSETS__ . '/friendly_error_page.php');
//	define('ERROR_FRIENDLY_AJAX_MESSAGE', 'Oops!  An error has occurred.\r\n\r\nThe error was logged, and we will take a look into this right away.');
?>