<?= $this->extend("layout/template")?>
<?= $this->section('content')?>
<section class="min-vh-100 bg_light">
    <div class="container-fluid bg_green bg_green_title">
        <div class="row justify-content-center">
            <div class="col-md-8 row justify-content-center align-items-center">
                <div class="col-1 p-0">
                    <a href="<?= base_url('/perbook/'.$b_id) ?>" class="btn btn_low_key p-0"><i class="fa-fw fa-regular fa-hand-point-left"></i></a>
                </div>
                <div class="col-10 pt-3 pb-4">
                    <div class="fs-3 text-center">Let's Create cards</div>
                </div>
                <div class="col-1">
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center my-3">
            <div class="col-md-8 my-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="text-center fs-3 mb-3">創建卡片</div>
                        <div class="fs-5 mb-2">1. 選擇創建字卡的模式</div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cardscreate" id="cardscreate1">
                            <label class="form-check-label" for="cardscreate1">
                                英英字典創建字卡
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cardscreate" id="cardscreate2">
                            <label class="form-check-label" for="cardscreate2">
                                手動創建字卡
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 d-none" id="cardSearch">
                    <div class="card-body">
                        <div class="fs-5 mb-2">2. 搜尋單字</div>
                        <form id="cardSearchForm">
                            <div class="form-group row mb-3">
                                <div class="col-3">
                                    <label for="word" class="form-label">單字</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="word" class="form-control" placeholder="請輸入單字" required>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" name="submit" class="btn">送出</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-3 d-none" id="cardCreateDict">
                    <div class="card-body">
                        <div class="fs-5 mb-2">3. 選擇解釋</div>
                        <div id="radioGroup"></div>
                    </div>
                </div>

                <div class="card mb-3 d-none" id="cardCreate">
                    <div class="card-body">
                        <div class="fs-5 mb-2 d-none" id="self">2. 自填單字釋義</div>
                        <div class="fs-5 mb-2 d-none" id="dict">4. 修改或直接送出</div>
                        <form id="cardCreateForm">
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="title" class="form-label">卡片英文</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="title" id="title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="part_of_speech" class="form-label">卡片詞性</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="part_of_speech" id="part_of_speech" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="pronunciation" class="form-label">卡片發音</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="pronunciation" id="pronunciation" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="content" class="form-label">卡片短譯</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="content" id="content" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="e_content" class="form-label">卡片英譯</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="e_content" id="e_content" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="e_sentence" class="form-label">英/造句</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea  name="e_sentence" id="e_sentence" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-3">
                                        <label for="c_sentence" class="form-label">中/補充</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea  name="c_sentence" id="c_sentence" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button type="submit" name="submit" class="btn">送出</button>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<script>
    let cardSearch = document.getElementById("cardSearch");
    let cardCreateDict = document.getElementById("cardCreateDict");
    let cardCreate = document.getElementById("cardCreate");
    let self = document.getElementById("self");
    let dict = document.getElementById("dict");

    document.getElementById("cardscreate1").addEventListener("click",(e) => {
        cardCreate.classList.add('d-none');
        cardCreateDict.classList.add('d-none');
        self.classList.add('d-none');
        dict.classList.remove('d-none');
        cardSearch.classList.remove('d-none');
    })
    document.getElementById("cardscreate2").addEventListener("click",(e) => {
        cardSearch.classList.add('d-none');
        cardCreateDict.classList.add('d-none');
        dict.classList.add('d-none');
        self.classList.remove('d-none');
        cardCreate.classList.remove('d-none');
    })

    document.getElementById("cardSearchForm").addEventListener("submit",(e) => {
        e.preventDefault();
        let formdata= new FormData(cardSearchForm);
        dictionaryComponent.POST("<?= base_url('/dictionary') ?>",formdata);
    })

    let dictionaryComponent = {
        POST: (url,formdata) => {
            axios.post(url,formdata)
            .then((response) => {
                console.log(response.data);
                innerMsg(response.data);
                cardCreateDict.classList.remove('d-none');
                cardCreate.classList.remove('d-none');
                dict.classList.remove('d-none');
            }).catch((e) => {
                console.log(e);
            })
        },
    }

    function innerMsg(data){
        let radioGroup = document.getElementById("radioGroup");
        radioGroup.innerHTML = "";
        for(let i = 0; i < Object.keys(data.def).length; i++){
            let mytext = `<div class="form-check">
                            <input type="radio" class="form-check-input" name="theWord" id="${i}">
                            (${i+1}). <strong>${data.word}</strong> <small>(${data.def[i][0]}.)</small></br>
                            ${data.def[i][1]}</br></div>`;
            $(radioGroup).append(mytext);

            let wordid=document.getElementById(i);
                wordid.addEventListener('click', function () {
                    document.getElementById("title").value = data.word;
                    document.getElementById("part_of_speech").value = data.def[i][0];
                    document.getElementById("pronunciation").value = data.pron;
                    document.getElementById("content").value = data.trans;
                    document.getElementById("e_content").value = data.def[i][1];
                    document.getElementById("e_sentence").value = data.eg;
            });
        }
    }

    document.getElementById("cardCreateForm").addEventListener("submit",(e) => {
        e.preventDefault();
        let formdata= new FormData(cardCreateForm);
        cardCreateComponent.POST("<?= base_url('/perbook') ?>",formdata);
    })

    let cardCreateComponent = {
        POST: (url,formdata) => {
            axios.post(url, formdata)
            .then((response) => {
                Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: '您好，即將為您重新轉跳'
                }).then(function(result) {
                    window.location.href = `<?= base_url('/perbook')?>`;
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
</script>
<?= $this->endSection()?>