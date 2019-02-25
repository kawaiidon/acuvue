@extends('home_views::layout')
@metaTitle()
@metaDescription()
@OpenGraph()
<?php
  $videos = \APPLICATION_HOME\Models\Video::withCount('voices')->get();
  $json = json_encode($videos);
?>
@section('content')
      <section class="section archive-section first-section">
        <div class="bubble big first" data-size="big"></div>
        <div class="bubble big second" data-size="big"></div>
        <div class="main-content">
          <div class="archive">
            <div class="archive__wrapper">
              <div class="archive__title">
                <h2>Архив видео</h2>
              </div>
              <div class="archive__sorting">
                <div class="sorting">
                  <div class="sorting__title">
                    Сортировать:
                  </div>
                  <div class="sorting__type">
                    <div class="sorting__btn date js-sort-video active sorted" data-sort-type="date">
                      по дате
                    </div>
                    <div class="sorting__btn rating js-sort-video" data-sort-type="rating">
                      по рейтингу
                    </div>
                  </div>
                </div>
              </div>
              <div class="moments__main-moment">
                <div class="main-moment js-main-moment">
                  <div class="main-moment__close-btn"></div>
                  <div class="main-moment__video">
                    <iframe src="https://www.youtube.com/embed/xSql_gNSfiI" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
                  </div>
                  <div class="main-moment__row">
                    <div class="main-moment__title">название</div>
                    <div class="main-moment__share">
                      <div class="social">
                        <div class="social__title">Поделиться:</div>
                        <div class="social__list">
                          <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url=""></div>
                          <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url=""></div>
                          <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url=""></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="main-moment__row">
                    <div class="moment__stat views">0</div>
                    <div class="moment__stat voices">0</div>
                  </div>
                </div>
              </div>
              <div class="archive__list">

              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section inventory-section" id="farm">
        <div class="bubble mid five" data-size="mid"></div>
        <div class="bubble little six" data-size="little"></div>
        <div class="main-content">
          <div class="inventory">
            <div class="inventory__wrapper">
              <h2 class="inventory__title">Инвентарь</h2>
              <div class="inventory__info">
                <div class="inventory__col first"></div>
                <div class="inventory__col last">
                  <div class="inventory__subtitle">Сертификат на первую бесплатную пару линз Acuvue&reg; Oasys 1-Day</div>
                  <div class="inventory__desc">Планируя катку, просмотр стрима или турнира, не&nbsp;забудь добавить в&nbsp;свой инвентарь линзы Acuvue&reg; Oasys 1-Day. Использование предмета даёт максимальное улучшение качества процесса. Пассивная способность &laquo;удобство и&nbsp;комфорт для глаз&raquo;: 100%</div>
                  <div class="inventory__btn"><a class="btn orange ga-free" href="https://www.acuvue.ru/freetrial?utm_source=promo&amp;utm_medium=promo&amp;utm_campaign=GoldenLens_Cybersport" target="_blank">получить бесплатно</a></div>
                </div>
              </div>
              <div class="inventory__list">
                <div class="inventory-list">
                  <div class="inventory-list__wrapper">
                    <div class="inventory-list__item">
                      <div class="inventory-list__icon icon-1"></div>
                      <div class="inventory-list__desc">Удобно  при использовании наушников</div>
                    </div>
                    <div class="inventory-list__item">
                      <div class="inventory-list__icon icon-2"></div>
                      <div class="inventory-list__desc">Технология Acuvue&reg; Hydraluxe придает линзе свойства слезы</div>
                    </div>
                    <div class="inventory-list__item">
                      <div class="inventory-list__icon icon-3"></div>
                      <div class="inventory-list__desc">Предотвращают ощущения сухости и усталости глаз</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script>
          var videos = '{!! $json !!}'
      </script>
@stop
