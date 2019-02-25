@extends('home_views::layout')
@metaTitle()
@metaDescription()
@OpenGraph()
@section('content')
<section class="section history-section first-section">
        <div class="bubble big first" data-size="big"></div>
        <div class="bubble big second" data-size="big"></div>
        <div class="main-content">
          <div class="history">
            <h2 class="history__title">исторические моменты</h2>
            <div class="history__wrapper">
              <div class="history__head">
                <div class="history-item first">
                  <div class="history-item__year">11</div>
                  <div class="history-item__float-year js-float-year">20</div>
                  <div class="history-item__col">
                    <div class="history-item__subtitle">Победитель</div>
                    <div class="history-item__team navi">Natus Vincere</div>
                  </div>
                  <div class="history-item__col">
                    <div class="history-item__subtitle">Призовые</div>
                    <div class="history-item__prize">$ 1 000 000</div>
                  </div>
                </div>
              </div>
              <div class="history__video">
                <iframe src="https://www.youtube.com/embed/NUMZDJVP7Ro" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
              </div>
              <div class="history__info">
                <div class="history__views">{{\APPLICATION_HOME\Models\Video::getViewsById('NUMZDJVP7Ro')}}</div>
                <div class="history__share">
                  <div class="social">
                    <div class="social__title">Поделиться:</div>
                    <div class="social__list">
                      <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url="share-video-1.html"></div>
                      <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url="share-video-1.html"></div>
                      <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url="share-video-1.html"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="history__desc desc">Золотой состав Natus Vincere. Блестящая реакция от&nbsp;Dendi, зацепившего в&nbsp;Dream Coil трёх соперников. Ультра-килл от&nbsp;ХВОСТ, армия прирученных крипов от&nbsp;Puppey. Что ещё нужно для победы на&nbsp;первом в&nbsp;истории The International?</div>
              <div class="history__list">
                <div class="history-item">
                  <div class="history-item__year">12</div>
                  <div class="history-item__col">
                    <div class="history-item__subtitle">Победитель</div>
                    <div class="history-item__team inv">Invictus Gaming</div>
                  </div>
                  <div class="history-item__col">
                    <div class="history-item__subtitle">Призовые</div>
                    <div class="history-item__prize">$ 1 000 000</div>
                  </div>
                </div>
                <div class="history__video">
                  <iframe src="https://www.youtube.com/embed/0wzVXph0Qgs" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
                </div>
                <div class="history__info">
                  <div class="history__views">{{\APPLICATION_HOME\Models\Video::getViewsById('0wzVXph0Qgs')}}</div>
                  <div class="history__share">
                    <div class="social">
                      <div class="social__title">Поделиться:</div>
                      <div class="social__list">
                        <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url="share-video-2.html"></div>
                        <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url="share-video-2.html"></div>
                        <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url="share-video-2.html"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="history__desc desc">Лучшая комбинация в&nbsp;Доте: Black Hole и&nbsp;Ravage. М5 наглядно демонстрируют, как это должно работать!</div>
                <div class="history-item">
                  <div class="history-item__year">13</div>
                  <div class="history-item__col">
                    <div class="history-item__subtitle">Победитель</div>
                    <div class="history-item__team alliance">The Alliance</div>
                  </div>
                  <div class="history-item__col">
                    <div class="history-item__subtitle">Призовые</div>
                    <div class="history-item__prize">$ 1 437 204</div>
                  </div>
                </div>
                <div class="history__video">
                  <iframe src="https://www.youtube.com/embed/jv9SyWX6eJA" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
                </div>
                <div class="history__info">
                  <div class="history__views">{{\APPLICATION_HOME\Models\Video::getViewsById('jv9SyWX6eJA')}}</div>
                  <div class="history__share">
                    <div class="social">
                      <div class="social__title">Поделиться:</div>
                      <div class="social__list">
                        <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url="share-video-3.html"></div>
                        <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url="share-video-3.html"></div>
                        <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url="share-video-3.html"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="history__desc desc">Самое обидноe в&nbsp;Доте&nbsp;&mdash; забрать Рошана, и&nbsp;не&nbsp;успеть подобрать Аегис и&nbsp;Сыр. Но&nbsp;этот Clockwerk смог перевернуть драку! Да&nbsp;так, что соперники пожалели, что вообще пришли в&nbsp;рошпит!</div>
                <div class="history-item">
                  <div class="history-item__year">14</div>
                  <div class="history-item__col">
                    <div class="history-item__subtitle">Победитель</div>
                    <div class="history-item__team new">NewBee</div>
                  </div>
                  <div class="history-item__col">
                    <div class="history-item__subtitle">Призовые</div>
                    <div class="history-item__prize">$ 5 025 051</div>
                  </div>
                </div>
                <div class="history__video">
                  <iframe src="https://www.youtube.com/embed/mCDunahyIak" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
                </div>
                <div class="history__info">
                  <div class="history__views">{{\APPLICATION_HOME\Models\Video::getViewsById('mCDunahyIak')}}</div>
                  <div class="history__share">
                    <div class="social">
                      <div class="social__title">Поделиться:</div>
                      <div class="social__list">
                        <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url="share-video-5.html"></div>
                        <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url="share-video-5.html"></div>
                        <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url="share-video-5.html"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="history__desc desc">Ohayo на&nbsp;Batrider смог из&nbsp;центра драки через лассо выцепить главного кора Newbee. Ульт Earthshaker задизейблил половину команды соперника, Viper осталось лишь добить еле живых героев.</div>
                <div class="history__video">
                  <iframe src="https://www.youtube.com/embed/AO9S7oPVyc4" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
                </div>
                <div class="history__info">
                  <div class="history__views">{{\APPLICATION_HOME\Models\Video::getViewsById('AO9S7oPVyc4')}}</div>
                  <div class="history__share">
                    <div class="social">
                      <div class="social__title">Поделиться:</div>
                      <div class="social__list">
                        <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url="share-video-4.html"></div>
                        <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url="share-video-4.html"></div>
                        <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url="share-video-4.html"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="history__desc desc">Затяжная игра. Alchemist с&nbsp;Рапирой идет ва-банк и&nbsp;отправляется ломать tier-4. Но&nbsp;шикарный сон от&nbsp;Naga Siren помогает команде забрать Alchemist, у&nbsp;которого нет выкупа. Pajkatt сразу&nbsp;же телепортируется на&nbsp;базу к&nbsp;Fnatic и&nbsp;сносит трон!</div>
                <div class="history-item">
                  <div class="history-item__year">15</div>
                  <div class="history-item__col">
                    <div class="history-item__subtitle">Победитель</div>
                    <div class="history-item__team evil">Evil Geniuses</div>
                  </div>
                  <div class="history-item__col">
                    <div class="history-item__subtitle">Призовые</div>
                    <div class="history-item__prize">$ 5 025 051</div>
                  </div>
                </div>
                <div class="history__video">
                  <iframe src="https://www.youtube.com/embed/gDuHg_IBLHA" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
                </div>
                <div class="history__info">
                  <div class="history__views">{{\APPLICATION_HOME\Models\Video::getViewsById('gDuHg_IBLHA')}}</div>
                  <div class="history__share">
                    <div class="social">
                      <div class="social__title">Поделиться:</div>
                      <div class="social__list">
                        <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url="share-video-5.html"></div>
                        <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url="share-video-5.html"></div>
                        <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url="share-video-5.html"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="history__desc desc">Ohayo на&nbsp;Batrider смог из&nbsp;центра драки через лассо выцепить главного кора Newbee. Ульт Earthshaker задизейблил половину команды соперника, Viper осталось лишь добить еле живых героев.</div>
              </div>
              <div class="history__video">
                <iframe src="https://www.youtube.com/embed/a45JOQ9wKoM" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
              </div>
              <div class="history__info">
                <div class="history__views">{{\APPLICATION_HOME\Models\Video::getViewsById('a45JOQ9wKoM')}}</div>
                <div class="history__share">
                  <div class="social">
                    <div class="social__title">Поделиться:</div>
                    <div class="social__list">
                      <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url="share-video-6.html"></div>
                      <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url="share-video-6.html"></div>
                      <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url="share-video-6.html"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="history__desc desc">Viсi Gaming зхаодят на&nbsp;Рошана, но&nbsp;MVP.HOT6 в&nbsp;последние секунды окружают соперников, и&nbsp;MP&nbsp;успевает своровать Аегис на&nbsp;Storm spirit.</div>
              <div class="history-item">
                <div class="history-item__year">16</div>
                <div class="history-item__col">
                  <div class="history-item__subtitle">Победитель</div>
                  <div class="history-item__team wings">Wings Gaming</div>
                </div>
                <div class="history-item__col">
                  <div class="history-item__subtitle">Призовые</div>
                  <div class="history-item__prize">$ 9 139 002</div>
                </div>
              </div>
              <div class="history__video">
                <iframe src="https://www.youtube.com/embed/jBsiWzDwLNA" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
              </div>
              <div class="history__info">
                <div class="history__views">{{\APPLICATION_HOME\Models\Video::getViewsById('jBsiWzDwLNA')}}</div>
                <div class="history__share">
                  <div class="social">
                    <div class="social__title">Поделиться:</div>
                    <div class="social__list">
                      <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url="share-video-7.html"></div>
                      <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url="share-video-7.html"></div>
                      <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url="share-video-7.html"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="history__desc desc">Решающая карта для обеих команд. На&nbsp;кону&nbsp;&mdash; вылет с&nbsp;турнира. Несмотря на&nbsp;грамотную инициацию от&nbsp;Team Liquid, Dendi успевает выдать прокаст на&nbsp;Queen Of&nbsp;Pain, забирая двух героев соперника. Это помогает Na`Vi&nbsp;завершить драку с&nbsp;ровным счетом.</div>
              <div class="history-item js-last-year">
                <div class="history-item__year">17</div>
                <div class="history-item__col">
                  <div class="history-item__subtitle">Победитель</div>
                  <div class="history-item__team liquid">Team Liquid</div>
                </div>
                <div class="history-item__col">
                  <div class="history-item__subtitle">Призовые</div>
                  <div class="history-item__prize">$ 10 862 683</div>
                </div>
              </div>
              <div class="history__video">
                <iframe src="https://www.youtube.com/embed/02sHRnnVlHA" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
              </div>
              <div class="history__info">
                <div class="history__views">{{\APPLICATION_HOME\Models\Video::getViewsById('02sHRnnVlHA')}}</div>
                <div class="history__share">
                  <div class="social">
                    <div class="social__title">Поделиться:</div>
                    <div class="social__list">
                      <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url="share-video-8.html"></div>
                      <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url="share-video-8.html"></div>
                      <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url="share-video-8.html"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="history__desc desc">Последняя решающая игра Грандфинала. Miracle, благодаря молниеносной реакции, чудом переживает 4 дизейбла+сайленс, прожимает бкб, ульт и&nbsp;вместе с&nbsp;командой выигрывает драку, а&nbsp;в&nbsp;последствии&nbsp;&mdash; игру и&nbsp;турнир.</div>
              <div class="history__video">
                <iframe src="https://www.youtube.com/embed/zEIesBktFik" frameborder="0" allow="encrypted-media" allowfullscreen=""></iframe>
              </div>
              <div class="history__info">
                <div class="history__views">{{\APPLICATION_HOME\Models\Video::getViewsById('zEIesBktFik')}}</div>
                <div class="history__share">
                  <div class="social">
                    <div class="social__title">Поделиться:</div>
                    <div class="social__list">
                      <div class="social__link vk js-share" data-name="vk" data-link="https://vk.com/share.php?url=" data-url="share-video-9.html"></div>
                      <div class="social__link fb js-share" data-name="fb" data-link="https://www.facebook.com/sharer.php?u=" data-url="share-video-9.html"></div>
                      <div class="social__link tw js-share" data-name="tw" data-link="https://twitter.com/intent/tweet?text=" data-url="share-video-9.html"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="history__desc desc">LFY заходят на&nbsp;хай-граунд к&nbsp;VP. Monet на&nbsp;Faceless Void ставит шикарную хроносферу по&nbsp;корам VP. Ice Blast от&nbsp;ddc ставит крест на&nbsp;Virtus.pro.</div>
            </div>
          </div>
        </div>
      </section>
      <section class="section timer-section">
        <div class="bubble mid five" data-size="mid"></div>
        <div class="main-content">
          <div class="timer">
            <div class="timer__wrapper">
              <h2 class="timer__title">The International 2018</h2>
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
@stop
