"use strict";

function getContentView(id) {
  var lang = document.querySelector("html").getAttribute("lang");
  history.replaceState(null, null, " ");
  var ajx = new XMLHttpRequest();
  var pageRP = '';

  ajx.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      pageRP = ajx.responseText;

      if (document.querySelector("html").getAttribute("admin") === null) {
        document.querySelector("#mainContent").innerHTML = pageRP;
      } else {
        document.querySelector("#mainAdminContent").innerHTML = pageRP;
      }
    }
  }; //let page = `/sys/View/pages/${id}.view.php`;


  if (document.querySelector("html").getAttribute("admin") === null) {
    ajx.open("POST", "/index.php?content_page=1", true);
  } else {
    ajx.open("POST", "/admin/index.php?content_page=1", true);
  }

  ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajx.send("id=" + id + "&lang=" + lang);
  window.location.hash += id;
}
"use strict";

function getThisContentView(x) {
  var _id = x.id;

  var id = _id.split("#").pop();

  var name = x.querySelector("span").innerHTML;
  getContentView(id);
}
"use strict";

var translated;

function getTranslate(text, fun) {
  var _lang = document.querySelector("html");

  var lang = _lang.getAttribute("lang");

  var ajx = new XMLHttpRequest();

  ajx.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var _fromDB = ajx.responseText;
      var fromDB = JSON.parse(_fromDB);
      fun();
    }
  };

  ajx.open("POST", "/sys/helpers/pmTranslateEngine.php", true);
  ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajx.send("lang=" + lang + "&text=" + text);
}
"use strict";

document.addEventListener("DOMContentLoaded", initFun);
var PM_DIR = document.querySelector("html").getAttribute("dir");
var PM_LANG = document.querySelector("html").getAttribute("lang");
var PM_ISADMIN = document.querySelector("html").getAttribute("admin");
var PM_ARR_OF_LANGS = ["en", "ru", "he"];

if (PM_DIR === "ltr") {
  var PM_DIROPOSITE = "rtl";
  var PM_LTR = true;
} else if (PM_DIR === "rtl") {
  var _PM_DIROPOSITE = "ltr";
  var _PM_LTR = false;
} else {
  console.log("PM_DIR ERROR!");
}

function initFun() {
  setHamburgerMenu();
  setRouter();
  setChangeLang();
  setBarAsset();
  initModalLocalisation();
  new Thebility().init(); //end of functions list!

  var setURL = window.location.hash;
  if (setURL == "") return;
  var id = setURL.split("#").pop();
  if (id == null || !isFinite(id) || id != parseInt(id, 10)) return;
  getContentView(id);
}
"use strict";

function setBarAsset() {
  var el = document.querySelector("#pm_id_Bar .pm_bar_asset");
  el.addEventListener("click", function () {
    showPMInformation();
  });
}
"use strict";

function setChangeLang() {
  var el = document.querySelector('.pm_Lang img');
  var el2 = document.querySelector('.pm_langNav');

  if (el != null) {
    el.addEventListener("click", function () {
      el2.classList.toggle("--active");
    });
  }
}
"use strict";

function setHamburgerMenu() {
  var hamburger = document.querySelectorAll(".pm_hamburger")[0];
  if (hamburger == null) return;
  var mobileBar = document.querySelectorAll(".pm_mobileBar")[0];
  var helperDiv = document.createElement("div");
  helperDiv.setAttribute("class", "hamburgerHelperDiv");
  helperDiv.addEventListener("click", function () {
    hamburger.click();
    helperDiv.remove();
  });
  hamburger.addEventListener("click", function () {
    document.body.appendChild(helperDiv);
    hamburger.classList.toggle("is-active");
    var active = hamburger.classList.contains("is-active");

    if (active) {
      mobileBar.style.display = "flex";
      setTimeout(function () {
        if (PM_LTR) {
          mobileBar.style.left = "0";
        } else {
          mobileBar.style.right = "0";
        }

        mobileBar.style.transition = "ease 1s";
      }, 10);
    } else {
      helperDiv.remove();

      if (PM_LTR) {
        mobileBar.style.left = "-60vw";
      } else {
        mobileBar.style.right = "-60vw";
      }

      mobileBar.style.transition = "ease 0.2s";
      setTimeout(function () {
        mobileBar.style.display = "none";
      }, 10);
    }
  });
}
"use strict";

