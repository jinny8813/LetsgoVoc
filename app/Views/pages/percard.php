<?= $this->extend("layout/template")?>
<?= $this->section('content')?>
<section class="min-vh-100 bg_light">
    <div class="container-fluid bg_green bg_green_title">
        <div class="row justify-content-center">
            <div class="col-md-8 row justify-content-center align-items-center">
                <div class="col-1 p-0">
                    <a href="<?= base_url('/perbook') ?>" class="btn btn_low_key p-0"><i class="fa-fw fa-regular fa-hand-point-left"></i></a>
                </div>
                <div class="col-1 p-0">
                    <a href="#" class="btn btn_low_key p-0"><i class="fa-fw fa-solid fa-info"></i></a>
                </div>
                <div class="col-8 p-3">
                    <div class="fs-3 text-center">單字卡</div>
                </div>
                <div class="col-1">
                </div>
                <div class="col-1 p-1">
                    <a href="<?= base_url('/percard/'.$uuidv4.'/edit') ?>" class="btn btn_low_key p-0"><i class="fa-fw fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center my-3">
            <div class="col-md-8 mb-3">                    
                <div class="card showCards">
                    <div class="position-absolute" style="top:0; right:20px; width: 50px;height: 140px;
                                                            background-color: #505c58; color:white; z-index:10;
                                                            border-radius: 0px 0px 25px 25px;">
                        <div class="d-none" id="keepingState"></div>
                        <div class="fs-5 text-center mt-3"><button class="btn btn_low_key p-0" id="keepingStar"><i class="fa-solid fa-star"></i></button></div>
                        <div class="fs-5 text-center mt-2">A</div>
                        <div class="fs-5 text-center mt-2">99%</div>
                    </div>
                    <div class="card-body">
                        <div class="fs-1"><?= esc($title)?></div>
                        <hr class="m-0" style="color:gray">
                        <div style="color:#C2C2C2"><small>pronunciation</small></div>
                        <div class="fs-5"><?= esc($pronunciation)?></div>
                        <hr class="m-0" style="color:gray">
                        <div style="color:#C2C2C2"><small>definition</small></div>
                        <div class="fs-5">(<?= esc($part_of_speech)?>.) <?= esc($content)?></div>
                        <div><?= esc($e_content)?></div>
                        <hr class="m-0" style="color:gray">
                        <div style="color:#C2C2C2"><small>examples</small></div>
                        <div><?= esc($e_sentence)?></div>
                    </div>
                </div>
                <div class="position-relative">
                    <div class="position-absolute bookmark">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-3">                    
                <div class="row g-0 justify-content-center">
                    <div class="col me-2 card">
                        <div class="card-body">
                            <div style="color:#C2C2C2"><small>synonyms</small></div>
                            <div class="fs-3">apple</div>
                        </div>
                    </div>
                    <div class="col ms-2 card">
                        <div class="card-body">
                            <div style="color:#C2C2C2"><small>polysemy</small></div>
                            <div class="fs-3">apple</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-3">
                <div class="row g-0 justify-content-center mb-3">
                    <button class="btn me-2 col-3" style="background-color: #505c58;"><i class="fa-solid fa-angle-left"></i></button>
                    <button class="btn mx-2 col" style="background-color: #505c58;">查看更多</button>
                    <button class="btn ms-2 col-3" style="background-color: #505c58;"><i class="fa-solid fa-angle-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>