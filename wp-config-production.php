<?php
/**
 * wp-config.php — PRODUCTION (InfinityFree / gamerminds.kesug.com)
 *
 * HOW TO USE:
 *   1. Rename this file to "wp-config.php" before uploading to the server.
 *   2. Never commit this file — it contains live database credentials.
 */

// ── Database ──────────────────────────────────────────────
define( 'DB_NAME',     'if0_41402162_gamerminds' );
define( 'DB_USER',     'if0_41402162' );
define( 'DB_PASSWORD', 'de3sv6M5v171' );
define( 'DB_HOST',     'sql105.infinityfree.com' );
define( 'DB_CHARSET',  'utf8mb4' );
define( 'DB_COLLATE',  '' );

// ── Site URLs ─────────────────────────────────────────────
define( 'WP_HOME',    'https://gamerminds.kesug.com' );
define( 'WP_SITEURL', 'https://gamerminds.kesug.com' );

// ── Secret Keys & Salts ───────────────────────────────────
// Generate fresh ones at: https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY',         'QG*E`u)Gh)otgH$5:xXD]m[Ai+,{@a2|X[F[(V*(b$_0Gx@5rEq#RPGChdn$*%t=' );
define( 'SECURE_AUTH_KEY',  '~zy}%UobuxxK:9>T%@x-]0Um!9Dok;7l39}5A/>^N;] d<q~.t|vbM89{>2S_z2C' );
define( 'LOGGED_IN_KEY',    '~Espm#on]+6-G$+%},)E!~H3prH?$8vy}eeCd-H?Kg}h^3g~,~%HtU_,7)tsrgB4' );
define( 'NONCE_KEY',        '?I!AEWb#mV)1tAbDTo}o&=tcoj )u~Trg_M9FBe{{l(cfU==nS]D{OFIF3iv{$;r' );
define( 'AUTH_SALT',        '}%e=^TBwx6EX<5,X[2UXyQNQ(Ws(Y@]Q:<Bg}Hnnw#$tfTRdhi-l/K@KpVz;K8*|' );
define( 'SECURE_AUTH_SALT', 'PY>H3D~QZ^:Ffmhmn!RClWP!RM|dRI:9UE-`CY$x/fKG|QtF66g8KZY(?MU%]^x/' );
define( 'LOGGED_IN_SALT',   '>`YoYLnW7N-T*KJ$$ghCE7,arLeW~<GQ0X4j1yhN3eWgRlc/HhT7`dIVx4WUX.ri' );
define( 'NONCE_SALT',       ']2`7%p$rzm_)f1K;(igUklJx~7[j#gMoU>h(2qKZM6v0w&Mg9FVKXX`y*d7Zkt0{' );

// ── Table Prefix ──────────────────────────────────────────
$table_prefix = 'wp_';

// ── InfinityFree Required ─────────────────────────────────
// Allows WordPress to write files (theme/plugin installs) without FTP prompt.
define( 'FS_METHOD', 'direct' );

// ── Debugging — disable on production ────────────────────
define( 'WP_DEBUG',         false );
define( 'WP_DEBUG_LOG',     false );
define( 'WP_DEBUG_DISPLAY', false );

/* That's all, stop editing! Happy publishing. */

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
