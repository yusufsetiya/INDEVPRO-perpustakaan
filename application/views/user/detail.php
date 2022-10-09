<div class="card">
  <h5 class="card-header">Detail Buku <b>Titanic</b></h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  <div class="card-body">
    <?php foreach ($detail as $row) : ?>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label><i class="bx bxs-book text-dark"></i> Judul Buku</label>
            <input type="text" value="<?= $row->Title ?>" name="judul_buku" class="form-control" placeholder="Judul Buku" disabled autocomplete="off">
          </div>
        </div>
        <div class="col-md-6">
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="card">
  <div class="card-body">

  </div>
</div>