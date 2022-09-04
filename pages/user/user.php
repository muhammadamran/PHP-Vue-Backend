<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">Users</h5>
        </div>
        <div class="card-body ">
          <a href="index.php?m=user&s=user_add" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Tambah User</a>
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered table-td-valign-middle">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Expired Date</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $data = $db->query("SELECT * FROM tbl_users ORDER BY role ASC, id ASC", 0);
                while ($row = $data->fetch_assoc()) {
                ?>
                  <tr>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['fname'] ?></td>
                    <td><?= $row['lname'] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= !empty($row['expired_date']) ? $row['expired_date'] : 'Tidak ada tanggal kadaluwarsa' ?></td>
                    <td><?= $row['role'] == 'admin' ? 'Administrator' : 'Member' ?></td>
                    <td>
                      <a href="index.php?m=user&s=user_edit&id=<?= $row['id'] ?>" class="btn btn-xs btn-primary">Edit</a>
                      <a href="index.php?m=user&s=user_password&id=<?= $row['id'] ?>" class="btn btn-xs btn-secondary">Change Password</a>
                      <a onclick="deleteData(<?= $row['id'] ?>)" class="btn btn-xs btn-danger" style="color:#fff;cursor:pointer">Hapus</a>
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
    var r = confirm("Anda yakin ingin menghapus ini");
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