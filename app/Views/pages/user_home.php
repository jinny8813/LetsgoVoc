<?= $this->extend("layout/template")?>
<?= $this->section('content')?>
<section class="min-vh-100">
    <div class="w-100">
        <img class="img-fluid" src="<?= base_url('../../public/assets/images/banner.jpg') ?>" alt="">
    </div>
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-md-8 position-absolute top-100 start-50 translate-middle">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center fs-3">的個人主頁</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center m-3">
            <div class="col-5 pt-5 row justify-content-end">
                <div style="width:100px">
                    <img class="img-fluid" src="<?= base_url('../../public/assets/images/icon.png') ?>" alt="">
                </div>
            </div>
            <div class="col-7 pt-5">
                <h2>LetsgoVoc</h2>
                <p>Let's enjoy learning in an efficient way.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-6" style="background-color:#2c4c01">
                <div class="text-center fs-5 py-5"><a href="#">書本列表</a></div>
            </div>
            <div class="col-md-3 col-6" style="background-color:#628100">
                <div class="text-center fs-5 py-5"><a href="#">所有字卡</a></div>
            </div>
            <div class="col-md-3 col-12" style="background-color:#dfc403">
                <div class="text-center fs-5 py-5"><a href="#">翻卡測驗</a></div>
            </div>
            <div class="col-md-4 col-6" style="background-color:#c9d1d4">
                <div class="text-center fs-5 py-5"><a href="#">統計分析</a></div>
            </div>
            <div class="col-md-8 col-6" style="background-color:#505c58">
                <div class="text-center fs-5 py-5"><a href="#">個人設定</a></div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>