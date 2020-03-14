(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
  typeof define === 'function' && define.amd ? define(['exports'], factory) :
  (global = global || self, factory(global.redom = {}));
}(this, (function (exports) { 'use strict';

  function parseQuery (query) {
    var chunks = query.split(/([#.])/);
    var tagName = '';
    var id = '';
    var classNames = [];

    for (var i = 0; i < chunks.length; i++) {
      var chunk = chunks[i];
      if (chunk === '#') {
        id = chunks[++i];
      } else if (chunk === '.') {
        classNames.push(chunks[++i]);
      } else if (chunk.length) {
        tagName = chunk;
      }
    }

    return {
      tag: tagName || 'div',
      id: id,
      className: classNames.join(' ')
    };
  }

  function createElement (query, ns) {
    var ref = parseQuery(query);
    var tag = ref.tag;
    var id = ref.id;
    var className = ref.className;
    var element = ns ? document.createElementNS(ns, tag) : document.createElement(tag);

    if (id) {
      element.id = id;
    }

    if (className) {
      if (ns) {
        element.setAttribute('class', className);
      } else {
        element.className = className;
      }
    }

    return element;
  }

  function unmount (parent, child) {
    var parentEl = getEl(parent);
    var childEl = getEl(child);

    if (child === childEl && childEl.__redom_view) {
      // try to look up the view if not provided
      child = childEl.__redom_view;
    }

    if (childEl.parentNode) {
      doUnmount(child, childEl, parentEl);

      parentEl.removeChild(childEl);
    }

    return child;
  }

  function doUnmount (child, childEl, parentEl) {
    var hooks = childEl.__redom_lifecycle;

    if (hooksAreEmpty(hooks)) {
      childEl.__redom_lifecycle = {};
      return;
    }

    var traverse = parentEl;

    if (childEl.__redom_mounted) {
      trigger(childEl, 'onunmount');
    }

    while (traverse) {
      var parentHooks = traverse.__redom_lifecycle || {};

      for (var hook in hooks) {
        if (parentHooks[hook]) {
          parentHooks[hook] -= hooks[hook];
        }
      }

      if (hooksAreEmpty(parentHooks)) {
        traverse.__redom_lifecycle = null;
      }

      traverse = traverse.parentNode;
    }
  }

  function hooksAreEmpty (hooks) {
    if (hooks == null) {
      return true;
    }
    for (var key in hooks) {
      if (hooks[key]) {
        return false;
      }
    }
    return true;
  }

  /* global Node, ShadowRoot */

  var hookNames = ['onmount', 'onremount', 'onunmount'];
  var shadowRootAvailable = typeof window !== 'undefined' && 'ShadowRoot' in window;

  function mount (parent, child, before, replace) {
    var parentEl = getEl(parent);
    var childEl = getEl(child);

    if (child === childEl && childEl.__redom_view) {
      // try to look up the view if not provided
      child = childEl.__redom_view;
    }

    if (child !== childEl) {
      childEl.__redom_view = child;
    }

    var wasMounted = childEl.__redom_mounted;
    var oldParent = childEl.parentNode;

    if (wasMounted && (oldParent !== parentEl)) {
      doUnmount(child, childEl, oldParent);
    }

    if (before != null) {
      if (replace) {
        parentEl.replaceChild(childEl, getEl(before));
      } else {
        parentEl.insertBefore(childEl, getEl(before));
      }
    } else {
      parentEl.appendChild(childEl);
    }

    doMount(child, childEl, parentEl, oldParent);

    return child;
  }

  function trigger (el, eventName) {
    if (eventName === 'onmount' || eventName === 'onremount') {
      el.__redom_mounted = true;
    } else if (eventName === 'onunmount') {
      el.__redom_mounted = false;
    }

    var hooks = el.__redom_lifecycle;

    if (!hooks) {
      return;
    }

    var view = el.__redom_view;
    var hookCount = 0;

    view && view[eventName] && view[eventName]();

    for (var hook in hooks) {
      if (hook) {
        hookCount++;
      }
    }

    if (hookCount) {
      var traverse = el.firstChild;

      while (traverse) {
        var next = traverse.nextSibling;

        trigger(traverse, eventName);

        traverse = next;
      }
    }
  }

  function doMount (child, childEl, parentEl, oldParent) {
    var hooks = childEl.__redom_lifecycle || (childEl.__redom_lifecycle = {});
    var remount = (parentEl === oldParent);
    var hooksFound = false;

    for (var i = 0, list = hookNames; i < list.length; i += 1) {
      var hookName = list[i];

      if (!remount) { // if already mounted, skip this phase
        if (child !== childEl) { // only Views can have lifecycle events
          if (hookName in child) {
            hooks[hookName] = (hooks[hookName] || 0) + 1;
          }
        }
      }
      if (hooks[hookName]) {
        hooksFound = true;
      }
    }

    if (!hooksFound) {
      childEl.__redom_lifecycle = {};
      return;
    }

    var traverse = parentEl;
    var triggered = false;

    if (remount || (traverse && traverse.__redom_mounted)) {
      trigger(childEl, remount ? 'onremount' : 'onmount');
      triggered = true;
    }

    while (traverse) {
      var parent = traverse.parentNode;
      var parentHooks = traverse.__redom_lifecycle || (traverse.__redom_lifecycle = {});

      for (var hook in hooks) {
        parentHooks[hook] = (parentHooks[hook] || 0) + hooks[hook];
      }

      if (triggered) {
        break;
      } else {
        if (traverse.nodeType === Node.DOCUMENT_NODE ||
          (shadowRootAvailable && (traverse instanceof ShadowRoot)) ||
          (parent && parent.__redom_mounted)
        ) {
          trigger(traverse, remount ? 'onremount' : 'onmount');
          triggered = true;
        }
        traverse = parent;
      }
    }
  }

  function setStyle (view, arg1, arg2) {
    var el = getEl(view);

    if (typeof arg1 === 'object') {
      for (var key in arg1) {
        setStyleValue(el, key, arg1[key]);
      }
    } else {
      setStyleValue(el, arg1, arg2);
    }
  }

  function setStyleValue (el, key, value) {
    if (value == null) {
      el.style[key] = '';
    } else {
      el.style[key] = value;
    }
  }

  /* global SVGElement */

  var xlinkns = 'http://www.w3.org/1999/xlink';

  function setAttr (view, arg1, arg2) {
    setAttrInternal(view, arg1, arg2);
  }

  function setAttrInternal (view, arg1, arg2, initial) {
    var el = getEl(view);

    var isObj = typeof arg1 === 'object';

    if (isObj) {
      for (var key in arg1) {
        setAttrInternal(el, key, arg1[key], initial);
      }
    } else {
      var isSVG = el instanceof SVGElement;
      var isFunc = typeof arg2 === 'function';

      if (arg1 === 'style' && typeof arg2 === 'object') {
        setStyle(el, arg2);
      } else if (isSVG && isFunc) {
        el[arg1] = arg2;
      } else if (arg1 === 'dataset') {
        setData(el, arg2);
      } else if (!isSVG && (arg1 in el || isFunc) && (arg1 !== 'list')) {
        el[arg1] = arg2;
      } else {
        if (isSVG && (arg1 === 'xlink')) {
          setXlink(el, arg2);
          return;
        }
        if (initial && arg1 === 'class') {
          arg2 = el.className + ' ' + arg2;
        }
        if (arg2 == null) {
          el.removeAttribute(arg1);
        } else {
          el.setAttribute(arg1, arg2);
        }
      }
    }
  }

  function setXlink (el, arg1, arg2) {
    if (typeof arg1 === 'object') {
      for (var key in arg1) {
        setXlink(el, key, arg1[key]);
      }
    } else {
      if (arg2 != null) {
        el.setAttributeNS(xlinkns, arg1, arg2);
      } else {
        el.removeAttributeNS(xlinkns, arg1, arg2);
      }
    }
  }

  function setData (el, arg1, arg2) {
    if (typeof arg1 === 'object') {
      for (var key in arg1) {
        setData(el, key, arg1[key]);
      }
    } else {
      if (arg2 != null) {
        el.dataset[arg1] = arg2;
      } else {
        delete el.dataset[arg1];
      }
    }
  }

  function text (str) {
    return document.createTextNode((str != null) ? str : '');
  }

  function parseArgumentsInternal (element, args, initial) {
    for (var i = 0, list = args; i < list.length; i += 1) {
      var arg = list[i];

      if (arg !== 0 && !arg) {
        continue;
      }

      var type = typeof arg;

      if (type === 'function') {
        arg(element);
      } else if (type === 'string' || type === 'number') {
        element.appendChild(text(arg));
      } else if (isNode(getEl(arg))) {
        mount(element, arg);
      } else if (arg.length) {
        parseArgumentsInternal(element, arg, initial);
      } else if (type === 'object') {
        setAttrInternal(element, arg, null, initial);
      }
    }
  }

  function ensureEl (parent) {
    return typeof parent === 'string' ? html(parent) : getEl(parent);
  }

  function getEl (parent) {
    return (parent.nodeType && parent) || (!parent.el && parent) || getEl(parent.el);
  }

  function isNode (arg) {
    return arg && arg.nodeType;
  }

  var htmlCache = {};

  function html (query) {
    var args = [], len = arguments.length - 1;
    while ( len-- > 0 ) args[ len ] = arguments[ len + 1 ];

    var element;

    var type = typeof query;

    if (type === 'string') {
      element = memoizeHTML(query).cloneNode(false);
    } else if (isNode(query)) {
      element = query.cloneNode(false);
    } else if (type === 'function') {
      var Query = query;
      element = new (Function.prototype.bind.apply( Query, [ null ].concat( args) ));
    } else {
      throw new Error('At least one argument required');
    }

    parseArgumentsInternal(getEl(element), args, true);

    return element;
  }

  var el = html;
  var h = html;

  html.extend = function extendHtml (query) {
    var args = [], len = arguments.length - 1;
    while ( len-- > 0 ) args[ len ] = arguments[ len + 1 ];

    var clone = memoizeHTML(query);

    return html.bind.apply(html, [ this, clone ].concat( args ));
  };

  function memoizeHTML (query) {
    return htmlCache[query] || (htmlCache[query] = createElement(query));
  }

  function setChildren (parent) {
    var children = [], len = arguments.length - 1;
    while ( len-- > 0 ) children[ len ] = arguments[ len + 1 ];

    var parentEl = getEl(parent);
    var current = traverse(parent, children, parentEl.firstChild);

    while (current) {
      var next = current.nextSibling;

      unmount(parent, current);

      current = next;
    }
  }

  function traverse (parent, children, _current) {
    var current = _current;

    var childEls = new Array(children.length);

    for (var i = 0; i < children.length; i++) {
      childEls[i] = children[i] && getEl(children[i]);
    }

    for (var i$1 = 0; i$1 < children.length; i$1++) {
      var child = children[i$1];

      if (!child) {
        continue;
      }

      var childEl = childEls[i$1];

      if (childEl === current) {
        current = current.nextSibling;
        continue;
      }

      if (isNode(childEl)) {
        var next = current && current.nextSibling;
        var exists = child.__redom_index != null;
        var replace = exists && next === childEls[i$1 + 1];

        mount(parent, child, current, replace);

        if (replace) {
          current = next;
        }

        continue;
      }

      if (child.length != null) {
        current = traverse(parent, child, current);
      }
    }

    return current;
  }

  function listPool (View, key, initData) {
    return new ListPool(View, key, initData);
  }

  var ListPool = function ListPool (View, key, initData) {
    this.View = View;
    this.initData = initData;
    this.oldLookup = {};
    this.lookup = {};
    this.oldViews = [];
    this.views = [];

    if (key != null) {
      this.key = typeof key === 'function' ? key : propKey(key);
    }
  };

  ListPool.prototype.update = function update (data, context) {
    var ref = this;
      var View = ref.View;
      var key = ref.key;
      var initData = ref.initData;
    var keySet = key != null;

    var oldLookup = this.lookup;
    var newLookup = {};

    var newViews = new Array(data.length);
    var oldViews = this.views;

    for (var i = 0; i < data.length; i++) {
      var item = data[i];
      var view = (void 0);

      if (keySet) {
        var id = key(item);

        view = oldLookup[id] || new View(initData, item, i, data);
        newLookup[id] = view;
        view.__redom_id = id;
      } else {
        view = oldViews[i] || new View(initData, item, i, data);
      }
      view.update && view.update(item, i, data, context);

      var el = getEl(view.el);

      el.__redom_view = view;
      newViews[i] = view;
    }

    this.oldViews = oldViews;
    this.views = newViews;

    this.oldLookup = oldLookup;
    this.lookup = newLookup;
  };

  function propKey (key) {
    return function (item) {
      return item[key];
    };
  }

  function list (parent, View, key, initData) {
    return new List(parent, View, key, initData);
  }

  var List = function List (parent, View, key, initData) {
    this.__redom_list = true;
    this.View = View;
    this.initData = initData;
    this.views = [];
    this.pool = new ListPool(View, key, initData);
    this.el = ensureEl(parent);
    this.keySet = key != null;
  };

  List.prototype.update = function update (data, context) {
      if ( data === void 0 ) data = [];

    var ref = this;
      var keySet = ref.keySet;
    var oldViews = this.views;

    this.pool.update(data, context);

    var ref$1 = this.pool;
      var views = ref$1.views;
      var lookup = ref$1.lookup;

    if (keySet) {
      for (var i = 0; i < oldViews.length; i++) {
        var oldView = oldViews[i];
        var id = oldView.__redom_id;

        if (lookup[id] == null) {
          oldView.__redom_index = null;
          unmount(this, oldView);
        }
      }
    }

    for (var i$1 = 0; i$1 < views.length; i$1++) {
      var view = views[i$1];

      view.__redom_index = i$1;
    }

    setChildren(this, views);

    if (keySet) {
      this.lookup = lookup;
    }
    this.views = views;
  };

  List.extend = function extendList (parent, View, key, initData) {
    return List.bind(List, parent, View, key, initData);
  };

  list.extend = List.extend;

  /* global Node */

  function place (View, initData) {
    return new Place(View, initData);
  }

  var Place = function Place (View, initData) {
    this.el = text('');
    this.visible = false;
    this.view = null;
    this._placeholder = this.el;

    if (View instanceof Node) {
      this._el = View;
    } else if (View.el instanceof Node) {
      this._el = View;
      this.view = View;
    } else {
      this._View = View;
    }

    this._initData = initData;
  };

  Place.prototype.update = function update (visible, data) {
    var placeholder = this._placeholder;
    var parentNode = this.el.parentNode;

    if (visible) {
      if (!this.visible) {
        if (this._el) {
          mount(parentNode, this._el, placeholder);
          unmount(parentNode, placeholder);

          this.el = getEl(this._el);
          this.visible = visible;
        } else {
          var View = this._View;
          var view = new View(this._initData);

          this.el = getEl(view);
          this.view = view;

          mount(parentNode, view, placeholder);
          unmount(parentNode, placeholder);
        }
      }
      this.view && this.view.update && this.view.update(data);
    } else {
      if (this.visible) {
        if (this._el) {
          mount(parentNode, placeholder, this._el);
          unmount(parentNode, this._el);

          this.el = placeholder;
          this.visible = visible;

          return;
        }
        mount(parentNode, placeholder, this.view);
        unmount(parentNode, this.view);

        this.el = placeholder;
        this.view = null;
      }
    }
    this.visible = visible;
  };

  /* global Node */

  function router (parent, Views, initData) {
    return new Router(parent, Views, initData);
  }

  var Router = function Router (parent, Views, initData) {
    this.el = ensureEl(parent);
    this.Views = Views;
    this.initData = initData;
  };

  Router.prototype.update = function update (route, data) {
    if (route !== this.route) {
      var Views = this.Views;
      var View = Views[route];

      this.route = route;

      if (View && (View instanceof Node || View.el instanceof Node)) {
        this.view = View;
      } else {
        this.view = View && new View(this.initData, data);
      }

      setChildren(this.el, [this.view]);
    }
    this.view && this.view.update && this.view.update(data, route);
  };

  var ns = 'http://www.w3.org/2000/svg';

  var svgCache = {};

  function svg (query) {
    var args = [], len = arguments.length - 1;
    while ( len-- > 0 ) args[ len ] = arguments[ len + 1 ];

    var element;

    var type = typeof query;

    if (type === 'string') {
      element = memoizeSVG(query).cloneNode(false);
    } else if (isNode(query)) {
      element = query.cloneNode(false);
    } else if (type === 'function') {
      var Query = query;
      element = new (Function.prototype.bind.apply( Query, [ null ].concat( args) ));
    } else {
      throw new Error('At least one argument required');
    }

    parseArgumentsInternal(getEl(element), args, true);

    return element;
  }

  var s = svg;

  svg.extend = function extendSvg (query) {
    var clone = memoizeSVG(query);

    return svg.bind(this, clone);
  };

  svg.ns = ns;

  function memoizeSVG (query) {
    return svgCache[query] || (svgCache[query] = createElement(query, ns));
  }

  exports.List = List;
  exports.ListPool = ListPool;
  exports.Place = Place;
  exports.Router = Router;
  exports.el = el;
  exports.h = h;
  exports.html = html;
  exports.list = list;
  exports.listPool = listPool;
  exports.mount = mount;
  exports.place = place;
  exports.router = router;
  exports.s = s;
  exports.setAttr = setAttr;
  exports.setChildren = setChildren;
  exports.setData = setData;
  exports.setStyle = setStyle;
  exports.setXlink = setXlink;
  exports.svg = svg;
  exports.text = text;
  exports.unmount = unmount;

  Object.defineProperty(exports, '__esModule', { value: true });

})));

},{}],2:[function(require,module,exports){
"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

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
  new Thebility().init();
  mainPageIntro(); //end of functions list!

  var setURL = window.location.hash;
  if (setURL == "") return;
  var id = setURL.split("#").pop();
  if (id == null || !isFinite(id) || id != parseInt(id, 10)) return;
  getContentView(id);
}

"use strict";

function mainPageIntro() {
  var dir = document.getElementsByTagName("html")[0].getAttribute("dir");

  function getRandomInt(min, max) {
    return Math.random() * (max - min) + min;
  }

  function presentation() {
    for (var i = 0; i < 7; i++) {
      var _pre = document.createElement("div");

      var _pre1 = document.createElement("div");

      _pre.setAttribute("class", "page_O_present_anim_1");

      document.getElementById('pm_page_1').appendChild(_pre1);

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
      }, 100);
    };

    for (var _i = 0; _i < pre1.length; _i++) {
      _loop(_i);
    }
  }

  setTimeout(function () {
    presentation();
    var bgimages = ["", "", "", "", "", ""];
    var videoParent = document.getElementById("bgVideo");
    videoParent.style.backgroundImage = "url('/assets/images/0_0/" + Math.floor(Math.random() * 10 + 1) + ".png')";
  }, 300);
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

