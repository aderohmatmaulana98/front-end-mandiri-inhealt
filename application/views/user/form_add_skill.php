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
            <form action="<?= base_url('user/aksi_add_skill') ?>" method="POST" enctype="application/x-www-form-urlencoded">
                <div class="form-group">
                    <label for="exampleInputEmail1">Skill ID</label>
                    <input type="text" class="form-control" id="skill_id" name="skill_id" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Skill Name</label>
                    <input type="text" class="form-control" id="skill_name" name="skill_name" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->