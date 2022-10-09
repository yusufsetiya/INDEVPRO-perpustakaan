</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/js/coba.js"></script>
<script src="<?= base_url(); ?>assets/vendor/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/sweetalert/sweetalert-dev.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#peringatan-id').css('display', 'none');
    $("#iduser").keyup(function() {
      var iduser = $(this).val();

      value = {
        'iduser': iduser
      }

      $.ajax({
        url: "<?php echo base_url(); ?>ControlAdmin/get_iduser",
        type: "POST",
        data: value,
        success: function(data, textStatus, jqXHR) {
          var datas = jQuery.parseJSON(data);
          if (datas.result == 1) {
            $('#iduser').css('border-color', 'red');
            $('#peringatan-iduser').css('display', 'flex');
            $('#buttonsim').prop('disabled', true);
          } else {
            $('#iduser').css('border-color', 'green');
            $('#peringatan-iduser').css('display', 'none');
            $('#buttonsim').prop('disabled', false);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          $('#iduser').css('border-color', 'red');
          $('#buttonsim').prop('disabled', true);

          value = null;
        }
      })
    });
  });

  $(document).ready(function() {
    $('#user').DataTable();
  });

  $(document).ready(function() {
    $('#dokter').DataTable();
  });

  $(document).ready(function() {
    $('#pasien').DataTable();
  });

  $('.form-checkbox').click(function() {
    if ($(this).is(':checked')) {
      $('.form-password').attr('type', 'text');
    } else {
      $('.form-password').attr('type', 'password');
    }
  });

  <?php if ($this->session->flashdata('tambah') == 'berhasil') : ?>
    swal({
      title: "Sukses",
      text: 'User Berhasil Ditambahkan',
      type: "success",
      confirmButtonColor: '#3085d6',
      closeOnConfirm: false,
      closeOnCancel: false
    });
  <?php endif; ?>

  <?php if ($this->session->flashdata('update') == 'berhasil') : ?>
    swal({
      title: "Sukses",
      text: 'Data User Berhasil Diubah',
      type: "success",
      confirmButtonColor: '#3085d6',
      closeOnConfirm: false,
      closeOnCancel: false
    });
  <?php endif; ?>

  <?php if ($this->session->flashdata('hapus') == 'berhasil') : ?>
    swal({
      title: "Sukses",
      text: 'Data User Berhasil Dihapus',
      type: "success",
      confirmButtonColor: '#3085d6',
      closeOnConfirm: false,
      closeOnCancel: false
    });
  <?php endif; ?>
</script>
</body>

</html>