<?= $this->extend("layout/template")?>
<?= $this->section('content')?>
<section class="min-vh-100 bg_light">
    <div class="container-fluid bg_green bg_green_title">
        <div class="row justify-content-center">
            <div class="col-md-8 row justify-content-center align-items-center">
                <div class="col-1 p-0">
                    <a href="<?= base_url('/percard/'.$uuidv4) ?>" class="btn btn_low_key p-0"><i class="fa-fw fa-regular fa-hand-point-left"></i></a>
                </div>
                <div class="col-10 pt-3 pb-4">
                    <div class="fs-3 text-center">修改字卡資料</div>
                </div>
                <div class="col-1">
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center my-3">
            <div class="col-md-8 my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center fs-3 mb-3">修改字卡</div>
                        <form id="cardEditForm">
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="title" class="form-label">卡片英文</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="title" id="title" class="form-control" value="<?= esc($title)?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="part_of_speech" class="form-label">卡片詞性</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="part_of_speech" id="part_of_speech" class="form-control" value="<?= esc($part_of_speech)?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="pronunciation" class="form-label">卡片發音</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="pronunciation" id="pronunciation" class="form-control" value="<?= esc($pronunciation)?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="content" class="form-label">卡片短譯</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="content" id="content" class="form-control" value="<?= esc($content)?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="e_content" class="form-label">卡片英譯</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="e_content" id="e_content" class="form-control" value="<?= esc($e_content)?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="e_sentence" class="form-label">英/造句</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea  name="e_sentence" id="e_sentence" class="form-control" rows="4"><?= esc($e_sentence)?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="c_sentence" class="form-label">中/補充</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea  name="c_sentence" id="c_sentence" class="form-control" rows="4"><?= esc($c_sentence)?></textarea>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button type="submit" name="submit" class="btn">修改</button>
                                </div>
                        </form>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button id="deleteCardBtn" class="btn">刪除字卡</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let cardEditForm = document.getElementById("cardEditForm");

    cardEditForm.addEventListener("submit",(e) => {
        e.preventDefault();
        let formdata= new FormData(cardEditForm);
        cardEditComponent.PUT("<?= base_url('/percard/'.$uuidv4) ?>", JSON.stringify(Object.fromEntries(formdata)));
    })

    let cardEditComponent = {
        PUT: (url,data) => {
            axios.put(url,data)
            .then((response) => {
                Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: '您好，即將為您重新轉跳'
                }).then(function(result) {
                    window.location.href = `<?= base_url('/percard/'.$uuidv4) ?>`;
                })
            })
            .catch((error) => {
                Swal.fire({
                    icon: 'error',
                    title: error.response.data.status + ' 錯誤',
                    text: error.response.data.messages
                })
            })
        },
    }

    let deleteCardBtn = document.getElementById("deleteCardBtn");

    deleteCardBtn.addEventListener("click",(e) => {
        e.preventDefault();
        cardDeleteComponent.Delete("<?= base_url('/percard/'.$uuidv4) ?>");
    })

    let cardDeleteComponent = {
        Delete: (url) => {
            axios.delete(url)
            .then((response) => {
                Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: '您好，即將為您重新轉跳'
                }).then(function(result) {
                    window.location.href = `<?= base_url('/perbook') ?>`;
                })
            })
            .catch((error) => {
                console.log(error);
                Swal.fire({
                    icon: 'error',
                    title: error.response.data.status + ' 錯誤',
                    text: error.response.data.messages
                })
            })
        },
    }
</script>
<?= $this->endSection()?>