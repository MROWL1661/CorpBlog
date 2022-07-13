<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'corp-wp' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%N_dxjG*kn/d1#g7W*QJO?`Wh>xW>YEH{wi>d79K-l_tP%a-8yyRr:g[2.>8xv=q' );
define( 'SECURE_AUTH_KEY',  '!__+pJppGjg[F;@%,Fc8(h$L*!9FWc+#W[3WdxQEd|}n7;{D.(l1Y_hjVf[)9wO6' );
define( 'LOGGED_IN_KEY',    'd4UEQ;,SpsGP&ks>)Sw}+6438ktGV<TqWtFFkk /W,H?d^hNWj|,L?pp%2Zrab^J' );
define( 'NONCE_KEY',        '7P.V4fT/p$/A{/w(-P$_^kpoS!EC^`|Y,*mW24KH{ zo -VD,.38#El4<;=MsX$@' );
define( 'AUTH_SALT',        '$ltx)1 .OHTGqnOzEO}tR~,RX%xpIsWYsSc=HO1|A$awOPwE53u7cJ=4`/~x]r<N' );
define( 'SECURE_AUTH_SALT', 'OQro.KgLW<hu>}>9#qo[;g#Sm5t ?!5~&3xrmtgXiiEOrH7+a/yM3{)!~Uo_-jdh' );
define( 'LOGGED_IN_SALT',   'CdCT],j7WT%^IuYE;v;b*fz3w@{*M+-&X nMJ//L`BtnsS3jB4&vG}ZxDSsd+Gx}' );
define( 'NONCE_SALT',       'ko%CbKjyFaNSKlYuQKsEkWGkj%)45#}}h[c}bZ547oIGI=MB0IpSU puovS_dVY,' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
