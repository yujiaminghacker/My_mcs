if (!LIM)     var LIM = {};LIM.initComponent = function(){	var placeHolder=('https:' == document.location.protocol?("https://"+live800_baseUrl + live800_baseWebApp+"/blank.html"):"about:blank");    LIM.createNode({        type: "div",        id: "InviteWindow",        style: {            "zIndex": 2147483647,            visibility: "hidden"        }    });    LIM.createNode({        type: "iframe",        id: "lim_current",        style: {            display: "none",            position: "absolute",            top: 0,            left: 0,            border: "none",            zIndex: -1,            background: "#fff"        },        attributes: {            width: "100%",            src: placeHolder,            scrolling: "auto",            border: "0",            frameborder: "0"        }    });    if (live800_companyID != "78439") {        LIM.createNode({            type: "div",            id: "lim_mini_chat",            style: {                display: "none"            }        }).innerHTML = '<div><div class="mini_wrap" title="\u6309\u4f4f\u9f20\u6807\uff0c\u53ef\u4ee5\u62d6\u52a8\u6211\u54df!"></div></div>';    }    else {        LIM.createNode({            type: "div",            id: "lim_mini_chat",            style: {                display: "none"            }        }).innerHTML = '<div style="position:relative"><div class="mini_wrap" title="\u6309\u4f4f\u9f20\u6807\uff0c\u53ef\u4ee5\u62d6\u52a8\u6211\u54df!"></div></div>';    }    LIM.createNode({        type: "div",        id: "lim_mini",        style: {            display: "none"        }    }).innerHTML = '<div class="bg_wrap"></div><div id="lim_restore"></div><iframe src="'+placeHolder+'" id="lim_mini_effects" name="lim_mini_effects" scrolling="0" border="0" frameborder="0" allowtransparency="true"></iframe>';    LIM.createNode({        type: "iframe",        id: "lim_frame",        style: {            display: "none"        },        attributes: {            height: 0,            width: 0,			src: placeHolder        }    });    LIM.createNode({        type: "div",        id: "lim:sharedObject",        style: {            position: "absolute",            zIndex: -3,            top: 0,            left: 0,            display:"none"        }    });};LIM.lazyCreation = function(){    try {        LIM.initComponent();        LIM.visitor.start();    }     catch (e) {        setTimeout(function(){            LIM.lazyCreation();        }, 20);    }};(function(){    if (!-[1, ]) {        if (document.readyState == "complete") {            LIM.lazyCreation();        }        else {            window.attachEvent("onload", function(){                LIM.lazyCreation();            });        }    }    else {        LIM.lazyCreation();    }})();