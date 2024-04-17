<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>ERP - SPH</title>
    <base href="<?php echo base_url('assets_landing_page') ?>/">

    <link rel="icon" type="image/x-icon" href="<?= base_url('prixier/logo_sph.png') ?>">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="<?= base_url('assets/extensions/@fortawesome/fontawesome-pro/css/all.min.css') ?>">

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-topic-listing.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script src="https://kit.fontawesome.com/c0c79d4e21.js" crossorigin="anonymous"></script>
</head>

<body id="top">

    <main>
        <style>
            .avatar-image {
                display: none;
                /* Hide the profile picture */
            }

            .header-right {
                display: flex;
                align-items: center;
                margin-left: auto;
            }

            .navbar-nav .nav-link {
                padding: 0.5rem 1rem;
                /* Adjust the padding as needed */
            }
        </style>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand">
                    <span>ERP - SPH</span>
                </a>

                <div class="header-left">
                </div>

                <ul class="navbar-nav header-right">
                    <li class="nav-item">
                        <a class="nav-link">
                            <div class="header-info">
                                <span>Halo, <strong class="text-capitalize"><?= session()->get('username') ?>!</strong></span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <button class="btn btn-dark"><a href="<?= base_url('landing_page_erp/home/logout') ?>" style="color: white;"><i class="fa-solid fa-right-from-bracket"></i></a></button>
                    </li>
                </ul>
            </div>
        </nav>


        <section class="explore-section section-padding" id="section_2">
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <br>
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                <div class="row">
                                    <style>
                                        #webDesignCard {
                                            cursor: pointer;
                                        }
                                    </style>

                                    <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>

                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-02">
                                            <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                                <img src="images/topics/undraw_Redesign_feedback_re_jvm0.png" class="custom-block-image img-fluid" alt="">
                                                <br>
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">Absensi</h5>
                                                        <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="project-02" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Absensi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <a href="<?=base_url('dashboard')?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka App</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-01">
                                            <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                                <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                                                <br>
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">Penilaian</h5>
                                                        <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="project-01" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Penilaian</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <a href="<?=base_url('penilaian')?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka App</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-03">
                                            <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                                <img src="images/topics/colleagues-working-cozy-office-medium-shot.png" class="custom-block-image img-fluid" alt="">
                                                <br>
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">Agenda PKL</h5>
                                                        <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="project-03" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Agenda PKL</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <a href="<?= base_url('agendapkl/dashboard') ?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka App</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div><br>

                                <div class="row">
                                    <style>
                                        #webDesignCard {
                                            cursor: pointer;
                                        }
                                    </style>

                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-05">
                                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                            <img src="images/topics/undraw_Redesign_feedback_re_jvm0.png" class="custom-block-image img-fluid" alt="">
                                            <br>
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">E-Voting</h5>
                                                    <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="project-05" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">E-Voting</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="<?=base_url('voting')?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka App</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-06">
                                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                            <img src="images/topics/colleagues-working-cozy-office-medium-shot.png" class="custom-block-image img-fluid" alt="">
                                            <br>
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Data Master</h5>
                                                    <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="project-06" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Data Master</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="<?=base_url('master')?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka App</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } else if (session()->get('level') == 3) { ?>

                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-01">
                                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                            <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                                            <br>
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Penilaian</h5>
                                                    <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="project-01" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Penilaian</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="<?= base_url('penilaian') ?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka
                                                            APP</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-02">
                                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                            <img src="images/topics/undraw_Redesign_feedback_re_jvm0.png" class="custom-block-image img-fluid" alt="">
                                            <br>
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Absensi</h5>
                                                    <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="project-02" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Absensi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="<?=base_url('dashboard')?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka App</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-03">
                                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                            <img src="images/topics/colleagues-working-cozy-office-medium-shot.png" class="custom-block-image img-fluid" alt="">
                                            <br>
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Agenda PKL</h5>
                                                    <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="project-03" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Agenda PKL</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="<?= base_url('agendapkl/dashboard') ?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka App</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <style>
                                        #webDesignCard {
                                            cursor: pointer;
                                        }
                                    </style>

                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-05">
                                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                            <img src="images/topics/undraw_Redesign_feedback_re_jvm0.png" class="custom-block-image img-fluid" alt="">
                                            <br>
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">E-Voting</h5>
                                                    <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="project-05" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">E-Voting</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="<?=base_url('voting')?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka App</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } else if (session()->get('level') == 4 || session()->get('level') == 5) { ?>

                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-01">
                                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                            <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                                            <br>
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">E-Voting</h5>
                                                    <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="project-01" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">E-Voting</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="<?=base_url('voting')?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka APP</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-02">
                                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                            <img src="images/topics/undraw_Redesign_feedback_re_jvm0.png" class="custom-block-image img-fluid" alt="">
                                            <br>
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Absensi</h5>
                                                    <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="project-02" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Absensi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="<?= base_url('dashboard') ?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka App</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0" id="webDesignCard" data-bs-toggle="modal" data-bs-target="#project-03">
                                        <div class="custom-block bg-white shadow-lg" data-aos="fade-up">
                                            <img src="images/topics/colleagues-working-cozy-office-medium-shot.png" class="custom-block-image img-fluid" alt="">
                                            <br>
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Agenda PKL</h5>
                                                    <p class="mb-0">Topic Listing Template based on Bootstrap 5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="project-03" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Agenda PKL</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin membuka aplikasi ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="<?= base_url('agendapkl/dashboard') ?>"><button type="button" class="btn btn-success" data-bs-dismiss="modal">Membuka App</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>

                            </div><br>
                        </div><br>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>

<style>
    *::-webkit-scrollbar {
        display: none;
    }
</style>
<script>
    AOS.init();
</script>
<!-- End Col -->

<!-- Log Out Otomatis -->
<script>
    // Fungsi untuk mengatur timer otomatis logout
    function startLogoutTimer() {
        let timeoutId;

        function resetTimer() {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(logout, 30 * 60 * 1000); //30 Menit
        }

        function logout() {
            window.location.href = '<?= base_url('landing_page_erp/home/logout') ?>';
        }

        // Resep timer setiap kali ada aktivitas
        window.addEventListener('mousemove', resetTimer);
        window.addEventListener('click', resetTimer);
        window.addEventListener('keypress', resetTimer);
        resetTimer();
    }

    // Panggil fungsi untuk memulai timer otomatis logout
    startLogoutTimer();
</script>
<!-- Log Out Otomatis -->