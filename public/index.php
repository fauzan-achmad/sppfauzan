<?php

/**
 * officer Management
 * 
 * Teknologi yang digunakan: 
 * 
 *  - Framework:
 * 
 *      - Bootstrap
 * 
 *  - Package PHP:
 * 
 *      - vlucas/phpdotenv
 * 
 * @author Fauzan Achmad Ali Safitra
 */

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Memuat konfigurasi yang ada di file .env
 * 
 */

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/**
 * Mendefinisikan root directory dari aplikasi ini.
 * 
 */

define('ROOT_DIRECTORY', dirname(__DIR__));

/**
 * Memuat fungsi-fungsi penolong.
 * 
 */

require_once __DIR__ . '/../src/foundation/helpers.php';

/**
 * Memuat koneksi database.
 * 
 */

require_once __DIR__ . '/../src/database/connection.php';

/**
 * Membuat user dengan role admin.
 * 
 */

$user = [
    'name' => 'Admin',
    'username' => 'admin',
    'password' => password_hash('admin', PASSWORD_DEFAULT),
    'role' => 'admin',
];

/**
 * Cek apakah user dengan role admin sudah ada atau belum.
 * 
 */

$result = $connection->execute_query("SELECT * FROM users WHERE username = ?", [$user['username']]);
$admin = $result->fetch_assoc();

if (!$admin) {

    /**
     * Jika belum ada, maka buat user dengan role admin, jika sudah ada, maka lanjutkan ke proses selanjutnya.
     * 
     */

    $statement = $connection->execute_query("INSERT INTO users (name, username, password, role) VALUES (
        ?, ?, ?, ?
    )", [$user['name'], $user['username'], $user['password'], $user['role']]);
}

/**
 * Cek mode debug.
 * 
 */

if (!filter_var(env('APP_DEBUG'), FILTER_VALIDATE_BOOL)) {

    error_reporting(1);
}

/**
 * Mengubah default timezone.
 * 
 */

date_default_timezone_set(env('TIMEZONE', 'Asia/Jakarta'));

/**
 * Memulai sesi.
 * 
 */

session_start();

/**
 * Menghapus flash message yang sudah terpanggil.
 * 
 */

$flashMessages = $_SESSION['FLASH_MESSAGE'] ?? [];

foreach ($flashMessages as $key => $value) {

    if ($value['called']) {

        unset($flashMessages[$key]);
    }
}

$_SESSION['FLASH_MESSAGE'] = $flashMessages;

/**
 * Mengambil request url.
 * 
 */

$url = $_SERVER['REQUEST_URI'] !== '/' ? $_SERVER['REQUEST_URI'] : '/dashboard';

$position = strpos($url, '?') ?? false;

if ($position) {

    $url = substr($url, 0, $position);
}

/**
 * Daftar halaman yang membutuhkan akses login.
 * 
 */

$guardedPages = [
    '/dashboard',
    '/officers',
    '/officers/create',
    '/officers/detail',
    '/officers/edit',
    '/presences',
    '/students',
    '/students/create',
    '/students/edit',
    '/students/detail',
    '/spps',
    '/spps/create',
    '/spps/edit',
    '/spps/detail',
    '/payments',
    '/payments/create',
    '/payments/edit',
    '/payments/detail',
    '/class',
    '/class/create',
    '/class/edit',
    '/class/detail',
    '/reports'
];

$adminOrOfficerPages = [
    '/payments',
    '/payments/create',
    '/payments/delete',
    '/history',
];

/**
 * Daftar halaman yang tidak boleh menggunakan akses login.
 * 
 */

$unguardedPages = [
    '/login',
];

/**
 * Daftar halaman yang hanya boleh diakses oleh admin.
 * 
 */

$adminPages = [
    '/officers',
    '/officers/create',
    '/officers/detail',
    '/officers/edit',
    '/presences',
    '/students',
    '/students/create',
    '/students/edit',
    '/students/detail',
    '/spps',
    '/spps/create',
    '/spps/edit',
    '/spps/detail',
    '/payments/edit',
    '/class',
    '/class/create',
    '/class/edit',
    '/class/detail',
    '/reports'
];



/**
 * Daftar halaman yang hanya boleh diakses oleh officer.
 * 
 */