function setRouter() {
  if (PM_ISADMIN == null) {
    var els = document.querySelectorAll(".nav_item");
  } else {
    var els = document.querySelectorAll(".nav_admin_item");
  }

  els.forEach(function (el) {
    el.addEventListener("click", function () {
      getThisContentView(this);
    });
  });
}
"use strict";

var _redom = require("redom");

class Modal {
  constructor() {
    document.querySelector("#pm_overlay").style.display = "flex";
    this.mr = getRandMath(1, 1000);
    this.idname = "#pm_modal_" + this.mr;
    this.el = (0, _redom.el)("".concat(this.idname, " .pm_modal pm_modal_parent"));
    this.titlear = (0, _redom.el)(".pm_modal pm_modal_titleArea");
    this.content = (0, _redom.el)(".pm_modal pm_modal_contentArea");
    this.buttons = (0, _redom.el)(".pm_modal pm_modal_buttonsArea");
    this.body = document.body;
    (0, _redom.mount)(this.body, this.el);
    (0, _redom.mount)(this.el, this.titlear);
    (0, _redom.mount)(this.el, this.content);
    (0, _redom.mount)(this.el, this.buttons);
  } //BASE ELEMENTS


  icon(fun, clas) {
    (0, _redom.mount)(this.el, (0, _redom.el)(".".concat(clas, " pm_modal pm_modal_icon"), {
      onclick: function onclick() {
        fun();
      }
    }));
  }

  title(text) {
    var titlear = this.titlear;
    (0, _redom.mount)(titlear, (0, _redom.el)(".pm_modal pm_modal_title", text));
  }

  button(fun, text) {
    var but = this.buttons;
    (0, _redom.mount)(but, (0, _redom.el)("input.pm_modal pm_modal_button", {
      type: "button",
      onclick: fun,
      value: text
    }));
  } //to content


  input(type) {
    (0, _redom.mount)(this.content, (0, _redom.el)("input.pm_modal pm_modal_input", {
      type: type
    }));
  }

  img(src) {
    (0, _redom.mount)(this.content, (0, _redom.el)("img.pm_modal pm_modal_img", {
      src: src
    }));
  }

  text(text) {
    (0, _redom.mount)(this.content, (0, _redom.el)("input.pm_modal pm_modal_text", text));
  }

  div(content, clas) {
    (0, _redom.mount)(this.content, (0, _redom.el)(".pm_modal ".concat(clas, " pm_modal_innerdiv"), content));
  }

  span(clas) {
    (0, _redom.mount)(this.content, (0, _redom.el)("span.pm_modal ".concat(clas, " pm_modal_span")));
  }

  canvas(id) {
    (0, _redom.mount)(this.content, (0, _redom.el)("canvas#".concat(id, ".pm_modal pm_modal_canvas")));
  } //vars


  get id() {
    return this.idname.substring(1) + " ";
  }

  close(closetype, id) {
    if (closetype === 1) {
      document.querySelector("#pm_overlay").style.display = "none";
      document.getElementById(id).remove();
    }

    if (closetype === 2) {
      document.getElementById(id).remove();
    }

    if (closetype === 3) {
      location.reload();
    }
  } //ELEMENTS
  //icons


  closeIcon(closetype) {
    var id = this.id;
    var close = this.close;
    this.icon(function () {
      close(closetype, id);
    }, "pm_modal_icon_close");
  }

