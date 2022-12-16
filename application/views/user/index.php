<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?= $this->session->flashdata('message');  ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $username1 ?>">
                Edit Data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $username1 ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel<?= $username1 ?>">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('user/aksi_update_profile') ?>" method="POST" enctype="application/x-www-form-urlencoded">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $name1; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?= $address1; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Birth Day</label>
                                    <input type="date" class="form-control" id="bod" name="bod" value="<?= $bod1; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $email1; ?>" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-striped mt-3">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td><?= $name1 ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?= $address1 ?></td>
                    </tr>
                    <tr>
                        <td>Birth Of Date</td>
                        <td><?= $bod1 ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $email1 ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->