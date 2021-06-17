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
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard/course">Manajemen Kursus</a></li>
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
                    <?php if($_SESSION['user']['role'] == 'member'):?>
                    <h3 class="card-title">Daftar kursus yang saya miliki</h3>
                    <?php else: ?>
                    <h3 class="card-title">Data kursus yang dibuat</h3>
                    <div class="text-right">
                        <a href="<?= BASE_URL?>dashboard/course/create" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Kursus Baru
                        </a>
                    </div>
                    <?php endif;?>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="course-data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kursus</th>
                                <th>Jenjang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; ?>
                            <?php foreach ($data['data_course'] as $course) : ?>
                                <tr>
                                    <td><?= $number++ ?></td>
                                    <td><?= $course['course_name'] ?></td>
                                    <td><?= $course['grade'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>dashboard/course/detail/<?= $course['course_id'] ?>" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                        <a href="<?= BASE_URL ?>dashboard/course/delete/<?= $course['course_id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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