  dragIcon() {
    var id = this.id;
    var el = document.getElementById(id);
    this.icon(function () {
      drag(el.querySelector(".pm_modal_icon_drag"));
    }, "pm_modal_icon_drag");
  } //close button


  buttonClose(closetype, text) {
    var id = this.id;
    var close = this.close;
    this.button(function () {
      close(closetype, id);
    }, text);
  }

}
"use strict";

function pmAlert(closetype) {
  var el = pmModalBase(closetype);
  el.title(PM_MODAL_LOC[0]);
  el.buttonClose(closetype, PM_MODAL_LOC[3]);
}
"use strict";

function pmModalBase(closetype) {
  var el = new Modal();
  el.dragIcon();
  el.closeIcon(closetype);
  return el;
}
"use strict";

function pmPrompt(title, fun, content, closetype) {
  var el = pmModalBase(closetype);
  el.title(title);
  el.button(function () {
    fun();
  }, PM_MODAL_LOC[6]);
  el.buttonClose(closetype, PM_MODAL_LOC[5]);
  el.div(content, "");
}
"use strict";

var PM_MODAL_LOC = [];

function initModalLocalisation() {
  var wordsToTranslate = ["alert", "back", "cancel", "close", "error", "no", "yes"];
  var name = JSON.stringify(wordsToTranslate);
  var ajx = new XMLHttpRequest();

  ajx.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var fromDB = JSON.parse(ajx.responseText);
      PM_MODAL_LOC = fromDB; // console.log(PM_MODAL_LOC);
    }
  };

  ajx.open("POST", "/sys/modules/initModalTranslate.php", true);
  ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8");
  ajx.send("name=" + name + "&lang=" + PM_LANG);
}
"use strict";

