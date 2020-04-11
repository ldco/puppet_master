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
    if (document.querySelector("html").getAttribute("data-dev") === "true") {
      ajx.open("POST", "/PM_DEV/index.php?content_page=1", true);
    } else {
      ajx.open("POST", "/index.php?content_page=1", true);
    }
  } else {
    if (document.querySelector("html").getAttribute("data-dev") === "true") {
      ajx.open("POST", "/PM_DEV/admin/index.php?content_page=1", true);
    } else {
      ajx.open("POST", "/admin/index.php?content_page=1", true);
    }
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

function pmGetTranslate(text, fun) {
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

function setOnScroll(element, classname) {
  var height = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 180;
  window.addEventListener("scroll", function () {
    var win = window.scrollY;
    var el = document.querySelector(element);

    if (win > height) {
      el.classList.add(classname);
    } else {
      el.classList.remove(classname);
    }
  });
}
"use strict";

function smoothScroll(elems) {
  document.querySelectorAll(elems).forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
} //all anchors:
//'a[href^="#"]'
"use strict";

document.addEventListener("DOMContentLoaded", initFun);
window.addEventListener("hashchange", setPageFunctions, false);
var PM_DIR = document.querySelector("html").getAttribute("dir");
var PM_LANG = document.querySelector("html").getAttribute("lang");
var PM_ISADMIN = document.querySelector("html").getAttribute("data-admin");
var PM_ISMOB = document.querySelector("html").getAttribute("data-mob");
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
  setGoTopButton();
  setOnScroll("#pm_id_Bar", "pm_bar_scrolled");
  initModalLocalisation();
  new Thebility().init();
  mainPageIntro();
  /*end of functions list!*/

  var setURL = window.location.hash;
  if (setURL == "") return;
  var id = setURL.split("#").pop();
  if (id == null || !isFinite(id) || id != parseInt(id, 10)) return;
  getContentView(id);
}
"use strict";

function setBarAsset() {
  var el = document.querySelector("#pm_id_Bar .pm_bar_asset");
  el.addEventListener("click", function () {//showPMInformation();
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

function setGoTopButton() {
  var el = "#pm_gototop";
  setOnScroll("#pm_gototop", "pm_gototop_scrolled", 180);
  document.querySelector(el).addEventListener("click", function () {
    window.scroll({
      top: 0,
      left: 0,
      behavior: 'smooth'
    });
  });
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
  var els;

  if (PM_ISADMIN === "false") {
    els = document.querySelectorAll(".nav_item");
  } else {
    els = document.querySelectorAll(".nav_admin_item");
  }

  els.forEach(function (el) {
    el.addEventListener("click", function () {
      getThisContentView(this);
    });
  });
}
"use strict";

var AOS = require("aos");

function aosjs(id) {
  var anim = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "fade";
  var offset = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;
  var duration = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 600;
  var delay = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 0;

  for (var i = 0; i < document.querySelectorAll("#" + id + " div").length; i++) {
    document.querySelectorAll("#" + id + " div")[i].setAttribute("data-aos", anim);
  }

  AOS.init({
    offset: offset,
    duration: duration,
    easing: "ease-in-sine",
    delay: delay
  });
}
"use strict";

function pmEmailLoader(page) {
  var loader = document.createElement("div");

  var _parent = "#pm_page_" + page;

  var parent = document.querySelector(_parent);

  function init_setEmailLoader() {
    loader.setAttribute("class", "pm_loader pm_emailLoader");
    parent.appendChild(loader);
    document.querySelector("#pm_overlay").style.display = "flex";
  }

  var form = document.querySelectorAll(_parent + " form");
  form.forEach(function (el) {
    el.addEventListener("submit", function () {
      init_setEmailLoader();
    });
  });
}
"use strict";

function pmLoader(el, parent, event) {
  var id = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : "pm_loader";
  var loader = document.createElement("div");

  function initLoader() {
    loader.setAttribute("id", id);
    loader.setAttribute("class", "pm_loader ");
    document.querySelector(parent).appendChild(loader);
  }

  initLoader();
  document.querySelector(el).addEventListener(event, function () {
    loader.remove();
  });
}
"use strict";

var Macy = require("macy");

function macyjs(id, col) {
  var margin = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;
  var elid = "#" + id;

  function pre_iniMacy(fun) {
    setTimeout(function () {
      fun();
    }, 400);
  }

  function initMacy(fun) {
    makeMacy();
    setTimeout(function () {
      fun();
    }, 100);
  }

  function makeMacy() {
    var macy = Macy({
      container: elid,
      trueOrder: true,
      waitForImages: true,
      margin: margin,
      columns: col
    });
    document.querySelector(elid).style.width = "100%";
    document.querySelectorAll(elid + " img").forEach(function (el) {
      el.style.width = "100%";
    });
  }

  pre_iniMacy(function () {
    initMacy(function () {
      document.querySelector(elid).style.opacity = "1";

      if (document.querySelector(".pm_loader")) {
        document.querySelector(".pm_loader").remove();
      }
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
  el.closeIcon(closetype); //drag fix

  document.querySelector(".pm_modal_icon_drag").click();
  /**/

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
  var ifdev = document.getElementsByTagName("html")[0].getAttribute("data-dev");
  var ajx = new XMLHttpRequest();
  var sysFolder;

  if (ifdev === "true") {
    sysFolder = "/PM_DEV/sys/";
  } else {
    sysFolder = "/sys/";
  }

  ajx.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var fromDB = JSON.parse(ajx.responseText);
      PM_MODAL_LOC = fromDB;
    }
  };

  ajx.open("POST", sysFolder + "modules/initModalTranslate.php", true);
  ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8");
  ajx.send("name=" + name + "&lang=" + PM_LANG);
}
"use strict";

function teamHelp() {
  var els = document.querySelectorAll('[class*="pm_team_rank_"]');
  var arr = [];
  els.forEach(function (el) {
    var el2 = el.className;
    var el3 = el2.split("pm_team_rank_").pop();
    arr.push(el3);
  });
  arr = new Set(arr);
  /* if (!/in/.test(document.readyState)) //checks if document ready */

  arr.forEach(function (el) {
    var div = document.createElement("div");
    var els = document.querySelectorAll(".pm_team_rank_" + el);
    els.forEach(function (elm) {
      div.appendChild(elm);
      div.setAttribute("class", "pm_team_wrapper_rank_" + el);
      document.querySelector(".pm_team").appendChild(div);
    });
  });
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

      var _thebilityMainDiv = document.getElementById("thebilityMainDiv"); //fix workaround for drag button


      document.querySelector("#dragThebility").click();
      /**/

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

function mainPageIntro() {
  if (window.location.hash !== "" && window.location.hash !== "#1") return;
  var dir = document.getElementsByTagName("html")[0].getAttribute("dir");

  function getRandomInt(min, max) {
    return Math.random() * (max - min) + min;
  }

  function presentation() {
    for (var i = 0; i < 7; i++) {
      var _pre = document.createElement("div");

      var _pre1 = document.createElement("div");

      _pre.setAttribute("class", "page_O_present_anim_1");

      document.getElementById("pm_page_1").appendChild(_pre1);

      _pre1.appendChild(_pre);
    }

    var colors = ["#597884", "#aebecb", "#294552", "#00070a"];
    var pre1 = document.getElementsByClassName("page_O_present_anim_1");

    var _loop = function _loop(_i) {
      pre1[_i].style.height = getRandomInt(1, 1.5) + "vh";
      pre1[_i].style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
      pre1[_i].style.width = "100vw";
      pre1[_i].style.position = "absolute";
      pre1[_i].style.top = getRandomInt(60, 70) + "vh";
      pre1[_i].style.transition = "2s";
      pre1[_i].style.zIndex = "3";
      pre1[_i].style.opacity = "0.8";

      if (dir == "ltr") {
        pre1[_i].style.left = "-100vw";
      } else {
        pre1[_i].style.right = "-100vw";
      }

      setTimeout(function () {
        if (dir === "ltr") {
          pre1[_i].style.left = "0";
        } else {
          pre1[_i].style.right = "0";
        }
      }, 500);
    };

    for (var _i = 0; _i < pre1.length; _i++) {
      _loop(_i);
    }
  }

  presentation();
  var bgimages = ["", "", "", "", "", ""];
  var videoParent = document.getElementById("bgVideo");

  function x(folder) {
    videoParent.style.backgroundImage = "url('sys/assets/images/" + folder + "/page_1/" + Math.floor(Math.random() * 10 + 1) + ".png')";
  }

  x("images");
}
"use strict";

var Swiper = require("swiper");

function archSlider() {
  var mySwiper = new Swiper(".archSlider", {
    // Optional parameters
    direction: "horizontal",

    /* effect: 'fade', */
    centeredSlides: true,

    /*  autoplay: {
     delay: 2500,
     disableOnInteraction: false,
     }, */
    loop: true,
    // If we need pagination
    pagination: {
      el: ".swiper-pagination"
    },
    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    } // And if we need scrollbar

    /*  scrollbar: {
        el: ".swiper-scrollbar"
    } */

  });
}
"use strict";

function downloadAllFonts() {}
"use strict";

function downloadFont(font) {
  var folder = "";
  var fileName = font + ".zip";
  var link = document.createElement("a");
  link.href = folder + fileName;
  link.click();
  link.remove();
  if (document.querySelector(".pm_modal_parent")) document.querySelector(".pm_modal_parent").remove();
  if (document.querySelector("pm_overlay").style.display !== "none") document.querySelector("pm_overlay").style.display = "none";
}
"use strict";

function initDownloadFont() {
  var els = document.getElementById("fontsGrid").querySelectorAll("div");
  els.forEach(function (el) {
    el.addEventListener("click", function () {
      promptDownloadFont(this);
    });
  });
  var all = document.getElementById("text_6_3");
  all.addEventListener("click", function () {
    downloadFont("AllFonts");
  });
}
"use strict";

function promptDownloadFont(y) {
  var font = y.querySelector("div").innerHTML;
  pmPrompt("Alert", function () {
    downloadFont(font);
  }, "Are you sure you want do download the font", 1);
  var x = document.querySelector(".pm_modal_innerdiv").innerHTML;
  document.querySelector(".pm_modal_innerdiv").innerHTML = x + " " + font.toUpperCase() + "?";
}
"use strict";

function setPageFunctions() {
  var setURL = window.location.hash;
  if (setURL == "") return;
  var id = setURL.split("#").pop();
  if (id == null || !isFinite(id) || id != parseInt(id, 10)) return;
  var timeout = 500;
  var fun = {
    fun_1: function fun_1() {
      mainPageIntro();
    },
    fun_2: function fun_2() {
      aosjs("logoGrid");
    },
    fun_3: function fun_3() {
      archSlider();
    },
    fun_4: function fun_4() {
      aosjs("internetGrid");
    },
    fun_6: function fun_6() {
      aosjs("fontsGrid");
      initDownloadFont();
    },
    fun_7: function fun_7() {
      aosjs("printGrid");
    },
    fun_8: function fun_8() {
      aosjs("motiongraphicsGrid");
      pmLoader("iframe", "#pm_page_8", "load", "pm_loader1");
    },
    fun_9: function fun_9() {
      macyjs("artGrid", 4);
    },
    fun_10: function fun_10() {
      teamHelp();
    },
    fun_11: function fun_11() {
      pmEmailLoader("11");
    }
  };

  if (fun["fun_" + id]) {
    setTimeout(function () {
      fun["fun_" + id]();
    }, timeout);
  }
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
