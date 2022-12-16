<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Skill</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Skill</li>
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
            <a href="<?= base_url('user/form_add_skill') ?>" class="btn btn-primary">Add Skill</a>
            <table class="table table-striped mt-3">
                <thead>
                    <th>Skill ID</th>
                    <th> Skill Name</th>
                    <th> Action</th>
                </thead>
                <tbody>
                    <?php foreach ($skill_id as $si) : ?>
                        <tr>
                            <td><?= $si['skill_id'] ?></td>
                            <td><?= $si['skill_name'] ?></td>
                            <td>
                                <a href="<?= base_url('user/form_edit_skill/' . $si['skill_id']) ?>"><span class="badge badge-pill badge-success">Edit</span></a>
                                <a href=""><span class="badge badge-pill badge-danger">Hapus</span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->