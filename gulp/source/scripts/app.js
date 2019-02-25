const ACUVUE = {};

let data = {
  mobile: false
}

ACUVUE.detectMobile = _ => {
  if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    data.mobile = true;
  }
}

ACUVUE.popup = {
  init: function () {
    let t = this;
    $('.js-show-popup').on('click', function () {
      let name = $(this).attr('data-show-overlay');
      t.show(name);
    });
    $('.js-close-popup').on('click', _=> this.hide());
    $(document).on("keyup", function(key) {
      if (key.keyCode === 27) {
        t.hide();
      }
    });
  },
  show: function (name) {
    $(`[data-overlay=${name}]`).addClass('active');
    $('.js-overlay').addClass('active');
    $('.main').addClass('blured');
  },
  hide: function () {
    $('.js-overlay').removeClass('active');
    $('.js-popup').removeClass('active');
    $('.main').removeClass('blured');
  }
}

ACUVUE.scrollMenu = {
  init: function () {

    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        let target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top - 100
          }, 600);
          return false;
        }
      }
    });

    $('.js-go-top').on('click', _ => {
      $('html, body').animate({
        scrollTop: 0
      }, 600);
    })
  }
}

ACUVUE.showHowWork = {
  howBlock: $('.js-how'),
  init: function () {
    let t = this;
    $('.js-show-how').on('click', function (e) {
      // e.preventDefault();
      $(this).toggleClass('active');
      t.switch();
    });
    $('.js-hide-how').on('click', _ => t.hide() );
  },
  switch: function () {
    if (!this.howBlock.hasClass('active')) {
      this.howBlock.addClass('active');
    } else {
      this.howBlock.removeClass('active');
    }
  },
  hide: function () {
    $('.js-show-how').removeClass('active');
    this.howBlock.removeClass('active');
  }
}

ACUVUE.parallax = {
  target: [$('.main-section')],
  currentMousePos: { x: -1, y: -1 },
  init: function () {
    let t = this;
    t.target.forEach( item => {
      $(item).mousemove(function (event) {
        t.currentMousePos.x = event.pageX;
        t.currentMousePos.y = event.pageY;
        t.animation(item);
      });
    } );
  },
  animation: function (item) {
    let bgPosX = 0;
    let bgPosY = 0;
    bgPosX = Math.floor(60 - (this.currentMousePos.x / 20));
    bgPosY = Math.floor(60 - (this.currentMousePos.y / 20));
    $('.js-main-bg').css({
      'transform': `translate(${bgPosX}px, ${bgPosY}px)`
    })
  }
}

ACUVUE.blureMouse = {
  init: function () {
    $('.main-section').mousemove(function (event) {
      event.preventDefault();
      var upX = event.clientX;
      var upY = event.clientY;
      var mask = $('#mask1 circle')[0];
      mask.setAttribute("cy", (upY + 120) + 'px');
      mask.setAttribute("cx", (upX + 120) + 'px');
    });
  }
}

ACUVUE.counter = {
  init: function () {
    let deadline = "07/03/2018";
    let time = {};
    setInterval( _ => {
      let daysCount = Math.floor((new Date(deadline).getTime() - Date.now()) / 1000);
      time = {
        seconds: daysCount % 60 < 10 ? "0" + daysCount % 60 : daysCount % 60,
        minutes: Math.floor(daysCount / 60) % 60 < 10 ? "0" + Math.floor(daysCount / 60) % 60 : Math.floor(daysCount / 60) % 60,
        hours: Math.floor(daysCount / 60 / 60) % 24 < 10 ? "0" + Math.floor(daysCount / 60 / 60) % 24 : Math.floor(daysCount / 60 / 60) % 24,
        days: Math.floor(daysCount / 60 / 60 / 24)
      };
      $(".js-countdownDays").html(time.days);
      $(".js-countdownHours").html(time.hours);
      $(".js-countdownMinutes").html(time.minutes);
    }, 1000);
  }
}

