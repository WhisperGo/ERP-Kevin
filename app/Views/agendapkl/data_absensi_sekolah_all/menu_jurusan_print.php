<?php
$id_user = session()->get('id');
$level = session()->get('level');
$db = \Config\Database::connect();

$query = $db->table('guru')
	->select('rombel.jurusan') // Pilih kolom jurusan dari tabel rombel
	->join('rombel', 'rombel.id_rombel = guru.rombel') // Bergabung dengan tabel rombel berdasarkan kolom rombel pada tabel guru dan id_rombel pada tabel rombel
	->where('guru.user', $id_user) // Sesuaikan pengecekan berdasarkan kolom user pada tabel guru
	->get();

if ($query->getNumRows() > 0) {
	$row = $query->getRow();
	$jurusan = $row->jurusan;
?>

	<div id="main-content">
		<div class="page-heading">
			<div class="page-title">
				<div class="row">
					<div class="col-12 col-md-6 order-md-1 order-last">
						<h3><?= $title ?></h3>
						<p class="text-subtitle text-muted">Anda dapat melihat <?= $title ?> di bawah</p>
					</div>
					<div class="col-12 col-md-6 order-md-2 order-first">
						<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?= base_url('agendapkl/dashboard') ?>">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<section class="section">
				<div class="card">
					<div class="card-header d-flex justify-content-center align-items-center gap-2">
						<?php if ($level == 3 && $jurusan == 2) { ?>
							<a href="<?php echo base_url('agendapkl/data_absensi_sekolah_all/menu_print_rpl/') ?>" class="btn btn-primary mt-2 mx-2"><i class="faj-button fa-regular fa-computer"></i>
								RPL</a>
						<?php } ?>

						<?php if ($level == 3 && $jurusan == 3) { ?>
							<a href="<?php echo base_url('agendapkl/data_absensi_sekolah_all/menu_print_akl/') ?>" class="btn btn-danger mt-2 mx-2"><i class="faj-button fa-regular fa-calculator"></i>
								AKL</a>
						<?php } ?>

						<?php if ($level == 3 && $jurusan == 4) { ?>
							<a href="<?php echo base_url('agendapkl/data_absensi_sekolah_all/menu_print_bdp/') ?>" class="btn btn-success mt-2 mx-2"><i class="faj-button fa-regular fa-business-time"></i>
								BDP</a>
						<?php } ?>
						
					</div>
					<div class="card-body">
					</div>
				</div>
			</section>
		<?php } ?>