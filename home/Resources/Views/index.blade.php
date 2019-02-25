@extends('home_views::layout')
@metaTitle()
@metaDescription()

@section('content')
  <section class="section main-section">
    <div class="main-bg js-main-bg">




    <svg class="blur" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%">
        <image filter="url(#filter2)" xlink:href="theme/images/bg-main.jpg" width="100%" height="100%"></image>
        <filter id="filter2">
            <feGaussianBlur stdDeviation="5" />
        </filter>
        <mask id="mask1">
            <circle cx="-50%" cy="-50%" r="160" fill="white" filter="url(#filter2)" />
        </mask>
        <image xlink:href="theme/images/bg-main.jpg" width="100%" height="100%" mask="url(#mask1)"></image>
    </svg>

</div>



    <div class="bubble big first" data-size="big"></div>
    <div class="bubble big second" data-size="big"></div>
    <div class="main-content">
      <div class="main-head">
        <div class="main-head__main-logo"></div>
        <div class="main-head__content">
          <div class="main-head__logo"></div>
          <div class="main-head__desc desc">Премия за&nbsp;самый зрелищный момент квалификаций The International 2018, где все решают зрители!</div>
          <div class="main-head__buttons"><a class="main-head__btn btn orange" href="#voite">участвовать</a><a class="main-head__link big-link js-show-how" href="#how"><span>Как это работает?</span></a></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section how-to-section js-how" id="how">
    <div class="main-content">
      <div class="how-it-work">
        <div class="how-it-work__btn js-hide-how">Свернуть</div>
        <h2 class="how-it-work__title">Как это работает?</h2>
        <div class="how-it-work__list">
          <div class="how-item">
            <div class="how-item__icon icon-1"></div>
            <div class="how-item__title">Будь в курсе</div>
            <div class="how-item__desc">Вспоминай славную историю турнира и&nbsp;подпишись на&nbsp;новости премии, чтобы не&nbsp;пропустить начало отбора.</div>
          </div>
          <div class="how-item">
            <div class="how-item__icon icon-2"></div>
            <div class="how-item__title">Смотри свежим взглядом</div>
            <div class="how-item__desc">Следи за&nbsp;выходом новых хайлайтов и&nbsp;определяйся со&nbsp;своим фаворитом.</div>
          </div>
          <div class="how-item">
            <div class="how-item__icon icon-3"></div>
            <div class="how-item__title">Выбирай достойных</div>
            <div class="how-item__desc">По&nbsp;окончании квалификаций голосуй за&nbsp;самый впечатливший тебя момент и&nbsp;помни&nbsp;&mdash; у&nbsp;тебя есть только один голос.</div>
          </div>
          <div class="how-item">
            <div class="how-item__icon icon-4"></div>
            <div class="how-item__title">Выиграй приз</div>
            <div class="how-item__desc">Готовься забрать крутой игровой ноутбук, ведь шанс его выиграть есть у&nbsp;каждого проголосовавшего!</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section qualification-section">
    <div class="bubble little first" data-size="little"></div>
    <div class="bubble mid second" data-size="mid"></div>
    <div class="main-content">
      <div class="qualification">
        <h2 class="qualification__title blured js-blured-title">Закрытые квалификации <br>The International 2018 </h2>
        <div class="qualification__wrapper">
          <div class="qualification__timeline">
            <div class="timeline">
              <div class="timeline__wrapper">
                <div class="timeline__col">
                  <div class="timeline__title">Начало</div>
                  <div class="timeline__dot"></div>
                  <div class="timeline__day">1 день</div>
                </div>
                <div class="timeline__col">
                  <div class="timeline__title"></div>
                  <div class="timeline__dot"></div>
                  <div class="timeline__day">2 день</div>
                </div>
                <div class="timeline__col">
                  <div class="timeline__title"></div>
                  <div class="timeline__dot"></div>
                  <div class="timeline__day">3 день</div>
                </div>
                <div class="timeline__col">
                  <div class="timeline__title"></div>
                  <div class="timeline__dot"></div>
                  <div class="timeline__day">4 день</div>
                </div>
                <div class="timeline__col">
                  <div class="timeline__title"></div>
                  <div class="timeline__dot"></div>
                  <div class="timeline__day">5 день</div>
                </div>
                <div class="timeline__col">
                  <div class="timeline__title"></div>
                  <div class="timeline__dot"></div>
                  <div class="timeline__day">6 день</div>
                </div>
                <div class="timeline__col">
                  <div class="timeline__title"></div>
                  <div class="timeline__dot"></div>
                  <div class="timeline__day">7 день</div>
                </div>
                <div class="timeline__col last">
                  <div class="timeline__title">Финал</div>
                  <div class="timeline__dot"></div>
                  <div class="timeline__day">8 день</div>
                </div>
              </div>
            </div>
          </div>
          <div class="qualification__timer">
            <div class="qualification__col">
              <div class="counter">
                <div class="counter__title">До конца голосования</div>
                <div class="counter__wrapper">
                  <div class="counter__col">
                    <div class="counter__num js-countdownDays">00</div>
                    <div class="counter__desc">дней</div>
                  </div>
                  <div class="counter__col">
                    <div class="counter__num js-countdownHours">00</div>
                    <div class="counter__desc">часов </div>
                  </div>
                  <div class="counter__col">
                    <div class="counter__num js-countdownMinutes">00</div>
                    <div class="counter__desc">минут</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="qualification__col">
              <div class="qualification__desc desc">Смотри в&nbsp;оба, выбирай достойный момент и&nbsp;участвуй в&nbsp;розыгрыше крутого игрового ноутбука! <b>Голосуй за&nbsp;лучший хайлайт</b> и&nbsp;помни&nbsp;&mdash; у&nbsp;тебя есть только один голос.</div>
            </div>
          </div>
          <div class="qualification__list">
            <div class="qualification-list">
              <div class="qualification-list__item">
                <div class="qualification-list__icon icon-1"></div>
                <div class="qualification-list__desc">
                  Выбери понравившийся зрелищный момент
                </div>
              </div>
              <div class="qualification-list__item">
                <div class="qualification-list__icon icon-2"></div>
                <div class="qualification-list__desc">
                  Проголосуй через соцсеть
                </div>
              </div>
              <div class="qualification-list__item">
                <div class="qualification-list__icon icon-3"></div>
                <div class="qualification-list__desc">
                  Жди результатов конкурса
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section moments-section">
    <div class="bubble mid third" data-size="mid"></div>
    <div class="bubble little four" data-size="little"></div>
    <div class="main-content">
      <div class="moments">
        <div class="moments__wrapper">
          <h2 class="moments__title blured js-blured-title">Отчётное видео</h2>
          <div class="moments__main-moment">
            <div class="main-moment active animated report">
              <div class="main-moment__video">
                <iframe src="https://www.youtube.com/embed/xSql_gNSfiI" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
              </div>
              <div class="main-moment__row">
                <div class="main-moment__share">
                  <div class="social">
                    <div class="social__title">Поделиться:</div>
                    <div class="social__list">
                      <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url="/theme/share-main-video.html"></div>
                      <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url="/theme/share-main-video.html"></div>
                      <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url="/theme/share-main-video.html"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="main-moment__desc desc">Смотрите топ-хайлайты этих квалов, выбирайте фаворитов, голосуйте и выигрывайте крутой ноутбук.</div>
              <div class="main-moment__desc desc">
                Четкое зрение — чистая победа!
              </div>
            </div>
          </div>
          <h2 id="winners" class="moments__title blured js-blured-title">Победители конкурса</h2>
          <div class="moments__main-moment">
            <div class="main-moment active animated report">
              <div class="main-moment__close-btn"></div>
              <div class="main-moment__video">
                <iframe src="https://www.youtube.com/embed/GMvqdfEeaaI" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
              </div>
              <div class="main-moment__row">
                <div class="main-moment__title">Объявление победителей</div>
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
              {{-- <div class="main-moment__row">
                <div class="moment__stat views">0</div>
              </div> --}}
              <div class="main-moment__desc desc">Результаты первой народной премии Acuvue Golden Lense 2018: Золотая линза за&nbsp;самый зрелищный момент закрытых квалификаций The International 8 достается FNG, игроку команды Team Spirit. </div>
            </div>
          </div>
          <div class="archive-link">
            <div class="archive-link__wrapper">
              <div class="archive-link__pic"></div>
              <div class="archive-link__text">
                <div class="archive-link__title">
                  Награду за&nbsp;судейство&nbsp;&mdash; игровой ноутбук забирает Александр Максимов из&nbsp;г.&nbsp;Нарьян-Мар. Поздравляем!
                </div>
                <a href="/archive" class="archive-link__btn btn transparent">
                  архив видео
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section timer-section" id="join">
    <div class="bubble little third" data-size="mid"></div>
    <div class="main-content">
      <div class="timer">
        <div class="timer__wrapper">
          <h2 class="timer__title blured js-blured-title">The International 2018</h2>
          <div class="timer__desc">18 июня - 26 июня</div>
          <div class="timer__counter">
            <div class="counter">
              <div class="counter__title">До конца голосования</div>
              <div class="counter__wrapper">
                <div class="counter__col">
                  <div class="counter__num js-countdownDays">00</div>
                  <div class="counter__desc">дней</div>
                </div>
                <div class="counter__col">
                  <div class="counter__num js-countdownHours">00</div>
                  <div class="counter__desc">часов </div>
                </div>
                <div class="counter__col">
                  <div class="counter__num js-countdownMinutes">00</div>
                  <div class="counter__desc">минут</div>
                </div>
              </div>
            </div>
          </div>
          <div class="timer__btn js-show-popup" data-show-overlay="subscribe">
            <div class="btn orange">Не пропусти!</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section inventory-section" id="farm">
    <div class="bubble little six" data-size="little"></div>
    <div class="bubble big second" data-size="big"></div>
    <div class="bubble mid seven" data-size="mid"></div>
    <div class="main-content">
      <div class="inventory">
        <div class="inventory__wrapper">
          <h2 class="inventory__title blured js-blured-title">Инвентарь</h2>
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
@stop
