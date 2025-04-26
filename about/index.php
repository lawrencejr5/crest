<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include "../master/head.php" ?>

<body>
  <div class="page-wrapper">
    <!-- header-section start  -->
    <?php include "../master/nav.php" ?>
    <!-- header-section end  -->


    <!-- inner hero start -->
    <section class="inner-hero bg_img" data-background="<?= $root ?>/assets/images/frontend/breadcrumb/60f9a423788ce1626973219.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">About</h2>
            <ul class="page-breadcrumb">
              <li><a href="<?= $root ?>">Home</a></li>
              <li>About</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <section class="pt-120 pb-120 bg_img" data-background="<?= $root ?>/assets/images/frontend/how_work/5fce39883b22c1607350664.jpg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">How</span> <b class="base--color"><?= $name ?></b> <span class="font-weight-normal">Works</span></h2>
              <p>Get involved in our tremendous platform and Invest. We will utilize your money and give you profit in your wallet automatically.</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center mb-none-30">
          <div class="col-lg-4 col-md-6 work-item mb-30">
            <div class="work-card text-center">
              <div class="work-card__icon base--color">
                <i class="las la-user"></i> <span class="step-number">1</span>
              </div>
              <div class="work-card__content">
                <h4 class="base--color mb-3">Create Account</h4>
              </div>
            </div><!-- work-card end -->
          </div>
          <div class="col-lg-4 col-md-6 work-item mb-30">
            <div class="work-card text-center">
              <div class="work-card__icon base--color">
                <i class="las la-cubes"></i> <span class="step-number">2</span>
              </div>
              <div class="work-card__content">
                <h4 class="base--color mb-3">Invest</h4>
              </div>
            </div><!-- work-card end -->
          </div>
          <div class="col-lg-4 col-md-6 work-item mb-30">
            <div class="work-card text-center">
              <div class="work-card__icon base--color">
                <i class="las la-wallet"></i> <span class="step-number">3</span>
              </div>
              <div class="work-card__content">
                <h4 class="base--color mb-3">Get Profit</h4>
              </div>
            </div><!-- work-card end -->
          </div>
        </div>
      </div>
    </section>
    <section class="about-section pt-120 pb-120 bg_img" data-background="black">


      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-6">
            <div class="about-content">
              <h2 class="section-title mb-3"><span class="font-weight-normal">About</span> <b class="base--color">Us</b></h2>
              <p> <?= $name ?> was created in 2008
                with the aim and purpose of ensuring that everyone has an insight on investments.
                Our aim is to help investors achieve their financial goals in life,
                we are passionate about it, guiding potential investors on the best
                track of Investments to engage in and the best way to go about it.
                This goes to answer the question of “why do I invest?”
                Basically all directions leads to this and a strong reason is having
                something in store for a rainy day, or making a life changing decision
                which would require a lot of financial support and how to do this.
                This is where we come in, this is where we help you by investing
                your money in securities and assets that will yield more dividends over
                a short period of time. We believe in empowering both infant and professional
                investors. (you all are important to us).</p>
              <a href="<?= $root ?>/about" class="cmn-btn mt-4">Learn more</a>
            </div>
          </div>
        </div>
      </div>
    </section>




    <section class="pt-120 pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">Frequently Asked</span> <b class="base--color">Questions</b></h2>
              <p>We answer some of your Frequently Asked Questions regarding our platform. If you have a query that is not answered here, Please contact us.</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="accordion cmn-accordion" id="accordionExample">

              <!-- Question 1 -->
              <div class="card">
                <div class="card-header" id="heading0">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse0" aria-expanded="false" aria-controls="collapse0">
                      <i class="las la-question-circle"></i>
                      <span>When did <?= $name ?> start?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapse0" class="collapse" aria-labelledby="heading0" data-parent="#accordionExample" style="">
                  <div class="card-body">
                    We started <?= $name ?> as a private project back in 2008 and went on to carry out our beta-testing in mid 2010 with some selected investors; We launched to the public early 2012 and adapted the name <?= $name ?> in 2013.
                  </div>
                </div>
              </div>

              <!-- Question 2 -->
              <div class="card">
                <div class="card-header" id="heading1">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                      <i class="las la-question-circle"></i>
                      <span>How do I know this is real?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample" style="">
                  <div class="card-body">
                    We have beta-tested our system over the years. Feel free to reach out to our beta testers (some of whom have put CONSIDERABLE sums into renting servers) and get paid regularly – on time… every time! Despite our headline rates, we are not trying to be a get-rich-quick scheme. Rather, we are a community of crypto enthusiasts looking to grow together. Become part of the family. Own a stake!
                  </div>
                </div>
              </div>

              <!-- Question 3 -->
              <div class="card">
                <div class="card-header" id="heading2">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                      <i class="las la-question-circle"></i>
                      <span>Do you offer Affiliate programs?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample" style="">
                  <div class="card-body">
                    Since starting the public program, an Affiliation program to reward investors has always been a feature. After registering with <?= $name ?>, you will be assigned a special Referral Link on your dashboard that pays you 10% bonus on your referrals’ deposits—and not just for initial deposits—it includes subsequent deposits, too. This is an excellent opportunity to quickly grow your funds with us, as well as being an easy way to earn start-up funding if you are low on assets! If you have any questions, please contact our live support team.
                  </div>
                </div>
              </div>

              <!-- Question 4 -->
              <div class="card">
                <div class="card-header" id="heading3">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                      <i class="las la-question-circle"></i>
                      <span>How can I make a deposit?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample" style="">
                  <div class="card-body">
                    Since this is a crypto project, we prefer to accept deposits in Bitcoin. However, depending on your location, we can also accept money through Perfect Money and the likes.
                  </div>
                </div>
              </div>

              <!-- Question 5 -->
              <div class="card">
                <div class="card-header" id="heading4">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                      <i class="las la-question-circle"></i>
                      <span>What is the limit for deposits?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample" style="">
                  <div class="card-body">
                    By default, the minimum to rent servers is USD 200 and the maximum is currently USD 250,000, but larger amounts are possible after direct consultation with our team. Remember: after the rental fee has been received, we use a 7-day “grace” period to purchase node stakes and set up the servers for you.
                  </div>
                </div>
              </div>

              <!-- Question 6 -->
              <div class="card">
                <div class="card-header" id="heading5">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                      <i class="las la-question-circle"></i>
                      <span>How can I make a withdrawal?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample" style="">
                  <div class="card-body">
                    Withdrawals can be initiated from your dashboard. Each withdrawal request is processed instantly and paid in Bitcoin. The minimum withdrawal is 10 USD.
                  </div>
                </div>
              </div>

              <!-- Question 7 -->
              <div class="card">
                <div class="card-header" id="heading6">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                      <i class="las la-question-circle"></i>
                      <span>How does compounding work?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordionExample" style="">
                  <div class="card-body">
                    Compounding allows your deposit to grow very fast. It depends on the plan you invested in. Each plan has its own duration. It is entirely up to you. Some like to withdraw all earnings, some compound upwards for a while and withdraw then, some go 50-50. It’s your money, so you decide on the option that works best for you.
                  </div>
                </div>
              </div>

              <!-- Question 8 -->
              <div class="card">
                <div class="card-header" id="heading7">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                      <i class="las la-question-circle"></i>
                      <span>How can I monitor my revenue?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordionExample" style="">
                  <div class="card-body">
                    Earnings and total balance information can be viewed at any time from your dashboard.
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8">
            <div class="cta-wrapper bg_img border-radius--10 text-center" data-background="<?= $root ?>/assets/images/frontend/cta/5fce38bab36371607350458.jpg">
              <h2 class="title mb-3">Get Started Today With Us</h2>
              <p>This is a Revolutionary Money Making Platform! Invest for Future in Stable Platform and Make Fast Money. Not only we guarantee the fastest and the most exciting returns on your investments, but we also guarantee the security of your investment.</p>
              <a href="<?= $root ?>/register" class="cmn-btn mt-4">Join Us</a>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- footer section start -->
    <?php include "../master/footer.php" ?>
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->



</body>

</html>