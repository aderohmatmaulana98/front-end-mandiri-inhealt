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
            <a href="<?= base_url('user/form_update_profil') ?>" class="btn btn-primary">Edit Data</a>
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