/**
 * Daftar aksi-aksi pada aplikasi ini.
 * 
 */

$actions = [

    '/actions/login' => function () {
        require_once __DIR__ . '/../actions/login.php';
        die();
    },

    '/actions/logout' => function () {
        require_once __DIR__ . '/../actions/logout.php';
        die();
    },

    '/actions/students/store' => function () {
        require_once __DIR__ . '/../actions/students/store.php';
        die();
    },

    '/actions/students/update' => function () {
        require_once __DIR__ . '/../actions/students/update.php';
        die();
    },

    '/actions/students/delete' => function () {
        require_once __DIR__ . '/../actions/students/delete.php';
        die();
    },

    '/actions/user/change' => function () {
        require_once __DIR__ . '/../actions/user/change.php';
        die();
    },

    '/actions/officers/store' => function () {
        require_once __DIR__ . '/../actions/officers/store.php';
        die();
    },

    '/actions/officers/update' => function () {
        require_once __DIR__ . '/../actions/officers/update.php';
        die();
    },

    '/actions/officers/delete' => function () {
        require_once __DIR__ . '/../actions/officers/delete.php';
        die();
    },

    '/actions/class/store' => function () {
        require_once __DIR__ . '/../actions/class/store.php';
        die();
    },

    '/actions/class/update' => function () {
        require_once __DIR__ . '/../actions/class/update.php';
        die();
    },

    '/actions/class/delete' => function () {
        require_once __DIR__ . '/../actions/class/delete.php';
        die();
    },

    '/actions/spps/store' => function () {
        require_once __DIR__ . '/../actions/spps/store.php';
        die();
    },

    '/actions/spps/update' => function () {
        require_once __DIR__ . '/../actions/spps/update.php';
        die();
    },

    '/actions/spps/delete' => function () {
        require_once __DIR__ . '/../actions/spps/delete.php';
        die();
    },

    '/actions/payments/store' => function () {
        require_once __DIR__ . '/../actions/payments/store.php';
        die();
    },

    '/actions/payments/delete' => function () {
        require_once __DIR__ . '/../actions/payments/delete.php';
        die();
    },

    '/actions/user/update' => function () {
        require_once __DIR__ . '/../actions/user/update.php';
        die();
    },
];


/**
 * Memuat halaman sesuai request url yang diberikan.
 * 
 */

if ($url !== '/') {

    if ($url == '/print') {

        require_once __DIR__ . '/../views/print.php';
        die();
    }

    /**
     * Cek apakah user mengakses sebuah aksi atau tidak.
     * 
     */

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($actions[$url])) {

        /**
         * Jika iya, maka jalankan aksi tersebut.
         * 
         */

        $actions[$url]();
    }

    /**
     * Cek apakah halaman membutuhkan akses login.
     * 
     */

    if (in_array($url, $guardedPages)) {

        /**
         * Jika user belum login, maka lempar user ke halaman login.
         * 
         */

        if (!isset($_SESSION['user'])) {

            header('Location: ' . env('APP_URL') . '/login');
            die();
        }
    }

    /**
     * Cek apakah halaman tidak boleh menggunakan akses login.
     * 
     */

    if (in_array($url, $unguardedPages)) {

        /**
         * Jika tidak boleh menggunakan akses login, maka lempar user ke halaman dashboard.
         * 
         */

        if (isset($_SESSION['user'])) {

            header('Location: ' . env('APP_URL'));
            die();
        }
    }

    /**
     * Cek user role.
     * 
     */

    if (in_array($url, $adminPages)) {

        if (isset($_SESSION['user']) && $_SESSION['user']['role'] !== 'admin') {

            header('Location: ' . env('APP_URL') . '/403');
            die();
        }
    }

    if (in_array($url, $adminOrOfficerPages)) {

        if (isset($_SESSION['user']) && ($_SESSION['user']['role'] !== 'admin' && $_SESSION['user']['role'] !== 'officer')) {

            header('Location: ' . env('APP_URL') . '/403');
            die();
        }
    }

    /**
     * Cek ketersediaan file.
     * 
     */

    if (file_exists(ROOT_DIRECTORY . '/views' . $url . '.php')) {

        render($url . '.php');
    } else {

        render('404.php');
    }
}
