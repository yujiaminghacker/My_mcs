window.onerror = function() {
	return true;
}
Sys = function() {
	;
}
Sys.NS = (document.layers) ? true : false;
Sys.IE = (document.all) ? true : false;
Sys.DOM = (document.getElementById) ? true : false;
if (Sys.IE)
	Sys.DOM = false;
Sys.MAC = (navigator.platform)
		&& (navigator.platform.toUpperCase().indexOf('MAC') >= 0);
if (Sys.NS)
	Sys.MAC = false;
Sys.getObj = function(objId) {
	if (document.getElementById)
		return document.getElementById(objId);
	else if (document.all)
		return document.all(objId);
}
Sys.urlEncode = function(str) {
	var i, c, ret = "", strSpecial = "!\"#$%&'()*+,/:;<=>?@[\]^`{|}~%";
	for (i = 0; i < str.length; i++) {
		c = str.charAt(i);
		if (c == " ")
			ret += "+";
		else if (strSpecial.indexOf(c) != -1)
			ret += "%" + str.charCodeAt(i).toString(16);
		else
			ret += c;
	}
	return ret;
};
Sys.urlDecode = function(str) {
	if ("undefined" == typeof decodeURIComponent) {
		return unescape(str).replace(/\+/g, ' ').replace(/%2B/g, '+');
	} else {
		return decodeURIComponent(str.replace(/\+/g, ' ').replace(/%2B/g, '+'));
	}
};
Sys.urlToParams = function(urlContent) {
	try {
		var cmdMap = urlContent.split("&"), cmdParams = [], temp;
		for (var i = 0; i < cmdMap.length; i++) {
			temp = cmdMap[i].split("=");
			cmdParams[temp[0]] = temp[1];
		}
		return cmdParams;
	} catch (e) {
		E.report('请勿非法修改参数', '1206');
		return [];
	}
};

function getTrustfulVisitorInfo() {
	var visitorInfoUrl = "";
	if (typeof trustfulInfo != "undefined" && trustfulInfo.length > 0
			&& trustfulInfo != null && trustfulInfo != "null") {
		visitorInfoUrl = "&info=" + trustfulInfo;
	}
	return visitorInfoUrl;

};

