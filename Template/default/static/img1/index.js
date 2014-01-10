jQuery.noConflict();

jQuery.ajaxSetup({
  url: "/xmlhttp/",
  global: false,
  cache: false,
  type: "POST",
  timeout:6000
});

// 首页视频类型
function GetHtml(div,url)
{
	jQuery.ajax({
	  url: url,
	  success: function(XMLHttpRequest){
		 // alert(XMLHttpRequest);
		var divhtml = XMLHttpRequest.replace(new RegExp(/document\.write\('/g),"").replace(new RegExp(/'\);/g),"");
		//alert(divhtml);
		jQuery("#"+div+"").html(divhtml);
	  },
	  beforeSend:function(){
		jQuery("#"+div+"").html("<div style=\"text-align:center;\"><img src='images/news/ajax-loader.gif'/></div>");
　　　　　　},
	  error:function(){
　　　　　　　//错误处理
		jQuery("#"+div+"").html("<div style=\"text-align:center;\">加载失败！<a href=\"#\" onclick=\"GetHtml('"+div+"',"+url+")\">点击重新加载</a></div>");
　　　　　　}
	}); 
}


jQuery(function(){
	//导航
  	jQuery(".nav ul[id*='tab']").hide();	
	/*********文字翻屏滚动***************/
	//new Marquee("topcenter",0,1,410,29,20,3500,4000,29);	
	///*********箭头控制滚动方向、加速及鼠标拖动***************/
	jQuery("div[id*='cptabfang']").hide();
	jQuery("#b1").css("background","#ffffff");
	jQuery("#b1").css("borderBottom","1px solid #ffffff");
	jQuery("#cptabfang1").show();
	
	var MarqueeDiv2Control=new Marquee("chanpinzhanshi1");		//箭头控制滚动方向、加速及鼠标拖动实例
	MarqueeDiv2Control.Direction="left";
	MarqueeDiv2Control.Step=1;
	MarqueeDiv2Control.Width=590;
	MarqueeDiv2Control.Height=121;
	MarqueeDiv2Control.Timer=20;
	MarqueeDiv2Control.ScrollStep=1;				//若为-1则禁止鼠标控制实例
	MarqueeDiv2Control.Start();
	jQuery("#LeftButton1").mouseover(function(){MarqueeDiv2Control.Direction=2});
	jQuery("#LeftButton1").mouseout(jQuery("#LeftButton1").mouseup(function(){MarqueeDiv2Control.Step=MarqueeDiv2Control.BakStep}));
	jQuery("#LeftButton1").mousedown(function(){MarqueeDiv2Control.Step=MarqueeDiv2Control.BakStep+3});
	jQuery("#RightButton1").mousedown(function(){MarqueeDiv2Control.Step=MarqueeDiv2Control.BakStep+3});
	jQuery("#RightButton1").mouseover(function(){MarqueeDiv2Control.Direction=3});
	jQuery("#RightButton1").mouseout(jQuery("#RightButton1").mouseup(function(){MarqueeDiv2Control.Step=MarqueeDiv2Control.BakStep}));
	
	var MarqueeDiv2Contro2=new Marquee("chanpinzhanshi2");		//箭头控制滚动方向、加速及鼠标拖动实例
	MarqueeDiv2Contro2.Direction="left";
	MarqueeDiv2Contro2.Step=1;
	MarqueeDiv2Contro2.Width=590;
	MarqueeDiv2Contro2.Height=121;
	MarqueeDiv2Contro2.Timer=20;
	MarqueeDiv2Contro2.ScrollStep=1;				//若为-1则禁止鼠标控制实例
	MarqueeDiv2Contro2.HiddenID="chanpinzhanshi2";
	MarqueeDiv2Contro2.Start();
	jQuery("#LeftButton2").mouseover(function(){MarqueeDiv2Contro2.Direction=2});
	jQuery("#LeftButton2").mouseout(jQuery("#LeftButton2").mouseup(function(){MarqueeDiv2Contro2.Step=MarqueeDiv2Contro2.BakStep}));
	jQuery("#LeftButton2").mousedown(function(){MarqueeDiv2Contro2.Step=MarqueeDiv2Contro2.BakStep+3});
	jQuery("#RightButton2").mousedown(function(){MarqueeDiv2Contro2.Step=MarqueeDiv2Contro2.BakStep+3});
	jQuery("#RightButton2").mouseover(function(){MarqueeDiv2Contro2.Direction=3});
	jQuery("#RightButton2").mouseout(jQuery("#RightButton2").mouseup(function(){MarqueeDiv2Contro2.Step=MarqueeDiv2Contro2.BakStep}));
	
	var MarqueeDiv2Contro3=new Marquee("chanpinzhanshi3");		//箭头控制滚动方向、加速及鼠标拖动实例
	MarqueeDiv2Contro3.Direction="left";	
	MarqueeDiv2Contro3.Step=1;
	MarqueeDiv2Contro3.Width = 590;
	MarqueeDiv2Contro3.Height = 121;
	MarqueeDiv2Contro3.Timer=20;
	MarqueeDiv2Contro3.ScrollStep=1;	//若为-1则禁止鼠标控制实例
	MarqueeDiv2Contro3.HiddenID="chanpinzhanshi3";
	MarqueeDiv2Contro3.Start();
	jQuery("#LeftButton3").mouseover(function(){MarqueeDiv2Contro3.Direction=2});
	jQuery("#LeftButton3").mouseout(jQuery("#LeftButton3").mouseup(function(){MarqueeDiv2Contro3.Step=MarqueeDiv2Contro3.BakStep}));
	jQuery("#LeftButton3").mousedown(function(){MarqueeDiv2Contro3.Step=MarqueeDiv2Contro3.BakStep+3});
	jQuery("#RightButton3").mousedown(function(){MarqueeDiv2Contro3.Step=MarqueeDiv2Contro3.BakStep+3});
	jQuery("#RightButton3").mouseover(function(){MarqueeDiv2Contro3.Direction=3});
	jQuery("#RightButton3").mouseout(jQuery("#RightButton3").mouseup(function(){MarqueeDiv2Contro3.Step=MarqueeDiv2Contro3.BakStep}));
	
	var MarqueeDiv2Contro4=new Marquee("chanpinzhanshi4");		//箭头控制滚动方向、加速及鼠标拖动实例
	MarqueeDiv2Contro4.Direction="left";
	MarqueeDiv2Contro4.Step=1;
	MarqueeDiv2Contro4.Width = 590;
	MarqueeDiv2Contro4.Height = 121;
	MarqueeDiv2Contro4.Timer=20;
	MarqueeDiv2Contro4.ScrollStep=1;	//若为-1则禁止鼠标控制实例
	MarqueeDiv2Contro4.HiddenID="chanpinzhanshi4";
	MarqueeDiv2Contro4.Start();
	jQuery("#LeftButton4").mouseover(function(){MarqueeDiv2Contro4.Direction=2});
	jQuery("#LeftButton4").mouseout(jQuery("#LeftButton4").mouseup(function(){MarqueeDiv2Contro4.Step=MarqueeDiv2Contro4.BakStep}));
	jQuery("#LeftButton4").mousedown(function(){MarqueeDiv2Contro4.Step=MarqueeDiv2Contro4.BakStep+3});
	jQuery("#RightButton4").mousedown(function(){MarqueeDiv2Contro4.Step=MarqueeDiv2Contro4.BakStep+3});
	jQuery("#RightButton4").mouseover(function(){MarqueeDiv2Contro4.Direction=3});
	jQuery("#RightButton4").mouseout(jQuery("#RightButton4").mouseup(function(){MarqueeDiv2Contro4.Step=MarqueeDiv2Contro4.BakStep}));
});

	//导航
function tab(x){
	jQuery(".nav ul[id*='tab']").hide();
	jQuery("#tab"+x).show();
}

//产品
function tab1(x){
		jQuery("div[id*='cptabfang']").hide();
		jQuery(".tabzuo li a[id*='b']").css("background","");
		jQuery(".tabzuo li a[id*='b']").css("borderBottom","1px solid #C5CBD9");
		jQuery("#cptabfang"+x).show();
		jQuery("#b"+x).css("background","#ffffff");
		jQuery("#b"+x).css("borderBottom","1px solid #ffffff");
}
	