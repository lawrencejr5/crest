<style>
    li a {
        font-size: 14px !important;
    }
</style>

<header class="header">
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0 align-items-center">
                <a class="crest-logo" href="<?= $root ?>"><img
                        src="<?= $root ?>/assets/images/logoIcon/crest2-nobg.png" alt="site-logo"></a>
                <ul class="account-menu responsive-account-menu ml-3">
                    <li class="icon"><a href="<?= $root ?>/app/dashboard"><i class="las la-user"></i></a></li>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" style="transform: scale(1.5); margin: 0; height: 100%; border-radius: 0; width: 40px; text-align: center; color: #fff; background: transparent;"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav main-menu ml-auto">
                        <li> <a href="<?= $root ?>/app/dashboard">Dashboard</a></li>
                        <li><a href="<?= $root ?>/app/plan">Investment</a></li>
                        <li><a href="<?= $root ?>/app/deposit">Deposit</a></li>
                        <li><a href="<?= $root ?>/app/withdraw">Withdraw</a></li>
                        <li><a href="<?= $root ?>/app/transactions/deposit">Transactions</a></li>
                        <li class="menu_has_children"><a href="#0">Referrals</a>
                            <ul class="sub-menu">
                                <li><a href="<?= $root ?>/app/referral/users">Referred Users</a></li>
                                <li><a href="<?= $root ?>/app/referral/commissions/interests">Referral Commissions</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu_has_children"><a href="#0">Account</a>
                            <ul class="sub-menu">
                                <li><a href="<?= $root ?>/app/account/profile">Profile Setting</a></li>
                                <li><a href="<?= $root ?>/app/account/password-change">Change Password</a></li>
                                <li><a href="<?= $root ?>/app/account/ticket">
                                        Support Ticket</a></li>
                                <li><a href="<?= $root ?>/app/account/2fa"> 2fa</a></li>
                                <li><a href="<?= $root ?>/app/logout"> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="nav-right">
                        <ul class="account-menu ml-3">
                            <li class="icon"><a href="<?= $root ?>/app/dashboard"><i class="las la-user"></i></a></li>
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