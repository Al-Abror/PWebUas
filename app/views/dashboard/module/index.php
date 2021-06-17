<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $data['title'] ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard/module">Manajemen Modul</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <?php FlashSession::flash(); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data modul yang dibuat</h3>
                    <div class="text-right">
                        <a href="<?= BASE_URL?>dashboard/module/create" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Modul Baru
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="course-data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Modul</th>
                                <th>Nama Kursus</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; ?>
                            <?php foreach ($data['data_module'] as $module) : ?>
                                <tr>
                                    <td><?= $number++ ?></td>
                                    <td><?= $module['module_name'] ?></td>
                                    <td><?= $module['course_name'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>dashboard/module/detail/<?= $module['module_id'] ?>" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                        <a href="<?= BASE_URL ?>dashboard/module/delete/<?= $module['module_id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#course-data-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>