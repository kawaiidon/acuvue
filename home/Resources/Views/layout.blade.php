<!DOCTYPE html>
<html lang="" class="no-js">
<head>
    {!! Html::meta(['charset' => 'utf-8', 'content' => NULL, 'name' => NULL]) !!}
    {!! Html::meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']) !!}
    <title>@yield('title', config('app.application_name'))</title>
    <meta name="description" content="@yield('description')">
    @yield('OpenGraph')
    {!! Html::meta(['name' => 'csrf-token', 'content' => csrf_token()]) !!}
    {!! Html::meta(['name' => 'locale', 'content' => \App::getLocale()]) !!}
    {!! Html::meta(['name' => 'fallback_locale', 'content' => config('app.fallback_locale')]) !!}
    {!! Html::vendorCSS() !!}
    {!! Html::mainCSS() !!}
    {{-- {!! Html::favicon() !!} --}}
    @yield('head')
    <link rel="apple-touch-icon" sizes="76x76" href="/theme/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/theme/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/theme/favicon-16x16.png">
    <link rel="manifest" href="/theme/site.webmanifest">
    <link rel="mask-icon" href="/theme/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:title" content="Премия Acuvue&reg; Golden Lens">
    <meta property="og:description" content="Самые зрелищные моменты The International — смотри и выбирай лучших! Четкое зрение — чистая победа.">
    <meta property="og:image" content="theme/images/share.jpg">
    <!-- Google Analytics-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-120512427-1', 'auto');
      ga('send', 'pageview');
    </script>
    <!-- End Google Analytics-->
    <!-- AdRiver code START. Type:counter(zeropixel) Site: https://w SZ: acuvueawards-->
    <script type="text/javascript">
      var RndNum4NoCash = Math.round(Math.random() * 1000000000);
      var ar_Tail='unknown'; if (document.referrer) ar_Tail = escape(document.referrer);
      document.write('<img src="' + ('https:' == document.location.protocol ? 'https:' : 'http:') + '//ad.adriver.ru/cgi-bin/rle.cgi?' + 'sid=219728&sz=acuvueawards&bt=21&pz=0&rnd=' + RndNum4NoCash + '&tail256=' + ar_Tail + '" border=0 width=1 height=1>')
    </script>
    <noscript><img src="//ad.adriver.ru/cgi-bin/rle.cgi?sid=219728&amp;sz=acuvueawards&amp;bt=21&amp;pz=0&amp;rnd=766753598" border="0" width="1" height="1"></noscript>
    <!-- AdRiver code END-->
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-120512427-1']);
      _gaq.push(['_trackPageview']);
      setTimeout("_gaq.push(['_trackEvent', ‘5_seconds', 'read'])",5000);
      (function() {     var ga = document.createElement('script');
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);   })();
    </script>
    <!-- Yandex.Metrika counter-->
    <script type="text/javascript">
      (function (d, w, c) {
      (w[c] = w[c] || []).push(function() {
      try {
      w.yaCounter49320118 = new Ya.Metrika2({
      id:49320118,
      clickmap:true,
      trackLinks:true,
      accurateTrackBounce:true,
      webvisor:true
      });
      } catch(e) { }
      });
      var n = d.getElementsByTagName("script")[0],
      s = d.createElement("script"),
      f = function () { n.parentNode.insertBefore(s, n); };
      s.type = "text/javascript";
      s.async = true;
      s.src = "https://mc.yandex.ru/metrika/tag.js";
      if (w.opera == "[object Opera]") {
      d.addEventListener("DOMContentLoaded", f, false);
      } else { f(); }
      })(document, window, "yandex_metrika_callbacks2");
    </script>
    <noscript>
      <div><img src="https://mc.yandex.ru/watch/49320118" style="position:absolute; left:-9999px;" alt=""></div>
    </noscript>
    <!-- /Yandex.Metrika counter-->
