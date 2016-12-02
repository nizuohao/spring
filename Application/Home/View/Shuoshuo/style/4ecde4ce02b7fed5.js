




$(function(){
    $("#joingroupbtn").click(function(){
        url = "/j/group/" + $(this).attr("name") + "/join";
        $.post_withck(url, {},
            function(sjson){
                var ret = eval("(" + sjson + ")");
                $("#joingroupbtn").hide();
                if (ret.result=="toomany"){
                    $("#replysect").html('<p class="attn" align="right">你已经加入了500个小组，无法再加入更多小组。</p>');
                }else{
                    $("#replysect").html('<br/><h2>你现在加入了这个小组，可以发表回应　· · · · · ·　</h2><div class="txd"><form name="comment_form" method="post" action="add_comment"><textarea name="rv_comment" rows="8" cols="54"></textarea><br/><input type="hidden" name="start" value="0"/><span class="bn-flat-hot rr"><input type="submit" value="加上去"/></span><span><label class="pl share-label share-shuo"><input type="checkbox" name="sync_to_mb"/>推荐到广播 </label> </span></form></div>');
                }
            });
        return false;
    });

    $("body").delegate(".topic-doc", 'mouseenter mouseleave', function (e) {
        var target = $('.topic-report a');
        switch (e.type) {
        case "mouseenter":
            target.show();
            break;
        case "mouseleave":
            target.hide();
            break;
        }
    });

    $(".topic-reply li").bind('mouseenter mouseleave click', function (e) {
        var comment_user_id = $(this).find(".operation_div").attr("id"),
        can_delete = 0,
        can_report = 0;
        switch (e.type) {
        case "mouseenter":
            $(this).find(".operation-more").show();
            break;
        case "mouseleave":
            $(this).find(".operation-more").hide();
            break;
        case "click":
            tar = $(e.target);
            if (tar.hasClass("lnk-report")) {
                e.preventDefault();
                var TXT_CFM_WARN = "确定要举报这条垃圾广告吗？",
                    id = tar.data("id"),
                    type = tar.data("type");

                var result = confirm(TXT_CFM_WARN);

                if (result) {
                    $.post_withck(
                        "/j/misc/report_ad",
                        {
                            id: id,
                            type: type
                        }
                    );
                }
            }
            break;
        }
    });


    $('body').delegate('.reply-comment .lnk-close', 'click', function(e){
      e.preventDefault();
      $(this).parent().remove();
    });

});


Do(function(){
  var cookieCfg={key:"ap",cookie:"1"},$doubanTip=$("#doubanapp-tip"),data={};function hideDoubanTip(){if(!$doubanTip.length){return}$doubanTip.hide();data[cookieCfg.key]=cookieCfg.cookie;set_cookie(data)}$doubanTip.delegate("a","click",hideDoubanTip);if(!get_cookie(cookieCfg.key)){$doubanTip.show()}var popup;var nav=$("#db-global-nav");var more=nav.find(".bn-more");function handleShowMoreActive(c){var a=$(c.currentTarget);var b=a.parent();hideDoubanTip();if(popup){popup.parent().removeClass("more-active");if($.contains(b[0],popup[0])){popup=null;return}}b.addClass("more-active");popup=b.find(".more-items");popup.trigger("moreitem:show")}nav.delegate(".bn-more, .top-nav-reminder .lnk-remind","click",function(a){a.preventDefault();handleShowMoreActive(a);return}).delegate(".lnk-doubanapp","mouseenter",function(b){var a=$(this);if(!a.parent().hasClass("more-active")){handleShowMoreActive(b)}}).delegate(".top-nav-doubanapp","mouseleave",function(){var b=$(this);var a=b.find(".lnk-doubanapp");if(popup){b.removeClass("more-active");if($.contains(b[0],popup[0])){popup=null}}});$(document).click(function(a){if($(a.target).closest(".more-items").length||$(a.target).closest(".more-active").length){return}if(popup){popup.parent().removeClass("more-active");popup=null}});
});

        (function(b,a){b.fn.fixSide=function(d,k){var h=/ipod|iphone|ipad|android|blackberry|mobile|webos|windows phone/i.test(navigator.userAgent),l="",f="",g="",c="",i="",j="",e="";if(b.browser.ie&&b.browser.version|0<7||h){return}l=b(a).height();f=b("#content .aside");g=f[0];c=g.clientHeight;i=b("#content")[0];j=b("#content .article");e=g.clientHeight>l?true:false;a.addEventListener("load",function(){c=g.clientHeight;i=b("#content")[0];e=g.clientHeight>=l?true:false});b(a).bind("scroll",function(){var n=j.offset().left+(i.clientWidth-g.clientWidth),m=i.getBoundingClientRect().top;if(e){if(m<0&&Math.abs(m)+l-d>c){f.css({position:"fixed",left:n+"px",bottom:d+"px"})}else{if(Math.abs(m)+l-d<c){f.css({position:"static"})}}}else{if(m<0){f.css({position:"fixed",left:n+"px",top:k+"px"})}else{f.css({position:"static"})}}});b(a).bind("resize",function(n){var m=j.offset().left+(i.clientWidth-g.clientWidth);f.css({left:m+"px"})})}})(jQuery,window);;
    
        $(window).bind('load', function(){
            $().fixSide(200, 52);
        });
    
Do(function() {

var addSimpleTooltip = function(selector, link){
  // only display to logged user
  if (!get_cookie('ck')) return;

  var delayTime = 85;
  var delayTimer = false;

  var hideClassName = 'doulist-tooltip-hide';
  var $tooltip = $('<div class="doulist-add-tooltip">' + link + '<div class="arrow"></div></div>');
  var $btn = $tooltip.find('a');

  $tooltip.addClass(hideClassName);
  $tooltip.appendTo($('body'));

  var delayHideHandler = function(e){
    delayTimer = setTimeout(function(){
        $tooltip.addClass(hideClassName);
    }, delayTime)
  }

  $(selector).mouseenter(function(e){
    var $link = $(this);
    $tooltip.css({
      top: $link.position().top - 28,
      left: e.pageX - 42
    })
    $btn.data('url', $link.attr('href'));

    clearTimeout(delayTimer);
    $tooltip.removeClass(hideClassName);
  }).mouseleave(delayHideHandler);

  $tooltip
    .mouseenter(function(){
    clearTimeout(delayTimer);
    })
    .mouseleave(delayHideHandler)
}

function initPrestoStat(presto_selector, stat_selector) {
  var container = $(presto_selector);
  var presto_words = container.html();
  if (presto_words) {
    var stat_num = $(stat_selector).html();
    if (stat_num) {
      stat_num = parseInt(stat_num);
      var presto_stat_num = parseInt(container.data('count'));
      stat_num = stat_num + presto_stat_num;
      $(stat_selector).html(stat_num + "人");
      addSimpleTooltip(stat_selector, presto_words);
    }
  }
}

initPrestoStat('.presto-like-words', '.fav-num a');
initPrestoStat('.presto-rec-words', '.rec-sec .rec-num');

});