ACUVUE.rulesTabs = {
  init: function () {
    let t = this;
    let tab;
    $('.js-show-tab').on('click', function () {
      let btn = $(this);
      btn.addClass('active').siblings().removeClass('active');
      tab = $(`[data-tab=`+ btn.attr('data-show-tab') +`]`);
      t.toggle(tab);
    });
  },
  toggle: function (tab) {
    tab.addClass('active').siblings().removeClass('active animated');
    setTimeout( _=> {
      tab.addClass('animated');
    }, 150);
  }
}

ACUVUE.loadedAnimation = _ => {
  setTimeout( _ => {
    $('.main-section').addClass('loaded');
  }, 200)
  setTimeout( _ => {
    $('.main-section').addClass('transition');
    $('.header').addClass('loaded');
  }, 1000)
}

ACUVUE.videoList = {
  init: function () {
    let t = this;
    let videos = $('.history__video');
    videos.map((i,item) => {
      let id = $(item).find('iframe').attr('src').split('/')[4];
      this.getVideoData(id, item);
    });
  },
  getVideoData: function (id, video) {
    $.get(
     "http://www.googleapis.com/youtube/v3/videos", {
        dataType: "jsonp",
        part: 'statistics',
        id: id,
        key: 'AIzaSyCMSA_wtb9uHhaQGqUwOdc-P1JU7opdVlQ'
     },
     function (data) {
      // console.log(data.items[0].statistics.viewCount);
      $(video).next().find('.history__views').html(data.items[0].statistics.viewCount);
     }
   );
  }
}

