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
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard/course/create">Buat Kursus</a></li>
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
                    <h3>Buat Kursus</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= BASE_URL ?>dashboard/course/store">
                        
                        <div class="form-group">
                            <label for="course_name">Nama Kursus</label>
                            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Nama kursus" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" class="form-control" id="description" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="grade">Jenjang</label>
                            <input type="text" class="form-control" id="grade" name="grade" placeholder="Nama kursus" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= BASE_URL ?>dashboard/course" class="btn btn-default">Kembali</a>
                    </form>
                </div>
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