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
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard/kelas">Manajemen Kelas</a></li>
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
                    <h3 class="card-title">Data member terdaftar kursus</h3>
                    <div class="text-right">
                        <a href="<?= BASE_URL?>dashboard/kelas/create" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Daftarkan Kursus Member
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="class-data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Member</th>
                                <th>Nama Kursus</th>
                                <th>Jenjang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; ?>
                            <?php foreach($data['data_class'] as $class):?>
                                <tr>
                                    <td><?= $number++?></td>
                                    <td><?= $class['name']?></td>
                                    <td><?= $class['course_name']?></td>
                                    <td><?= $class['grade']?></td>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>dashboard/kelas/delete/<?= $class['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
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
        $("#class-data-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>