function getVisitorZone() {
	var visitorZone = "";
	if (typeof zone != "undefined" && zone.length > 0 && zone != null
			&& zone != "null") {
		visitorZone = "&zone=" + zone;
	}
	return visitorZone;
};
function FloatIcon(inLogger, inPreferences) {
	this.preferences = inPreferences;
	this.logger = inLogger;
	this.inviteInnerHtml = null;
	this.lastTop = -1;
	this.lastLeft = -1;
	this.layerHtml = null;
	this.showInvite = false;
	this.companyID = this.preferences["companyID"];
	this.iconIndex = this.preferences["iconIndex"];
	this.online = this.preferences["online"];
	this.offline = this.preferences["offline"];
	this.toRight = this.preferences["floatToRight"];
	this.loaded = true;
	this.toBottom = false;
	this.floatTop = parseInt(this.preferences["floatTop"]);
	this.floatSide = parseInt(this.preferences["floatSide"]);
	this.parentObject = null;
	this.showTimer = FloatIcon_showTimer;
	this.scrollPlace = FloatIcon_scrollPlace;
	this.generate = FloatIcon_generate;
	this.show = FloatIcon_show;
	this.hide = FloatIcon_hide;
	this.start = FloatIcon_start;
};
function FloatIcon_start() {
	this.generate();
	this.show();
	setTimeout('globalFloatIcon_v3.showTimer()', 1);
};
function FloatIcon_generate() {
	var param = getParam();
	if (param != "") {
		param = "&" + param;
	}
	var openScript = "try{parent.closeMini();}catch(e){;}this.newWindow=window.open('"
			+ this.preferences["protocol"]
			+ "://"
			+ this.preferences["baseUrl"]
			+ this.preferences["baseWebapp"]
			+ this.preferences["baseChatHtmlDir"]
			+ "/chatbox.jsp?companyID="
			+ this.preferences["companyID"]
			+ getGid()			
			+ "&configID="
			+ this.preferences["configID"]
			+ param
			+ getTrustfulVisitorInfo()
			+ getVisitorZone()
			+ "', 'chatbox"
			+ this.preferences["companyID"]
			+ "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width="+getNewBoxFrame()[0]+",height="+getNewBoxFrame()[1]+"');this.newWindow.focus();this.newWindow.opener=window;void(0);try{parent.closeMini();}catch(e){}";
	//雅库公司特殊处理,该公司ID是care3上的ID
	if("8043"==this.preferences["companyID"]){
		//临时取消特殊处理，注意是小窗口存在加载慢的问题。
		//openScript = "try{if(typeof globalVisitHandle != 'undefined'){globalVisitHandle.openInitiatedChat('1');}}catch(e){;}";
	}
	var marginStr = " left:" + this.floatSide + "px;";
	if (this.toRight == "1") {
		marginStr = " right:" + this.floatSide + "px;";
	}
	this.layerHtml = "<div id=\"FloatIcon\" style=\"z-index:8888;position:absolute;visibility:hidden;"
			+ marginStr
			+ "top:200px;height:auto;width:auto;\"><div style='position:relative;'>";
	this.inviteInnerHtml = '<a id="live800iconlink" target="_self" href="javascript:void(0)" onclick="'
			+ openScript
			+ '"><img name="live800icon" id="live800icon" src="'
			+ this.preferences["protocol"]
			+ "://"
			+ this.preferences["baseUrl"]
			+ this.preferences["baseWebapp"]
			+ '/SurferServer?'
			+ 'cmd=111&companyID='
			+ this.preferences["companyID"]
			+ param
			+ "&configID="
			+ this.preferences["configID"]
			+ '&online='
			+ this.preferences["online"]
			+ '&offline='
			+ this.preferences["offline"]
			+ getTrustfulVisitorInfo()
			+ '"  border="0" /></a>';
	this.layerHtml += this.inviteInnerHtml;
	this.layerHtml += "<div class='icon:close'><div></div>";
	document.write(this.layerHtml);
};
function FloatIcon_showTimer() {
	if (this.loaded && this.showInvite) {
		var top;
		var left;
		if (Sys.IE) {
			if (this.inviteInnerHtml == null)
				this.inviteInnerHtml = Sys.getObj('FloatIcon').innerHTML;
			if (Sys.getObj('FloatIcon').innerHTML.indexOf('javascript') == -1) {
				Sys.getObj('FloatIcon').innerHTML = this.inviteInnerHtml;
			}
			scrollPosY = 0;
			scrollPosX = 0;
			eval('try {'
					+ 'if (typeof(document.documentElement) != "undefined") {'
					+ 'scrollPosY = document.documentElement.scrollTop;'
					+ 'scrollPosX = document.documentElement.scrollLeft;' + '}'
					+ '} catch (e) {}');
			scrollPosY = Math.max(document.body.scrollTop, scrollPosY);
			scrollPosX = Math.max(document.body.scrollLeft, scrollPosX);
			top = scrollPosY;
			left = scrollPosX;
			/*
			 * if this.lastTop < 0 then this is the first time, if second time
			 * have no scrollbar, visible the invitewin
			 */
			if ((this.lastTop < 0)
					|| ((this.lastTop == top) && (this.lastLeft == left))) {
				document.all.FloatIcon.style.visibility = 'visible';
			} else {
				/*
				 * not init, if scroll bar, then hidden invitewin, and call
				 * scrollPlace function to move invitewin, after move it, then
				 * show it
				 */
				document.all.FloatIcon.style.visibility = 'hidden';
			}
		} else if (Sys.NS) {
			top = pageYOffset;
			left = pageXOffset;
			if ((this.lastTop < 0)
					|| ((this.lastTop == top) && (this.lastLeft == left))) {
				document.layers.FloatIcon.visibility = 'visible';
			} else {
				document.layers.FloatIcon.visibility = 'hidden';
			}
		} else if (Sys.DOM) {
			top = pageYOffset;
			left = pageXOffset;
			if ((this.lastTop < 0)
					|| ((this.lastTop == top) && (this.lastLeft == left))) {
				Sys.getObj('FloatIcon').style.visibility = 'visible';
			} else {
				Sys.getObj('FloatIcon').style.visibility = 'hidden';
			}
		}
		this.scrollPlace();
		this.lastTop = top;
		this.lastLeft = left;

	}
	setTimeout('globalFloatIcon_v3.showTimer()', 250);
};
function FloatIcon_scrollPlace() {
	var obj = Sys.getObj("FloatIcon");
	var live800icon = obj.getElementsByTagName("img")[0];

	var iconHeight = live800icon.height;
	var iconWidth = live800icon.width;

	// float to bottom
	var y;
	var x;
	if (this.toBottom) {
		if (document.body)
			y = document.body.clientHeight - iconHeight - this.floatTop;
		else
			y = innerHeight - iconHeight - this.floatTop;
	} else
		y = this.floatTop;

	// float to right
	if (this.toRight == "1" && !!iconWidth) {
		if (document.body.clientWidth)
			x = document.body.clientWidth - iconWidth - this.floatSide;
		else if (document.documentElement.clientWidth) {
			x = document.documentElement.clientWidth - iconWidth
					- this.floatSide;
		} else
			x = innerWidth - iconWidth - this.floatSide;
	} else
		x = this.floatSide;

	var obj = null;
	if (Sys.IE) {
		obj = document.all.FloatIcon.style;
	} else if (Sys.NS) {
		obj = document.layers.FloatIcon;
	} else if (Sys.DOM) {
		obj = Sys.getObj('FloatIcon').style;
	}

	if (Sys.IE) {
		scrollPosY = 0;
		scrollPosX = 0;
		eval('try {' + 'if (typeof(document.documentElement) !=	"undefined") {'
				+ 'scrollPosY =	document.documentElement.scrollTop;'
				+ 'scrollPosX = document.documentElement.scrollLeft;' + '}'
				+ '} catch	(e)	{}');
		scrollPosY = Math.max(document.body.scrollTop, scrollPosY);
		scrollPosX = Math.max(document.body.scrollLeft, scrollPosX);
		obj.left = scrollPosX + x + 'px';
		obj.top = scrollPosY + y + 'px';
	} else if (Sys.NS) {
		obj.left = pageXOffset + x;
		obj.top = pageYOffset + y;
	} else if (Sys.DOM) {
		obj.left = pageXOffset + x + 'px';
		obj.top = pageYOffset + y + 'px';
	}
};
function FloatIcon_show() {
	this.showInvite = true;
	if (Sys.IE) {
		document.all.FloatIcon.style.visibility = 'visible';
	} else if (Sys.NS) {
		document.layers.FloatIcon.visibility = 'visible';
	} else if (Sys.DOM) {
		Sys.getObj('FloatIcon').style.visibility = 'visible';
	}
};
function FloatIcon_hide() {
	this.showInvite = false;

	if (Sys.IE) {
		document.all.FloatIcon.style.visibility = 'hidden';
	} else if (Sys.NS) {
		document.layers.FloatIcon.visibility = 'hidden';
	} else if (Sys.DOM) {
		Sys.getObj('FloatIcon').style.visibility = 'hidden';
	}
};
function setCookie(name, value) {
	var Days = 30;
	var exp = new Date(); // new Date("December 31, 9998");
	exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
	document.cookie = name + "=" + escape(value) + ";expires="
			+ exp.toGMTString();
};
function setSessionCookie(name, value) {
	document.cookie = name + "=" + escape(value);
};
function getCookie(name) {
	var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
	if (arr = document.cookie.match(reg))
		return unescape(arr[2]);
	else
		return null;
};
function getGid() {
	if (typeof jid != "undefined") {
		return "&jid=" + jid;
	} else
		return "";
};
function getParam() {
	var url = "";
	if(typeof operator != "undefined"){
		url = "operatorId=" + operator["id"];
	}else if (typeof skill != "undefined") {		    
		url ="skillId=" + skill["id"];
	}
	if (enterurl == "null"){
		enterurl = document.URL;
	}
	if(url == ""){	
		url = "enterurl=" + URLEncode(enterurl);
	}else{	
		url = url + "&enterurl=" + URLEncode(enterurl);
	}
	var pagereferrinsession = getCookie("pageReferrInSession");
	if (pagereferrinsession == null || pagereferrinsession == " ") {
		pagereferrinsession = "";
	}
	var pagereferrinsession = URLEncode(pagereferrinsession);
	if (pagereferrinsession.length >= 1600) {
		pagereferrinsession = pagereferrinsession.substring(0, 1600);
	}
	if (pagereferrinsession.length > 0) {
		pagereferrinsession = "&pagereferrer=" + pagereferrinsession;
	}
	var live800DeParams = "";
	if (typeof live800_defined_params != "undefined"
			&& live800_defined_params.length > 0) {
		live800DeParams = "&" + live800_defined_params;
	}
	return url + pagereferrinsession + live800DeParams;
};