function Thebility() {
  this.init = function () {
    document.querySelector("#thebilityIcon").addEventListener("click", function () {
      toggleThebility();
    });
    document.querySelector("#dragThebility").addEventListener("click", function () {
      drag(this.parentNode);
    });
    document.querySelector("#closeThebility").addEventListener("click", function () {
      closeThebility(this.parentNode);
    });
    document.querySelector(".thebilityDiv #fontDivSizeSlider").addEventListener("input", function () {
      fontDivSizeSlider(this.value);
    });
    document.querySelector(".thebilityDiv #graySlider").addEventListener("input", function () {
      graySlider(this.value);
    });
    document.querySelector(".thebilityDiv #contrastSlider").addEventListener("input", function () {
      contrastSlider(this.value);
    });
    document.querySelector(".thebilityDiv #brightnessSlider").addEventListener("input", function () {
      brightnessSlider(this.value);
    });
    document.querySelector(".thebilityDiv#bolderFont").addEventListener("click", function () {
      bolderFont();
    });
    document.querySelector(".thebilityDiv#animPause").addEventListener("click", function () {
      animPause();
    });
    document.querySelector(".thebilityDiv#aUnderline").addEventListener("click", function () {
      aUnderline();
    });
    document.querySelector(".thebilityDiv#invertHtml").addEventListener("click", function () {
      invertHtml();
    });
  };

  var enabled = !1;
  var enabled2 = !1;
  var enabled3 = !1;
  var enabled4 = !1;
  var enabled5 = !1;
  var enabled6 = !1;

  function toggleThebility() {
    if (!enabled) {
      enabled = !0;

      var _thebilityMainDiv = document.getElementById("thebilityMainDiv");

      _thebilityMainDiv.style.display = "flex";
      setTimeout(function () {
        _thebilityMainDiv.style.opacity = "1";
      }, 100);
    } else {
      enabled = !1;
      thebilityMainDiv.style.display = "none";
      thebilityMainDiv.style.opacity = "0";
    }
  }

  function closeThebility(x) {
    enabled = !1;
    thebilityMainDiv.style.display = "none";
    thebilityMainDiv.style.opacity = "0";
  }

  function fontDivSizeSlider(v) {
    var x = document.querySelectorAll("div:not(.thebility), span, p, br, h1, h2, h3, h4, h5, h6, strong, em, blockquote, hr, code, ul, li, ol, pre, mark, ins, del, sup, sub, small, i, b");

    for (var i = 0; i < x.length; i++) {
      x[i].style.fontSize = v + "vh";
    }
  }

  function graySlider(v) {
    var x = document.querySelectorAll("html");
    var contV = document.getElementById("contrastSlider").value;
    var brighV = document.getElementById("brightnessSlider").value;

    for (var i = 0; i < x.length; i++) {
      x[i].style.filter = "contrast(" + contV + ") brightness(" + brighV + ") grayscale(" + v + ")";
    }
  }

  function contrastSlider(v) {
    var x = document.querySelectorAll("html");
    var grayV = document.getElementById("graySlider").value;
    var brighV = document.getElementById("brightnessSlider").value;

    for (var i = 0; i < x.length; i++) {
      x[i].style.filter = "grayscale(" + grayV + ") brightness(" + brighV + ") contrast(" + v + ")";
    }
  }

  function brightnessSlider(v) {
    var x = document.querySelectorAll("html");
    var grayV = document.getElementById("graySlider").value;
    var contV = document.getElementById("contrastSlider").value;

    for (var i = 0; i < x.length; i++) {
      x[i].style.filter = "grayscale(" + grayV + ") contrast(" + contV + ") brightness(" + v + ")";
    }
  }

  function bolderFont() {
    var texts = document.querySelectorAll("div:not(.thebility), span, p, br, h1, h2, h3, h4, h5, h6, strong, em, blockquote, hr, code, ul, li, ol, pre, mark, ins, del, sup, sub, small, i, b");

    if (!enabled6) {
      enabled6 = !0;

      for (var i = 0; i < texts.length; i++) {
        texts[i].classList.add("bolderfont");
      }
    } else {
      enabled6 = !1;

      for (var _i = 0; _i < texts.length; _i++) {
        texts[_i].classList.remove("bolderfont");
      }
    }
  }

  function animPause() {
    var elems = document.querySelectorAll("div,span,img");

    if (!enabled2) {
      enabled2 = !0;

      for (var i = 0; i < elems.length; i++) {
        elems[i].classList.add("animPause");
      }
    } else {
      enabled2 = !1;

      for (var _i2 = 0; _i2 < elems.length; _i2++) {
        elems[_i2].classList.remove("animPause");
      }
    }
  }

  function aUnderline() {
    var links = document.getElementsByTagName("a");

    if (!enabled3) {
      enabled3 = !0;

      for (var i = 0; i < links.length; i++) {
        links[i].classList.add("aUnderline");
      }
    } else {
      enabled3 = !1;

      for (var _i3 = 0; _i3 < links.length; _i3++) {
        links[_i3].classList.remove("aUnderline");
      }
    }
  }

  function invertHtml() {
    var html = document.getElementsByTagName("html");

    if (!enabled5) {
      enabled5 = !0;
      html[0].classList.add("invertHtml");
    } else {
      enabled5 = !1;
      html[0].classList.remove("invertHtml");
    }
  }
}
"use strict";

function showPMInformation() {
  pmPrompt(PM_MODAL_LOC[0], function () {
    alert("alert");
  }, "This is prompt. Do something?", 1);
}
"use strict";

function drag(elmnt) {
  var pos1 = 0,
      pos2 = 0,
      pos3 = 0,
      pos4 = 0;

  if (document.getElementById(elmnt.id + "header")) {
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    elmnt.parentNode.style.top = elmnt.parentNode.offsetTop - pos2 + "px";
    elmnt.parentNode.style.left = elmnt.parentNode.offsetLeft - pos1 + "px";
  }

  function closeDragElement() {
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
"use strict";

function getRandMath(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
