<?= $this->extend("layout/template")?>
<?= $this->section('content')?>
<section class="min-vh-100 bg_light">
    <div class="container-fluid bg_green">
        <div class="row justify-content-center">
            <div class="col-md-8 row justify-content-center align-items-center">
                <div class="col-1 p-0">
                    <a href="<?= base_url('/home')?>" class="btn btn_low_key p-0"><i class="fa-fw fa-regular fa-hand-point-left"></i></a>
                </div>
                <div class="col-1 p-0">
                    <a href="#" class="btn btn_low_key p-0"><i class="fa-fw fa-solid fa-info"></i></a>
                </div>
                <div class="col-8 p-3">
                    <div class="fs-3 text-center">書本&收藏</div>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-10 pb-4">
                <div>- Collection ( 1/1 )</div>
                <div>- Booklist ()</div>
            </div>
        </div>
    </div>

    <div class="position-sticky top-0 z-3">
        <div class="position-relative">
            <div class="position-absolute top-0 end-0 mt-3 pt-5">
                <button class="btn btn_the_biggest fs-4 p-2" id="bigBtn"><i class="fa-fw fa-solid fa-toolbox"></i></button>
                <div id="groupBtn" class="d-none">
                    <div class="d-flex">
                        <a href="<?= base_url('/books/new') ?>" class="btn btn_biggest_down p-2"><i class="fa-fw fa-solid fa-plus"></i></a>
                    </div>
                    <div class="d-flex">
                        <a href="#" class="btn btn_biggest_down p-2"><i class="fa-fw fa-solid fa-up-down-left-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row justify-content-center my-3">
            <div class="col-md-10">
                <?php foreach($books as $row):?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-3 d-flex align-items-center justify-content-center bg_dark_blue rounded-start">
                            <div class="text-center"><?= round($row['avg'], 1) . "%"?></div>
                        </div>
                        <div class="col-9 card-body">
                            <div class="fs-5">
                                <strong><a href="<?= base_url('perbook/'.$row['uuidv4'])?>" class="a_black stretched-link"><?= $row['title']?></a></strong>
                            </div>
                            <p class="ellipsis"><?= $row['description']?></p>
                            <div><i class="fa-fw fa-solid fa-swatchbook"></i> <?= $row['count']?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
<script>
    let groupBtn = document.getElementById("groupBtn");
    document.getElementById("bigBtn").addEventListener("click",(e) => {
        groupBtn.classList.toggle("d-none");
    })
</script>
<?= $this->endSection()?>