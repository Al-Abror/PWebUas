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
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard/member">Manajemen Member</a></li>
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
                    <h3 class="card-title">Data member yang terdaftar</h3>
                    <div class="text-right">
                        <a href="<?= BASE_URL?>dashboard/member/create" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Member Baru
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="member-data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat Surel</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; ?>
                            <?php foreach ($data['data_member'] as $member) : ?>
                                <tr>
                                    <td><?= $number++ ?></td>
                                    <td><?= $member['name'] ?></td>
                                    <td><?= $member['email'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>dashboard/member/detail/<?= $member['user_id'] ?>" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                        <a href="<?= BASE_URL ?>dashboard/member/delete/<?= $member['user_id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
        $("#member-data-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>