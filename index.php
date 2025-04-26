<!DOCTYPE html>
<html lang="en">

<?php include "./app/backend/module.php" ?>
<?php include "./master/head2.php" ?>

<body class="body-page">
  <style>
    .plan-item {
      padding-top: 10px;
      width: 406px;
    }
  </style>


  <?php include "./master/nav2.php" ?>

  <div class="feature-section">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-8 text-center">
          <div class="section-header">

            <h2 class="title">Why choose <?= $name ?></h2>
            <p>
            <h4>We set the Pace, others follow</h4>

            We refuse to follow the trend Instead, we focus on stocks that are out
            of favour with mainstream investors, as we believe that these offers
            the greatest potential for long-term gains. popular stocks tend
            to be overvalued – while out-of-favour stocks are often too cheap.
            We aim to exploit this inefficiency for our shareholders.
            </p>
          </div>
        </div>
      </div>
      <div class="feature-wrapper d-flex flex-wrap">
        <div class="feature-area two">

          <div class="feature-item">
            <h5 class="subtitle">Asset Management</h5>
            <p>
              We are a trusted advisor to our clients, assisting them in developing and accessing alternatives to meet
              their strategic objectives.
            </p>
          </div>

          <div class="feature-item">
            <h5 class="subtitle">Mutual Funds</h5>
            <p>
              Let the experts handle the work of making you huge returns on investment (ROI)
            </p>
          </div>

        </div>
        <div class="feature-thumb pos-rel">
          <img src="assetss/images/frontend/feature/5e28133aae42b1579684666.png" alt="feature">


          <div class="coin-3">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
          <div class="coin-3 two">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
          <div class="coin-3 three">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
          <div class="coin-4">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
          <div class="coin-4 two">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
          <div class="coin-4 three">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
          <div class="coin-4 four">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>

          <div class="coin-3 bela two">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
          <div class="coin-3 bela three">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
          <div class="coin-4 bela">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
          <div class="coin-4 bela two">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
          <div class="coin-4 bela three">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
          <div class="coin-4 bela four">
            <img src="assetss/images/frontend/feature/feature-coin.png" alt="footer">
          </div>
        </div>
        <div class="feature-area">
          <div class="feature-item">
            <h5 class="subtitle">Wealth Management</h5>
            <p>
              Advising wealthy families sometimes over several generations is a complex task of great responsibility.
            </p>
          </div>
          <div class="feature-item">
            <h5 class="subtitle">Brokerage Account</h5>
            <p>Your money is safe and sound and you get guaranteed returns</p>
          </div>

        </div>
      </div>
    </div>
  </div>



  <div class="sec-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sec"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="counter-section" style="background: #000">
    <div class="container">
      <div class="row justify-content-center ">
        <div class="col-10 text-center">
          <div class="section-header mb-5">
            <h2 class="title">Statistics </h2>
            <p class="section-para"><?= $name ?> achieved an annual return of 132%,
              and for participants who took advantage of the monthly compounding option,
              a gigantic 249.85%.
              This yield was achieved despite the global economic crisis
              caused by COVID-19..</p>
          </div>
        </div>
      </div>


      <div class="counter-area ">
        <div class="counter-wrapper ">
          <div class="counter-item">
            <div class="counter-thumb bg-4">
              <i class="fa fa-connectdevelop" aria-hidden="true"></i>
            </div>
            <div class="counter-content">
              <div class="odo-area">
                <h3 class="odo-title odometer" data-odometer-final="6000">6000</h3>
              </div>
              <p>Masternodes Operated</p>
            </div>
          </div>
          <div class="counter-item">
            <div class="counter-thumb bg-4">
              <i class="fa fa-dollar" aria-hidden="true"></i>
            </div>
            <div class="counter-content">
              <div class="odo-area">
                <h3 class="odo-title odometer" data-odometer-final="15400000">15400000</h3>
              </div>
              <p>Total Deposited(updated weekly)</p>
            </div>
          </div>
          <div class="counter-item">
            <div class="counter-thumb bg-4">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <div class="counter-content">
              <div class="odo-area">
                <h3 class="odo-title odometer" data-odometer-final="7400">7400</h3>
              </div>
              <p>Active Users</p>
            </div>
          </div>
        </div>
      </div>
      <br>

      <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinPriceBlock.js"></script>
      <div id="coinmarketcap-widget-coin-price-block" coins="1,1027,825,1839,5426,2010,3408" currency="USD" theme="dark" transparent="true" show-symbol-logo="true"></div>
    </div>
  </div>
  <div class="sec-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sec"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="get-profit-section pos-rel">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-c nter">
          <div class="section-header">
            <h2 class="title">About <?= $name ?></h2>
            <p class="section-para text-left">
              <?= $name ?> was created in 2008
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
          </div>
        </div>
        <div class="col-md-6">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/tuUO-Q4_b5c" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        </div>
      </div>
      <div class="row justify-content-center mb-30-none">


      </div>
    </div>
  </div>


  <div class="sec-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sec"></div>
        </div>
      </div>
    </div>
  </div>

  <section class="investment-plan-area" style="background: #000;">
    <div id="plans"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-10 text-center">
          <div class="section-header mb-5">
            <h2 class="title"><?= $name ?> Packages </h2>
            <p class="section-para">We have made it our mission to build a sustainable future for us all in this new
              economy.<br><b style="color:#fbc013">Compounding available for all plan.</b></p>
          </div>
        </div>
      </div>

      <div class="row">

        <?php $data = $modules->getAllPlans(); ?>
        <?php foreach ($data as $invest): ?>

          <div class="col-md-4">
            <div class="plan-area">
              <div class="plan-item">
                <div class="plan_name" style="font-size: 1.3rem; text-transform:uppercase;"><?= $invest['plan_name'] ?></div><br><br>
                <div class="plan-header">
                  <div class="plan_day">
                    <h2><?= $invest['plan_rate'] ?>%</h2>
                    <span><?= $invest['plan_type'] ?></span>
                  </div>
                  <div class="plan_day">
                    <h2><?= htmlspecialchars(explode(" ", $invest['duration_text'])[0]) ?></h2>
                    <span><?= htmlspecialchars(explode(" ", $invest['duration_text'])[1]) ?></span>
                  </div>
                </div>
                <div class="plan-details">
                  <div class="item"><span>Min Deposit</span>-<span>$<?= number_format($invest['plan_min']) ?></span></div>
                  <div class="item"><span>Max Deposit</span>-<span>$<?= number_format($invest['plan_max']) ?></span></div>
                  <div class="item"><span>Capital Return</span>-<span>Yes</span></div>
                  <div class="item"><span>Total Return</span>-<span><?= $invest['total'] ?>%</span></div>
                </div>

                <a href="#" data-toggle="modal" data-target="#depoModal"
                  data-resource="{&quot;id&quot;:7,&quot;name&quot;:&quot;Basic Plan&quot;,&quot;minimum&quot;:&quot;200&quot;,&quot;maximum&quot;:&quot;7000&quot;,&quot;fixed_amount&quot;:&quot;0&quot;,&quot;interest&quot;:&quot;1.5&quot;,&quot;interest_status&quot;:&quot;1&quot;,&quot;times&quot;:&quot;24&quot;,&quot;status&quot;:&quot;1&quot;,&quot;featured&quot;:&quot;1&quot;,&quot;capital_back_status&quot;:&quot;0&quot;,&quot;lifetime_status&quot;:&quot;0&quot;,&quot;repeat_time&quot;:&quot;10&quot;,&quot;created_at&quot;:&quot;2021-04-23 03:31:13&quot;,&quot;updated_at&quot;:&quot;2021-05-17 22:53:56&quot;}"
                  class="btn btn-success investButton">Invest Now</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>


  <div class="sec-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sec"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="profit-calc" style="background: #000">
    <div class="shape"></div>
    <div class="circle-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
      data-paroller-type="foreground" data-paroller-direction="horizontal">
      <img src="assetss/images/frontend/animation/08.png" alt="shape">
    </div>
    <div class="circle-2 five" data-paroller-factor="-0.10" data-paroller-factor-lg="0.30"
      data-paroller-type="foreground" data-paroller-direction="horizontal">
      <img src="assetss/images/frontend/animation/05.png" alt="shape">
    </div>
    <div class="elepsis">
      <img src="assetss/images/frontend/footer/elepsis.png" alt="profit">
    </div>
    <div class="man-coin">
      <img src="assetss/images/frontend/footer/man-coin.png" alt="profit">
    </div>
    <div class="coin-only">
      <img src="assetss/images/frontend/footer/profit-coin.png" alt="profit">
    </div>
    <div class="man-only">
      <img src="assetss/images/frontend/footer/profit-man.png" alt="profit">
    </div>
    <div class="container">

      <div class="row justify-content-center ">
        <div class="col-10 text-center">
          <div class="section-header mb-5">
            <h2 class="title">Calculate Your Profit </h2>
            <p class="section-para">Use our inbuilt profit calculator to calculate your profit before choosing a
              package.</p>
          </div>
        </div>
      </div>


      <form class="profit-form">
        <div class="row justify-content-center mb-30-none">
          <div class="form-group col-sm-6 col-md-4 col-lg-3">
            <h6 class="profil-title">Plan</h6>
            <select class="select-bar" id="changePlan">
              <option value="">Choose Plan</option>
              <option value="1">BASIC</option>
              <option value="2">GOLD/STOCK</option>
              <option value="3">REAL ESTATE</option>
              <option value="4">OIL AND GAS</option>
              <option value="5">FARM AND SHARES</option>
            </select>

          </div>
          <div class="form-group col-sm-6 col-md-4 col-lg-3">
            <h6 class="profil-title">Invest Amount</h6>
            <input type="text" placeholder="0.00" class="invest-input"
              onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
          </div>
          <div class="form-group col-sm-6 col-md-4 col-lg-3">
            <h6 class="profil-title">Profit</h6>
            <input type="text" placeholder="0.00" class="profit-input" readonly="">
            <code class="period"></code>
          </div>
        </div>
      </form>
    </div>
  </div>


  <div class="sec-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sec"></div>
        </div>
      </div>
    </div>
  </div>



  <section class="client-section padding-top">
    <div class="container mw-lg-100">
      <div class="client-area">
        <div class="owl-thumbs" style="display: flex; height: 300px; justify-content: center;" data-slider-id="1">

          <img src="assetss/images/quotes.png" class="testimonial-img" alt="client">


        </div>
        <div class="client-slider-section">
          <h2 class="title">Testimonies From Verified Clients</h2>
          <div class="client-slider owl-carousel owl-theme" data-slider-id="1">

            <div class="client-slide-item">
              <blockquote>
                I was initially hesitant about diving into online investments, but <?= $name ?> changed my perspective. Their user-friendly interface and insightful market data have given me the confidence to manage my portfolio during even the most volatile periods. Every month, I see steady growth, and the transparency in every transaction keeps me at ease. I feel empowered knowing my money is working smartly for me.
              </blockquote>
              <div class="author">
                <div class="author-content">
                  <h6 class="sub-title"><a href="javascript:void(0)">Malik Johnson</a></h6>
                  <span>Entrepreneur & Investor</span>
                </div>
              </div>
            </div>

            <div class="client-slide-item">
              <blockquote>
                Balancing a busy career and family life made it hard to find time to monitor investments—until I found <?= $name ?>. Their platform simplifies the investment process with real-time updates and easy-to-read analytics. I appreciate the clear guidance and consistent support, which have helped me unlock new avenues for financial growth. It’s transformed the way I think about my future.
              </blockquote>
              <div class="author">
                <div class="author-content">
                  <h6 class="sub-title"><a href="javascript:void(0)">Ebony Williams</a></h6>
                  <span>Professional Investor</span>
                </div>
              </div>
            </div>

            <div class="client-slide-item">
              <blockquote>
                After facing setbacks with other investment platforms, <?= $name ?> has been a breath of fresh air. Their innovative tools and dedicated support team helped me turn uncertainty into clear, actionable strategies. I now see a positive trend in my portfolio with reliable, transparent updates that I can trust. This platform has become an essential part of my financial plan.
              </blockquote>
              <div class="author">
                <div class="author-content">
                  <h6 class="sub-title"><a href="javascript:void(0)">Darnell Smith</a></h6>
                  <span>Business Owner & Investor</span>
                </div>
              </div>
            </div>

            <div class="client-slide-item">
              <blockquote>
                Since joining <?= $name ?>, my approach to investments has evolved dramatically. Their intuitive platform and detailed analytics empower me to take bold steps while staying informed about market trends. The continuous support and clear, honest updates have been invaluable, making every decision feel well-founded. I’m excited to see the long-term benefits on my financial roadmap.
              </blockquote>
              <div class="author">
                <div class="author-content">
                  <h6 class="sub-title"><a href="javascript:void(0)">Keisha Brown</a></h6>
                  <span>Independent Trader</span>
                </div>
              </div>
            </div>

            <div class="client-slide-item">
              <blockquote>
                Investing used to feel intimidating, but <?= $name ?> has turned it into a truly rewarding experience. Their platform’s sophisticated yet accessible tools offer real-time insights that help me navigate complex market conditions with ease. I’ve seen consistent returns and feel more secure with every smart move I make. This service has redefined my approach to building wealth.
              </blockquote>
              <div class="author">
                <div class="author-content">
                  <h6 class="sub-title"><a href="javascript:void(0)">Andre Davis</a></h6>
                  <span>Tech Professional & Investor</span>
                </div>
              </div>
            </div>

            <div class="client-slide-item">
              <blockquote>
                <?= $name ?> has been a game-changer for my financial journey. The platform’s robust analytics and proactive customer service have helped simplify the world of investments. I now receive strategic insights that guide me through market ups and downs, allowing for consistent growth throughout the year. I couldn’t be happier with how my portfolio is performing.
              </blockquote>
              <div class="author">
                <div class="author-content">
                  <h6 class="sub-title"><a href="javascript:void(0)">Tanisha Moore</a></h6>
                  <span>Consultant & Investor</span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


  <div class="sec-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sec"></div>
        </div>
      </div>
    </div>
  </div>


  <div class="call-to-action-section" style="background: #000">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
          <div class="call-to-action-content">
            <h2 class="title">Join Us Today</h2>
            <p>Open a free account today(zero commission) and join our team in earning passive income through this
              untapped opportunity.</p>
            <div class="call-to-action-btn">
              <a href="register" class="btn  btn-primary btn-lg ">SIGN UP</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sec-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sec"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="faq-area padding-top padding-bottom">
    <div class="container">
      <div id="FAQs"></div>
      <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
          <div class="team-header">
            <h2 class="title">Frequently Asked Questions</h2>
            <p class="section-para mt-2">We answer some of your Frequently Asked Questions regarding <?= $name ?>. If
              you
              have a query that is not answered here, Please feel free to contact us.</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12" style="background: #000">
          <div class="main-page" style="background: #000">
            <div class="accordion" id="accordionExample" style="background: #000">

              <!-- Question 1 -->
              <div class="card">
                <div class="card-header" id="heading31">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse31"
                    aria-expanded="true" aria-controls="collapse31">When did <?= $name ?> start?</button>
                </div>
                <div id="collapse31" class="collapse show" aria-labelledby="heading31" data-parent="#accordionExample">
                  <div class="card-body">
                    We started <?= $name ?> as a private project back in 2008 and went on to carry out our beta-testing
                    in mid 2010 with some selected investors; We launched to the public early 2012 and adapted the name
                    CrestAssetTrading.com in 2013.
                  </div>
                </div>
              </div>

              <!-- Question 2 -->
              <div class="card">
                <div class="card-header" id="heading30">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse30"
                    aria-expanded="false" aria-controls="collapse30">How do I know this is real?</button>
                </div>
                <div id="collapse30" class="collapse" aria-labelledby="heading30" data-parent="#accordionExample">
                  <div class="card-body">
                    We have beta-tested our system over the years. Feel free to reach out to our beta testers (some of whom
                    have put CONSIDERABLE sums into renting servers) and get paid regularly – on time… every time! Despite our
                    headline rates, we are not trying to be a get-rich-quick scheme. Rather, we are a community of crypto
                    enthusiasts looking to grow together. Become part of the family. Own a stake!
                  </div>
                </div>
              </div>

              <!-- Question 3 -->
              <div class="card">
                <div class="card-header" id="heading29">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse29"
                    aria-expanded="false" aria-controls="collapse29">Do you offer Affiliate programs?</button>
                </div>
                <div id="collapse29" class="collapse" aria-labelledby="heading29" data-parent="#accordionExample">
                  <div class="card-body">
                    Since starting the public program, an Affiliation program to reward investors has always been a feature.
                    After registering with <?= $name ?>, you will be assigned a special Referral Link on your dashboard
                    that pays you 10% bonus on your referrals’ deposits—and not just for initial deposits—it includes
                    subsequent deposits, too. This is an excellent opportunity to quickly grow your funds with us, as well as
                    being an easy way to earn start-up funding if you are low on assets! If you have any questions, please
                    contact our live support team.
                  </div>
                </div>
              </div>

              <!-- Question 4 -->
              <div class="card">
                <div class="card-header" id="heading28">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse28"
                    aria-expanded="false" aria-controls="collapse28">How can I make a deposit?</button>
                </div>
                <div id="collapse28" class="collapse" aria-labelledby="heading28" data-parent="#accordionExample">
                  <div class="card-body">
                    Since this is a crypto project, we prefer to accept deposits in Bitcoin. However, depending on your
                    location, we can also accept money through Perfect Money and the likes.
                  </div>
                </div>
              </div>

              <!-- Question 5 -->
              <div class="card">
                <div class="card-header" id="heading27">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse27"
                    aria-expanded="false" aria-controls="collapse27">What is the limit for deposits?</button>
                </div>
                <div id="collapse27" class="collapse" aria-labelledby="heading27" data-parent="#accordionExample">
                  <div class="card-body">
                    By default, the minimum to rent servers is USD 200 and the maximum is currently USD 250,000, but larger
                    amounts are possible after direct consultation with our team. Remember: after the rental fee has been
                    received, we use a 7-day “grace” period to purchase node stakes and set up the servers for you.
                  </div>
                </div>
              </div>

              <!-- Question 6 -->
              <div class="card">
                <div class="card-header" id="heading49">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse49"
                    aria-expanded="false" aria-controls="collapse49">How can I make a withdrawal?</button>
                </div>
                <div id="collapse49" class="collapse" aria-labelledby="heading49" data-parent="#accordionExample">
                  <div class="card-body">
                    Withdrawals can be initiated from your dashboard. Each withdrawal request is processed instantly and paid
                    in Bitcoin. The minimum withdrawal is 10 USD.
                  </div>
                </div>
              </div>

              <!-- Question 7 -->
              <div class="card">
                <div class="card-header" id="heading50">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse50"
                    aria-expanded="false" aria-controls="collapse50">How does compounding work?</button>
                </div>
                <div id="collapse50" class="collapse" aria-labelledby="heading50" data-parent="#accordionExample">
                  <div class="card-body">
                    Compounding allows your deposit to grow very fast. It depends on the plan you invested in. Each plan has
                    its own duration. It is entirely up to you. Some like to withdraw all earnings, some compound upwards for
                    a while and withdraw then, some go 50-50. It’s your money, so you decide on the option that works best for
                    you.
                  </div>
                </div>
              </div>

              <!-- Question 8 -->
              <div class="card">
                <div class="card-header" id="heading51">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse51"
                    aria-expanded="false" aria-controls="collapse51">How can I monitor my revenue?</button>
                </div>
                <div id="collapse51" class="collapse" aria-labelledby="heading51" data-parent="#accordionExample">
                  <div class="card-body">
                    Earnings and total balance information can be viewed at any time from your dashboard.
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="sec-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="sec"></div>
          </div>
        </div>
      </div>
    </div>


    <section class="logo-area">
      <div class="container">
        <div class="row justify-content-center ">
          <div class="col-10 text-center">
            <div class="section-header mb-5">
              <h2 class="title">Payment We Accept </h2>
              <p class="section-para">Below are the payment methods we accept for now, more methods will be added with
                time!</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="mon_wr owl-carousel">
              <div><img src="assetss/images/10.jpeg" alt="Bitcoin"></div>
              <div><img src="assetss/images/eth.jpeg" alt="Ethereum"></div>
              <div><img src="assetss/images/doge2.jpeg" alt="Dogdecoin"></div>
              <div><img src="assetss/images/perfectmoney1.png" alt="Perfect Money"></div>

            </div>
          </div>
        </div>
      </div>
    </section>


    <div class="subscribe-area" id="subscribe">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10 text-center">
            <div class="section-header">
              <h2 class="title">Subscribe Now</h2>
              <p class="section-para">Join our newsletter today and be the first to get daily updates on all offers!
              </p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <form class="subscribe-form" action="" method="post">
              <input type="hidden" name="_token" value="0DI0kMOBNY3bUeI2Pt0ohYKyAlF44jwPb8z1eQjf"> <input type="email" name="email" placeholder="Subscribe your email" required value="">
              <input type="submit" class="btn-default website-color " value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="sec-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="sec"></div>
          </div>
        </div>
      </div>
    </div>







    <!-- Modal -->
    <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Need Login </h5>
          </div>
          <form action="" method="post">
            <input type="hidden" name="_token" value="0DI0kMOBNY3bUeI2Pt0ohYKyAlF44jwPb8z1eQjf">
            <div class="modal-footer">
              <a href="<?= $root ?>/login" type="button" style="background-color: #b58e43;" class="btn btn-success custom-success">Please, Login
                your
                account at first</a>
            </div>
          </form>
        </div>
      </div>
    </div>



    <?php include "./master/footer2.php" ?>

    <div class="copiright">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <p>&copy; 2025 <?= $name ?>. All rights reserved</p>
          </div>

          <div id="google_translate_element"></div>
          <div id="lan"></div>

          <script type="text/javascript">
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({
                pageLanguage: 'en'
              }, 'google_translate_element');
            }
          </script>

          <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
          </script>


        </div>
      </div>
    </div>





    <!-- jquery -->
    <script src="assetss/templates/basic/js/jquery-3.3.1.min.js"></script>
    <!-- migarate-jquery -->
    <script src="assetss/templates/basic/js/jquery-migrate-3.0.0.js"></script>
    <!-- bootstrap js -->
    <script src="assetss/templates/basic/js/bootstrap.min.js"></script>
    <!-- owl-carousel js -->
    <script src="assetss/templates/basic/js/owl.carousel.min.js"></script>
    <!-- particle js -->
    <script src="assetss/templates/basic/js/viewport.jquery.js"></script>
    <script src="assetss/templates/basic/js/odometer.min.js"></script>
    <script src="assetss/templates/basic/js/particles.js"></script>-
    <!-- main -->
    <script src="assetss/templates/basic/js/main.js"></script>

    <script src="assetss/admin/js/iziToast.min.js"></script>








    <script>
      $(document).ready(function() {
        $('.investButton').on('click', function() {
          var data = $(this).data('resource');
          var symbol = "$";
          var currency = "USD";

          if (data.fixed_amount == '0') {
            $('.investAmountRenge').text(`Invest: ${symbol}${data.minimum} - ${symbol}${data.maximum}`);
            $('.fixedAmount').val('');
            $('#fixedAmount').attr('readonly', false);

          } else {
            $('.investAmountRenge').text(`Invest: ${symbol}${data.fixed_amount}`);
            $('.fixedAmount').val(data.fixed_amount);

            $('#fixedAmount').attr('readonly', true);
          }

          if (data.interest_status == '1') {
            $('.interestDetails').html(`<strong> Interest: ${data.interest} % </strong>`);
          } else {
            $('.interestDetails').html(`<strong> Interest: ${data.interest} ${currency}  </strong>`);
          }
          if (data.lifetime_status == '0') {
            $('.interestValidaty').html(`<strong>  Per ${data.times} Hours ,  ${data.repeat_time} Times</strong>`);
          } else {
            $('.interestValidaty').html(`<strong>  Per ${data.times} Hours,  Lifetime </strong>`);
          }

          $('.planName').text(data.name);
          $('.plan_id').val(data.id);
        });
      });
    </script>
    <script>
      (function($) {
        "use strict";
        $(document).ready(function() {
          $("#changePlan").on('change', function() {
            var planId = $("#changePlan option:selected").val();
            var investInput = $('.invest-input').val();
            var profitInput = $('.profit-input').val('');

            $('.period').text('');

            if (investInput != '' && planId != null) {
              ajaxPlanCalc(planId, investInput)
            }
          });

          $(".invest-input").on('change', function() {
            var planId = $("#changePlan option:selected").val();
            var investInput = $(this).val();
            var profitInput = $('.profit-input').val('');
            $('.period').text('');
            if (investInput != '' && planId != null) {
              ajaxPlanCalc(planId, investInput)
            }
          });
        });
      })(jQuery);

      function ajaxPlanCalc(planId, investInput) {
        $.ajax({
          url: "https://assetbase-trading.com/planCalculator",
          type: "post",
          data: {
            planId,
            investAmount: investInput
          },
          success: function(response) {

            var alertStatus = "1";
            if (response.errors) {
              if (alertStatus == '1') {
                iziToast.error({
                  message: response.errors,
                  position: "topRight"
                });
              } else if (alertStatus == '2') {
                toastr.error(response.errors);
              }
            }

            console.log(response);

            $('.profit-input').val(response.netProfit);
            $('.period').text(response.description);


          }
        });
      }
    </script>
    <script>
      $(document).on("change", ".langSel", function() {
        window.location.href = "/change-lang" + $(this).val();

      });
    </script>

    <script>
      new Typewriter('#typewriter', {
        strings: ['Securely', 'Reliably'],
        autoStart: true,
        loop: true,
      });
    </script>



    <div class="sec-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="sec"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="mgm" style="display: none;">
      <div class="txt" style="color:#fbc013;">New trade from <b></b> just Now <a href="javascript:void(0);"
          onclick="javascript:void(0);"></a></div>
    </div>

    <style>
      .mgm {
        border-radius: 7px;
        position: fixed;
        z-index: 90;
        bottom: 80px;
        right: 50px;
        background: #000;
        padding: 10px 27px;
        box-shadow: 0px 5px 13px 0px rgba(0, 0, 0, .3);
      }

      .mgm a {
        font-weight: 700;
        display: block;
        color: #fff;
      }

      .mgm a,
      .mgm a:active {
        transition: all .2s ease;
        color: #fff;
      }
    </style>



</body>


</html>