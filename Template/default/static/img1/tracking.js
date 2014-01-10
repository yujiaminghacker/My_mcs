if (!LIM) 
    var LIM = {};
function openOldInitiatedChatWindow(url){
    var openUrl = url;
    try {
        var w = window.open(openUrl + "&t" + new Date().getTime(), "chatbox" + LIM.visitor.config["companyId"], "toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=570,height=424");
        w.focus();
    } 
    catch (e) {
        openUrl += "&block=0&t=" + new Date().getTime();
        window.location = openUrl;
    }
};
LIM.specials = {
    "67919": openOldInitiatedChatWindow,
    "81284": openOldInitiatedChatWindow,
    "77081": openOldInitiatedChatWindow,
    "68771": openOldInitiatedChatWindow,
    "70746": openOldInitiatedChatWindow,
    "78994": openOldInitiatedChatWindow,
    "70746": openOldInitiatedChatWindow
};
LIM.onTagSuccess = function(){
    globalReceiveDriver.onTagSuccess(this.width.toString());
};
LIM.onTagError = function(){
    globalReceiveDriver.onTagError();
};
LIM.RpcMethod = function(inServiceName, inCmdNo, inParams, inRetryTimes, inOnSuccess, inOnError){
    this.serviceName = inServiceName;
    this.cmdNo = inCmdNo;
    this.params = inParams;
    this.retryTimes = inRetryTimes;
    this.onSuccess = inOnSuccess;
    this.onError = inOnError;
};
LIM.SendDriver = function(){
    this.config = LIM.visitor.config;
    this.busy = false;
    this.rpcImage = null;
};
LIM.SendDriver.prototype = {
    onRpcSuccess: function(inWidth, inHeight){
        if (this.rpcMethod.onSuccess != null) {
            this.rpcMethod.onSuccess(inWidth, inHeight);
        }
        this.busy = false;
    },
    onRpcError: function(){
        if (this.rpcMethod.retryTimes <= 0) {
            if (this.rpcMethod.onError != null) {
                this.rpcMethod.onError(this.rpcMethod);
            }
            this.busy = false;
        }
        else {
            this.rpcMethod.retryTimes--;
            this.execute(this.rpcMethod);
        }
    },
    execute: function(inRpcMethod){
        this.busy = true;
        this.rpcMethod = inRpcMethod;
        var rpcImageUrl = this.config["webAppUrl"] + "/" + this.rpcMethod.serviceName + "?cmd=" + this.rpcMethod.cmdNo + "&visitorIDInSession=" + this.config["visitorIDInSession"] + this.config['visitorInfo'];
        if (this.rpcMethod.params != null) {
            for (i in this.rpcMethod.params) {
                if (typeof i == "string" && typeof this.rpcMethod.params[i] == "string") {
                    pos = this.rpcMethod.params[i].indexOf("=");
                    paramName = this.rpcMethod.params[i].substring(0, pos);
                    paramValue = this.rpcMethod.params[i].substring(pos + 1);
                    rpcImageUrl += '&' + paramName + '=' + UT.urlEncode(paramValue);
                }
            }
        }
        rpcImageUrl += '&rpcImageId=' + (new Date()).getTime();
        this.rpcImage = new Image();
        try {
            this.rpcImage.onload = LIM.onRpcSuccess;
            this.rpcImage.onerror = LIM.onRpcError;
        } 
        catch (e) {
        }
        this.rpcImage.src = rpcImageUrl;
    }
};
LIM.JustUrlLen = function(){
    var URLEncode = UT.urlEncode, pagelocation = URLEncode(document.URL), pagereferrer = URLEncode(document.referrer), pagetitle;
    if (document.title.length > 80) {
        pagetitle = URLEncode(document.title.substring(0, 80));
    }
    else {
        pagetitle = URLEncode(document.title);
    }
    if (pagelocation.length >= 1600) {
        pagelocation = pagelocation.substring(0, 1600);
    }
    if (pagereferrer.length >= 1600) {
        pagereferrer = pagereferrer.substring(0, 1600);
    }
    if (pagetitle.length > 1600) {
        pagetitle = pagetitle.substring(0, 1600);
    }
    for (var i = 1; i > 0; i++) {
        if ((pagetitle + pagelocation + pagereferrer).length > 1600) {
            if (pagetitle.length >= 100) {
                pagetitle = pagetitle.substring(0, pagetitle.length - 200);
            }
            if ((pagetitle + pagelocation + pagereferrer).length > 1600) {
                if (pagelocation.length >= 100) {
                    pagelocation = pagelocation.substring(0, pagelocation.length - 100);
                }
                if ((pagetitle + pagelocation + pagereferrer).length > 1600) {
                    if (pagereferrer.length >= 100) {
                        pagereferrer = pagereferrer.substring(0, pagereferrer.length - 100);
                    }
                    if ((pagetitle + pagelocation + pagereferrer).length < 1600) {
                        break;
                    }
                }
                else {
                    break;
                }
            }
            else {
                break;
            }
        }
        else {
            break;
        }
    }
    LIM.page = {
        "title": pagetitle,
        "location": pagelocation,
        "referrer": pagereferrer
    };
};
LIM.ReceiveDriver = function(){
    this.config = LIM.visitor.config;
    this.receiveDriverListeners = [];
    this.loadingTag = false;
    this.lastMsgTime = "-1";
    this.tagImage = new Image();
    this.tags = [];
    this.receiveTimer = null;
    var paramUrl = LIM.getParam();
    var visitorInfo = LIM.visitor.config['visitorInfo'];
    var configID = "";
    if(typeof live800_configID != "undefined"){
    	configID ="&configID="+live800_configID;
    }
    this.tagUrl = this.config["webAppUrl"] + "/SurferServer?cmd=101&companyID=" + this.config["companyId"]+ configID + (visitorInfo != "" ? "&" + visitorInfo : "") + (paramUrl != "" ? "&" + paramUrl : "");
    this.localTyping = false;
    this.initTags();
};
LIM.ReceiveDriver.prototype = {
    initTags: function(){
        this.tags["1"] = ["0000"];
        this.tags["2"] = ["6040"];
        this.tags["3"] = ["6021"];
        this.tags["4"] = ["6020"];
        this.tags["5"] = ["6031"];
    },
    getTag: function(){
        try {
            if (globalReceiveDriver.receiveStatus == "END") {
                return;
            }
            LIM.JustUrlLen();
            this.tagImage = new Image();
            var img = this.tagImage;
            this.loadingTag = true;
            this.tagImage.onload = function(){
                LIM.onTagSuccess.call(img);
                globalReceiveDriver.receiveTimer = setTimeout("globalReceiveDriver.getTag()", 15000);
            };
            this.tagImage.onerror = this.tagImage.onabort = function(){
                LIM.onTagError.call(img);
                globalReceiveDriver.receiveTimer = setTimeout("globalReceiveDriver.getTag()", 15000);
            };
            var tempTagUrl = this.tagUrl;
            tempTagUrl += "&isblock=0";
            tempTagUrl += "&act=0";
            tempTagUrl = tempTagUrl + '&rpcImageId=' + (new Date()).getTime();
            this.tagImage.src = tempTagUrl;
        } 
        catch (e) {
            globalReceiveDriver.receiveTimer = setTimeout("globalReceiveDriver.getTag()", 15000);
        }
    },
    onTagSuccess: function(inTagId){
        var tagId = inTagId;
        var cmds = this.tags[tagId];
        if (cmds == null) {
            return;
        }
        for (i in cmds) {
            if (typeof cmds[i] == "string" && typeof cmds[i] == "string") {
                if (cmds[i] == "0000") {
                    this.loadContent();
                }
                else {
                    var cmdNo = cmds[i].substring(0, 3);
                    var boolValue = cmds[i].substring(3);
                    var cmdParams = new Array();
                    cmdParams["tp"] = cmdNo;
                    cmdParams["content"] = boolValue;
                    for (j in this.receiveDriverListeners) {
                        if (typeof this.receiveDriverListeners[j] != "function" && this.receiveDriverListeners[j].receiveDriverReceived) 
                            this.receiveDriverListeners[j].receiveDriverReceived(cmdParams);
                    }
                }
            }
        }
        this.loadingTag = false;
    },
    onTagError: function(){
    },
    sendMessage: function(cmdParams){
    },
    start: function(){
        LIM.JustUrlLen();
        var tempTagUrl = this.tagUrl;
        tempTagUrl += "&isblock=0";
        tempTagUrl += "&act=0";
        tempTagUrl += "&pagetitle=" + LIM.page['title'];
        tempTagUrl += "&pagelocation=" + LIM.page['location'];
        
        if(tempTagUrl.indexOf("&pagereferrer=")==-1){
        	tempTagUrl += "&pagereferrer=" + LIM.page['referrer'];
        }
        tempTagUrl = tempTagUrl + '&rpcImageId=' + (new Date()).getTime();
        this.tagImage.src = tempTagUrl;
        this.receiveTimer = setTimeout("globalReceiveDriver.getTag()", 10000);
    },
    stop: function(){
        clearTimeout(this.receiveTimer);
        globalReceiveDriver.receiveStatus = "END";
    },
    addReceiveDriverListener: function(receiveDriverListener){
        if (receiveDriverListener != null) {
            this.receiveDriverListeners[this.receiveDriverListeners.length] = receiveDriverListener;
        }
    }
};
LIM.VisitServer = function(inVisitClient, inSendDriver){
    this.config = LIM.visitor.config;
    this.visitClient = inVisitClient;
    this.sendDriver = inSendDriver;
    this.visitServerTimer = null;
};
LIM.VisitServer.prototype = {
	initInvite:function(){
		var params = [];
		var inviteType = 0;
		if(!globalVisitHandle.inviteWindow.isauto){
			inviteType=1;
		}
        params[0] = "companyID=" + this.config["companyId"];
        params[1] = "inviteType="+inviteType;
        var rpcMethod = new LIM.RpcMethod("SurferServer", "116", params, 0, null, null);
        this.sendDriver.execute(rpcMethod);
	},
	acceptOrRefuseInvite:function(result){
		var params = [];
        params[0] = "companyID=" + this.config["companyId"];
        params[1] = "inviteResult="+result;
        params[2] = "inviteType=0";
        var rpcMethod = new LIM.RpcMethod("SurferServer", "116", params, 0, null, null);
        this.sendDriver.execute(rpcMethod);
	},
    refuseInvite: function(){
        var params = [];
        params[0] = "companyID=" + this.config["companyId"];
        params[1] = "accept=0";
        var rpcMethod = new LIM.RpcMethod("SurferServer", "102", params, 0, null, null);
        this.sendDriver.execute(rpcMethod);
    },
    acceptInvite: function(){
        var params = [];
        params[0] = "companyID=" + this.config["companyId"];
        params[1] = "accept=1";
        var rpcMethod = new LIM.RpcMethod("SurferServer", "102", params, 0, null, null);
        this.sendDriver.execute(rpcMethod);
    },
    initiatedChat: function(){
        var params = [];
        params[0] = "companyID=" + this.config["companyId"];
        var rpcMethod = new LIM.RpcMethod("SurferServer", "109", params, 0, null, null);
        this.sendDriver.execute(rpcMethod);
    },
    getAcceptInviteUrl: function(){
        var openUrl = this.config['webAppUrl'] + "/SurferServer?cmd=102";
        openUrl += "&accept=1";
        openUrl += "&visitorIDInSession=" + this.config["visitorIDInSession"];
        openUrl += "&companyID=" + this.config["companyId"];
        var jid = this.config['jid'];
        var param = LIM.getParam();
        var visitor = this.config['visitorInfo'];
        if (this.config.invite["configId"] && this.config.invite["configId"] != "") {
            openUrl += "&configID=" + this.config.invite["configId"];
        }
        return openUrl + (jid != "" ? "&jid=" + jid : "") + (param != "" ? "&" + param : "") + (visitor != "" ? "&" + visitor : "");
    },
    getInitiatedChatUrl: function(){
        var params = {
            "jid": this.config['jid'],
            "enterurl": UT.urlEncode(this.config['enterurl'])
        };
        var openUrl = this.config['webAppUrl'] + "/chatClient/chatbox.jsp?companyID=" + this.config["companyId"] + "&chatType=2";
        if (this.config.invite['configId']) 
            openUrl += "&configID=" + this.config.invite['configId'];
        return openUrl + "&" + UT.paramsToUrl(params) + (this.config['visitorInfo'] != '' ? "&" + this.config['visitorInfo'] : "")+getParamTracking();
    },
    getCallUrl: function(){
        var jid = this.config['jid'];
        var param = LIM.getParam();
        var visitor = this.config['visitorInfo'];
        var enterUrl = this.config['enterurl'];
        var openUrl = this.config['webAppUrl'] + "/chatClient/chatbox.jsp?companyID=" + this.config["companyId"] + (jid != "" ? "&jid=" + jid : "") + (param != "" ? "&" + param : "") + (visitor ? "&" + visitor : "");
        if (this.config.invite['configId']) {
            openUrl += "&configID=" + this.config.invite['configId'];
        }
        return openUrl + (this.config['enterurl'] ? "&enterurl=" + this.config['enterurl'] : "");
    },
    start: function(){
    },
    stop: function(){
        clearTimeout(this.visitServerTimer);
    }
};
LIM.VisitClient = function(inReceiveDriver, inSendDriver){
    this.config = LIM.visitor.config;
    this.receiveDriver = inReceiveDriver;
    this.sendDriver = inSendDriver;
    this.visitServer = new LIM.VisitServer(this, this.sendDriver);
    this.messageListeners = [];
    this.receiveDriver.addReceiveDriverListener(this);
};
LIM.VisitClient.prototype = {
    receiveDriverReceived: function(inCmdParams){
        var cmdParams = inCmdParams;
        var cmdNo = cmdParams["tp"];
        if (cmdNo == null) {
            return;
        }
        switch (cmdNo) {
            case "602":
                if (cmdParams["content"] == "1") {
                    for (j in this.messageListeners) {
                        if (this.messageListeners[j].showInvite) 
                            this.messageListeners[j].showInvite();
                    }
                }
                else {
                    for (j in this.messageListeners) {
                        if (this.messageListeners[j].hideInvite) 
                            this.messageListeners[j].hideInvite();
                    }
                }
                break;
            case "603":
                for (j in this.messageListeners) {
                    if (this.messageListeners[j].openInitiatedChat) {
                        this.messageListeners[j].openInitiatedChat();
                    }
                }
                break;
            case "604":
                for (j in this.messageListeners) {
                    if (this.messageListeners[j].reloadIcon) {
                        this.messageListeners[j].reloadIcon();
                    }
                }
                break;
            case "608":
                for (j in this.messageListeners) {
                    if (this.messageListeners[j].setConfig) {
                        this.messageListeners[j].setConfig(cmdParams);
                    }
                }
                break;
            default:
                break;
        }
    },
    initInvite: function(){
        this.visitServer.initInvite();
    },
    acceptOrRefuseInvite: function(result){
        this.visitServer.acceptOrRefuseInvite(result);
    },
    refuseInvite: function(){
        this.visitServer.refuseInvite();
    },
    acceptInvite: function(){
        this.visitServer.acceptInvite();
    },
    initiatedChat: function(){
        this.visitServer.initiatedChat();
    },
    getAcceptInviteUrl: function(){
        return this.visitServer.getAcceptInviteUrl();
    },
    getInitiatedChatUrl: function(){
        return this.visitServer.getInitiatedChatUrl();
    },
    getCallUrl: function(){
        return this.visitServer.getCallUrl();
    },
    start: function(){
        //if (UT.isCookie()) {//fix bug:This function return false if the explore is chrome 19.0.1084.56.m
            this.receiveDriver.start();
            this.visitServer.start();
        //}
		setTimeout("globalVisitClient.sendSurferInfo()",1000);
    },
    stop: function(){
        this.receiveDriver.stop();
        this.visitServer.stop();
    },
    addMessageListener: function(messageListener){
        if (messageListener != null) {
            this.messageListeners[this.messageListeners.length] = messageListener;
	        }
    },
	sendSurferInfo:function(){
		this.receiveDriver.loadingTag = true;
		this.receiveDriver.tagImage.onload = null;
		this.receiveDriver.tagImage.onerror = null;
		var tempTagUrl =LIM.getProtocol() + "//" + LIM.visitor.config["baseWebApp"]+"/SurferServer?cmd=115&companyID=" +LIM.visitor.config["companyId"];
		tempTagUrl +=getPlatformInfo();
		tempTagUrl = tempTagUrl +  '&rpcImageId=' + (new Date()).getTime();
		this.receiveDriver.tagImage.src = tempTagUrl;
	}
};
LIM.VisitHandle = function(inVisitClient, inWindow, inInviteWindow){
    this.config = LIM.visitor.config;
    this.visitClient = inVisitClient;
    this.visitWindow = inWindow;
    this.visitDocument = inWindow.document;
    this.inviteWindow = inInviteWindow;
    this.chatWindow = null;
    this.hasChatted = false;
    this.initListener();
};
LIM.VisitHandle.prototype = {
    showInvite: function(){
        if (!$$obj('live800_invite_window')) {
            new UT.JSONRequest(LIM.visitor.config['scriptPath'] + 'inviteWindow.js', 'live800_invite_window', function(){
                LIM.callback.invite();
                globalVisitHandle.inviteWindow.operatorInvite = false;
                globalVisitHandle.inviteWindow.isauto = false;
                globalVisitHandle.inviteWindow.operatorInvite = true;
                globalVisitHandle.visitWindow.focus();
                globalVisitHandle.inviteWindow.show();
            });
            return;
        }
        this.inviteWindow.operatorInvite = false;
        this.visitWindow.focus();
        this.inviteWindow.isauto = false;
        this.inviteWindow.operatorInvite = true;
        this.inviteWindow.show();
    },
    hideInvite: function(){
        this.inviteWindow.hide();
    },
    openInitiatedChat: function(autoConnect){
        var openUrl = this.visitClient.getInitiatedChatUrl();
        var companyId = LIM.visitor.config["companyId"];
		var autoConnect=autoConnect?"&ac="+autoConnect:"";
			openUrl=openUrl+autoConnect;
        if (LIM.specials[companyId]) {
            LIM.specials[companyId].apply(window, [openUrl]);
            return;
        }
        var $class = function(className, parentElement){
            var childs = ($$obj(parentElement) || document.body).getElementsByTagName('*'), length = childs.length;
            var elements = [];
            for (var i = 0; i < length; i++) {
                if (childs[i].className.match(new RegExp("(^|\\s)" + className + "(\\s|$)"))) {
                    elements.push(childs[i]);
                }
            }
            return elements;
        };
        if (!this.hasChatted) {
            var handle = this;
            new UT.JSONRequest(LIM.visitor.config['scriptPath'] + "initiated.js", "lim_initiated_script", function(){
                document.getElementById("lim_initiated_script").setAttribute("lim:value", "init");
                LIM.initChatInIframe(openUrl + "&inviteStyle=" + LIM.visitor.config.invite["live800_invite_style"] + "&block=1");
                UT.dragWindow($class('mini_wrap', "lim_mini_chat")[0], $$obj("lim_mini_chat"));
                $class('close', 'lim_mini_chat')[0].onclick = closeMini;
                $class('maximize', 'lim_mini_chat')[0].onclick = maxChatWindow;
                $class('minimize', 'lim_mini_chat')[0].onclick = minChatWindow;
                handle.hasChatted = true;
            }, function(){
                throw new Error("create initiated chat frame fail!");
            });
            var rs = false;
            return rs;
        }
        else {
            $$obj('chat_iframe').src = openUrl + "&inviteStyle=" + LIM.visitor.config.invite["live800_invite_style"] + "&block=1&t=" + new Date().getTime();
            $$obj('lim_mini_chat').style.display = "";
        }
    },
    reloadIcon: function(){
        var live800iconList = document.getElementsByName("live800icon");
        if (live800iconList == null) {
            return;
        }
        for (i = 0; i < live800iconList.length; i++) {
            temp = live800iconList[i].src;
            temp += "&rpcImageId=" + (new Date()).getTime();
            live800iconList[i].src = temp;
        }
    },
    onInitInviteWindow: function(){
        this.visitClient.initInvite();
    },
    onAcceptOrRefuseInvite:function(result){
    	this.visitClient.acceptOrRefuseInvite(result);
    },
    onInviteWindowAccept: function(){
        var openUrl = this.visitClient.getAcceptInviteUrl();
        var winAttr = globalWindowAttribute;
        try {
            var chatWindow = window.open(openUrl, 'chatbox' + this.config["companyId"], winAttr);
            chatWindow.focus();
        } 
        catch (e) {
        }
        return false;
    },
    onInviteWindowRefuse: function(){
        this.visitClient.refuseInvite();
    },
    onIconClick: function(){
        var openUrl = this.visitClient.getCallUrl();
        var winAttr = globalWindowAttribute;
        if (typeof(this.chatWindow) == "undefined" || this.chatWindow == null) {
            this.chatWindow = window.open(openUrl, 'chatbox' + this.config["companyId"], winAttr);
        }
        try {
            this.chatWindow.focus();
            this.chatWindow.opener = window;
        } 
        catch (e) {
            this.chatWindow = window.open(openUrl, 'chatbox' + this.config["companyId"], winAttr);
        }
        return false;
    },
    initListener: function(){
        this.visitClient.addMessageListener(this);
    }
};
function closeMini(){
    var img = new Image();
    img.src = LIM.visitor.config["webAppUrl"] + "/ChaterServer?cmd=202&visitorIDInSession=" + LIM.visitor.config["companyId"] + "chater&rpcImageId=" + (new Date()).getTime();
    $$obj('chat_iframe').src = LIM.visitor.config["baseChatHtmlDir"]+"/space.gif";
    $$obj('lim_mini_chat').style.display = "none";
};
function maxChatWindow(){
    $$obj('lim_mini_chat').style.display = "none";
    var openUrl = globalVisitHandle.visitClient.getInitiatedChatUrl() + "&block=0&middleFlag=1&tm=" + new Date().getTime();
    var chatWindow;
    var winAttr = globalWindowAttribute;
    if (isChatWindowViaSSL) {
        openUrl = openUrl.replace("http:", "https:");
        openUrl += "&s=1";
    }
    try {
        chatWindow = window.open(openUrl, 'chatbox' + LIM.visitor.config["companyId"], winAttr);
        chatWindow.name = 'chatbox' + LIM.visitor.config["companyId"];
        chatWindow.focus();
        chatWindow.opener = window;
        $$obj('lim_frame').src = LIM.visitor.config['webAppUrl'] + "/chatClient/iframe.html";
    } 
    catch (e) {
        chatWindow = window.open(openUrl, 'chatbox' + LIM.visitor.config["companyId"], winAttr);
        chatWindow.name = 'chatbox' + LIM.visitor.config["companyId"];
        chatWindow.focus();
        chatWindow.opener = window;
        $$obj('lim_frame').src = LIM.visitor.config['webAppUrl'] + "/chatClient/iframe.html";
    }
    return false;
};
function minChatWindow(){
    $$obj('lim_mini_effects').src = LIM.visitor.config['webAppUrl'] + "/chatClient/effects.html?" + new Date().getTime();
    $$obj('lim_mini_chat').style.display = "none";
    $$obj('lim_mini').style.display = "";
    $$obj('lim_restore').onclick = function(){
        $$obj('lim_mini').style.display = "none";
        $$obj('lim_mini_chat').style.display = "";
        $$obj('lim_mini_effects').src = LIM.visitor.config['webAppUrl'] + "/chatClient/effects.html?" + new Date().getTime();
    };
};
function getParamTracking(){
    var paramUrl = "";
    var getCookie = UT.getCookie;
    
    if(typeof operator != "undefined"){
		paramUrl = "&operatorId=" + operator["id"];
	}else if (typeof skill != "undefined") {		    
		paramUrl = "&skillId=" + skill["id"];
	}
    if(paramUrl == ""){
        if (getCookie("operatorId") != null && typeof getCookie("operatorId") != "undefined" && getCookie("operatorId").length != 0 && getCookie("operatorId") != "undefined") {
            paramUrl = "&operatorId=" + getCookie("operatorId");
        }else if (getCookie("skillId") != null && getCookie("skillId") != "undefined" && getCookie("skillId").length != 0 && getCookie("skillId") != "undefined") {        
            paramUrl = "&skillId=" + getCookie("skillId");
        }
    }
    return paramUrl;
};
function getPlatformInfo(){
	var infos="";
	infos+="&browser="+getBrowserVersion();
	infos+="&opsys="+getOperatorSystem();
	infos+="&screen="+getScreenInfo();
	return infos;
};
function getBrowserVersion(){
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
};
function getOperatorSystem(){
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
};
function getScreenInfo(){
	return screen.width+"*"+screen.height;
};