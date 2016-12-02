$(document).ready(function () {  
	$("#Button1").click(function()
	{  
		search_location();
	});
}) 
// 企业弹窗
function showDiv(obj){
	if($(obj).attr("class")=="current1"){
		$(obj).removeClass();
	}
	else{
		$(obj).addClass("current1");
		$(obj).find(".shade").height($(obj).find(".area").height()+80)
	}
}
function showDiv1(obj){
	if($(obj).attr("class")=="current1"){
		$(obj).removeClass();
	}
	else{
		$(obj).addClass("current1");
		$(obj).find(".shade").height($(obj).find(".area").height())
	}
}
function showDiv2(obj){
	if($(obj).attr("class")=="current1"){
		$(obj).removeClass();
	}
	else{
		$(obj).addClass("current1");
		$(obj).find(".shade").height($(obj).find(".area").height()+60)
	}
}

//顶部搜索
function search_tab(n){
	$("#tsearch-tab li").removeClass("current");
	$("#tsearch-tab li").eq(n).addClass("current");
	$("#text1").removeClass();
	if($("#text1").val()==""||$("#text1").val()=="null"){
	if(n==0){
		$("#text1").addClass("s0")
	}
	if(n==1){
		$("#text1").addClass("s1")
	}
	if(n==2){
		$("#text1").addClass("s2")
	}}
}

	
$(document).ready(function() {
//顶部搜索判断
	if($("#text1").val()!=""){$("#text1").removeClass()};
	$("#text1").bind({
		blur:function(){
			if($("#text1").val()==""){$(this).addClass("s0")}
		}
	});

	//浮动跟随DIV //未使用
	 //$("#float").scrollFollow({offset:120,relativeTo:"bottom"}); 
	
	//灰色提示文字背景
	$(".ipt_active").each(function(){
		//判断是否有值 
		if($(this).val() != ""){
				//alert($(this).val())
				$(this).removeClass("active")
			}
	}).bind({
		keydown:function(){$(this).removeClass("active")},
		blur:function(){
			if($(this).val() == ""){
				$(this).addClass("active")
			}
		}
	});

	//职位类别划过显示
	$("#jobtype-silde-ul li").hover(
		function(){$(this).addClass("list-active").find(".list-class").show()},
		function(){$(this).removeClass("list-active").find(".list-class").hide()}
	);
	
	//底部搜索类别切换
	//$(".f-input").hide().eq(0).show();  //3个input隐藏 显示第一个
	
	$("#ftChoose").bind({  //鼠标经过显示隐藏
		mousemove:function(){$("#ftChoosePop").show()},
		mouseleave:function(){$("#ftChoosePop").hide()}
	});
	$("#ftChoosePop a").click(function(){  //点击切换对应input
		$("#ftChoosePop").hide();
		$("#ftChoose span").text($(this).text());
	});
	
});
//回顶部
function b(){
	//h = $(window).height();
	//h 离开页面顶部距离
	h = 150;
	t = $(document).scrollTop();
	if(t > h){
		$('.gotop').show();
	}else{
		$('.gotop').hide();
	}
}
$(document).ready(function(e) {
	b();
	$('.gotop').click(function(){
		$(document).scrollTop(0);	
	})
});

$(window).scroll(function(e){
	b();		
})
//幻灯片
$(function(){
     var len  = $(".num > li").length;
	 var index = 0;
	 var adTimer;

	 $(".num li").mouseover(function(){
		index  =   $(".num li").index(this);
		showImg(index);
	 }).eq(0).mouseover();	

	 $('.fad').hover(function(){
			 clearInterval(adTimer);
		 },function(){
			 adTimer = setInterval(function(){
			    index++;
				if(index==len){index=0;}
				showImg(index);	
			  } , 3000);
	 }).trigger("mouseleave");
})

function showImg(index){
		
        var adHeight = $(".fad").height();
		 $(".slider img").hide().eq(index).fadeIn(500);
		$(".num li").removeClass("on").eq(index).addClass("on");

		
}
function director(uri){ var url = uri && uri != '' ? uri : window.location.href;
			url = url.replace(/&amp;/ig, '&');
		    window.location.href = url;
		}
jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') {
        options = options || {};
        if (value === null) {
            value = '';
            options = $.extend({},
            options);
            options.expires = -1;
			
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString();
        }
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure': '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
		//alert(domain)
    } else {
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};
    function search_location()
	{
		$("body").append('<div id="pageloadingbox">页面加载中....</div><div id="pageloadingbg"></div>');
		$("#pageloadingbg").css("opacity", 0.5);
	 	var patrn=/^(请输入)/i; 
		var key=$("#keys").val(); 
		var keytype=$("#keytypes").val();
		if (patrn.exec(key))
		{
		$("#keywords").val('');
		key='';
		} 
		var searchtype=""; 
		switch(keytype)
		{
			case '1':searchtype="QS_jobslist";break; 
			case '3':searchtype="QS_resumelist";break;
		}  
		$.get("/plus/ajax_search_location.php", {"act":searchtype,"key":key,"page":1},
	function (data,textStatus)
			 {
				 window.location.href=data;
			 }
		);
	} 
//搜索器
	$(".sch-box").click(function(){
		$(this).addClass("sch-box-active");
		$(".drop-box").show().bind({
			mouseleave:function(){
				$(this).hide();
				$(".sch-box").removeClass("sch-box-active");
			}
		})
	});
	
//筛选器搜索下拉
	$(".lChoose").hover(
		function(){
			$(".lChoosePop").show();
			$(".lChoosePop a").click(function(){
				$(".lChoosePop a").first().text($(this).text());
				$(".lChoose span").text($(this).text());
				$(".lChoosePop").hide();
			})
		},
		function(){
			$(".lChoosePop").hide();
		}
	);