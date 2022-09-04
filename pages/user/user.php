<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<div class="content">

  <div class="page-header-title">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="title-page">
          <i class="icon-copy nc-icon nc-single-02 for-icon-page"></i>
          <font class="font-title">Users</font>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-item-title">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <!-- <h5 class="card-title">Users</h5> -->
          <font class="card-title"><i class="fas fa-table"></i> Data</font>
        </div>
        <div class="card-body ">
          <a href="index.php?m=user&s=user_add" class="btn btn-sm btn-dark" title="Add User"><i class="fas fa-plus-circle"></i> Add User</a>
          <div class="line-page"></div>
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered table-td-valign-middle">
              <thead>
                <tr>
                  <th width="1%">#</th>
                  <th class="text-nowrap" style="text-align: center;">Username</th>
                  <th class="text-nowrap" style="text-align: center;">First Name</th>
                  <th class="text-nowrap" style="text-align: center;">Last Name</th>
                  <th class="text-nowrap" style="text-align: center;">Gender</th>
                  <th class="text-nowrap" style="text-align: center;">Email</th>
                  <th class="text-nowrap" style="text-align: center;">Expired Date</th>
                  <th class="text-nowrap" style="text-align: center;">Level</th>
                  <th class="text-nowrap" style="text-align: center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $data = $db->query("SELECT * FROM tbl_users ORDER BY role ASC, id ASC", 0);
                $no = 0;
                while ($row = $data->fetch_assoc()) {
                  $no++;
                ?>
                  <tr>
                    <td width="1%" class="f-s-600 text-inverse"><?= $no ?>.</td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['fname'] ?></td>
                    <td><?= $row['lname'] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= !empty($row['expired_date']) ? $row['expired_date'] : 'Tidak ada tanggal kadaluwarsa' ?></td>
                    <td><?= $row['role'] == 'admin' ? 'Administrator' : 'Member' ?></td>
                    <td>
                      <div class="aksi-table">
                        <a href="index.php?m=user&s=user_edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-aksi btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                        <a href="index.php?m=user&s=user_password&id=<?= $row['id'] ?>" class="btn btn-sm btn-aksi btn-secondary" title=" Change Password"><i class="fas fa-exchange-alt"></i></a>
                        <a onclick="deleteData(<?= $row['id'] ?>)" class="btn btn-sm btn-aksi btn-danger" style="color:#fff;cursor:pointer" title="Delete"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
  });

  function deleteData(id) {
    var r = confirm("Are you sure you want to delete this record?");
    if (r == true) {
      location.href = "pages/user/user_proses.php?aksi=hapus&id=" + id;
    }
  }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>