<h3><b>Dashboard</b></h3>
<hr>
<div class="container">
  <div class="row center">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger bg-light shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold dark text-uppercase mb-1">Jumlah User</div>
              <div class="h2 mb-0 font-weight-bold text-gray-800"><b><?= $users ?></b></div>
            </div>
            <div class="col-auto">
              <i class='bx bx-user dash-icon'></i>
              <!-- <i class="fas fa-box fa-2x text-gray-300"><i class="fa fa-user"></i></i> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger bg-light shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold dark text-uppercase mb-1">Jumlah Buku</div>
              <div class="h2 mb-0 font-weight-bold text-gray-800"><b><?= $bukus ?></b></div>
            </div>
            <div class="col-auto">
              <i class='bx bx-book-bookmark dash-icon'></i>
              <!-- <i class="fas fa-box fa-2x text-gray-300"><i class="fa fa-user"></i></i> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>