function getNewBoxFrame(){
    if(isNewChatBox){
        return [778,520];
    }else{
        return [570,424];
    }
};

function URLEncode(Str) {
	if (Str == null || Str == "")
		return "";
	var newStr = "";
	function toCase(sStr) {
		return sStr.toString(16).toUpperCase();
	}
	for (var i = 0, icode, len = Str.length; i < len; i++) {
		icode = Str.charCodeAt(i);
		if (icode < 0x10)
			newStr += "%0" + icode.toString(16).toUpperCase();
		else if (icode < 0x80) {
			if (icode == 0x20)
				newStr += "+";
			else if ((icode >= 0x30 && icode <= 0x39)
					|| (icode >= 0x41 && icode <= 0x5A)
					|| (icode >= 0x61 && icode <= 0x7A))
				newStr += Str.charAt(i);
			else
				newStr += "%" + toCase(icode);
		} else if (icode < 0x800) {
			newStr += "%" + toCase(0xC0 + (icode >> 6));
			newStr += "%" + toCase(0x80 + icode % 0x40);
		} else {
			newStr += "%" + toCase(0xE0 + (icode >> 12));
			newStr += "%" + toCase(0x80 + (icode >> 6) % 0x40);
			newStr += "%" + toCase(0x80 + icode % 0x40);
		}
	}
	return newStr;
};
function delCookie(name) {
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval = getCookie(name);
	if (cval != null)
		document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
};
function setLiveCookie() {
	delCookie("operatorId");
	delCookie("skillId");
	if (typeof params["live800_operator"] != "undefined"
			&& params["live800_operator"].length != 0
			&& params["live800_operator"] != "undefined") {
		setCookie("operatorId", params["live800_operator"]);
	}
	if (typeof params["live800_skill"] != "undefined"
			&& params["live800_skill"].length != 0
			&& params["live800_skill"] != "undefined") {
		setCookie("skillId", params["live800_skill"]);
	}
	setSessionPageReferrer();
};
function setSessionPageReferrer() {
	var pagereferr = getCookie("pageReferrInSession");
	if (pagereferr == null) {
		pagereferr = document.referrer;
		if (pagereferr == null) {
			pagereferr = " ";
		}
		if (pagereferr.length > 500) {
			pagereferr = pagereferr.substring(0, 500)
		}
		setSessionCookie("pageReferrInSession", pagereferr);
	}
};
function getProtocol() {
	var protocol = document.location.protocol;
	protocol = protocol.substring(0, (protocol.length - 1));
	protocol = (protocol == "file") ? "http" : protocol;
	if (protocol == "https") {
		return "https";
	}
	try {
		var scripts = document.getElementsByTagName("script"), script;
		for (var i = 0, length = scripts.length; i < length; i++) {
			script = scripts[i];
			if (script.src && script.src.indexOf("floatButton.js") != -1) {
				if (script.src.indexOf("https:") != -1) {
					return "https";
				}
			}
		}
	} catch (e) {
	}
	return protocol;
};
params = Sys.urlToParams(live800_configContent);
setLiveCookie();
if (live800_companyID == null || live800_companyID == "") {
	alert("miss companyID");
} else {
	preferences = new Array();
	preferences["companyID"] = live800_companyID;
	preferences["configID"] = live800_configID;
	preferences["online"] = (params["live800_online"] != null
			? params["live800_online"]
			: "");
	preferences["offline"] = (params["live800_offline"] != null
			? params["live800_offline"]
			: "");
	preferences["floatToRight"] = (params["live800_floatToRight"] != null
			? params["live800_floatToRight"]
			: "1");
	preferences["floatTop"] = (params["live800_floatTop"] != null
			? params["live800_floatTop"]
			: 150);
	preferences["floatSide"] = (params["live800_floatSide"] != null
			? params["live800_floatSide"]
			: 5);
	preferences["protocol"] = getProtocol();
	preferences["baseUrl"] = live800_baseUrl;
	preferences["baseHtmlUrl"] = live800_baseHtmlUrl;
	preferences["baseWebapp"] = live800_baseWebApp;
	preferences["baseChatHtmlDir"] = live800_baseChatHtmlDir;
	preferences["visitorIDInSession"] = preferences["companyID"] + "chater";
	var globalFloatIcon_v3 = new FloatIcon("nothing", preferences);
	globalFloatIcon_v3.start();
};
(function() {
	var protocol = getProtocol();
	function $(name, ctx) {
		var els = [], childs = (ctx || document.body).getElementsByTagName("*");
		for (var i = 0; i < childs.length; i++) {
			if (childs[i].className.match(new RegExp("(^|\\s)" + name
					+ "(\\s|$)"))) {
				els.push(childs[i]);
			}
		}
		return els;
	};
	function closeIcon() {
		var el = this.parentNode.parentNode;
		el.style.display = "none";
	};
	function closeMouseOver() {
		this.style.background = "url(" + protocol + "://" + live800_baseUrl
				+ live800_baseWebApp
				+ "/chatClient/style/btn_close02.gif) no-repeat center";
	};
	function closeMouseOut() {
		this.style.background = "url(" + protocol + "://" + live800_baseUrl
				+ live800_baseWebApp
				+ "/chatClient/style/btn_close01.gif) no-repeat center";
	}
	var icons = $("icon:close");
	for (var i = 0; i < icons.length; i++) {
		icons[i].style.height = "18px";
		icons[i].style.width = "18px";
		icons[i].style.position = "absolute";
		icons[i].style.top = "2px";
		if (preferences["floatToRight"] == "1") {
			icons[i].style.left = "2px";
		} else {
			icons[i].style.right = "2px";
		}
		icons[i].style.background = "url(" + protocol + "://" + live800_baseUrl
				+ live800_baseWebApp
				+ "/chatClient/style/btn_close01.gif) no-repeat center";
		icons[i].onclick = closeIcon;
		icons[i].onmouseover = closeMouseOver;
		icons[i].onmouseout = closeMouseOut;
	}
})();
