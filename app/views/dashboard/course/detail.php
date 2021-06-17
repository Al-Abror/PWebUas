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
                        <li class="breadcrumb-item">
                            <a href="<?= BASE_URL ?>dashboard/course/detail/<?= $data['course']['course_id'] ?>">
                                <?= $data['course']['course_name'] ?>
                            </a>
                        </li>
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
                    <h3 class="card-title">Detail Kursus</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= BASE_URL ?>dashboard/course/update">
                        <input type="hidden" name="course_id" value="<?= $data['course']['course_id'] ?>">
                        <div class="form-group">
                            <label for="course_name">Nama Kursus</label>
                            <input type="text" class="form-control" id="course_name" name="course_name" value="<?= $data['course']['course_name'] ?>" 
                            placeholder="Nama kursus" <?= $_SESSION['user']['role'] == 'member' ? 'disabled' : '' ?>>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" class="form-control" id="description" rows="5" <?= $_SESSION['user']['role'] == 'member' ? 'disabled' : '' ?>><?= $data['course']['description'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="grade">Jenjang</label>
                            <input type="text" class="form-control" id="grade" name="grade" value="<?= $data['course']['grade'] ?>" 
                            placeholder="Nama kursus" <?= $_SESSION['user']['role'] == 'member' ? 'disabled' : '' ?>>
                        </div>
                        <?php if($_SESSION['user']['role'] == 'admin'): ?>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <?php endif; ?>
                        <a href="<?= BASE_URL ?>dashboard/course" class="btn btn-default">Kembali</a>
                    </form>
                </div>
            </div>

            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Modul Pembelajaran <?= $data['course']['course_name'] ?></h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($data['modules'])) : ?>
                            <?php foreach ($data['modules'] as $module) : ?>
                                <div class="card card-outline card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title"><?= $module['module_name'] ?></h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p><?= $module['description'] ?></p>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="<?= BASE_URL?>assets/uploads/modules/<?= $module['module_file']?>" title="Download modul <?= $module['module_name']?>" download>
                                                            <img src="<?= BASE_URL ?>/assets/media/pdf-icon.svg" style="width: 36px;">
                                                            &nbsp;<span class="text-bold"><?= $module['module_name'] ?></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center">Modul pembelajaran belum tersedia saat ini.</p>
                        <?php endif;?>
                    </div>
                </div>
            
        </div>
    </div>
</div>