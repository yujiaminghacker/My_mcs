/**
 *--------------------------------------------------
 *工具
 *@author hmpop
 *--------------------------------------------------
 **/

function $$object(){
	var elements=new Array();
	for(var i=0;i<arguments.length;i++){
		var element=arguments[i];
		if(typeof element=='string')
			element=document.getElementById(element);
		if(arguments.length==1)
			return element;
		elements.push(element);
	}
	return elements;
}
String.prototype.evalJSON=function(){
	return eval('('+this+')');
}
var ajax={};
ajax.Loader=function(url,onload,onerror,method,params,contentType){
	this.req=null;
	ajax.currentLoader=this;
	this.onload=onload;
	this.onerror=(onerror)?onerror:this.defaultError;
	this.loadXMLDoc(url,method,params,contentType);
}
ajax.Loader.prototype={
	loadXMLDoc:function(url,method,params,contentType){
		if(!method){
			method="GET";
		}
		if(!contentType&&method=="POST"){
			contentType='application/x-www-form-urlencoded';
		}
		if(window.XMLHttpRequest){
			this.req=new XMLHttpRequest();		
		}else if(window.ActiveXObject){
			this.req=new ActiveXObject("Microsoft.XMLHTTP");		
		}
		if(this.req){
			try{
				var loader=this;
				this.req.onreadystatechange=function(){
					ajax.Loader.onReadyState.call(loader);
				}
				this.req.open(method,url,true);
				if(contentType){
					this.req.setRequestHeader('Content-Type',contentType);
				}
				this.req.send(params);
			}catch(err){
				this.onerror.call(this);
			}
		}
	},
	defaultError:function(){
		alert("Error fetching date!"+"\n\nreadyState:"+this.req.readyState
		+"\nstatus:"+this.req.status
		+"\nheaders:"+this.req.getAllResponseHeaders());
	}
}
ajax.Loader.onReadyState=function(){
	var req=this.req;
	var ready=req.readyState;
	if(ready==4){
		var httpStatus=req.status;
		if(httpStatus==200||httpStatus==0){
			this.onload.call(this);
		}else{
			this.onerror.call(this);
		}
	}
}

if(!live800)var live800={};
if(!live800.utils)live800.utils={};
live800.utils.INNER_WRAP="inner_wrap";//包装器常量
live800.utils.INNERWINDOW_CONTAINER="innerWindowContainer";//容器常量
live800.utils.INNER_IFRAME="live800_iframe";

if(!live800.utils.innerWindow)live800.utils.innerWindow=function(url,width,height){
	this.inner_wrap=$$object(live800.utils.INNER_WRAP);
	this.innerWindowContainer=$$object(live800.utils.INNERWINDOW_CONTAINER);
	this.url=url;
	this.width=300;
	this.height=200;
	if(width)this.width=width;
	if(height)this.height=height;
	this.show(this.url,this.width,this.height);
};
live800.utils.innerWindow.prototype={
	show:function(url,width,height){
		if(!this.inner_wrap&&!this.innerWindowContainer){
			this.createHtmlElement();
		}
		new ajax.Loader(url,function(){
				$$object(live800.utils.INNERWINDOW_CONTAINER).innerHTML=this.req.responseText;
				this.innerWindowContainer=$$object(live800.utils.INNERWINDOW_CONTAINER);
				this.inner_wrap=$$object(live800.utils.INNER_WRAP);
				this.innerWindowContainer.style.width=width+"px";
				this.innerWindowContainer.style.height=height+"px";
				this.innerWindowContainer.style.marginTop=-height/2+"px"
				this.innerWindowContainer.style.marginLeft=-width/2+"px";
				this.inner_wrap.style.display="";
				this.innerWindowContainer.style.display="";
			},null,"GET");
	},
	createHtmlElement:function(){
	if($$object(live800.utils.INNER_WRAP)||$$object(live800.utils.INNERWINDOW_CONTAINER)) return;
	var inner_wrap=document.createElement("div");
	var innerWindow=document.createElement("div");
	var y;
		y=document.documentElement.scrollHeight<document.documentElement.clientHeight?document.documentElement.clientHeight:document.documentElement.scrollHeight;
	innerWindow.id=live800.utils.INNERWINDOW_CONTAINER;
	inner_wrap.id=live800.utils.INNER_WRAP;
	inner_wrap.style.width="100%";
	inner_wrap.style.top="0px";
	inner_wrap.style.left="0px";
	inner_wrap.style.zIndex="10";
	inner_wrap.style.background="#000";
	inner_wrap.style.opacity=".5";
	inner_wrap.style.filter="alpha(opacity=50)";
	inner_wrap.style.height=y+"px";
	inner_wrap.style.position="absolute";
	inner_wrap.style.display="none";
	innerWindow.style.background="#fff";
	innerWindow.style.position="absolute";
	innerWindow.style.zIndex="11";
	innerWindow.style.top="50%";
	innerWindow.style.left="50%";
	innerWindow.style.display="none";
	document.body.appendChild(inner_wrap);
	document.body.appendChild(innerWindow);
	}
}
live800.utils.innerWindow.hidden=function(){
	this.inner_wrap=$$object(live800.utils.INNER_WRAP);
	this.innerWindowContainer=$$object(live800.utils.INNERWINDOW_CONTAINER);
		if(this.inner_wrap&&this.innerWindowContainer){
			this.inner_wrap.style.display="none";
			this.innerWindowContainer.style.display="none";			
		}
	}
