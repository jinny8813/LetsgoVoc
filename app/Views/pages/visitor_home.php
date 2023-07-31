<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LetsgoVoc</title>
    <link rel="shortcut icon" href="<?= base_url('../../public/assets/images/icon.png') ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url('../../public/assets/css/style.css') ?>" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body class="font-monospace">
<header>
  <nav class="navbar sticky-top navbar-expand-lg bg_dark">
      <div class="img_h">
        <a class="navbar-brand p-3" href="#" style="color:white"
          ><img src="<?= base_url('../../public/assets/images/icon.png') ?>" class="h-100 px-2" />LetsgoVoc
        </a>
      </div>

      <button class="navbar-toggler p-3" style="border: none;" data-bs-toggle="collapse" data-bs-target="#navbar">
        <i class="fas fa-bars" style="color:white"></i>
      </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbar">
      <ul class="navbar-nav">
        <li class="nav-item ">
        <a class="nav-link p-3" href="#">關於我們</a>
        </li>
        <li class="nav-item ">
        <a class="nav-link p-3" href="#">登入註冊</a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<section class="min-vh-100 bg_dark">
    <div class="container py-5">
        <div class="row justify-content-center my-3">
            <h2 class="text-center" style="color:white">GoVoc</h2>
            <p class="text-center" style="color:white">Let's enjoy learning in an efficient way.</p>
        </div>

        <div class="row justify-content-center my-3">

            <div class="col-md-8 my-3" id="isLogin">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center fs-3 mb-3">登入</div>
                        <form id="loginForm">
                            <div class="form-group row mb-3">
                                <div class="col-3">
                                    <label for="email" class="form-label">電子信箱</label>
                                </div>
                                <div class="col-9">
                                    <input type="email" name="email" class="form-control" placeholder="請輸入電子信箱">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-3">
                                    <label for="password" class="form-label">密碼</label>
                                </div>
                                <div class="col-9">
                                    <input type="password" name="password" class="form-control" placeholder="請輸入密碼">
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" name="submit" class="btn">送出</button>
                            </div>
                        </form>
                        <div class="alert alert-danger text-center my-3 py-3 d-none" id="error">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 my-3 d-none" id="isRegister">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center fs-3 mb-3">註冊</div>
                        <form id="registerForm">
                            <div class="form-group row mb-3">
                                <div class="col-3">
                                    <label for="email" class="form-label">電子信箱</label>
                                </div>
                                <div class="col-9">
                                    <input type="email" name="email" class="form-control" placeholder="請輸入電子信箱">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-3">
                                    <label for="password" class="form-label">密碼</label>
                                </div>
                                <div class="col-9">
                                    <input type="password" name="password" class="form-control" placeholder="請輸入密碼">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-3">
                                    <label for="cpassword" class="form-label">密碼驗證</label>
                                </div>
                                <div class="col-9">
                                    <input type="password" name="cpassword" class="form-control" placeholder="密碼驗證">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-3">
                                    <label for="nickname" class="form-label">暱稱</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="nickname" class="form-control" placeholder="請輸入密碼">
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" name="submit" class="btn btn-primary">送出</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8 my-3" id="istoRegister">
                <div class="card">
                    <div class="card-body">
                        <p class="text-center">還沒有帳號嗎?現在就註冊一個吧!</p>
                        <div class="d-flex justify-content-center">
                            <a id="toRegister" class="btn btn-primary">註冊</a>
                        </div>
                    </div>
                </div>    
            </div>

            <div class="col-md-8 my-3 d-none" id="istoLogin">
                <div class="card">
                    <div class="card-body">
                        <p class="text-center">已經有帳號!!回到登入頁面</p>
                        <div class="d-flex justify-content-center">
                            <a id="toLogin" class="btn btn-primary">登入</a>
                        </div>
                    </div>
                </div>    
            </div>

        </div>
        
    </div>
</section>
<script>
    
    let isLogin = document.getElementById("isLogin");
    let isRegister = document.getElementById("isRegister");
    let istoLogin = document.getElementById("istoLogin");
    let istoRegister = document.getElementById("istoRegister");

    document.getElementById("toRegister").addEventListener("click",(e) => {
        isRegister.classList.remove('d-none');
        istoLogin.classList.remove('d-none');
        isLogin.classList.add('d-none');
        istoRegister.classList.add('d-none');
      })

    document.getElementById("toLogin").addEventListener("click",(e) => {
        isLogin.classList.remove('d-none');
        istoRegister.classList.remove('d-none');
        isRegister.classList.add('d-none');
        istoLogin.classList.add('d-none');
      })

    let baseUrlLogin = "<?= base_url('/login') ?>";
    let loginForm = document.getElementById("loginForm");
    let error = document.getElementById("error");

    loginForm.addEventListener("submit", (e) => {
        e.preventDefault();
        error.classList.add('d-none');
        let formdata = new FormData(loginForm);
        loginComponent.POST(baseUrlLogin, formdata);
    })

    let loginComponent = {
        POST: (url,formdata) => {
            axios.post(url, formdata)
            .then((response) => {
                Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: '即將為您轉跳至個人主頁'
                }).then(function(result) {
                    window.location.href = `<?= base_url('/home')?>`;
                })
            })
            .catch((error) => {
                Swal.fire({
                    icon: 'error',
                    title: error.response.data.status + ' 錯誤',
                    text: error.response.data.messages.error
                })
            })
        },
    }

    let baseUrlRegister = "<?= base_url('/register') ?>";
    let registerForm = document.getElementById("registerForm");

    registerForm.addEventListener("submit", (e) => {
        e.preventDefault();
        error.classList.add('d-none');
        formdata = new FormData(registerForm);
        registerComponent.POST(baseUrlRegister, formdata);
    })

    let registerComponent = {
        POST: (url,formdata) => {
            axios.post(url, formdata)
            .then((response) => {
                Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: '您好，即將為您重新轉跳'
                }).then(function(result) {
                    window.location.reload();
                })
            })
            .catch((error) => {
                Swal.fire({
                    icon: 'error',
                    title: error.response.data.status + ' 錯誤',
                    text: error.response.data.messages.error
                })
            })
        },
    }
</script>

<section>
    <div class="img_h m-3 position-fixed bottom-0 end-0">
        <a href="#" class="btn"><i class="fa-solid fa-arrow-up"></i></a>
    </div>
</section>

<footer>
    <div class="p-3 text-center">
        <?php
            echo "Copyright &copy; 2023-" . date("Y") . " LetsgoVoc";
    ?>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>