ACUVUE.indexVideo = {
  videoList: $('.archive__list'),
  videoData: [],
  videoItems: [],
  voiteBtn: [],
  mainVideo: $('.js-main-moment'),
  init: function () {
    if (this.videoData.length < 1) {
      this.videoData = JSON.parse(videos);
    }
    let t = this;
    this.putItems();

    $('.js-sort-video').on('click', function () {
      let btn = $(this);
      let type = btn.attr('data-sort-type');
      let sorted;
      if (btn.hasClass('sorted')) {
        sorted = true;
        btn.removeClass('sorted');
      } else {
        sorted = false;
        btn.addClass('sorted');
      }
      btn.addClass('active').siblings().removeClass('active sorted');
      t.sortVideo(type, sorted);
    });
    // $('.js-voite').on('click', function () {
    //   ACUVUE.popup.show('login');
    //   t.voiteBtn = $(this);
    // });
  },
  putItems: function () {
    this.videoItems = [];
    this.videoData.forEach( (item, i) => {
    if (!data.mobile) {
      this.videoItems.push(
        `<div class="moment js-show-video" data-id="${item.id}" data-video-id="${item.videoId}" data-video-desc="${item.desc}" data-video-sharing="/video_share/${item.id}">
          <div class="moment__video" style="background-image: url('http://img.youtube.com/vi/${item.videoId}/0.jpg')"></div>
          <div class="moment__title">${item.title}</div>
          <div class="moment__info">
            <div class="moment__stat views">${item.views}</div>
            <div class="moment__stat voices">${item.voices_count}</div>
          </div>
          </div>
         `);
    } else {
      this.videoItems.push(
        `<div class="moment" data-video-id="${item.videoId}">
          <div class="moment__video" style="background-image: url('http://img.youtube.com/vi/${item.videoId}/0.jpg')">
          <iframe src='https://www.youtube.com/embed/${item.videoId}' frameborder="0" allow="encrypted-media"></iframe>
          </div>
          <div class="moment__info">
            <div class="moment__title">${item.title}</div>
          </div>
          <div class="moment__info">
            <div class="moment__stat views">${item.views}</div>
            <div class="moment__stat voices">${item.voices_count}</div>
          </div>
        </div>
      `);
    }
    if (Object.keys(this.videoItems).length === this.videoData.length) {
      this.buildList();
    }
    });
  },
  buildList: function () {
    let t = this;
    // function shuffleArray(array) {
    //     for (let i = array.length - 1; i > 0; i--) {
    //         const j = Math.floor(Math.random() * (i + 1));
    //         [array[i], array[j]] = [array[j], array[i]]; // eslint-disable-line no-param-reassign
    //     }
    // }
    // shuffleArray(this.videoItems);
    this.videoItems.map((item) => {
      this.videoList.append(item);
    });
    let moment = $('.moment')[7];
    $(moment).after(this.mainVideo);
    $('.js-show-video').on('click', function () {
      let id = $(this).attr('data-id');
      let videoId = $(this).attr('data-video-id');
      let title = $(this).find('.moment__title').html();
      let desc = $(this).attr('data-video-desc');
      let views = $(this).find('.moment__stat.views').html();
      let voices = $(this).find('.moment__stat.voices').html();
      let share = $(this).attr('data-video-sharing');
      t.showVideo(id, videoId, title, desc, views, voices, share);
      // t.checkVoiting();
    });
  },
  // checkVoiting: function (id) {
  //   let voiting = JSON.parse(localStorage.getItem('video-voited'));
  //   if (voiting === true) {
  //     $('.js-voite').addClass('disabled');
  //   }
  // },
  showVideo: function (id, videoId, title, desc, views, voices, share) {
    let mainVideo = $('.js-main-moment');
    let videoContainer = mainVideo.find('iframe');
    let videoTitle = mainVideo.find('.main-moment__title');
    let videoDesc = mainVideo.find('.main-moment__desc');
    let videoViews = mainVideo.find('.moment__stat.views');
    let videoVoices = mainVideo.find('.moment__stat.voices');
    let shareLinks = mainVideo.find('.social__link');
    let voiteBtn = mainVideo.find('.js-voite');
    mainVideo.addClass('active').removeClass('animated');
    shareLinks.map((i, item) => {
      $(item).attr('data-url', share);
    });
    setTimeout(_=>{
      mainVideo.addClass('animated');
    }, 200);
    videoContainer.attr('src', `https://www.youtube.com/embed/${videoId}`);
    videoTitle.html(title);
    videoDesc.html(desc);
    videoViews.html(views);
    videoVoices.html(voices);
    voiteBtn.attr('data-id', id);
    $('html, body').animate({
      scrollTop: $('.js-main-moment').offset().top - 100
    }, 600);
  },
  sortVideo: function (type, sorted) {
    console.log(sorted);
    if (sorted) {
      if (type === 'rating') {
        this.videoData.sort(function(a,b){
          return b.voices_count - a.voices_count;
        });
      } else {
        this.videoData.sort(function(a,b){
          return new Date(b.created_at) - new Date(a.created_at);
        });
      }
    } else {
      if (type === 'rating') {
        this.videoData.sort(function(a,b){
          return a.voices_count - b.voices_count;
        });
      } else {
        this.videoData.sort(function(a,b){
          return new Date(a.created_at) - new Date(b.created_at);
        });
      }
    }
    this.videoList.html('');
    this.init();
  }

  // voite: function (type, token) {
  //   let t = this;
  //   let url;
  //   let blockId = $(this.voiteBtn).attr('data-id');
  //   $(t.voiteBtn).addClass('loading');
  //   if (type === 'vk') {
  //     url = `/vote?token=${token}&video_id=${blockId}`;
  //   } else {
  //     url = `/vote_twitor?access_token=${token.oauth_token}&access_token_secret=${token.oauth_token_secret}&video_id=${blockId}`
  //   }
  //   $.get(url)
  //     .done(function( data ) {
  //       if (data.status) {
  //         $(t.voiteBtn).removeClass('loading').addClass('disabled');
  //         localStorage.setItem('video-voited', true);
  //         let count = parseInt($('.js-main-moment').find('.moment__stat.voices').html()) + 1;
  //         $('.js-main-moment').find('.moment__stat.voices').html(count);
  //       } else {
  //         alert(data.errorText);
  //         $(t.voiteBtn).removeClass('loading');
  //       }
  //     })
  //     .fail(function(xhr, status, error) {
  //       console.log(xhr, status);
  //     });
  // }
}

