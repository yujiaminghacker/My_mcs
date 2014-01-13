$(function(){ 
// 翻页窗
 var box=$(".max_box_1");
 var lili=$(".s_adv dt");
lili.mouseover(function(){
	$(this).stop();
	var cur=$(this).index();//alert(cur);
	var left=-(cur*682);
	box.animate({left:left},400);
})

// <!-- 新品推荐 -->
var tuijian=$(".donghua2");
var dian =$(".Fang_");
dian.click(function(){
 	var Dian=$(this).index;
 	alert(Dian);
})
})	