<?php

$uri = service('uri');

$db = \Config\Database::connect();
$builder = $db->table('website');
$logo = $builder->select('logo_website')
    ->where('deleted_at', null)
    ->get()
    ->getRow();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main/app.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main/app-dark.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo/obor.png') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo/obor.png" type="image/png') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/shared/iconly.css') ?>">


</head>

<body>
    <script src="<?php echo base_url('assets/static/js/initTheme.js') ?>"></script>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="<?= base_url('voting/home/dashboard') ?>"><img src="<?= base_url('logo/logo_website/' . $logo->logo_website) ?>" alt="Logo" /></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <?php
                if (session()->get('level') == 1) {
                ?>

                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-title">Menu</li>

                            <li class="sidebar-item <?php if ($uri->getSegment(3) == "dashboard") {
                                                        echo "active";
                                                    } ?>">
                                <a href="<?= base_url('voting/home/dashboard') ?>" class='sidebar-link'>
                                    <i class="fa-solid fa-grid-2"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-item <?php if ($uri->getSegment(2) == "kandidat") {
                                                        echo "active";
                                                    } ?>">
                                <a href="<?= base_url('voting/kandidat') ?>" class='sidebar-link'>
                                    <i class="bi bi-person"></i>
                                    <span>Kandidat</span>
                                </a>
                            </li>

                            <li class="sidebar-item <?php if ($uri->getSegment(2) == "vote") {
                                                        echo "active";
                                                    } ?>">
                                <a href="<?= base_url('voting/vote') ?>" class='sidebar-link'>
                                    <i class="bi bi-flag"></i>
                                    <span>Vote</span>
                                </a>
                            </li>

                            <li class="sidebar-item <?php if ($uri->getSegment(2) == "voting") {
                                                        echo "active";
                                                    } ?>">
                                <a href="<?= base_url('voting/voting') ?>" class='sidebar-link'>
                                    <i class="bi bi-briefcase"></i>
                                    <span>Voting</span>
                                </a>
                            </li>

                            <li class="sidebar-item <?php if ($uri->getSegment(2) == "hasil") {
                                                        echo "active";
                                                    } ?>">
                                <a href="<?= base_url('voting/hasil') ?>" class='sidebar-link'>
                                    <i class="bi bi-list"></i>
                                    <span>Hasil</span>
                                </a>
                            </li>

                            <!-- <li class="sidebar-item">
                <a href="/voting/User/ganti_pass/" class='sidebar-link'>
                    <i class="bi bi-key"></i>
                    <span>Ganti Password</span>
                </a>
            </li>  -->
                        </ul>
                    </div>
            </div>
        </div>

    <?php
                } else if (session()->get('level') == 2) {
    ?>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?php if ($uri->getSegment(3) == "dashboard") {
                                            echo "active";
                                        } ?>">
                    <a href="<?= base_url('voting/home/dashboard') ?>" class='sidebar-link'>
                        <i class="fa-solid fa-grid-2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item <?php if ($uri->getSegment(2) == "kandidat") {
                                            echo "active";
                                        } ?>">
                    <a href="<?= base_url('voting/kandidat') ?>" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>Kandidat</span>
                    </a>
                </li>

                <li class="sidebar-item <?php if ($uri->getSegment(2) == "vote") {
                                            echo "active";
                                        } ?>">
                    <a href="<?= base_url('voting/vote') ?>" class='sidebar-link'>
                        <i class="bi bi-flag"></i>
                        <span>Vote</span>
                    </a>
                </li>

                <li class="sidebar-item <?php if ($uri->getSegment(2) == "hasil") {
                                            echo "active";
                                        } ?>">
                    <a href="<?= base_url('voting/hasil') ?>" class='sidebar-link'>
                        <i class="bi bi-list"></i>
                        <span>Hasil</span>
                    </a>
                </li>
                <!-- <li class="sidebar-item">
                <a href="/voting/User/ganti_pass/" class='sidebar-link'>
                    <i class="bi bi-key"></i>
                    <span>Ganti Password</span>
                </a>
            </li>  -->
            </ul>
        </div>
    </div>
    </div>