</head>
<body>
  <header class="header">
    <div class="header__wrapper main-content"><a class="header__logo" href="/"></a>
      <div class="header__menu-btn js-show-menu"><span></span><span></span><span></span></div>
      @Menu('BYWHvLefxb')
    </div>
  </header>
  <main class="main">
    @yield('content')
  </main>
<div class="top-btn js-go-top"></div>
<footer class="footer">
  <div class="footer__wrapper main-content">
    <div class="footer__logo"></div>
    <div class="footer__rules">
      <div class="footer-rules"><a class="footer-rules__link big-link" href="/rules"><span>Правила розыгрыша</span></a>
        <div class="footer-rules__desc">&copy; ООО &laquo;Джонсон & Джонсон&raquo; 2018. Этот сайт принадлежит компании ООО &laquo;Джонсон & Джонсон&raquo;, которая полностью отвечает за&nbsp;его содержимое. Все права защищены. Данный сайт предназначен для жителей Российской Федерации и&nbsp;стран СНГ. Art by&nbsp;Tuna Art.<br>&laquo;Рег.&nbsp;Уд&nbsp;&#8470;&nbsp;РЗН 2016/4406 от&nbsp;02.07.2016&raquo;</div>
      </div>
    </div>
    <div class="footer__social">
      <div class="social">
        <div class="social__title">Подпишись на новости премии</div>
        <div class="social__list"><a class="social__link vk" href="https://vk.com/dota2ruhub" target="_blank"></a><a class="social__link fb" href="https://www.facebook.com/dota2ruhub/" target="_blank"></a><a class="social__link tw" href="https://twitter.com/dota2ruhub" target="_blank"></a></div>
      </div>
    </div>
  </div>
  <div class="footer__warning">Имеются противопоказания, необходимо проконсультироваться со специалистом</div>
</footer>
<div class="popup js-overlay">
  <div class="popup__bg"></div>
  {{-- <div class="popup__body autorization js-popup" data-overlay="login">
    <div class="popup__btn js-close-popup"><span></span><span></span><span></span></div>
    <div class="popup__title">Авторизация</div>
    <div class="popup__desc little-margin">Чтобы участвовать в голосовании и розыгрыше приза, авторизуйся через одну из указанных социальных сетей. Помни, что у тебя только один голос!</div>
    <div class="popup__login">
      <div id="uLogin3668870b" data-ulogin="display=panel;fields=first_name,last_name,email;providers=vkontakte;redirect_uri=;callback=login"></div>
      <div class="twitter-btn js-twitter">

      </div>
    </div>
  </div> --}}
  <div class="popup__body js-popup" data-overlay="subscribe">
    <div class="popup__logo-mobile"></div>
    <div class="popup__btn js-close-popup"><span></span><span></span><span></span></div>
    <div class="popup__title">Быть в курсе!</div>
    <div class="popup__desc">Чтобы не&nbsp;пропустить самые яркие моменты The International 2018 и&nbsp;первым узнавать новости премии.</div>
    <div class="popup__form">
      <form class="popup-form js-reg-form" action="/submit.php" method="POST">
        <div class="popup-form__row">
          <div class="popup-form__input-row">
            <input class="popup-form__input" type="text" placeholder="Email" name="email" id="email">
          </div>
          <div class="popup-form__btn">
            <button class="btn orange ga-subs" type="submit">подписаться</button>
          </div>
          <div class="popup-form__success js-success">Подписка оформлена!</div>
        </div>
      </form>
    </div>
    <div class="popup__product">
      <div class="popup-product">
        <div class="popup-product__col">
          <div class="popup-product__pic"></div>
        </div>
        <div class="popup-product__col"><a class="popup-product__link js-close-popup ga-farm" href="#farm">Нафармить первую пару</a>
          <div class="popup-product__desc">Контактные линзы для глаз Acuvue&reg; Oasys 1-Day</div>
        </div>
      </div>
    </div>
  </div>
</div>
{!! Html::vendorJS() !!}
<script src="/theme/scripts/main.js"></script>
@yield('scripts')
</body>
</html>