live800.utils.createInnerWrap=function(){
	var inner_wrap=$$object(live800.utils.INNER_WRAP);
	if(!inner_wrap){
		inner_wrap=document.createElement("div");
		inner_wrap.id=live800.utils.INNER_WRAP;
		inner_wrap.style.width="100%";
		inner_wrap.style.top=0;
		inner_wrap.style.left=0;
		inner_wrap.style.zIndex=10;
		inner_wrap.style.background="#000";
		inner_wrap.style.opacity=".5";
		inner_wrap.style.filter="alpha(opacity=50)";
		inner_wrap.style.position="absolute";
		document.body.appendChild(inner_wrap);
		inner_wrap=$$object(live800.utils.INNER_WRAP);
	}
	var scrollY=document.body.scrollHeight?document.body.scrollHeight:document.documentElement.scrollHeight;
	var clientY=document.body.clientHeight?document.body.clientHeight:document.documentElement.clientHeight;
	inner_wrap.style.height=scrollY<clientY?clientY:scrollY+"px";
}
live800.utils.createInnerWindow=function(){
	var innerWindow=$$object(this.INNERWINDOW_CONTAINER);
	if(!innerWindow){
		innerWindow=document.createElement("div");
		innerWindow.id=this.INNERWINDOW_CONTAINER;
		innerWindow.style.background="#fff";
		innerWindow.style.position="absolute";
		innerWindow.style.zIndex=1000;
		innerWindow.style.width="570px";
		innerWindow.style.height="444px";
		innerWindow.style.top=0;
		innerWindow.style.left=0;
		var title_bar=document.createElement("div");
		title_bar.style.height="20px";
		title_bar.style.lineHeight="20px";
		title_bar.style.textAlign="right";
		live800.utils.dragWindow(title_bar,innerWindow);
		var c_btn=document.createElement("div");
		var protocol = document.location.protocol;
        protocol = protocol.substring(0, (protocol.length - 1));
        protocol = (protocol == "file") ? "http" : protocol;
		if(live800_baseUrl&&live800_baseWebApp&&live800_baseChatHtmlDir){
			c_btn.style.background="url("+protocol+"://"+live800_baseUrl+live800_baseWebApp+live800_baseChatHtmlDir+"/style/icn_closew.gif) no-repeat scroll 3px";
		}else{
			c_btn.innerHTML="关闭";
		}
		c_btn.style.width="20px";
		c_btn.style.height="20px";
		c_btn.style.cssFloat="right";
		c_btn.setAttribute("title","关闭");
		c_btn.style.cursor="pointer";
		c_btn.onclick=function(){
			var iframe=$$object(live800.utils.INNER_IFRAME);
			if(iframe)iframe.removeAttribute("src");
			document.body.removeChild($$object(live800.utils.INNER_WRAP));
			document.body.removeChild($$object(live800.utils.INNERWINDOW_CONTAINER));
		}
		title_bar.appendChild(c_btn);
		innerWindow.appendChild(title_bar);
		document.body.appendChild(innerWindow);
		this.positionCenter(innerWindow);
	}
}
live800.utils.positionCenter=function(el){
	var xhtmltop=((document.body.scrollTop?document.body.scrollTop:document.documentElement.scrollTop)+( ((document.body.clientHeight > document.documentElement.clientHeight)?document.documentElement.clientHeight:document.body.clientHeight)-el.offsetHeight)/2);
	var htmltop=(document.body.scrollTop+(document.body.clientHeight-el.offsetHeight)/2);
	if(document.doctype){
		el.style.top=xhtmltop+"px";
	}else{
		if(document.documentElement.clientWidth){
			el.style.top=xhtmltop+"px";
		}else{
			el.style.top=htmltop+"px";
		}		
	}
	el.style.left=(document.body.scrollLeft+(document.body.clientWidth-el.offsetWidth)/2)+"px";
}
live800.utils.dragWindow=function(el,parentEl){
		if(el)el.onmouseover=function(){
		el.style.cursor="move";
		if (window.ActiveXObject){ 
        	el.onselectstart = function () { event.returnValue = false;};
			parentEl.onselectstart=function(){event.returnValue=false;};
		}
		el.onmousedown=function(e){
			e=window.event||e;
			parentEl.currentX=(e.pageX?e.pageX:e.clientX)-parentEl.offsetLeft;
			parentEl.currentY=(e.pageY?e.pageY:e.clientY)-parentEl.offsetTop;
			var pBorder=parentEl.style.border;
			var pColor=parentEl.style.backgroundColor;
			document.onmousemove=function(e){
				e=window.event||e;
				parentEl.style.border="1px dashed #ccc";
				parentEl.style.backgroundColor="transparent";
				if(parentEl.hasChildNodes()){
					 for (i=0; i<parentEl.childNodes.length; i++) {
					 	if(parentEl.childNodes[i].style){
					 		parentEl.childNodes[i].style.display="none";
						}
					 }
				}
				try{
					parentEl.style.left=(e.clientX-parentEl.currentX)+"px";
					parentEl.style.top=(e.clientY-parentEl.currentY)+"px";
				}catch(ex){}
			};
			document.onmouseup=function(){
				parentEl.style.border=pBorder;
				parentEl.style.background=pColor;
				if(parentEl.hasChildNodes()){
					 for (i=0; i<parentEl.childNodes.length; i++) {
					 	if(parentEl.childNodes[i].style){
					 		parentEl.childNodes[i].style.display="";
						}
					 }
				}
				document.onmousemove=null;
				document.onmouseup=null;
			};
		};
	};
}
live800.utils.createIframe=function(parentId){
	var iframe=$$object(this.INNER_IFRAME);
	if(!iframe){
		var iframe=document.createElement("iframe");
		iframe.id=this.INNER_IFRAME;
		iframe.setAttribute("name",this.INNER_IFRAME);
		iframe.setAttribute("scrolling","no");
		iframe.setAttribute("frameborder","0");
		iframe.style.width="570px";
		iframe.style.height="424px";
		if(parentId)$$object(parentId).appendChild(iframe);
	}
}
live800.utils.showChaterInIframe=function(url){
	this.createInnerWrap();
	this.createInnerWindow();
	this.createIframe(this.INNERWINDOW_CONTAINER);
	var iframe=$$object(this.INNER_IFRAME);
	if(iframe){
		iframe.src=url;
	}
}
live800.utils.getPlatformInfo=function(){
	var infos="";
	infos+="browser="+live800.utils.getBrowserVersion();
	infos+="&opsys="+live800.utils.getOperatorSystem();
	infos+="&screen="+live800.utils.getScreenInfo();
	return infos;
}
live800.utils.getOperatorSystem=function(){
	var sUserAgent=navigator.userAgent;
	if((navigator.platform == "Win32")||(navigator.platform == "Windows")){
		if(sUserAgent.indexOf("Win95") > -1|| sUserAgent.indexOf("Windows 95") > -1)return "Windows 95";
		if(sUserAgent.indexOf("Win98") > -1|| sUserAgent.indexOf("Windows 98") > -1)return "Windows 98";
		if(sUserAgent.indexOf("Win 9x 4.90") > -1|| sUserAgent.indexOf("Windows ME") > -1)return "Windows ME";
		if(sUserAgent.indexOf("Windows NT 5.0") > -1|| sUserAgent.indexOf("Windows 2000") > -1)return "Windows 2000";
		if(sUserAgent.indexOf("Windows NT 5.1") > -1|| sUserAgent.indexOf("Windows XP") > -1)return "Windows XP";
		if(sUserAgent.indexOf("WinNT") > -1|| sUserAgent.indexOf("Windows NT") > -1|| sUserAgent.indexOf("WinNT4.0") > -1|| sUserAgent.indexOf("Windows NT 4.0") > -1)return "Windows NT";
	}
	if((navigator.platform == "Mac68K") || (navigator.platform == "MacPPC")|| (navigator.platform == "Macintosh")){
		if(sUserAgent.indexOf("Mac_68000") > -1|| sUserAgent.indexOf("68K") > -1)return "Mac 68C";
		if(sUserAgent.indexOf("Mac_PowerPC") > -1|| sUserAgent.indexOf("PPC") > -1)return "Mac PowerPC";
	}
	if(navigator.platform == "X11"){
		if(sUserAgent.indexOf("SunOS") > -1)return "SunOS";
		else{
			return "unix";
		}
	}
}
live800.utils.getBrowserVersion=function(){
	var sUserAgent=navigator.userAgent;
	if(sUserAgent.indexOf("compatible") > -1&& sUserAgent.indexOf("MSIE") > -1){
		var IEOffset=sUserAgent.indexOf("MSIE");
		return "IE "+parseFloat(sUserAgent.substring(IEOffset+5,sUserAgent.indexOf(";",IEOffset)));
	}
	if(sUserAgent.indexOf("Firefox")>-1){
		var FFOffset=sUserAgent.indexOf("Firefox")
		return "Firefox";
	}
	if(sUserAgent.indexOf("Gecko") > -1){
		return "Mozilla "+parseFloat(navigator.appVersion);
	}
	if((sUserAgent.indexOf("Mozilla") == 0)&& (navigator.appName == "Netscape")){
		return "Mozilla "+parseFloat(navigator.appVersion);
	}
	return "Other Browser";
}
live800.utils.getScreenInfo=function(){
	return screen.width+"*"+screen.height;
}
live800.utils.getResources=function(lang){
	var url="script/test.jsp";
	var resources=null;
	if(lang!=null&&lang!=""){
		url+="?lang="+lang;
	}
	new ajax.Loader(url,function(){
		resources=this.req.responseText.evalJSON();
		$$object('test').innerHTML=resources['pre_chat_name'];
		},null);
	return resources;
}
function doCBrowser(){
 		if(globalChatHandle.chatStatus=="WAIT")
	{
		alert(towaitre);
		return;
	}
	if(globalChatHandle.chatStatus=="END"){
		alert(dialogovered);
		return;
	}
	var protocol = document.location.protocol;
    protocol = protocol.substring(0, (protocol.length - 1));
    protocol = (protocol == "file") ? "http" : protocol;
	var url=protocol+"://"+baseUrl+baseWebApp+"/ChaterServer?cmd=215&visitorIDInSession="+preferences['visitorIDInSession']+"&rpcImageId="+new Date().getTime();	
	new ajax.Loader(url,null,null,"POST",null);
	alert(co_browser_request_send);
	return;
}