ACUVUE.mobileMenu = {
  init: function () {
    $('.js-show-menu').on('click', function () {
      $(this).toggleClass('active');
      $('.js-mobile-menu').toggleClass('active');
      $('.main').toggleClass('blured');
    });
    $('.header__btn').on('click', function () {
      $('.js-show-menu').removeClass('active');
      $('.js-mobile-menu').removeClass('active');
      $('.main').removeClass('blured');
    });
  }
}

ACUVUE.registerForm = {
  init: function () {
    let t = this;
    let form = $('.js-reg-form');

    jQuery.validator.addMethod("myEmail", function (value, element) {
        return this.optional(element) || (/^[a-zA-z0-9]+([-._][a-zA-z0-9]+)*@([a-zA-z0-9]+(-[a-zA-z0-9]+)*\.)+[a-zA-z]{2,4}$/.test(value) && /^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/.test(value));
    }, 'Пожалуйста введите корректный адрес');

    form.validate({
      rules: {
        email: {
          required: true,
          myEmail: true
        }
      },
      errorClass: "error",
      submitHandler: function(form) {
        t.submit(form);
        $(form).find('button').addClass('disabled');
      }
    });
  },
  submit: function (form) {
    $.post( "submit.php", {email: $(form).find("[name='email']").val()})
      .done(function( data ) {
        $('.js-success').addClass('show');
        $('.popup-form__btn').hide();
      })
      .fail(function(xhr, status, error) {
        $(form).find('button').removeClass('disabled');
        console.log(xhr, status);
      });
  }
}

ACUVUE.google = _ => {
  $('.ga-farm').on('click', _ => ga('send', 'pageview', '/click_farm_button.html'));
  $('.ga-free').on('click', _ => ga('send', 'pageview', '/click_get_free_buttton.html'));
  $('.ga-subs').on('click', _ => ga('send', 'pageview', '/click_subsribe.html'));
  $('.ga-subs').on('click', _ => _gaq.push(['_trackPageview', '/click_subsribe.html']));
}

ACUVUE.share = {
  sharingPopupShow: function sharingPopupShow(clickedElem) {
    var network = clickedElem.attr('data-name'),
        networkUrl = clickedElem.attr('data-link'),
        // pageUrl = window.location.origin,
        pageUrl = window.location.origin + '',
        shareUrl = clickedElem.attr('data-url'),
        shareImg = clickedElem.attr('data-img'),
        text,
        url = '';

    if (shareUrl) {
      text = $("meta[property='og:title']").attr('content');
    } else {
      text = $("meta[property='og:description']").attr('content');
    }

    if (network == 'vk') {
      if (shareUrl) {
        url = networkUrl + pageUrl + shareUrl + '&noparse=true';
      } else {
        url = networkUrl + pageUrl + '/&noparse=true';
      }
    }
    if (network == 'tw') {
      if (shareUrl) {
        pageUrl = text + ': ' + pageUrl + shareUrl;
        url = networkUrl + pageUrl;
      } else {
        pageUrl = text + ': ' + pageUrl;
        url = networkUrl + pageUrl;
      }
    } else if (network == 'fb') {
      if (shareUrl) {
        url = networkUrl + pageUrl + shareUrl;
      } else {
        url = networkUrl + pageUrl;
      }
    } else if (network == 'ok') {
      if (shareUrl) {
        url = networkUrl + pageUrl + shareUrl;
      } else {
        url = networkUrl + pageUrl;
      }
    }

    window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
  },

  init: function init() {
    let t = this;
    $('.js-share').on('click', function (e) {
      e.preventDefault();
      var clickedElem = $(this);
      t.sharingPopupShow(clickedElem);
    });
  }
};

