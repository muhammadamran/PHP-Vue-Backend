<?php
$data = $db->query('SELECT * FROM tbl_users WHERE id="' . $_GET['id'] . '"');
$row = $data->fetch_assoc()
?>
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
            <li class="breadcrumb-item" aria-current="page">Users</li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <!-- <h5 class="card-title">Update Password User</h5> -->
          <font class="card-title"><i class="fas fa-exchange-alt"></i> Change Password</font>
        </div>
        <div class="card-body ">
          <form action="pages/user/user_proses.php?aksi=update_password&id=<?= $_GET['id'] ?>" method="POST">
            <div class="form-group">
              <label for="inputText3" class="col-form-label">New Password</label>
              <input id="inputText3" name="password" type="password" class="form-control" placeholder="New Password ...">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="ChangePassword"><i class="fas fa-exchange-alt"> Change Password</i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>