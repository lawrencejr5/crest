<footer class="footer bg_img" data-background="black">



    <div class="footer__top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <a href="<?= $root ?>"><img src="<?= $root ?>/assets/images/logoIcon/crest2-nobg.png" style="width: 400px; height: 70px; object-fit: cover;"
                            alt="image"></a>
                    <ul class="footer-short-menu d-flex flex-wrap justify-content-center mt-3">
                        <li><a
                                href="<?= $root ?>/links/privacy-amp-policy/180">Privacy &amp; Policy</a>
                        </li>
                        <li><a
                                href="<?= $root ?>/links/terms-amp-condition/181">Terms &amp; Condition</a>
                        </li>
                        <li><a
                                href="<?= $root ?>/links/cookie-policy/226">Cookie Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-md-left text-center">
                    <p>© 2025 <a href="<?= $root ?>" class="base--color"><?= $name ?></a>. All
                        rights reserved</p>
                </div>
                <div class="col-lg-6">
                    <ul class="social-link-list d-flex flex-wrap justify-content-md-end justify-content-center">
                        <li><a href="https://facebook.com"><i class="lab la-facebook-f"></i></a></li>
                        <li><a href="https://www.twitter.com/"><i class="lab la-twitter"></i></a></li>
                        <li><a href="https://www.pinterest.com/"><i class="lab la-pinterest-p"></i></a></li>
                        <li><a href="https://www.linkedin.com/"><i class="lab la-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?24514';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
        "enabled": true,
        "chatButtonSetting": {
            "backgroundColor": "#4dc247",
            "ctaText": "",
            "borderRadius": "25",
            "marginLeft": "10",
            "marginBottom": "10",
            "marginRight": "0",
            "position": "left"
        },
        "brandSetting": {
            "brandName": "<?= $name ?>",
            "brandSubTitle": "Typically replies within minutes",
            "brandImg": "<?= $root ?>/assets/images/logoIcon/crest-favicon.png",
            "welcomeText": "Hi, there!\nHow can I help you?",
            "messageText": "Hello, I have some questions!",
            "backgroundColor": "#0a5f54",
            "ctaText": "Start Chat",
            "borderRadius": "25",
            "autoShow": false,
            "phoneNumber": "+447438517893‬"
        }
    };
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
</script>