<?php
                } else if (session()->get('level') == 3 ||  session()->get('level') == 4 ||  session()->get('level') == 5) {
?>

    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item <?php if ($uri->getSegment(3) == "dashboard") {
                                        echo "active";
                                    } ?>">
                <a href="<?= base_url('voting/home/dashboard') ?>" class='sidebar-link'>
                    <i class="fa-solid fa-grid-2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item <?php if ($uri->getSegment(2) == "voting") {
                                        echo "active";
                                    } ?>">
                <a href="<?= base_url('voting/voting') ?>" class='sidebar-link'>
                    <i class="bi bi-briefcase"></i>
                    <span>Voting</span>
                </a>
            </li>

            <li class="sidebar-item <?php if ($uri->getSegment(2) == "hasil") {
                                        echo "active";
                                    } ?>">
                <a href="<?= base_url('voting/hasil') ?>" class='sidebar-link'>
                    <i class="bi bi-list"></i>
                    <span>Hasil</span>
                </a>
            </li>

            <!-- <li class="sidebar-item">
                <a href="/voting/User/ganti_pass/" class='sidebar-link'>
                    <i class="bi bi-key"></i>
                    <span>Ganti Password</span>
                </a>
            </li>  -->
            
        </ul>
    </div>
    </div>
    </div>
<?php } ?>


<?php
$db         = \Config\Database::connect();

$level      = session()->get('level');
$on         = 'user.level=level.id_level';
$namalevel  = $db->table('user')->join('level', $on, 'left')->where('level.id_level', $level)->get()->getRow();

$id_user = session()->get('id');
$user = $db->table('user')->where('id_user', $id_user)->get()->getRow();

$siswa = $db->table('siswa')->where('user', $id_user)->get()->getRow();

if (!empty($user->foto)) {
    $foto = base_url('images/' . $user->foto);
} else {
    $foto = base_url('images/default.png');
}

?>


<div id="main" class="layout-navbar navbar-fixed">
    <header>
        <nav class="navbar navbar-expand navbar-light navbar-top">
            <div class="container-fluid">
                <a class="burger-btn d-block"><i class="bi bi-justify fs-3"></i></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-lg-0">

                        <div class="dropdown">
                            <a data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <?php
                                        $level = session()->get('level');

                                        if ($level == 1 || $level == 2 || $level == 3) {
                                            // Jika level 1, 2, atau 3, gunakan session()->get('username')
                                            echo "<h6 class='mb-0 text-gray-600'>" . session()->get('username') . "</h6>";
                                        } elseif ($level == 4 || $level == 5) {
                                            // Jika level 4 atau 5, gunakan $siswa->nama_siswa
                                            echo "<h6 class='mb-0 text-gray-600'>$siswa->nama_siswa</h6>";
                                        } else {
                                            // Jika level tidak sesuai dengan kriteria di atas
                                            echo "<h6 class='mb-0 text-gray-600'>Teks Default</h6>";
                                        }
                                        ?>
                                        <p class="mb-0 text-sm text-gray-600"><?= $namalevel->nama_level ?></p>
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="<?= base_url('images/default.png') ?>">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem">
                                <li>
                                    <h6 class="dropdown-header">
                                        <?php
                                        $level = session()->get('level');

                                        if ($level == 1 || $level == 2 || $level == 3) {
                                            // Jika level 1, 2, atau 3, gunakan session()->get('username')
                                            echo "Halo, " . session()->get('username') . "!";
                                        } elseif ($level == 4 || $level == 5) {
                                            // Jika level 4 atau 5, gunakan $siswa->nama_siswa
                                            echo "Halo, $siswa->nama_siswa!";
                                        } else {
                                            // Jika level tidak sesuai dengan kriteria di atas
                                            echo "Selamat Datang!";
                                        }
                                        ?>
                                    </h6>
                                </li>

                                <!-- <li>
                <a class="dropdown-item" href="<?= base_url('data_pengguna/' . session()->get('id')) ?>">
                  <i class="fa-regular fa-gear me-2"></i>
                Settings</a>
            </li> -->

                                <li>
                                    <a class="dropdown-item" href="<?= base_url('landing_page_erp/home/dashboard') ?>">
                                        <i class="fa-regular fa-arrow-right-from-bracket me-2"></i>
                                        Back</a>
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
        </nav>
    </header>