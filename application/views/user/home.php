<h3><b>Daftar Buku</b></h3>
<hr>
<div class="">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-sm table-bordered table-striped table-hover text-center" id="pasien" class="display">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Judul</th>
							<th scope="col">Pengarang</th>
							<th scope="col">Penerbit</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($buku as $row) {
						?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $row->Title ?></td>
								<td><?= $row->Author ?></td>
								<td><?= $row->Publisher ?></td>
								<td>
									<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?= $row->ID ?>"><b><i class='bx bxs-book'></i> Detail Buku</b></button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php foreach ($buku as $row) : ?>
		<div class="modal fade" id="detail<?= $row->ID ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-warning">
						<h5 class="modal-title" id="tambahdokterLabel">| Detail Buku <b><?= $row->Title ?></b></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label><i class="bx bxs-book text-dark"></i> <b> Judul Buku :</b></label>
										<span class="form-control "><?= $row->Title ?></span>
									</div>
									<div class="form-group">
										<label><i class="bx bx-world text-dark"></i> <b> Penerbit :</b></label>
										<span class="form-control "><?= $row->Publisher ?></span>
									</div>
									<div class="form-group">
										<label><i class="bx bxs-calendar text-dark"></i> <b> Tahun Terbit :</b></label>
										<span class="form-control "><?= $row->Year ?></span>
									</div>
									<div class="form-group">
										<label><i class="bx bx-book-reader text-dark"></i> <b> Tipe Buku :</b></label>
										<span class="form-control "><?= $row->Type ?></span>
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label><i class="bx bx-edit-alt text-dark"></i> <b> Pengarang :</b></label>
										<span class="form-control "><?= $row->Author ?></span>
									</div>
									<div class="form-group">
										<label><i class="bx bx-library text-dark"></i> <b> Kategori Buku :</b></label>
										<span class="form-control "><?= $row->Category ?></span>
									</div>
									<div class="form-group">
										<label><i class="bx bx-copy-alt text-dark"></i> <b> Copy :</b></label>
										<span class="form-control "><?= $row->Copy ?></span>
									</div>
									<div class="form-group">
										<label><i class="bx bxs-calendar-plus text-dark"></i> <b> Waktu Pembaruan :</b></label>
										<span class="form-control "><?= $row->TimeOfRenewal ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label><i class="bx bxs-book-open text-dark"></i> <b> Ready Dipinjam :</b></label>
										<span class="form-control "><?= $row->AllowingToLoan ?></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label><i class="bx bxs-timer text-dark"></i> <b> Max Lama Peminjaman :</b></label>
										<span class="form-control "><?= $row->DaysToLoan ?></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label><i class="bx bxs-check-square text-dark"></i> <b> Status Buku :</b></label>
										<span class="form-control "><?= $row->Status ?></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label><i class="bx bx-barcode-reader text-dark"></i> <b> Barcode :</b></label>
								<span class="form-control "><?= $row->Barcode ?></span>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">

						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>