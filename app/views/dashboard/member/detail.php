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
                        <li class="breadcrumb-item">
                            <a href="<?= BASE_URL ?>dashboard/member/detail/<?= $data['user']['user_id'] ?>">
                                <?= $data['user']['name'] ?>
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
                    <h3 class="card-title">Detail Member</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= BASE_URL ?>dashboard/member/update">
                        <input type="hidden" name="user_id" value="<?= $data['user']['user_id'] ?>">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $data['user']['name'] ?>" placeholder="Nama lengkap">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $data['user']['username'] ?>" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Surel</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $data['user']['email'] ?>" placeholder="Alamat surel">
                        </div>
                        <div class="form-group">
                            <label>Bergabung pada</label>
                            <p><?= $data['user']['join_at'] ?></p>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="<?= BASE_URL?>dashboard/member" class="btn btn-default">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>