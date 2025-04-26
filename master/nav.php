<header class="header">
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0 align-items-center">
                <a class="crest-logo" href="<?= $root ?>">
                    <img src="<?= $root ?>/assets/images/logoIcon/crest2-nobg.png" alt="site-logo"></a>
                <ul class="account-menu responsive-account-menu ml-3">
                    <li class="icon"><a href="<?= $root ?>/login"><i class="las la-user"></i></a></li>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" style="transform: scale(1.5); color: #fff;"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav main-menu ml-auto mr-5">
                        <li><a href="<?= $root ?>">Home</a></li>
                        <li><a href="<?= $root ?>/about">About</a></li>
                        <li><a href="<?= $root ?>/contact">Contact</a></li>

                        <li class="nav-item dropdown">
                            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="servicesDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Services
                            </a>
                            <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <div class="___class_+?18___">
                                    <div class="dropdown-item">
                                        <a class="d-block text-dark" href="<?= $root ?>/services/nfp">Non Farm Payrolls
                                            (NFP)</a><br>
                                        <a class="d-block text-dark" href="<?= $root ?>/services/masternode">Masternode</a>
                                        <a class="d-block text-dark" href="<?= $root ?>/services/financial-services">Financial
                                            Services</a>
                                        <a class="d-block text-dark" href="<?= $root ?>/services/ipos">Mutual Funds and Initial
                                            Public
                                            Offerings
                                            (IPOs)</a>
                                        <a class="d-block text-dark" href="<?= $root ?>/services/comodity-trading">Comodity
                                            Trading</a>
                                        <a class="d-block text-dark" href="<?= $root ?>/services/pms">Portfolio Management
                                            Services</a>
                                        <a class="d-block text-dark" href="<?= $root ?>/services/structured-finance">Structured
                                            Finance</a>
                                        <a class="d-block text-dark" href="<?= $root ?>/services/consulting-services">Consulting
                                            Services</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li><a href="<?= $root ?>/plan">Plans</a></li>

                    </ul>
                    <div class="nav-right">
                        <ul class="account-menu ml-3">
                            <li class="icon"><a href="<?= $root ?>/app/dashboard"><i class="las la-user"></i></a>
                            </li>
                        </ul>
                        <select class="select d-inline-block w-auto ml-xl-3 langSel">
                            <option value="en" selected>English</option>
                        </select>
                    </div>
                </div>
            </nav>
        </div>
    </div><!-- header__bottom end -->
</header>