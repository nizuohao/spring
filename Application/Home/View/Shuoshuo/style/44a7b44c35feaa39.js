
    Do(function() {
        var perPage = $('.board-paginator').data('count');

        $('.js-board-page').click(function() {
            var $this = $(this),
                action = $this.data('action'),
                $currentBoards = $this.closest('.mod')
                    .find('.board-list-item:visible'),
                $allBoards, $nextBoards;

            if (action === 'prev') {
                $allBoards = $currentBoards.first().prevAll();
            } else {
                $allBoards = $currentBoards.last().nextAll();
            }

            $nextBoards = $allBoards.slice(0, perPage);

            if ($nextBoards.length) {
                $nextBoards.removeClass('hide');
                $currentBoards.addClass('hide');
                $this.siblings().removeClass('disable');
            }

            if ($allBoards.length <= perPage) {
                $this.addClass('disable');
            }
        });
    });


;(function() {
  var mask;
  var popup;
  var current = '';
  var init_popup = function() {
    mask = $('<div class="popup-reg-mask"></div>').appendTo('body');
    mask.css('height', $(document).height());
    popup = $('#g-popup-reg');
    popup.find('.lnk-close').click(function(e) {
        e.preventDefault();
        popup.hide();
        mask.hide();
    });

    if ($.browser.msie && ($.browser.version|0) === 6) {
        var win = $(window).scroll((function() {
            var timer;
            var doc = document.body;
            return function() {
                if (timer) {
                    window.clearTimeout(timer);
                }
                timer = window.setTimeout(function() {
                    popup.css({
                      top: (doc.scrollTop + win.height()/2 - popup.height()/2) + 'px'
                    });
                }, 20);
            };
        })()).trigger('scroll');
    }
  };

  var show_popup = function() {
    if (popup) {
      popup.show();
      mask.show();
    } else {
      $('#g-popup-reg').show();
      init_popup();
    }
  };

  Douban.init_show_register = function (e) {
    var node = $(e);
    node.click(function(e) {
      e.preventDefault();
      show_popup();
      if (current !== 'register') {
        popup.find('iframe').attr('src', reg_url);
      }
      current = 'register';
    });
  };

  Douban.init_show_login = function (e) {
    var node = $(e);
    node.click(function(e) {
      e.preventDefault();
      show_popup();
      if (current !== 'login') {
        popup.find('iframe').attr('src', login_url);
      }
      current = 'login';
    });
  };
})();

$(function() {
  var $landingBar = $('#landing-bar');
  var popup_mark = 'g_reg';
  // 有些页面会自动弹注册框
  if (
  'selenium_main_app_window' === window.name ||
  window.POPUP_REG && !window.name) {
      $('#landing-bar').show();
      $('#wrapper').addClass('landing');
  }
  $landingBar.delegate('a', 'click', function(e) {
      // 第三方登录不处理，其他隐藏landing bar
      if ($(this).parent().is('.item')) {
          return;
      }

      e.preventDefault();
      $landingBar.hide();
      if (window.POPUP_REG) {
        window.name = window.name || popup_mark;
      }
  });
});
