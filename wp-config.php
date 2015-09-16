<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'digigo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'MindBlazeTech-DB');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'B^Qt /UYj<yrFQUZU%Qm#H[`<5Xe[-z@9$89`!/4Y(M8k[@<`cK+64Y>NpY 6Bs}');
define('SECURE_AUTH_KEY',  'wAL?sx)Ja>nsq,S`o=1:h+9MW#(Jux(+*SD2uL2t,<!,<i3>*Olx6uz+/91JT(fB');
define('LOGGED_IN_KEY',    '#*I^@cW0JNO%X?!%/+[RJntF$qf!og_A;_D#rm(mcE*.(z@gNXkakVLNM4;Ia=qz');
define('NONCE_KEY',        '~gAAy]rLW~hK~b}fUT16^R?zE@`9;%.P.huY+-&!9]Tse4E[R1Q#T2]w>Q?m_ vK');
define('AUTH_SALT',        'w-nQrFF])!w;Z{%SjG-H;mr~z7v<_jDL0`Uvx.RyC[CuCb~fIU{EdLG24&{_JlG=');
define('SECURE_AUTH_SALT', '6RMj4up6WK{=l|76/{c,PA>G^D[@8N:F:bwevl6>e4{A_%^1f~SowAfa9C12W3uX');
define('LOGGED_IN_SALT',   'J<%;5VNBP0M}Mi`GK+:DxFWfX7%]h- [U7ooAbg:T>$;[R9<Xf9`U|>cW>i589P#');
define('NONCE_SALT',       'T@[CR:fv|cSVpm{<9Y1zOOZ2Zd4l,a)+!B&W-TDzFMbLo6Z@mVxfBT5-`dL1(bxq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
