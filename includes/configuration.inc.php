<?php
	define('SERVER_INSTANCE', 'dev');

	switch (SERVER_INSTANCE) {
		case 'dev':
			define ('__DOCROOT__', '/var/www/qcodo-website/www');

			define('DB_CONNECTION_1', serialize(array(
				'adapter' => 'MySqli5',
				'server' => '127.0.0.1',
				'port' => null,
				'database' => 'qcodo_website',
				'username' => 'root',
				'password' => '',
				'encoding' => 'utf8',
				'profiling' => false)));

			define('SMTP_SERVER', '127.0.0.1');
			define('SMTP_EHLO', '127.0.0.1');
			define('SMTP_TEST_MODE', true);
			define('MIME_MAGIC_PATH', null);

			define('SALT', 'salt');
			break;

		case 'prod':
			define ('__DOCROOT__', '%DOCROOT%');

			define('DB_CONNECTION_1', serialize(array(
				'adapter' => 'MySqli5',
				'server' => '%DB_SERVER%',
				'port' => null,
				'database' => '%DB_NAME%',
				'username' => '%DB_USER%',
				'password' => '%DB_PASSWORD%',
				'encoding' => 'utf8',
				'profiling' => false)));

			define('SMTP_SERVER', '%SMTP_SERVER%');
			define('SMTP_EHLO', '%SMTP_EHLO%');
			define('SMTP_TEST_MODE', false);
			define('MIME_MAGIC_PATH', '/usr/share/file/magic');

			define('SALT', '%SALT%');
			break;
	}

	define ('__VIRTUAL_DIRECTORY__', '');
	define ('__SUBDIRECTORY__', '');

	define('ALLOW_REMOTE_ADMIN', false);
	define ('__URL_REWRITE__', 'apache');

	define('QCODO_EMAILER', 'Qcodo.com Message <not_moderated@qcodo.com>');

	define('__DATA_ASSETS__', __DOCROOT__ . '/../data_assets');
	define('__SEARCH_INDEXES__', __DATA_ASSETS__ . '/search_indexes');
	define('__WIKI_FILE_REPOSITORY__', __DATA_ASSETS__ . '/wiki_assets');
	define('__SHOWCASE_IMAGES__', __DATA_ASSETS__ . '/showcase_images');
	define('__QPM_PACKAGES__', __DATA_ASSETS__ . '/qpm_packages');

	define('__QCODO_BUILDS__', '/var/qcodo_builds');

	define ('__DEVTOOLS_CLI__', __DOCROOT__ . __SUBDIRECTORY__ . '/../cli');
	define ('__INCLUDES__', __DOCROOT__ .  __SUBDIRECTORY__ . '/../includes');
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

	define ('__IMAGES_CACHED__', '/images/cached');
	define('ERROR_LOG_PATH', __DATA_ASSETS__ . '/error_log');

	if (SERVER_INSTANCE == 'dev') {
		define('ERROR_LOG_FLAG', true);
		define('ERROR_FRIENDLY_PAGE_PATH', __DOCROOT__ . __PHP_ASSETS__ . '/qcodo_website_error_page.html');
		define('ERROR_FRIENDLY_AJAX_MESSAGE', 'Oops!  An error has occurred.\r\n\r\nThe error was logged, and we will take a look into this right away.');
	}
?>