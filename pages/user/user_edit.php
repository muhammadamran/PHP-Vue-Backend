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
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <!-- <h5 class="card-title">Update User</h5> -->
          <font class="card-title"><i class="fas fa-edit"></i> Edit User</font>
        </div>
        <div class="card-body ">
          <form action="pages/user/user_proses.php?aksi=update&id=<?= $_GET['id'] ?>" method="POST">
            <fieldset>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="IDUsername" class="col-form-label">First Name</label>
                    <input id="IDUsername" name="Username" type="text" class="form-control" placeholder="Username ..." value="<?= $row['username']; ?>" readonly>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="IDFName" class="col-form-label">First Name</label>
                    <input id="IDFName" name="FName" type="text" class="form-control" placeholder="First Name ..." value="<?= $row['fname'] ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="IDLName" class="col-form-label">Last Name</label>
                    <input id="IDLName" name="LName" type="text" class="form-control" placeholder="Last Name ..." value="<?= $row['lname'] ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="IDGender" class="col-form-label">Gender</label>
                    <select id="IDGender" name="Gender" class="form-control">
                      <option value="<?= $row['gender']; ?>"><?= $row['gender']; ?></option>
                      <option value="">-- Select --</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="unknow">Unknow</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="IDEmail" class="col-form-label">Email</label>
                    <input id="IDEmail" name="Email" type="email" class="form-control" placeholder="Email ..." value="<?= $row['email']; ?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="IDRole" class="col-form-label">Role</label>
                    <select id="IDRole" name="Role" class="form-control">
                      <option value="<?= $row['role']; ?>"><?= $row['role']; ?></option>
                      <option>-- Select --</option>
                      <option value="admin">Administrator</option>
                      <option value="member">Member</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="IDExpired" class="col-form-label">Expired Date</label>
                    <input id="IDExpired" name="ExpiredDate" type="date" min="<?= date('Y-m-d') ?>" class="form-control" value="<?= $row['expired_date']; ?>">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="Edit"><i class="fas fa-edit"> Edit</i></button>
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>