ACUVUE.bubbleScroll = {
  bubbles: $('.bubble'),
  init: function () {
    let t = this;
    t.bubbles.map( (i, item) => {
      t.animation(item);
    });
  },
  animation: function (item) {
    let position = 0;
    let size = $(item).attr('data-size');
    let factor = {
      big: 1.4,
      mid: 1.2,
      little: 0.8
    }
    $(window).scroll( _ => {
      position = $(window).scrollTop() / 5 * factor[size];
      $(item).css({
        'transform': `translateY(-${position}px)`
      })
    });
  }
}

ACUVUE.yearAnimation = {
  init: function () {
    let t = this;

    // if (data.mobile) {
    //   t.scrollMobileMenu();
    // }
    t.scrollYear();
  },
  scrollYear: function () {
    let year = $('.js-float-year');
    let yearPos = year.offset().top;
    this.scrollEvents(year, yearPos)
  },
  scrollEvents: function (target, position) {
    $(window).scroll(function () {
      let screenPos = $(window).scrollTop();
      let lastYearPos = $('.js-last-year').offset().top;
      if (screenPos < lastYearPos - 200) {
        if (screenPos >= position - 200) {
          target.css({
            'position' : 'fixed',
            'top': 180 + 'px',
            'left': `${target.offset().left}px`
            // 'transform': `translateY(${screenPos - 80}px)`
          });
        }else{
          target.css({
            'position' : 'absolute',
            'top' : '60px',
            'left': '-100px'
          })
        }
      } else {
        target.css({
          'position': 'absolute',
          'left': '-100px',
          'top': (lastYearPos - 145) + 'px'
        });
      }
    });
  }
}

ACUVUE.titleAnimation = {
  init: function () {
    let titlesList = document.querySelectorAll('.js-blured-title');
    let shift = Math.floor(window.innerHeight - (window.innerHeight * 20 / 100));
    titlesList.forEach(title => {
      let position = $(title).offset().top;
      this.animate(title, shift);
    });
  },
  animate: function (title, shift) {
    $(window).scroll(function () {
      let screenPos = $(window).scrollTop();
      let position = $(title).offset().top;
        if (screenPos <= position - shift) {
          $(title).removeClass('show');
        }else{
          $(title).addClass('show');
        }
    });
  }
}

ACUVUE.timeline = {
  init: function () {
    let allDays = Math.floor((new Date("06/26/2018").getTime() - Date.now()) / 1000);
    let daysLeft = Math.floor(allDays / 60 / 60 / 24);
    let daysSpend = -(daysLeft - 7);
    let item = $('.timeline__col');
    for(let i = 0; i < daysSpend ; i++) {
      $(item[i]).addClass('active')
    }
  }
}

// ACUVUE.login = {
//   init: function (data) {
//     console.log(2342423);
//   },
//   checkLogin: function () {
//
//   },
//   login: function () {
//
//   }
// }




$(document).ready(function() {
    ACUVUE.titleAnimation.init();
    ACUVUE.detectMobile();
    if (window.location.pathname.length <= 2) {
      ACUVUE.blureMouse.init();
    }
    if (window.location.pathname === '/archive') {
      ACUVUE.indexVideo.init();
    }
    ACUVUE.popup.init();
    ACUVUE.scrollMenu.init();
    ACUVUE.timeline.init();
    if (window.location.pathname === '/history') {
      ACUVUE.yearAnimation.init();
    }
    ACUVUE.showHowWork.init();
    ACUVUE.parallax.init();
    // ACUVUE.counter.init();
    ACUVUE.rulesTabs.init();
    ACUVUE.loadedAnimation();
    ACUVUE.videoList.init();
    ACUVUE.mobileMenu.init();
    ACUVUE.registerForm.init();
    ACUVUE.google();
    ACUVUE.share.init();
    ACUVUE.bubbleScroll.init();
});
