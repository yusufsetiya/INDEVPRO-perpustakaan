<h3><b>Kelola User</b></h3>
<hr>
<div class="">
  <div class="card">
    <div class="card-header alert-primary">
      <b>Daftar User</b>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahuser">
        <small><b><i class='bx bx-plus'></i> Tambah User</b></small>
      </button>
      <br><br>
      <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped table-hover text-center" id="pasien" class="display">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama User</th>
              <th scope="col">Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($user as $row) {
            ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->Name ?></td>
                <td>
                  <?php if ($row->Status == '1') { ?>
                    <p class="badge  badge-primary">Admin</p>
                  <?php } else { ?>
                    <p class="badge badge-warning">User</p>
                  <?php } ?>
                </td>
                <td>
                  <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edituser<?= $row->UserID ?>"><b><i class='bx bx-pencil'></i> Edit</b></button>
                  <a onclick="hapus()" class="btn btn-danger btn-sm" href="<?php echo base_url() . 'ControlAdmin/Delete/' . $row->UserID; ?>"><i class="bx bxs-trash"></i> Hapus</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Tambah-->
  <div class="modal fade" id="tambahuser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahdokterLabel">Tambah User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('ControlAdmin/AddData'); ?>" method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">ID User</label>
              <input id="iduser" type="text" class="form-control" required name="iduser" aria-describedby="emailHelp" placeholder="Isikan Hanya Angka">
              <span class="text-danger small" id="peringatan-iduser">ID User Sudah Digunakan</span>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Password</label>
              <input type="password" class="form-control form-password" name="password" required>
              <input type="checkbox" name="tampil_pwd" class="form-checkbox"> Tampil Password
            </div>
            <div class="row">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status</label>
                <select name="status" id="" class="form-select" required>
                  <option>Pilih...</option>
                  <option value='1' name="status">Admin</option>
                  <option value='2' name="status">User</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" id="buttonsim" class="btn btn-success form-control">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php foreach ($user as $row) : ?>
    <div class="modal fade" id="edituser<?= $row->UserID ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahdokterLabel">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('ControlAdmin/EditData'); ?>" method="POST">
              <input type="hidden" name="id" value="<?= $row->UserID ?>">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" class="form-control" value="<?= $row->Name ?>" name="nama" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control form-password" value='<?= $row->Password ?>' name="password" required>
                <input type="checkbox" name="tampil_pwd" class="form-checkbox"> Tampil Password
              </div>
              <div class="row">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Status</label>
                  <select name="status" id="" class="form-select" required>
                    <option selected>Pilih Status</option>
                    <option value='1' <?php echo ($row->Status == 1) ? "selected" : ""; ?> name="status">Admin</option>
                    <option value='2' <?php echo ($row->Status == 2) ? "selected" : ""; ?> name="status">User</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" id="buttonsim" class="btn btn-success form-control">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
