var $$obj = function(id){
    return document.getElementById(id);
};
if (!UT) 
    var UT = {};
UT.urlEncode = function(Str){
    if (Str == null || Str == "") {
        return "";
    }
    var newStr = "";
    function toCase(sStr){
        return sStr.toString(16).toUpperCase();
    };
    for (var i = 0, icode, len = Str.length; i < len; i++) {
        icode = Str.charCodeAt(i);
        if (icode < 0x10) {
            newStr += "%0" + icode.toString(16).toUpperCase();
        }
        else 
            if (icode < 0x80) {
                if (icode == 0x20) {
                    newStr += "+";
                }
                else 
                    if ((icode >= 0x30 && icode <= 0x39) || (icode >= 0x41 && icode <= 0x5A) || (icode >= 0x61 && icode <= 0x7A)) {
                        newStr += Str.charAt(i);
                    }
                    else {
                        newStr += "%" + toCase(icode);
                    }
            }
            else 
                if (icode < 0x800) {
                    newStr += "%" + toCase(0xC0 + (icode >> 6));
                    newStr += "%" + toCase(0x80 + icode % 0x40);
                }
                else {
                    newStr += "%" + toCase(0xE0 + (icode >> 12));
                    newStr += "%" + toCase(0x80 + (icode >> 6) % 0x40);
                    newStr += "%" + toCase(0x80 + icode % 0x40);
                }
    }
    return newStr;
};
UT.urlDecode = function(Str){
   try{
   		/*
 if (Str == null || Str == "") {
        return "";
	    }
	    var newStr = "";
	    function toCase(sStr){
	        return sStr.toString(16).toUpperCase();
	    };
	    for (var i = 0, ichar, len = Str.length; i < len;) {
	        if (Str.charAt(i) == "%") {
	            ichar = Str.charAt(i + 1);
	            if (ichar.toLowerCase() == "e") {
	                newStr += String.fromCharCode(((parseInt("0x" + Str.substr(i + 1, 2)) - 0xE0) * 0x1000) + ((parseInt("0x" + Str.substr(i + 4, 2)) - 0x80) * 0x40) + (parseInt("0x" + Str.substr(i + 7, 2)) - 0x80));
	                i += 9;
	            }
	            else 
	                if (ichar.toLowerCase() == "c" || ichar.toLowerCase() == "d") {
	                    newStr += String.fromCharCode(((parseInt("0x" + Str.substr(i + 1, 2)) - 0xC0) * 0x40) + parseInt("0x" + Str.substr(i + 4, 2)) - 0x80);
	                    i += 6;
	                }
	                else {
	                    newStr += String.fromCharCode(parseInt("0x" + Str.substr(i + 1, 2)));
	                    i += 3;
	                }
	        }
	        else {
	            newStr += Str.charAt(i).replace(/\+/, " ");
	            i++;
	        }
	    }
	    return newStr;
*/
		return decodeURIComponent(Str);
   }catch(e){
   		return Str;
   }
};
UT.urlToParams = function(urlContent){
    cmdMap = new Array();
    cmdParams = new Array();
    pos = -1;
    while (true) {
        newPos = urlContent.indexOf('&', pos + 1);
        if (newPos >= 0) {
            encodedProperty = urlContent.substring(pos + 1, newPos);
        }
        else {
            encodedProperty = urlContent.substring(pos + 1, urlContent.length);
        }
        equalsPos = encodedProperty.indexOf('=');
        paramName = encodedProperty.substring(0, equalsPos);
        paramValue = (encodedProperty.substring(equalsPos + 1, encodedProperty.length));
        cmdParams[paramName] = paramValue;
        if (newPos == -1) {
            break;
        }
        pos = newPos;
    }
    return cmdParams;
};
UT.paramsToUrl = function(params){
    var urlString = "";
    for (var i in params) {
        if (params[i] != "" && typeof params[i] != "function") {
            urlString = urlString + i + "=" + encodeURIComponent(params[i]) + "&";
        }
    }
    return urlString.substring(0, urlString.length - 1);
};
UT.isCookie = function(){
    document.cookie = "testcookie=testvalue";
    var cookiestr = new String(document.cookie);
    var cookiename = "testcookie=testvalue";
    var beginpos = cookiestr.indexOf(cookiename);
    if (beginpos != -1) {
        return true;
    }
    else {
        return false;
    }
};
UT.setCookie = function(name, value){
    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value);
};
UT.getCookie = function(name){
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    arr = document.cookie.match(reg);
    if (arr) {
        return unescape(arr[2]);
    }
    else {
        return null;
    }
};
UT.dragWindow = function(el, parentEl, obj){
    if (el) {
        el.onmouseover = function(){
            el.style.cursor = "move";
            if (window.ActiveXObject) {
                el.onselectstart = function(){
                    event.returnValue = false;
                };
                parentEl.onselectstart = function(){
                    event.returnValue = false;
                };
            }
            el.onmousedown = function(e){
                e = window.event || e;
                if (obj) {
                    clearTimeout(obj.floattimer);
                }
                parentEl.className = "drag";
                parentEl.currentX = (e.pageX ? e.pageX : e.clientX) - parentEl.offsetLeft;
                parentEl.currentY = (e.pageY ? e.pageY : e.clientY) - parentEl.offsetTop;
                document.onmousemove = function(e){
                    e = window.event || e;
                    try {
                        parentEl.style.left = (e.clientX - parentEl.currentX) + "px";
                        parentEl.style.top = (e.clientY - parentEl.currentY) + "px";
                    } 
                    catch (ex) {
                    }
                };
                document.onmouseup = function(){
                    parentEl.className = "release";
                    document.onmousemove = function(){
                    };
                    document.onmouseup = function(){
                    };
                };
            };
        };
    }
};