var Modal = /*#__PURE__*/function () {
  function Modal() {
    _classCallCheck(this, Modal);

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


  _createClass(Modal, [{
    key: "icon",
    value: function icon(fun, clas) {
      (0, _redom.mount)(this.el, (0, _redom.el)(".".concat(clas, " pm_modal pm_modal_icon"), {
        onclick: function onclick() {
          fun();
        }
      }));
    }
  }, {
    key: "title",
    value: function title(text) {
      var titlear = this.titlear;
      (0, _redom.mount)(titlear, (0, _redom.el)(".pm_modal pm_modal_title", text));
    }
  }, {
    key: "button",
    value: function button(fun, text) {
      var but = this.buttons;
      (0, _redom.mount)(but, (0, _redom.el)("input.pm_modal pm_modal_button", {
        type: "button",
        onclick: fun,
        value: text
      }));
    } //to content

  }, {
    key: "input",
    value: function input(type) {
      (0, _redom.mount)(this.content, (0, _redom.el)("input.pm_modal pm_modal_input", {
        type: type
      }));
    }
  }, {
    key: "img",
    value: function img(src) {
      (0, _redom.mount)(this.content, (0, _redom.el)("img.pm_modal pm_modal_img", {
        src: src
      }));
    }
  }, {
    key: "text",
    value: function text(_text) {
      (0, _redom.mount)(this.content, (0, _redom.el)("input.pm_modal pm_modal_text", _text));
    }
  }, {
    key: "div",
    value: function div(content, clas) {
      (0, _redom.mount)(this.content, (0, _redom.el)(".pm_modal ".concat(clas, " pm_modal_innerdiv"), content));
    }
  }, {
    key: "span",
    value: function span(clas) {
      (0, _redom.mount)(this.content, (0, _redom.el)("span.pm_modal ".concat(clas, " pm_modal_span")));
    }
  }, {
    key: "canvas",
    value: function canvas(id) {
      (0, _redom.mount)(this.content, (0, _redom.el)("canvas#".concat(id, ".pm_modal pm_modal_canvas")));
    } //vars

  }, {
    key: "close",
    value: function close(closetype, id) {
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

  }, {
    key: "closeIcon",
    value: function closeIcon(closetype) {
      var id = this.id;
      var close = this.close;
      this.icon(function () {
        close(closetype, id);
      }, "pm_modal_icon_close");
    }
  }, {
    key: "dragIcon",
    value: function dragIcon() {
      var id = this.id;
      var el = document.getElementById(id);
      this.icon(function () {
        drag(el.querySelector(".pm_modal_icon_drag"));
      }, "pm_modal_icon_drag");
    } //close button

  }, {
    key: "buttonClose",
    value: function buttonClose(closetype, text) {
      var id = this.id;
      var close = this.close;
      this.button(function () {
        close(closetype, id);
      }, text);
    }
  }, {
    key: "id",
    get: function get() {
      return this.idname.substring(1) + " ";
    }
  }]);

  return Modal;
}();

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

},{"redom":1}]},{},[2]);
