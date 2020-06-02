/*!
 * Ace Admin Template v2.1.1
 * Copyright 2013-2020
 * You need a commercial license to use this product
 * https://bit.ly/35ciMLb
 */
! function(t, e) {
  "object" == typeof exports && "undefined" != typeof module ? module.exports = e(require("jquery"), require("bootstrap")) : "function" == typeof define && define.amd ? define(["jquery", "bootstrap"], e) : (t = t || self).AceApp = e(t.jQuery, t.bootstrap)
}(this, function(_, n) {
  "use strict";

  function c(t) {
      return (c = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
          return typeof t
      } : function(t) {
          return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
      })(t)
  }

  function o(t, e) {
      if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
  }

  function i(t, e) {
      for (var n = 0; n < e.length; n++) {
          var i = e[n];
          i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i)
      }
  }

  function e(t, e, n) {
      return e && i(t.prototype, e), n && i(t, n), t
  }

  function l(e, t) {
      var n = Object.keys(e);
      if (Object.getOwnPropertySymbols) {
          var i = Object.getOwnPropertySymbols(e);
          t && (i = i.filter(function(t) {
              return Object.getOwnPropertyDescriptor(e, t).enumerable
          })), n.push.apply(n, i)
      }
      return n
  }

  function r(a) {
      for (var t = 1; t < arguments.length; t++) {
          var s = null != arguments[t] ? arguments[t] : {};
          t % 2 ? l(Object(s), !0).forEach(function(t) {
              var e, n, i;
              e = a, i = s[n = t], n in e ? Object.defineProperty(e, n, {
                  value: i,
                  enumerable: !0,
                  configurable: !0,
                  writable: !0
              }) : e[n] = i
          }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(a, Object.getOwnPropertyDescriptors(s)) : l(Object(s)).forEach(function(t) {
              Object.defineProperty(a, t, Object.getOwnPropertyDescriptor(s, t))
          })
      }
      return a
  }

  function d(t, e) {
      return function(t) {
          if (Array.isArray(t)) return t
      }(t) || function(t, e) {
          if (!(Symbol.iterator in Object(t) || "[object Arguments]" === Object.prototype.toString.call(t))) return;
          var n = [],
              i = !0,
              a = !1,
              s = void 0;
          try {
              for (var o, l = t[Symbol.iterator](); !(i = (o = l.next()).done) && (n.push(o.value), !e || n.length !== e); i = !0);
          } catch (t) {
              a = !0, s = t
          } finally {
              try {
                  i || null == l.return || l.return()
              } finally {
                  if (a) throw s
              }
          }
          return n
      }(t, e) || function() {
          throw new TypeError("Invalid attempt to destructure non-iterable instance")
      }()
  }

  function s(t) {
      return function(t) {
          if (Array.isArray(t)) {
              for (var e = 0, n = new Array(t.length); e < t.length; e++) n[e] = t[e];
              return n
          }
      }(t) || function(t) {
          if (Symbol.iterator in Object(t) || "[object Arguments]" === Object.prototype.toString.call(t)) return Array.from(t)
      }(t) || function() {
          throw new TypeError("Invalid attempt to spread non-iterable instance")
      }()
  }
  _ = _ && _.hasOwnProperty("default") ? _.default : _, n = n && n.hasOwnProperty("default") ? n.default : n;
  var u = function() {
      function a() {
          o(this, a)
      }
      return e(a, null, [{
          key: "isReducedMotion",
          value: function() {
              return window.matchMedia("(prefers-reduced-motion)").matches
          }
      }, {
          key: "getScrollbarInfo",
          value: function(t) {
              if (!1 === (0 < arguments.length && void 0 !== t && t) && null !== a._scrollbarInfo) return a._scrollbarInfo;
              var e = document.createElement("div");
              e.style.overflow = "scroll", e.style.position = "absolute", e.style.width = "50px", e.style.height = "50px";
              var n = {};
              document.body.appendChild(e), n.width = e.getBoundingClientRect().width - e.clientWidth, document.documentElement.style.setProperty("--scrollbar-width", n.width + "px");
              var i = n.width;
              return window.CSS ? (n.thin = window.CSS.supports("scrollbar-width", "thin"), n.thin && (e.style["scrollbar-width"] = "thin", i = e.getBoundingClientRect().width - e.clientWidth), n.overlay = window.CSS.supports("overflow", "overlay")) : (n.thin = !1, e.style.overflow = "overlay", n.overlay = 0 < n.width && e.getBoundingClientRect().width - e.clientWidth == 0), document.documentElement.style.setProperty("--moz-scrollbar-thin", i + "px"), e.style["-ms-overflow-style"] = "-ms-autohiding-scrollbar", n.autohide = 0 < n.width && e.getBoundingClientRect().width - e.clientWidth == 0, document.body.removeChild(e), a._scrollbarInfo = n
          }
      }]), a
  }();
  u._supportsTransitionStart = null, u._scrollbarInfo = null;
  var t = function() {
      function t() {
          o(this, t)
      }
      return e(t, null, [{
          key: "_HandleBasics",
          value: function() {
              t._handleAlerts(), t._handleDropdowns(), t._handleNavbar(), t._handleTabScroll(), t._handleScrollTop(), t._handleSticky(), t._handleOther()
          }
      }, {
          key: "_handleAlerts",
          value: function() {
              _(document).on("close.bs.alert.alert-collapse", ".alert.alert-collapse", function(t) {
                  t.preventDefault(), _(this).wrap('<div class="collapse show alert-collapse"></div>').parent().collapse("hide").one("hidden.bs.collapse", function() {
                      _(this).remove()
                  })
              })
          }
      }, {
          key: "_handleDropdowns",
          value: function() {
              _(document).on("click", "[data-dismiss=dropdown]", function(t) {
                  _(t.target).closest(".dropdown-menu").removeClass("show").parent().removeClass("show")
              }), _(document).on("click.dropdown-clickable", ".dropdown-clickable", function(t) {
                  t.stopImmediatePropagation()
              })
          }
      }, {
          key: "_handleNavbar",
          value: function() {
              _(document).on("click", ".navbar-backdrop.show", function(t) {
                  t.target === this && _(this).collapse("hide")
              });
              var t = !1;
              _(".navbar-collapse").on("shown.bs.collapse", function() {
                  t = !1, _(this).find(".autofocus").focus(), !this.classList.contains("navbar-backdrop") || 0 === u.getScrollbarInfo().width && (document.body.classList.add("mob-navbar-body"), t = !0)
              }).on("hidden.bs.collapse", function() {
                  _(this).hasClass("auto-collapsing") ? _(this).removeClass("auto-collapsing") : (_(".navbar").removeClass("navbar-expanded"), t && document.body.classList.remove("mob-navbar-body"))
              }).on("show.bs.collapse", function() {
                  _(".navbar").addClass("navbar-expanded"), _(".navbar-collapse.show").addClass("auto-collapsing").css("transition-duration", ".1ms").collapse("hide").css("transition-duration", "")
              });

              function e() {
                  var t = document.documentElement.classList.contains("rtl") ? "marginRight" : "marginLeft";
                  this.style[t] = "";
                  var e = this.getBoundingClientRect();
                  if (e.left < 0) this.style[t] = parseInt(-1 * e.left) + 5 + "px";
                  else {
                      var n = document.body.scrollWidth;
                      e.right > n && (this.style[t] = parseInt(n - e.right - 5) + "px")
                  }
              }
              _(".navbar").on("transitionstart.adjust", ".dropdown-mega .dropdown-menu", function(t) {
                  t.target === this && "transform" === t.originalEvent.propertyName && e.call(this)
              }), _(".navbar").on("shown.bs.dropdown", ".dropdown-mega .dropdown-menu", function() {
                  "absolute" === window.getComputedStyle(this).position && e.call(this)
              })
          }
      }, {
          key: "_handleTabScroll",
          value: function() {
              function r(t) {
                  var e = !(0 < arguments.length && void 0 !== t) || t,
                      n = this.parentNode,
                      i = n.parentNode,
                      a = i.clientWidth;
                  if (!(i.scrollWidth <= a)) {
                      var s = n.offsetLeft - (a - n.clientWidth) / 2;
                      s < 0 && (s = 0), e = !u.isReducedMotion() && !0 === e;
                      try {
                          i.scrollTo({
                              top: 0,
                              left: s,
                              behavior: e ? "smooth" : "auto"
                          }), o && s < i.scrollLeft && setTimeout(function() {
                              i.scrollTo({
                                  top: 0,
                                  left: s,
                                  behavior: e ? "smooth" : "auto"
                              })
                          }, 0)
                      } catch (t) {
                          i.scrollLeft = s
                      }
                  }
              }
              var o = "MozAppearance" in document.documentElement.style;
              _(".nav-tabs-scroll").each(function() {
                  var t = this,
                      e = this.querySelector(".active");
                  e && (o ? setTimeout(function() {
                      t.scrollLeft = 1, r.call(e, 0)
                  }, 500) : r.call(e, 0)), _(this).find("a").on("click", function() {
                      r.call(this)
                  })
              }), "ontouchstart" in window && _('.tab-sliding:not([data-swipe="none"]').each(function() {
                  var w = _(this).attr("data-swipe") || null;
                  _(this).find(".tab-pane").on("touchstart", function(t) {
                      if (this.classList.contains("active")) {
                          var u = this,
                              h = document.documentElement.classList.contains("rtl"),
                              f = h ? "translateX(-100%)" : "translateX(100%)",
                              e = t.originalEvent.changedTouches[0],
                              p = 0,
                              g = e.pageX,
                              m = e.pageY,
                              l = Date.now(),
                              v = 0,
                              b = u.clientWidth,
                              y = null;
                          _(this).on("touchmove", function(t) {
                              var e = t.changedTouches[0],
                                  n = e.pageX,
                                  i = e.pageY;
                              if (0 === p) {
                                  var a = Math.abs(m - i),
                                      s = Math.abs(g - n);
                                  s < a ? (p = 2, _(u).off("touchmove")) : 10 < s && (p = 1)
                              }
                              if (1 === p) {
                                  var o, l = parseInt(g - n),
                                      r = 0;
                                  if (null !== w && "left" !== w || !(!h && 0 < l || h && l < 0) ? null !== w && "right" !== w || !(!h && l < 0 || h && 0 < l) || (r = -1) : r = 1, 0 !== r && r !== v) {
                                      null !== y && ((o = y).style.transform = "", o.style.transitionDuration = "1ms", o.classList.remove("tab-swiping"), o.addEventListener("transitionend", function t() {
                                          this.style.transitionDuration = "", this.removeEventListener("transitionend", t)
                                      })), v = r;
                                      var c = u.getAttribute("data-swipe-" + (1 === v ? "next" : "prev"));
                                      c = c && document.querySelector(c), null === (y = c || (1 === v ? u.nextElementSibling : u.previousElementSibling)) || y === u ? v = 0 : (u.classList.add("tab-swiping"), y.classList.add("tab-swiping"))
                                  }
                                  var d = Math.abs(l);
                                  0 !== v && d < b + 24 ? (u.style.transform = f + " translateX(" + -1 * l + "px)", y.style.transform = "translateX(" + -1 * l + "px)") : 0 === v && d < 24 && (u.style.transform = f + " translateX(" + -1 * l + "px)")
                              }
                          }).on("touchend touchcancel", function(t) {
                              var e = t.originalEvent.changedTouches[0].pageX,
                                  n = Date.now(),
                                  i = Math.abs(e - g);
                              if (_(u).off("touchmove touchend touchcancel"), u.style.transform = "", u.classList.remove("tab-swiping"), y && (y.style.transform = "", y.classList.remove("tab-swiping")), 0 !== v && 1 === p && (b / 4 < i || 100 < i || b / 6 < i && n - l < 300)) {
                                  y.classList.add("active", "show"), u.classList.remove("active", "show");
                                  var a = u.id,
                                      s = y.id;
                                  _('[href="#' + a + '"],[data-target="#' + a + '"]').removeClass("active");
                                  var o = _('[href="#' + s + '"],[data-target="#' + s + '"]');
                                  o.addClass("active"), r.call(o.get(0))
                              }
                          })
                      }
                  })
              })
          }
      }, {
          key: "_handleScrollTop",
          value: function() {
              var t = document.querySelector(".btn-scroll-up");
              if (null !== t && null !== t.offsetParent) {
                  var n = function() {
                          t.classList.add("scroll-btn-visible")
                      },
                      i = function() {
                          t.classList.remove("scroll-btn-visible")
                      },
                      e = "IntersectionObserver" in window;
                  if (t.addEventListener("click", function(t) {
                          t.preventDefault(), e && i(),
                              function() {
                                  try {
                                      var t = !u.isReducedMotion();
                                      window.scroll({
                                          top: 0,
                                          behavior: t ? "smooth" : "auto"
                                      })
                                  } catch (t) {
                                      window.scroll(0, 0)
                                  }
                              }()
                      }), e) {
                      var a = document.createElement("DIV");
                      a.classList.add("scroll-btn-observe"), document.body.appendChild(a), new window.IntersectionObserver(function(t) {
                          var e = d(t, 1)[0];
                          (e.intersectionRatio < 1 && e.boundingClientRect.y < 0 ? n : i)()
                      }, {
                          threshold: [1],
                          delay: 100
                      }).observe(a)
                  } else n()
              }
          }
      }, {
          key: "_handleSticky",
          value: function() {
              if (window.IntersectionObserver) {
                  var t = document.querySelectorAll('[class*="sticky-nav"]');
                  if (0 < t.length) {
                      var e = new window.IntersectionObserver(function(t) {
                          var e = d(t, 1)[0],
                              n = e.intersectionRatio < 1 && e.boundingClientRect.y < 0,
                              i = e.target.parentElement;
                          if (n && !i.classList.contains("sticky-nav")) {
                              var a = window.getComputedStyle(i).position;
                              "sticky" !== a && "-webkit-sticky" !== a && (n = !1)
                          }
                          var s = new window.CustomEvent("sticky-change", {
                              detail: {
                                  isSticky: n
                              }
                          });
                          i.dispatchEvent(s)
                      }, {
                          threshold: [1],
                          delay: 100
                      });
                      t.forEach(function(i) {
                          var a = document.createElement("UL" === i.tagName ? "LI" : "DIV");
                          a.classList.add("sticky-trigger"), i.insertBefore(a, i.firstChild), e.observe(a), setTimeout(function() {
                              if (a.getBoundingClientRect().y < 0) {
                                  var t = !0;
                                  if (t && !i.classList.contains("sticky-nav")) {
                                      var e = window.getComputedStyle(i).position;
                                      "sticky" !== e && "-webkit-sticky" !== e && (t = !1)
                                  }
                                  var n = new window.CustomEvent("sticky-change", {
                                      detail: {
                                          isSticky: t,
                                          initialCheck: !0
                                      }
                                  });
                                  i.dispatchEvent(n)
                              }
                          }, 200)
                      })
                  }
              }
          }
      }, {
          key: "_handleOther",
          value: function() {
              _(".input-floating-label input").each(function() {
                  "" !== this.value ? this.classList.add("has-content") : this.classList.remove("has-content")
              }), _(document).on("focusout", ".input-floating-label input", function(t) {
                  "" !== this.value ? this.classList.add("has-content") : this.classList.remove("has-content")
              })
          }
      }]), t
  }();
  "undefined" != typeof _ && t._HandleBasics();
  var a = "aceScroll",
      h = "ace.scroll",
      f = ".".concat(h),
      p = {
          LOAD_DATA_API: "load".concat(f).concat(".data-api")
      },
      g = "[ace-scroll]",
      m = {
          type: "string",
          smooth: "boolean",
          height: "(number|null)",
          lock: "boolean",
          ignore: "(string|null)",
          plugin: "string",
          options: "(object|null)"
      },
      v = {
          type: "native",
          smooth: !1,
          height: null,
          lock: !1,
          ignore: null,
          plugin: "SimpleBar",
          options: null
      },
      b = function() {
          function s(t, e) {
              o(this, s), this._element = t, this.$element = _(t), this._config = this._getConfig(e), this._scrollbarInfo = u.getScrollbarInfo(), this.enableScrollbars()
          }
          return e(s, [{
              key: "enableScrollbars",
              value: function() {
                  if (null !== this._config.ignore) {
                      if ("mobile" === this._config.ignore && 0 === this._scrollbarInfo.width && "ontouchstart" in window && window.matchMedia("(max-width: 840px)")) return;
                      if ("desktop" === this._config.ignore && 0 < this._scrollbarInfo.width) return
                  }
                  this.update(this._config.height), this.lock(this._config.lock), this._element.classList.remove("ace-scroll", "ace-scroll-mob", "ace-scroll-wrap"), "native" === this._config.type ? this._addNativeScrolls() : "auto" === this._config.type ? this._preferNativeScrolls() : "plugin" === this._config.type && this._addPluginScrolls()
              }
          }, {
              key: "update",
              value: function(t) {
                  t && (isNaN(t) || (t += "px"), this._element.style.maxHeight = t)
              }
          }, {
              key: "lock",
              value: function(t) {
                  t ? this._element.classList.add("ace-scroll-lock") : this._element.classList.remove("ace-scroll-lock")
              }
          }, {
              key: "_addNativeScrolls",
              value: function(t) {
                  if (0 === this._scrollbarInfo.width) this._element.classList.add("ace-scroll-mob");
                  else if (this._element.classList.add("ace-scroll"), "undefined" != typeof t ? t : this._config.smooth) {
                      var e = document.createElement("div");
                      for (e.classList.add("ace-scroll-inner"), e.style.color = window.getComputedStyle(this._element).color; this._element.firstChild;) e.appendChild(this._element.firstChild);
                      this._element.appendChild(e), this._element.style.transition = "none", this._element.classList.add("ace-scroll-wrap"), this._element.offsetLeft, this._element.style.transition = ""
                  }
              }
          }, {
              key: "_preferNativeScrolls",
              value: function() {
                  0 === this._scrollbarInfo.width || this._scrollbarInfo.overlay || this._scrollbarInfo.thin || !this._hasScrollbarPlugin() ? this._addNativeScrolls() : this._addPluginScrolls()
              }
          }, {
              key: "_addPluginScrolls",
              value: function() {
                  if (this._hasScrollbarPlugin()) return new window[this._config.plugin](this._element, this._config.options);
                  this._addNativeScrolls()
              }
          }, {
              key: "_hasScrollbarPlugin",
              value: function() {
                  return !!window[this._config.plugin]
              }
          }, {
              key: "_getConfig",
              value: function(t) {
                  return t = r({}, v, {}, "object" === c(t) && t ? t : {}), "undefined" != typeof n && n.Util.typeCheckConfig(a, t, this.constructor.DefaultType), t
              }
          }], [{
              key: "_jQueryInterface",
              value: function(a) {
                  return this.each(function() {
                      var t = _(this),
                          e = t.data(h),
                          n = this.getAttribute("ace-scroll") || {};
                      if (isNaN(n)) {
                          if (1 < n.length) try {
                              n = JSON.parse(n)
                          } catch (t) {}
                      } else n = {
                          height: parseInt(n)
                      };
                      var i = r({}, v, {}, t.data(), {}, "object" === c(a) && a ? a : {}, {}, "object" === c(n) && n ? n : {});
                      if (e || (e = new s(this, i), t.data(h, e)), "string" == typeof a) {
                          if ("undefined" == typeof e[a]) throw new TypeError('No method named "'.concat(a, '"'));
                          e[a]()
                      }
                  })
              }
          }, {
              key: "VERSION",
              get: function() {
                  return "2.1.0"
              }
          }, {
              key: "DefaultType",
              get: function() {
                  return m
              }
          }, {
              key: "Default",
              get: function() {
                  return v
              }
          }]), s
      }();
  if (_(window).on(p.LOAD_DATA_API, function() {
          for (var t = [].slice.call(document.querySelectorAll(g)), e = 0; e < t.length; e++) {
              var n = _(t[e]);
              b._jQueryInterface.call(n, n.data())
          }
      }), "undefined" != typeof _) {
      var y = _.fn[a];
      _.fn[a] = b._jQueryInterface, _.fn[a].Constructor = b, _.fn[a].noConflict = function() {
          return _.fn[a] = y, b._jQueryInterface
      }
  }
  var w = "aceSidebar",
      x = "ace.sidebar",
      k = ".".concat(x),
      C = ".data-api",
      E = {
          SHOW: "show".concat(k),
          HIDE: "hide".concat(k),
          COLLAPSE: "collapse".concat(k),
          EXPAND: "expand".concat(k),
          SHOWN: "shown".concat(k),
          HIDDEN: "hidden".concat(k),
          COLLAPSED: "collapsed".concat(k),
          EXPANDED: "expanded".concat(k),
          LOAD_DATA_API: "load".concat(k).concat(C),
          CLICK_DATA_API: "click".concat(k).concat(C)
      },
      L = ".sidebar",
      I = {
          swipe: "boolean",
          dismiss: "boolean",
          backdrop: "boolean",
          gotoactive: "boolean",
          subscroll: "boolean",
          pullup: "boolean"
      },
      S = {
          swipe: !1,
          dismiss: !1,
          backdrop: !1,
          gotoactive: !1,
          subscroll: !0,
          pullup: !1
      },
      A = "collapsed",
      T = "sidebar-visible",
      D = "collapsed",
      j = "toggling",
      O = "is-hover",
      P = "sidebar-backdrop",
      R = "sidebar-h",
      $ = function() {
          function a(t, e) {
              var n, i = this;
              o(this, a), this._hasTransitionEvent = !1, this._hasTransitionEvent2 = !1, this._isTransitioning = !1, this._isBeingDismissed = !1, this._sidebar = t, (n = this._sidebar.classList).remove.apply(n, ["d-none", "d-xl-block"]), this._inner = this._sidebar.querySelector(".sidebar-inner"), this._config = this._getConfig(e), this._scroller = this._sidebar.querySelector('[class*="ace-scroll"]'), this._pullupEnabled = !1, this._triggerArray = [].slice.call(document.querySelectorAll('[data-toggle="sidebar"][href="#'.concat(t.id, '"],') + '[data-toggle="sidebar"][data-target="#'.concat(t.id, '"]'))), this._triggerArrayMobile = [].slice.call(document.querySelectorAll('[data-toggle-mobile="sidebar"][href="#'.concat(t.id, '"],') + '[data-toggle-mobile="sidebar"][data-target="#'.concat(t.id, '"]'))), this._horizontal = this._sidebar.classList.contains(R), this._desktopCollapsedClass = 0 < this._triggerArray.length && this._triggerArray[0].getAttribute("data-toggle-class") || A, this._collapsed = this._sidebar.classList.contains(this._desktopCollapsedClass), _(this._inner).on("focus", "input", function(t) {
                  i._collapsed && (i._inner.classList.add("has-focus"), _(t.target).one("blur", function() {
                      i._inner.classList.remove("has-focus")
                  }))
              }), this._handleTriggerEvents(), this.enableSubmenuToggle(), this._config.pullup && this.enableSubmenuPullup(), this._config.gotoactive && this.scrollToActive(), this._config.backdrop ? this._sidebar.classList.add(P) : this._sidebar.classList.contains(P) && (this._config.backdrop = !0), !this._horizontal && this._collapsed && this._addTransitionEvent()
          }
          return e(a, [{
              key: "_handleTriggerEvents",
              value: function() {
                  var t = this;
                  _(this._triggerArray).on("click", function() {
                      t.toggle(this)
                  }), _(this._triggerArrayMobile).on("click", function() {
                      t.toggleMobile(this)
                  })
              }
          }, {
              key: "toggle",
              value: function(t) {
                  var e = 0 < arguments.length && void 0 !== t ? t : null;
                  this._sidebar.classList.contains(this._desktopCollapsedClass) ? this.expand(e) : this.collapse(e)
              }
          }, {
              key: "toggleMobile",
              value: function(t) {
                  var e = 0 < arguments.length && void 0 !== t ? t : null;
                  this._sidebar.classList.contains(T) ? this.hide(e) : this.show(e)
              }
          }, {
              key: "expand",
              value: function() {
                  if (this._hasTransitionEvent || this._addTransitionEvent(), !this._isTransitioning) {
                      var t = new _.Event(E.EXPAND);
                      _(this._sidebar).trigger(t), t.isDefaultPrevented() || (this._isTransitioning = !0, this._sidebar.classList.add(j), this._sidebar.classList.remove(this._desktopCollapsedClass), this._updateTriggerBtns(this._triggerArray, !0), this._collapsed = !1, (u.isReducedMotion() || this._horizontal) && this._toggleCompleted(), this._pullupEnabled && this._resetPullUp(), this._inner.classList.remove(O))
                  }
              }
          }, {
              key: "collapse",
              value: function(t) {
                  var e = 0 < arguments.length && void 0 !== t ? t : null;
                  if (this._hasTransitionEvent || this._addTransitionEvent(), !this._isTransitioning) {
                      var n = new _.Event(E.COLLAPSE);
                      _(this._sidebar).trigger(n), n.isDefaultPrevented() || (this._isTransitioning = !0, this._sidebar.classList.add(j), this._sidebar.classList.add(this._desktopCollapsedClass), this._updateTriggerBtns(this._triggerArray, !1), this._collapsed = !0, (u.isReducedMotion() || this._horizontal) && this._toggleCompleted(), this._pullupEnabled && this._resetPullUp(), null !== e && this._sidebar.classList.contains("expandable") && this._inner.contains(e) && this._inner.classList.add(O))
                  }
              }
          }, {
              key: "show",
              value: function() {
                  var e = this;
                  this._hasTransitionEvent2 || this._addTransitionEvent2();
                  var t = new _.Event(E.SHOW);
                  _(this._sidebar).trigger(t), t.isDefaultPrevented() || (this._sidebar.classList.add(T), this._updateTriggerBtns(this._triggerArrayMobile, !0), this._config.dismiss && (_(this._triggerArrayMobile).css("pointer-events", "none"), _(document).on("mouseup.sidebar-dismiss", function(t) {
                      _.contains(e._sidebar, t.target) || e._dismiss()
                  })), this._config.swipe && this.enableSwipeHide(), u.isReducedMotion() && this._toggleMobileCompleted(), this._scroller && !this._scroller.classList.contains("overflow-hidden") && (this._scroller.classList.add("overflow-hidden"), this._scroller.offsetHeight, this._scroller.classList.remove("overflow-hidden")), 0 === u.getScrollbarInfo().width && (this._config.backdrop || this._sidebar.classList.contains("sidebar-push") && this._sidebar.classList.contains("sidebar-fixed")) && document.body.classList.add("mob-sidebar-body"))
              }
          }, {
              key: "hide",
              value: function() {
                  this._hasTransitionEvent2 || this._addTransitionEvent2();
                  var t = new _.Event(E.HIDE);
                  _(this._sidebar).trigger(t), t.isDefaultPrevented() || (this._sidebar.classList.remove(T), this._updateTriggerBtns(this._triggerArrayMobile, !1), document.body.classList.remove("mob-sidebar-body"), u.isReducedMotion() && this._toggleMobileCompleted())
              }
          }, {
              key: "_dismiss",
              value: function() {
                  this.hide(), _(this._triggerArrayMobile).css("pointer-events", ""), _(document).off(".sidebar-dismiss"), _(document).off(".sidebar-swipe")
              }
          }, {
              key: "_updateTriggerBtns",
              value: function(t, e) {
                  for (var n = 1 < arguments.length && void 0 !== e && e, i = 0, a = t.length; i < a; i++) n ? t[i].classList.remove(D) : t[i].classList.add(D), t[i].setAttribute("aria-expanded", n)
              }
          }, {
              key: "_toggleCompleted",
              value: function() {
                  this._isTransitioning = !1, this._sidebar.classList.remove(j);
                  var t = !this._sidebar.classList.contains(this._desktopCollapsedClass);
                  t ? _(this._sidebar).trigger(E.EXPANDED) : _(this._sidebar).trigger(E.COLLAPSED), t && this._inner.classList.remove(O)
              }
          }, {
              key: "_toggleMobileCompleted",
              value: function() {
                  this._sidebar.classList.contains(T) ? _(this._sidebar).trigger(E.SHOWN) : _(this._sidebar).trigger(E.HIDDEN)
              }
          }, {
              key: "_addTransitionEvent",
              value: function() {
                  var e = this;
                  if (!this._hasTransitionEvent) {
                      this._hasTransitionEvent = !0, _(this._sidebar).on("transitionend", function(t) {
                          t.target === e._sidebar && e._toggleCompleted()
                      });
                      var n = 0;
                      _(this._inner).on("transitionstart", function(t) {
                          t.target === e._inner && "width" === t.originalEvent.propertyName && 1 === ++n && e._inner.classList.add(O)
                      }).on("transitionend", function(t) {
                          t.target === e._inner && "width" === t.originalEvent.propertyName && e._inner.clientWidth < 120 && (e._inner.classList.remove(O), n = 0, "INPUT" === document.activeElement.tagName && e._inner.contains(document.activeElement) && document.activeElement.blur())
                      })
                  }
              }
          }, {
              key: "_addTransitionEvent2",
              value: function() {
                  var e = this;
                  this._hasTransitionEvent2 || (this._hasTransitionEvent2 = !0, _(this._inner).on("transitionend", function(t) {
                      t.target === e._inner && "transform" === t.originalEvent.propertyName && e._toggleMobileCompleted()
                  }))
              }
          }, {
              key: "enableSwipeHide",
              value: function() {
                  var l = 0,
                      r = 0,
                      c = 0,
                      d = this._scroller,
                      u = this,
                      h = !1,
                      i = 0;
                  _(document).on("touchstart.sidebar-swipe", function(t) {
                      var e = t.originalEvent.changedTouches[0];
                      l = e.pageX, r = e.pageY, i = Date.now(), h = document.documentElement.classList.contains("rtl"), _(this).on("touchmove.sidebar-swipe", function(t) {
                          ! function(t) {
                              var e = t.changedTouches[0],
                                  n = e.pageX,
                                  i = e.pageY;
                              if (0 === c) {
                                  var a = Math.abs(r - i),
                                      s = Math.abs(l - n);
                                  s < a ? (c = 2, d && d.classList.remove("overflow-hidden"), _(document).off("touchmove.sidebar-swipe")) : 10 < s && (c = 1, u._inner.setAttribute("style", "transition: none !important; will-change: transform; touch-action: none;"), d && d.classList.add("overflow-hidden"))
                              }
                              if (1 === c) {
                                  var o = parseInt(l - n);
                                  u._inner.style.transform = !h && 0 < o || h && o < 0 ? "translateX(" + -1 * o + "px)" : ""
                              }
                          }(t.originalEvent)
                      })
                  }).on("touchend.sidebar-swipe touchcancel.sidebar-swipe", function(t) {
                      var e = t.originalEvent.changedTouches[0].pageX,
                          n = Date.now();
                      1 === c && (!h && (100 < l - e || 40 < l - e && n - i < 300) || h && (l - e < -100 || l - e < -40 && n - i < 300)) && u._dismiss(), u._inner.setAttribute("style", ""), d && d.classList.remove("overflow-hidden"), c = 0
                  })
              }
          }, {
              key: "enableSubmenuToggle",
              value: function() {
                  var a = "MozAppearance" in document.documentElement.style,
                      s = "scrollBehavior" in document.documentElement.style,
                      o = this;
                  _(this._sidebar).on("click", ".dropdown-toggle", function(t) {
                      t.preventDefault();
                      var e = _(this).closest(".nav-item"),
                          n = e.find("> .submenu").eq(0);
                      if ((!o._sidebar.classList.contains("hoverable") && !o._sidebar.classList.contains("sidebar-hover") || "absolute" !== window.getComputedStyle(n.get(0)).position) && !n.hasClass("collapsing")) {
                          if (e.addClass("is-toggling"), e.parent().find("> .nav-item.open").addClass("is-toggling").not(e).removeClass("open").find("> .submenu.show").collapse("hide"), e.toggleClass("open"), n.collapse("toggle"), o._config.subscroll && o._sidebar.classList.contains("sidebar-fixed") && e.hasClass("open")) {
                              if (o._sidebar.classList.contains("sidebar-h")) return void window.getComputedStyle(n.get(0)).position;
                              var i = !u.isReducedMotion();
                              setTimeout(function() {
                                  try {
                                      s ? n.get(0).scrollIntoView({
                                          behavior: i ? "smooth" : "auto",
                                          block: "nearest"
                                      }) : n.get(0).scrollIntoView(!1)
                                  } catch (t) {}
                              }, i ? 150 : 0)
                          }
                          n.on("shown.bs.collapse.is-toggling hidden.bs.collapse.is-toggling", function() {
                              n.off(".is-toggling"), _(".nav-item.is-toggling").removeClass("is-toggling")
                          }), a && n.one("shown.bs.collapse.ff-fix hidden.bs.collapse.ff-fix", function() {
                              n.off(".ff-fix"), null !== o._scroller && (o._scroller.scrollHeight <= o._scroller.clientHeight ? o._scroller.style.overscrollBehavior = "auto" : o._scroller.style.overscrollBehavior = "")
                          })
                      }
                  })
              }
          }, {
              key: "enableSubmenuPullup",
              value: function() {
                  if (!this._pullupEnabled) {
                      this._pullupEnabled = !0;
                      var c = this;
                      _(this._sidebar).on("transitionstart", ".submenu", function(t) {
                          if (t.target === this && "margin-left" === t.originalEvent.propertyName && (c._collapsed || c._sidebar.classList.contains("sidebar-hover"))) {
                              var e = _(this).parent(),
                                  n = _(this),
                                  i = e.find("> .nav-link > .nav-text.fadeable");
                              e.removeClass("submenu-pullup"), n.css("transform", ""), i.css("transform", "");
                              var a = n.get(0).getBoundingClientRect(),
                                  s = _(window).height(),
                                  o = parseInt(a.bottom - s);
                              if (0 < o) {
                                  var l = i.height() || 0,
                                      r = a.top - l - o - _(".navbar").height();
                                  r < 0 && (o += r), o = parseInt(o) + 1, c._collapsed ? l && l / 2 < o && e.addClass("submenu-pullup") : e.addClass("submenu-pullup"), n.css("transform", "translateY(-" + o + "px)"), c._collapsed && i.css("transform", "translateY(-" + o + "px)")
                              }
                          }
                      })
                  }
              }
          }, {
              key: "disableSubmenuPullup",
              value: function() {
                  this._pullupEnabled = !1, _(this._sidebar).off("transitionstart.pullup"), this._resetPullUp()
              }
          }, {
              key: "_resetPullUp",
              value: function() {
                  _(this._sidebar).find(".submenu-pullup").removeClass("submenu-pullup").find(".nav-text, .submenu").css("transform", "")
              }
          }, {
              key: "scrollToActive",
              value: function() {
                  if (this._sidebar.classList.contains("sidebar-fixed") && null !== this._scroller) {
                      var t = this._sidebar.querySelector(".nav-item.active:not(.open) > .nav-link");
                      try {
                          t.scrollIntoView({
                              behavior: "auto",
                              block: "end"
                          }), this._scroller.scrollTop = this._scroller.scrollTop + 30
                      } catch (t) {}
                  }
              }
          }, {
              key: "_getConfig",
              value: function(t) {
                  return t = r({}, S, {}, "object" === c(t) && t ? t : {}), "undefined" != typeof n && n.Util.typeCheckConfig(w, t, this.constructor.DefaultType), t
              }
          }], [{
              key: "_jQueryInterface",
              value: function(i) {
                  return this.each(function() {
                      var t = _(this),
                          e = t.data(x),
                          n = r({}, S, {}, t.data(), {}, "object" === c(i) && i ? i : {});
                      if (e || (e = new a(this, n), t.data(x, e)), "string" == typeof i) {
                          if ("undefined" == typeof e[i]) throw new TypeError('No method named "'.concat(i, '"'));
                          e[i]()
                      }
                  })
              }
          }, {
              key: "VERSION",
              get: function() {
                  return "2.1.0"
              }
          }, {
              key: "Default",
              get: function() {
                  return S
              }
          }, {
              key: "DefaultType",
              get: function() {
                  return I
              }
          }]), a
      }();
  if (_(window).on(E.LOAD_DATA_API, function() {
          for (var t = [].slice.call(document.querySelectorAll(L)), e = 0; e < t.length; e++) {
              var n = _(t[e]);
              $._jQueryInterface.call(n, n.data())
          }
      }), "undefined" != typeof _) {
      var N = _.fn[w];
      _.fn[w] = $._jQueryInterface, _.fn[w].Constructor = $, _.fn[w].noConflict = function() {
          return _.fn[w] = N, $._jQueryInterface
      }
  }
  var M = "aceAside",
      F = "ace.aside",
      H = ".".concat(F),
      W = {
          SHOW: "show".concat(H),
          HIDE: "hide".concat(H)
      },
      B = {
          placement: "string",
          margin: "number",
          fade: "boolean",
          autohide: "(boolean|number)",
          dismiss: "boolean",
          blocking: "boolean",
          backdrop: "(boolean|string)",
          container: "boolean",
          belowNav: "boolean",
          width: "(boolean|number)",
          height: "(boolean|number)",
          scroll: "(boolean|string)"
      },
      z = {
          placement: "center",
          margin: 0,
          fade: !1,
          autohide: !1,
          dismiss: !1,
          blocking: !1,
          backdrop: !1,
          container: !1,
          belowNav: !1,
          width: !1,
          height: !1,
          scroll: "body"
      },
      Q = function() {
          function a(t, e) {
              o(this, a), this._config = this._getConfig(e), this._element = t, this.$element = _(t), this._init(this._config)
          }
          return e(a, [{
              key: "_init",
              value: function(t) {
                  var e;
                  if (this._setPlacement(t.placement), this._element.classList.add("ace-aside"), t.blocking ? t.backdrop ? this.$element.attr("data-backdrop-bg", t.backdrop).data("backdrop", t.backdrop) : this.$element.attr("data-backdrop-bg", "bg-transparent") : (this._element.classList.add("modal-nb"), this.$element.attr("data-backdrop", "false").data("backdrop", !1)), t.dismiss && this._element.classList.add("modal-dismiss"), t.fade && this._element.classList.add("aside-fade", "fade"), t.belowNav && this._element.classList.add("aside-below-nav"), t.extraClass && (e = this._element.classList).add.apply(e, s(t.extraClass.split(" "))), t.container && this._element.classList.add("container"), t.width && this.$element.find(".modal-dialog").css("width", isNaN(t.width) ? t.width : this._config.width + "px"), t.height && this.$element.find(".modal-dialog").css("height", isNaN(t.height) ? t.height : this._config.height + "px"), this.$element.off("shown.bs.modal.autohide"), t.autohide) {
                      var n = this;
                      this.$element.on("shown.bs.modal.autohide", function() {
                          setTimeout(function() {
                              n.hide()
                          }, t.autohide)
                      })
                  }
              }
          }, {
              key: "_setPlacement",
              value: function(t) {
                  var e = 0 < arguments.length && void 0 !== t ? t : "center",
                      n = {
                          t: "aside-top",
                          top: "aside-top",
                          tc: "aside-top aside-c",
                          tr: "aside-top aside-r",
                          tl: "aside-top aside-l",
                          b: "aside-bottom",
                          bottom: "aside-bottom",
                          bc: "aside-bottom aside-c",
                          br: "aside-bottom aside-r",
                          bl: "aside-bottom aside-l",
                          r: "aside-right",
                          right: "aside-right",
                          rc: "aside-right aside-m",
                          l: "aside-left",
                          left: "aside-left",
                          lc: "aside-left aside-m",
                          c: "aside-center",
                          center: "aside-center"
                      }[e = e || "c"] || "aside-center";
                  "c" !== e && "center" !== e || (this._config.fade = !0, this._element.classList.remove("container")), this._element.className = this._element.className + " " + n
              }
          }, {
              key: "show",
              value: function() {
                  var t = new _.Event(W.SHOW);
                  this.$element.trigger(t), t.isDefaultPrevented() || this.$element.modal("show")
              }
          }, {
              key: "hide",
              value: function() {
                  var t = new _.Event(W.HIDE);
                  this.$element.trigger(t), t.isDefaultPrevented() || this.$element.modal("hide")
              }
          }, {
              key: "_getConfig",
              value: function(t) {
                  return t = r({}, z, {}, "object" === c(t) && t ? t : {}), "undefined" != typeof n && n.Util.typeCheckConfig(M, t, this.constructor.DefaultType), t
              }
          }], [{
              key: "_jQueryInterface",
              value: function(i) {
                  return this.each(function() {
                      var t = _(this),
                          e = t.data(F);
                      if ("string" == typeof i && e) {
                          if ("undefined" == typeof e[i]) throw new TypeError('No method named "'.concat(i, '"'));
                          e[i]()
                      } else {
                          var n = r({}, z, {}, _(this).data(), {}, "object" === c(i) && i ? i : {});
                          e ? "object" === c(i) && e.update(n) : (e = new a(this, n), t.data(F, e))
                      }
                  })
              }
          }, {
              key: "_HandleAside",
              value: function() {
                  var i = ".modal.show:not(.modal-nb)",
                      n = 0;
                  _(document).on("show.bs.modal", ".modal", function(t) {
                      if (!t.isDefaultPrevented()) {
                          var e = this;
                          if (e.classList.contains("modal-nb")) 0 === _(i).length && document.body.classList.add("modal-nb");
                          else {
                              if (!e.classList.contains("ace-aside")) e.style.display = "block", e.scrollHeight > e.clientHeight && document.body.classList.add("modal-scroll"), 0 === u.getScrollbarInfo().width && document.body.classList.add("scrollbar-w0"), e.style.display = "";
                              document.body.style.setProperty("--modal-padding", window.innerWidth - document.body.scrollWidth + "px");
                              var n = _(e).attr("data-backdrop-bg");
                              n && setTimeout(function() {
                                  _(".modal-backdrop").addClass(n)
                              }, 0)
                          }
                      }
                  }).on("shown.bs.modal", ".modal", function(t) {
                      var e = this;
                      e.classList.contains("modal-nb") && (document.body.classList.remove("modal-nb"), 0 === _(i).length && (document.body.classList.remove("modal-open"), document.body.style.paddingRight = ""), e.classList.contains("modal-dismiss") && (e.setAttribute("data-dismiss-event-id", ++n), _(document.body).on("mouseup.aside-dismiss." + n + " touchend.aside-dismiss." + n, function(t) {
                          _.contains(e, t.target) || setTimeout(function() {
                              _(e).modal("hide")
                          }, 0)
                      })))
                  }).on("hidden.bs.modal", ".modal", function() {
                      if (0 === _(i).length && (document.body.style.paddingRight = ""), this.classList.contains("modal-nb") || (document.body.classList.remove("modal-scroll"), document.body.classList.remove("scrollbar-w0")), this.classList.contains("modal-dismiss")) {
                          var t = this.getAttribute("data-dismiss-event-id");
                          _(document.body).off(".aside-dismiss." + t)
                      }
                  }), _(".modal.show").modal("show")
              }
          }, {
              key: "VERSION",
              get: function() {
                  return "2.1.0"
              }
          }, {
              key: "DefaultType",
              get: function() {
                  return B
              }
          }, {
              key: "Default",
              get: function() {
                  return z
              }
          }]), a
      }();
  if ("undefined" != typeof _) {
      Q._HandleAside();
      var U = _.fn[M];
      _.fn[M] = Q._jQueryInterface, _.fn[M].Constructor = Q, _.fn[M].noConflict = function() {
          return _.fn[M] = U, Q._jQueryInterface
      }
  }
  var V = "aceToaster",
      X = ".".concat("ace.toaster"),
      q = {
          CLEAR: "clear".concat(X),
          ADD: "add".concat(X),
          ADDED: "added".concat(X)
      },
      Y = {
          placement: "string",
          close: "boolean",
          autoremove: "boolean",
          delay: "number",
          template: "string",
          alert: "boolean"
      },
      J = {
          placement: "tr",
          close: !0,
          autoremove: !0,
          delay: 2500,
          template: '<div class="toast"><div class="d-flex"><div class="toast-image"></div><div class="toast-main"><div class="toast-header"></div><div class="toast-body"></div></div></div></div>',
          alert: !0
      },
      K = function() {
          function t() {
              o(this, t), this._lastToastId = 0, this._toast = null
          }
          return e(t, [{
              key: "add",
              value: function(t) {
                  var e = this._getConfig(t),
                      n = _(e.template);
                  this._toast = n[0], this._lastToastId++, n.addClass("ace-toaster-item").attr({
                      id: "ace-toaster-item-".concat(this._lastToastId),
                      "aria-atomic": "true"
                  }), e.alert ? n.attr({
                      role: "alert",
                      "aria-live": "assertive"
                  }) : n.attr({
                      role: "status",
                      "aria-live": "polite"
                  });
                  var i = n.find(".toast-header");
                  if (e.title) {
                      var a = "function" == typeof e.title ? e.title.call(this._toast, e) : e.title;
                      a = _('<div class="toast-title">'.concat(a, "</div>")), e.titleClass && a.addClass(e.titleClass), i.append(a)
                  }
                  if (e.close) {
                      var s = n.find('[data-dismiss="toast"]');
                      0 === s.length && (s = _('<button type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>'), i.append(s)), s.addClass(e.closeClass ? e.closeClass : "close")
                  }
                  return e.body && (n.find(".toast-body").append("function" == typeof e.body ? e.body.call(this._toast, e) : e.body), e.bodyClass && n.find(".toast-body").addClass(e.bodyClass)), e.image && n.find(".toast-image").append('<img src="'.concat(e.image, '" />')), e.icon && n.find(".toast-image").append(e.icon), e.image || e.icon || n.find(".toast-image").remove(), e.className && n.addClass(e.className), e.headerClass && i.addClass(e.headerClass), this._addToContainer(n, e), n.get(0)
              }
          }, {
              key: "addEl",
              value: function(t, e) {
                  var n = this._getConfig(e);
                  this._toast = t;
                  var i = _(this._toast).addClass("ace-toaster-item");
                  i.attr("id") || i.attr("id", "ace-toaster-item-".concat(++this._lastToastId)), this._addToContainer(i, n, !1)
              }
          }, {
              key: "_addToContainer",
              value: function(t, e, n) {
                  var i = !(2 < arguments.length && void 0 !== n) || n,
                      a = new _.Event(q.ADD);
                  if (a.target = this._toast, _(document).trigger(a), a.isDefaultPrevented()) i && t.remove();
                  else {
                      var s = _(".ace-toaster-container.position-".concat(e.placement)).eq(0);
                      0 === s.length && (s = _('<div class="ace-toaster-container position-'.concat(e.placement, '"/>')).appendTo(document.body)), e.belowNav && s.addClass("toaster-below-nav"), 0 === e.placement.indexOf("b") ? s.prepend(t) : s.append(t);
                      var o = _("#ace-toaster-dummy-toast-1");
                      0 === o.length && (o = _('<div id="ace-toaster-dummy-toast-1" class="toast d-none invisible"></div>').appendTo("body")), o.toast("show");
                      var l = {};
                      !0 !== e.sticky && !1 !== e.autohide || (l.autohide = !1), !1 === e.animation && (l.animation = !1), l.delay = 30 < e.delay ? e.delay : 1e3 * e.delay, e.width && t.css("width", isNaN(e.width) ? e.width : e.width + "px"), t.toast(l).toast("show").one("hidden.bs.toast.1", function() {
                          t.removeClass("hide").addClass("show").collapse("hide").one("hidden.bs.collapse", function() {
                              t.toast("dispose"), e.autoremove && t.remove()
                          })
                      });
                      var r = new _.Event(q.ADDED);
                      r.target = this._toast, _(document).trigger(r)
                  }
              }
          }, {
              key: "remove",
              value: function(t) {
                  this.hide(t, !0)
              }
          }, {
              key: "removeAll",
              value: function(t) {
                  var e = 0 < arguments.length && void 0 !== t ? t : null;
                  this.hideAll(e, !0)
              }
          }, {
              key: "hide",
              value: function(t, e) {
                  var n = 1 < arguments.length && void 0 !== e && e,
                      i = isNaN(t) ? t : "#ace-toaster-item-" + parseInt(t);
                  this._hideBySelector(i, n)
              }
          }, {
              key: "hideAll",
              value: function(t, e) {
                  var n = 0 < arguments.length && void 0 !== t ? t : null,
                      i = 1 < arguments.length && void 0 !== e && e,
                      a = new _.Event(q.CLEAR);
                  if (_(document).trigger(a, {
                          placement: n || "all",
                          remove: i
                      }), !a.isDefaultPrevented()) {
                      var s = ".toast.ace-toaster-item";
                      n && (s = ".ace-toaster-container.position-".concat(n, " ").concat(s)), this._hideBySelector(s, i)
                  }
              }
          }, {
              key: "_hideBySelector",
              value: function(t, e) {
                  var n = 1 < arguments.length && void 0 !== e && e;
                  _(t).each(function() {
                      var t = _(this);
                      t.is(":visible") ? t.toast("hide").off("hidden.bs.toast.1").one("hidden.bs.toast.2", function() {
                          t.toast("dispose"), n && t.remove()
                      }) : (t.toast("dispose"), n && t.remove())
                  })
              }
          }, {
              key: "_getConfig",
              value: function(t) {
                  return t = r({}, J, {}, "object" === c(t) && t ? t : {}), "undefined" != typeof n && n.Util.typeCheckConfig(V, t, this.constructor.DefaultType), t
              }
          }], [{
              key: "_jQueryInterface",
              value: function(t) {
                  return this.each(function() {
                      t = r({}, {
                          autoremove: !1
                      }, {}, _(this).data(), {}, "object" === c(t) && t ? t : {}), _.aceToaster.addEl(this, t)
                  })
              }
          }, {
              key: "VERSION",
              get: function() {
                  return "2.1.0"
              }
          }, {
              key: "DefaultType",
              get: function() {
                  return Y
              }
          }, {
              key: "Default",
              get: function() {
                  return J
              }
          }]), t
      }();
  if ("undefined" != typeof _) {
      _[V] = new K;
      var G = _.fn[V];
      _.fn[V] = K._jQueryInterface, _.fn[V].Constructor = K, _.fn[V].noConflict = function() {
          return _.fn[V] = G, K._jQueryInterface
      }
  }
  var Z = "aceWidget",
      tt = "ace.widget",
      et = ".".concat(tt),
      nt = {
          SHOW: "show".concat(et),
          HIDE: "hide".concat(et),
          SHOWN: "show".concat(et),
          HIDDEN: "hide".concat(et),
          CLOSE: "close".concat(et),
          CLOSED: "closed".concat(et),
          EXPAND: "expand".concat(et),
          EXPANDED: "expanded".concat(et),
          RESTORE: "restore".concat(et),
          RESTORED: "restored".concat(et),
          RELOAD: "reload".concat(et),
          CLICK_DATA_API: "click".concat(et).concat(".data-api")
      },
      it = function() {
          function s(t, e) {
              o(this, s), this._config = this._getConfig(e), this._element = t, this.$box = _(t)
          }
          return e(s, [{
              key: "reload",
              value: function() {
                  var t = new _.Event(nt.RELOAD);
                  this.$box.trigger(t), t.isDefaultPrevented() || this.startLoading()
              }
          }, {
              key: "startLoading",
              value: function(t) {
                  var e = 0 < arguments.length && void 0 !== t ? t : '<i class="bs-card-loading-icon fa fa-spinner fa-spin fa-2x text-white"></i>';
                  this.$box.append('<div class="bs-card-loading-overlay">' + e + "</div>")
              }
          }, {
              key: "stopLoading",
              value: function() {
                  this.$box.find(".bs-card-loading-overlay").remove()
              }
          }, {
              key: "closeFast",
              value: function() {
                  var t = new _.Event(nt.CLOSE);
                  this.$box.trigger(t), t.isDefaultPrevented() || this.$box.trigger(nt.CLOSED).remove()
              }
          }, {
              key: "close",
              value: function() {
                  var t = new _.Event(nt.CLOSE);
                  if (this.$box.trigger(t), !t.isDefaultPrevented()) {
                      var e = this.$box,
                          n = function() {
                              this.hasClass("card-expand") && this.next(".card-expanded-placeholder").remove(), this.trigger(nt.CLOSED).remove()
                          };
                      u.isReducedMotion() ? n.call(e) : e.addClass("fade").on("transitionend.close", function(t) {
                          t.target === this && n.call(e)
                      })
                  }
              }
          }, {
              key: "toggle",
              value: function(t) {
                  var e = this.$box,
                      n = e.find(".card-body").eq(0),
                      i = t && "string" == typeof t && t.match(/show|hide/)[0] || (n.is(":visible") ? "hide" : "show"),
                      a = "hide" === i ? "hide" : "show",
                      s = new _.Event(a + et);
                  if (this.$box.trigger(s), !s.isDefaultPrevented()) {
                      this._toggleIcon(t && "object" === c(t) && t instanceof window.HTMLElement ? t : null, i), "hide" === i && n.addClass("show");
                      var o = "hide" === i ? "hidden" : "shown";
                      n.collapse(i).on(o + ".bs.collapse", function() {
                          e.trigger(o + et)
                      })
                  }
              }
          }, {
              key: "hide",
              value: function() {
                  this.toggle("hide")
              }
          }, {
              key: "show",
              value: function() {
                  this.toggle("show")
              }
          }, {
              key: "toggleFast",
              value: function(t) {
                  var e = this.$box.find(".card-body").eq(0),
                      n = t && "string" == typeof t && t.match(/show|hide/)[0] || (e.is(":visible") ? "hide" : "show"),
                      i = "hide" === n ? "hide" : "show",
                      a = new _.Event(i + et);
                  if (this.$box.trigger(a), !a.isDefaultPrevented()) {
                      e.addClass("collapse"), "hide" === n ? e.removeClass("show") : e.addClass("show"), this._toggleIcon(t && "object" === c(t) && t instanceof window.HTMLElement ? t : null, n);
                      var s = "hide" === n ? "hidden" : "shown";
                      this.$box.trigger(s + et)
                  }
              }
          }, {
              key: "hideFast",
              value: function() {
                  this.toggleFast("hide")
              }
          }, {
              key: "showFast",
              value: function() {
                  this.toggleFast("show")
              }
          }, {
              key: "_toggleIcon",
              value: function(t, e) {
                  (t = t || this.$box.find("a[data-action=toggle]").get(0)) && ("show" === e ? t.classList.remove("collapsed") : t.classList.add("collapsed"))
              }
          }, {
              key: "expand",
              value: function(t, e) {
                  var n = this.$box.find("> .card-header a[data-action=expand]"),
                      i = !0 === t || !this.$box.hasClass("card-expand");
                  e = !(!1 === e || u.isReducedMotion());
                  var a = this.$box,
                      s = a[0];
                  if (i) {
                      var o = new _.Event(nt.EXPAND);
                      if (this.$box.trigger(o), o.isDefaultPrevented()) return;
                      if (n.addClass("active"), e) {
                          var l = s.getBoundingClientRect();
                          s.setAttribute("style", "left: ".concat(l.left, "px; top: ").concat(l.top, "px; width: ").concat(l.width, "px; height: ").concat(l.height, "px;")), s.classList.add("card-expanding"), a.on("transitionend.expanding", function(t) {
                              t.target === this && a.off(".expanding").removeClass("card-expanding").trigger(nt.EXPANDED)
                          });
                          var r = document.createElement("DIV");
                          r.classList.add("card-expanded-placeholder"), r.setAttribute("style", "width: ".concat(l.width, "px; height: ").concat(l.height, "px;")), s.parentNode.insertBefore(r, s.nextSibling), s.offsetHeight, s.removeAttribute("style")
                      }
                      s.classList.add("card-expand"), e || a.trigger(nt.EXPANDED)
                  } else {
                      var c = new _.Event(nt.RESTORE);
                      if (this.$box.trigger(c), c.isDefaultPrevented()) return;
                      if (n.removeClass("active"), e = e && null !== s.nextElementSibling && s.nextElementSibling.classList.contains("card-expanded-placeholder")) {
                          var d = s.nextElementSibling.getBoundingClientRect();
                          s.classList.add("card-expanding"), s.setAttribute("style", "left: ".concat(d.left, "px; top: ").concat(d.top, "px; width: ").concat(d.width, "px; height: ").concat(d.height, "px;")), a.on("transitionend.restoring", function(t) {
                              t.target === this && (a.next().remove(), a.off(".restoring").removeClass("card-expanding").attr("style", "").trigger(nt.RESTORED))
                          })
                      }
                      s.classList.remove("card-expand"), e || a.trigger(nt.RESTORED)
                  }
              }
          }, {
              key: "expandFast",
              value: function() {
                  return this.expand(!0, !1)
              }
          }, {
              key: "restore",
              value: function() {
                  return this.expand(!1)
              }
          }, {
              key: "restoreFast",
              value: function() {
                  return this.expand(!1, !1)
              }
          }, {
              key: "_getConfig",
              value: function(t) {
                  return t = r({}, "object" === c(t) && t ? t : {}), "undefined" != typeof n && n.Util.typeCheckConfig(Z, t, this.constructor.DefaultType), t
              }
          }], [{
              key: "_jQueryInterface",
              value: function(i, a) {
                  return this.each(function() {
                      var t = _(this),
                          e = t.data(tt),
                          n = r({}, t.data(), {}, "object" === c(i) && i ? i : {});
                      if (e || (e = new s(this, n), t.data(tt, e)), "string" == typeof i) {
                          if ("undefined" == typeof e[i]) throw new TypeError('No method named "'.concat(i, '"'));
                          e[i](a)
                      }
                  })
              }
          }, {
              key: "VERSION",
              get: function() {
                  return "2.1.0"
              }
          }]), s
      }();
  if (_(document).on(nt.CLICK_DATA_API, "".concat(".card-toolbar a[data-action]"), function(t) {
          "A" === t.currentTarget.tagName && t.preventDefault();
          var e = _(this),
              n = e.closest(".card");
          if (0 !== n.length) {
              var i = e.data("action");
              n.trigger(t = _.Event(i + et)), t.isDefaultPrevented() || n.aceWidget(i, this)
          }
      }), "undefined" != typeof _) {
      var at = _.fn[Z];
      _.fn[Z] = it._jQueryInterface, _.fn[Z].Constructor = it, _.fn[Z].noConflict = function() {
          return _.fn[Z] = at, it._jQueryInterface
      }
  }
  var st = "aceFileInput",
      ot = "ace.file",
      lt = ".".concat(ot),
      rt = {
          INVALID: "invalid".concat(lt),
          RESET: "reset".concat(lt),
          PREVIEW_FAILED: "preview_failed".concat(lt)
      },
      ct = {
          style: !1,
          persistent: !1,
          container: "border-1 brc-grey-l2 brc-h-warning-m1",
          btnChooseClass: "bgc-default text-white px-2 pt-2 text-90 my-1px mr-1px",
          btnChangeClass: "bgc-blue text-white px-2 pt-2 text-90 my-1px mr-1px",
          btnChooseText: "Choose",
          btnChangeText: "Change",
          placeholderClass: "text-grey-m2 px-1",
          placeholderText: "No file chosen",
          placeholderIcon: '<i class="fa fa-upload bgc-grey-m1 text-white w-4 py-2 text-center"></i>',
          iconClass: "mx-2px",
          reset: "",
          resetText: "",
          resetIcon: '<i class="fa fa-times"></i>',
          droppable: !1,
          thumbnail: !1,
          previewImage: !0,
          allowExt: null,
          denyExt: null,
          allowMime: null,
          denyMime: null,
          maxSize: null,
          previewSize: !1,
          previewWidth: !1,
          previewHeight: !1,
          beforeChange: null,
          fileIcons: {
              file: '<i class="fa fa-file bgc-grey-m1 text-white w-4 py-2 text-center"></i>',
              image: '<i class="far fa-image bgc-purple-m1 text-white w-4 py-2 text-center"></i>',
              video: '<i class="fas fa-video bgc-success-m1 text-white w-4 py-2 text-center"></i>',
              audio: '<i class="fas fa-music bgc-pink-m1 text-white w-4 py-2 text-center"></i>',
              document: '<i class="far fa-file-alt bgc-default-d1 text-white w-4 py-2 text-center"></i>',
              archive: '<i class="far fa-file-archive bgc-warning text-white w-4 py-2 text-center"></i>',
              code: '<i class="fas fa-code file-code bgc-secondary text-white w-4 py-2 text-center"></i>'
          }
      },
      dt = {
          persistent: "boolean",
          style: "(boolean|string)",
          btn: "(string|undefined)",
          container: "(string|undefined)",
          icon: "(string|undefined)",
          placeholderText: "(string|undefined)",
          placeholderIcon: "(string|undefined)",
          btnChooseText: "(string|undefined)",
          btnChangeText: "(string|undefined)",
          reset: "(string|undefined)",
          resetText: "(string|undefined)",
          resetIcon: "(string|undefined)",
          droppable: "boolean",
          thumbnail: "(boolean|string)",
          previewImage: "boolean",
          allowExt: "(string|null)",
          denyExt: "(string|null)",
          allowMime: "(string|null)",
          denyMime: "(string|null)",
          maxSize: "(number|null)",
          previewSize: "(boolean|number)",
          previewWidth: "(boolean|number)",
          previewHeight: "(boolean|number)",
          fileIcons: "(object|null)",
          beforeChange: "(function|null)"
      },
      ut = 1,
      ht = 2,
      ft = 3,
      pt = function() {
          function s(t, e) {
              var n = this;
              o(this, s), this.settings = this._getConfig(e), this.settings.fileIcons = _.extend({}, ct.fileIcons, this.settings.fileIcons), this.fileList = [], this.selectMethod = "", this._hasMultiple = "multiple" in document.createElement("INPUT"), this._hasFileList = "FileList" in window, this._hasFileReader = "FileReader" in window, this._hasFile = "File" in window, this.element = t, this.$element = _(t), this.disabled = !1, this.canReset = !0, this.$element.off("change.aceInnerCall").on("change.aceInnerCall", function(t, e) {
                  if (!n.disabled && !0 !== e) return n._handleOnChange()
              });
              var i = 0 === this.$element.closest("label").addClass("d-block").length ? "label" : "span";
              this.$element.wrap("<" + i + ' class="ace-file-input" />'), this.$wrap = this.$element.parent(), this._applySettings()
          }
          return e(s, [{
              key: "_getConfig",
              value: function(t, e) {
                  return t = r({}, e, {}, t), n.Util.typeCheckConfig(st, t, dt), t
              }
          }, {
              key: "_applySettings",
              value: function() {
                  var n = this;
                  this._isMulti = this.$element.attr("multiple") && this._hasMultiple, this._isDropStyle = "drop" === this.settings.style, this._isDropStyle ? (this.settings.thumbnail || (this.settings.thumbnail = "small"), this.$wrap.addClass("ace-file-multiple")) : this.$wrap.removeClass("ace-file-multiple"), this.$wrap.find("*:not(input[type=file])").remove();
                  var t = '<div class="ace-file-placeholder h-100">\n<span class="ace-file-icon align-self-center '.concat(this.settings.iconClass || "", '">\n  ').concat(this.settings.placeholderIcon || "", '\n</span>\n<span class="ace-file-name ').concat(this.settings.placeholderClass || "", '">\n  ').concat(this.settings.placeholderText, "\n</span>") + (this._isDropStyle ? "" : '<span class="ace-file-btn ml-auto '.concat(this.settings.btnChooseClass || "", '">').concat(this.settings.btnChooseText, "</span>")) + "</div>";
                  if (this.$element.after('<div class="ace-file-container d-flex flex-column '.concat(this.settings.container || "", '">').concat(t, "</div>")), this.$container = this.$element.next(), !1 !== this.settings.reset) {
                      var e = 0 < this.settings.reset.length ? this.settings.reset : this._isDropStyle ? "position-tr bgc-white text-danger mt-n25 mr-n25 w-4 h-4 text-center pt-2px radius-round border-2 brc-grey-m4 brc-h-danger-m3" : "position-rc text-danger mr-n25 w-3 radius-2 border-1 brc-h-danger-m4 text-center",
                          i = _('<a title="'.concat(this.settings.resetText || "", '" class="remove ').concat(e, '" href="#">').concat(this.settings.resetIcon, "</a>")).appendTo(this.$wrap);
                      this.settings.resetText && i.tooltip({
                          container: "body"
                      }), i.on("click", function(t) {
                          return t.preventDefault(), !!n.canReset && (n.$element.trigger(e = new _.Event(rt.RESET)), e.isDefaultPrevented() || (n.resetInput(), n.stopLoading()), !1);
                          var e
                      })
                  }
                  this.settings.droppable && this._hasFileList && this._enableFileDrop()
              }
          }, {
              key: "showFileList",
              value: function(t, a) {
                  var s = this,
                      o = t || this.fileList;
                  if (o && o.length) {
                      this.settings.persistent || this.resetInputUI(), this.$container.addClass("selected"), this.$container.find(".ace-file-placeholder").addClass("d-none");
                      for (var e = function(t) {
                              var e = "",
                                  n = !1;
                              if ("string" == typeof o[t]) e = o[t];
                              else if (s._hasFile && o[t] instanceof window.File) e = _.trim(o[t].name);
                              else {
                                  if (!(o[t] instanceof Object && Object.prototype.hasOwnProperty.call(o[t], "name"))) return "continue";
                                  e = o[t].name, Object.prototype.hasOwnProperty.call(o[t], "type") && (n = o[t].type), Object.prototype.hasOwnProperty.call(o[t], "path") && (o[t].path = o[t].name)
                              }
                              var i = e.lastIndexOf("\\") + 1;
                              0 === i && (i = e.lastIndexOf("/") + 1), e = e.substr(i), n = n || (/\.(jpe?g|png|gif|svg|bmp|tiff?|webp)$/i.test(e) ? "image" : /\.(mpe?g|flv|mov|avi|swf|mp4|mkv|webm|wmv|3gp)$/i.test(e) ? "video" : /\.(mp3|ogg|wav|wma|amr|aac)$/i.test(e) ? "audio" : /\.(pdf|docx?|rtf|txt)$/i.test(e) ? "document" : /\.(zip|rar|tar)$/i.test(e) ? "archive" : /\.(html?|js|s?css|less|php|py|aspx?|rb|c|cpp|java|cs)$/i.test(e) ? "code" : "file"), l = s.settings.fileIcons[n], r = "ace-file-item d-flex h-100", s.settings.thumbnail && (r += " ".concat("small" !== s.settings.thumbnail ? "flex-column my-2px py-2" : "mx-1 py-1", " align-items-center")), c = _('<div class="'.concat(r, '">\n<span class="ace-file-icon align-self-center ').concat(s.settings.iconClass || "", '">').concat(l, '</span>\n<span class="ace-file-name ').concat(s.settings.thumbnail && "small" !== s.settings.thumbnail ? "px-2" : "px-1", '">').concat(e, "</span>") + (s._isDropStyle ? "" : '<span class="ace-file-btn ml-auto '.concat(s.settings.btnChangeClass || "", '">').concat(s.settings.btnChangeText, "</span>")) + "</div>").appendTo(s.$container), d = !0 === a && s._hasFile && o[t] instanceof window.File ? _.trim(o[t].type) : "", !1 !== s.settings.previewImage && s._hasFileReader && s.settings.thumbnail && (0 < d.length && d.match("image") || 0 === d.length && "image" === n) && _.when(s._previewImage(o[t], c)).fail(function(t) {
                                  s.$element.trigger(rt.PREVIEW_FAILED, {
                                      filename: e,
                                      code: t.code
                                  })
                              })
                          }, n = 0; n < o.length; n++) {
                          var l, r, c, d;
                          e(n)
                      }
                      return !0
                  }
              }
          }, {
              key: "resetInput",
              value: function() {
                  this.resetInputUI(), this.resetInputField(), this.resetInputData(), this.$container.removeClass("selected")
              }
          }, {
              key: "resetInputUI",
              value: function() {
                  this.$container.find("div:not(.ace-file-placeholder)").remove(), this.$container.find(".ace-file-placeholder").removeClass("d-none")
              }
          }, {
              key: "resetInputField",
              value: function() {
                  this.$element.wrap("<form>").parent().each(function(t, e) {
                      e.reset()
                  }), this.$element.unwrap()
              }
          }, {
              key: "resetInputData",
              value: function() {
                  this.fileList = [], this.selectMethod = "", this.$element.data("ace_input_files") && (this.$element.removeData("ace_input_files"), this.$element.removeData("ace_input_method"))
              }
          }, {
              key: "enableReset",
              value: function() {
                  this.canReset = !0
              }
          }, {
              key: "disableReset",
              value: function() {
                  this.canReset = !1
              }
          }, {
              key: "disable",
              value: function() {
                  this.disabled = !0, this.$element.attr("disabled", "disabled").addClass("disabled")
              }
          }, {
              key: "enable",
              value: function() {
                  this.disabled = !1, this.$element.removeAttr("disabled").removeClass("disabled")
              }
          }, {
              key: "files",
              value: function() {
                  return 0 < this.fileList.length ? this.fileList : null
              }
          }, {
              key: "method",
              value: function() {
                  return this.selectMethod
              }
          }, {
              key: "updateSettings",
              value: function(t) {
                  this.settings = _.extend({}, this.settings, t), this._applySettings()
              }
          }, {
              key: "startLoading",
              value: function(t) {
                  var e = 0 < arguments.length && void 0 !== t ? t : '<i class="overlay-content fa fa-spin fa-spinner text-white fa-2x"></i>',
                      n = this.$wrap.find(".ace-file-overlay");
                  0 === n.length && ((n = _('<div class="ace-file-overlay text-center"></div>').appendTo(this.$wrap)).on("click", function(t) {
                      return t.stopImmediatePropagation(), t.preventDefault(), !1
                  }), this.element.setAttribute("readonly", "true")), n.empty().append(e)
              }
          }, {
              key: "stopLoading",
              value: function() {
                  this.$wrap.find(".ace-file-overlay").remove(), this.element.removeAttribute("readonly")
              }
          }, {
              key: "_enableFileDrop",
              value: function() {
                  var s = this;
                  this.$element.parent().off("dragenter").on("dragenter", function(t) {
                      t.preventDefault(), t.stopPropagation()
                  }).off("dragover").on("dragover", function(t) {
                      t.preventDefault(), t.stopPropagation()
                  }).off("drop").on("drop", function(t) {
                      if (t.preventDefault(), t.stopPropagation(), !s.disabled) {
                          var e = t.originalEvent.dataTransfer.files;
                          if (!s._isMulti && 1 < e.length) {
                              var n = [];
                              n.push(e[0]), e = n
                          }
                          if (!1 === (e = s._processFiles(e, !0))) return !1;
                          s.$element.data("ace_input_method", "drop"), s.selectMethod = "drop";
                          for (var i = [], a = 0; a < e.length; a++) i.push(e[a]);
                          return s.settings.persistent ? s.fileList = s.fileList.concat(i) : s.fileList = i, s.$element.data("ace_input_files", s.fileList), s.$element.data("ace_input_method", s.selectMethod), s.showFileList(i, !0), s.$element.triggerHandler("change", [!0]), !0
                      }
                  })
              }
          }, {
              key: "_handleOnChange",
              value: function() {
                  var t = this.element.files || [this.element.value];
                  if (!1 === (t = this._processFiles(t, !1))) return !1;
                  for (var e = [], n = 0; n < t.length; n++) e.push(t[n]);
                  return this.selectMethod = "select", this.settings.persistent ? this.fileList = this.fileList.concat(e) : this.fileList = e, this.$element.data("ace_input_files", this.fileList), this.$element.data("ace_input_method", this.selectMethod), this.showFileList(e, !0), !0
              }
          }, {
              key: "_previewImage",
              value: function(e, t) {
                  var l = t.find(".ace-file-icon");
                  l.empty();

                  function n(t, e) {
                      l.prepend("<img style='display: none;' />");
                      var n = l.find("img:last").get(0);
                      _(n).one("load", function() {
                          i(n, e)
                      }).one("error", function() {
                          a()
                      }), n.src = t
                  }
                  var r = new _.Deferred,
                      c = this,
                      i = function(t, e) {
                          var n = c.settings.previewSize;
                          n || (c.settings.previewWidth || c.settings.previewHeight ? n = {
                              previewWidth: c.settings.previewWidth,
                              previewHeight: c.settings.previewHeight
                          } : (n = 50, "large" === c.settings.thumbnail && (n = 150))), "fit" === c.settings.thumbnail ? n = l.parent().width() : "number" == typeof n && (n = parseInt(Math.min(n, l.parent().width())));
                          var i = /svg/.test(e.type),
                              a = !i && c._getThumbnail(t, n, e.type);
                          if (null === a) return _(c).remove(), void r.reject({
                              code: ft
                          });
                          if (i) "small" === c.settings.thumbnail || t.width > t.height ? _(t).css({
                              width: n
                          }) : _(t).css({
                              height: n
                          });
                          else {
                              var s = a.previewWidth,
                                  o = a.previewHeight;
                              "small" === c.settings.thumbnail ? s = o = parseInt(Math.max(s, o)) : l.addClass("thumbnail-large"), _(t).css({
                                  background: "url(" + a.src + ") center no-repeat",
                                  width: s,
                                  height: o
                              }).data("src", a.src).attr({
                                  src: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="
                              })
                          }
                          t.style.display = "", r.resolve()
                      },
                      a = function() {
                          l.find("img").remove(), r.reject({
                              code: ht
                          })
                      };
                  if (this._hasFile && e instanceof window.File) {
                      var s = new window.FileReader;
                      s.onload = function(t) {
                          n(t.target.result, e)
                      }, s.onerror = function(t) {
                          r.reject({
                              code: ut
                          })
                      }, s.readAsDataURL(e)
                  } else e instanceof Object && Object.prototype.hasOwnProperty.call(e, "path") && n(e.path, null);
                  return r.promise()
              }
          }, {
              key: "_getThumbnail",
              value: function(t, e, n) {
                  var i = t.width,
                      a = t.height;
                  i = 0 < i ? i : _(t).width(), a = 0 < a ? a : _(t).height();
                  var s, o = !1,
                      l = !1,
                      r = !1;
                  "number" == typeof e ? o = e : e instanceof Object && (e.previewWidth && !e.previewHeight ? r = e.previewWidth : e.previewHeight && !e.previewWidth ? l = e.previewHeight : e.previewWidth && e.previewHeight && (r = e.previewWidth, l = e.previewHeight)), o ? a < i ? (r = o, l = parseInt(a / i * r)) : (l = o, r = parseInt(i / a * l)) : !l && r ? l = parseInt(a / i * r) : l && !r && (r = parseInt(i / a * l));
                  try {
                      var c = document.createElement("canvas");
                      c.width = r, c.height = l;
                      var d = c.getContext("2d");
                      d.imageSmoothingQuality = "medium", d.drawImage(t, 0, 0, i, a, 0, 0, r, l), s = c.toDataURL(n, .8)
                  } catch (t) {
                      s = null
                  }
                  return s ? (/^data:image\/(png|jpe?g|gif|svg);base64,[0-9A-Za-z+/=]+$/.test(s) || (s = null), s ? {
                      src: s,
                      previewWidth: r,
                      previewHeight: l,
                      width: i,
                      height: a
                  } : null) : null
              }
          }, {
              key: "_processFiles",
              value: function(t, e) {
                  var n = this._checkFileList(t, e);
                  return -1 === n ? (this.resetInput(), !1) : n && 0 !== n.length ? ((n instanceof Array || this._hasFileList && n instanceof window.FileList) && (t = n), n = !0, this.settings.beforeChange && (n = this.settings.beforeChange.call(this.element, t, e)), -1 === n ? (this.resetInput(), !1) : n && 0 !== n.length ? ((n instanceof Array || this._hasFileList && n instanceof window.FileList) && (t = n), t) : (this.$element.data("ace_input_files") || this.resetInput(), !1)) : (this.$element.data("ace_input_files") || this.resetInput(), !1)
              }
          }, {
              key: "_checkFileList",
              value: function(t, e) {
                  var n = this._getExtRegex(this.settings.allowExt),
                      i = this._getExtRegex(this.settings.denyExt),
                      a = this._getMimeRegex(this.settings.allowMime),
                      s = this._getMimeRegex(this.settings.denyMime),
                      o = this.settings.maxSize || !1;
                  if (!(n || i || a || s || o)) return !0;
                  for (var l = [], r = {}, c = 0; c < t.length; c++) {
                      var d, u = t[c],
                          h = this._hasFile ? u.name : u;
                      if (!n || n.test(h))
                          if (i && i.test(h)) "ext" in r || (r.ext = []), r.ext.push(h);
                          else if (this._hasFile) {
                          if (0 < (d = _.trim(u.type)).length) {
                              if (a && !a.test(d)) {
                                  "mime" in r || (r.mime = []), r.mime.push(h);
                                  continue
                              }
                              if (s && s.test(d)) {
                                  "mime" in r || (r.mime = []), r.mime.push(h);
                                  continue
                              }
                          }
                          o && u.size > o ? ("size" in r || (r.size = []), r.size.push(h)) : l.push(u)
                      } else l.push(u);
                      else "ext" in r || (r.ext = []), r.ext.push(h)
                  }
                  if (l.length === t.length) return t;
                  var f, p = {
                      ext: 0,
                      mime: 0,
                      size: 0
                  };
                  return "ext" in r && (p.ext = r.ext.length), "mime" in r && (p.mime = r.mime.length), "size" in r && (p.size = r.size.length), this.$element.trigger(f = new _.Event(rt.INVALID), {
                      fileCount: t.length,
                      invalidCount: t.length - l.length,
                      errorList: r,
                      errorCount: p,
                      dropped: e
                  }), f.isDefaultPrevented() ? -1 : l
              }
          }, {
              key: "_getExtRegex",
              value: function(t) {
                  return t ? (Array.isArray(t) && (t = t.join("|")), 0 === t.length ? null : new RegExp("\\.(?:" + t + ")$", "i")) : null
              }
          }, {
              key: "_getMimeRegex",
              value: function(t) {
                  return t ? (Array.isArray(t) && (t = t.join("|")), 0 === t.length ? null : new RegExp("^(?:" + t.replace(/\//g, "\\/") + ")$", "i")) : null
              }
          }], [{
              key: "_jQueryInterface",
              value: function(i, a) {
                  return this.each(function() {
                      var t = _(this),
                          e = t.data(ot),
                          n = r({}, ct, {}, t.data(), {}, "object" === c(i) && i ? i : {});
                      if (e || (e = new s(this, n), t.data(ot, e)), "string" == typeof i) {
                          if ("undefined" == typeof e[i]) throw new TypeError('No method named "'.concat(i, '"'));
                          e[i](a)
                      }
                  })
              }
          }, {
              key: "VERSION",
              get: function() {
                  return "2.1.0"
              }
          }, {
              key: "DefaultType",
              get: function() {
                  return dt
              }
          }]), s
      }();
  if ("undefined" != typeof _) {
      var gt = _.fn[st];
      _.fn[st] = pt._jQueryInterface, _.fn[st].Constructor = pt, _.fn[st].noConflict = function() {
          return _.fn[st] = gt, pt._jQueryInterface
      }
  }
  var mt = "aceWysiwyg",
      vt = "ace.wysiwyg",
      bt = {
          wysiwyg: "object",
          colors: "array",
          toolbar: "array",
          toolbarPlacement: "(function|null)",
          toolbarStyle: "(string|number)"
      },
      yt = {
          wysiwyg: {},
          toolbarPlacement: null,
          toolbarStyle: "",
          colors: ["#ac725e", "#d06b64", "#f83a22", "#fa573c", "#ff7537", "#ffad46", "#42d692", "#16a765", "#7bd148", "#b3dc6c", "#fbe983", "#fad165", "#92e1c0", "#9fe1e7", "#9fc6e7", "#4986e7", "#9a9cff", "#b99aff", "#c2c2c2", "#cabdbf", "#cca6ac", "#f691b2", "#cd74e6", "#a47ae2", "#444444"],
          toolbar: ["font", null, "fontSize", null, "bold", "italic", "strikethrough", "underline", null, "insertunorderedlist", "insertorderedlist", "outdent", "indent", null, "justifyleft", "justifycenter", "justifyright", "justifyfull", null, "createLink", "unlink", null, "insertImage", null, "foreColor", null, "undo", "redo", null, "viewSource"]
      },
      wt = function() {
          function a(t, e) {
              o(this, a), this._element = t, this._config = this._getConfig(e), this.initEditor()
          }
          return e(a, [{
              key: "initEditor",
              value: function() {
                  var t, e = this._createToolbarHtml();
                  t = this._config.toolbarPlacement ? this._config.toolbarPlacement.call(this._element, e) : _(this._element).before(e).prev(), this._config.toolbarStyle && t.addClass("bsw-toolbar-style-" + this._config.toolbarStyle), _.fn.tooltip && t.find("a[title]").tooltip({
                      animation: !1,
                      container: "body"
                  }), t.find(".dropdown-menu input[type=text]").on("click", function() {
                      return !1
                  }).on("change", function() {
                      _(this).closest(".dropdown-menu").siblings(".dropdown-toggle").dropdown("toggle")
                  }).on("keydown", function(t) {
                      27 === t.which ? (this.value = "", _(this).change()) : 13 === t.which && (t.preventDefault(), t.stopPropagation(), _(this).change())
                  }), t.find("input[type=file]").prev().on("click", function(t) {
                      _(this).next().click()
                  });
                  var n = _(this._element),
                      i = !1;
                  t.find("a[data-toggle=source]").on("click", function(t) {
                      if (t.preventDefault(), i) {
                          var e = n.next();
                          n.html(e.val()).removeClass("d-none"), e.remove(), _(this).removeClass("active")
                      } else _("<textarea />").css({
                          width: n.outerWidth(),
                          height: n.outerHeight()
                      }).val(n.html()).insertAfter(n), n.addClass("d-none"), _(this).addClass("active");
                      i = !i
                  });
                  var a = _.extend({}, {
                      activeToolbarClass: "active",
                      toolbarSelector: t
                  }, this._config.wysiwyg || {});
                  _(this._element).wysiwyg(a), this._handleImages()
              }
          }, {
              key: "_createToolbarHtml",
              value: function() {
                  var t = {
                          font: {
                              values: ["Arial", "Courier", "Comic Sans MS", "Helvetica", "Open Sans", "Tahoma", "Verdana"],
                              icon: "fa fa-font text-secondary-m1",
                              title: "Font"
                          },
                          fontSize: {
                              values: {
                                  5: "Huge",
                                  3: "Normal",
                                  1: "Small"
                              },
                              icon: "fa fa-text-height text-secondary-m1",
                              title: "Font Size"
                          },
                          bold: {
                              icon: "fa fa-bold text-secondary-m1",
                              title: "Bold (Ctrl/Cmd+B)"
                          },
                          italic: {
                              icon: "fa fa-italic text-secondary-m1",
                              title: "Italic (Ctrl/Cmd+I)"
                          },
                          strikethrough: {
                              icon: "fa fa-strikethrough text-secondary-m1",
                              title: "Strikethrough"
                          },
                          underline: {
                              icon: "fa fa-underline text-secondary-m1",
                              title: "Underline"
                          },
                          insertunorderedlist: {
                              icon: "fa fa-list-ul text-secondary-m1",
                              title: "Bullet list"
                          },
                          insertorderedlist: {
                              icon: "fa fa-list-ol text-secondary-m1",
                              title: "Number list"
                          },
                          outdent: {
                              icon: "fa fa-outdent text-secondary-m1",
                              title: "Reduce indent (Shift+Tab)"
                          },
                          indent: {
                              icon: "fa fa-indent text-secondary-m1",
                              title: "Indent (Tab)"
                          },
                          justifyleft: {
                              icon: "fa fa-align-left text-secondary-m1",
                              title: "Align Left (Ctrl/Cmd+L)"
                          },
                          justifycenter: {
                              icon: "fa fa-align-center text-secondary-m1",
                              title: "Center (Ctrl/Cmd+E)"
                          },
                          justifyright: {
                              icon: "fa fa-align-right text-secondary-m1",
                              title: "Align Right (Ctrl/Cmd+R)"
                          },
                          justifyfull: {
                              icon: "fa fa-align-justify text-secondary-m1",
                              title: "Justify (Ctrl/Cmd+J)"
                          },
                          createLink: {
                              icon: "fa fa-link text-secondary-m1",
                              title: "Hyperlink",
                              button_text: "Add",
                              placeholder: "URL",
                              button_class: "btn-primary"
                          },
                          unlink: {
                              icon: "fa fa-unlink text-secondary-m1",
                              title: "Remove Hyperlink"
                          },
                          insertImage: {
                              icon: "fa fa-image text-secondary-m1",
                              title: "Insert picture",
                              button_text: '<i class="fa fa-file mr-1"></i> Choose an Image &hellip;',
                              placeholder: "Remote Image URL",
                              button_insert: "Insert",
                              button_class: "btn-success",
                              button_insert_class: "btn-primary",
                              choose_file: !0
                          },
                          foreColor: {
                              icon: "fas fa-eye-dropper text-pink-m2",
                              values: this._config.colors,
                              title: "Foreground Color"
                          },
                          backColor: {
                              icon: "fas fa-fill-drip text-secondary-m1",
                              values: this._config.colors,
                              title: "Background Color"
                          },
                          undo: {
                              icon: "fa fa-undo text-secondary-m1",
                              title: "Undo (Ctrl/Cmd+Z)"
                          },
                          redo: {
                              icon: "fa fa-redo text-secondary-m1",
                              title: "Redo (Ctrl/Cmd+Y)"
                          },
                          viewSource: {
                              icon: "fa fa-code text-secondary-m1",
                              title: "View Source"
                          }
                      },
                      e = this._config.toolbar,
                      n = ' <div class="bootstrap-wysiwyg-toolbar btn-toolbar text-center"> <div class="btn-group"> ';
                  for (var i in e)
                      if (Object.prototype.hasOwnProperty.call(e, i)) {
                          var a = e[i];
                          if (null === a) {
                              n += ' </div> <div class="btn-group"> ';
                              continue
                          }
                          if ("string" == typeof a && a in t)(a = t[a]).name = e[i];
                          else {
                              if (!("object" === c(a) && a.name in t)) continue;
                              a = _.extend(t[a.name], a)
                          }
                          var s = "className" in a ? a.className : "my-2px btn-sm btn-outline-secondary btn-h-outline-primary btn-a-light-primary";
                          switch (a.name) {
                              case "font":
                                  for (var o in n += ' <a class="btn btn-sm '.concat(s, ' dropdown-toggle" data-toggle="dropdown" title="').concat(a.title, '"><i class="').concat(a.icon, '">').concat(a.iconText || "", '</i><i class="fa fa-angle-down ml-1 text-secondary-m2"></i></a> '), n += ' <div class="dropdown-menu">', a.values) Object.prototype.hasOwnProperty.call(a.values, o) && (n += ' <div class="dropdown-item"><a data-edit="fontName '.concat(a.values[o], '" style="font-family:\'').concat(a.values[o], "'\">").concat(a.values[o], "</a></div> "));
                                  n += " </div>";
                                  break;
                              case "fontSize":
                                  for (var l in n += ' <a class="btn btn-sm '.concat(s, ' dropdown-toggle" data-toggle="dropdown" title="').concat(a.title, '"><i class="').concat(a.icon, '">').concat(a.iconText || "", '</i>&nbsp;<i class="fa fa-angle-down ml-1 text-secondary-m2"></i></a> '), n += ' <div class="dropdown-menu"> ', a.values) Object.prototype.hasOwnProperty.call(a.values, l) && (n += ' <div class="dropdown-item"><a data-edit="fontSize '.concat(l, '"><font size="').concat(l, '">').concat(a.values[l], "</font></a></div> "));
                                  n += " </div> ";
                                  break;
                              case "createLink":
                                  n += ' <div class="btn-group"> <a class="btn btn-sm '.concat(s, ' dropdown-toggle" data-toggle="dropdown" title="').concat(a.title, '"><i class="').concat(a.icon, '">').concat(a.iconText || "", "</i></a> "), n += ' <div class="dropdown-menu py-1 px-3 brc-primary-tp2 border-2" style="min-width: 300px;">\n\t\t\t\t\t\t <div class="input-group my-3">\n\t\t\t\t\t\t\t<input class="form-control" placeholder="'.concat(a.placeholder, '" type="text" data-edit="').concat(a.name, '" />\n\t\t\t\t\t\t\t<div class="input-group-append">\n\t\t\t\t\t\t\t\t<button class="btn btn-sm ').concat(a.button_class, '" type="button">').concat(a.button_text, "</button>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t </div>\n\t\t\t\t\t</div> </div>");
                                  break;
                              case "insertImage":
                                  n += ' <div class="btn-group"> <a class="btn btn-sm '.concat(s, ' dropdown-toggle" data-toggle="dropdown" title="').concat(a.title, '"><i class="').concat(a.icon, '">').concat(a.iconText || "", "</i></a> "), n += ' <div class="dropdown-menu p-3 brc-primary-tp2 border-2" style="min-width: 300px;">', a.choose_file && "FileReader" in window && (n += '<div class="text-muted">Drag &amp; drop images into editor or</div>\n\t\t\t\t\t\t   <label class="text-center d-block mt-2 mb-0">\n\t\t\t\t\t\t\t<button class="btn btn-sm '.concat(a.button_class, ' wysiwyg-choose-file" type="button">').concat(a.button_text, '</button>\n\t\t\t\t\t\t\t<input type="file" class="file-input-invisible" data-edit="').concat(a.name, '" />\n\t\t\t\t\t\t   </label><hr /> ')), n += '<div class="input-group my-3">\n\t\t\t\t\t\t\t<input class="form-control" placeholder="'.concat(a.placeholder, '" type="text" data-edit="').concat(a.name, '" />\n\t\t\t\t\t\t\t<div class="input-group-append">\n\t\t\t\t\t\t\t\t<button class="btn btn-sm ').concat(a.button_insert_class, '" type="button">').concat(a.button_insert, "</button>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t </div>"), n += " </div> </div>";
                                  break;
                              case "foreColor":
                              case "backColor":
                                  for (var r in n += '<div class="mr-1px"><a class="btn btn-sm '.concat(s, ' dropdown-toggle" data-toggle="dropdown" title="').concat(a.title, '"><i class="').concat(a.icon, '">').concat(a.iconText || "", "</i></a> "), n += ' <div class="dropdown-menu p-1 brc-primary-tp2 border-1" style="min-width:auto; width:128px;">', a.values) Object.prototype.hasOwnProperty.call(a.values, r) && (n += ' <div class="dropdown-item p-0 d-inline-block w-auto"><a class="p-0" data-edit="'.concat(a.name, " ").concat(a.values[r], '" style="cursor:pointer;width:1.25rem;height:1.25rem;background-color:').concat(a.values[r], ';"></a></div> '));
                                  n += " </div></div>";
                                  break;
                              case "viewSource":
                                  n += ' <a class="btn btn-sm '.concat(s, '" data-toggle="source" title="').concat(a.title, '"><i class="').concat(a.icon, '">').concat(a.iconText || "", "</i></a> ");
                                  break;
                              default:
                                  n += ' <a class="btn btn-sm '.concat(s, '" data-edit="').concat(a.name, '" title="').concat(a.title, '"><i class="').concat(a.icon, '">').concat(a.iconText || "", "</i></a> ")
                          }
                      }
                  return n += " </div> ", n += " </div> "
              }
          }, {
              key: "_handleImages",
              value: function() {
                  var i = null;
                  _(this._element).on("click", "img", function(t) {
                      i && _(i).popover("dispose"), _(i = this).data("original-width") || _(i).data("original-width", i.width), _(i).popover({
                          container: "body",
                          html: !0,
                          placement: function(t) {
                              var e = i.getBoundingClientRect(),
                                  n = document.scrollTop || document.documentElement.scrollTop || document.body.scrollTop;
                              return _(t).addClass("popover-wysiwyg-image shadow brc-secondary-m4").css({
                                  "margin-left": e.left + 4 + "px",
                                  "margin-top": e.top + n + 4 + "px"
                              }), "auto"
                          },
                          title: "Image Size & Position",
                          trigger: "manual",
                          content: function() {
                              return _("<div class='btn-group'>\n\t\t\t\t\t\t\t\t<button type='button' class='btn btn-xs btn-outline-default' data-action='resize' data-value='0.25'>25%</button>\n\t\t\t\t\t\t\t\t<button type='button' class='btn btn-xs btn-outline-default' data-action='resize' data-value='0.50'>50%</button>\n\t\t\t\t\t\t\t\t<button type='button' class='btn btn-xs btn-outline-default' data-action='resize' data-value='1'>100%</button>\n\t\t\t\t\t\t\t  </div>\n\t\t\t\t\t\t\t  <input type='number' class='form-control d-inline-block form-control-sm' data-action='resize' style='max-width: 96px;' placeholder='specify width' value='".concat(i.width, "' />\n\t\t\t\t\t\t\t  <hr class='my-2' />\n\t\t\t\t\t\t\t  <div class='btn-group'>\n\t\t\t\t\t\t\t\t<button type='button' class='btn btn-xs btn-outline-secondary' data-action='align' data-value='left'>left</button>\n\t\t\t\t\t\t\t\t<button type='button' class='btn btn-xs btn-outline-secondary' data-action='align' data-value='right'>right</button>\n\t\t\t\t\t\t\t\t<button type='button' class='btn btn-xs btn-outline-secondary' data-action='align' data-value='none'>none</button>\n\t\t\t\t\t\t\t </div>\n\t\t\t\t\t\t\t <div class='btn-group float-right'>\n\t\t\t\t\t\t\t\t<button type='button' tooltip='Remove image' class='btn btn-sm btn-outline-warning btn-h-outline-danger btn-a-light-danger btn-bold radius-round' data-action='remove'><i class='fa fa-trash text-red'></i></button>\n\t\t\t\t\t\t\t </div>"))
                          }
                      }).popover("show"), _(document).on("click.popover-wysiwyg-image", function(t) {
                          t.target !== i && (0 < _(t.target).closest(".popover-wysiwyg-image").length || (i && _(i).popover("hide"), i = null, _(document).off("click.popover-wysiwyg-image")))
                      })
                  }), _(document).on("click", ".popover-wysiwyg-image button.btn", function() {
                      if (i) {
                          var t = _(this).data("action"),
                              e = _(this).data("value");
                          if ("resize" === t) {
                              var n = parseInt(_(i).data("original-width") * e);
                              _(i).css({
                                  width: n
                              }), _(".popover-wysiwyg-image input[type=number]").val(n)
                          }
                          "align" === t ? _(i).attr("class", "float-" + e) : "remove" === t && (_(i).popover("dispose").remove(), i = null)
                      }
                  }), _(document).on("change", ".popover-wysiwyg-image input[type=number]", function() {
                      i && _(i).css({
                          width: _(this).val() + "px"
                      })
                  })
              }
          }, {
              key: "_getConfig",
              value: function(t) {
                  return t = r({}, yt, {}, "object" === c(t) && t ? t : {}), "undefined" != typeof n && n.Util.typeCheckConfig(mt, t, this.constructor.DefaultType), t
              }
          }], [{
              key: "_jQueryInterface",
              value: function(i) {
                  return this.each(function() {
                      var t = _(this),
                          e = t.data(vt),
                          n = r({}, yt, {}, t.data(), {}, "object" === c(i) && i ? i : {});
                      if (e || (e = new a(this, n), t.data(vt, e)), "string" == typeof i) {
                          if ("undefined" == typeof e[i]) throw new TypeError('No method named "'.concat(i, '"'));
                          e[i]()
                      }
                  })
              }
          }, {
              key: "VERSION",
              get: function() {
                  return "2.1.0"
              }
          }, {
              key: "DefaultType",
              get: function() {
                  return bt
              }
          }, {
              key: "Default",
              get: function() {
                  return yt
              }
          }]), a
      }();
  if ("undefined" != typeof _) {
      var _t = _.fn[mt];
      _.fn[mt] = wt._jQueryInterface, _.fn[mt].Constructor = wt, _.fn[mt].noConflict = function() {
          return _.fn[mt] = _t, wt._jQueryInterface
      }
  }
  return {
      Util: u,
      Basic: t,
      Scrollbar: b,
      Sidebar: $,
      Aside: Q,
      Toaster: K,
      Widget: it,
      FileInput: pt,
      Wysiwyg: wt
  }
});
//# sourceMappingURL=ace.min.js.map