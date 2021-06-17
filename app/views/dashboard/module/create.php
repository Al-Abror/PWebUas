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
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard/module/create">Buat Modul</a></li>
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
                    <h3>Buat Modul</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= BASE_URL ?>dashboard/module/store" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="kelas_name">Nama Kursus</label>
                            <select name="course_id" id="kelas_name" class="form-control" required>
                                <option selected disabled>--- Pilih Kursus ---</option>
                                <?php foreach ($data['data_course'] as $course) : ?>
                                    <option value="<?= $course['course_id'] ?>"><?= $course['course_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="module_name">Nama Modul</label>
                            <input type="text" name="module_name" id="module_name" class="form-control" placeholder="Nama Modul" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" class="form-control" id="description" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="module_file">Berkas Modul</label>
                            <input type="file" name="module_file" id="module_file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= BASE_URL ?>dashboard/module" class="btn btn-default">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#module-data-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>