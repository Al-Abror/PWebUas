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
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard/kelas/create">Daftarkan Kursus Member</a></li>
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
                    <h3>Daftarkan Kursus Member</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= BASE_URL ?>dashboard/kelas/store">
                        <div class="form-group">
                            <label for="member_name">Nama Member</label>
                            <select name="user_id" id="member_name" class="form-control" required>
                                <option selected disabled>--- Pilih Member ---</option>
                                <?php foreach ($data['data_user'] as $member) : ?>
                                    <option value="<?= $member['user_id'] ?>"><?= $member['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas_name">Nama Kursus</label>
                            <select name="course_id" id="kelas_name" class="form-control" required>
                                <option selected disabled>--- Pilih Kursus ---</option>
                                <?php foreach ($data['data_course'] as $course) : ?>
                                    <option value="<?= $course['course_id'] ?>"><?= $course['course_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= BASE_URL ?>dashboard/kelas" class="btn btn-default">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#kelas-data-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>