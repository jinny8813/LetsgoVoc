<header class="sticky-top">
  <nav class="navbar navbar-expand-lg p-0">
      <div class="img_h">
        <a class="navbar-brand p-3" href="<?= base_url('/home')?>" style="color:white"
          ><img src="<?= base_url('../../public/assets/images/icon.png') ?>" class="h-100 px-2" />LetsgoVoc
        </a>
      </div>

      <button class="navbar-toggler p-3" style="border: none;" data-bs-toggle="collapse" data-bs-target="#navbar">
        <i class="fas fa-bars" style="color:white"></i>
      </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbar">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link p-3" href="<?= base_url('/books') ?>">書本列表</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link p-3" href="#">所有單字</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link p-3" href="#">翻卡測驗</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link p-3" href="#">統計分析</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link p-3" href="#">個人設定</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link p-3" href="<?= base_url("/logout") ?>">登出</a>
        </li>
      </ul>
    </div>
  </nav>
</header>