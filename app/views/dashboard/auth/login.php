<div class="col-lg-6">
    <form action="<?= BASE_URL?>auth/login/process" method="POST">
        <div class="card2 card border-0 px-4 py-5">
            <div class="row mb-4 px-3">
                <h2 class="mb-0 mr-4 mt-2">Masuk</h2>
                <div class="text-muted mb-0 mr-4 mt-3">Silahkan masuk untuk memulai belajar</div>
            </div>
            <?php FlashSession::flash(); ?>
            <div class="row px-3">
                <label class="mb-1">
                    <h6 class="mb-0 text-sm">Alamat Surel</h6>
                </label>
                <input class="mb-4" type="email" name="email" placeholder="Enter a valid email address">
            </div>
            <div class="row px-3">
                <label class="mb-1">
                    <h6 class="mb-0 text-sm">Password</h6>
                </label>
                <input type="password" name="password" placeholder="Enter password">
            </div>
            <div class="row mb-3 px-3">
                <button type="submit" class="btn btn-blue text-center">Masuk</button>
            </div>
            <div class="row mb-4 px-3">
                <small class="font-weight-bold">Belum punya akun? <a href="<?= BASE_URL ?>auth/register" class="text-danger">Daftar sekarang!</a></small>
            </div>
        </div>
    </form>
</div>