(function(d){d.fn.bgiframe=(d.browser.msie&&/msie 6\.0/i.test(navigator.userAgent)?function(a){a=d.extend({top:"auto",left:"auto",width:"auto",height:"auto",opacity:true,src:"javascript:false;"},a);var b='<iframe class="bgiframe"frameborder="0"tabindex="-1"src="'+a.src+'"style="display:block;position:absolute;z-index:-1;'+(a.opacity!==false?"filter:Alpha(Opacity='0');":"")+"top:"+(a.top=="auto"?"expression(((parseInt(this.parentNode.currentStyle.borderTopWidth)||0)*-1)+'px')":c(a.top))+";left:"+(a.left=="auto"?"expression(((parseInt(this.parentNode.currentStyle.borderLeftWidth)||0)*-1)+'px')":c(a.left))+";width:"+(a.width=="auto"?"expression(this.parentNode.offsetWidth+'px')":c(a.width))+";height:"+(a.height=="auto"?"expression(this.parentNode.offsetHeight+'px')":c(a.height))+';"/>';return this.each(function(){if(d(this).children("iframe.bgiframe").length===0){this.insertBefore(document.createElement(b),this.firstChild)}})}:function(){return this});d.fn.bgIframe=d.fn.bgiframe;function c(a){return a&&a.constructor===Number?a+"px":a}})(jQuery);(function(a){a.extend({documentMask:function(b){var c=a.extend({opacity:0.3,z:50,bgcolor:"#000"},b);a('<div class="jquery_addmask">&nbsp;</div>').appendTo(document.body).css({position:"absolute",top:"0px",left:"0px","z-index":c.z,width:document.documentElement.clientWidth,height:a(document).height(),"background-color":c.bgcolor,opacity:c.opacity}).show().click(function(){}).bgiframe();return this}})})(jQuery);$(function(){if(!document.getElementById("j-cart-btn")){return false}(function(){function a(){$.ajax({url:"/products/get_shop_cart_num",dataType:"json",cache:false,success:function(b){if(b.status=="success"){if(b.total=="0"){$("#j-cart-total").hide()}else{if(b.total>=10){$("#j-cart-total").show();$("#j-cart-total").text("N")}else{$("#j-cart-total").show();$("#j-cart-total").text(b.total)}}}}})}setInterval(a,60000)})();$("#j-cart-btn").click(function(){$.documentMask();var b=($(window).height()-$("#j-overlay-mycart").height())/2+document.documentElement.scrollTop+document.body.scrollTop;
if(b<0){b=0}$('<div id="j-overlay-mycart" class="overlay-mycart" style="top:'+b+'px;"><div class="clearfix hd"><h2>我的购物车</h2><a id="j-close-btn" class="close" href="javascript:void(0);" title="关闭">关闭</a></div><div id="overlay-box" class="box"><div class="loading-tips">Loading</div></div></div>').appendTo(document.body);$("#j-close-btn").click(function(){var d=$("#j-overlay-mycart");var c=d.prev();d.remove();c.remove()});var a=$(this).attr("j_url");$.ajax({type:"POST",url:a,cache:false,dataType:"text",success:function(d){$("#overlay-box").html(d);var c=function(){$("#ipt-checkall").click(function(){if($(this).is(":checked")){$("#j-cart-table").find("input.i-check").attr("checked",true)}else{$("#j-cart-table").find("input.i-check").attr("checked",false)}});var e=function(){var f=$("#j-cart-container").find("input.i-check").length;$("#j-total-count").text(f)};$("#j-delete-check").click(function(){$("#j-overlay-tip").remove();var h=$(this).parent();$('<div id="j-overlay-tip" class="overlay-tip"><a title="关闭" href="javascript:void(0);" class="close">关闭</a><em>.</em><div class="clearfix tip-box"><p>您确定要删除么？</p><div class="clearfix btn"><a class="confirm-btn" href="javascript:void(0);" title="确定">确定</a><a class="cancel-btn" href="javascript:void(0);" title="取消">取消</a></div></div></div>').appendTo(h);$("#j-overlay-tip").addClass("overlay-tip-above");var j=$("#j-cart-form").find("input.i-check:checked").length;var g="";var f=$("#j-cart-form").attr("j_url");for(i=0;i<j;i++){g+=$("#j-cart-form").find("input.i-check:checked").eq(i).val()+","}$("#j-overlay-tip a.confirm-btn").click(function(){$.ajax({type:"post",url:f,data:"data[id]="+g,dataType:"json",success:function(k){if(k.status=="success"){for(i=0;i<j;i++){var l=$("#j-cart-form").find("input.i-check:checked").eq(i).parents("tr.row");l.delay(400).fadeOut("slow",function(){var m=$("#j-total-btn");$(this).remove();$("#j-cart-table").find("div.display").removeClass("display");m.html(k.total);e()})}$("#j-overlay-tip").remove();if(k.empty=="true"){$("#j-cart-form").find("div:first").nextAll().remove();
$("#j-cart-form").append('<div class="no-data"><p>您的购物车还是空的哦，<a href="/products/" title="赶紧行动">赶紧行动</a>吧！</p></div><div class="clearfix ft"><div class="f2"><a class="operate-btn orange-btn-1" href="/products" title="继续购物">继续购物</a></div></div>')}}}});return false});$("#j-overlay-tip a.close, #j-overlay-tip a.cancel-btn").click(function(){$("#j-overlay-tip").remove();$("#j-cart-table").find("div.display").removeClass("display")})});$("#j-cart-table a.delete-link").click(function(){$("#j-overlay-tip").remove();var h=$(this).parent();$('<div id="j-overlay-tip" class="overlay-tip"><a title="关闭" href="javascript:void(0);" class="close">关闭</a><em>.</em><div class="clearfix tip-box"><p>您确定要删除么？</p><div class="clearfix btn"><a class="confirm-btn" href="javascript:void(0);" title="确定">确定</a><a class="cancel-btn" href="javascript:void(0);" title="取消">取消</a></div></div></div>').appendTo(h);var j=$(this).parents("tr.row");var g=j.find("input.i-check").val();var f=$(this).attr("j_url");j.next().find("div.b-center").addClass("display");$("#j-overlay-tip a.confirm-btn").click(function(){$.ajax({type:"post",url:f,data:"data[id]="+g,dataType:"json",success:function(k){if(k.status=="success"){j.delay(400).fadeOut("slow",function(){var l=$("#j-total-btn");$(this).remove();$("#j-cart-table").find("div.display").removeClass("display");l.html(k.total);e()});if(k.empty=="true"){$("#j-cart-form").find("div:first").nextAll().remove();$("#j-cart-form").append('<div class="no-data"><p>您的购物车还是空的哦，<a href="/products/" title="赶紧行动">赶紧行动</a>吧！</p></div><div class="clearfix ft"><div class="f2"><a class="operate-btn orange-btn-1" href="/products/" title="继续购物">继续购物</a></div></div>')}}}});return false});$("#j-overlay-tip a.close, #j-overlay-tip a.cancel-btn").click(function(){$("#j-overlay-tip").remove();$("#j-cart-table").find("div.display").removeClass("display")})});$("#j-cart-table input.text-box").keyup(function(){var f=$(this).val();$(this).val(f.replace(/[^0-9]/g,""));if(Number(f)<1||$.trim(f)==""){$(this).val(1)}}).blur(function(){var h=$("#j-cart-form").attr("j_price");
var j=$(this).parents("tr.row");var g=j.find("input.i-check").val();var f=Number($(this).val());if(f==""){$(this).val(1)}$.ajax({type:"post",url:h,type:"post",data:"data[id]="+g+"&data[val]="+f,dataType:"json",success:function(k){if(k.status=="success"){var m=j.find("strong.count");var l=$("#j-total-btn");m.html(k.amount);l.html(k.total);$("#j-total-count").html(k.count)}else{alert(k.msg)}}});return false});$("#j-cart-table span.handler a").click(function(){var g=$(this).parent().parent().find("input.text-box");var f=g.val();if($(this).is(".up")){f++}else{f--}if(f<1){f=1}g.val(f).blur()});$("#j-cart-form").live("submit",function(){var h="";var j="";var k=$("#j-cart-form").find("tr.row").length;for(i=0;i<k;i++){h+=$("#j-cart-form").find("input.i-check").eq(i).val()+",";j+=$("#j-cart-form").find("input.text-box").eq(i).val()+","}var f=$(this).attr("action");var g=(typeof f==="string")?$.trim(f):"";g=g||window.location.href||"";if(g){g=(g.match(/^([^#]+)/)||[])[1]}$.ajax({type:$(this).attr("method"),url:g,data:"data[id]="+h+"&data[amount]="+j,dataType:"json",success:function(l){if(l.status=="success"){$.ajax({type:"post",url:l.url,dataType:"text",success:function(n){$("#overlay-box").html(n);var o=(function(){$("#j-back-btn").click(function(){var p=$(this).attr("j_url");$.ajax({url:p,dataType:"text",success:function(q){$("#overlay-box").html(q);c()}})});$("#j-address-form").submit(function(){var r=$(this).find("input.required,select.required,textarea.required");for(var u=0;u<r.length;u++){if(r.eq(u).val()==""||r.eq(u).val()==null){alert(langs.form.error_uncomplete);r.eq(u).focus();return false}}var t=$(this).find("blockquote.error");if(t.length>1||(t.length==1&&!t.parent().is(".row-submit"))){alert(langs.form.error_wrong);return false}var q=[];var u=0;$(this).find('input[name!=""]').each(function(){if(this.disabled||(this.checked==false&&(this.type=="checkbox"||this.type=="radio"))){}else{q[u++]=this.name+"="+$(this).val()}});$(this).find('select[name!=""]').each(function(){q[u++]=this.name+"="+$(this).val()});$(this).find('textarea[name!=""]').each(function(){q[u++]=this.name+"="+$(this).val()
});var v=q.join("&");var w=$(this).attr("method");var p=$(this).attr("action");var s=(typeof p==="string")?$.trim(p):"";s=s||window.location.href||"";if(s){s=(s.match(/^([^#]+)/)||[])[1]}$.ajax({type:w,url:s,data:v,dataType:"json",success:function(x){if(x.status=="success"){$.ajax({type:"post",url:x.url,dataType:"text",success:function(z){$("#overlay-box").html(z);var y=(function(){$("#j-back-btn").click(function(){var A=$(this).attr("j_url");$.ajax({url:A,dataType:"text",success:function(B){$("#overlay-box").html(B);o()}})});$("#j-modify-btn").click(function(){$("#j-back-btn").click()});$(".table-list select").change(function(){var C=$(this).parent().next().find("strong");var B=parseFloat(C.attr("rel"));C.html(B+parseFloat($(this).val()));var A=0;$(".table-list select").each(function(){A+=parseFloat($(this).val())});$("#logistics_fee").html(A);$("#all_need_pay").html(A+parseFloat($("#all_price").html()))});$("#j-order-btn").click(function(){var A=$(this).attr("j_url");var B="";$("#j-cart-container select").each(function(){B+=($(this).attr("name")+"="+$(this).val()+"|"+$(this).attr("rel")+"|"+$(this).find("option:selected").attr("data")+"&")});$.ajax({type:"post",url:A,dataType:"json",data:B,success:function(C){if(C.status=="success"){if(C.pay=="false"){$.documentMask();$("div.jquery_addmask").css("z-index","52");var D=($(window).height()-$("#j-overlay-tips").height())/2+document.documentElement.scrollTop+document.body.scrollTop;if(D<0){D=0}$('<div id="j-overlay-tips" class="overlay-tips" style="top:'+D+'px;"><div class="content-success"><p class="tips-title">订单提交成功，请等待我们客服跟您联系！</p><div class="operate"><a class="orange-btn" href="/orders/myorders" title="确定">确 定</a></div></div></div>').appendTo(document.body)}else{if(C.pay=="true"){$.ajax({url:C.url,dataType:"text",success:function(E){$("#overlay-box").html(E);$("#j-back-btn").click(function(){var F=$(this).attr("j_url");$.ajax({url:F,dataType:"text",success:function(G){$("#overlay-box").html(G);y()}})});$("#j-pay-form").submit(function(){$.documentMask();$("div.jquery_addmask").css("z-index","52");
var G=($(window).height()-$("#j-overlay-tips").height())/2+document.documentElement.scrollTop+document.body.scrollTop;if(G<0){G=0}if($("#pay-money").is(":checked")){var F=$(this).attr("action");$.ajax({type:"post",url:F,dataType:"json",data:"data[pay]=0",cache:false,success:function(H){if(H.status=="success"){$('<div id="j-overlay-tips" class="overlay-tips" style="top:'+G+'px;"><div class="content-success"><p class="tips-title">订单提交成功，请等待我们客服跟您联系！</p><div class="operate"><a class="orange-btn" href="/orders/myorders" title="确定">确 定</a></div></div></div>').appendTo(document.body)}}});return false}else{$('<div id="j-overlay-tips" class="overlay-tips" style="top:'+G+'px;"><div class="content-warning"><p class="tips-title">付款完成前请不要关闭此窗口！</p><p class="large">完成付款后请根据你的情况点击下面的按钮：</p><p class="orange">(请在新开网页上，完成付款后，再选择)</p><div class="operate"><a class="grey-btn" href="/orders/myorders" title="已完成付款">已完成付款</a><a id="j-rechoose-btn" class="orange-btn" href="javascript:void(0);" title="重新选择付款">重新选择付款</a></div></div></div>').appendTo(document.body)}});$("#j-rechoose-btn").live("click",function(){var G=$(this).parents("#j-overlay-tips");var F=G.prev();G.remove();F.remove();$("div.jquery_addmask").css("z-index","50")})}})}}}}})})});y()}});return false}}});return false})});o();var m=(function(){if(!document.getElementById("j-login-form")){return false}$("#j-reg-btn").click(function(){var p=$(this).attr("j_url");$.ajax({type:"post",url:p,dataType:"text",success:function(q){$("#overlay-box").html(q);$("#j-login-btn").click(function(){var r=$(this).attr("j_url");$.ajax({type:"post",url:r,dataType:"text",success:function(s){$("#overlay-box").html(s);m()}});return false});$("#j-reg-form").submit(function(){var t=$(this).find("input.required,select.required,textarea.required");for(var w=0;w<t.length;w++){if(t.eq(w).val()==""||t.eq(w).val()==null){alert(langs.form.error_uncomplete);t.eq(w).focus();return false}}var v=$(this).find("blockquote.error");if(v.length>1||(v.length==1&&!v.parent().is(".row-submit"))){alert(langs.form.error_wrong);
return false}var s=[];var w=0;$(this).find('input[name!=""]').each(function(){if(this.disabled||(this.checked==false&&(this.type=="checkbox"||this.type=="radio"))){}else{s[w++]=this.name+"="+$(this).val()}});$(this).find('select[name!=""]').each(function(){s[w++]=this.name+"="+$(this).val()});$(this).find('textarea[name!=""]').each(function(){s[w++]=this.name+"="+$(this).val()});var x=s.join("&");var y=$(this).attr("method");var r=$(this).attr("action");var u=(typeof r==="string")?$.trim(r):"";u=u||window.location.href||"";if(u){u=(u.match(/^([^#]+)/)||[])[1]}$.ajax({type:y,url:u,data:x,dataType:"json",success:function(z){if(z.status=="success"){$.ajax({type:"post",url:z.url,dataType:"text",success:function(A){$("#overlay-box").html(A);o()}});return false}else{alert(z.msg)}}});return false})}});return false});$("#captcha img, #captcha a").click(function(){$("#captcha img").attr("src",$("#captcha img").attr("rel")+"?"+Math.random());$(this).parent().prev().find("input").val("").focus();return false});$("#j-login-form input").focus(function(){var p=$(this).parent().parent();p.find("blockquote").show()}).blur(function(){var q=$(this).parent().parent();var s=$(this).val();var p=q.find("blockquote");var r=p.attr("title");if($.trim(s)==""){p.removeClass("accepted").addClass("error").text(r)}else{p.removeClass("error").addClass("accepted").text("")}});$("#j-login-form").submit(function(){var s=$("#ipt-login-id");var y=$("#ipt-login-pwd");var w=s.val();var u=y.val();if(!w||$.trim(w)==""){s.focus();return false}if(!u||$.trim(u)==""){y.focus();return false}var t="data[username]="+w+"&data[password]="+u;var p=$("#ipt-captcha");if(p.length>0){var v=p.val();if(!v||$.trim(v)==""){p.focus();return false}else{t+=("&data[code]="+v)}}var q=$(this).attr("method");var x=$(this).attr("action");var r=(typeof x==="string")?$.trim(x):"";r=r||window.location.href||"";if(r){r=(r.match(/^([^#]+)/)||[])[1]}$.ajax({type:q,url:r,data:t,dataType:"json",success:function(z){if(z.status=="success"){$.ajax({type:"post",url:z.url,dataType:"text",success:function(A){$("#overlay-box").html(A);
c()}});return false}else{alert(z.msg)}}});return false})});m()}});return false}else{alert(l.msg)}}});return false})};c()}});return false})});