// JavaScript Document
$(function(){
//导航中第一个分隔线去掉
	$("nav.list a:first").css("background","none");
//banner切换
	//初始化效果banner		
		$("#banner dl:gt(0)").find("img").hide();
		$("#banner dl").find("dd").hide();
		var num=$("#banner dl").size();
		var i;
		for(i=1;i<=num;i++){
			$("#banner p").append("<span></span>");	
		}	
		$("#banner p span").eq(0).addClass("current");
		//经过页码进行切换
		$("#banner p span").mouseover(function(){
			$(this).addClass("current").siblings().removeClass("current");
			var index=$(this).index();
			$("#banner dl").eq(index).find("img").stop().fadeIn().parents("dl").siblings("dl").find("img").hide();	
		});
		//自动切换
		auto=setInterval(function(){
			var next;
			var now=$(".current").index();
			if((now+1)<num){
				next=now+1;
			}else{
				next=0;
			}
			$("#banner p span").eq(next).trigger("mouseover");
		},2500);
		//鼠标经过图片停止切换
		$("#banner dl").mouseover(function(){
			clearInterval(auto);
		}).mouseout(function(){
			auto=setInterval(function(){
			var next;
			var now=$(".current").index();
			if((now+1)<num){
				next=now+1;
			}else{
				next=0;
			}
			$("#banner p span").eq(next).trigger("mouseover");
		},2500);	
		});
		$("#banner p span").hide();
	//banner上文字显示
		$("dl.ban").mouseover(function(){
			$(this).find("dd").stop().slideDown(100);	
		}).mouseout(function(){
			$(this).find("dd").stop().slideUp(100);	
		});
//form表单
	$(".log:eq(1)").hide();	
	$(".tit span:eq(1)").addClass("curr");
	$(".tit span").mouseover(function(){
		$(this).removeClass("curr").siblings("span").addClass("curr");
		var index=$(this).index();
		$(".log").eq(index).show().siblings(".log").hide();
	});
//新闻选项卡
	$(".admin:gt(0)").hide();
	$("p.tab span:eq(0)").addClass("select");
	$(".tab span").click(function(){
		$(this).addClass("select").siblings().removeClass("select");
		var index=$(this).index();
		$(".admin").eq(index).show().siblings(".admin").hide();	
	});	
//鼠标经过新闻
	$(".admin li a").hover(function(){
		$(this).addClass("color");	
	},function(){
		$(this).removeClass("color");
	});
//企业招聘鼠标经过
	$(".bring li").each(function(){
		$(this).find("a:first").addClass("orange");
	});	
//推荐企业专区鼠标经过
	$("dl.firm").hover(function(){
		$(this).addClass("hover");	
	},function(){
		$(this).removeClass("hover");
	});
	//第1个第4个间距
		$("dl.firm:eq(0),dl.firm:eq(3)").addClass("gap");
		$("dl.firm:eq(2),dl.firm:eq(5)").addClass("gaps");
//合作单位
	$("dl.join").hover(function(){
		$(this).addClass("hover");	
	},function(){
		$(this).removeClass("hover");
	});
	//间距调整
		$("dl.join:eq(0),dl.join:eq(6)").addClass("gap");
		$("dl.join:eq(5),dl.join:eq(11)").addClass("gaps");	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
});