/*! jQuery UI - v1.11.3 - 2015-02-17
 * http://jqueryui.com
 * Includes: core.js, widget.js, mouse.js, slider.js
 * Copyright 2015 jQuery Foundation and other contributors; Licensed MIT */
function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function getDocumentHeight() {
    var e = document;
    return Math.max(e.body.scrollHeight, e.documentElement.scrollHeight, e.body.offsetHeight, e.documentElement.offsetHeight, e.body.clientHeight, e.documentElement.clientHeight)
}

function fixMenuItems() {
/*    var e = $("#menu>ul>li").length - 1 - $("#client-login-button").length,
        t = e,
        i = $("#linked-sites").outerHeight() || 0;
    for ($("#menu>ul>li").show(), $("#menu-more").empty(); $("#menu>ul>li:last-child").offset().top - $(document).scrollTop() > i;) $("#menu-more").prepend($("#menu>ul>li:nth-child(" + t + ")").get(0).outerHTML), $("#menu ul li:nth-child(" + t + ")").hide(), t--;
    t != e ? $("#menu-more-button").show() : $("#menu-more-button").hide()*/
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function getDocumentHeight() {
    var e = document;
    return Math.max(e.body.scrollHeight, e.documentElement.scrollHeight, e.body.offsetHeight, e.documentElement.offsetHeight, e.body.clientHeight, e.documentElement.clientHeight)
}

function fixMenuItems() {
    /*var e = $("#menu>ul>li").length - 1 - $("#client-login-button").length,
        t = e,
        i = $("#linked-sites").outerHeight() || 0;
    for ($("#menu>ul>li").show(), $("#menu-more").empty(); $("#menu>ul>li:last-child").offset().top - $(document).scrollTop() > i;) $("#menu-more").prepend($("#menu>ul>li:nth-child(" + t + ")").get(0).outerHTML), $("#menu ul li:nth-child(" + t + ")").hide(), t--;
    t != e ? $("#menu-more-button").show() : $("#menu-more-button").hide()*/
}

function setHeroHeight() {
    $(window).width() > 1024 ? $("#hero .container").height($(window).height()) : $("#hero .container").height(500)
}

function headerPosition() {
    $(window).scrollTop() > 0 ? $("header").addClass("scrolled") : $("header").removeClass("scrolled")
}! function(e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : e(jQuery)
}((function(e) {
    function t(t, n) {
        var a, o, s, r = t.nodeName.toLowerCase();
        return "area" === r ? (o = (a = t.parentNode).name, !(!t.href || !o || "map" !== a.nodeName.toLowerCase()) && (!!(s = e("img[usemap='#" + o + "']")[0]) && i(s))) : (/^(input|select|textarea|button|object)$/.test(r) ? !t.disabled : "a" === r && t.href || n) && i(t)
    }

    function i(t) {
        return e.expr.filters.visible(t) && !e(t).parents().addBack().filter((function() {
            return "hidden" === e.css(this, "visibility")
        })).length
    }
    e.ui = e.ui || {}, e.extend(e.ui, {
        version: "1.11.3",
        keyCode: {
            BACKSPACE: 8,
            COMMA: 188,
            DELETE: 46,
            DOWN: 40,
            END: 35,
            ENTER: 13,
            ESCAPE: 27,
            HOME: 36,
            LEFT: 37,
            PAGE_DOWN: 34,
            PAGE_UP: 33,
            PERIOD: 190,
            RIGHT: 39,
            SPACE: 32,
            TAB: 9,
            UP: 38
        }
    }), e.fn.extend({
        scrollParent: function(t) {
            var i = this.css("position"),
                n = "absolute" === i,
                a = t ? /(auto|scroll|hidden)/ : /(auto|scroll)/,
                o = this.parents().filter((function() {
                    var t = e(this);
                    return (!n || "static" !== t.css("position")) && a.test(t.css("overflow") + t.css("overflow-y") + t.css("overflow-x"))
                })).eq(0);
            return "fixed" !== i && o.length ? o : e(this[0].ownerDocument || document)
        },
        uniqueId: function() {
            var e = 0;
            return function() {
                return this.each((function() {
                    this.id || (this.id = "ui-id-" + ++e)
                }))
            }
        }(),
        removeUniqueId: function() {
            return this.each((function() {
                /^ui-id-\d+$/.test(this.id) && e(this).removeAttr("id")
            }))
        }
    }), e.extend(e.expr[":"], {
        data: e.expr.createPseudo ? e.expr.createPseudo((function(t) {
            return function(i) {
                return !!e.data(i, t)
            }
        })) : function(t, i, n) {
            return !!e.data(t, n[3])
        },
        focusable: function(i) {
            return t(i, !isNaN(e.attr(i, "tabindex")))
        },
        tabbable: function(i) {
            var n = e.attr(i, "tabindex"),
                a = isNaN(n);
            return (a || n >= 0) && t(i, !a)
        }
    }), e("<a>").outerWidth(1).jquery || e.each(["Width", "Height"], (function(t, i) {
        function n(t, i, n, o) {
            return e.each(a, (function() {
                i -= parseFloat(e.css(t, "padding" + this)) || 0, n && (i -= parseFloat(e.css(t, "border" + this + "Width")) || 0), o && (i -= parseFloat(e.css(t, "margin" + this)) || 0)
            })), i
        }
        var a = "Width" === i ? ["Left", "Right"] : ["Top", "Bottom"],
            o = i.toLowerCase(),
            s = {
                innerWidth: e.fn.innerWidth,
                innerHeight: e.fn.innerHeight,
                outerWidth: e.fn.outerWidth,
                outerHeight: e.fn.outerHeight
            };
        e.fn["inner" + i] = function(t) {
            return void 0 === t ? s["inner" + i].call(this) : this.each((function() {
                e(this).css(o, n(this, t) + "px")
            }))
        }, e.fn["outer" + i] = function(t, a) {
            return "number" != typeof t ? s["outer" + i].call(this, t) : this.each((function() {
                e(this).css(o, n(this, t, !0, a) + "px")
            }))
        }
    })), e.fn.addBack || (e.fn.addBack = function(e) {
        return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
    }), e("<a>").data("a-b", "a").removeData("a-b").data("a-b") && (e.fn.removeData = function(t) {
        return function(i) {
            return arguments.length ? t.call(this, e.camelCase(i)) : t.call(this)
        }
    }(e.fn.removeData)), e.ui.ie = !!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()), e.fn.extend({
        focus: function(t) {
            return function(i, n) {
                return "number" == typeof i ? this.each((function() {
                    var t = this;
                    setTimeout((function() {
                        e(t).focus(), n && n.call(t)
                    }), i)
                })) : t.apply(this, arguments)
            }
        }(e.fn.focus),
        disableSelection: function() {
            var e = "onselectstart" in document.createElement("div") ? "selectstart" : "mousedown";
            return function() {
                return this.bind(e + ".ui-disableSelection", (function(e) {
                    e.preventDefault()
                }))
            }
        }(),
        enableSelection: function() {
            return this.unbind(".ui-disableSelection")
        },
        zIndex: function(t) {
            if (void 0 !== t) return this.css("zIndex", t);
            if (this.length)
                for (var i, n, a = e(this[0]); a.length && a[0] !== document;) {
                    if (("absolute" === (i = a.css("position")) || "relative" === i || "fixed" === i) && (n = parseInt(a.css("zIndex"), 10), !isNaN(n) && 0 !== n)) return n;
                    a = a.parent()
                }
            return 0
        }
    }), e.ui.plugin = {
        add: function(t, i, n) {
            var a, o = e.ui[t].prototype;
            for (a in n) o.plugins[a] = o.plugins[a] || [], o.plugins[a].push([i, n[a]])
        },
        call: function(e, t, i, n) {
            var a, o = e.plugins[t];
            if (o && (n || e.element[0].parentNode && 11 !== e.element[0].parentNode.nodeType))
                for (a = 0; o.length > a; a++) e.options[o[a][0]] && o[a][1].apply(e.element, i)
        }
    };
    var n = 0,
        a = Array.prototype.slice;
    e.cleanData = function(t) {
        return function(i) {
            var n, a, o;
            for (o = 0; null != (a = i[o]); o++) try {
                (n = e._data(a, "events")) && n.remove && e(a).triggerHandler("remove")
            } catch (e) {}
            t(i)
        }
    }(e.cleanData), e.widget = function(t, i, n) {
        var a, o, s, r, l = {},
            c = t.split(".")[0];
        return t = t.split(".")[1], a = c + "-" + t, n || (n = i, i = e.Widget), e.expr[":"][a.toLowerCase()] = function(t) {
            return !!e.data(t, a)
        }, e[c] = e[c] || {}, o = e[c][t], s = e[c][t] = function(e, t) {
            return this._createWidget ? void(arguments.length && this._createWidget(e, t)) : new s(e, t)
        }, e.extend(s, o, {
            version: n.version,
            _proto: e.extend({}, n),
            _childConstructors: []
        }), (r = new i).options = e.widget.extend({}, r.options), e.each(n, (function(t, n) {
            return e.isFunction(n) ? void(l[t] = function() {
                var e = function() {
                        return i.prototype[t].apply(this, arguments)
                    },
                    a = function(e) {
                        return i.prototype[t].apply(this, e)
                    };
                return function() {
                    var t, i = this._super,
                        o = this._superApply;
                    return this._super = e, this._superApply = a, t = n.apply(this, arguments), this._super = i, this._superApply = o, t
                }
            }()) : void(l[t] = n)
        })), s.prototype = e.widget.extend(r, {
            widgetEventPrefix: o && r.widgetEventPrefix || t
        }, l, {
            constructor: s,
            namespace: c,
            widgetName: t,
            widgetFullName: a
        }), o ? (e.each(o._childConstructors, (function(t, i) {
            var n = i.prototype;
            e.widget(n.namespace + "." + n.widgetName, s, i._proto)
        })), delete o._childConstructors) : i._childConstructors.push(s), e.widget.bridge(t, s), s
    }, e.widget.extend = function(t) {
        for (var i, n, o = a.call(arguments, 1), s = 0, r = o.length; r > s; s++)
            for (i in o[s]) n = o[s][i], o[s].hasOwnProperty(i) && void 0 !== n && (t[i] = e.isPlainObject(n) ? e.isPlainObject(t[i]) ? e.widget.extend({}, t[i], n) : e.widget.extend({}, n) : n);
        return t
    }, e.widget.bridge = function(t, i) {
        var n = i.prototype.widgetFullName || t;
        e.fn[t] = function(o) {
            var s = "string" == typeof o,
                r = a.call(arguments, 1),
                l = this;
            return s ? this.each((function() {
                var i, a = e.data(this, n);
                return "instance" === o ? (l = a, !1) : a ? e.isFunction(a[o]) && "_" !== o.charAt(0) ? (i = a[o].apply(a, r)) !== a && void 0 !== i ? (l = i && i.jquery ? l.pushStack(i.get()) : i, !1) : void 0 : e.error("no such method '" + o + "' for " + t + " widget instance") : e.error("cannot call methods on " + t + " prior to initialization; attempted to call method '" + o + "'")
            })) : (r.length && (o = e.widget.extend.apply(null, [o].concat(r))), this.each((function() {
                var t = e.data(this, n);
                t ? (t.option(o || {}), t._init && t._init()) : e.data(this, n, new i(o, this))
            }))), l
        }
    }, e.Widget = function() {}, e.Widget._childConstructors = [], e.Widget.prototype = {
        widgetName: "widget",
        widgetEventPrefix: "",
        defaultElement: "<div>",
        options: {
            disabled: !1,
            create: null
        },
        _createWidget: function(t, i) {
            i = e(i || this.defaultElement || this)[0], this.element = e(i), this.uuid = n++, this.eventNamespace = "." + this.widgetName + this.uuid, this.bindings = e(), this.hoverable = e(), this.focusable = e(), i !== this && (e.data(i, this.widgetFullName, this), this._on(!0, this.element, {
                remove: function(e) {
                    e.target === i && this.destroy()
                }
            }), this.document = e(i.style ? i.ownerDocument : i.document || i), this.window = e(this.document[0].defaultView || this.document[0].parentWindow)), this.options = e.widget.extend({}, this.options, this._getCreateOptions(), t), this._create(), this._trigger("create", null, this._getCreateEventData()), this._init()
        },
        _getCreateOptions: e.noop,
        _getCreateEventData: e.noop,
        _create: e.noop,
        _init: e.noop,
        destroy: function() {
            this._destroy(), this.element.unbind(this.eventNamespace).removeData(this.widgetFullName).removeData(e.camelCase(this.widgetFullName)), this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName + "-disabled ui-state-disabled"), this.bindings.unbind(this.eventNamespace), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")
        },
        _destroy: e.noop,
        widget: function() {
            return this.element
        },
        option: function(t, i) {
            var n, a, o, s = t;
            if (0 === arguments.length) return e.widget.extend({}, this.options);
            if ("string" == typeof t)
                if (s = {}, n = t.split("."), t = n.shift(), n.length) {
                    for (a = s[t] = e.widget.extend({}, this.options[t]), o = 0; n.length - 1 > o; o++) a[n[o]] = a[n[o]] || {}, a = a[n[o]];
                    if (t = n.pop(), 1 === arguments.length) return void 0 === a[t] ? null : a[t];
                    a[t] = i
                } else {
                    if (1 === arguments.length) return void 0 === this.options[t] ? null : this.options[t];
                    s[t] = i
                } return this._setOptions(s), this
        },
        _setOptions: function(e) {
            var t;
            for (t in e) this._setOption(t, e[t]);
            return this
        },
        _setOption: function(e, t) {
            return this.options[e] = t, "disabled" === e && (this.widget().toggleClass(this.widgetFullName + "-disabled", !!t), t && (this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus"))), this
        },
        enable: function() {
            return this._setOptions({
                disabled: !1
            })
        },
        disable: function() {
            return this._setOptions({
                disabled: !0
            })
        },
        _on: function(t, i, n) {
            var a, o = this;
            "boolean" != typeof t && (n = i, i = t, t = !1), n ? (i = a = e(i), this.bindings = this.bindings.add(i)) : (n = i, i = this.element, a = this.widget()), e.each(n, (function(n, s) {
                function r() {
                    return t || !0 !== o.options.disabled && !e(this).hasClass("ui-state-disabled") ? ("string" == typeof s ? o[s] : s).apply(o, arguments) : void 0
                }
                "string" != typeof s && (r.guid = s.guid = s.guid || r.guid || e.guid++);
                var l = n.match(/^([\w:-]*)\s*(.*)$/),
                    c = l[1] + o.eventNamespace,
                    u = l[2];
                u ? a.delegate(u, c, r) : i.bind(c, r)
            }))
        },
        _off: function(t, i) {
            i = (i || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace, t.unbind(i).undelegate(i), this.bindings = e(this.bindings.not(t).get()), this.focusable = e(this.focusable.not(t).get()), this.hoverable = e(this.hoverable.not(t).get())
        },
        _delay: function(e, t) {
            function i() {
                return ("string" == typeof e ? n[e] : e).apply(n, arguments)
            }
            var n = this;
            return setTimeout(i, t || 0)
        },
        _hoverable: function(t) {
            this.hoverable = this.hoverable.add(t), this._on(t, {
                mouseenter: function(t) {
                    e(t.currentTarget).addClass("ui-state-hover")
                },
                mouseleave: function(t) {
                    e(t.currentTarget).removeClass("ui-state-hover")
                }
            })
        },
        _focusable: function(t) {
            this.focusable = this.focusable.add(t), this._on(t, {
                focusin: function(t) {
                    e(t.currentTarget).addClass("ui-state-focus")
                },
                focusout: function(t) {
                    e(t.currentTarget).removeClass("ui-state-focus")
                }
            })
        },
        _trigger: function(t, i, n) {
            var a, o, s = this.options[t];
            if (n = n || {}, (i = e.Event(i)).type = (t === this.widgetEventPrefix ? t : this.widgetEventPrefix + t).toLowerCase(), i.target = this.element[0], o = i.originalEvent)
                for (a in o) a in i || (i[a] = o[a]);
            return this.element.trigger(i, n), !(e.isFunction(s) && !1 === s.apply(this.element[0], [i].concat(n)) || i.isDefaultPrevented())
        }
    }, e.each({
        show: "fadeIn",
        hide: "fadeOut"
    }, (function(t, i) {
        e.Widget.prototype["_" + t] = function(n, a, o) {
            "string" == typeof a && (a = {
                effect: a
            });
            var s, r = a ? !0 === a || "number" == typeof a ? i : a.effect || i : t;
            "number" == typeof(a = a || {}) && (a = {
                duration: a
            }), s = !e.isEmptyObject(a), a.complete = o, a.delay && n.delay(a.delay), s && e.effects && e.effects.effect[r] ? n[t](a) : r !== t && n[r] ? n[r](a.duration, a.easing, o) : n.queue((function(i) {
                e(this)[t](), o && o.call(n[0]), i()
            }))
        }
    })), e.widget;
    var o = !1;
    e(document).mouseup((function() {
        o = !1
    })), e.widget("ui.mouse", {
        version: "1.11.3",
        options: {
            cancel: "input,textarea,button,select,option",
            distance: 1,
            delay: 0
        },
        _mouseInit: function() {
            var t = this;
            this.element.bind("mousedown." + this.widgetName, (function(e) {
                return t._mouseDown(e)
            })).bind("click." + this.widgetName, (function(i) {
                return !0 === e.data(i.target, t.widgetName + ".preventClickEvent") ? (e.removeData(i.target, t.widgetName + ".preventClickEvent"), i.stopImmediatePropagation(), !1) : void 0
            })), this.started = !1
        },
        _mouseDestroy: function() {
            this.element.unbind("." + this.widgetName), this._mouseMoveDelegate && this.document.unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate)
        },
        _mouseDown: function(t) {
            if (!o) {
                this._mouseMoved = !1, this._mouseStarted && this._mouseUp(t), this._mouseDownEvent = t;
                var i = this,
                    n = 1 === t.which,
                    a = !("string" != typeof this.options.cancel || !t.target.nodeName) && e(t.target).closest(this.options.cancel).length;
                return !(n && !a && this._mouseCapture(t)) || (this.mouseDelayMet = !this.options.delay, this.mouseDelayMet || (this._mouseDelayTimer = setTimeout((function() {
                    i.mouseDelayMet = !0
                }), this.options.delay)), this._mouseDistanceMet(t) && this._mouseDelayMet(t) && (this._mouseStarted = !1 !== this._mouseStart(t), !this._mouseStarted) ? (t.preventDefault(), !0) : (!0 === e.data(t.target, this.widgetName + ".preventClickEvent") && e.removeData(t.target, this.widgetName + ".preventClickEvent"), this._mouseMoveDelegate = function(e) {
                    return i._mouseMove(e)
                }, this._mouseUpDelegate = function(e) {
                    return i._mouseUp(e)
                }, this.document.bind("mousemove." + this.widgetName, this._mouseMoveDelegate).bind("mouseup." + this.widgetName, this._mouseUpDelegate), t.preventDefault(), o = !0, !0))
            }
        },
        _mouseMove: function(t) {
            if (this._mouseMoved) {
                if (e.ui.ie && (!document.documentMode || 9 > document.documentMode) && !t.button) return this._mouseUp(t);
                if (!t.which) return this._mouseUp(t)
            }
            return (t.which || t.button) && (this._mouseMoved = !0), this._mouseStarted ? (this._mouseDrag(t), t.preventDefault()) : (this._mouseDistanceMet(t) && this._mouseDelayMet(t) && (this._mouseStarted = !1 !== this._mouseStart(this._mouseDownEvent, t), this._mouseStarted ? this._mouseDrag(t) : this._mouseUp(t)), !this._mouseStarted)
        },
        _mouseUp: function(t) {
            return this.document.unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate), this._mouseStarted && (this._mouseStarted = !1, t.target === this._mouseDownEvent.target && e.data(t.target, this.widgetName + ".preventClickEvent", !0), this._mouseStop(t)), o = !1, !1
        },
        _mouseDistanceMet: function(e) {
            return Math.max(Math.abs(this._mouseDownEvent.pageX - e.pageX), Math.abs(this._mouseDownEvent.pageY - e.pageY)) >= this.options.distance
        },
        _mouseDelayMet: function() {
            return this.mouseDelayMet
        },
        _mouseStart: function() {},
        _mouseDrag: function() {},
        _mouseStop: function() {},
        _mouseCapture: function() {
            return !0
        }
    }), e.widget("ui.slider", e.ui.mouse, {
        version: "1.11.3",
        widgetEventPrefix: "slide",
        options: {
            animate: !1,
            distance: 0,
            max: 100,
            min: 0,
            orientation: "horizontal",
            range: !1,
            step: 1,
            value: 0,
            values: null,
            change: null,
            slide: null,
            start: null,
            stop: null
        },
        numPages: 5,
        _create: function() {
            this._keySliding = !1, this._mouseSliding = !1, this._animateOff = !0, this._handleIndex = null, this._detectOrientation(), this._mouseInit(), this._calculateNewMax(), this.element.addClass("ui-slider ui-slider-" + this.orientation + " ui-widget ui-widget-content ui-corner-all"), this._refresh(), this._setOption("disabled", this.options.disabled), this._animateOff = !1
        },
        _refresh: function() {
            this._createRange(), this._createHandles(), this._setupEvents(), this._refreshValue()
        },
        _createHandles: function() {
            var t, i, n = this.options,
                a = this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"),
                o = "<span class='ui-slider-handle ui-state-default ui-corner-all' tabindex='0'></span>",
                s = [];
            for (i = n.values && n.values.length || 1, a.length > i && (a.slice(i).remove(), a = a.slice(0, i)), t = a.length; i > t; t++) s.push(o);
            this.handles = a.add(e(s.join("")).appendTo(this.element)), this.handle = this.handles.eq(0), this.handles.each((function(t) {
                e(this).data("ui-slider-handle-index", t)
            }))
        },
        _createRange: function() {
            var t = this.options,
                i = "";
            t.range ? (!0 === t.range && (t.values ? t.values.length && 2 !== t.values.length ? t.values = [t.values[0], t.values[0]] : e.isArray(t.values) && (t.values = t.values.slice(0)) : t.values = [this._valueMin(), this._valueMin()]), this.range && this.range.length ? this.range.removeClass("ui-slider-range-min ui-slider-range-max").css({
                left: "",
                bottom: ""
            }) : (this.range = e("<div></div>").appendTo(this.element), i = "ui-slider-range ui-widget-header ui-corner-all"), this.range.addClass(i + ("min" === t.range || "max" === t.range ? " ui-slider-range-" + t.range : ""))) : (this.range && this.range.remove(), this.range = null)
        },
        _setupEvents: function() {
            this._off(this.handles), this._on(this.handles, this._handleEvents), this._hoverable(this.handles), this._focusable(this.handles)
        },
        _destroy: function() {
            this.handles.remove(), this.range && this.range.remove(), this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-widget ui-widget-content ui-corner-all"), this._mouseDestroy()
        },
        _mouseCapture: function(t) {
            var i, n, a, o, s, r, l, c, u = this,
                d = this.options;
            return !d.disabled && (this.elementSize = {
                width: this.element.outerWidth(),
                height: this.element.outerHeight()
            }, this.elementOffset = this.element.offset(), i = {
                x: t.pageX,
                y: t.pageY
            }, n = this._normValueFromMouse(i), a = this._valueMax() - this._valueMin() + 1, this.handles.each((function(t) {
                var i = Math.abs(n - u.values(t));
                (a > i || a === i && (t === u._lastChangedValue || u.values(t) === d.min)) && (a = i, o = e(this), s = t)
            })), !1 !== (r = this._start(t, s)) && (this._mouseSliding = !0, this._handleIndex = s, o.addClass("ui-state-active").focus(), l = o.offset(), c = !e(t.target).parents().addBack().is(".ui-slider-handle"), this._clickOffset = c ? {
                left: 0,
                top: 0
            } : {
                left: t.pageX - l.left - o.width() / 2,
                top: t.pageY - l.top - o.height() / 2 - (parseInt(o.css("borderTopWidth"), 10) || 0) - (parseInt(o.css("borderBottomWidth"), 10) || 0) + (parseInt(o.css("marginTop"), 10) || 0)
            }, this.handles.hasClass("ui-state-hover") || this._slide(t, s, n), this._animateOff = !0, !0))
        },
        _mouseStart: function() {
            return !0
        },
        _mouseDrag: function(e) {
            var t = {
                    x: e.pageX,
                    y: e.pageY
                },
                i = this._normValueFromMouse(t);
            return this._slide(e, this._handleIndex, i), !1
        },
        _mouseStop: function(e) {
            return this.handles.removeClass("ui-state-active"), this._mouseSliding = !1, this._stop(e, this._handleIndex), this._change(e, this._handleIndex), this._handleIndex = null, this._clickOffset = null, this._animateOff = !1, !1
        },
        _detectOrientation: function() {
            this.orientation = "vertical" === this.options.orientation ? "vertical" : "horizontal"
        },
        _normValueFromMouse: function(e) {
            var t, i, n, a, o;
            return "horizontal" === this.orientation ? (t = this.elementSize.width, i = e.x - this.elementOffset.left - (this._clickOffset ? this._clickOffset.left : 0)) : (t = this.elementSize.height, i = e.y - this.elementOffset.top - (this._clickOffset ? this._clickOffset.top : 0)), (n = i / t) > 1 && (n = 1), 0 > n && (n = 0), "vertical" === this.orientation && (n = 1 - n), a = this._valueMax() - this._valueMin(), o = this._valueMin() + n * a, this._trimAlignValue(o)
        },
        _start: function(e, t) {
            var i = {
                handle: this.handles[t],
                value: this.value()
            };
            return this.options.values && this.options.values.length && (i.value = this.values(t), i.values = this.values()), this._trigger("start", e, i)
        },
        _slide: function(e, t, i) {
            var n, a, o;
            this.options.values && this.options.values.length ? (n = this.values(t ? 0 : 1), 2 === this.options.values.length && !0 === this.options.range && (0 === t && i > n || 1 === t && n > i) && (i = n), i !== this.values(t) && ((a = this.values())[t] = i, o = this._trigger("slide", e, {
                handle: this.handles[t],
                value: i,
                values: a
            }), n = this.values(t ? 0 : 1), !1 !== o && this.values(t, i))) : i !== this.value() && (!1 !== (o = this._trigger("slide", e, {
                handle: this.handles[t],
                value: i
            })) && this.value(i))
        },
        _stop: function(e, t) {
            var i = {
                handle: this.handles[t],
                value: this.value()
            };
            this.options.values && this.options.values.length && (i.value = this.values(t), i.values = this.values()), this._trigger("stop", e, i)
        },
        _change: function(e, t) {
            if (!this._keySliding && !this._mouseSliding) {
                var i = {
                    handle: this.handles[t],
                    value: this.value()
                };
                this.options.values && this.options.values.length && (i.value = this.values(t), i.values = this.values()), this._lastChangedValue = t, this._trigger("change", e, i)
            }
        },
        value: function(e) {
            return arguments.length ? (this.options.value = this._trimAlignValue(e), this._refreshValue(), void this._change(null, 0)) : this._value()
        },
        values: function(t, i) {
            var n, a, o;
            if (arguments.length > 1) return this.options.values[t] = this._trimAlignValue(i), this._refreshValue(), void this._change(null, t);
            if (!arguments.length) return this._values();
            if (!e.isArray(t)) return this.options.values && this.options.values.length ? this._values(t) : this.value();
            for (n = this.options.values, a = t, o = 0; n.length > o; o += 1) n[o] = this._trimAlignValue(a[o]), this._change(null, o);
            this._refreshValue()
        },
        _setOption: function(t, i) {
            var n, a = 0;
            switch ("range" === t && !0 === this.options.range && ("min" === i ? (this.options.value = this._values(0), this.options.values = null) : "max" === i && (this.options.value = this._values(this.options.values.length - 1), this.options.values = null)), e.isArray(this.options.values) && (a = this.options.values.length), "disabled" === t && this.element.toggleClass("ui-state-disabled", !!i), this._super(t, i), t) {
                case "orientation":
                    this._detectOrientation(), this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-" + this.orientation), this._refreshValue(), this.handles.css("horizontal" === i ? "bottom" : "left", "");
                    break;
                case "value":
                    this._animateOff = !0, this._refreshValue(), this._change(null, 0), this._animateOff = !1;
                    break;
                case "values":
                    for (this._animateOff = !0, this._refreshValue(), n = 0; a > n; n += 1) this._change(null, n);
                    this._animateOff = !1;
                    break;
                case "step":
                case "min":
                case "max":
                    this._animateOff = !0, this._calculateNewMax(), this._refreshValue(), this._animateOff = !1;
                    break;
                case "range":
                    this._animateOff = !0, this._refresh(), this._animateOff = !1
            }
        },
        _value: function() {
            var e = this.options.value;
            return e = this._trimAlignValue(e)
        },
        _values: function(e) {
            var t, i, n;
            if (arguments.length) return t = this.options.values[e], t = this._trimAlignValue(t);
            if (this.options.values && this.options.values.length) {
                for (i = this.options.values.slice(), n = 0; i.length > n; n += 1) i[n] = this._trimAlignValue(i[n]);
                return i
            }
            return []
        },
        _trimAlignValue: function(e) {
            if (this._valueMin() >= e) return this._valueMin();
            if (e >= this._valueMax()) return this._valueMax();
            var t = this.options.step > 0 ? this.options.step : 1,
                i = (e - this._valueMin()) % t,
                n = e - i;
            return 2 * Math.abs(i) >= t && (n += i > 0 ? t : -t), parseFloat(n.toFixed(5))
        },
        _calculateNewMax: function() {
            var e = this.options.max,
                t = this._valueMin(),
                i = this.options.step,
                n;
            e = Math.floor((e - t) / i) * i + t, this.max = parseFloat(e.toFixed(this._precision()))
        },
        _precision: function() {
            var e = this._precisionOf(this.options.step);
            return null !== this.options.min && (e = Math.max(e, this._precisionOf(this.options.min))), e
        },
        _precisionOf: function(e) {
            var t = "" + e,
                i = t.indexOf(".");
            return -1 === i ? 0 : t.length - i - 1
        },
        _valueMin: function() {
            return this.options.min
        },
        _valueMax: function() {
            return this.max
        },
        _refreshValue: function() {
            var t, i, n, a, o, s = this.options.range,
                r = this.options,
                l = this,
                c = !this._animateOff && r.animate,
                u = {};
            this.options.values && this.options.values.length ? this.handles.each((function(n) {
                i = (l.values(n) - l._valueMin()) / (l._valueMax() - l._valueMin()) * 100, u["horizontal" === l.orientation ? "left" : "bottom"] = i + "%", e(this).stop(1, 1)[c ? "animate" : "css"](u, r.animate), !0 === l.options.range && ("horizontal" === l.orientation ? (0 === n && l.range.stop(1, 1)[c ? "animate" : "css"]({
                    left: i + "%"
                }, r.animate), 1 === n && l.range[c ? "animate" : "css"]({
                    width: i - t + "%"
                }, {
                    queue: !1,
                    duration: r.animate
                })) : (0 === n && l.range.stop(1, 1)[c ? "animate" : "css"]({
                    bottom: i + "%"
                }, r.animate), 1 === n && l.range[c ? "animate" : "css"]({
                    height: i - t + "%"
                }, {
                    queue: !1,
                    duration: r.animate
                }))), t = i
            })) : (n = this.value(), a = this._valueMin(), o = this._valueMax(), i = o !== a ? (n - a) / (o - a) * 100 : 0, u["horizontal" === this.orientation ? "left" : "bottom"] = i + "%", this.handle.stop(1, 1)[c ? "animate" : "css"](u, r.animate), "min" === s && "horizontal" === this.orientation && this.range.stop(1, 1)[c ? "animate" : "css"]({
                width: i + "%"
            }, r.animate), "max" === s && "horizontal" === this.orientation && this.range[c ? "animate" : "css"]({
                width: 100 - i + "%"
            }, {
                queue: !1,
                duration: r.animate
            }), "min" === s && "vertical" === this.orientation && this.range.stop(1, 1)[c ? "animate" : "css"]({
                height: i + "%"
            }, r.animate), "max" === s && "vertical" === this.orientation && this.range[c ? "animate" : "css"]({
                height: 100 - i + "%"
            }, {
                queue: !1,
                duration: r.animate
            }))
        },
        _handleEvents: {
            keydown: function(t) {
                var i, n, a, o, s = e(t.target).data("ui-slider-handle-index");
                switch (t.keyCode) {
                    case e.ui.keyCode.HOME:
                    case e.ui.keyCode.END:
                    case e.ui.keyCode.PAGE_UP:
                    case e.ui.keyCode.PAGE_DOWN:
                    case e.ui.keyCode.UP:
                    case e.ui.keyCode.RIGHT:
                    case e.ui.keyCode.DOWN:
                    case e.ui.keyCode.LEFT:
                        if (t.preventDefault(), !this._keySliding && (this._keySliding = !0, e(t.target).addClass("ui-state-active"), !1 === (i = this._start(t, s)))) return
                }
                switch (o = this.options.step, n = a = this.options.values && this.options.values.length ? this.values(s) : this.value(), t.keyCode) {
                    case e.ui.keyCode.HOME:
                        a = this._valueMin();
                        break;
                    case e.ui.keyCode.END:
                        a = this._valueMax();
                        break;
                    case e.ui.keyCode.PAGE_UP:
                        a = this._trimAlignValue(n + (this._valueMax() - this._valueMin()) / this.numPages);
                        break;
                    case e.ui.keyCode.PAGE_DOWN:
                        a = this._trimAlignValue(n - (this._valueMax() - this._valueMin()) / this.numPages);
                        break;
                    case e.ui.keyCode.UP:
                    case e.ui.keyCode.RIGHT:
                        if (n === this._valueMax()) return;
                        a = this._trimAlignValue(n + o);
                        break;
                    case e.ui.keyCode.DOWN:
                    case e.ui.keyCode.LEFT:
                        if (n === this._valueMin()) return;
                        a = this._trimAlignValue(n - o)
                }
                this._slide(t, s, a)
            },
            keyup: function(t) {
                var i = e(t.target).data("ui-slider-handle-index");
                this._keySliding && (this._keySliding = !1, this._stop(t, i), this._change(t, i), e(t.target).removeClass("ui-state-active"))
            }
        }
    })
})),
function(e) {
    "use strict";

    function t(e) {
        if (void 0 === Function.prototype.name) {
            var t, i = /function\s([^(]{1,})\(/.exec(e.toString());
            return i && i.length > 1 ? i[1].trim() : ""
        }
        return void 0 === e.prototype ? e.constructor.name : e.prototype.constructor.name
    }

    function i(e) {
        return "true" === e || "false" !== e && (isNaN(1 * e) ? e : parseFloat(e))
    }

    function n(e) {
        return e.replace(/([a-z])([A-Z])/g, "$1-$2").toLowerCase()
    }
    var a, o = {
        version: "6.3.0",
        _plugins: {},
        _uuids: [],
        rtl: function() {
            return "rtl" === e("html").attr("dir")
        },
        plugin: function(e, i) {
            var a = i || t(e),
                o = n(a);
            this._plugins[o] = this[a] = e
        },
        registerPlugin: function(e, i) {
            var a = i ? n(i) : t(e.constructor).toLowerCase();
            e.uuid = this.GetYoDigits(6, a), e.$element.attr("data-" + a) || e.$element.attr("data-" + a, e.uuid), e.$element.data("zfPlugin") || e.$element.data("zfPlugin", e), e.$element.trigger("init.zf." + a), this._uuids.push(e.uuid)
        },
        unregisterPlugin: function(e) {
            var i = n(t(e.$element.data("zfPlugin").constructor));
            for (var a in this._uuids.splice(this._uuids.indexOf(e.uuid), 1), e.$element.removeAttr("data-" + i).removeData("zfPlugin").trigger("destroyed.zf." + i), e) e[a] = null
        },
        reInit: function(t) {
            var i = t instanceof e;
            try {
                if (i) t.each((function() {
                    e(this).data("zfPlugin")._init()
                }));
                else {
                    var a, o = this,
                        s;
                    ({
                        object: function(t) {
                            t.forEach((function(t) {
                                t = n(t), e("[data-" + t + "]").foundation("_init")
                            }))
                        },
                        string: function() {
                            t = n(t), e("[data-" + t + "]").foundation("_init")
                        },
                        undefined: function() {
                            this.object(Object.keys(o._plugins))
                        }
                    })[typeof t](t)
                }
            } catch (e) {
                console.error(e)
            } finally {
                return t
            }
        },
        GetYoDigits: function(e, t) {
            return e = e || 6, Math.round(Math.pow(36, e + 1) - Math.random() * Math.pow(36, e)).toString(36).slice(1) + (t ? "-" + t : "")
        },
        reflow: function(t, n) {
            void 0 === n ? n = Object.keys(this._plugins) : "string" == typeof n && (n = [n]);
            var a = this;
            e.each(n, (function(n, o) {
                var s = a._plugins[o],
                    r;
                e(t).find("[data-" + o + "]").addBack("[data-" + o + "]").each((function() {
                    var t = e(this),
                        n = {};
                    if (t.data("zfPlugin")) console.warn("Tried to initialize " + o + " on an element that already has a Foundation plugin.");
                    else {
                        t.attr("data-options") && t.attr("data-options").split(";").forEach((function(e, t) {
                            var a = e.split(":").map((function(e) {
                                return e.trim()
                            }));
                            a[0] && (n[a[0]] = i(a[1]))
                        }));
                        try {
                            t.data("zfPlugin", new s(e(this), n))
                        } catch (e) {
                            console.error(e)
                        } finally {
                            return
                        }
                    }
                }))
            }))
        },
        getFnName: t,
        transitionend: function(e) {
            var t, i = {
                    transition: "transitionend",
                    WebkitTransition: "webkitTransitionEnd",
                    MozTransition: "transitionend",
                    OTransition: "otransitionend"
                },
                n = document.createElement("div");
            for (var a in i) void 0 !== n.style[a] && (t = i[a]);
            return t || (t = setTimeout((function() {
                e.triggerHandler("transitionend", [e])
            }), 1), "transitionend")
        }
    };
    o.util = {
        throttle: function(e, t) {
            var i = null;
            return function() {
                var n = this,
                    a = arguments;
                null === i && (i = setTimeout((function() {
                    e.apply(n, a), i = null
                }), t))
            }
        }
    };
    var s = function(i) {
        var n = typeof i,
            a = e("meta.foundation-mq"),
            s = e(".no-js");
        if (a.length || e('<meta class="foundation-mq">').appendTo(document.head), s.length && s.removeClass("no-js"), "undefined" === n) o.MediaQuery._init(), o.reflow(this);
        else {
            if ("string" !== n) throw new TypeError("We're sorry, " + n + " is not a valid parameter. You must use a string representing the method you wish to invoke.");
            var r = Array.prototype.slice.call(arguments, 1),
                l = this.data("zfPlugin");
            if (void 0 === l || void 0 === l[i]) throw new ReferenceError("We're sorry, '" + i + "' is not an available method for " + (l ? t(l) : "this element") + ".");
            1 === this.length ? l[i].apply(l, r) : this.each((function(t, n) {
                l[i].apply(e(n).data("zfPlugin"), r)
            }))
        }
        return this
    };
    window.Foundation = o, e.fn.foundation = s,
        function() {
            Date.now && window.Date.now || (window.Date.now = Date.now = function() {
                return (new Date).getTime()
            });
            for (var e = ["webkit", "moz"], t = 0; t < e.length && !window.requestAnimationFrame; ++t) {
                var i = e[t];
                window.requestAnimationFrame = window[i + "RequestAnimationFrame"], window.cancelAnimationFrame = window[i + "CancelAnimationFrame"] || window[i + "CancelRequestAnimationFrame"]
            }
            if (/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent) || !window.requestAnimationFrame || !window.cancelAnimationFrame) {
                var n = 0;
                window.requestAnimationFrame = function(e) {
                    var t = Date.now(),
                        i = Math.max(n + 16, t);
                    return setTimeout((function() {
                        e(n = i)
                    }), i - t)
                }, window.cancelAnimationFrame = clearTimeout
            }
            window.performance && window.performance.now || (window.performance = {
                start: Date.now(),
                now: function() {
                    return Date.now() - this.start
                }
            })
        }(), Function.prototype.bind || (Function.prototype.bind = function(e) {
            if ("function" != typeof this) throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
            var t = Array.prototype.slice.call(arguments, 1),
                i = this,
                n = function() {},
                a = function() {
                    return i.apply(this instanceof n ? this : e, t.concat(Array.prototype.slice.call(arguments)))
                };
            return this.prototype && (n.prototype = this.prototype), a.prototype = new n, a
        })
}(jQuery),
function(e) {
    function t(e) {
        var t = {};
        return "string" != typeof e ? t : (e = e.trim().slice(1, -1)) ? t = e.split("&").reduce((function(e, t) {
            var i = t.replace(/\+/g, " ").split("="),
                n = i[0],
                a = i[1];
            return n = decodeURIComponent(n), a = void 0 === a ? null : decodeURIComponent(a), e.hasOwnProperty(n) ? Array.isArray(e[n]) ? e[n].push(a) : e[n] = [e[n], a] : e[n] = a, e
        }), {}) : t
    }
    var i = {
        queries: [],
        current: "",
        _init: function() {
            var i, n = this,
                a = e(".foundation-mq").css("font-family");
            for (var o in i = t(a)) i.hasOwnProperty(o) && n.queries.push({
                name: o,
                value: "only screen and (min-width: " + i[o] + ")"
            });
            this.current = this._getCurrentSize(), this._watcher()
        },
        atLeast: function(e) {
            var t = this.get(e);
            return !!t && window.matchMedia(t).matches
        },
        is: function(e) {
            return (e = e.trim().split(" ")).length > 1 && "only" === e[1] ? e[0] === this._getCurrentSize() : this.atLeast(e[0])
        },
        get: function(e) {
            for (var t in this.queries)
                if (this.queries.hasOwnProperty(t)) {
                    var i = this.queries[t];
                    if (e === i.name) return i.value
                } return null
        },
        _getCurrentSize: function() {
            for (var e, t = 0; t < this.queries.length; t++) {
                var i = this.queries[t];
                window.matchMedia(i.value).matches && (e = i)
            }
            return "object" == typeof e ? e.name : e
        },
        _watcher: function() {
            var t = this;
            e(window).on("resize.zf.mediaquery", (function() {
                var i = t._getCurrentSize(),
                    n = t.current;
                i !== n && (t.current = i, e(window).trigger("changed.zf.mediaquery", [i, n]))
            }))
        }
    };
    Foundation.MediaQuery = i, window.matchMedia || (window.matchMedia = function() {
        "use strict";
        var e = window.styleMedia || window.media;
        if (!e) {
            var t = document.createElement("style"),
                i = document.getElementsByTagName("script")[0],
                n = null;
            t.type = "text/css", t.id = "matchmediajs-test", i && i.parentNode && i.parentNode.insertBefore(t, i), n = "getComputedStyle" in window && window.getComputedStyle(t, null) || t.currentStyle, e = {
                matchMedium: function(e) {
                    var i = "@media " + e + "{ #matchmediajs-test { width: 1px; } }";
                    return t.styleSheet ? t.styleSheet.cssText = i : t.textContent = i, "1px" === n.width
                }
            }
        }
        return function(t) {
            return {
                matches: e.matchMedium(t || "all"),
                media: t || "all"
            }
        }
    }()), Foundation.MediaQuery = i
}(jQuery),
function(e) {
    function t(e, t, i) {
        function n(r) {
            s || (s = r), o = r - s, i.apply(t), o < e ? a = window.requestAnimationFrame(n, t) : (window.cancelAnimationFrame(a), t.trigger("finished.zf.animate", [t]).triggerHandler("finished.zf.animate", [t]))
        }
        var a, o, s = null;
        return 0 === e ? (i.apply(t), void t.trigger("finished.zf.animate", [t]).triggerHandler("finished.zf.animate", [t])) : void(a = window.requestAnimationFrame(n))
    }

    function i(t, i, o, s) {
        function r() {
            t || i.hide(), l(), s && s.apply(i)
        }

        function l() {
            i[0].style.transitionDuration = 0, i.removeClass(c + " " + u + " " + o)
        }
        if ((i = e(i).eq(0)).length) {
            var c = t ? n[0] : n[1],
                u = t ? a[0] : a[1];
            l(), i.addClass(o).css("transition", "none"), requestAnimationFrame((function() {
                i.addClass(c), t && i.show()
            })), requestAnimationFrame((function() {
                i[0].offsetWidth, i.css("transition", "").addClass(u)
            })), i.one(Foundation.transitionend(i), r)
        }
    }
    var n = ["mui-enter", "mui-leave"],
        a = ["mui-enter-active", "mui-leave-active"],
        o = {
            animateIn: function(e, t, n) {
                i(!0, e, t, n)
            },
            animateOut: function(e, t, n) {
                i(!1, e, t, n)
            }
        };
    Foundation.Move = t, Foundation.Motion = o
}(jQuery),
function(e) {
    function t(e, t, n, a) {
        var o, s, r, l, c = i(e),
            u;
        if (t) {
            var d = i(t);
            s = c.offset.top + c.height <= d.height + d.offset.top, o = c.offset.top >= d.offset.top, r = c.offset.left >= d.offset.left, l = c.offset.left + c.width <= d.width + d.offset.left
        } else s = c.offset.top + c.height <= c.windowDims.height + c.windowDims.offset.top, o = c.offset.top >= c.windowDims.offset.top, r = c.offset.left >= c.windowDims.offset.left, l = c.offset.left + c.width <= c.windowDims.width;
        return n ? r === l == 1 : a ? o === s == 1 : -1 === [s, o, r, l].indexOf(!1)
    }

    function i(e, t) {
        if ((e = e.length ? e[0] : e) === window || e === document) throw new Error("I'm sorry, Dave. I'm afraid I can't do that.");
        var i = e.getBoundingClientRect(),
            n = e.parentNode.getBoundingClientRect(),
            a = document.body.getBoundingClientRect(),
            o = window.pageYOffset,
            s = window.pageXOffset;
        return {
            width: i.width,
            height: i.height,
            offset: {
                top: i.top + o,
                left: i.left + s
            },
            parentDims: {
                width: n.width,
                height: n.height,
                offset: {
                    top: n.top + o,
                    left: n.left + s
                }
            },
            windowDims: {
                width: a.width,
                height: a.height,
                offset: {
                    top: o,
                    left: s
                }
            }
        }
    }

    function n(e, t, n, a, o, s) {
        var r = i(e),
            l = t ? i(t) : null;
        switch (n) {
            case "top":
                return {
                    left: Foundation.rtl() ? l.offset.left - r.width + l.width : l.offset.left, top: l.offset.top - (r.height + a)
                };
            case "left":
                return {
                    left: l.offset.left - (r.width + o), top: l.offset.top
                };
            case "right":
                return {
                    left: l.offset.left + l.width + o, top: l.offset.top
                };
            case "center top":
                return {
                    left: l.offset.left + l.width / 2 - r.width / 2, top: l.offset.top - (r.height + a)
                };
            case "center bottom":
                return {
                    left: s ? o : l.offset.left + l.width / 2 - r.width / 2, top: l.offset.top + l.height + a
                };
            case "center left":
                return {
                    left: l.offset.left - (r.width + o), top: l.offset.top + l.height / 2 - r.height / 2
                };
            case "center right":
                return {
                    left: l.offset.left + l.width + o + 1, top: l.offset.top + l.height / 2 - r.height / 2
                };
            case "center":
                return {
                    left: r.windowDims.offset.left + r.windowDims.width / 2 - r.width / 2, top: r.windowDims.offset.top + r.windowDims.height / 2 - r.height / 2
                };
            case "reveal":
                return {
                    left: (r.windowDims.width - r.width) / 2, top: r.windowDims.offset.top + a
                };
            case "reveal full":
                return {
                    left: r.windowDims.offset.left, top: r.windowDims.offset.top
                };
            case "left bottom":
                return {
                    left: l.offset.left, top: l.offset.top + l.height + a
                };
            case "right bottom":
                return {
                    left: l.offset.left + l.width + o - r.width, top: l.offset.top + l.height + a
                };
            default:
                return {
                    left: Foundation.rtl() ? l.offset.left - r.width + l.width : l.offset.left + o, top: l.offset.top + l.height + a
                }
        }
    }
    Foundation.Box = {
        ImNotTouchingYou: t,
        GetDimensions: i,
        GetOffsets: n
    }
}(jQuery),
function(e) {
    function t() {
        s(), n(), a(), o(), i()
    }

    function i(t) {
        var i = e("[data-yeti-box]"),
            n = ["dropdown", "tooltip", "reveal"];
        if (t && ("string" == typeof t ? n.push(t) : "object" == typeof t && "string" == typeof t[0] ? n.concat(t) : console.error("Plugin names must be strings")), i.length) {
            var a = n.map((function(e) {
                return "closeme.zf." + e
            })).join(" ");
            e(window).off(a).on(a, (function(t, i) {
                var n = t.namespace.split(".")[0],
                    a;
                e("[data-" + n + "]").not('[data-yeti-box="' + i + '"]').each((function() {
                    var t = e(this);
                    t.triggerHandler("close.zf.trigger", [t])
                }))
            }))
        }
    }

    function n(t) {
        var i = void 0,
            n = e("[data-resize]");
        n.length && e(window).off("resize.zf.trigger").on("resize.zf.trigger", (function(a) {
            i && clearTimeout(i), i = setTimeout((function() {
                r || n.each((function() {
                    e(this).triggerHandler("resizeme.zf.trigger")
                })), n.attr("data-events", "resize")
            }), t || 10)
        }))
    }

    function a(t) {
        var i = void 0,
            n = e("[data-scroll]");
        n.length && e(window).off("scroll.zf.trigger").on("scroll.zf.trigger", (function(a) {
            i && clearTimeout(i), i = setTimeout((function() {
                r || n.each((function() {
                    e(this).triggerHandler("scrollme.zf.trigger")
                })), n.attr("data-events", "scroll")
            }), t || 10)
        }))
    }

    function o(t) {
        var i = e("[data-mutate]");
        i.length && r && i.each((function() {
            e(this).triggerHandler("mutateme.zf.trigger")
        }))
    }

    function s() {
        if (!r) return !1;
        var t = document.querySelectorAll("[data-resize], [data-scroll], [data-mutate]"),
            i = function(t) {
                var i = e(t[0].target);
                switch (t[0].type) {
                    case "attributes":
                        "scroll" === i.attr("data-events") && "data-events" === t[0].attributeName && i.triggerHandler("scrollme.zf.trigger", [i, window.pageYOffset]), "resize" === i.attr("data-events") && "data-events" === t[0].attributeName && i.triggerHandler("resizeme.zf.trigger", [i]), "style" === t[0].attributeName && (i.closest("[data-mutate]").attr("data-events", "mutate"), i.closest("[data-mutate]").triggerHandler("mutateme.zf.trigger", [i.closest("[data-mutate]")]));
                        break;
                    case "childList":
                        i.closest("[data-mutate]").attr("data-events", "mutate"), i.closest("[data-mutate]").triggerHandler("mutateme.zf.trigger", [i.closest("[data-mutate]")]);
                        break;
                    default:
                        return !1
                }
            };
        if (t.length)
            for (var n = 0; n <= t.length - 1; n++) {
                var a;
                new r(i).observe(t[n], {
                    attributes: !0,
                    childList: !0,
                    characterData: !1,
                    subtree: !0,
                    attributeFilter: ["data-events", "style"]
                })
            }
    }
    var r = function() {
            for (var e = ["WebKit", "Moz", "O", "Ms", ""], t = 0; t < e.length; t++)
                if (e[t] + "MutationObserver" in window) return window[e[t] + "MutationObserver"];
            return !1
        }(),
        l = function(t, i) {
            t.data(i).split(" ").forEach((function(n) {
                e("#" + n)["close" === i ? "trigger" : "triggerHandler"](i + ".zf.trigger", [t])
            }))
        };
    e(document).on("click.zf.trigger", "[data-open]", (function() {
        l(e(this), "open")
    })), e(document).on("click.zf.trigger", "[data-close]", (function() {
        var t;
        e(this).data("close") ? l(e(this), "close") : e(this).trigger("close.zf.trigger")
    })), e(document).on("click.zf.trigger", "[data-toggle]", (function() {
        var t;
        e(this).data("toggle") ? l(e(this), "toggle") : e(this).trigger("toggle.zf.trigger")
    })), e(document).on("close.zf.trigger", "[data-closable]", (function(t) {
        t.stopPropagation();
        var i = e(this).data("closable");
        "" !== i ? Foundation.Motion.animateOut(e(this), i, (function() {
            e(this).trigger("closed.zf")
        })) : e(this).fadeOut().trigger("closed.zf")
    })), e(document).on("focus.zf.trigger blur.zf.trigger", "[data-toggle-focus]", (function() {
        var t = e(this).data("toggle-focus");
        e("#" + t).triggerHandler("toggle.zf.trigger", [e(this)])
    })), e(window).on("load", (function() {
        t()
    })), Foundation.IHearYou = t
}(jQuery),
function(e) {
    function t(e) {
        var t = {};
        for (var i in e) t[e[i]] = e[i];
        return t
    }
    var i = {
            9: "TAB",
            13: "ENTER",
            27: "ESCAPE",
            32: "SPACE",
            37: "ARROW_LEFT",
            38: "ARROW_UP",
            39: "ARROW_RIGHT",
            40: "ARROW_DOWN"
        },
        n = {},
        a = {
            keys: t(i),
            parseKey: function(e) {
                var t = i[e.which || e.keyCode] || String.fromCharCode(e.which).toUpperCase();
                return t = t.replace(/\W+/, ""), e.shiftKey && (t = "SHIFT_" + t), e.ctrlKey && (t = "CTRL_" + t), e.altKey && (t = "ALT_" + t), t = t.replace(/_$/, "")
            },
            handleKey: function(t, i, a) {
                var o, s, r, l = n[i],
                    c = this.parseKey(t);
                if (!l) return console.warn("Component not defined!");
                if ((r = a[s = (o = void 0 === l.ltr ? l : Foundation.rtl() ? e.extend({}, l.ltr, l.rtl) : e.extend({}, l.rtl, l.ltr))[c]]) && "function" == typeof r) {
                    var u = r.apply();
                    (a.handled || "function" == typeof a.handled) && a.handled(u)
                } else(a.unhandled || "function" == typeof a.unhandled) && a.unhandled()
            },
            findFocusable: function(t) {
                return !!t && t.find("a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, *[tabindex], *[contenteditable]").filter((function() {
                    return !(!e(this).is(":visible") || e(this).attr("tabindex") < 0)
                }))
            },
            register: function(e, t) {
                n[e] = t
            },
            trapFocus: function(e) {
                var t = Foundation.Keyboard.findFocusable(e),
                    i = t.eq(0),
                    n = t.eq(-1);
                e.on("keydown.zf.trapfocus", (function(e) {
                    e.target === n[0] && "TAB" === Foundation.Keyboard.parseKey(e) ? (e.preventDefault(), i.focus()) : e.target === i[0] && "SHIFT_TAB" === Foundation.Keyboard.parseKey(e) && (e.preventDefault(), n.focus())
                }))
            },
            releaseFocus: function(e) {
                e.off("keydown.zf.trapfocus")
            }
        };
    Foundation.Keyboard = a
}(jQuery),
function(e) {
    function t(e, t, i) {
        var n, a, o = this,
            s = t.duration,
            r = Object.keys(e.data())[0] || "timer",
            l = -1;
        this.isPaused = !1, this.restart = function() {
            l = -1, clearTimeout(a), this.start()
        }, this.start = function() {
            this.isPaused = !1, clearTimeout(a), l = l <= 0 ? s : l, e.data("paused", !1), n = Date.now(), a = setTimeout((function() {
                t.infinite && o.restart(), i && "function" == typeof i && i()
            }), l), e.trigger("timerstart.zf." + r)
        }, this.pause = function() {
            this.isPaused = !0, clearTimeout(a), e.data("paused", !0);
            var t = Date.now();
            l -= t - n, e.trigger("timerpaused.zf." + r)
        }
    }

    function i(t, i) {
        function n() {
            0 === --a && i()
        }
        var a = t.length;
        0 === a && i(), t.each((function() {
            if (this.complete || 4 === this.readyState || "complete" === this.readyState) n();
            else {
                var t = e(this).attr("src");
                e(this).attr("src", t + "?" + (new Date).getTime()), e(this).one("load", (function() {
                    n()
                }))
            }
        }))
    }
    Foundation.Timer = t, Foundation.onImagesLoaded = i
}(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var i = 0; i < t.length; i++) {
            var n = t[i];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
        }
    }
    return function(t, i, n) {
        return i && e(t.prototype, i), n && e(t, n), t
    }
}();
! function(e) {
    var t = function() {
        function t(i, n) {
            _classCallCheck(this, t), this.$element = i, this.options = e.extend({}, t.defaults, this.$element.data(), n), this._init(), this.calcPoints(), Foundation.registerPlugin(this, "Magellan")
        }
        return _createClass(t, [{
            key: "_init",
            value: function() {
                var t = this.$element[0].id || Foundation.GetYoDigits(6, "magellan");
                this.$targets = e("[data-magellan-target]"), this.$links = this.$element.find("a"), this.$element.attr({
                    "data-resize": t,
                    "data-scroll": t,
                    id: t
                }), this.$active = e(), this.scrollPos = parseInt(window.pageYOffset, 10), this._events()
            }
        }, {
            key: "calcPoints",
            value: function() {
                var t = this,
                    i = document.body,
                    n = document.documentElement;
                this.points = [], this.winHeight = Math.round(Math.max(window.innerHeight, n.clientHeight)), this.docHeight = Math.round(Math.max(i.scrollHeight, i.offsetHeight, n.clientHeight, n.scrollHeight, n.offsetHeight)), this.$targets.each((function() {
                    var i = e(this),
                        n = Math.round(i.offset().top - t.options.threshold);
                    i.targetPoint = n, t.points.push(n)
                }))
            }
        }, {
            key: "_events",
            value: function() {
                var t = this;
                e("html, body"), t.options.animationDuration, t.options.animationEasing, e(window).one("load", (function() {
                    t.options.deepLinking && location.hash && t.scrollToLoc(location.hash), t.calcPoints(), t._updateActive()
                })), this.$element.on({
                    "resizeme.zf.trigger": this.reflow.bind(this),
                    "scrollme.zf.trigger": this._updateActive.bind(this)
                }).on("click.zf.magellan", 'a[href^="#"]', (function(e) {
                    e.preventDefault();
                    var i = this.getAttribute("href");
                    t.scrollToLoc(i)
                })), e(window).on("popstate", (function(e) {
                    t.options.deepLinking && t.scrollToLoc(window.location.hash)
                }))
            }
        }, {
            key: "scrollToLoc",
            value: function(t) {
                if (!e(t).length) return !1;
                this._inTransition = !0;
                var i = this,
                    n = Math.round(e(t).offset().top - this.options.threshold / 2 - this.options.barOffset);
                e("html, body").stop(!0).animate({
                    scrollTop: n
                }, this.options.animationDuration, this.options.animationEasing, (function() {
                    i._inTransition = !1, i._updateActive()
                }))
            }
        }, {
            key: "reflow",
            value: function() {
                this.calcPoints(), this._updateActive()
            }
        }, {
            key: "_updateActive",
            value: function() {
                if (!this._inTransition) {
                    var e, t = parseInt(window.pageYOffset, 10);
                    if (t + this.winHeight === this.docHeight) e = this.points.length - 1;
                    else if (t < this.points[0]) e = void 0;
                    else {
                        var i = this.scrollPos < t,
                            n = this,
                            a = this.points.filter((function(e, a) {
                                return i ? e - n.options.barOffset <= t : e - n.options.barOffset - n.options.threshold <= t
                            }));
                        e = a.length ? a.length - 1 : 0
                    }
                    if (this.$active.removeClass(this.options.activeClass), this.$active = this.$links.filter('[href="#' + this.$targets.eq(e).data("magellan-target") + '"]').addClass(this.options.activeClass), this.options.deepLinking) {
                        var o = "";
                        null != e && (o = this.$active[0].getAttribute("href")), o !== window.location.hash && (window.history.pushState ? window.history.pushState(null, null, o) : window.location.hash = o)
                    }
                    this.scrollPos = t, this.$element.trigger("update.zf.magellan", [this.$active])
                }
            }
        }, {
            key: "destroy",
            value: function() {
                if (this.$element.off(".zf.trigger .zf.magellan").find("." + this.options.activeClass).removeClass(this.options.activeClass), this.options.deepLinking) {
                    var e = this.$active[0].getAttribute("href");
                    window.location.hash.replace(e, "")
                }
                Foundation.unregisterPlugin(this)
            }
        }]), t
    }();
    t.defaults = {
        animationDuration: 500,
        animationEasing: "linear",
        threshold: 50,
        activeClass: "active",
        deepLinking: !1,
        barOffset: 0
    }, Foundation.plugin(t, "Magellan")
}(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var i = 0; i < t.length; i++) {
            var n = t[i];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
        }
    }
    return function(t, i, n) {
        return i && e(t.prototype, i), n && e(t, n), t
    }
}();
! function(e) {
    var t = function() {
        function t(i, n) {
            _classCallCheck(this, t), this.$element = i, this.options = e.extend({}, t.defaults, this.$element.data(), n), this.$lastTrigger = e(), this.$triggers = e(), this._init(), this._events(), Foundation.registerPlugin(this, "OffCanvas"), Foundation.Keyboard.register("OffCanvas", {
                ESCAPE: "close"
            })
        }
        return _createClass(t, [{
            key: "_init",
            value: function() {
                var t = this.$element.attr("id");
                if (this.$element.attr("aria-hidden", "true"), this.$element.addClass("is-transition-" + this.options.transition), this.$triggers = e(document).find('[data-open="' + t + '"], [data-close="' + t + '"], [data-toggle="' + t + '"]').attr("aria-expanded", "false").attr("aria-controls", t), !0 === this.options.contentOverlay) {
                    var i = document.createElement("div"),
                        n = "fixed" === e(this.$element).css("position") ? "is-overlay-fixed" : "is-overlay-absolute";
                    i.setAttribute("class", "js-off-canvas-overlay " + n), this.$overlay = e(i), "is-overlay-fixed" === n ? e("body").append(this.$overlay) : this.$element.siblings("[data-off-canvas-content]").append(this.$overlay)
                }
                this.options.isRevealed = this.options.isRevealed || new RegExp(this.options.revealClass, "g").test(this.$element[0].className), !0 === this.options.isRevealed && (this.options.revealOn = this.options.revealOn || this.$element[0].className.match(/(reveal-for-medium|reveal-for-large)/g)[0].split("-")[2], this._setMQChecker()), 1 == !this.options.transitionTime && (this.options.transitionTime = 1e3 * parseFloat(window.getComputedStyle(e("[data-off-canvas]")[0]).transitionDuration))
            }
        }, {
            key: "_events",
            value: function() {
                var t;
                (this.$element.off(".zf.trigger .zf.offcanvas").on({
                    "open.zf.trigger": this.open.bind(this),
                    "close.zf.trigger": this.close.bind(this),
                    "toggle.zf.trigger": this.toggle.bind(this),
                    "keydown.zf.offcanvas": this._handleKeyboard.bind(this)
                }), !0 === this.options.closeOnClick) && (this.options.contentOverlay ? this.$overlay : e("[data-off-canvas-content]")).on({
                    "click.zf.offcanvas": this.close.bind(this)
                })
            }
        }, {
            key: "_setMQChecker",
            value: function() {
                var t = this;
                e(window).on("changed.zf.mediaquery", (function() {
                    Foundation.MediaQuery.atLeast(t.options.revealOn) ? t.reveal(!0) : t.reveal(!1)
                })).one("load.zf.offcanvas", (function() {
                    Foundation.MediaQuery.atLeast(t.options.revealOn) && t.reveal(!0)
                }))
            }
        }, {
            key: "reveal",
            value: function(e) {
                var t = this.$element.find("[data-close]");
                e ? (this.close(), this.isRevealed = !0, this.$element.attr("aria-hidden", "false"), this.$element.off("open.zf.trigger toggle.zf.trigger"), t.length && t.hide()) : (this.isRevealed = !1, this.$element.attr("aria-hidden", "true"), this.$element.on({
                    "open.zf.trigger": this.open.bind(this),
                    "toggle.zf.trigger": this.toggle.bind(this)
                }), t.length && t.show())
            }
        }, {
            key: "_stopScrolling",
            value: function(e) {
                return !1
            }
        }, {
            key: "open",
            value: function(t, i) {
                if (!this.$element.hasClass("is-open") && !this.isRevealed) {
                    var n = this;
                    i && (this.$lastTrigger = i), "top" === this.options.forceTo ? window.scrollTo(0, 0) : "bottom" === this.options.forceTo && window.scrollTo(0, document.body.scrollHeight), n.$element.addClass("is-open"), this.$triggers.attr("aria-expanded", "true"), this.$element.attr("aria-hidden", "false").trigger("opened.zf.offcanvas"), !1 === this.options.contentScroll && e("body").addClass("is-off-canvas-open").on("touchmove", this._stopScrolling), !0 === this.options.contentOverlay && this.$overlay.addClass("is-visible"), !0 === this.options.closeOnClick && !0 === this.options.contentOverlay && this.$overlay.addClass("is-closable"), !0 === this.options.autoFocus && this.$element.one(Foundation.transitionend(this.$element), (function() {
                        n.$element.find("a, button").eq(0).focus()
                    })), !0 === this.options.trapFocus && (this.$element.siblings("[data-off-canvas-content]").attr("tabindex", "-1"), Foundation.Keyboard.trapFocus(this.$element))
                }
            }
        }, {
            key: "close",
            value: function(t) {
                var i;
                this.$element.hasClass("is-open") && !this.isRevealed && (this.$element.removeClass("is-open"), this.$element.attr("aria-hidden", "true").trigger("closed.zf.offcanvas"), !1 === this.options.contentScroll && e("body").removeClass("is-off-canvas-open").off("touchmove", this._stopScrolling), !0 === this.options.contentOverlay && this.$overlay.removeClass("is-visible"), !0 === this.options.closeOnClick && !0 === this.options.contentOverlay && this.$overlay.removeClass("is-closable"), this.$triggers.attr("aria-expanded", "false"), !0 === this.options.trapFocus && (this.$element.siblings("[data-off-canvas-content]").removeAttr("tabindex"), Foundation.Keyboard.releaseFocus(this.$element)))
            }
        }, {
            key: "toggle",
            value: function(e, t) {
                this.$element.hasClass("is-open") ? this.close(e, t) : this.open(e, t)
            }
        }, {
            key: "_handleKeyboard",
            value: function(e) {
                var t = this;
                Foundation.Keyboard.handleKey(e, "OffCanvas", {
                    close: function() {
                        return t.close(), t.$lastTrigger.focus(), !0
                    },
                    handled: function() {
                        e.stopPropagation(), e.preventDefault()
                    }
                })
            }
        }, {
            key: "destroy",
            value: function() {
                this.close(), this.$element.off(".zf.trigger .zf.offcanvas"), this.$overlay.off(".zf.offcanvas"), Foundation.unregisterPlugin(this)
            }
        }]), t
    }();
    t.defaults = {
        closeOnClick: !0,
        contentOverlay: !0,
        contentScroll: !0,
        transitionTime: 0,
        transition: "push",
        forceTo: null,
        isRevealed: !1,
        revealOn: null,
        autoFocus: !0,
        revealClass: "reveal-for-",
        trapFocus: !1
    }, Foundation.plugin(t, "OffCanvas")
}(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var i = 0; i < t.length; i++) {
            var n = t[i];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
        }
    }
    return function(t, i, n) {
        return i && e(t.prototype, i), n && e(t, n), t
    }
}();
! function(e) {
    function t() {
        return /iP(ad|hone|od).*OS/.test(window.navigator.userAgent)
    }

    function i() {
        return /Android/.test(window.navigator.userAgent)
    }

    function n() {
        return t() || i()
    }
    var a = function() {
        function t(i, n) {
            _classCallCheck(this, t), this.$element = i, this.options = e.extend({}, t.defaults, this.$element.data(), n), this._init(), Foundation.registerPlugin(this, "Reveal"), Foundation.Keyboard.register("Reveal", {
                ENTER: "open",
                SPACE: "open",
                ESCAPE: "close"
            })
        }
        return _createClass(t, [{
            key: "_init",
            value: function() {
                this.id = this.$element.attr("id"), this.isActive = !1, this.cached = {
                    mq: Foundation.MediaQuery.current
                }, this.isMobile = n(), this.$anchor = e(e('[data-open="' + this.id + '"]').length ? '[data-open="' + this.id + '"]' : '[data-toggle="' + this.id + '"]'), this.$anchor.attr({
                    "aria-controls": this.id,
                    "aria-haspopup": !0,
                    tabindex: 0
                }), (this.options.fullScreen || this.$element.hasClass("full")) && (this.options.fullScreen = !0, this.options.overlay = !1), this.options.overlay && !this.$overlay && (this.$overlay = this._makeOverlay(this.id)), this.$element.attr({
                    role: "dialog",
                    "aria-hidden": !0,
                    "data-yeti-box": this.id,
                    "data-resize": this.id
                }), this.$overlay ? this.$element.detach().appendTo(this.$overlay) : (this.$element.detach().appendTo(e(this.options.appendTo)), this.$element.addClass("without-overlay")), this._events(), this.options.deepLink && window.location.hash === "#" + this.id && e(window).one("load.zf.reveal", this.open.bind(this))
            }
        }, {
            key: "_makeOverlay",
            value: function() {
                return e("<div></div>").addClass("reveal-overlay").appendTo(this.options.appendTo)
            }
        }, {
            key: "_updatePosition",
            value: function() {
                var t, i, n = this.$element.outerWidth(),
                    a = e(window).width(),
                    o = this.$element.outerHeight(),
                    s = e(window).height();
                t = "auto" === this.options.hOffset ? parseInt((a - n) / 2, 10) : parseInt(this.options.hOffset, 10), i = "auto" === this.options.vOffset ? o > s ? parseInt(Math.min(100, s / 10), 10) : parseInt((s - o) / 4, 10) : parseInt(this.options.vOffset, 10), this.$element.css({
                    top: i + "px"
                }), this.$overlay && "auto" === this.options.hOffset || (this.$element.css({
                    left: t + "px"
                }), this.$element.css({
                    margin: "0px"
                }))
            }
        }, {
            key: "_events",
            value: function() {
                var t = this,
                    i = this;
                this.$element.on({
                    "open.zf.trigger": this.open.bind(this),
                    "close.zf.trigger": function(n, a) {
                        if (n.target === i.$element[0] || e(n.target).parents("[data-closable]")[0] === a) return t.close.apply(t)
                    },
                    "toggle.zf.trigger": this.toggle.bind(this),
                    "resizeme.zf.trigger": function() {
                        i._updatePosition()
                    }
                }), this.$anchor.length && this.$anchor.on("keydown.zf.reveal", (function(e) {
                    13 !== e.which && 32 !== e.which || (e.stopPropagation(), e.preventDefault(), i.open())
                })), this.options.closeOnClick && this.options.overlay && this.$overlay.off(".zf.reveal").on("click.zf.reveal", (function(t) {
                    t.target !== i.$element[0] && !e.contains(i.$element[0], t.target) && e.contains(document, t.target) && i.close()
                })), this.options.deepLink && e(window).on("popstate.zf.reveal:" + this.id, this._handleState.bind(this))
            }
        }, {
            key: "_handleState",
            value: function(e) {
                window.location.hash !== "#" + this.id || this.isActive ? this.close() : this.open()
            }
        }, {
            key: "open",
            value: function() {
                function t() {
                    a.isMobile ? (a.originalScrollPos || (a.originalScrollPos = window.pageYOffset), e("html, body").addClass("is-reveal-open")) : e("body").addClass("is-reveal-open")
                }
                var i = this;
                if (this.options.deepLink) {
                    var n = "#" + this.id;
                    window.history.pushState ? window.history.pushState(null, null, n) : window.location.hash = n
                }
                this.isActive = !0, this.$element.css({
                    visibility: "hidden"
                }).show().scrollTop(0), this.options.overlay && this.$overlay.css({
                    visibility: "hidden"
                }).show(), this._updatePosition(), this.$element.hide().css({
                    visibility: ""
                }), this.$overlay && (this.$overlay.css({
                    visibility: ""
                }).hide(), this.$element.hasClass("fast") ? this.$overlay.addClass("fast") : this.$element.hasClass("slow") && this.$overlay.addClass("slow")), this.options.multipleOpened || this.$element.trigger("closeme.zf.reveal", this.id);
                var a = this;
                this.options.animationIn ? function() {
                    var e = function() {
                        a.$element.attr({
                            "aria-hidden": !1,
                            tabindex: -1
                        }).focus(), t(), Foundation.Keyboard.trapFocus(a.$element)
                    };
                    i.options.overlay && Foundation.Motion.animateIn(i.$overlay, "fade-in"), Foundation.Motion.animateIn(i.$element, i.options.animationIn, (function() {
                        i.$element && (i.focusableElements = Foundation.Keyboard.findFocusable(i.$element), e())
                    }))
                }() : (this.options.overlay && this.$overlay.show(0), this.$element.show(this.options.showDelay)), this.$element.attr({
                    "aria-hidden": !1,
                    tabindex: -1
                }).focus(), Foundation.Keyboard.trapFocus(this.$element), this.$element.trigger("open.zf.reveal"), t(), setTimeout((function() {
                    i._extraHandlers()
                }), 0)
            }
        }, {
            key: "_extraHandlers",
            value: function() {
                var t = this;
                this.$element && (this.focusableElements = Foundation.Keyboard.findFocusable(this.$element), this.options.overlay || !this.options.closeOnClick || this.options.fullScreen || e("body").on("click.zf.reveal", (function(i) {
                    i.target !== t.$element[0] && !e.contains(t.$element[0], i.target) && e.contains(document, i.target) && t.close()
                })), this.options.closeOnEsc && e(window).on("keydown.zf.reveal", (function(e) {
                    Foundation.Keyboard.handleKey(e, "Reveal", {
                        close: function() {
                            t.options.closeOnEsc && (t.close(), t.$anchor.focus())
                        }
                    })
                })), this.$element.on("keydown.zf.reveal", (function(i) {
                    var n = e(this);
                    Foundation.Keyboard.handleKey(i, "Reveal", {
                        open: function() {
                            t.$element.find(":focus").is(t.$element.find("[data-close]")) ? setTimeout((function() {
                                t.$anchor.focus()
                            }), 1) : n.is(t.focusableElements) && t.open()
                        },
                        close: function() {
                            t.options.closeOnEsc && (t.close(), t.$anchor.focus())
                        },
                        handled: function(e) {
                            e && i.preventDefault()
                        }
                    })
                })))
            }
        }, {
            key: "close",
            value: function() {
                function t() {
                    i.isMobile ? (e("html, body").removeClass("is-reveal-open"), i.originalScrollPos && (e("body").scrollTop(i.originalScrollPos), i.originalScrollPos = null)) : e("body").removeClass("is-reveal-open"), Foundation.Keyboard.releaseFocus(i.$element), i.$element.attr("aria-hidden", !0), i.$element.trigger("closed.zf.reveal")
                }
                if (!this.isActive || !this.$element.is(":visible")) return !1;
                var i = this;
                this.options.animationOut ? (this.options.overlay ? Foundation.Motion.animateOut(this.$overlay, "fade-out", t) : t(), Foundation.Motion.animateOut(this.$element, this.options.animationOut)) : (this.options.overlay ? this.$overlay.hide(0, t) : t(), this.$element.hide(this.options.hideDelay)), this.options.closeOnEsc && e(window).off("keydown.zf.reveal"), !this.options.overlay && this.options.closeOnClick && e("body").off("click.zf.reveal"), this.$element.off("keydown.zf.reveal"), this.options.resetOnClose && this.$element.html(this.$element.html()), this.isActive = !1, i.options.deepLink && (window.history.replaceState ? window.history.replaceState("", document.title, window.location.href.replace("#" + this.id, "")) : window.location.hash = "")
            }
        }, {
            key: "toggle",
            value: function() {
                this.isActive ? this.close() : this.open()
            }
        }, {
            key: "destroy",
            value: function() {
                this.options.overlay && (this.$element.appendTo(e(this.options.appendTo)), this.$overlay.hide().off().remove()), this.$element.hide().off(), this.$anchor.off(".zf"), e(window).off(".zf.reveal:" + this.id), Foundation.unregisterPlugin(this)
            }
        }]), t
    }();
    a.defaults = {
        animationIn: "",
        animationOut: "",
        showDelay: 0,
        hideDelay: 0,
        closeOnClick: !0,
        closeOnEsc: !0,
        multipleOpened: !1,
        vOffset: "auto",
        hOffset: "auto",
        fullScreen: !1,
        btmOffsetPct: 10,
        overlay: !0,
        resetOnClose: !1,
        deepLink: !1,
        appendTo: "body"
    }, Foundation.plugin(a, "Reveal")
}(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var i = 0; i < t.length; i++) {
            var n = t[i];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
        }
    }
    return function(t, i, n) {
        return i && e(t.prototype, i), n && e(t, n), t
    }
}();
! function(e) {
    function t(e) {
        return parseInt(window.getComputedStyle(document.body, null).fontSize, 10) * e
    }
    var i = function() {
        function i(t, n) {
            _classCallCheck(this, i), this.$element = t, this.options = e.extend({}, i.defaults, this.$element.data(), n), this._init(), Foundation.registerPlugin(this, "Sticky")
        }
        return _createClass(i, [{
            key: "_init",
            value: function() {
                var t = this.$element.parent("[data-sticky-container]"),
                    i = this.$element[0].id || Foundation.GetYoDigits(6, "sticky"),
                    n = this;
                t.length || (this.wasWrapped = !0), this.$container = t.length ? t : e(this.options.container).wrapInner(this.$element), this.$container.addClass(this.options.containerClass), this.$element.addClass(this.options.stickyClass).attr({
                    "data-resize": i
                }), this.scrollCount = this.options.checkEvery, this.isStuck = !1, e(window).one("load.zf.sticky", (function() {
                    n.containerHeight = "none" == n.$element.css("display") ? 0 : n.$element[0].getBoundingClientRect().height, n.$container.css("height", n.containerHeight), n.elemHeight = n.containerHeight, "" !== n.options.anchor ? n.$anchor = e("#" + n.options.anchor) : n._parsePoints(), n._setSizes((function() {
                        var e = window.pageYOffset;
                        n._calc(!1, e), n.isStuck || n._removeSticky(!(e >= n.topPoint))
                    })), n._events(i.split("-").reverse().join("-"))
                }))
            }
        }, {
            key: "_parsePoints",
            value: function() {
                for (var t, i, n = ["" == this.options.topAnchor ? 1 : this.options.topAnchor, "" == this.options.btmAnchor ? document.documentElement.scrollHeight : this.options.btmAnchor], a = {}, o = 0, s = n.length; o < s && n[o]; o++) {
                    var r;
                    if ("number" == typeof n[o]) r = n[o];
                    else {
                        var l = n[o].split(":"),
                            c = e("#" + l[0]);
                        r = c.offset().top, l[1] && "bottom" === l[1].toLowerCase() && (r += c[0].getBoundingClientRect().height)
                    }
                    a[o] = r
                }
                this.points = a
            }
        }, {
            key: "_events",
            value: function(t) {
                var i = this,
                    n = this.scrollListener = "scroll.zf." + t;
                this.isOn || (this.canStick && (this.isOn = !0, e(window).off(n).on(n, (function(e) {
                    0 === i.scrollCount ? (i.scrollCount = i.options.checkEvery, i._setSizes((function() {
                        i._calc(!1, window.pageYOffset)
                    }))) : (i.scrollCount--, i._calc(!1, window.pageYOffset))
                }))), this.$element.off("resizeme.zf.trigger").on("resizeme.zf.trigger", (function(e, a) {
                    i._setSizes((function() {
                        i._calc(!1), i.canStick ? i.isOn || i._events(t) : i.isOn && i._pauseListeners(n)
                    }))
                })))
            }
        }, {
            key: "_pauseListeners",
            value: function(t) {
                this.isOn = !1, e(window).off(t), this.$element.trigger("pause.zf.sticky")
            }
        }, {
            key: "_calc",
            value: function(e, t) {
                return e && this._setSizes(), this.canStick ? (t || (t = window.pageYOffset), void(t >= this.topPoint ? t <= this.bottomPoint ? this.isStuck || this._setSticky() : this.isStuck && this._removeSticky(!1) : this.isStuck && this._removeSticky(!0))) : (this.isStuck && this._removeSticky(!0), !1)
            }
        }, {
            key: "_setSticky",
            value: function() {
                var e = this,
                    t = this.options.stickTo,
                    i = "top" === t ? "marginTop" : "marginBottom",
                    n = "top" === t ? "bottom" : "top",
                    a = {};
                a[i] = this.options[i] + "em", a[t] = 0, a[n] = "auto", this.isStuck = !0, this.$element.removeClass("is-anchored is-at-" + n).addClass("is-stuck is-at-" + t).css(a).trigger("sticky.zf.stuckto:" + t), this.$element.on("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd", (function() {
                    e._setSizes()
                }))
            }
        }, {
            key: "_removeSticky",
            value: function(e) {
                var t = this.options.stickTo,
                    i = "top" === t,
                    n = {},
                    a = (this.points ? this.points[1] - this.points[0] : this.anchorHeight) - this.elemHeight,
                    o, s = e ? "top" : "bottom";
                n[i ? "marginTop" : "marginBottom"] = 0, n.bottom = "auto", n.top = e ? 0 : a, this.isStuck = !1, this.$element.removeClass("is-stuck is-at-" + t).addClass("is-anchored is-at-" + s).css(n).trigger("sticky.zf.unstuckfrom:" + s)
            }
        }, {
            key: "_setSizes",
            value: function(e) {
                this.canStick = Foundation.MediaQuery.is(this.options.stickyOn), this.canStick || e && "function" == typeof e && e();
                var t = this.$container[0].getBoundingClientRect().width,
                    i = window.getComputedStyle(this.$container[0]),
                    n = parseInt(i["padding-left"], 10),
                    a = parseInt(i["padding-right"], 10);
                this.$anchor && this.$anchor.length ? this.anchorHeight = this.$anchor[0].getBoundingClientRect().height : this._parsePoints(), this.$element.css({
                    "max-width": t - n - a + "px"
                });
                var o = this.$element[0].getBoundingClientRect().height || this.containerHeight;
                if ("none" == this.$element.css("display") && (o = 0), this.containerHeight = o, this.$container.css({
                        height: o
                    }), this.elemHeight = o, !this.isStuck && this.$element.hasClass("is-at-bottom")) {
                    var s = (this.points ? this.points[1] - this.$container.offset().top : this.anchorHeight) - this.elemHeight;
                    this.$element.css("top", s)
                }
                this._setBreakPoints(o, (function() {
                    e && "function" == typeof e && e()
                }))
            }
        }, {
            key: "_setBreakPoints",
            value: function(e, i) {
                if (!this.canStick) {
                    if (!i || "function" != typeof i) return !1;
                    i()
                }
                var n = t(this.options.marginTop),
                    a = t(this.options.marginBottom),
                    o = this.points ? this.points[0] : this.$anchor.offset().top,
                    s = this.points ? this.points[1] : o + this.anchorHeight,
                    r = window.innerHeight;
                "top" === this.options.stickTo ? (o -= n, s -= e + n) : "bottom" === this.options.stickTo && (o -= r - (e + a), s -= r - a), this.topPoint = o, this.bottomPoint = s, i && "function" == typeof i && i()
            }
        }, {
            key: "destroy",
            value: function() {
                this._removeSticky(!0), this.$element.removeClass(this.options.stickyClass + " is-anchored is-at-top").css({
                        height: "",
                        top: "",
                        bottom: "",
                        "max-width": ""
                    }).off("resizeme.zf.trigger"), this.$anchor && this.$anchor.length && this.$anchor.off("change.zf.sticky"), e(window).off(this.scrollListener),
                    this.wasWrapped ? this.$element.unwrap() : this.$container.removeClass(this.options.containerClass).css({
                        height: ""
                    }), Foundation.unregisterPlugin(this)
            }
        }]), i
    }();
    i.defaults = {
        container: "<div data-sticky-container></div>",
        stickTo: "top",
        anchor: "",
        topAnchor: "",
        btmAnchor: "",
        marginTop: 1,
        marginBottom: 1,
        stickyOn: "medium",
        stickyClass: "sticky",
        containerClass: "sticky-container",
        checkEvery: -1
    }, Foundation.plugin(i, "Sticky")
}(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var i = 0; i < t.length; i++) {
            var n = t[i];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
        }
    }
    return function(t, i, n) {
        return i && e(t.prototype, i), n && e(t, n), t
    }
}();
! function(e) {
    var t = function() {
        function t(i, n) {
            _classCallCheck(this, t), this.$element = i, this.options = e.extend({}, t.defaults, n), this.rules = [], this.currentPath = "", this._init(), this._events(), Foundation.registerPlugin(this, "Interchange")
        }
        return _createClass(t, [{
            key: "_init",
            value: function() {
                this._addBreakpoints(), this._generateRules(), this._reflow()
            }
        }, {
            key: "_events",
            value: function() {
                var t = this;
                e(window).on("resize.zf.interchange", Foundation.util.throttle((function() {
                    t._reflow()
                }), 50))
            }
        }, {
            key: "_reflow",
            value: function() {
                var e;
                for (var t in this.rules)
                    if (this.rules.hasOwnProperty(t)) {
                        var i = this.rules[t];
                        window.matchMedia(i.query).matches && (e = i)
                    } e && this.replace(e.path)
            }
        }, {
            key: "_addBreakpoints",
            value: function() {
                for (var e in Foundation.MediaQuery.queries)
                    if (Foundation.MediaQuery.queries.hasOwnProperty(e)) {
                        var i = Foundation.MediaQuery.queries[e];
                        t.SPECIAL_QUERIES[i.name] = i.value
                    }
            }
        }, {
            key: "_generateRules",
            value: function(e) {
                var i, n = [];
                for (var a in i = this.options.rules ? this.options.rules : this.$element.data("interchange").match(/\[.*?\]/g))
                    if (i.hasOwnProperty(a)) {
                        var o = i[a].slice(1, -1).split(", "),
                            s = o.slice(0, -1).join(""),
                            r = o[o.length - 1];
                        t.SPECIAL_QUERIES[r] && (r = t.SPECIAL_QUERIES[r]), n.push({
                            path: s,
                            query: r
                        })
                    } this.rules = n
            }
        }, {
            key: "replace",
            value: function(t) {
                if (this.currentPath !== t) {
                    var i = this,
                        n = "replaced.zf.interchange";
                    "IMG" === this.$element[0].nodeName ? this.$element.attr("src", t).on("load", (function() {
                        i.currentPath = t
                    })).trigger(n) : t.match(/\.(gif|jpg|jpeg|png|svg|tiff)([?#].*)?/i) ? this.$element.css({
                        "background-image": "url(" + t + ")"
                    }).trigger(n) : e.get(t, (function(a) {
                        i.$element.html(a).trigger(n), e(a).foundation(), i.currentPath = t
                    }))
                }
            }
        }, {
            key: "destroy",
            value: function() {}
        }]), t
    }();
    t.defaults = {
        rules: null
    }, t.SPECIAL_QUERIES = {
        landscape: "screen and (orientation: landscape)",
        portrait: "screen and (orientation: portrait)",
        retina: "only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx)"
    }, Foundation.plugin(t, "Interchange")
}(jQuery);
var _createClass = function() {
        function e(e, t) {
            for (var i = 0; i < t.length; i++) {
                var n = t[i];
                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
            }
        }
        return function(t, i, n) {
            return i && e(t.prototype, i), n && e(t, n), t
        }
    }(),
    Popup, Marker;
! function(e) {
    var t = function() {
        function t(i, n) {
            _classCallCheck(this, t), this.$element = i, this.options = e.extend({}, t.defaults, this.$element.data(), n), this._init(), Foundation.registerPlugin(this, "Equalizer")
        }
        return _createClass(t, [{
            key: "_init",
            value: function() {
                var t = this.$element.attr("data-equalizer") || "",
                    i = this.$element.find('[data-equalizer-watch="' + t + '"]');
                this.$watched = i.length ? i : this.$element.find("[data-equalizer-watch]"), this.$element.attr("data-resize", t || Foundation.GetYoDigits(6, "eq")), this.$element.attr("data-mutate", t || Foundation.GetYoDigits(6, "eq")), this.hasNested = this.$element.find("[data-equalizer]").length > 0, this.isNested = this.$element.parentsUntil(document.body, "[data-equalizer]").length > 0, this.isOn = !1, this._bindHandler = {
                    onResizeMeBound: this._onResizeMe.bind(this),
                    onPostEqualizedBound: this._onPostEqualized.bind(this)
                };
                var n, a = this.$element.find("img");
                this.options.equalizeOn ? (n = this._checkMQ(), e(window).on("changed.zf.mediaquery", this._checkMQ.bind(this))) : this._events(), (void 0 !== n && !1 === n || void 0 === n) && (a.length ? Foundation.onImagesLoaded(a, this._reflow.bind(this)) : this._reflow())
            }
        }, {
            key: "_pauseEvents",
            value: function() {
                this.isOn = !1, this.$element.off({
                    ".zf.equalizer": this._bindHandler.onPostEqualizedBound,
                    "resizeme.zf.trigger": this._bindHandler.onResizeMeBound,
                    "mutateme.zf.trigger": this._bindHandler.onResizeMeBound
                })
            }
        }, {
            key: "_onResizeMe",
            value: function(e) {
                this._reflow()
            }
        }, {
            key: "_onPostEqualized",
            value: function(e) {
                e.target !== this.$element[0] && this._reflow()
            }
        }, {
            key: "_events",
            value: function() {
                this._pauseEvents(), this.hasNested ? this.$element.on("postequalized.zf.equalizer", this._bindHandler.onPostEqualizedBound) : (this.$element.on("resizeme.zf.trigger", this._bindHandler.onResizeMeBound), this.$element.on("mutateme.zf.trigger", this._bindHandler.onResizeMeBound)), this.isOn = !0
            }
        }, {
            key: "_checkMQ",
            value: function() {
                var e = !Foundation.MediaQuery.is(this.options.equalizeOn);
                return e ? this.isOn && (this._pauseEvents(), this.$watched.css("height", "auto")) : this.isOn || this._events(), e
            }
        }, {
            key: "_killswitch",
            value: function() {}
        }, {
            key: "_reflow",
            value: function() {
                return !this.options.equalizeOnStack && this._isStacked() ? (this.$watched.css("height", "auto"), !1) : void(this.options.equalizeByRow ? this.getHeightsByRow(this.applyHeightByRow.bind(this)) : this.getHeights(this.applyHeight.bind(this)))
            }
        }, {
            key: "_isStacked",
            value: function() {
                return !this.$watched[0] || !this.$watched[1] || this.$watched[0].getBoundingClientRect().top !== this.$watched[1].getBoundingClientRect().top
            }
        }, {
            key: "getHeights",
            value: function(e) {
                for (var t = [], i = 0, n = this.$watched.length; i < n; i++) this.$watched[i].style.height = "auto", t.push(this.$watched[i].offsetHeight);
                e(t)
            }
        }, {
            key: "getHeightsByRow",
            value: function(t) {
                var i = this.$watched.length ? this.$watched.first().offset().top : 0,
                    n = [],
                    a = 0;
                n[a] = [];
                for (var o = 0, s = this.$watched.length; o < s; o++) {
                    this.$watched[o].style.height = "auto";
                    var r = e(this.$watched[o]).offset().top;
                    r != i && (n[++a] = [], i = r), n[a].push([this.$watched[o], this.$watched[o].offsetHeight])
                }
                for (var l = 0, c = n.length; l < c; l++) {
                    var u = e(n[l]).map((function() {
                            return this[1]
                        })).get(),
                        d = Math.max.apply(null, u);
                    n[l].push(d)
                }
                t(n)
            }
        }, {
            key: "applyHeight",
            value: function(e) {
                var t = Math.max.apply(null, e);
                this.$element.trigger("preequalized.zf.equalizer"), this.$watched.css("height", t), this.$element.trigger("postequalized.zf.equalizer")
            }
        }, {
            key: "applyHeightByRow",
            value: function(t) {
                this.$element.trigger("preequalized.zf.equalizer");
                for (var i = 0, n = t.length; i < n; i++) {
                    var a = t[i].length,
                        o = t[i][a - 1];
                    if (a <= 2) e(t[i][0][0]).css({
                        height: "auto"
                    });
                    else {
                        this.$element.trigger("preequalizedrow.zf.equalizer");
                        for (var s = 0, r = a - 1; s < r; s++) e(t[i][s][0]).css({
                            height: o
                        });
                        this.$element.trigger("postequalizedrow.zf.equalizer")
                    }
                }
                this.$element.trigger("postequalized.zf.equalizer")
            }
        }, {
            key: "destroy",
            value: function() {
                this._pauseEvents(), this.$watched.css("height", "auto"), Foundation.unregisterPlugin(this)
            }
        }]), t
    }();
    t.defaults = {
        equalizeOnStack: !1,
        equalizeByRow: !1,
        equalizeOn: ""
    }, Foundation.plugin(t, "Equalizer")
}(jQuery), /*! fancyBox v2.1.5 fancyapps.com | fancyapps.com/fancybox/#license */
function(e, t, i, n) {
    var a = i("html"),
        o = i(e),
        s = i(t),
        r = i.fancybox = function() {
            r.open.apply(this, arguments)
        },
        l = navigator.userAgent.match(/msie/i),
        c = null,
        u = t.createTouch !== n,
        d = function(e) {
            return e && e.hasOwnProperty && e instanceof i
        },
        h = function(e) {
            return e && "string" === i.type(e)
        },
        f = function(e) {
            return h(e) && 0 < e.indexOf("%")
        },
        p = function(e, t) {
            var i = parseInt(e, 10) || 0;

            return t && f(e) && (i *= r.getViewport()[t] / 100), Math.ceil(i)
        },
        m = function(e, t) {
            return p(e, t) + "px"
        };
    i.extend(r, {
        version: "2.1.5",
        defaults: {
            padding: 15,
            margin: 20,
            width: 800,
            height: 600,
            minWidth: 100,
            minHeight: 100,
            maxWidth: 9999,
            maxHeight: 9999,
            pixelRatio: 1,
            autoSize: !0,
            autoHeight: !1,
            autoWidth: !1,
            autoResize: !0,
            autoCenter: !u,
            fitToView: !0,
            aspectRatio: !1,
            topRatio: .5,
            leftRatio: .5,
            scrolling: "auto",
            wrapCSS: "",
            arrows: !0,
            closeBtn: !0,
            closeClick: !1,
            nextClick: !1,
            mouseWheel: !0,
            autoPlay: !1,
            playSpeed: 3e3,
            preload: 3,
            modal: !1,
            loop: !0,
            ajax: {
                dataType: "html",
                headers: {
                    "X-fancyBox": !0
                }
            },
            iframe: {
                scrolling: "auto",
                preload: !0
            },
            swf: {
                wmode: "transparent",
                allowfullscreen: "true",
                allowscriptaccess: "always"
            },
            keys: {
                next: {
                    13: "left",
                    34: "up",
                    39: "left",
                    40: "up"
                },
                prev: {
                    8: "right",
                    33: "down",
                    37: "right",
                    38: "down"
                },
                close: [27],
                play: [32],
                toggle: [70]
            },
            direction: {
                next: "left",
                prev: "right"
            },
            scrollOutside: !0,
            index: 0,
            type: null,
            href: null,
            content: null,
            title: null,
            tpl: {
                wrap: '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
                image: '<img class="fancybox-image" src="{href}" alt="" />',
                iframe: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' + (l ? ' allowtransparency="true"' : "") + "></iframe>",
                error: '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
                closeBtn: '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
                next: '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
                prev: '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
            },
            openEffect: "fade",
            openSpeed: 250,
            openEasing: "swing",
            openOpacity: !0,
            openMethod: "zoomIn",
            closeEffect: "fade",
            closeSpeed: 250,
            closeEasing: "swing",
            closeOpacity: !0,
            closeMethod: "zoomOut",
            nextEffect: "elastic",
            nextSpeed: 250,
            nextEasing: "swing",
            nextMethod: "changeIn",
            prevEffect: "elastic",
            prevSpeed: 250,
            prevEasing: "swing",
            prevMethod: "changeOut",
            helpers: {
                overlay: !0,
                title: !0
            },
            onCancel: i.noop,
            beforeLoad: i.noop,
            afterLoad: i.noop,
            beforeShow: i.noop,
            afterShow: i.noop,
            beforeChange: i.noop,
            beforeClose: i.noop,
            afterClose: i.noop
        },
        group: {},
        opts: {},
        previous: null,
        coming: null,
        current: null,
        isActive: !1,
        isOpen: !1,
        isOpened: !1,
        wrap: null,
        skin: null,
        outer: null,
        inner: null,
        player: {
            timer: null,
            isActive: !1
        },
        ajaxLoad: null,
        imgPreload: null,
        transitions: {},
        helpers: {},
        open: function(e, t) {
            if (e && (i.isPlainObject(t) || (t = {}), !1 !== r.close(!0))) return i.isArray(e) || (e = d(e) ? i(e).get() : [e]), i.each(e, (function(a, o) {
                var s = {},
                    l, c, u, f, p;
                "object" === i.type(o) && (o.nodeType && (o = i(o)), d(o) ? (s = {
                    href: o.data("fancybox-href") || o.attr("href"),
                    title: o.data("fancybox-title") || o.attr("title"),
                    isDom: !0,
                    element: o
                }, i.metadata && i.extend(!0, s, o.metadata())) : s = o), l = t.href || s.href || (h(o) ? o : null), c = t.title !== n ? t.title : s.title || "", !(f = (u = t.content || s.content) ? "html" : t.type || s.type) && s.isDom && ((f = o.data("fancybox-type")) || (f = (f = o.prop("class").match(/fancybox\.(\w+)/)) ? f[1] : null)), h(l) && (f || (r.isImage(l) ? f = "image" : r.isSWF(l) ? f = "swf" : "#" === l.charAt(0) ? f = "inline" : h(o) && (f = "html", u = o)), "ajax" === f && (p = l.split(/\s+/, 2), l = p.shift(), p = p.shift())), u || ("inline" === f ? l ? u = i(h(l) ? l.replace(/.*(?=#[^\s]+$)/, "") : l) : s.isDom && (u = o) : "html" === f ? u = l : !f && !l && s.isDom && (f = "inline", u = o)), i.extend(s, {
                    href: l,
                    type: f,
                    content: u,
                    title: c,
                    selector: p
                }), e[a] = s
            })), r.opts = i.extend(!0, {}, r.defaults, t), t.keys !== n && (r.opts.keys = !!t.keys && i.extend({}, r.defaults.keys, t.keys)), r.group = e, r._start(r.opts.index)
        },
        cancel: function() {
            var e = r.coming;
            e && !1 !== r.trigger("onCancel") && (r.hideLoading(), r.ajaxLoad && r.ajaxLoad.abort(), r.ajaxLoad = null, r.imgPreload && (r.imgPreload.onload = r.imgPreload.onerror = null), e.wrap && e.wrap.stop(!0, !0).trigger("onReset").remove(), r.coming = null, r.current || r._afterZoomOut(e))
        },
        close: function(e) {
            r.cancel(), !1 !== r.trigger("beforeClose") && (r.unbindEvents(), r.isActive && (r.isOpen && !0 !== e ? (r.isOpen = r.isOpened = !1, r.isClosing = !0, i(".fancybox-item, .fancybox-nav").remove(), r.wrap.stop(!0, !0).removeClass("fancybox-opened"), r.transitions[r.current.closeMethod]()) : (i(".fancybox-wrap").stop(!0).trigger("onReset").remove(), r._afterZoomOut())))
        },
        play: function(e) {
            var t = function() {
                    clearTimeout(r.player.timer)
                },
                i = function() {
                    t(), r.current && r.player.isActive && (r.player.timer = setTimeout(r.next, r.current.playSpeed))
                },
                n = function() {
                    t(), s.unbind(".player"), r.player.isActive = !1, r.trigger("onPlayEnd")
                };
            !0 === e || !r.player.isActive && !1 !== e ? r.current && (r.current.loop || r.current.index < r.group.length - 1) && (r.player.isActive = !0, s.bind({
                "onCancel.player beforeClose.player": n,
                "onUpdate.player": i,
                "beforeLoad.player": t
            }), i(), r.trigger("onPlayStart")) : n()
        },
        next: function(e) {
            var t = r.current;
            t && (h(e) || (e = t.direction.next), r.jumpto(t.index + 1, e, "next"))
        },
        prev: function(e) {
            var t = r.current;
            t && (h(e) || (e = t.direction.prev), r.jumpto(t.index - 1, e, "prev"))
        },
        jumpto: function(e, t, i) {
            var a = r.current;
            a && (e = p(e), r.direction = t || a.direction[e >= a.index ? "next" : "prev"], r.router = i || "jumpto", a.loop && (0 > e && (e = a.group.length + e % a.group.length), e %= a.group.length), a.group[e] !== n && (r.cancel(), r._start(e)))
        },
        reposition: function(e, t) {
            var n = r.current,
                a = n ? n.wrap : null,
                o;
            a && (o = r._getPosition(t), e && "scroll" === e.type ? (delete o.position, a.stop(!0, !0).animate(o, 200)) : (a.css(o), n.pos = i.extend({}, n.dim, o)))
        },
        update: function(e) {
            var t = e && e.type,
                i = !t || "orientationchange" === t;
            i && (clearTimeout(c), c = null), r.isOpen && !c && (c = setTimeout((function() {
                var n = r.current;
                n && !r.isClosing && (r.wrap.removeClass("fancybox-tmp"), (i || "load" === t || "resize" === t && n.autoResize) && r._setDimension(), "scroll" === t && n.canShrink || r.reposition(e), r.trigger("onUpdate"), c = null)
            }), i && !u ? 0 : 300))
        },
        toggle: function(e) {
            r.isOpen && (r.current.fitToView = "boolean" === i.type(e) ? e : !r.current.fitToView, u && (r.wrap.removeAttr("style").addClass("fancybox-tmp"), r.trigger("onUpdate")), r.update())
        },
        hideLoading: function() {
            s.unbind(".loading"), i("#fancybox-loading").remove()
        },
        showLoading: function() {
            var e, t;
            r.hideLoading(), e = i('<div id="fancybox-loading"><div></div></div>').click(r.cancel).appendTo("body"), s.bind("keydown.loading", (function(e) {
                27 === (e.which || e.keyCode) && (e.preventDefault(), r.cancel())
            })), r.defaults.fixed || (t = r.getViewport(), e.css({
                position: "absolute",
                top: .5 * t.h + t.y,
                left: .5 * t.w + t.x
            }))
        },
        getViewport: function() {
            var t = r.current && r.current.locked || !1,
                i = {
                    x: o.scrollLeft(),
                    y: o.scrollTop()
                };
            return t ? (i.w = t[0].clientWidth, i.h = t[0].clientHeight) : (i.w = u && e.innerWidth ? e.innerWidth : o.width(), i.h = u && e.innerHeight ? e.innerHeight : o.height()), i
        },
        unbindEvents: function() {
            r.wrap && d(r.wrap) && r.wrap.unbind(".fb"), s.unbind(".fb"), o.unbind(".fb")
        },
        bindEvents: function() {
            var e = r.current,
                t;
            e && (o.bind("orientationchange.fb" + (u ? "" : " resize.fb") + (e.autoCenter && !e.locked ? " scroll.fb" : ""), r.update), (t = e.keys) && s.bind("keydown.fb", (function(a) {
                var o = a.which || a.keyCode,
                    s = a.target || a.srcElement;
                if (27 === o && r.coming) return !1;
                !a.ctrlKey && !a.altKey && !a.shiftKey && !a.metaKey && (!s || !s.type && !i(s).is("[contenteditable]")) && i.each(t, (function(t, s) {
                    return 1 < e.group.length && s[o] !== n ? (r[t](s[o]), a.preventDefault(), !1) : -1 < i.inArray(o, s) ? (r[t](), a.preventDefault(), !1) : void 0
                }))
            })), i.fn.mousewheel && e.mouseWheel && r.wrap.bind("mousewheel.fb", (function(t, n, a, o) {
                for (var s = i(t.target || null), l = !1; s.length && !l && !s.is(".fancybox-skin") && !s.is(".fancybox-wrap");) l = s[0] && !(s[0].style.overflow && "hidden" === s[0].style.overflow) && (s[0].clientWidth && s[0].scrollWidth > s[0].clientWidth || s[0].clientHeight && s[0].scrollHeight > s[0].clientHeight), s = i(s).parent();
                0 !== n && !l && 1 < r.group.length && !e.canShrink && (0 < o || 0 < a ? r.prev(0 < o ? "down" : "left") : (0 > o || 0 > a) && r.next(0 > o ? "up" : "right"), t.preventDefault())
            })))
        },

        trigger: function(e, t) {
            var n, a = t || r.coming || r.current;
            if (a) {
                if (i.isFunction(a[e]) && (n = a[e].apply(a, Array.prototype.slice.call(arguments, 1))), !1 === n) return !1;
                a.helpers && i.each(a.helpers, (function(t, n) {
                    n && r.helpers[t] && i.isFunction(r.helpers[t][e]) && r.helpers[t][e](i.extend(!0, {}, r.helpers[t].defaults, n), a)
                })), s.trigger(e)
            }
        },
        isImage: function(e) {
            return h(e) && e.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)
        },
        isSWF: function(e) {
            return h(e) && e.match(/\.(swf)((\?|#).*)?$/i)
        },
        _start: function(e) {
            var t = {},
                n, a;
            if (e = p(e), !(n = r.group[e] || null)) return !1;
            if (n = (t = i.extend(!0, {}, r.opts, n)).margin, a = t.padding, "number" === i.type(n) && (t.margin = [n, n, n, n]), "number" === i.type(a) && (t.padding = [a, a, a, a]), t.modal && i.extend(!0, t, {
                    closeBtn: !1,
                    closeClick: !1,
                    nextClick: !1,
                    arrows: !1,
                    mouseWheel: !1,
                    keys: null,
                    helpers: {
                        overlay: {
                            closeClick: !1
                        }
                    }
                }), t.autoSize && (t.autoWidth = t.autoHeight = !0), "auto" === t.width && (t.autoWidth = !0), "auto" === t.height && (t.autoHeight = !0), t.group = r.group, t.index = e, r.coming = t, !1 === r.trigger("beforeLoad")) r.coming = null;
            else {
                if (a = t.type, n = t.href, !a) return r.coming = null, !(!r.current || !r.router || "jumpto" === r.router) && (r.current.index = e, r[r.router](r.direction));
                if (r.isActive = !0, "image" !== a && "swf" !== a || (t.autoHeight = t.autoWidth = !1, t.scrolling = "visible"), "image" === a && (t.aspectRatio = !0), "iframe" === a && u && (t.scrolling = "scroll"), t.wrap = i(t.tpl.wrap).addClass("fancybox-" + (u ? "mobile" : "desktop") + " fancybox-type-" + a + " fancybox-tmp " + t.wrapCSS).appendTo(t.parent || "body"), i.extend(t, {
                        skin: i(".fancybox-skin", t.wrap),
                        outer: i(".fancybox-outer", t.wrap),
                        inner: i(".fancybox-inner", t.wrap)
                    }), i.each(["Top", "Right", "Bottom", "Left"], (function(e, i) {
                        t.skin.css("padding" + i, m(t.padding[e]))
                    })), r.trigger("onReady"), "inline" === a || "html" === a) {
                    if (!t.content || !t.content.length) return r._error("content")
                } else if (!n) return r._error("href");
                "image" === a ? r._loadImage() : "ajax" === a ? r._loadAjax() : "iframe" === a ? r._loadIframe() : r._afterLoad()
            }
        },
        _error: function(e) {
            i.extend(r.coming, {
                type: "html",
                autoWidth: !0,
                autoHeight: !0,
                minWidth: 0,
                minHeight: 0,
                scrolling: "no",
                hasError: e,
                content: r.coming.tpl.error
            }), r._afterLoad()
        },
        _loadImage: function() {
            var e = r.imgPreload = new Image;
            e.onload = function() {
                this.onload = this.onerror = null, r.coming.width = this.width / r.opts.pixelRatio, r.coming.height = this.height / r.opts.pixelRatio, r._afterLoad()
            }, e.onerror = function() {
                this.onload = this.onerror = null, r._error("image")
            }, e.src = r.coming.href, !0 !== e.complete && r.showLoading()
        },
        _loadAjax: function() {
            var e = r.coming;
            r.showLoading(), r.ajaxLoad = i.ajax(i.extend({}, e.ajax, {
                url: e.href,
                error: function(e, t) {
                    r.coming && "abort" !== t ? r._error("ajax", e) : r.hideLoading()
                },
                success: function(t, i) {
                    "success" === i && (e.content = t, r._afterLoad())
                }
            }))
        },
        _loadIframe: function() {
            var e = r.coming,
                t = i(e.tpl.iframe.replace(/\{rnd\}/g, (new Date).getTime())).attr("scrolling", u ? "auto" : e.iframe.scrolling).attr("src", e.href);
            i(e.wrap).bind("onReset", (function() {
                try {
                    i(this).find("iframe").hide().attr("src", "//about:blank").end().empty()
                } catch (e) {}
            })), e.iframe.preload && (r.showLoading(), t.one("load", (function() {
                i(this).data("ready", 1), u || i(this).bind("load.fb", r.update), i(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show(), r._afterLoad()
            }))), e.content = t.appendTo(e.inner), e.iframe.preload || r._afterLoad()
        },
        _preloadImages: function() {
            var e = r.group,
                t = r.current,
                i = e.length,
                n = t.preload ? Math.min(t.preload, i - 1) : 0,
                a, o;
            for (o = 1; o <= n; o += 1) "image" === (a = e[(t.index + o) % i]).type && a.href && ((new Image).src = a.href)
        },
        _afterLoad: function() {
            var e = r.coming,
                t = r.current,
                n, a, o, s, l;
            if (r.hideLoading(), e && !1 !== r.isActive)
                if (!1 === r.trigger("afterLoad", e, t)) e.wrap.stop(!0).trigger("onReset").remove(), r.coming = null;
                else {
                    switch (t && (r.trigger("beforeChange", t), t.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove()), r.unbindEvents(), n = e.content, a = e.type, o = e.scrolling, i.extend(r, {
                            wrap: e.wrap,
                            skin: e.skin,
                            outer: e.outer,
                            inner: e.inner,
                            current: e,
                            previous: t
                        }), s = e.href, a) {
                        case "inline":
                        case "ajax":
                        case "html":
                            e.selector ? n = i("<div>").html(n).find(e.selector) : d(n) && (n.data("fancybox-placeholder") || n.data("fancybox-placeholder", i('<div class="fancybox-placeholder"></div>').insertAfter(n).hide()), n = n.show().detach(), e.wrap.bind("onReset", (function() {
                                i(this).find(n).length && n.hide().replaceAll(n.data("fancybox-placeholder")).data("fancybox-placeholder", !1)
                            })));
                            break;
                        case "image":
                            n = e.tpl.image.replace("{href}", s);
                            break;
                        case "swf":
                            n = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + s + '"></param>', l = "", i.each(e.swf, (function(e, t) {
                                n += '<param name="' + e + '" value="' + t + '"></param>', l += " " + e + '="' + t + '"'
                            })), n += '<embed src="' + s + '" type="application/x-shockwave-flash" width="100%" height="100%"' + l + "></embed></object>"
                    }(!d(n) || !n.parent().is(e.inner)) && e.inner.append(n), r.trigger("beforeShow"), e.inner.css("overflow", "yes" === o ? "scroll" : "no" === o ? "hidden" : o), r._setDimension(), r.reposition(), r.isOpen = !1, r.coming = null, r.bindEvents(), r.isOpened ? t.prevMethod && r.transitions[t.prevMethod]() : i(".fancybox-wrap").not(e.wrap).stop(!0).trigger("onReset").remove(), r.transitions[r.isOpened ? e.nextMethod : e.openMethod](), r._preloadImages()
                }
        },
        _setDimension: function() {
            var e = r.getViewport(),
                t = 0,
                n = !1,
                a = !1,
                n = r.wrap,
                o = r.skin,
                s = r.inner,
                l = r.current,
                a = l.width,
                c = l.height,
                u = l.minWidth,
                d = l.minHeight,
                h = l.maxWidth,
                v = l.maxHeight,
                g = l.scrolling,
                y = l.scrollOutside ? l.scrollbarWidth : 0,
                w = l.margin,
                b = p(w[1] + w[3]),
                _ = p(w[0] + w[2]),
                x, C, k, $, S, T, z, O, M;
            if (n.add(o).add(s).width("auto").height("auto").removeClass("fancybox-tmp"), C = b + (w = p(o.outerWidth(!0) - o.width())), k = _ + (x = p(o.outerHeight(!0) - o.height())), $ = f(a) ? (e.w - C) * p(a) / 100 : a, S = f(c) ? (e.h - k) * p(c) / 100 : c, "iframe" === l.type) {
                if (M = l.content, l.autoHeight && 1 === M.data("ready")) try {
                    M[0].contentWindow.document.location && (s.width($).height(9999), T = M.contents().find("body"), y && T.css("overflow-x", "hidden"), S = T.outerHeight(!0))
                } catch (e) {}
            } else(l.autoWidth || l.autoHeight) && (s.addClass("fancybox-tmp"), l.autoWidth || s.width($), l.autoHeight || s.height(S), l.autoWidth && ($ = s.width()), l.autoHeight && (S = s.height()), s.removeClass("fancybox-tmp"));
            if (a = p($), c = p(S), O = $ / S, u = p(f(u) ? p(u, "w") - C : u), h = p(f(h) ? p(h, "w") - C : h), d = p(f(d) ? p(d, "h") - k : d), T = h, z = v = p(f(v) ? p(v, "h") - k : v), l.fitToView && (h = Math.min(e.w - C, h), v = Math.min(e.h - k, v)), C = e.w - b, _ = e.h - _, l.aspectRatio ? (a > h && (c = p((a = h) / O)), c > v && (a = p((c = v) * O)), a < u && (c = p((a = u) / O)), c < d && (a = p((c = d) * O))) : (a = Math.max(u, Math.min(a, h)), l.autoHeight && "iframe" !== l.type && (s.width(a), c = s.height()), c = Math.max(d, Math.min(c, v))), l.fitToView)
                if (s.width(a).height(c), n.width(a + w), e = n.width(), b = n.height(), l.aspectRatio)
                    for (;
                        (e > C || b > _) && a > u && c > d && !(19 < t++);) c = Math.max(d, Math.min(v, c - 10)), (a = p(c * O)) < u && (c = p((a = u) / O)), a > h && (c = p((a = h) / O)), s.width(a).height(c), n.width(a + w), e = n.width(), b = n.height();
                else a = Math.max(u, Math.min(a, a - (e - C))), c = Math.max(d, Math.min(c, c - (b - _)));
            y && "auto" === g && c < S && a + w + y < C && (a += y), s.width(a).height(c), n.width(a + w), e = n.width(), b = n.height(), n = (e > C || b > _) && a > u && c > d, a = l.aspectRatio ? a < T && c < z && a < $ && c < S : (a < T || c < z) && (a < $ || c < S), i.extend(l, {
                dim: {
                    width: m(e),
                    height: m(b)
                },
                origWidth: $,
                origHeight: S,
                canShrink: n,
                canExpand: a,
                wPadding: w,
                hPadding: x,
                wrapSpace: b - o.outerHeight(!0),
                skinSpace: o.height() - c
            }), !M && l.autoHeight && c > d && c < v && !a && s.height("auto")
        },
        _getPosition: function(e) {
            var t = r.current,
                i = r.getViewport(),
                n = t.margin,
                a = r.wrap.width() + n[1] + n[3],
                o = r.wrap.height() + n[0] + n[2],
                n = {
                    position: "absolute",
                    top: n[0],
                    left: n[3]
                };
            return t.autoCenter && t.fixed && !e && o <= i.h && a <= i.w ? n.position = "fixed" : t.locked || (n.top += i.y, n.left += i.x), n.top = m(Math.max(n.top, n.top + (i.h - o) * t.topRatio)), n.left = m(Math.max(n.left, n.left + (i.w - a) * t.leftRatio)), n
        },
        _afterZoomIn: function() {
            var e = r.current;
            e && (r.isOpen = r.isOpened = !0, r.wrap.css("overflow", "visible").addClass("fancybox-opened"), r.update(), (e.closeClick || e.nextClick && 1 < r.group.length) && r.inner.css("cursor", "pointer").bind("click.fb", (function(t) {
                !i(t.target).is("a") && !i(t.target).parent().is("a") && (t.preventDefault(), r[e.closeClick ? "close" : "next"]())
            })), e.closeBtn && i(e.tpl.closeBtn).appendTo(r.skin).bind("click.fb", (function(e) {
                e.preventDefault(), r.close()
            })), e.arrows && 1 < r.group.length && ((e.loop || 0 < e.index) && i(e.tpl.prev).appendTo(r.outer).bind("click.fb", r.prev), (e.loop || e.index < r.group.length - 1) && i(e.tpl.next).appendTo(r.outer).bind("click.fb", r.next)), r.trigger("afterShow"), e.loop || e.index !== e.group.length - 1 ? r.opts.autoPlay && !r.player.isActive && (r.opts.autoPlay = !1, r.play()) : r.play(!1))
        },
        _afterZoomOut: function(e) {
            e = e || r.current, i(".fancybox-wrap").trigger("onReset").remove(), i.extend(r, {
                group: {},
                opts: {},
                router: !1,
                current: null,
                isActive: !1,
                isOpened: !1,
                isOpen: !1,
                isClosing: !1,
                wrap: null,
                skin: null,
                outer: null,
                inner: null
            }), r.trigger("afterClose", e)
        }
    }), r.transitions = {
        getOrigPosition: function() {
            var e = r.current,
                t = e.element,
                i = e.orig,
                n = {},
                a = 50,
                o = 50,
                s = e.hPadding,
                l = e.wPadding,
                c = r.getViewport();
            return !i && e.isDom && t.is(":visible") && ((i = t.find("img:first")).length || (i = t)), d(i) ? (n = i.offset(), i.is("img") && (a = i.outerWidth(), o = i.outerHeight())) : (n.top = c.y + (c.h - o) * e.topRatio, n.left = c.x + (c.w - a) * e.leftRatio), ("fixed" === r.wrap.css("position") || e.locked) && (n.top -= c.y, n.left -= c.x), n = {
                top: m(n.top - s * e.topRatio),
                left: m(n.left - l * e.leftRatio),
                width: m(a + l),
                height: m(o + s)
            }
        },
        step: function(e, t) {
            var i, n, a = t.prop,
                o = (n = r.current).wrapSpace,
                s = n.skinSpace;
            "width" !== a && "height" !== a || (i = t.end === t.start ? 1 : (e - t.start) / (t.end - t.start), r.isClosing && (i = 1 - i), n = e - (n = "width" === a ? n.wPadding : n.hPadding), r.skin[a](p("width" === a ? n : n - o * i)), r.inner[a](p("width" === a ? n : n - o * i - s * i)))
        },
        zoomIn: function() {
            var e = r.current,
                t = e.pos,
                n = e.openEffect,
                a = "elastic" === n,
                o = i.extend({
                    opacity: 1
                }, t);
            delete o.position, a ? (t = this.getOrigPosition(), e.openOpacity && (t.opacity = .1)) : "fade" === n && (t.opacity = .1), r.wrap.css(t).animate(o, {
                duration: "none" === n ? 0 : e.openSpeed,
                easing: e.openEasing,
                step: a ? this.step : null,
                complete: r._afterZoomIn
            })
        },
        zoomOut: function() {
            var e = r.current,
                t = e.closeEffect,
                i = "elastic" === t,
                n = {
                    opacity: .1
                };
            i && (n = this.getOrigPosition(), e.closeOpacity && (n.opacity = .1)), r.wrap.animate(n, {
                duration: "none" === t ? 0 : e.closeSpeed,
                easing: e.closeEasing,
                step: i ? this.step : null,
                complete: r._afterZoomOut
            })
        },
        changeIn: function() {
            var e = r.current,
                t = e.nextEffect,
                i = e.pos,
                n = {
                    opacity: 1
                },
                a = r.direction,
                o;
            i.opacity = .1, "elastic" === t && (o = "down" === a || "up" === a ? "top" : "left", "down" === a || "right" === a ? (i[o] = m(p(i[o]) - 200), n[o] = "+=200px") : (i[o] = m(p(i[o]) + 200), n[o] = "-=200px")), "none" === t ? r._afterZoomIn() : r.wrap.css(i).animate(n, {
                duration: e.nextSpeed,
                easing: e.nextEasing,
                complete: r._afterZoomIn
            })
        },
        changeOut: function() {
            var e = r.previous,
                t = e.prevEffect,
                n = {
                    opacity: .1
                },
                a = r.direction;
            "elastic" === t && (n["down" === a || "up" === a ? "top" : "left"] = ("up" === a || "left" === a ? "-" : "+") + "=200px"), e.wrap.animate(n, {
                duration: "none" === t ? 0 : e.prevSpeed,
                easing: e.prevEasing,
                complete: function() {
                    i(this).trigger("onReset").remove()
                }
            })
        }
    }, r.helpers.overlay = {
        defaults: {
            closeClick: !0,
            speedOut: 200,
            showEarly: !0,
            css: {},
            locked: !u,
            fixed: !0
        },
        overlay: null,
        fixed: !1,
        el: i("html"),
        create: function(e) {
            e = i.extend({}, this.defaults, e), this.overlay && this.close(), this.overlay = i('<div class="fancybox-overlay"></div>').appendTo(r.coming ? r.coming.parent : e.parent), this.fixed = !1, e.fixed && r.defaults.fixed && (this.overlay.addClass("fancybox-overlay-fixed"), this.fixed = !0)
        },
        open: function(e) {
            var t = this;
            e = i.extend({}, this.defaults, e), this.overlay ? this.overlay.unbind(".overlay").width("auto").height("auto") : this.create(e), this.fixed || (o.bind("resize.overlay", i.proxy(this.update, this)), this.update()), e.closeClick && this.overlay.bind("click.overlay", (function(e) {
                if (i(e.target).hasClass("fancybox-overlay")) return r.isActive ? r.close() : t.close(), !1
            })), this.overlay.css(e.css).show()
        },
        close: function() {
            var e, t;
            o.unbind("resize.overlay"), this.el.hasClass("fancybox-lock") && (i(".fancybox-margin").removeClass("fancybox-margin"), e = o.scrollTop(), t = o.scrollLeft(), this.el.removeClass("fancybox-lock"), o.scrollTop(e).scrollLeft(t)), i(".fancybox-overlay").remove().hide(), i.extend(this, {
                overlay: null,
                fixed: !1
            })
        },
        update: function() {
            var e = "100%",
                i;
            this.overlay.width(e).height("100%"), l ? (i = Math.max(t.documentElement.offsetWidth, t.body.offsetWidth), s.width() > i && (e = s.width())) : s.width() > o.width() && (e = s.width()), this.overlay.width(e).height(s.height())
        },
        onReady: function(e, t) {
            var n = this.overlay;
            i(".fancybox-overlay").stop(!0, !0), n || this.create(e), e.locked && this.fixed && t.fixed && (n || (this.margin = s.height() > o.height() && i("html").css("margin-right").replace("px", "")), t.locked = this.overlay.append(t.wrap), t.fixed = !1), !0 === e.showEarly && this.beforeShow.apply(this, arguments)
        },
        beforeShow: function(e, t) {
            var n, a;
            t.locked && (!1 !== this.margin && (i("*").filter((function() {
                return "fixed" === i(this).css("position") && !i(this).hasClass("fancybox-overlay") && !i(this).hasClass("fancybox-wrap")
            })).addClass("fancybox-margin"), this.el.addClass("fancybox-margin")), n = o.scrollTop(), a = o.scrollLeft(), this.el.addClass("fancybox-lock"), o.scrollTop(n).scrollLeft(a)), this.open(e)
        },
        onUpdate: function() {
            this.fixed || this.update()
        },
        afterClose: function(e) {
            this.overlay && !r.coming && this.overlay.fadeOut(e.speedOut, i.proxy(this.close, this))
        }
    }, r.helpers.title = {
        defaults: {
            type: "float",
            position: "bottom"
        },
        beforeShow: function(e) {
            var t = r.current,
                n = t.title,
                a = e.type;
            if (i.isFunction(n) && (n = n.call(t.element, t)), h(n) && "" !== i.trim(n)) {
                switch (t = i('<div class="fancybox-title fancybox-title-' + a + '-wrap">' + n + "</div>"), a) {
                    case "inside":
                        a = r.skin;
                        break;
                    case "outside":
                        a = r.wrap;
                        break;
                    case "over":
                        a = r.inner;
                        break;
                    default:
                        a = r.skin, t.appendTo("body"), l && t.width(t.width()), t.wrapInner('<span class="child"></span>'), r.current.margin[2] += Math.abs(p(t.css("margin-bottom")))
                }
                t["top" === e.position ? "prependTo" : "appendTo"](a)
            }
        }
    }, i.fn.fancybox = function(e) {
        var t, n = i(this),
            a = this.selector || "",
            o = function(o) {
                var s = i(this).blur(),
                    l = t,
                    c, u;
                !o.ctrlKey && !o.altKey && !o.shiftKey && !o.metaKey && !s.is(".fancybox-wrap") && (c = e.groupAttr || "data-fancybox-group", (u = s.attr(c)) || (c = "rel", u = s.get(0)[c]), u && "" !== u && "nofollow" !== u && (l = (s = (s = a.length ? i(a) : n).filter("[" + c + '="' + u + '"]')).index(this)), e.index = l, !1 !== r.open(s, e) && o.preventDefault())
            };
        return t = (e = e || {}).index || 0, a && !1 !== e.live ? s.undelegate(a, "click.fb-start").delegate(a + ":not('.fancybox-item, .fancybox-nav')", "click.fb-start", o) : n.unbind("click.fb-start").bind("click.fb-start", o), this.filter("[data-fancybox-start=1]").trigger("click"), this
    }, s.ready((function() {
        var t, o;
        if (i.scrollbarWidth === n && (i.scrollbarWidth = function() {
                var e = i('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),
                    t, t = (t = e.children()).innerWidth() - t.height(99).innerWidth();
                return e.remove(), t
            }), i.support.fixedPosition === n) {
            t = i.support;
            var s = 20 === (o = i('<div style="position:fixed;top:20px;"></div>').appendTo("body"))[0].offsetTop || 15 === o[0].offsetTop;
            o.remove(), t.fixedPosition = s
        }
        i.extend(r.defaults, {
            scrollbarWidth: i.scrollbarWidth(),
            fixed: i.support.fixedPosition,
            parent: i("body")
        }), t = i(e).width(), a.addClass("fancybox-lock-test"), o = i(e).width(), a.removeClass("fancybox-lock-test"), i("<style type='text/css'>.fancybox-margin{margin-right:" + (o - t) + "px;}</style>").appendTo("head")
    }))
}(window, document, jQuery),
function(e) {
    e.flexslider = function(t, i) {
        var n = e(t);
        n.vars = e.extend({}, e.flexslider.defaults, i);
        var a = n.vars.namespace,
            o = window.navigator && window.navigator.msPointerEnabled && window.MSGesture,
            s = ("ontouchstart" in window || o || window.DocumentTouch && document instanceof DocumentTouch) && n.vars.touch,
            r = "click touchend MSPointerUp keyup",
            l = "",
            c, u = "vertical" === n.vars.direction,
            d = n.vars.reverse,
            h = n.vars.itemWidth > 0,
            f = "fade" === n.vars.animation,
            p = "" !== n.vars.asNavFor,
            m = {},
            v = !0;
        e.data(t, "flexslider", n), m = {
            init: function() {
                n.animating = !1, n.currentSlide = parseInt(n.vars.startAt ? n.vars.startAt : 0, 10), isNaN(n.currentSlide) && (n.currentSlide = 0), n.animatingTo = n.currentSlide, n.atEnd = 0 === n.currentSlide || n.currentSlide === n.last, n.containerSelector = n.vars.selector.substr(0, n.vars.selector.search(" ")), n.slides = e(n.vars.selector, n), n.container = e(n.containerSelector, n), n.count = n.slides.length, n.syncExists = e(n.vars.sync).length > 0, "slide" === n.vars.animation && (n.vars.animation = "swing"), n.prop = u ? "top" : "marginLeft", n.args = {}, n.manualPause = !1, n.stopped = !1, n.started = !1, n.startTimeout = null, n.transitions = !n.vars.video && !f && n.vars.useCSS && function() {
                    var e = document.createElement("div"),
                        t = ["perspectiveProperty", "WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"];
                    for (var i in t)
                        if (void 0 !== e.style[t[i]]) return n.pfx = t[i].replace("Perspective", "").toLowerCase(), n.prop = "-" + n.pfx + "-transform", !0;
                    return !1
                }(), n.ensureAnimationEnd = "", "" !== n.vars.controlsContainer && (n.controlsContainer = e(n.vars.controlsContainer).length > 0 && e(n.vars.controlsContainer)), "" !== n.vars.manualControls && (n.manualControls = e(n.vars.manualControls).length > 0 && e(n.vars.manualControls)), "" !== n.vars.customDirectionNav && (n.customDirectionNav = 2 === e(n.vars.customDirectionNav).length && e(n.vars.customDirectionNav)), n.vars.randomize && (n.slides.sort((function() {
                    return Math.round(Math.random()) - .5
                })), n.container.empty().append(n.slides)), n.doMath(), n.setup("init"), n.vars.controlNav && m.controlNav.setup(), n.vars.directionNav && m.directionNav.setup(), n.vars.keyboard && (1 === e(n.containerSelector).length || n.vars.multipleKeyboard) && e(document).bind("keyup", (function(e) {
                    var t = e.keyCode;
                    if (!n.animating && (39 === t || 37 === t)) {
                        var i = 39 === t ? n.getTarget("next") : 37 === t && n.getTarget("prev");
                        n.flexAnimate(i, n.vars.pauseOnAction)
                    }
                })), n.vars.mousewheel && n.bind("mousewheel", (function(e, t, i, a) {
                    e.preventDefault();
                    var o = t < 0 ? n.getTarget("next") : n.getTarget("prev");
                    n.flexAnimate(o, n.vars.pauseOnAction)
                })), n.vars.pausePlay && m.pausePlay.setup(), n.vars.slideshow && n.vars.pauseInvisible && m.pauseInvisible.init(), n.vars.slideshow && (n.vars.pauseOnHover && n.hover((function() {
                    n.manualPlay || n.manualPause || n.pause()
                }), (function() {
                    n.manualPause || n.manualPlay || n.stopped || n.play()
                })), n.vars.pauseInvisible && m.pauseInvisible.isHidden() || (n.vars.initDelay > 0 ? n.startTimeout = setTimeout(n.play, n.vars.initDelay) : n.play())), p && m.asNav.setup(), s && n.vars.touch && m.touch(), (!f || f && n.vars.smoothHeight) && e(window).bind("resize orientationchange focus", m.resize), n.find("img").attr("draggable", "false"), setTimeout((function() {
                    n.vars.start(n)
                }), 200)
            },
            asNav: {
                setup: function() {
                    n.asNav = !0, n.animatingTo = Math.floor(n.currentSlide / n.move), n.currentItem = n.currentSlide, n.slides.removeClass(a + "active-slide").eq(n.currentItem).addClass(a + "active-slide"), o ? (t._slider = n, n.slides.each((function() {
                        var t = this;
                        this._gesture = new MSGesture, this._gesture.target = this, this.addEventListener("MSPointerDown", (function(e) {
                            e.preventDefault(), e.currentTarget._gesture && e.currentTarget._gesture.addPointer(e.pointerId)
                        }), !1), this.addEventListener("MSGestureTap", (function(t) {
                            t.preventDefault();
                            var i = e(this),
                                a = i.index();
                            e(n.vars.asNavFor).data("flexslider").animating || i.hasClass("active") || (n.direction = n.currentItem < a ? "next" : "prev", n.flexAnimate(a, n.vars.pauseOnAction, !1, !0, !0))
                        }))
                    }))) : n.slides.on(r, (function(t) {
                        t.preventDefault();
                        var i = e(this),
                            o = i.index(),
                            s;
                        i.offset().left - e(n).scrollLeft() <= 0 && i.hasClass(a + "active-slide") ? n.flexAnimate(n.getTarget("prev"), !0) : e(n.vars.asNavFor).data("flexslider").animating || i.hasClass(a + "active-slide") || (n.direction = n.currentItem < o ? "next" : "prev", n.flexAnimate(o, n.vars.pauseOnAction, !1, !0, !0))
                    }))
                }
            },
            controlNav: {
                setup: function() {
                    n.manualControls ? m.controlNav.setupManual() : m.controlNav.setupPaging()
                },
                setupPaging: function() {
                    var t = "thumbnails" === n.vars.controlNav ? "control-thumbs" : "control-paging",
                        i = 1,
                        o, s;
                    if (n.controlNavScaffold = e('<ol class="' + a + "control-nav " + a + t + '"></ol>'), n.pagingCount > 1)
                        for (var c = 0; c < n.pagingCount; c++) {
                            if (s = n.slides.eq(c), o = "thumbnails" === n.vars.controlNav ? '<img src="' + s.attr("data-thumb") + '"/>' : "<a>" + i + "</a>", "thumbnails" === n.vars.controlNav && !0 === n.vars.thumbCaptions) {
                                var u = s.attr("data-thumbcaption");
                                "" !== u && void 0 !== u && (o += '<span class="' + a + 'caption">' + u + "</span>")
                            }
                            n.controlNavScaffold.append("<li>" + o + "</li>"), i++
                        }
                    n.controlsContainer ? e(n.controlsContainer).append(n.controlNavScaffold) : n.append(n.controlNavScaffold), m.controlNav.set(), m.controlNav.active(), n.controlNavScaffold.delegate("a, img", r, (function(t) {
                        if (t.preventDefault(), "" === l || l === t.type) {
                            var i = e(this),
                                o = n.controlNav.index(i);
                            i.hasClass(a + "active") || (n.direction = o > n.currentSlide ? "next" : "prev", n.flexAnimate(o, n.vars.pauseOnAction))
                        }
                        "" === l && (l = t.type), m.setToClearWatchedEvent()
                    }))
                },
                setupManual: function() {
                    n.controlNav = n.manualControls, m.controlNav.active(), n.controlNav.bind(r, (function(t) {
                        if (t.preventDefault(), "" === l || l === t.type) {
                            var i = e(this),
                                o = n.controlNav.index(i);
                            i.hasClass(a + "active") || (o > n.currentSlide ? n.direction = "next" : n.direction = "prev", n.flexAnimate(o, n.vars.pauseOnAction))
                        }
                        "" === l && (l = t.type), m.setToClearWatchedEvent()
                    }))
                },
                set: function() {
                    var t = "thumbnails" === n.vars.controlNav ? "img" : "a";
                    n.controlNav = e("." + a + "control-nav li " + t, n.controlsContainer ? n.controlsContainer : n)
                },
                active: function() {
                    n.controlNav.removeClass(a + "active").eq(n.animatingTo).addClass(a + "active")
                },
                update: function(t, i) {
                    n.pagingCount > 1 && "add" === t ? n.controlNavScaffold.append(e("<li><a>" + n.count + "</a></li>")) : 1 === n.pagingCount ? n.controlNavScaffold.find("li").remove() : n.controlNav.eq(i).closest("li").remove(), m.controlNav.set(), n.pagingCount > 1 && n.pagingCount !== n.controlNav.length ? n.update(i, t) : m.controlNav.active()
                }
            },
            directionNav: {
                setup: function() {
                    var t = e('<ul class="' + a + 'direction-nav"><li class="' + a + 'nav-prev"><a class="' + a + 'prev" href="#">' + n.vars.prevText + '</a></li><li class="' + a + 'nav-next"><a class="' + a + 'next" href="#">' + n.vars.nextText + "</a></li></ul>");
                    n.customDirectionNav ? n.directionNav = n.customDirectionNav : n.controlsContainer ? (e(n.controlsContainer).append(t), n.directionNav = e("." + a + "direction-nav li a", n.controlsContainer)) : (n.append(t), n.directionNav = e("." + a + "direction-nav li a", n)), m.directionNav.update(), n.directionNav.bind(r, (function(t) {
                        var i;
                        t.preventDefault(), "" !== l && l !== t.type || (i = e(this).hasClass(a + "next") ? n.getTarget("next") : n.getTarget("prev"), n.flexAnimate(i, n.vars.pauseOnAction)), "" === l && (l = t.type), m.setToClearWatchedEvent()
                    }))
                },
                update: function() {
                    var e = a + "disabled";
                    1 === n.pagingCount ? n.directionNav.addClass(e).attr("tabindex", "-1") : n.vars.animationLoop ? n.directionNav.removeClass(e).removeAttr("tabindex") : 0 === n.animatingTo ? n.directionNav.removeClass(e).filter("." + a + "prev").addClass(e).attr("tabindex", "-1") : n.animatingTo === n.last ? n.directionNav.removeClass(e).filter("." + a + "next").addClass(e).attr("tabindex", "-1") : n.directionNav.removeClass(e).removeAttr("tabindex")
                }
            },
            pausePlay: {
                setup: function() {
                    var t = e('<div class="' + a + 'pauseplay"><a></a></div>');
                    n.controlsContainer ? (n.controlsContainer.append(t), n.pausePlay = e("." + a + "pauseplay a", n.controlsContainer)) : (n.append(t), n.pausePlay = e("." + a + "pauseplay a", n)), m.pausePlay.update(n.vars.slideshow ? a + "pause" : a + "play"), n.pausePlay.bind(r, (function(t) {
                        t.preventDefault(), "" !== l && l !== t.type || (e(this).hasClass(a + "pause") ? (n.manualPause = !0, n.manualPlay = !1, n.pause()) : (n.manualPause = !1, n.manualPlay = !0, n.play())), "" === l && (l = t.type), m.setToClearWatchedEvent()
                    }))
                },
                update: function(e) {
                    "play" === e ? n.pausePlay.removeClass(a + "pause").addClass(a + "play").html(n.vars.playText) : n.pausePlay.removeClass(a + "play").addClass(a + "pause").html(n.vars.pauseText)
                }
            },
            touch: function() {
                var e, i, a, s, r, l, c, p, m, v = !1,
                    g = 0,
                    y = 0,
                    w = 0;
                if (o) {
                    function b(e) {
                        e.stopPropagation(), n.animating ? e.preventDefault() : (n.pause(), t._gesture.addPointer(e.pointerId), w = 0, s = u ? n.h : n.w, l = Number(new Date), a = h && d && n.animatingTo === n.last ? 0 : h && d ? n.limit - (n.itemW + n.vars.itemMargin) * n.move * n.animatingTo : h && n.currentSlide === n.last ? n.limit : h ? (n.itemW + n.vars.itemMargin) * n.move * n.currentSlide : d ? (n.last - n.currentSlide + n.cloneOffset) * s : (n.currentSlide + n.cloneOffset) * s)
                    }

                    function _(e) {
                        e.stopPropagation();
                        var i = e.target._slider;
                        if (i) {
                            var n = -e.translationX,
                                o = -e.translationY;
                            r = w += u ? o : n, v = u ? Math.abs(w) < Math.abs(-n) : Math.abs(w) < Math.abs(-o), e.detail !== e.MSGESTURE_FLAG_INERTIA ? (!v || Number(new Date) - l > 500) && (e.preventDefault(), !f && i.transitions && (i.vars.animationLoop || (r = w / (0 === i.currentSlide && w < 0 || i.currentSlide === i.last && w > 0 ? Math.abs(w) / s + 2 : 1)), i.setProps(a + r, "setTouch"))) : setImmediate((function() {
                                t._gesture.stop()
                            }))
                        }
                    }

                    function x(t) {
                        t.stopPropagation();
                        var n = t.target._slider;
                        if (n) {
                            if (n.animatingTo === n.currentSlide && !v && null !== r) {
                                var o = d ? -r : r,
                                    c = o > 0 ? n.getTarget("next") : n.getTarget("prev");
                                n.canAdvance(c) && (Number(new Date) - l < 550 && Math.abs(o) > 50 || Math.abs(o) > s / 2) ? n.flexAnimate(c, n.vars.pauseOnAction) : f || n.flexAnimate(n.currentSlide, n.vars.pauseOnAction, !0)
                            }
                            e = null, i = null, r = null, a = null, w = 0
                        }
                    }
                    t.style.msTouchAction = "none", t._gesture = new MSGesture, t._gesture.target = t, t.addEventListener("MSPointerDown", b, !1), t._slider = n, t.addEventListener("MSGestureChange", _, !1), t.addEventListener("MSGestureEnd", x, !1)
                } else c = function(o) {
                    n.animating ? o.preventDefault() : (window.navigator.msPointerEnabled || 1 === o.touches.length) && (n.pause(), s = u ? n.h : n.w, l = Number(new Date), g = o.touches[0].pageX, y = o.touches[0].pageY, a = h && d && n.animatingTo === n.last ? 0 : h && d ? n.limit - (n.itemW + n.vars.itemMargin) * n.move * n.animatingTo : h && n.currentSlide === n.last ? n.limit : h ? (n.itemW + n.vars.itemMargin) * n.move * n.currentSlide : d ? (n.last - n.currentSlide + n.cloneOffset) * s : (n.currentSlide + n.cloneOffset) * s, e = u ? y : g, i = u ? g : y, t.addEventListener("touchmove", p, !1), t.addEventListener("touchend", m, !1))
                }, p = function(t) {
                    g = t.touches[0].pageX, y = t.touches[0].pageY, r = u ? e - y : e - g;
                    var o = 500;
                    (!(v = u ? Math.abs(r) < Math.abs(g - i) : Math.abs(r) < Math.abs(y - i)) || Number(new Date) - l > 500) && (t.preventDefault(), !f && n.transitions && (n.vars.animationLoop || (r /= 0 === n.currentSlide && r < 0 || n.currentSlide === n.last && r > 0 ? Math.abs(r) / s + 2 : 1), n.setProps(a + r, "setTouch")))
                }, m = function(o) {
                    if (t.removeEventListener("touchmove", p, !1), n.animatingTo === n.currentSlide && !v && null !== r) {
                        var c = d ? -r : r,
                            u = c > 0 ? n.getTarget("next") : n.getTarget("prev");
                        n.canAdvance(u) && (Number(new Date) - l < 550 && Math.abs(c) > 50 || Math.abs(c) > s / 2) ? n.flexAnimate(u, n.vars.pauseOnAction) : f || n.flexAnimate(n.currentSlide, n.vars.pauseOnAction, !0)
                    }
                    t.removeEventListener("touchend", m, !1), e = null, i = null, r = null, a = null
                }, t.addEventListener("touchstart", c, !1)
            },
            resize: function() {
                !n.animating && n.is(":visible") && (h || n.doMath(), f ? m.smoothHeight() : h ? (n.slides.width(n.computedW), n.update(n.pagingCount), n.setProps()) : u ? (n.viewport.height(n.h), n.setProps(n.h, "setTotal")) : (n.vars.smoothHeight && m.smoothHeight(), n.newSlides.width(n.computedW), n.setProps(n.computedW, "setTotal")))
            },
            smoothHeight: function(e) {
                if (!u || f) {
                    var t = f ? n : n.viewport;
                    e ? t.animate({
                        height: n.slides.eq(n.animatingTo).height()
                    }, e) : t.height(n.slides.eq(n.animatingTo).height())
                }
            },
            sync: function(t) {
                var i = e(n.vars.sync).data("flexslider"),
                    a = n.animatingTo;
                switch (t) {
                    case "animate":
                        i.flexAnimate(a, n.vars.pauseOnAction, !1, !0);
                        break;
                    case "play":
                        i.playing || i.asNav || i.play();
                        break;
                    case "pause":
                        i.pause();
                        break
                }
            },
            uniqueID: function(t) {
                return t.filter("[id]").add(t.find("[id]")).each((function() {
                    var t = e(this);
                    t.attr("id", t.attr("id") + "_clone")
                })), t
            },
            pauseInvisible: {
                visProp: null,
                init: function() {
                    var e = m.pauseInvisible.getHiddenProp();
                    if (e) {
                        var t = e.replace(/[H|h]idden/, "") + "visibilitychange";
                        document.addEventListener(t, (function() {
                            m.pauseInvisible.isHidden() ? n.startTimeout ? clearTimeout(n.startTimeout) : n.pause() : n.started ? n.play() : n.vars.initDelay > 0 ? setTimeout(n.play, n.vars.initDelay) : n.play()
                        }))
                    }
                },
                isHidden: function() {
                    var e = m.pauseInvisible.getHiddenProp();
                    return !!e && document[e]
                },
                getHiddenProp: function() {
                    var e = ["webkit", "moz", "ms", "o"];
                    if ("hidden" in document) return "hidden";
                    for (var t = 0; t < e.length; t++)
                        if (e[t] + "Hidden" in document) return e[t] + "Hidden";
                    return null
                }
            },
            setToClearWatchedEvent: function() {
                clearTimeout(c), c = setTimeout((function() {
                    l = ""
                }), 3e3)
            }
        }, n.flexAnimate = function(t, i, o, r, l) {
            if (n.vars.animationLoop || t === n.currentSlide || (n.direction = t > n.currentSlide ? "next" : "prev"), p && 1 === n.pagingCount && (n.direction = n.currentItem < t ? "next" : "prev"), !n.animating && (n.canAdvance(t, l) || o) && n.is(":visible")) {
                if (p && r) {
                    var c = e(n.vars.asNavFor).data("flexslider");
                    if (n.atEnd = 0 === t || t === n.count - 1, c.flexAnimate(t, !0, !1, !0, l), n.direction = n.currentItem < t ? "next" : "prev", c.direction = n.direction, Math.ceil((t + 1) / n.visible) - 1 === n.currentSlide || 0 === t) return n.currentItem = t, n.slides.removeClass(a + "active-slide").eq(t).addClass(a + "active-slide"), !1;
                    n.currentItem = t, n.slides.removeClass(a + "active-slide").eq(t).addClass(a + "active-slide"), t = Math.floor(t / n.visible)
                }
                if (n.animating = !0, n.animatingTo = t, i && n.pause(), n.vars.before(n), n.syncExists && !l && m.sync("animate"), n.vars.controlNav && m.controlNav.active(), h || n.slides.removeClass(a + "active-slide").eq(t).addClass(a + "active-slide"), n.atEnd = 0 === t || t === n.last, n.vars.directionNav && m.directionNav.update(), t === n.last && (n.vars.end(n), n.vars.animationLoop || n.pause()), f) s ? (n.slides.eq(n.currentSlide).css({
                    opacity: 0,
                    zIndex: 1
                }), n.slides.eq(t).css({
                    opacity: 1,
                    zIndex: 2
                }), n.wrapup(v)) : (n.slides.eq(n.currentSlide).css({
                    zIndex: 1
                }).animate({
                    opacity: 0
                }, n.vars.animationSpeed, n.vars.easing), n.slides.eq(t).css({
                    zIndex: 2
                }).animate({
                    opacity: 1
                }, n.vars.animationSpeed, n.vars.easing, n.wrapup));
                else {
                    var v = u ? n.slides.filter(":first").height() : n.computedW,
                        g, y, w;
                    h ? (g = n.vars.itemMargin, y = (w = (n.itemW + g) * n.move * n.animatingTo) > n.limit && 1 !== n.visible ? n.limit : w) : y = 0 === n.currentSlide && t === n.count - 1 && n.vars.animationLoop && "next" !== n.direction ? d ? (n.count + n.cloneOffset) * v : 0 : n.currentSlide === n.last && 0 === t && n.vars.animationLoop && "prev" !== n.direction ? d ? 0 : (n.count + 1) * v : d ? (n.count - 1 - t + n.cloneOffset) * v : (t + n.cloneOffset) * v, n.setProps(y, "", n.vars.animationSpeed), n.transitions ? (n.vars.animationLoop && n.atEnd || (n.animating = !1, n.currentSlide = n.animatingTo), n.container.unbind("webkitTransitionEnd transitionend"), n.container.bind("webkitTransitionEnd transitionend", (function() {
                        clearTimeout(n.ensureAnimationEnd), n.wrapup(v)
                    })), clearTimeout(n.ensureAnimationEnd), n.ensureAnimationEnd = setTimeout((function() {
                        n.wrapup(v)
                    }), n.vars.animationSpeed + 100)) : n.container.animate(n.args, n.vars.animationSpeed, n.vars.easing, (function() {
                        n.wrapup(v)
                    }))
                }
                n.vars.smoothHeight && m.smoothHeight(n.vars.animationSpeed)
            }
        }, n.wrapup = function(e) {
            f || h || (0 === n.currentSlide && n.animatingTo === n.last && n.vars.animationLoop ? n.setProps(e, "jumpEnd") : n.currentSlide === n.last && 0 === n.animatingTo && n.vars.animationLoop && n.setProps(e, "jumpStart")), n.animating = !1, n.currentSlide = n.animatingTo, n.vars.after(n)
        }, n.animateSlides = function() {
            n.animating || n.flexAnimate(n.getTarget("next"))
        }, n.pause = function() {
            clearInterval(n.animatedSlides), n.animatedSlides = null, n.playing = !1, n.vars.pausePlay && m.pausePlay.update("play"), n.syncExists && m.sync("pause")
        }, n.play = function() {
            n.playing && clearInterval(n.animatedSlides), n.animatedSlides = n.animatedSlides || setInterval(n.animateSlides, n.vars.slideshowSpeed), n.started = n.playing = !0, n.vars.pausePlay && m.pausePlay.update("pause"), n.syncExists && m.sync("play")
        }, n.stop = function() {
            n.pause(), n.stopped = !0
        }, n.canAdvance = function(e, t) {
            var i = p ? n.pagingCount - 1 : n.last;
            return !!t || (!(!p || n.currentItem !== n.count - 1 || 0 !== e || "prev" !== n.direction) || (!p || 0 !== n.currentItem || e !== n.pagingCount - 1 || "next" === n.direction) && (!(e === n.currentSlide && !p) && (!!n.vars.animationLoop || (!n.atEnd || 0 !== n.currentSlide || e !== i || "next" === n.direction) && (!n.atEnd || n.currentSlide !== i || 0 !== e || "next" !== n.direction))))
        }, n.getTarget = function(e) {
            return n.direction = e, "next" === e ? n.currentSlide === n.last ? 0 : n.currentSlide + 1 : 0 === n.currentSlide ? n.last : n.currentSlide - 1
        }, n.setProps = function(e, t, i) {
            var a = (o = e || (n.itemW + n.vars.itemMargin) * n.move * n.animatingTo, -1 * function() {
                    if (h) return "setTouch" === t ? e : d && n.animatingTo === n.last ? 0 : d ? n.limit - (n.itemW + n.vars.itemMargin) * n.move * n.animatingTo : n.animatingTo === n.last ? n.limit : o;
                    switch (t) {
                        case "setTotal":
                            return d ? (n.count - 1 - n.currentSlide + n.cloneOffset) * e : (n.currentSlide + n.cloneOffset) * e;
                        case "setTouch":
                            return e;
                        case "jumpEnd":
                            return d ? e : n.count * e;
                        case "jumpStart":
                            return d ? n.count * e : e;
                        default:
                            return e
                    }
                }() + "px"),
                o, s;
            n.transitions && (a = u ? "translate3d(0," + a + ",0)" : "translate3d(" + a + ",0,0)", i = void 0 !== i ? i / 1e3 + "s" : "0s", n.container.css("-" + n.pfx + "-transition-duration", i), n.container.css("transition-duration", i)), n.args[n.prop] = a, (n.transitions || void 0 === i) && n.container.css(n.args), n.container.css("transform", a)
        }, n.setup = function(t) {
            var i, o;
            f ? (n.slides.css({
                width: "100%",
                float: "left",
                marginRight: "-100%",
                position: "relative"
            }), "init" === t && (s ? n.slides.css({
                opacity: 0,
                display: "block",
                webkitTransition: "opacity " + n.vars.animationSpeed / 1e3 + "s ease",
                zIndex: 1
            }).eq(n.currentSlide).css({
                opacity: 1,
                zIndex: 2
            }) : 0 == n.vars.fadeFirstSlide ? n.slides.css({
                opacity: 0,
                display: "block",
                zIndex: 1
            }).eq(n.currentSlide).css({
                zIndex: 2
            }).css({
                opacity: 1
            }) : n.slides.css({
                opacity: 0,
                display: "block",
                zIndex: 1
            }).eq(n.currentSlide).css({
                zIndex: 2
            }).animate({
                opacity: 1
            }, n.vars.animationSpeed, n.vars.easing)), n.vars.smoothHeight && m.smoothHeight()) : ("init" === t && (n.viewport = e('<div class="' + a + 'viewport"></div>').css({
                overflow: "hidden",
                position: "relative"
            }).appendTo(n).append(n.container), n.cloneCount = 0, n.cloneOffset = 0, d && (o = e.makeArray(n.slides).reverse(), n.slides = e(o), n.container.empty().append(n.slides))), n.vars.animationLoop && !h && (n.cloneCount = 2, n.cloneOffset = 1, "init" !== t && n.container.find(".clone").remove(), n.container.append(m.uniqueID(n.slides.first().clone().addClass("clone")).attr("aria-hidden", "true")).prepend(m.uniqueID(n.slides.last().clone().addClass("clone")).attr("aria-hidden", "true"))), n.newSlides = e(n.vars.selector, n), i = d ? n.count - 1 - n.currentSlide + n.cloneOffset : n.currentSlide + n.cloneOffset, u && !h ? (n.container.height(200 * (n.count + n.cloneCount) + "%").css("position", "absolute").width("100%"), setTimeout((function() {
                n.newSlides.css({
                    display: "block"
                }), n.doMath(), n.viewport.height(n.h), n.setProps(i * n.h, "init")
            }), "init" === t ? 100 : 0)) : (n.container.width(200 * (n.count + n.cloneCount) + "%"), n.setProps(i * n.computedW, "init"), setTimeout((function() {
                n.doMath(), n.newSlides.css({
                    width: n.computedW,
                    float: "left",
                    display: "block"
                }), n.vars.smoothHeight && m.smoothHeight()
            }), "init" === t ? 100 : 0)));
            h || n.slides.removeClass(a + "active-slide").eq(n.currentSlide).addClass(a + "active-slide"), n.vars.init(n)
        }, n.doMath = function() {
            var e = n.slides.first(),
                t = n.vars.itemMargin,
                i = n.vars.minItems,
                a = n.vars.maxItems;
            n.w = void 0 === n.viewport ? n.width() : n.viewport.width(), n.h = e.height(), n.boxPadding = e.outerWidth() - e.width(), h ? (n.itemT = n.vars.itemWidth + t, n.minW = i ? i * n.itemT : n.w, n.maxW = a ? a * n.itemT - t : n.w, n.itemW = n.minW > n.w ? (n.w - t * (i - 1)) / i : n.maxW < n.w ? (n.w - t * (a - 1)) / a : n.vars.itemWidth > n.w ? n.w : n.vars.itemWidth, n.visible = Math.floor(n.w / n.itemW), n.move = n.vars.move > 0 && n.vars.move < n.visible ? n.vars.move : n.visible, n.pagingCount = Math.ceil((n.count - n.visible) / n.move + 1), n.last = n.pagingCount - 1, n.limit = 1 === n.pagingCount ? 0 : n.vars.itemWidth > n.w ? n.itemW * (n.count - 1) + t * (n.count - 1) : (n.itemW + t) * n.count - n.w - t) : (n.itemW = n.w, n.pagingCount = n.count, n.last = n.count - 1), n.computedW = n.itemW - n.boxPadding
        }, n.update = function(e, t) {
            n.doMath(), h || (e < n.currentSlide ? n.currentSlide += 1 : e <= n.currentSlide && 0 !== e && (n.currentSlide -= 1), n.animatingTo = n.currentSlide), n.vars.controlNav && !n.manualControls && ("add" === t && !h || n.pagingCount > n.controlNav.length ? m.controlNav.update("add") : ("remove" === t && !h || n.pagingCount < n.controlNav.length) && (h && n.currentSlide > n.last && (n.currentSlide -= 1, n.animatingTo -= 1), m.controlNav.update("remove", n.last))), n.vars.directionNav && m.directionNav.update()
        }, n.addSlide = function(t, i) {
            var a = e(t);
            n.count += 1, n.last = n.count - 1, u && d ? void 0 !== i ? n.slides.eq(n.count - i).after(a) : n.container.prepend(a) : void 0 !== i ? n.slides.eq(i).before(a) : n.container.append(a), n.update(i, "add"), n.slides = e(n.vars.selector + ":not(.clone)", n), n.setup(), n.vars.added(n)
        }, n.removeSlide = function(t) {
            var i = isNaN(t) ? n.slides.index(e(t)) : t;
            n.count -= 1, n.last = n.count - 1, isNaN(t) ? e(t, n.slides).remove() : u && d ? n.slides.eq(n.last).remove() : n.slides.eq(t).remove(), n.doMath(), n.update(i, "remove"), n.slides = e(n.vars.selector + ":not(.clone)", n), n.setup(), n.vars.removed(n)
        }, m.init()
    }, e(window).blur((function(e) {
        focused = !1
    })).focus((function(e) {
        focused = !0
    })), e.flexslider.defaults = {
        namespace: "flex-",
        selector: ".slides > li",
        animation: "fade",
        easing: "swing",
        direction: "horizontal",
        reverse: !1,
        animationLoop: !0,
        smoothHeight: !1,
        startAt: 0,
        slideshow: !0,
        slideshowSpeed: 7e3,
        animationSpeed: 600,
        initDelay: 0,
        randomize: !1,
        fadeFirstSlide: !0,
        thumbCaptions: !1,
        pauseOnAction: !0,
        pauseOnHover: !1,
        pauseInvisible: !0,
        useCSS: !0,
        touch: !0,
        video: !1,
        controlNav: !0,
        directionNav: !0,
        prevText: "Previous",
        nextText: "Next",
        keyboard: !0,
        multipleKeyboard: !1,
        mousewheel: !1,
        pausePlay: !1,
        pauseText: "Pause",
        playText: "Play",
        controlsContainer: "",
        manualControls: "",
        customDirectionNav: "",
        sync: "",
        asNavFor: "",
        itemWidth: 0,
        itemMargin: 0,
        minItems: 1,
        maxItems: 0,
        move: 0,
        allowOneSlide: !0,
        start: function() {},
        before: function() {},
        after: function() {},
        end: function() {},
        added: function() {},
        removed: function() {},
        init: function() {}
    }, e.fn.flexslider = function(t) {
        if (void 0 === t && (t = {}), "object" == typeof t) return this.each((function() {
            var i = e(this),
                n = t.selector ? t.selector : ".slides > li",
                a = i.find(n);
            1 === a.length && !0 === t.allowOneSlide || 0 === a.length ? (a.fadeIn(400), t.start && t.start(i)) : void 0 === i.data("flexslider") && new e.flexslider(this, t)
        }));
        var i = e(this).data("flexslider");
        switch (t) {
            case "play":
                i.play();
                break;
            case "pause":
                i.pause();
                break;
            case "stop":
                i.stop();
                break;
            case "next":
                i.flexAnimate(i.getTarget("next"), !0);
                break;
            case "prev":
            case "previous":
                i.flexAnimate(i.getTarget("prev"), !0);
                break;
            default:
                "number" == typeof t && i.flexAnimate(t, !0)
        }
    }
}(jQuery), /*! fancyBox v2.1.5 fancyapps.com | fancyapps.com/fancybox/#license */
function(e, t, i, n) {
    var a = i("html"),
        o = i(e),
        s = i(t),
        r = i.fancybox = function() {
            r.open.apply(this, arguments)
        },
        l = navigator.userAgent.match(/msie/i),
        c = null,
        u = t.createTouch !== n,
        d = function(e) {
            return e && e.hasOwnProperty && e instanceof i
        },
        h = function(e) {
            return e && "string" === i.type(e)
        },
        f = function(e) {
            return h(e) && 0 < e.indexOf("%")
        },
        p = function(e, t) {
            var i = parseInt(e, 10) || 0;
            return t && f(e) && (i *= r.getViewport()[t] / 100), Math.ceil(i)
        },
        m = function(e, t) {
            return p(e, t) + "px"
        };
    i.extend(r, {
        version: "2.1.5",
        defaults: {
            padding: 15,
            margin: 20,
            width: 800,
            height: 600,
            minWidth: 100,
            minHeight: 100,
            maxWidth: 9999,
            maxHeight: 9999,
            pixelRatio: 1,
            autoSize: !0,
            autoHeight: !1,
            autoWidth: !1,
            autoResize: !0,
            autoCenter: !u,
            fitToView: !0,
            aspectRatio: !1,
            topRatio: .5,
            leftRatio: .5,
            scrolling: "auto",
            wrapCSS: "",
            arrows: !0,
            closeBtn: !0,
            closeClick: !1,
            nextClick: !1,
            mouseWheel: !0,
            autoPlay: !1,
            playSpeed: 3e3,
            preload: 3,
            modal: !1,
            loop: !0,
            ajax: {
                dataType: "html",
                headers: {
                    "X-fancyBox": !0
                }
            },
            iframe: {
                scrolling: "auto",
                preload: !0
            },
            swf: {
                wmode: "transparent",
                allowfullscreen: "true",
                allowscriptaccess: "always"
            },
            keys: {
                next: {
                    13: "left",
                    34: "up",
                    39: "left",
                    40: "up"
                },
                prev: {
                    8: "right",
                    33: "down",
                    37: "right",
                    38: "down"
                },
                close: [27],
                play: [32],
                toggle: [70]
            },
            direction: {
                next: "left",
                prev: "right"
            },
            scrollOutside: !0,
            index: 0,
            type: null,
            href: null,
            content: null,
            title: null,
            tpl: {
                wrap: '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
                image: '<img class="fancybox-image" src="{href}" alt="" />',
                iframe: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' + (l ? ' allowtransparency="true"' : "") + "></iframe>",
                error: '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
                closeBtn: '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
                next: '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
                prev: '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
            },
            openEffect: "fade",
            openSpeed: 250,
            openEasing: "swing",
            openOpacity: !0,
            openMethod: "zoomIn",
            closeEffect: "fade",
            closeSpeed: 250,
            closeEasing: "swing",
            closeOpacity: !0,
            closeMethod: "zoomOut",
            nextEffect: "elastic",
            nextSpeed: 250,
            nextEasing: "swing",
            nextMethod: "changeIn",
            prevEffect: "elastic",
            prevSpeed: 250,
            prevEasing: "swing",
            prevMethod: "changeOut",
            helpers: {
                overlay: !0,
                title: !0
            },
            onCancel: i.noop,
            beforeLoad: i.noop,
            afterLoad: i.noop,
            beforeShow: i.noop,
            afterShow: i.noop,
            beforeChange: i.noop,
            beforeClose: i.noop,
            afterClose: i.noop
        },
        group: {},
        opts: {},
        previous: null,
        coming: null,
        current: null,
        isActive: !1,
        isOpen: !1,
        isOpened: !1,
        wrap: null,
        skin: null,
        outer: null,
        inner: null,
        player: {
            timer: null,
            isActive: !1
        },
        ajaxLoad: null,
        imgPreload: null,
        transitions: {},
        helpers: {},
        open: function(e, t) {
            if (e && (i.isPlainObject(t) || (t = {}), !1 !== r.close(!0))) return i.isArray(e) || (e = d(e) ? i(e).get() : [e]), i.each(e, (function(a, o) {
                var s = {},
                    l, c, u, f, p;
                "object" === i.type(o) && (o.nodeType && (o = i(o)), d(o) ? (s = {
                    href: o.data("fancybox-href") || o.attr("href"),
                    title: o.data("fancybox-title") || o.attr("title"),
                    isDom: !0,
                    element: o
                }, i.metadata && i.extend(!0, s, o.metadata())) : s = o), l = t.href || s.href || (h(o) ? o : null), c = t.title !== n ? t.title : s.title || "", !(f = (u = t.content || s.content) ? "html" : t.type || s.type) && s.isDom && ((f = o.data("fancybox-type")) || (f = (f = o.prop("class").match(/fancybox\.(\w+)/)) ? f[1] : null)), h(l) && (f || (r.isImage(l) ? f = "image" : r.isSWF(l) ? f = "swf" : "#" === l.charAt(0) ? f = "inline" : h(o) && (f = "html", u = o)), "ajax" === f && (p = l.split(/\s+/, 2), l = p.shift(), p = p.shift())), u || ("inline" === f ? l ? u = i(h(l) ? l.replace(/.*(?=#[^\s]+$)/, "") : l) : s.isDom && (u = o) : "html" === f ? u = l : !f && !l && s.isDom && (f = "inline", u = o)), i.extend(s, {
                    href: l,
                    type: f,
                    content: u,
                    title: c,
                    selector: p
                }), e[a] = s
            })), r.opts = i.extend(!0, {}, r.defaults, t), t.keys !== n && (r.opts.keys = !!t.keys && i.extend({}, r.defaults.keys, t.keys)), r.group = e, r._start(r.opts.index)
        },
        cancel: function() {
            var e = r.coming;
            e && !1 !== r.trigger("onCancel") && (r.hideLoading(), r.ajaxLoad && r.ajaxLoad.abort(), r.ajaxLoad = null, r.imgPreload && (r.imgPreload.onload = r.imgPreload.onerror = null), e.wrap && e.wrap.stop(!0, !0).trigger("onReset").remove(), r.coming = null, r.current || r._afterZoomOut(e))
        },
        close: function(e) {
            r.cancel(), !1 !== r.trigger("beforeClose") && (r.unbindEvents(), r.isActive && (r.isOpen && !0 !== e ? (r.isOpen = r.isOpened = !1, r.isClosing = !0, i(".fancybox-item, .fancybox-nav").remove(), r.wrap.stop(!0, !0).removeClass("fancybox-opened"), r.transitions[r.current.closeMethod]()) : (i(".fancybox-wrap").stop(!0).trigger("onReset").remove(), r._afterZoomOut())))
        },
        play: function(e) {
            var t = function() {
                    clearTimeout(r.player.timer)
                },
                i = function() {
                    t(), r.current && r.player.isActive && (r.player.timer = setTimeout(r.next, r.current.playSpeed))
                },
                n = function() {
                    t(), s.unbind(".player"), r.player.isActive = !1, r.trigger("onPlayEnd")
                };
            !0 === e || !r.player.isActive && !1 !== e ? r.current && (r.current.loop || r.current.index < r.group.length - 1) && (r.player.isActive = !0, s.bind({
                "onCancel.player beforeClose.player": n,
                "onUpdate.player": i,
                "beforeLoad.player": t
            }), i(), r.trigger("onPlayStart")) : n()
        },
        next: function(e) {
            var t = r.current;
            t && (h(e) || (e = t.direction.next), r.jumpto(t.index + 1, e, "next"))
        },
        prev: function(e) {
            var t = r.current;
            t && (h(e) || (e = t.direction.prev), r.jumpto(t.index - 1, e, "prev"))
        },
        jumpto: function(e, t, i) {
            var a = r.current;
            a && (e = p(e), r.direction = t || a.direction[e >= a.index ? "next" : "prev"], r.router = i || "jumpto", a.loop && (0 > e && (e = a.group.length + e % a.group.length), e %= a.group.length), a.group[e] !== n && (r.cancel(), r._start(e)))
        },
        reposition: function(e, t) {
            var n = r.current,
                a = n ? n.wrap : null,
                o;
            a && (o = r._getPosition(t), e && "scroll" === e.type ? (delete o.position, a.stop(!0, !0).animate(o, 200)) : (a.css(o), n.pos = i.extend({}, n.dim, o)))
        },
        update: function(e) {
            var t = e && e.type,
                i = !t || "orientationchange" === t;
            i && (clearTimeout(c), c = null), r.isOpen && !c && (c = setTimeout((function() {
                var n = r.current;
                n && !r.isClosing && (r.wrap.removeClass("fancybox-tmp"), (i || "load" === t || "resize" === t && n.autoResize) && r._setDimension(), "scroll" === t && n.canShrink || r.reposition(e), r.trigger("onUpdate"), c = null)
            }), i && !u ? 0 : 300))
        },
        toggle: function(e) {
            r.isOpen && (r.current.fitToView = "boolean" === i.type(e) ? e : !r.current.fitToView, u && (r.wrap.removeAttr("style").addClass("fancybox-tmp"), r.trigger("onUpdate")), r.update())
        },
        hideLoading: function() {
            s.unbind(".loading"), i("#fancybox-loading").remove()
        },
        showLoading: function() {
            var e, t;
            r.hideLoading(), e = i('<div id="fancybox-loading"><div></div></div>').click(r.cancel).appendTo("body"), s.bind("keydown.loading", (function(e) {
                27 === (e.which || e.keyCode) && (e.preventDefault(), r.cancel())
            })), r.defaults.fixed || (t = r.getViewport(), e.css({
                position: "absolute",
                top: .5 * t.h + t.y,
                left: .5 * t.w + t.x
            }))
        },
        getViewport: function() {
            var t = r.current && r.current.locked || !1,
                i = {
                    x: o.scrollLeft(),
                    y: o.scrollTop()
                };
            return t ? (i.w = t[0].clientWidth, i.h = t[0].clientHeight) : (i.w = u && e.innerWidth ? e.innerWidth : o.width(), i.h = u && e.innerHeight ? e.innerHeight : o.height()), i
        },
        unbindEvents: function() {
            r.wrap && d(r.wrap) && r.wrap.unbind(".fb"), s.unbind(".fb"), o.unbind(".fb")
        },
        bindEvents: function() {
            var e = r.current,
                t;
            e && (o.bind("orientationchange.fb" + (u ? "" : " resize.fb") + (e.autoCenter && !e.locked ? " scroll.fb" : ""), r.update), (t = e.keys) && s.bind("keydown.fb", (function(a) {
                var o = a.which || a.keyCode,
                    s = a.target || a.srcElement;
                if (27 === o && r.coming) return !1;
                !a.ctrlKey && !a.altKey && !a.shiftKey && !a.metaKey && (!s || !s.type && !i(s).is("[contenteditable]")) && i.each(t, (function(t, s) {
                    return 1 < e.group.length && s[o] !== n ? (r[t](s[o]), a.preventDefault(), !1) : -1 < i.inArray(o, s) ? (r[t](), a.preventDefault(), !1) : void 0
                }))
            })), i.fn.mousewheel && e.mouseWheel && r.wrap.bind("mousewheel.fb", (function(t, n, a, o) {
                for (var s = i(t.target || null), l = !1; s.length && !l && !s.is(".fancybox-skin") && !s.is(".fancybox-wrap");) l = s[0] && !(s[0].style.overflow && "hidden" === s[0].style.overflow) && (s[0].clientWidth && s[0].scrollWidth > s[0].clientWidth || s[0].clientHeight && s[0].scrollHeight > s[0].clientHeight), s = i(s).parent();
                0 !== n && !l && 1 < r.group.length && !e.canShrink && (0 < o || 0 < a ? r.prev(0 < o ? "down" : "left") : (0 > o || 0 > a) && r.next(0 > o ? "up" : "right"), t.preventDefault())
            })))
        },
        trigger: function(e, t) {
            var n, a = t || r.coming || r.current;
            if (a) {
                if (i.isFunction(a[e]) && (n = a[e].apply(a, Array.prototype.slice.call(arguments, 1))), !1 === n) return !1;
                a.helpers && i.each(a.helpers, (function(t, n) {
                    n && r.helpers[t] && i.isFunction(r.helpers[t][e]) && r.helpers[t][e](i.extend(!0, {}, r.helpers[t].defaults, n), a)
                })), s.trigger(e)
            }
        },
        isImage: function(e) {
            return h(e) && e.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)
        },
        isSWF: function(e) {
            return h(e) && e.match(/\.(swf)((\?|#).*)?$/i)
        },
        _start: function(e) {
            var t = {},
                n, a;
            if (e = p(e), !(n = r.group[e] || null)) return !1;
            if (n = (t = i.extend(!0, {}, r.opts, n)).margin, a = t.padding, "number" === i.type(n) && (t.margin = [n, n, n, n]), "number" === i.type(a) && (t.padding = [a, a, a, a]), t.modal && i.extend(!0, t, {
                    closeBtn: !1,
                    closeClick: !1,
                    nextClick: !1,
                    arrows: !1,
                    mouseWheel: !1,
                    keys: null,
                    helpers: {
                        overlay: {
                            closeClick: !1
                        }
                    }
                }), t.autoSize && (t.autoWidth = t.autoHeight = !0), "auto" === t.width && (t.autoWidth = !0), "auto" === t.height && (t.autoHeight = !0), t.group = r.group, t.index = e, r.coming = t, !1 === r.trigger("beforeLoad")) r.coming = null;
            else {
                if (a = t.type, n = t.href, !a) return r.coming = null, !(!r.current || !r.router || "jumpto" === r.router) && (r.current.index = e, r[r.router](r.direction));
                if (r.isActive = !0, "image" !== a && "swf" !== a || (t.autoHeight = t.autoWidth = !1, t.scrolling = "visible"), "image" === a && (t.aspectRatio = !0), "iframe" === a && u && (t.scrolling = "scroll"), t.wrap = i(t.tpl.wrap).addClass("fancybox-" + (u ? "mobile" : "desktop") + " fancybox-type-" + a + " fancybox-tmp " + t.wrapCSS).appendTo(t.parent || "body"), i.extend(t, {
                        skin: i(".fancybox-skin", t.wrap),
                        outer: i(".fancybox-outer", t.wrap),
                        inner: i(".fancybox-inner", t.wrap)
                    }), i.each(["Top", "Right", "Bottom", "Left"], (function(e, i) {
                        t.skin.css("padding" + i, m(t.padding[e]))
                    })), r.trigger("onReady"), "inline" === a || "html" === a) {
                    if (!t.content || !t.content.length) return r._error("content")
                } else if (!n) return r._error("href");
                "image" === a ? r._loadImage() : "ajax" === a ? r._loadAjax() : "iframe" === a ? r._loadIframe() : r._afterLoad()
            }
        },
        _error: function(e) {
            i.extend(r.coming, {
                type: "html",
                autoWidth: !0,
                autoHeight: !0,
                minWidth: 0,
                minHeight: 0,
                scrolling: "no",
                hasError: e,
                content: r.coming.tpl.error
            }), r._afterLoad()
        },
        _loadImage: function() {
            var e = r.imgPreload = new Image;
            e.onload = function() {
                this.onload = this.onerror = null, r.coming.width = this.width / r.opts.pixelRatio, r.coming.height = this.height / r.opts.pixelRatio, r._afterLoad()
            }, e.onerror = function() {
                this.onload = this.onerror = null, r._error("image")
            }, e.src = r.coming.href, !0 !== e.complete && r.showLoading()
        },
        _loadAjax: function() {
            var e = r.coming;
            r.showLoading(), r.ajaxLoad = i.ajax(i.extend({}, e.ajax, {
                url: e.href,
                error: function(e, t) {
                    r.coming && "abort" !== t ? r._error("ajax", e) : r.hideLoading()
                },
                success: function(t, i) {
                    "success" === i && (e.content = t, r._afterLoad())
                }
            }))
        },
        _loadIframe: function() {
            var e = r.coming,
                t = i(e.tpl.iframe.replace(/\{rnd\}/g, (new Date).getTime())).attr("scrolling", u ? "auto" : e.iframe.scrolling).attr("src", e.href);
            i(e.wrap).bind("onReset", (function() {
                try {
                    i(this).find("iframe").hide().attr("src", "//about:blank").end().empty()
                } catch (e) {}
            })), e.iframe.preload && (r.showLoading(), t.one("load", (function() {
                i(this).data("ready", 1), u || i(this).bind("load.fb", r.update), i(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show(), r._afterLoad()
            }))), e.content = t.appendTo(e.inner), e.iframe.preload || r._afterLoad()
        },
        _preloadImages: function() {
            var e = r.group,
                t = r.current,
                i = e.length,
                n = t.preload ? Math.min(t.preload, i - 1) : 0,
                a, o;
            for (o = 1; o <= n; o += 1) "image" === (a = e[(t.index + o) % i]).type && a.href && ((new Image).src = a.href)
        },
        _afterLoad: function() {
            var e = r.coming,
                t = r.current,
                n, a, o, s, l;
            if (r.hideLoading(), e && !1 !== r.isActive)
                if (!1 === r.trigger("afterLoad", e, t)) e.wrap.stop(!0).trigger("onReset").remove(), r.coming = null;
                else {
                    switch (t && (r.trigger("beforeChange", t), t.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove()), r.unbindEvents(), n = e.content, a = e.type, o = e.scrolling, i.extend(r, {
                            wrap: e.wrap,
                            skin: e.skin,
                            outer: e.outer,
                            inner: e.inner,
                            current: e,
                            previous: t
                        }), s = e.href, a) {
                        case "inline":
                        case "ajax":
                        case "html":
                            e.selector ? n = i("<div>").html(n).find(e.selector) : d(n) && (n.data("fancybox-placeholder") || n.data("fancybox-placeholder", i('<div class="fancybox-placeholder"></div>').insertAfter(n).hide()), n = n.show().detach(), e.wrap.bind("onReset", (function() {
                                i(this).find(n).length && n.hide().replaceAll(n.data("fancybox-placeholder")).data("fancybox-placeholder", !1)
                            })));
                            break;
                        case "image":
                            n = e.tpl.image.replace("{href}", s);
                            break;
                        case "swf":
                            n = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + s + '"></param>', l = "", i.each(e.swf, (function(e, t) {
                                n += '<param name="' + e + '" value="' + t + '"></param>', l += " " + e + '="' + t + '"'
                            })), n += '<embed src="' + s + '" type="application/x-shockwave-flash" width="100%" height="100%"' + l + "></embed></object>"
                    }(!d(n) || !n.parent().is(e.inner)) && e.inner.append(n), r.trigger("beforeShow"), e.inner.css("overflow", "yes" === o ? "scroll" : "no" === o ? "hidden" : o), r._setDimension(), r.reposition(), r.isOpen = !1, r.coming = null, r.bindEvents(), r.isOpened ? t.prevMethod && r.transitions[t.prevMethod]() : i(".fancybox-wrap").not(e.wrap).stop(!0).trigger("onReset").remove(), r.transitions[r.isOpened ? e.nextMethod : e.openMethod](), r._preloadImages()
                }
        },
        _setDimension: function() {
            var e = r.getViewport(),
                t = 0,
                n = !1,
                a = !1,
                n = r.wrap,
                o = r.skin,
                s = r.inner,
                l = r.current,
                a = l.width,
                c = l.height,
                u = l.minWidth,
                d = l.minHeight,
                h = l.maxWidth,
                v = l.maxHeight,
                g = l.scrolling,
                y = l.scrollOutside ? l.scrollbarWidth : 0,
                w = l.margin,
                b = p(w[1] + w[3]),
                _ = p(w[0] + w[2]),
                x, C, k, $, S, T, z, O, M;
            if (n.add(o).add(s).width("auto").height("auto").removeClass("fancybox-tmp"), C = b + (w = p(o.outerWidth(!0) - o.width())), k = _ + (x = p(o.outerHeight(!0) - o.height())), $ = f(a) ? (e.w - C) * p(a) / 100 : a, S = f(c) ? (e.h - k) * p(c) / 100 : c, "iframe" === l.type) {
                if (M = l.content, l.autoHeight && 1 === M.data("ready")) try {
                    M[0].contentWindow.document.location && (s.width($).height(9999), T = M.contents().find("body"), y && T.css("overflow-x", "hidden"), S = T.outerHeight(!0))
                } catch (e) {}
            } else(l.autoWidth || l.autoHeight) && (s.addClass("fancybox-tmp"), l.autoWidth || s.width($), l.autoHeight || s.height(S), l.autoWidth && ($ = s.width()), l.autoHeight && (S = s.height()), s.removeClass("fancybox-tmp"));
            if (a = p($), c = p(S), O = $ / S, u = p(f(u) ? p(u, "w") - C : u), h = p(f(h) ? p(h, "w") - C : h), d = p(f(d) ? p(d, "h") - k : d), T = h, z = v = p(f(v) ? p(v, "h") - k : v), l.fitToView && (h = Math.min(e.w - C, h), v = Math.min(e.h - k, v)), C = e.w - b, _ = e.h - _, l.aspectRatio ? (a > h && (c = p((a = h) / O)), c > v && (a = p((c = v) * O)), a < u && (c = p((a = u) / O)), c < d && (a = p((c = d) * O))) : (a = Math.max(u, Math.min(a, h)), l.autoHeight && "iframe" !== l.type && (s.width(a), c = s.height()), c = Math.max(d, Math.min(c, v))), l.fitToView)
                if (s.width(a).height(c), n.width(a + w), e = n.width(), b = n.height(), l.aspectRatio)
                    for (;
                        (e > C || b > _) && a > u && c > d && !(19 < t++);) c = Math.max(d, Math.min(v, c - 10)), (a = p(c * O)) < u && (c = p((a = u) / O)), a > h && (c = p((a = h) / O)), s.width(a).height(c), n.width(a + w), e = n.width(), b = n.height();
                else a = Math.max(u, Math.min(a, a - (e - C))), c = Math.max(d, Math.min(c, c - (b - _)));
            y && "auto" === g && c < S && a + w + y < C && (a += y), s.width(a).height(c), n.width(a + w), e = n.width(), b = n.height(), n = (e > C || b > _) && a > u && c > d, a = l.aspectRatio ? a < T && c < z && a < $ && c < S : (a < T || c < z) && (a < $ || c < S), i.extend(l, {
                dim: {
                    width: m(e),
                    height: m(b)
                },
                origWidth: $,
                origHeight: S,
                canShrink: n,
                canExpand: a,
                wPadding: w,
                hPadding: x,
                wrapSpace: b - o.outerHeight(!0),
                skinSpace: o.height() - c
            }), !M && l.autoHeight && c > d && c < v && !a && s.height("auto")
        },
        _getPosition: function(e) {
            var t = r.current,
                i = r.getViewport(),
                n = t.margin,
                a = r.wrap.width() + n[1] + n[3],
                o = r.wrap.height() + n[0] + n[2],
                n = {
                    position: "absolute",
                    top: n[0],
                    left: n[3]
                };
            return t.autoCenter && t.fixed && !e && o <= i.h && a <= i.w ? n.position = "fixed" : t.locked || (n.top += i.y, n.left += i.x), n.top = m(Math.max(n.top, n.top + (i.h - o) * t.topRatio)), n.left = m(Math.max(n.left, n.left + (i.w - a) * t.leftRatio)), n
        },
        _afterZoomIn: function() {
            var e = r.current;
            e && (r.isOpen = r.isOpened = !0, r.wrap.css("overflow", "visible").addClass("fancybox-opened"), r.update(), (e.closeClick || e.nextClick && 1 < r.group.length) && r.inner.css("cursor", "pointer").bind("click.fb", (function(t) {
                !i(t.target).is("a") && !i(t.target).parent().is("a") && (t.preventDefault(), r[e.closeClick ? "close" : "next"]())
            })), e.closeBtn && i(e.tpl.closeBtn).appendTo(r.skin).bind("click.fb", (function(e) {
                e.preventDefault(), r.close()
            })), e.arrows && 1 < r.group.length && ((e.loop || 0 < e.index) && i(e.tpl.prev).appendTo(r.outer).bind("click.fb", r.prev), (e.loop || e.index < r.group.length - 1) && i(e.tpl.next).appendTo(r.outer).bind("click.fb", r.next)), r.trigger("afterShow"), e.loop || e.index !== e.group.length - 1 ? r.opts.autoPlay && !r.player.isActive && (r.opts.autoPlay = !1, r.play()) : r.play(!1))
        },
        _afterZoomOut: function(e) {
            e = e || r.current, i(".fancybox-wrap").trigger("onReset").remove(), i.extend(r, {
                group: {},
                opts: {},
                router: !1,
                current: null,
                isActive: !1,
                isOpened: !1,
                isOpen: !1,
                isClosing: !1,
                wrap: null,
                skin: null,
                outer: null,
                inner: null
            }), r.trigger("afterClose", e)
        }
    }), r.transitions = {
        getOrigPosition: function() {
            var e = r.current,
                t = e.element,
                i = e.orig,
                n = {},
                a = 50,
                o = 50,
                s = e.hPadding,
                l = e.wPadding,
                c = r.getViewport();
            return !i && e.isDom && t.is(":visible") && ((i = t.find("img:first")).length || (i = t)), d(i) ? (n = i.offset(), i.is("img") && (a = i.outerWidth(), o = i.outerHeight())) : (n.top = c.y + (c.h - o) * e.topRatio, n.left = c.x + (c.w - a) * e.leftRatio), ("fixed" === r.wrap.css("position") || e.locked) && (n.top -= c.y, n.left -= c.x), n = {
                top: m(n.top - s * e.topRatio),
                left: m(n.left - l * e.leftRatio),
                width: m(a + l),
                height: m(o + s)
            }
        },
        step: function(e, t) {
            var i, n, a = t.prop,
                o = (n = r.current).wrapSpace,
                s = n.skinSpace;
            "width" !== a && "height" !== a || (i = t.end === t.start ? 1 : (e - t.start) / (t.end - t.start), r.isClosing && (i = 1 - i), n = e - (n = "width" === a ? n.wPadding : n.hPadding), r.skin[a](p("width" === a ? n : n - o * i)), r.inner[a](p("width" === a ? n : n - o * i - s * i)))
        },
        zoomIn: function() {
            var e = r.current,
                t = e.pos,
                n = e.openEffect,
                a = "elastic" === n,
                o = i.extend({
                    opacity: 1
                }, t);
            delete o.position, a ? (t = this.getOrigPosition(), e.openOpacity && (t.opacity = .1)) : "fade" === n && (t.opacity = .1), r.wrap.css(t).animate(o, {
                duration: "none" === n ? 0 : e.openSpeed,
                easing: e.openEasing,
                step: a ? this.step : null,
                complete: r._afterZoomIn
            })
        },
        zoomOut: function() {
            var e = r.current,
                t = e.closeEffect,
                i = "elastic" === t,
                n = {
                    opacity: .1
                };
            i && (n = this.getOrigPosition(), e.closeOpacity && (n.opacity = .1)), r.wrap.animate(n, {
                duration: "none" === t ? 0 : e.closeSpeed,
                easing: e.closeEasing,
                step: i ? this.step : null,
                complete: r._afterZoomOut
            })
        },
        changeIn: function() {
            var e = r.current,
                t = e.nextEffect,
                i = e.pos,
                n = {
                    opacity: 1
                },
                a = r.direction,
                o;
            i.opacity = .1, "elastic" === t && (o = "down" === a || "up" === a ? "top" : "left", "down" === a || "right" === a ? (i[o] = m(p(i[o]) - 200), n[o] = "+=200px") : (i[o] = m(p(i[o]) + 200), n[o] = "-=200px")), "none" === t ? r._afterZoomIn() : r.wrap.css(i).animate(n, {
                duration: e.nextSpeed,
                easing: e.nextEasing,
                complete: r._afterZoomIn
            })
        },
        changeOut: function() {
            var e = r.previous,
                t = e.prevEffect,
                n = {
                    opacity: .1
                },
                a = r.direction;
            "elastic" === t && (n["down" === a || "up" === a ? "top" : "left"] = ("up" === a || "left" === a ? "-" : "+") + "=200px"), e.wrap.animate(n, {
                duration: "none" === t ? 0 : e.prevSpeed,
                easing: e.prevEasing,
                complete: function() {
                    i(this).trigger("onReset").remove()
                }
            })
        }
    }, r.helpers.overlay = {
        defaults: {
            closeClick: !0,
            speedOut: 200,
            showEarly: !0,
            css: {},
            locked: !u,
            fixed: !0
        },
        overlay: null,
        fixed: !1,
        el: i("html"),
        create: function(e) {
            e = i.extend({}, this.defaults, e), this.overlay && this.close(), this.overlay = i('<div class="fancybox-overlay"></div>').appendTo(r.coming ? r.coming.parent : e.parent), this.fixed = !1, e.fixed && r.defaults.fixed && (this.overlay.addClass("fancybox-overlay-fixed"), this.fixed = !0)
        },
        open: function(e) {
            var t = this;
            e = i.extend({}, this.defaults, e), this.overlay ? this.overlay.unbind(".overlay").width("auto").height("auto") : this.create(e), this.fixed || (o.bind("resize.overlay", i.proxy(this.update, this)), this.update()), e.closeClick && this.overlay.bind("click.overlay", (function(e) {
                if (i(e.target).hasClass("fancybox-overlay")) return r.isActive ? r.close() : t.close(), !1
            })), this.overlay.css(e.css).show()
        },
        close: function() {
            var e, t;
            o.unbind("resize.overlay"), this.el.hasClass("fancybox-lock") && (i(".fancybox-margin").removeClass("fancybox-margin"), e = o.scrollTop(), t = o.scrollLeft(), this.el.removeClass("fancybox-lock"), o.scrollTop(e).scrollLeft(t)), i(".fancybox-overlay").remove().hide(), i.extend(this, {
                overlay: null,
                fixed: !1
            })
        },
        update: function() {
            var e = "100%",
                i;
            this.overlay.width(e).height("100%"), l ? (i = Math.max(t.documentElement.offsetWidth, t.body.offsetWidth), s.width() > i && (e = s.width())) : s.width() > o.width() && (e = s.width()), this.overlay.width(e).height(s.height())
        },
        onReady: function(e, t) {
            var n = this.overlay;
            i(".fancybox-overlay").stop(!0, !0), n || this.create(e), e.locked && this.fixed && t.fixed && (n || (this.margin = s.height() > o.height() && i("html").css("margin-right").replace("px", "")), t.locked = this.overlay.append(t.wrap), t.fixed = !1), !0 === e.showEarly && this.beforeShow.apply(this, arguments)
        },
        beforeShow: function(e, t) {
            var n, a;
            t.locked && (!1 !== this.margin && (i("*").filter((function() {
                return "fixed" === i(this).css("position") && !i(this).hasClass("fancybox-overlay") && !i(this).hasClass("fancybox-wrap")
            })).addClass("fancybox-margin"), this.el.addClass("fancybox-margin")), n = o.scrollTop(), a = o.scrollLeft(), this.el.addClass("fancybox-lock"), o.scrollTop(n).scrollLeft(a)), this.open(e)
        },
        onUpdate: function() {
            this.fixed || this.update()
        },
        afterClose: function(e) {
            this.overlay && !r.coming && this.overlay.fadeOut(e.speedOut, i.proxy(this.close, this))
        }
    }, r.helpers.title = {
        defaults: {
            type: "float",
            position: "bottom"
        },
        beforeShow: function(e) {
            var t = r.current,
                n = t.title,
                a = e.type;
            if (i.isFunction(n) && (n = n.call(t.element, t)), h(n) && "" !== i.trim(n)) {
                switch (t = i('<div class="fancybox-title fancybox-title-' + a + '-wrap">' + n + "</div>"), a) {
                    case "inside":
                        a = r.skin;
                        break;
                    case "outside":
                        a = r.wrap;
                        break;
                    case "over":
                        a = r.inner;
                        break;
                    default:
                        a = r.skin, t.appendTo("body"), l && t.width(t.width()), t.wrapInner('<span class="child"></span>'), r.current.margin[2] += Math.abs(p(t.css("margin-bottom")))
                }
                t["top" === e.position ? "prependTo" : "appendTo"](a)
            }
        }
    }, i.fn.fancybox = function(e) {
        var t, n = i(this),
            a = this.selector || "",
            o = function(o) {
                var s = i(this).blur(),
                    l = t,
                    c, u;
                !o.ctrlKey && !o.altKey && !o.shiftKey && !o.metaKey && !s.is(".fancybox-wrap") && (c = e.groupAttr || "data-fancybox-group", (u = s.attr(c)) || (c = "rel", u = s.get(0)[c]), u && "" !== u && "nofollow" !== u && (l = (s = (s = a.length ? i(a) : n).filter("[" + c + '="' + u + '"]')).index(this)), e.index = l, !1 !== r.open(s, e) && o.preventDefault())
            };
        return t = (e = e || {}).index || 0, a && !1 !== e.live ? s.undelegate(a, "click.fb-start").delegate(a + ":not('.fancybox-item, .fancybox-nav')", "click.fb-start", o) : n.unbind("click.fb-start").bind("click.fb-start", o), this.filter("[data-fancybox-start=1]").trigger("click"), this
    }, s.ready((function() {
        var t, o;
        if (i.scrollbarWidth === n && (i.scrollbarWidth = function() {
                var e = i('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),
                    t, t = (t = e.children()).innerWidth() - t.height(99).innerWidth();
                return e.remove(), t
            }), i.support.fixedPosition === n) {
            t = i.support;
            var s = 20 === (o = i('<div style="position:fixed;top:20px;"></div>').appendTo("body"))[0].offsetTop || 15 === o[0].offsetTop;
            o.remove(), t.fixedPosition = s
        }
        i.extend(r.defaults, {
            scrollbarWidth: i.scrollbarWidth(),
            fixed: i.support.fixedPosition,
            parent: i("body")
        }), t = i(e).width(), a.addClass("fancybox-lock-test"), o = i(e).width(), a.removeClass("fancybox-lock-test"), i("<style type='text/css'>.fancybox-margin{margin-right:" + (o - t) + "px;}</style>").appendTo("head")
    }))
}(window, document, jQuery),
function(e) {
    e.flexslider = function(t, i) {
        var n = e(t);
        n.vars = e.extend({}, e.flexslider.defaults, i);
        var a = n.vars.namespace,
            o = window.navigator && window.navigator.msPointerEnabled && window.MSGesture,
            s = ("ontouchstart" in window || o || window.DocumentTouch && document instanceof DocumentTouch) && n.vars.touch,
            r = "click touchend MSPointerUp keyup",
            l = "",
            c, u = "vertical" === n.vars.direction,
            d = n.vars.reverse,
            h = n.vars.itemWidth > 0,
            f = "fade" === n.vars.animation,
            p = "" !== n.vars.asNavFor,
            m = {},
            v = !0;
        e.data(t, "flexslider", n), m = {
            init: function() {
                n.animating = !1, n.currentSlide = parseInt(n.vars.startAt ? n.vars.startAt : 0, 10), isNaN(n.currentSlide) && (n.currentSlide = 0), n.animatingTo = n.currentSlide, n.atEnd = 0 === n.currentSlide || n.currentSlide === n.last, n.containerSelector = n.vars.selector.substr(0, n.vars.selector.search(" ")), n.slides = e(n.vars.selector, n), n.container = e(n.containerSelector, n), n.count = n.slides.length, n.syncExists = e(n.vars.sync).length > 0, "slide" === n.vars.animation && (n.vars.animation = "swing"), n.prop = u ? "top" : "marginLeft", n.args = {}, n.manualPause = !1, n.stopped = !1, n.started = !1, n.startTimeout = null, n.transitions = !n.vars.video && !f && n.vars.useCSS && function() {
                    var e = document.createElement("div"),
                        t = ["perspectiveProperty", "WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"];
                    for (var i in t)
                        if (void 0 !== e.style[t[i]]) return n.pfx = t[i].replace("Perspective", "").toLowerCase(), n.prop = "-" + n.pfx + "-transform", !0;
                    return !1
                }(), n.ensureAnimationEnd = "", "" !== n.vars.controlsContainer && (n.controlsContainer = e(n.vars.controlsContainer).length > 0 && e(n.vars.controlsContainer)), "" !== n.vars.manualControls && (n.manualControls = e(n.vars.manualControls).length > 0 && e(n.vars.manualControls)), "" !== n.vars.customDirectionNav && (n.customDirectionNav = 2 === e(n.vars.customDirectionNav).length && e(n.vars.customDirectionNav)), n.vars.randomize && (n.slides.sort((function() {
                    return Math.round(Math.random()) - .5
                })), n.container.empty().append(n.slides)), n.doMath(), n.setup("init"), n.vars.controlNav && m.controlNav.setup(), n.vars.directionNav && m.directionNav.setup(), n.vars.keyboard && (1 === e(n.containerSelector).length || n.vars.multipleKeyboard) && e(document).bind("keyup", (function(e) {
                    var t = e.keyCode;
                    if (!n.animating && (39 === t || 37 === t)) {
                        var i = 39 === t ? n.getTarget("next") : 37 === t && n.getTarget("prev");
                        n.flexAnimate(i, n.vars.pauseOnAction)
                    }
                })), n.vars.mousewheel && n.bind("mousewheel", (function(e, t, i, a) {
                    e.preventDefault();
                    var o = t < 0 ? n.getTarget("next") : n.getTarget("prev");
                    n.flexAnimate(o, n.vars.pauseOnAction)
                })), n.vars.pausePlay && m.pausePlay.setup(), n.vars.slideshow && n.vars.pauseInvisible && m.pauseInvisible.init(), n.vars.slideshow && (n.vars.pauseOnHover && n.hover((function() {
                    n.manualPlay || n.manualPause || n.pause()
                }), (function() {
                    n.manualPause || n.manualPlay || n.stopped || n.play()
                })), n.vars.pauseInvisible && m.pauseInvisible.isHidden() || (n.vars.initDelay > 0 ? n.startTimeout = setTimeout(n.play, n.vars.initDelay) : n.play())), p && m.asNav.setup(), s && n.vars.touch && m.touch(), (!f || f && n.vars.smoothHeight) && e(window).bind("resize orientationchange focus", m.resize), n.find("img").attr("draggable", "false"), setTimeout((function() {
                    n.vars.start(n)
                }), 200)
            },
            asNav: {
                setup: function() {
                    n.asNav = !0, n.animatingTo = Math.floor(n.currentSlide / n.move), n.currentItem = n.currentSlide, n.slides.removeClass(a + "active-slide").eq(n.currentItem).addClass(a + "active-slide"), o ? (t._slider = n, n.slides.each((function() {
                        var t = this;
                        this._gesture = new MSGesture, this._gesture.target = this, this.addEventListener("MSPointerDown", (function(e) {
                            e.preventDefault(), e.currentTarget._gesture && e.currentTarget._gesture.addPointer(e.pointerId)
                        }), !1), this.addEventListener("MSGestureTap", (function(t) {
                            t.preventDefault();
                            var i = e(this),
                                a = i.index();
                            e(n.vars.asNavFor).data("flexslider").animating || i.hasClass("active") || (n.direction = n.currentItem < a ? "next" : "prev", n.flexAnimate(a, n.vars.pauseOnAction, !1, !0, !0))
                        }))
                    }))) : n.slides.on(r, (function(t) {
                        t.preventDefault();
                        var i = e(this),
                            o = i.index(),
                            s;
                        i.offset().left - e(n).scrollLeft() <= 0 && i.hasClass(a + "active-slide") ? n.flexAnimate(n.getTarget("prev"), !0) : e(n.vars.asNavFor).data("flexslider").animating || i.hasClass(a + "active-slide") || (n.direction = n.currentItem < o ? "next" : "prev", n.flexAnimate(o, n.vars.pauseOnAction, !1, !0, !0))
                    }))
                }
            },
            controlNav: {
                setup: function() {
                    n.manualControls ? m.controlNav.setupManual() : m.controlNav.setupPaging()
                },
                setupPaging: function() {
                    var t = "thumbnails" === n.vars.controlNav ? "control-thumbs" : "control-paging",
                        i = 1,
                        o, s;
                    if (n.controlNavScaffold = e('<ol class="' + a + "control-nav " + a + t + '"></ol>'), n.pagingCount > 1)
                        for (var c = 0; c < n.pagingCount; c++) {
                            if (s = n.slides.eq(c), o = "thumbnails" === n.vars.controlNav ? '<img src="' + s.attr("data-thumb") + '"/>' : "<a>" + i + "</a>", "thumbnails" === n.vars.controlNav && !0 === n.vars.thumbCaptions) {
                                var u = s.attr("data-thumbcaption");
                                "" !== u && void 0 !== u && (o += '<span class="' + a + 'caption">' + u + "</span>")
                            }
                            n.controlNavScaffold.append("<li>" + o + "</li>"), i++
                        }
                    n.controlsContainer ? e(n.controlsContainer).append(n.controlNavScaffold) : n.append(n.controlNavScaffold), m.controlNav.set(), m.controlNav.active(), n.controlNavScaffold.delegate("a, img", r, (function(t) {
                        if (t.preventDefault(), "" === l || l === t.type) {
                            var i = e(this),
                                o = n.controlNav.index(i);
                            i.hasClass(a + "active") || (n.direction = o > n.currentSlide ? "next" : "prev", n.flexAnimate(o, n.vars.pauseOnAction))
                        }
                        "" === l && (l = t.type), m.setToClearWatchedEvent()
                    }))
                },
                setupManual: function() {
                    n.controlNav = n.manualControls, m.controlNav.active(), n.controlNav.bind(r, (function(t) {
                        if (t.preventDefault(), "" === l || l === t.type) {
                            var i = e(this),
                                o = n.controlNav.index(i);
                            i.hasClass(a + "active") || (o > n.currentSlide ? n.direction = "next" : n.direction = "prev", n.flexAnimate(o, n.vars.pauseOnAction))
                        }
                        "" === l && (l = t.type), m.setToClearWatchedEvent()
                    }))
                },
                set: function() {
                    var t = "thumbnails" === n.vars.controlNav ? "img" : "a";
                    n.controlNav = e("." + a + "control-nav li " + t, n.controlsContainer ? n.controlsContainer : n)
                },
                active: function() {
                    n.controlNav.removeClass(a + "active").eq(n.animatingTo).addClass(a + "active")
                },
                update: function(t, i) {
                    n.pagingCount > 1 && "add" === t ? n.controlNavScaffold.append(e("<li><a>" + n.count + "</a></li>")) : 1 === n.pagingCount ? n.controlNavScaffold.find("li").remove() : n.controlNav.eq(i).closest("li").remove(), m.controlNav.set(), n.pagingCount > 1 && n.pagingCount !== n.controlNav.length ? n.update(i, t) : m.controlNav.active()
                }
            },
            directionNav: {
                setup: function() {
                    var t = e('<ul class="' + a + 'direction-nav"><li class="' + a + 'nav-prev"><a class="' + a + 'prev" href="#">' + n.vars.prevText + '</a></li><li class="' + a + 'nav-next"><a class="' + a + 'next" href="#">' + n.vars.nextText + "</a></li></ul>");
                    n.customDirectionNav ? n.directionNav = n.customDirectionNav : n.controlsContainer ? (e(n.controlsContainer).append(t), n.directionNav = e("." + a + "direction-nav li a", n.controlsContainer)) : (n.append(t), n.directionNav = e("." + a + "direction-nav li a", n)), m.directionNav.update(), n.directionNav.bind(r, (function(t) {
                        var i;
                        t.preventDefault(), "" !== l && l !== t.type || (i = e(this).hasClass(a + "next") ? n.getTarget("next") : n.getTarget("prev"), n.flexAnimate(i, n.vars.pauseOnAction)), "" === l && (l = t.type), m.setToClearWatchedEvent()
                    }))
                },
                update: function() {
                    var e = a + "disabled";
                    1 === n.pagingCount ? n.directionNav.addClass(e).attr("tabindex", "-1") : n.vars.animationLoop ? n.directionNav.removeClass(e).removeAttr("tabindex") : 0 === n.animatingTo ? n.directionNav.removeClass(e).filter("." + a + "prev").addClass(e).attr("tabindex", "-1") : n.animatingTo === n.last ? n.directionNav.removeClass(e).filter("." + a + "next").addClass(e).attr("tabindex", "-1") : n.directionNav.removeClass(e).removeAttr("tabindex")
                }
            },
            pausePlay: {
                setup: function() {
                    var t = e('<div class="' + a + 'pauseplay"><a></a></div>');
                    n.controlsContainer ? (n.controlsContainer.append(t), n.pausePlay = e("." + a + "pauseplay a", n.controlsContainer)) : (n.append(t), n.pausePlay = e("." + a + "pauseplay a", n)), m.pausePlay.update(n.vars.slideshow ? a + "pause" : a + "play"), n.pausePlay.bind(r, (function(t) {
                        t.preventDefault(), "" !== l && l !== t.type || (e(this).hasClass(a + "pause") ? (n.manualPause = !0, n.manualPlay = !1, n.pause()) : (n.manualPause = !1, n.manualPlay = !0, n.play())), "" === l && (l = t.type), m.setToClearWatchedEvent()
                    }))
                },
                update: function(e) {
                    "play" === e ? n.pausePlay.removeClass(a + "pause").addClass(a + "play").html(n.vars.playText) : n.pausePlay.removeClass(a + "play").addClass(a + "pause").html(n.vars.pauseText)
                }
            },
            touch: function() {
                var e, i, a, s, r, l, c, p, m, v = !1,
                    g = 0,
                    y = 0,
                    w = 0;
                if (o) {
                    function b(e) {
                        e.stopPropagation(), n.animating ? e.preventDefault() : (n.pause(), t._gesture.addPointer(e.pointerId), w = 0, s = u ? n.h : n.w, l = Number(new Date), a = h && d && n.animatingTo === n.last ? 0 : h && d ? n.limit - (n.itemW + n.vars.itemMargin) * n.move * n.animatingTo : h && n.currentSlide === n.last ? n.limit : h ? (n.itemW + n.vars.itemMargin) * n.move * n.currentSlide : d ? (n.last - n.currentSlide + n.cloneOffset) * s : (n.currentSlide + n.cloneOffset) * s)
                    }

                    function _(e) {
                        e.stopPropagation();
                        var i = e.target._slider;
                        if (i) {
                            var n = -e.translationX,
                                o = -e.translationY;
                            r = w += u ? o : n, v = u ? Math.abs(w) < Math.abs(-n) : Math.abs(w) < Math.abs(-o), e.detail !== e.MSGESTURE_FLAG_INERTIA ? (!v || Number(new Date) - l > 500) && (e.preventDefault(), !f && i.transitions && (i.vars.animationLoop || (r = w / (0 === i.currentSlide && w < 0 || i.currentSlide === i.last && w > 0 ? Math.abs(w) / s + 2 : 1)), i.setProps(a + r, "setTouch"))) : setImmediate((function() {
                                t._gesture.stop()
                            }))
                        }
                    }

                    function x(t) {
                        t.stopPropagation();
                        var n = t.target._slider;
                        if (n) {
                            if (n.animatingTo === n.currentSlide && !v && null !== r) {
                                var o = d ? -r : r,
                                    c = o > 0 ? n.getTarget("next") : n.getTarget("prev");
                                n.canAdvance(c) && (Number(new Date) - l < 550 && Math.abs(o) > 50 || Math.abs(o) > s / 2) ? n.flexAnimate(c, n.vars.pauseOnAction) : f || n.flexAnimate(n.currentSlide, n.vars.pauseOnAction, !0)
                            }
                            e = null, i = null, r = null, a = null, w = 0
                        }
                    }
                    t.style.msTouchAction = "none", t._gesture = new MSGesture, t._gesture.target = t, t.addEventListener("MSPointerDown", b, !1), t._slider = n, t.addEventListener("MSGestureChange", _, !1), t.addEventListener("MSGestureEnd", x, !1)
                } else c = function(o) {
                    n.animating ? o.preventDefault() : (window.navigator.msPointerEnabled || 1 === o.touches.length) && (n.pause(), s = u ? n.h : n.w, l = Number(new Date), g = o.touches[0].pageX, y = o.touches[0].pageY, a = h && d && n.animatingTo === n.last ? 0 : h && d ? n.limit - (n.itemW + n.vars.itemMargin) * n.move * n.animatingTo : h && n.currentSlide === n.last ? n.limit : h ? (n.itemW + n.vars.itemMargin) * n.move * n.currentSlide : d ? (n.last - n.currentSlide + n.cloneOffset) * s : (n.currentSlide + n.cloneOffset) * s, e = u ? y : g, i = u ? g : y, t.addEventListener("touchmove", p, !1), t.addEventListener("touchend", m, !1))
                }, p = function(t) {
                    g = t.touches[0].pageX, y = t.touches[0].pageY, r = u ? e - y : e - g;
                    var o = 500;
                    (!(v = u ? Math.abs(r) < Math.abs(g - i) : Math.abs(r) < Math.abs(y - i)) || Number(new Date) - l > 500) && (t.preventDefault(), !f && n.transitions && (n.vars.animationLoop || (r /= 0 === n.currentSlide && r < 0 || n.currentSlide === n.last && r > 0 ? Math.abs(r) / s + 2 : 1), n.setProps(a + r, "setTouch")))
                }, m = function(o) {
                    if (t.removeEventListener("touchmove", p, !1), n.animatingTo === n.currentSlide && !v && null !== r) {
                        var c = d ? -r : r,
                            u = c > 0 ? n.getTarget("next") : n.getTarget("prev");
                        n.canAdvance(u) && (Number(new Date) - l < 550 && Math.abs(c) > 50 || Math.abs(c) > s / 2) ? n.flexAnimate(u, n.vars.pauseOnAction) : f || n.flexAnimate(n.currentSlide, n.vars.pauseOnAction, !0)
                    }
                    t.removeEventListener("touchend", m, !1), e = null, i = null, r = null, a = null
                }, t.addEventListener("touchstart", c, !1)
            },
            resize: function() {
                !n.animating && n.is(":visible") && (h || n.doMath(), f ? m.smoothHeight() : h ? (n.slides.width(n.computedW), n.update(n.pagingCount), n.setProps()) : u ? (n.viewport.height(n.h), n.setProps(n.h, "setTotal")) : (n.vars.smoothHeight && m.smoothHeight(), n.newSlides.width(n.computedW), n.setProps(n.computedW, "setTotal")))
            },
            smoothHeight: function(e) {
                if (!u || f) {
                    var t = f ? n : n.viewport;
                    e ? t.animate({
                        height: n.slides.eq(n.animatingTo).height()
                    }, e) : t.height(n.slides.eq(n.animatingTo).height())
                }
            },
            sync: function(t) {
                var i = e(n.vars.sync).data("flexslider"),
                    a = n.animatingTo;
                switch (t) {
                    case "animate":
                        i.flexAnimate(a, n.vars.pauseOnAction, !1, !0);
                        break;
                    case "play":
                        i.playing || i.asNav || i.play();
                        break;
                    case "pause":
                        i.pause();
                        break
                }
            },
            uniqueID: function(t) {
                return t.filter("[id]").add(t.find("[id]")).each((function() {
                    var t = e(this);
                    t.attr("id", t.attr("id") + "_clone")
                })), t
            },
            pauseInvisible: {
                visProp: null,
                init: function() {
                    var e = m.pauseInvisible.getHiddenProp();
                    if (e) {
                        var t = e.replace(/[H|h]idden/, "") + "visibilitychange";
                        document.addEventListener(t, (function() {
                            m.pauseInvisible.isHidden() ? n.startTimeout ? clearTimeout(n.startTimeout) : n.pause() : n.started ? n.play() : n.vars.initDelay > 0 ? setTimeout(n.play, n.vars.initDelay) : n.play()
                        }))
                    }
                },
                isHidden: function() {
                    var e = m.pauseInvisible.getHiddenProp();
                    return !!e && document[e]
                },
                getHiddenProp: function() {
                    var e = ["webkit", "moz", "ms", "o"];
                    if ("hidden" in document) return "hidden";
                    for (var t = 0; t < e.length; t++)
                        if (e[t] + "Hidden" in document) return e[t] + "Hidden";
                    return null
                }
            },
            setToClearWatchedEvent: function() {
                clearTimeout(c), c = setTimeout((function() {
                    l = ""
                }), 3e3)
            }
        }, n.flexAnimate = function(t, i, o, r, l) {
            if (n.vars.animationLoop || t === n.currentSlide || (n.direction = t > n.currentSlide ? "next" : "prev"), p && 1 === n.pagingCount && (n.direction = n.currentItem < t ? "next" : "prev"), !n.animating && (n.canAdvance(t, l) || o) && n.is(":visible")) {
                if (p && r) {
                    var c = e(n.vars.asNavFor).data("flexslider");
                    if (n.atEnd = 0 === t || t === n.count - 1, c.flexAnimate(t, !0, !1, !0, l), n.direction = n.currentItem < t ? "next" : "prev", c.direction = n.direction, Math.ceil((t + 1) / n.visible) - 1 === n.currentSlide || 0 === t) return n.currentItem = t, n.slides.removeClass(a + "active-slide").eq(t).addClass(a + "active-slide"), !1;
                    n.currentItem = t, n.slides.removeClass(a + "active-slide").eq(t).addClass(a + "active-slide"), t = Math.floor(t / n.visible)
                }
                if (n.animating = !0, n.animatingTo = t, i && n.pause(), n.vars.before(n), n.syncExists && !l && m.sync("animate"), n.vars.controlNav && m.controlNav.active(), h || n.slides.removeClass(a + "active-slide").eq(t).addClass(a + "active-slide"), n.atEnd = 0 === t || t === n.last, n.vars.directionNav && m.directionNav.update(), t === n.last && (n.vars.end(n), n.vars.animationLoop || n.pause()), f) s ? (n.slides.eq(n.currentSlide).css({
                    opacity: 0,
                    zIndex: 1
                }), n.slides.eq(t).css({
                    opacity: 1,
                    zIndex: 2
                }), n.wrapup(v)) : (n.slides.eq(n.currentSlide).css({
                    zIndex: 1
                }).animate({
                    opacity: 0
                }, n.vars.animationSpeed, n.vars.easing), n.slides.eq(t).css({
                    zIndex: 2
                }).animate({
                    opacity: 1
                }, n.vars.animationSpeed, n.vars.easing, n.wrapup));
                else {
                    var v = u ? n.slides.filter(":first").height() : n.computedW,
                        g, y, w;
                    h ? (g = n.vars.itemMargin, y = (w = (n.itemW + g) * n.move * n.animatingTo) > n.limit && 1 !== n.visible ? n.limit : w) : y = 0 === n.currentSlide && t === n.count - 1 && n.vars.animationLoop && "next" !== n.direction ? d ? (n.count + n.cloneOffset) * v : 0 : n.currentSlide === n.last && 0 === t && n.vars.animationLoop && "prev" !== n.direction ? d ? 0 : (n.count + 1) * v : d ? (n.count - 1 - t + n.cloneOffset) * v : (t + n.cloneOffset) * v, n.setProps(y, "", n.vars.animationSpeed), n.transitions ? (n.vars.animationLoop && n.atEnd || (n.animating = !1, n.currentSlide = n.animatingTo), n.container.unbind("webkitTransitionEnd transitionend"), n.container.bind("webkitTransitionEnd transitionend", (function() {
                        clearTimeout(n.ensureAnimationEnd), n.wrapup(v)
                    })), clearTimeout(n.ensureAnimationEnd), n.ensureAnimationEnd = setTimeout((function() {
                        n.wrapup(v)
                    }), n.vars.animationSpeed + 100)) : n.container.animate(n.args, n.vars.animationSpeed, n.vars.easing, (function() {
                        n.wrapup(v)
                    }))
                }
                n.vars.smoothHeight && m.smoothHeight(n.vars.animationSpeed)
            }
        }, n.wrapup = function(e) {
            f || h || (0 === n.currentSlide && n.animatingTo === n.last && n.vars.animationLoop ? n.setProps(e, "jumpEnd") : n.currentSlide === n.last && 0 === n.animatingTo && n.vars.animationLoop && n.setProps(e, "jumpStart")), n.animating = !1, n.currentSlide = n.animatingTo, n.vars.after(n)
        }, n.animateSlides = function() {
            n.animating || n.flexAnimate(n.getTarget("next"))
        }, n.pause = function() {
            clearInterval(n.animatedSlides), n.animatedSlides = null, n.playing = !1, n.vars.pausePlay && m.pausePlay.update("play"), n.syncExists && m.sync("pause")
        }, n.play = function() {
            n.playing && clearInterval(n.animatedSlides), n.animatedSlides = n.animatedSlides || setInterval(n.animateSlides, n.vars.slideshowSpeed), n.started = n.playing = !0, n.vars.pausePlay && m.pausePlay.update("pause"), n.syncExists && m.sync("play")
        }, n.stop = function() {
            n.pause(), n.stopped = !0
        }, n.canAdvance = function(e, t) {
            var i = p ? n.pagingCount - 1 : n.last;
            return !!t || (!(!p || n.currentItem !== n.count - 1 || 0 !== e || "prev" !== n.direction) || (!p || 0 !== n.currentItem || e !== n.pagingCount - 1 || "next" === n.direction) && (!(e === n.currentSlide && !p) && (!!n.vars.animationLoop || (!n.atEnd || 0 !== n.currentSlide || e !== i || "next" === n.direction) && (!n.atEnd || n.currentSlide !== i || 0 !== e || "next" !== n.direction))))
        }, n.getTarget = function(e) {
            return n.direction = e, "next" === e ? n.currentSlide === n.last ? 0 : n.currentSlide + 1 : 0 === n.currentSlide ? n.last : n.currentSlide - 1
        }, n.setProps = function(e, t, i) {
            var a = (o = e || (n.itemW + n.vars.itemMargin) * n.move * n.animatingTo, -1 * function() {
                    if (h) return "setTouch" === t ? e : d && n.animatingTo === n.last ? 0 : d ? n.limit - (n.itemW + n.vars.itemMargin) * n.move * n.animatingTo : n.animatingTo === n.last ? n.limit : o;
                    switch (t) {
                        case "setTotal":
                            return d ? (n.count - 1 - n.currentSlide + n.cloneOffset) * e : (n.currentSlide + n.cloneOffset) * e;
                        case "setTouch":
                            return e;
                        case "jumpEnd":
                            return d ? e : n.count * e;
                        case "jumpStart":
                            return d ? n.count * e : e;
                        default:
                            return e
                    }
                }() + "px"),
                o, s;
            n.transitions && (a = u ? "translate3d(0," + a + ",0)" : "translate3d(" + a + ",0,0)", i = void 0 !== i ? i / 1e3 + "s" : "0s", n.container.css("-" + n.pfx + "-transition-duration", i), n.container.css("transition-duration", i)), n.args[n.prop] = a, (n.transitions || void 0 === i) && n.container.css(n.args), n.container.css("transform", a)
        }, n.setup = function(t) {
            var i, o;
            f ? (n.slides.css({
                width: "100%",
                float: "left",
                marginRight: "-100%",
                position: "relative"
            }), "init" === t && (s ? n.slides.css({
                opacity: 0,
                display: "block",
                webkitTransition: "opacity " + n.vars.animationSpeed / 1e3 + "s ease",
                zIndex: 1
            }).eq(n.currentSlide).css({
                opacity: 1,
                zIndex: 2
            }) : 0 == n.vars.fadeFirstSlide ? n.slides.css({
                opacity: 0,
                display: "block",
                zIndex: 1
            }).eq(n.currentSlide).css({
                zIndex: 2
            }).css({
                opacity: 1
            }) : n.slides.css({
                opacity: 0,
                display: "block",
                zIndex: 1
            }).eq(n.currentSlide).css({
                zIndex: 2
            }).animate({
                opacity: 1
            }, n.vars.animationSpeed, n.vars.easing)), n.vars.smoothHeight && m.smoothHeight()) : ("init" === t && (n.viewport = e('<div class="' + a + 'viewport"></div>').css({
                overflow: "hidden",
                position: "relative"
            }).appendTo(n).append(n.container), n.cloneCount = 0, n.cloneOffset = 0, d && (o = e.makeArray(n.slides).reverse(), n.slides = e(o), n.container.empty().append(n.slides))), n.vars.animationLoop && !h && (n.cloneCount = 2, n.cloneOffset = 1, "init" !== t && n.container.find(".clone").remove(), n.container.append(m.uniqueID(n.slides.first().clone().addClass("clone")).attr("aria-hidden", "true")).prepend(m.uniqueID(n.slides.last().clone().addClass("clone")).attr("aria-hidden", "true"))), n.newSlides = e(n.vars.selector, n), i = d ? n.count - 1 - n.currentSlide + n.cloneOffset : n.currentSlide + n.cloneOffset, u && !h ? (n.container.height(200 * (n.count + n.cloneCount) + "%").css("position", "absolute").width("100%"), setTimeout((function() {
                n.newSlides.css({
                    display: "block"
                }), n.doMath(), n.viewport.height(n.h), n.setProps(i * n.h, "init")
            }), "init" === t ? 100 : 0)) : (n.container.width(200 * (n.count + n.cloneCount) + "%"), n.setProps(i * n.computedW, "init"), setTimeout((function() {
                n.doMath(), n.newSlides.css({
                    width: n.computedW,
                    float: "left",
                    display: "block"
                }), n.vars.smoothHeight && m.smoothHeight()
            }), "init" === t ? 100 : 0)));
            h || n.slides.removeClass(a + "active-slide").eq(n.currentSlide).addClass(a + "active-slide"), n.vars.init(n)
        }, n.doMath = function() {
            var e = n.slides.first(),
                t = n.vars.itemMargin,
                i = n.vars.minItems,
                a = n.vars.maxItems;
            n.w = void 0 === n.viewport ? n.width() : n.viewport.width(), n.h = e.height(), n.boxPadding = e.outerWidth() - e.width(), h ? (n.itemT = n.vars.itemWidth + t, n.minW = i ? i * n.itemT : n.w, n.maxW = a ? a * n.itemT - t : n.w, n.itemW = n.minW > n.w ? (n.w - t * (i - 1)) / i : n.maxW < n.w ? (n.w - t * (a - 1)) / a : n.vars.itemWidth > n.w ? n.w : n.vars.itemWidth, n.visible = Math.floor(n.w / n.itemW), n.move = n.vars.move > 0 && n.vars.move < n.visible ? n.vars.move : n.visible, n.pagingCount = Math.ceil((n.count - n.visible) / n.move + 1), n.last = n.pagingCount - 1, n.limit = 1 === n.pagingCount ? 0 : n.vars.itemWidth > n.w ? n.itemW * (n.count - 1) + t * (n.count - 1) : (n.itemW + t) * n.count - n.w - t) : (n.itemW = n.w, n.pagingCount = n.count, n.last = n.count - 1), n.computedW = n.itemW - n.boxPadding
        }, n.update = function(e, t) {
            n.doMath(), h || (e < n.currentSlide ? n.currentSlide += 1 : e <= n.currentSlide && 0 !== e && (n.currentSlide -= 1), n.animatingTo = n.currentSlide), n.vars.controlNav && !n.manualControls && ("add" === t && !h || n.pagingCount > n.controlNav.length ? m.controlNav.update("add") : ("remove" === t && !h || n.pagingCount < n.controlNav.length) && (h && n.currentSlide > n.last && (n.currentSlide -= 1, n.animatingTo -= 1), m.controlNav.update("remove", n.last))), n.vars.directionNav && m.directionNav.update()
        }, n.addSlide = function(t, i) {
            var a = e(t);
            n.count += 1, n.last = n.count - 1, u && d ? void 0 !== i ? n.slides.eq(n.count - i).after(a) : n.container.prepend(a) : void 0 !== i ? n.slides.eq(i).before(a) : n.container.append(a), n.update(i, "add"), n.slides = e(n.vars.selector + ":not(.clone)", n), n.setup(), n.vars.added(n)
        }, n.removeSlide = function(t) {
            var i = isNaN(t) ? n.slides.index(e(t)) : t;
            n.count -= 1, n.last = n.count - 1, isNaN(t) ? e(t, n.slides).remove() : u && d ? n.slides.eq(n.last).remove() : n.slides.eq(t).remove(), n.doMath(), n.update(i, "remove"), n.slides = e(n.vars.selector + ":not(.clone)", n), n.setup(), n.vars.removed(n)
        }, m.init()
    }, e(window).blur((function(e) {
        focused = !1
    })).focus((function(e) {
        focused = !0
    })), e.flexslider.defaults = {
        namespace: "flex-",
        selector: ".slides > li",
        animation: "fade",
        easing: "swing",
        direction: "horizontal",
        reverse: !1,
        animationLoop: !0,
        smoothHeight: !1,
        startAt: 0,
        slideshow: !0,
        slideshowSpeed: 7e3,
        animationSpeed: 600,
        initDelay: 0,
        randomize: !1,
        fadeFirstSlide: !0,
        thumbCaptions: !1,
        pauseOnAction: !0,
        pauseOnHover: !1,
        pauseInvisible: !0,
        useCSS: !0,
        touch: !0,
        video: !1,
        controlNav: !0,
        directionNav: !0,
        prevText: "Previous",
        nextText: "Next",
        keyboard: !0,
        multipleKeyboard: !1,
        mousewheel: !1,
        pausePlay: !1,
        pauseText: "Pause",
        playText: "Play",
        controlsContainer: "",
        manualControls: "",
        customDirectionNav: "",
        sync: "",
        asNavFor: "",
        itemWidth: 0,
        itemMargin: 0,
        minItems: 1,
        maxItems: 0,
        move: 0,
        allowOneSlide: !0,
        start: function() {},
        before: function() {},
        after: function() {},
        end: function() {},
        added: function() {},
        removed: function() {},
        init: function() {}
    }, e.fn.flexslider = function(t) {
        if (void 0 === t && (t = {}), "object" == typeof t) return this.each((function() {
            var i = e(this),
                n = t.selector ? t.selector : ".slides > li",
                a = i.find(n);
            1 === a.length && !0 === t.allowOneSlide || 0 === a.length ? (a.fadeIn(400), t.start && t.start(i)) : void 0 === i.data("flexslider") && new e.flexslider(this, t)
        }));
        var i = e(this).data("flexslider");
        switch (t) {
            case "play":
                i.play();
                break;
            case "pause":
                i.pause();
                break;
            case "stop":
                i.stop();
                break;
            case "next":
                i.flexAnimate(i.getTarget("next"), !0);
                break;
            case "prev":
            case "previous":
                i.flexAnimate(i.getTarget("prev"), !0);
                break;
            default:
                "number" == typeof t && i.flexAnimate(t, !0)
        }
    }
}(jQuery),
function() {
    for (var e, t = function e() {}, i = ["assert", "clear", "count", "debug", "dir", "dirxml", "error", "exception", "group", "groupCollapsed", "groupEnd", "info", "log", "markTimeline", "profile", "profileEnd", "table", "time", "timeEnd", "timeStamp", "trace", "warn"], n = i.length, a = window.console = window.console || {}; n--;) a[e = i[n]] || (a[e] = t)
}(), $(document).foundation(), $(document).ready((function() {
        $("#js-view-all-tenants").click((function(e) {
            e.preventDefault(), $(".tenant-grid-item.hidden").removeClass("hidden", 1e3), $(this).hide(), $("#js-view-less-tenants").show()
        })), $("#js-view-less-tenants").click((function(e) {
            e.preventDefault(), $(".tenant-grid-item:gt(11)").addClass("hidden"), $(this).hide(), $("#js-view-all-tenants").show()
        })), $("#js-open-disclaimer").click((function(e) {
            e.preventDefault(), $("#js-disclaimer").addClass("open"), $("#js-disclaimer i").click((function() {
                $("#js-disclaimer").removeClass("open")
            }))
        })), $("#gallery .button").click((function(e) {
            $("#gallery .fancybox:first").click(), e.preventDefault()
        })), $(".fancybox").fancybox({
            padding: 0,
            helpers: {
                overlay: {
                    locked: !1
                }
            },
            iframe: {
                scrolling: "no"
            }
        }), Foundation.MediaQuery.atLeast("medium") && ($("#files .flexslider").flexslider({
            controlNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1
        }), $("#downloads .flexslider").flexslider({
            controlNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1
        }), $("#marketing_materials .flexslider").flexslider({
            controlNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1
        }), $("#siteplan .flexslider").flexslider({
            controlNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1
        }), $("#events .flexslider").flexslider({
            controlNav: !0,
            directionNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1
        }), $("#slider .flexslider").flexslider({
            controlNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1,
            after: function(e, t) {
                var i = e.currentSlide + 1,
                    n = e.count;
                $("#flexslider-counter").html("<h3>" + i + " of " + e.count + "</h3>")
            },
            start: function(e, t) {
                var i = e.count;
                $("#flexslider-counter").html("<h3>1 of " + e.count + "</h3>")
            }
        }), $("#parcels .flexslider").flexslider({
            controlNav: !0,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1,
            after: function(e, t) {
                var i = e.currentSlide + 1,
                    n = e.count;
                $("#flexslider-counter").html("<h3>Parcel " + i + " of " + e.count + "</h3>")
            },
            start: function(e, t) {
                var i = e.count;
                $("#flexslider-counter").html("<h3>Parcel 1 of " + e.count + "</h3>")
            }
        })), $("#banner_main_portfolio").length > 0 && ($("footer").css("padding-bottom", "134px"), $(window).scroll((function() {
            var e = .8;
            63 == bootstrap.client_id && (e = 0), $(window).scrollTop() + $(window).height() >= getDocumentHeight() * e ? ($("#banner_main_portfolio").removeClass("closing"), $("#banner_main_portfolio").addClass("open")) : $("#banner_main_portfolio").addClass("closing")
        })))
    })),
    /*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas, David Knight. Dual MIT/BSD license */
    window.matchMedia || (window.matchMedia = function() {
        "use strict";
        var e = window.styleMedia || window.media;
        if (!e) {
            var t = document.createElement("style"),
                i = document.getElementsByTagName("script")[0],
                n = null;
            t.type = "text/css", t.id = "matchmediajs-test", i.parentNode.insertBefore(t, i), n = "getComputedStyle" in window && window.getComputedStyle(t, null) || t.currentStyle, e = {
                matchMedium: function(e) {
                    var i = "@media " + e + "{ #matchmediajs-test { width: 1px; } }";
                    return t.styleSheet ? t.styleSheet.cssText = i : t.textContent = i, "1px" === n.width
                }
            }
        }
        return function(t) {
            return {
                matches: e.matchMedium(t || "all"),
                media: t || "all"
            }
        }
    }());
/*var SharplaunchMap = {
    map: null,
    markers: [],
    bounds: null,
    map_center: null,
    active_marker: null,
    active_categories: ["0"],
    cat_colors: {},
    last_zIndex: 1e4,
    styles: bootstrap.map.styles || null,
    marker_path: "M7.536,5.064c0,1.398-1.139,2.532-2.544,2.532c-1.405,0-2.544-1.134-2.544-2.532c0-1.398,1.139-2.532,2.544-2.532C6.397,2.532,7.536,3.666,7.536,5.064M10.176,5.064C10.176,2.267,7.897,0,5.088,0C2.278,0,0,2.267,0,5.064c0,1.23,0.441,2.357,1.173,3.234l3.919,5.628l3.976-5.71C9.211,8.039,9.342,7.852,9.46,7.654L9.5,7.597H9.493C9.927,6.852,10.176,5.987,10.176,5.064",
    loadScript: function() {
        var e = document.createElement("script");
        e.type = "text/javascript", e.src = "https://maps.google.com/maps/api/js?key=AIzaSyCYjJ4QWKI8OIrMkjcOcghv-YRVmqTtDKE&callback=SharplaunchMap.init", document.body.appendChild(e)
    },
    init: function() {
        var e = this;
        e.map_center = new google.maps.LatLng($("#map_canvas").attr("data-latitude"), $("#map_canvas").attr("data-longitude")), this.bounds = new google.maps.LatLngBounds, this.map = new google.maps.Map(document.getElementById("map_canvas"), {
            zoom: $("#map_canvas").data("zoom"),
            center: e.map_center,
            mapTypeControl: !1,
            scrollwheel: !1,
            scaleControl: !1,
            streetViewControl: !1,
            zoomControl: !1,
            panControl: !1,
            fullscreenControl: !1,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{
                featureType: "water",
                elementType: "geometry",
                stylers: [{
                    color: "#c1d9e2"
                }, {
                    lightness: 17
                }]
            }, {
                featureType: "landscape",
                elementType: "geometry",
                stylers: [{
                    color: "#f2f2f2"
                }]
            }, {
                featureType: "road.highway",
                elementType: "geometry.fill",
                stylers: [{
                    color: "#f6cf65"
                }, {
                    lightness: 17
                }]
            }, {
                featureType: "road.highway",
                elementType: "geometry.stroke",
                stylers: [{
                    color: "#ffffff"
                }, {
                    lightness: 29
                }, {
                    weight: .2
                }, {
                    visibility: "simplified"
                }]
            }, {
                featureType: "road.arterial",
                elementType: "geometry",
                stylers: [{
                    color: "#ffffff"
                }, {
                    lightness: 18
                }]
            }, {
                featureType: "road.local",
                elementType: "geometry",
                stylers: [{
                    color: "#ffffff"
                }, {
                    lightness: 16
                }]
            }, {
                featureType: "poi",
                elementType: "geometry",
                stylers: [{
                    color: "#f5f5f5"
                }, {
                    lightness: 21
                }]
            }, {
                featureType: "poi.park",
                elementType: "geometry",
                stylers: [{
                    color: "#dedede"
                }, {
                    lightness: 21
                }]
            }, {
                elementType: "labels.text.stroke",
                stylers: [{
                    visibility: "on"
                }, {
                    color: "#ffffff"
                }, {
                    lightness: 16
                }]
            }, {
                elementType: "labels.text.fill",
                stylers: [{
                    saturation: 36
                }, {
                    color: "#333333"
                }, {
                    lightness: 40
                }]
            }, {
                elementType: "labels.icon",
                stylers: [{
                    visibility: "off"
                }]
            }, {
                featureType: "transit",
                elementType: "geometry",
                stylers: [{
                    color: "#f2f2f2"
                }, {
                    lightness: 19
                }]
            }, {
                featureType: "administrative",
                elementType: "geometry.fill",
                stylers: [{
                    color: "#fefefe"
                }, {
                    lightness: 20
                }]
            }, {
                featureType: "administrative",
                elementType: "geometry.stroke",
                stylers: [{
                    color: "#fefefe"
                }, {
                    lightness: 17
                }, {
                    weight: 1.2
                }]
            }, {
                featureType: "administrative",
                elementType: "labels.text.fill",
                stylers: [{
                    color: "#444444"
                }]
            }]
        }), $.each(bootstrap.poi_cats, (function(t, i) {
            e.cat_colors[i.id] = i.color
        })), (Popup = function(t, i, n, a) {
            this.position = n, this.index = t, this.poi = i, this.type = "logo", this.offset = {
                x: 0,
                y: 0
            }, this.content = a, this.content.classList.add("popup-bubble-content");
            var o = document.createElement("div");
            o.classList.add("popup-bubble-anchor"), o.appendChild(a), this.anchor = document.createElement("div"), this.anchor.classList.add("popup-tip-anchor"), this.anchor.appendChild(o), this.stopEventPropagation(), this.setMap(e.map), this.visible = !0
        }).prototype = Object.create(google.maps.OverlayView.prototype), Popup.prototype.onAdd = function() {
            this.getPanes().floatPane.appendChild(this.anchor);
            var e = this;
            this.anchor.addEventListener("click", (function(t) {
                e.showTooltip()
            }))
        }, Popup.prototype.isVisible = function() {
            return this.visible
        }, Popup.prototype.getPosition = function() {
            return this.position
        }, Popup.prototype.hideTooltip = function() {
            $(this.content).addClass("shadow"), $("#map-tooltip").removeClass("regular").removeClass("logo").addClass("hide")
        }, Popup.prototype.showTooltip = function() {
            var t = this;
            e.closeAllTooltips(), e.active_marker = this.index, this.hide(), e.last_zIndex++, this.anchor.style.zIndex = e.last_zIndex;
            var i = '<div class="tooltip-content"><h3>' + this.poi.name + "</h3><span>" + this.poi.address + "</span></div>";
            i = '<i class="icon close icon-close" style="display:none;cursor:pointer;position:absolute;right: 4px;    top: 3px;    color: #ddd;"></i><img width="100" src="' + this.poi.logo_url + '">' + i, this.tooltipPosition(), $("#map-tooltip").removeClass("regular").addClass("logo").html(i).css({
                width: "73px",
                height: "73px"
            }).removeClass("hide").stop().animate({
                width: "335px",
                padding: "10px",
                height: "inherit",
                "max-height": "135px"
            }, 350, (function() {
                $(".icon-close", this).fadeIn(50)
            })), $("#map-tooltip .icon-close").click((function() {
                e.closeAllTooltips()
            }))
        }, Popup.prototype.tooltipPosition = function() {
            var e = this,
                t = this.getProjection().fromLatLngToContainerPixel(this.position),
                i = t.x - 30,
                n = t.y - 63;
            $("#map-tooltip").css({
                left: i + "px",
                top: n + "px",
                display: "block"
            })
        }, Popup.prototype.draw = function() {
            var t = this.getProjection().fromLatLngToDivPixel(this.position);
            this.offset = t;
            var i = Math.abs(t.x) < 4e3 && Math.abs(t.y) < 4e3 ? "block" : "none";
            "block" === i && (this.anchor.style.left = parseInt(t.x - 30) + "px", this.anchor.style.top = parseInt(t.y - 25) + "px"), this.anchor.style.display !== i && (this.anchor.style.display = i), $(this.content).css("border-bottom", "3px solid #" + e.cat_colors[this.poi.category])
        }, Popup.prototype.stopEventPropagation = function() {
            var e = this.anchor;
            e.style.cursor = "auto", ["click", "dblclick", "contextmenu", "wheel", "mousedown", "touchstart", "pointerdown"].forEach((function(t) {
                e.addEventListener(t, (function(e) {
                    e.stopPropagation()
                }))
            }))
        }, Popup.prototype.show = function() {
            //this.content.style.display = "block", this.visible = !0
        }, Popup.prototype.hide = function() {
            //this.content.style.display = "none", this.visible = !1, this.hideTooltip()
        }, (Marker = function(t, i) {
            var n = this;
            this.index = t, this.visible = !0, this.type = "dot", this.position = new google.maps.LatLng(i.lat, i.lng), this.map = e.map, this.zIndex = 9999, this.poi = i, this.overlay = new google.maps.OverlayView, this.overlay.draw = function() {}, this.overlay.setMap(this.map), this.icon = {
                path: e.marker_path,
                fillOpacity: 1,
                fillColor: "#" + e.cat_colors[i.category],
                strokeWeight: 0,
                scale: 3,
                anchor: new google.maps.Point(5, 14)
            }, void 0 !== i.category && 0 != i.category && (this.icon.path = google.maps.SymbolPath.CIRCLE, this.icon.fillColor = "#" + (e.cat_colors[i.category] ? e.cat_colors[i.category] : bootstrap.color), this.icon.scale = bootstrap.map.icon_scale, delete this.icon.anchor), google.maps.Marker.call(this, this), e.bounds.extend(this.position), google.maps.event.addListener(this, "click", (function() {
                n.showTooltip()
            }))
        }).prototype = Object.create(google.maps.Marker.prototype), Marker.prototype.isVisible = function() {
            return this.visible
        }, Marker.prototype.showTooltip = function() {
            if (e.closeAllTooltips(), e.active_marker = this.index, this.poi.name || this.poi.address) {
                var t = '<i class="icon close icon-close" style="cursor:pointer;position:absolute;right: 4px;    top: 3px;    color: #ddd;"></i><div class="tooltip-content"><h3>' + this.poi.name + "</h3><span>" + this.poi.address + "</span></div>";
                $("#map-tooltip").removeClass("logo").addClass("regular").html(t).removeClass("hide"), "0" != this.poi.category && "" != this.poi.category || $("#map-tooltip").addClass("building");
                var i, n, a = this.overlay.getProjection().fromLatLngToContainerPixel(this.getPosition()),
                    o = a.x - 20,
                    s = a.y + 22;
                $("#map-tooltip").css({
                    left: o,
                    top: s
                }), $("#map-tooltip .icon-close").click((function() {
                    e.closeAllTooltips()
                }))
            }
        }, Marker.prototype.tooltipPosition = function() {
            var e, t, i = this.overlay.getProjection().fromLatLngToContainerPixel(this.getPosition()),
                n = i.x - 20,
                a = i.y + 22;
            $("#map-tooltip").css({
                left: n,
                top: a
            })
        }, Marker.prototype.show = function() {
            this.setMap(e.map), this.visible = !0
        }, Marker.prototype.hide = function() {
            this.setMap(null), this.visible = !1, this.hideTooltip()
        }, Marker.prototype.hideTooltip = function() {
            $("#map-tooltip").removeClass("regular").removeClass("logo").addClass("hide")
        }, bootstrap.poi.length ? $.each(bootstrap.poi, (function(t, i) {
            e.placeMarker(i)
        })) : e.placeMarker({
            lat: $("#map_canvas").attr("data-latitude"),
            lng: $("#map_canvas").attr("data-longitude")
        }), bootstrap.poi_cats.length && $.each(bootstrap.poi_cats, (function(t, i) {
            "0" != i.id && e.active_categories.push(i.id)
        })), google.maps.event.addListener(this.map, "click", (function(t) {
            e.closeAllTooltips()
        })), google.maps.event.addListener(this.map, "zoom_changed", (function() {
            e.closeAllTooltips()
        })), google.maps.event.addListener(this.map, "center_changed", (function() {
            e.tooltipPosition()
        })), this.mapControls()
    },
    tooltipPosition: function() {
        var e = this;
        null != this.active_marker && this.markers[this.active_marker].tooltipPosition()
    },
    placeMarker: function(e) {
        var t = this,
            i = new google.maps.LatLng(e.lat, e.lng),
            n = this.markers.length;
        if ("" != e.logo_url && bootstrap.map.show_logos_directly && "0" != e.category) {
            var a = '<div id="randombubblemarker-' + n + '" class="shadow marker-bubble"><img width="50" src="' + e.logo_url    + '"></div>';
            $("body").append(a), popup = new Popup(n, e, i, document.getElementById("randombubblemarker-" + n)), this.markers.push(popup)
        } else marker = new Marker(n, e), this.markers.push(marker)
    },
    filterPoisByCategory: function() {
        console.log(this.markers);
             console.log(this.active_categories);
        for (var e = this, t = 0; t < this.markers.length; t++) - 1 == $.inArray(this.markers[t].poi.category, this.active_categories) ? 0 != this.markers[t].poi.category && this.markers[t].isVisible() && this.markers[t].hide() : this.markers[t].isVisible() || this.markers[t].show()
    },
    closeAllTooltips: function() {
        var e = this;

        this.active_marker = null, $(".marker-bubble").addClass("shadow");
        for (var t = 0; t < this.markers.length; t++) !this.markers[t].isVisible() && (this.active_categories.indexOf(this.markers[t].poi.category) > -1 || "" == this.markers[t].poi.category) && this.markers[t].show();
        $("#map-tooltip").removeClass("building").removeClass("regular").removeClass("logo").addClass("hide")
    },
    mapControls: function() {
        var e = this;
        if ($("#map-categories li").click((function(t) {
            
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                    var i = e.active_categories.indexOf($(this).data("id"));
                    i > -1 && e.active_categories.splice(i, 1)
                } else $(this).addClass("active"), e.active_categories.push($(this).data("id"));
                e.filterPoisByCategory()
            })), $("#zoom-slider").length) var t = $("#zoom-slider").slider({
            min: 10,
            max: 20,
            step: 1,
            range: "min",
            value: $("#map_canvas").data("zoom"),
            slide: function(t, i) {
                e.map.setZoom(i.value)
            }
        });
        $(".zoom-control .zoom-in").click((function() {
            if (void 0 !== t) {
                var i = $("#zoom-slider").slider("value") + 1;
                $("#zoom-slider").slider("value", i)
            } else var i = e.map.getZoom() + 1;
            e.map.setZoom(i)
        })), $(".zoom-control .zoom-out").click((function() {
            if (void 0 !== t) {
                var i = $("#zoom-slider").slider("value") - 1;
                $("#zoom-slider").slider("value", i)
            } else var i = e.map.getZoom() - 1;
            e.map.setZoom(i)
        })), $(".map-type").click((function() {
            $(this).hasClass("open") ? $(this).removeClass("open") : $(this).addClass("open")
        })), $(".map-type ul li").click((function(t) {
            t.preventDefault();
            var i = $(this).find("a").attr("map-type");
            switch (i) {
                case "terrain":
                    i = google.maps.MapTypeId.TERRAIN;
                    break;
                case "default":
                    i = google.maps.MapTypeId.ROADMAP;
                    break;
                case "satellite":
                    i = google.maps.MapTypeId.SATELLITE;
                    break
            }
            e.map.setMapTypeId(i)
        })), $("#enter-full-screen").click((function(t) {
            t.preventDefault(), $("body").hasClass("map-full-screen") ? (e.closeFullScreen(), $(".zoom-control .button").removeClass("active")) : ($(".zoom-control #enter-full-screen").addClass("active"), e.openFullScreen())
        })), $("#exit-full-screen").click((function(t) {
            t.preventDefault(), e.closeFullScreen()
        })), $(".zoom-control .center-in").click((function() {
            e.map.setCenter(e.map_center), e.map.setZoom(12), $("#zoom-slider").slider("value", 15)
        })), $(".view-legend").click((function() {
            $(this).hasClass("active") ? ($(this).text("View Legend").removeClass("active"), $("#map-categories").removeClass("active")) : ($(this).text("Hide Legend").addClass("active"), $("#map-categories").addClass("active"))
        })), this.map.panBy(0, -Math.floor($("#location .section-title").outerHeight() / 2))
    },
    openFullScreen: function() {
        return $("#map_canvas").addClass("fullscreen"), $("body").addClass("map-full-screen"), $("#map-tooltip").css("position", "fixed"), setTimeout((function() {
            google.maps.event.trigger(self.map, "resize")
        }), 500), !1
    },
    closeFullScreen: function() {
        return $("body").removeClass("map-full-screen"), $("#map_canvas").removeClass("fullscreen"), $("#map-tooltip").css("position", "absolute"), !1
    }
};*/
$(document).ready((function() {
       // $("#map_canvas").length && SharplaunchMap.loadScript()
    })),
    function(e) {
        "use strict";

        function t(e) {
            if (void 0 === Function.prototype.name) {
                var t, i = /function\s([^(]{1,})\(/.exec(e.toString());
                return i && i.length > 1 ? i[1].trim() : ""
            }
            return void 0 === e.prototype ? e.constructor.name : e.prototype.constructor.name
        }

        function i(e) {
            return "true" === e || "false" !== e && (isNaN(1 * e) ? e : parseFloat(e))
        }

        function n(e) {
            return e.replace(/([a-z])([A-Z])/g, "$1-$2").toLowerCase()
        }
        var a, o = {
            version: "6.3.0",
            _plugins: {},
            _uuids: [],
            rtl: function() {
                return "rtl" === e("html").attr("dir")
            },
            plugin: function(e, i) {
                var a = i || t(e),
                    o = n(a);
                this._plugins[o] = this[a] = e
            },
            registerPlugin: function(e, i) {
                var a = i ? n(i) : t(e.constructor).toLowerCase();
                e.uuid = this.GetYoDigits(6, a), e.$element.attr("data-" + a) || e.$element.attr("data-" + a, e.uuid), e.$element.data("zfPlugin") || e.$element.data("zfPlugin", e), e.$element.trigger("init.zf." + a), this._uuids.push(e.uuid)
            },
            unregisterPlugin: function(e) {
                var i = n(t(e.$element.data("zfPlugin").constructor));
                for (var a in this._uuids.splice(this._uuids.indexOf(e.uuid), 1), e.$element.removeAttr("data-" + i).removeData("zfPlugin").trigger("destroyed.zf." + i), e) e[a] = null
            },
            reInit: function(t) {
                var i = t instanceof e;
                try {
                    if (i) t.each((function() {
                        e(this).data("zfPlugin")._init()
                    }));
                    else {
                        var a, o = this,
                            s;
                        ({
                            object: function(t) {
                                t.forEach((function(t) {
                                    t = n(t), e("[data-" + t + "]").foundation("_init")
                                }))
                            },
                            string: function() {
                                t = n(t), e("[data-" + t + "]").foundation("_init")
                            },
                            undefined: function() {
                                this.object(Object.keys(o._plugins))
                            }
                        })[typeof t](t)
                    }
                } catch (e) {
                    console.error(e)
                } finally {
                    return t
                }
            },
            GetYoDigits: function(e, t) {
                return e = e || 6, Math.round(Math.pow(36, e + 1) - Math.random() * Math.pow(36, e)).toString(36).slice(1) + (t ? "-" + t : "")
            },
            reflow: function(t, n) {
                void 0 === n ? n = Object.keys(this._plugins) : "string" == typeof n && (n = [n]);
                var a = this;
                e.each(n, (function(n, o) {
                    var s = a._plugins[o],
                        r;
                    e(t).find("[data-" + o + "]").addBack("[data-" + o + "]").each((function() {
                        var t = e(this),
                            n = {};
                        if (t.data("zfPlugin")) console.warn("Tried to initialize " + o + " on an element that already has a Foundation plugin.");
                        else {
                            t.attr("data-options") && t.attr("data-options").split(";").forEach((function(e, t) {
                                var a = e.split(":").map((function(e) {
                                    return e.trim()
                                }));
                                a[0] && (n[a[0]] = i(a[1]))
                            }));
                            try {
                                t.data("zfPlugin", new s(e(this), n))
                            } catch (e) {
                                console.error(e)
                            } finally {
                                return
                            }
                        }
                    }))
                }))
            },
            getFnName: t,
            transitionend: function(e) {
                var t, i = {
                        transition: "transitionend",
                        WebkitTransition: "webkitTransitionEnd",
                        MozTransition: "transitionend",
                        OTransition: "otransitionend"
                    },
                    n = document.createElement("div");
                for (var a in i) void 0 !== n.style[a] && (t = i[a]);
                return t || (t = setTimeout((function() {
                    e.triggerHandler("transitionend", [e])
                }), 1), "transitionend")
            }
        };
        o.util = {
            throttle: function(e, t) {
                var i = null;
                return function() {
                    var n = this,
                        a = arguments;
                    null === i && (i = setTimeout((function() {
                        e.apply(n, a), i = null
                    }), t))
                }
            }
        };
        var s = function(i) {
            var n = typeof i,
                a = e("meta.foundation-mq"),
                s = e(".no-js");
            if (a.length || e('<meta class="foundation-mq">').appendTo(document.head), s.length && s.removeClass("no-js"), "undefined" === n) o.MediaQuery._init(), o.reflow(this);
            else {
                if ("string" !== n) throw new TypeError("We're sorry, " + n + " is not a valid parameter. You must use a string representing the method you wish to invoke.");
                var r = Array.prototype.slice.call(arguments, 1),
                    l = this.data("zfPlugin");
                if (void 0 === l || void 0 === l[i]) throw new ReferenceError("We're sorry, '" + i + "' is not an available method for " + (l ? t(l) : "this element") + ".");
                1 === this.length ? l[i].apply(l, r) : this.each((function(t, n) {
                    l[i].apply(e(n).data("zfPlugin"), r)
                }))
            }
            return this
        };
        window.Foundation = o, e.fn.foundation = s,
            function() {
                Date.now && window.Date.now || (window.Date.now = Date.now = function() {
                    return (new Date).getTime()
                });
                for (var e = ["webkit", "moz"], t = 0; t < e.length && !window.requestAnimationFrame; ++t) {
                    var i = e[t];
                    window.requestAnimationFrame = window[i + "RequestAnimationFrame"], window.cancelAnimationFrame = window[i + "CancelAnimationFrame"] || window[i + "CancelRequestAnimationFrame"]
                }
                if (/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent) || !window.requestAnimationFrame || !window.cancelAnimationFrame) {
                    var n = 0;
                    window.requestAnimationFrame = function(e) {
                        var t = Date.now(),
                            i = Math.max(n + 16, t);
                        return setTimeout((function() {
                            e(n = i)
                        }), i - t)
                    }, window.cancelAnimationFrame = clearTimeout
                }
                window.performance && window.performance.now || (window.performance = {
                    start: Date.now(),
                    now: function() {
                        return Date.now() - this.start
                    }
                })
            }(), Function.prototype.bind || (Function.prototype.bind = function(e) {
                if ("function" != typeof this) throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
                var t = Array.prototype.slice.call(arguments, 1),
                    i = this,
                    n = function() {},
                    a = function() {
                        return i.apply(this instanceof n ? this : e, t.concat(Array.prototype.slice.call(arguments)))
                    };
                return this.prototype && (n.prototype = this.prototype), a.prototype = new n, a
            })
    }(jQuery),
    function(e) {
        function t(e) {
            var t = {};
            return "string" != typeof e ? t : (e = e.trim().slice(1, -1)) ? t = e.split("&").reduce((function(e, t) {
                var i = t.replace(/\+/g, " ").split("="),
                    n = i[0],
                    a = i[1];
                return n = decodeURIComponent(n), a = void 0 === a ? null : decodeURIComponent(a), e.hasOwnProperty(n) ? Array.isArray(e[n]) ? e[n].push(a) : e[n] = [e[n], a] : e[n] = a, e
            }), {}) : t
        }
        var i = {
            queries: [],
            current: "",
            _init: function() {
                var i, n = this,
                    a = e(".foundation-mq").css("font-family");
                for (var o in i = t(a)) i.hasOwnProperty(o) && n.queries.push({
                    name: o,
                    value: "only screen and (min-width: " + i[o] + ")"
                });
                this.current = this._getCurrentSize(), this._watcher()
            },
            atLeast: function(e) {
                var t = this.get(e);
                return !!t && window.matchMedia(t).matches
            },
            is: function(e) {
                return (e = e.trim().split(" ")).length > 1 && "only" === e[1] ? e[0] === this._getCurrentSize() : this.atLeast(e[0])
            },
            get: function(e) {
                for (var t in this.queries)
                    if (this.queries.hasOwnProperty(t)) {
                        var i = this.queries[t];
                        if (e === i.name) return i.value
                    } return null
            },
            _getCurrentSize: function() {
                for (var e, t = 0; t < this.queries.length; t++) {
                    var i = this.queries[t];
                    window.matchMedia(i.value).matches && (e = i)
                }
                return "object" == typeof e ? e.name : e
            },
            _watcher: function() {
                var t = this;
                e(window).on("resize.zf.mediaquery", (function() {
                    var i = t._getCurrentSize(),
                        n = t.current;
                    i !== n && (t.current = i, e(window).trigger("changed.zf.mediaquery", [i, n]))
                }))
            }
        };
        Foundation.MediaQuery = i, window.matchMedia || (window.matchMedia = function() {
            "use strict";
            var e = window.styleMedia || window.media;
            if (!e) {
                var t = document.createElement("style"),
                    i = document.getElementsByTagName("script")[0],
                    n = null;
                t.type = "text/css", t.id = "matchmediajs-test", i && i.parentNode && i.parentNode.insertBefore(t, i), n = "getComputedStyle" in window && window.getComputedStyle(t, null) || t.currentStyle, e = {
                    matchMedium: function(e) {
                        var i = "@media " + e + "{ #matchmediajs-test { width: 1px; } }";
                        return t.styleSheet ? t.styleSheet.cssText = i : t.textContent = i, "1px" === n.width
                    }
                }
            }
            return function(t) {
                return {
                    matches: e.matchMedium(t || "all"),
                    media: t || "all"
                }
            }
        }()), Foundation.MediaQuery = i
    }(jQuery),
    function(e) {
        function t(e, t, i) {
            function n(r) {
                s || (s = r), o = r - s, i.apply(t), o < e ? a = window.requestAnimationFrame(n, t) : (window.cancelAnimationFrame(a), t.trigger("finished.zf.animate", [t]).triggerHandler("finished.zf.animate", [t]))
            }
            var a, o, s = null;
            return 0 === e ? (i.apply(t), void t.trigger("finished.zf.animate", [t]).triggerHandler("finished.zf.animate", [t])) : void(a = window.requestAnimationFrame(n))
        }

        function i(t, i, o, s) {
            function r() {
                t || i.hide(), l(), s && s.apply(i)
            }

            function l() {
                i[0].style.transitionDuration = 0, i.removeClass(c + " " + u + " " + o)
            }
            if ((i = e(i).eq(0)).length) {
                var c = t ? n[0] : n[1],
                    u = t ? a[0] : a[1];
                l(), i.addClass(o).css("transition", "none"), requestAnimationFrame((function() {
                    i.addClass(c), t && i.show()
                })), requestAnimationFrame((function() {
                    i[0].offsetWidth, i.css("transition", "").addClass(u)
                })), i.one(Foundation.transitionend(i), r)
            }
        }
        var n = ["mui-enter", "mui-leave"],
            a = ["mui-enter-active", "mui-leave-active"],
            o = {
                animateIn: function(e, t, n) {
                    i(!0, e, t, n)
                },
                animateOut: function(e, t, n) {
                    i(!1, e, t, n)
                }
            };
        Foundation.Move = t, Foundation.Motion = o
    }(jQuery),
    function(e) {
        function t(e, t, n, a) {
            var o, s, r, l, c = i(e),
                u;
            if (t) {
                var d = i(t);
                s = c.offset.top + c.height <= d.height + d.offset.top, o = c.offset.top >= d.offset.top, r = c.offset.left >= d.offset.left, l = c.offset.left + c.width <= d.width + d.offset.left
            } else s = c.offset.top + c.height <= c.windowDims.height + c.windowDims.offset.top, o = c.offset.top >= c.windowDims.offset.top, r = c.offset.left >= c.windowDims.offset.left, l = c.offset.left + c.width <= c.windowDims.width;
            return n ? r === l == 1 : a ? o === s == 1 : -1 === [s, o, r, l].indexOf(!1)
        }

        function i(e, t) {
            if ((e = e.length ? e[0] : e) === window || e === document) throw new Error("I'm sorry, Dave. I'm afraid I can't do that.");
            var i = e.getBoundingClientRect(),
                n = e.parentNode.getBoundingClientRect(),
                a = document.body.getBoundingClientRect(),
                o = window.pageYOffset,
                s = window.pageXOffset;
            return {
                width: i.width,
                height: i.height,
                offset: {
                    top: i.top + o,
                    left: i.left + s
                },
                parentDims: {
                    width: n.width,
                    height: n.height,
                    offset: {
                        top: n.top + o,
                        left: n.left + s
                    }
                },
                windowDims: {
                    width: a.width,
                    height: a.height,
                    offset: {
                        top: o,
                        left: s
                    }
                }
            }
        }

        function n(e, t, n, a, o, s) {
            var r = i(e),
                l = t ? i(t) : null;
            switch (n) {
                case "top":
                    return {
                        left: Foundation.rtl() ? l.offset.left - r.width + l.width : l.offset.left, top: l.offset.top - (r.height + a)
                    };
                case "left":
                    return {
                        left: l.offset.left - (r.width + o), top: l.offset.top
                    };
                case "right":
                    return {
                        left: l.offset.left + l.width + o, top: l.offset.top
                    };
                case "center top":
                    return {
                        left: l.offset.left + l.width / 2 - r.width / 2, top: l.offset.top - (r.height + a)
                    };
                case "center bottom":
                    return {
                        left: s ? o : l.offset.left + l.width / 2 - r.width / 2, top: l.offset.top + l.height + a
                    };
                case "center left":
                    return {
                        left: l.offset.left - (r.width + o), top: l.offset.top + l.height / 2 - r.height / 2
                    };
                case "center right":
                    return {
                        left: l.offset.left + l.width + o + 1, top: l.offset.top + l.height / 2 - r.height / 2
                    };
                case "center":
                    return {
                        left: r.windowDims.offset.left + r.windowDims.width / 2 - r.width / 2, top: r.windowDims.offset.top + r.windowDims.height / 2 - r.height / 2
                    };
                case "reveal":
                    return {
                        left: (r.windowDims.width - r.width) / 2, top: r.windowDims.offset.top + a
                    };
                case "reveal full":
                    return {
                        left: r.windowDims.offset.left, top: r.windowDims.offset.top
                    };
                case "left bottom":
                    return {
                        left: l.offset.left, top: l.offset.top + l.height + a
                    };
                case "right bottom":
                    return {
                        left: l.offset.left + l.width + o - r.width, top: l.offset.top + l.height + a
                    };
                default:
                    return {
                        left: Foundation.rtl() ? l.offset.left - r.width + l.width : l.offset.left + o, top: l.offset.top + l.height + a
                    }
            }
        }
        Foundation.Box = {
            ImNotTouchingYou: t,
            GetDimensions: i,
            GetOffsets: n
        }
    }(jQuery),
    function(e) {
        function t() {
            s(), n(), a(), o(), i()
        }

        function i(t) {
            var i = e("[data-yeti-box]"),
                n = ["dropdown", "tooltip", "reveal"];
            if (t && ("string" == typeof t ? n.push(t) : "object" == typeof t && "string" == typeof t[0] ? n.concat(t) : console.error("Plugin names must be strings")), i.length) {
                var a = n.map((function(e) {
                    return "closeme.zf." + e
                })).join(" ");
                e(window).off(a).on(a, (function(t, i) {
                    var n = t.namespace.split(".")[0],
                        a;
                    e("[data-" + n + "]").not('[data-yeti-box="' + i + '"]').each((function() {
                        var t = e(this);
                        t.triggerHandler("close.zf.trigger", [t])
                    }))
                }))
            }
        }

        function n(t) {
            var i = void 0,
                n = e("[data-resize]");
            n.length && e(window).off("resize.zf.trigger").on("resize.zf.trigger", (function(a) {
                i && clearTimeout(i), i = setTimeout((function() {
                    r || n.each((function() {
                        e(this).triggerHandler("resizeme.zf.trigger")
                    })), n.attr("data-events", "resize")
                }), t || 10)
            }))
        }

        function a(t) {
            var i = void 0,
                n = e("[data-scroll]");
            n.length && e(window).off("scroll.zf.trigger").on("scroll.zf.trigger", (function(a) {
                i && clearTimeout(i), i = setTimeout((function() {
                    r || n.each((function() {
                        e(this).triggerHandler("scrollme.zf.trigger")
                    })), n.attr("data-events", "scroll")
                }), t || 10)
            }))
        }

        function o(t) {
            var i = e("[data-mutate]");
            i.length && r && i.each((function() {
                e(this).triggerHandler("mutateme.zf.trigger")
            }))
        }

        function s() {
            if (!r) return !1;
            var t = document.querySelectorAll("[data-resize], [data-scroll], [data-mutate]"),
                i = function(t) {
                    var i = e(t[0].target);
                    switch (t[0].type) {
                        case "attributes":
                            "scroll" === i.attr("data-events") && "data-events" === t[0].attributeName && i.triggerHandler("scrollme.zf.trigger", [i, window.pageYOffset]), "resize" === i.attr("data-events") && "data-events" === t[0].attributeName && i.triggerHandler("resizeme.zf.trigger", [i]), "style" === t[0].attributeName && (i.closest("[data-mutate]").attr("data-events", "mutate"), i.closest("[data-mutate]").triggerHandler("mutateme.zf.trigger", [i.closest("[data-mutate]")]));
                            break;
                        case "childList":
                            i.closest("[data-mutate]").attr("data-events", "mutate"), i.closest("[data-mutate]").triggerHandler("mutateme.zf.trigger", [i.closest("[data-mutate]")]);
                            break;
                        default:
                            return !1
                    }
                };
            if (t.length)
                for (var n = 0; n <= t.length - 1; n++) {
                    var a;
                    new r(i).observe(t[n], {
                        attributes: !0,
                        childList: !0,
                        characterData: !1,
                        subtree: !0,
                        attributeFilter: ["data-events", "style"]
                    })
                }
        }
        var r = function() {
                for (var e = ["WebKit", "Moz", "O", "Ms", ""], t = 0; t < e.length; t++)
                    if (e[t] + "MutationObserver" in window) return window[e[t] + "MutationObserver"];
                return !1
            }(),
            l = function(t, i) {
                t.data(i).split(" ").forEach((function(n) {
                    e("#" + n)["close" === i ? "trigger" : "triggerHandler"](i + ".zf.trigger", [t])
                }))
            };
        e(document).on("click.zf.trigger", "[data-open]", (function() {
            l(e(this), "open")
        })), e(document).on("click.zf.trigger", "[data-close]", (function() {
            var t;
            e(this).data("close") ? l(e(this), "close") : e(this).trigger("close.zf.trigger")
        })), e(document).on("click.zf.trigger", "[data-toggle]", (function() {
            var t;
            e(this).data("toggle") ? l(e(this), "toggle") : e(this).trigger("toggle.zf.trigger")
        })), e(document).on("close.zf.trigger", "[data-closable]", (function(t) {
            t.stopPropagation();
            var i = e(this).data("closable");
            "" !== i ? Foundation.Motion.animateOut(e(this), i, (function() {
                e(this).trigger("closed.zf")
            })) : e(this).fadeOut().trigger("closed.zf")
        })), e(document).on("focus.zf.trigger blur.zf.trigger", "[data-toggle-focus]", (function() {
            var t = e(this).data("toggle-focus");
            e("#" + t).triggerHandler("toggle.zf.trigger", [e(this)])
        })), e(window).on("load", (function() {
            t()
        })), Foundation.IHearYou = t
    }(jQuery),
    function(e) {
        function t(e) {
            var t = {};
            for (var i in e) t[e[i]] = e[i];
            return t
        }
        var i = {
                9: "TAB",
                13: "ENTER",
                27: "ESCAPE",
                32: "SPACE",
                37: "ARROW_LEFT",
                38: "ARROW_UP",
                39: "ARROW_RIGHT",
                40: "ARROW_DOWN"
            },
            n = {},
            a = {
                keys: t(i),
                parseKey: function(e) {
                    var t = i[e.which || e.keyCode] || String.fromCharCode(e.which).toUpperCase();
                    return t = t.replace(/\W+/, ""), e.shiftKey && (t = "SHIFT_" + t), e.ctrlKey && (t = "CTRL_" + t), e.altKey && (t = "ALT_" + t), t = t.replace(/_$/, "")
                },
                handleKey: function(t, i, a) {
                    var o, s, r, l = n[i],
                        c = this.parseKey(t);
                    if (!l) return console.warn("Component not defined!");
                    if ((r = a[s = (o = void 0 === l.ltr ? l : Foundation.rtl() ? e.extend({}, l.ltr, l.rtl) : e.extend({}, l.rtl, l.ltr))[c]]) && "function" == typeof r) {
                        var u = r.apply();
                        (a.handled || "function" == typeof a.handled) && a.handled(u)
                    } else(a.unhandled || "function" == typeof a.unhandled) && a.unhandled()
                },
                findFocusable: function(t) {
                    return !!t && t.find("a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, *[tabindex], *[contenteditable]").filter((function() {
                        return !(!e(this).is(":visible") || e(this).attr("tabindex") < 0)
                    }))
                },
                register: function(e, t) {
                    n[e] = t
                },
                trapFocus: function(e) {
                    var t = Foundation.Keyboard.findFocusable(e),
                        i = t.eq(0),
                        n = t.eq(-1);
                    e.on("keydown.zf.trapfocus", (function(e) {
                        e.target === n[0] && "TAB" === Foundation.Keyboard.parseKey(e) ? (e.preventDefault(), i.focus()) : e.target === i[0] && "SHIFT_TAB" === Foundation.Keyboard.parseKey(e) && (e.preventDefault(), n.focus())
                    }))
                },
                releaseFocus: function(e) {
                    e.off("keydown.zf.trapfocus")
                }
            };
        Foundation.Keyboard = a
    }(jQuery),
    function(e) {
        function t(e, t, i) {
            var n, a, o = this,
                s = t.duration,
                r = Object.keys(e.data())[0] || "timer",
                l = -1;
            this.isPaused = !1, this.restart = function() {
                l = -1, clearTimeout(a), this.start()
            }, this.start = function() {
                this.isPaused = !1, clearTimeout(a), l = l <= 0 ? s : l, e.data("paused", !1), n = Date.now(), a = setTimeout((function() {
                    t.infinite && o.restart(), i && "function" == typeof i && i()
                }), l), e.trigger("timerstart.zf." + r)
            }, this.pause = function() {
                this.isPaused = !0, clearTimeout(a), e.data("paused", !0);
                var t = Date.now();
                l -= t - n, e.trigger("timerpaused.zf." + r)
            }
        }

        function i(t, i) {
            function n() {
                0 === --a && i()
            }
            var a = t.length;
            0 === a && i(), t.each((function() {
                if (this.complete || 4 === this.readyState || "complete" === this.readyState) n();
                else {
                    var t = e(this).attr("src");
                    e(this).attr("src", t + "?" + (new Date).getTime()), e(this).one("load", (function() {
                        n()
                    }))
                }
            }))
        }
        Foundation.Timer = t, Foundation.onImagesLoaded = i
    }(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var i = 0; i < t.length; i++) {
            var n = t[i];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
        }
    }
    return function(t, i, n) {
        return i && e(t.prototype, i), n && e(t, n), t
    }
}();
! function(e) {
    var t = function() {
        function t(i, n) {
            _classCallCheck(this, t), this.$element = i, this.options = e.extend({}, t.defaults, this.$element.data(), n), this._init(), this.calcPoints(), Foundation.registerPlugin(this, "Magellan")
        }
        return _createClass(t, [{
            key: "_init",
            value: function() {
                var t = this.$element[0].id || Foundation.GetYoDigits(6, "magellan");
                this.$targets = e("[data-magellan-target]"), this.$links = this.$element.find("a"), this.$element.attr({
                    "data-resize": t,
                    "data-scroll": t,
                    id: t
                }), this.$active = e(), this.scrollPos = parseInt(window.pageYOffset, 10), this._events()
            }
        }, {
            key: "calcPoints",
            value: function() {
                var t = this,
                    i = document.body,
                    n = document.documentElement;
                this.points = [], this.winHeight = Math.round(Math.max(window.innerHeight, n.clientHeight)), this.docHeight = Math.round(Math.max(i.scrollHeight, i.offsetHeight, n.clientHeight, n.scrollHeight, n.offsetHeight)), this.$targets.each((function() {
                    var i = e(this),
                        n = Math.round(i.offset().top - t.options.threshold);
                    i.targetPoint = n, t.points.push(n)
                }))
            }
        }, {
            key: "_events",
            value: function() {
                var t = this;
                e("html, body"), t.options.animationDuration, t.options.animationEasing, e(window).one("load", (function() {
                    t.options.deepLinking && location.hash && t.scrollToLoc(location.hash), t.calcPoints(), t._updateActive()
                })), this.$element.on({
                    "resizeme.zf.trigger": this.reflow.bind(this),
                    "scrollme.zf.trigger": this._updateActive.bind(this)
                }).on("click.zf.magellan", 'a[href^="#"]', (function(e) {
                    e.preventDefault();
                    var i = this.getAttribute("href");
                    t.scrollToLoc(i)
                })), e(window).on("popstate", (function(e) {
                    t.options.deepLinking && t.scrollToLoc(window.location.hash)
                }))
            }
        }, {
            key: "scrollToLoc",
            value: function(t) {
                if (!e(t).length) return !1;
                this._inTransition = !0;
                var i = this,
                    n = Math.round(e(t).offset().top - this.options.threshold / 2 - this.options.barOffset);
                e("html, body").stop(!0).animate({
                    scrollTop: n
                }, this.options.animationDuration, this.options.animationEasing, (function() {
                    i._inTransition = !1, i._updateActive()
                }))
            }
        }, {
            key: "reflow",
            value: function() {
                this.calcPoints(), this._updateActive()
            }
        }, {
            key: "_updateActive",
            value: function() {
                if (!this._inTransition) {
                    var e, t = parseInt(window.pageYOffset, 10);
                    if (t + this.winHeight === this.docHeight) e = this.points.length - 1;
                    else if (t < this.points[0]) e = void 0;
                    else {
                        var i = this.scrollPos < t,
                            n = this,
                            a = this.points.filter((function(e, a) {
                                return i ? e - n.options.barOffset <= t : e - n.options.barOffset - n.options.threshold <= t
                            }));
                        e = a.length ? a.length - 1 : 0
                    }
                    if (this.$active.removeClass(this.options.activeClass), this.$active = this.$links.filter('[href="#' + this.$targets.eq(e).data("magellan-target") + '"]').addClass(this.options.activeClass), this.options.deepLinking) {
                        var o = "";
                        null != e && (o = this.$active[0].getAttribute("href")), o !== window.location.hash && (window.history.pushState ? window.history.pushState(null, null, o) : window.location.hash = o)
                    }
                    this.scrollPos = t, this.$element.trigger("update.zf.magellan", [this.$active])
                }
            }
        }, {
            key: "destroy",
            value: function() {
                if (this.$element.off(".zf.trigger .zf.magellan").find("." + this.options.activeClass).removeClass(this.options.activeClass), this.options.deepLinking) {
                    var e = this.$active[0].getAttribute("href");
                    window.location.hash.replace(e, "")
                }
                Foundation.unregisterPlugin(this)
            }
        }]), t
    }();
    t.defaults = {
        animationDuration: 500,
        animationEasing: "linear",
        threshold: 50,
        activeClass: "active",
        deepLinking: !1,
        barOffset: 0
    }, Foundation.plugin(t, "Magellan")
}(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var i = 0; i < t.length; i++) {
            var n = t[i];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
        }
    }
    return function(t, i, n) {
        return i && e(t.prototype, i), n && e(t, n), t
    }
}();
! function(e) {
    var t = function() {
        function t(i, n) {
            _classCallCheck(this, t), this.$element = i, this.options = e.extend({}, t.defaults, this.$element.data(), n), this.$lastTrigger = e(), this.$triggers = e(), this._init(), this._events(), Foundation.registerPlugin(this, "OffCanvas"), Foundation.Keyboard.register("OffCanvas", {
                ESCAPE: "close"
            })
        }
        return _createClass(t, [{
            key: "_init",
            value: function() {
                var t = this.$element.attr("id");
                if (this.$element.attr("aria-hidden", "true"), this.$element.addClass("is-transition-" + this.options.transition), this.$triggers = e(document).find('[data-open="' + t + '"], [data-close="' + t + '"], [data-toggle="' + t + '"]').attr("aria-expanded", "false").attr("aria-controls", t), !0 === this.options.contentOverlay) {
                    var i = document.createElement("div"),
                        n = "fixed" === e(this.$element).css("position") ? "is-overlay-fixed" : "is-overlay-absolute";
                    i.setAttribute("class", "js-off-canvas-overlay " + n), this.$overlay = e(i), "is-overlay-fixed" === n ? e("body").append(this.$overlay) : this.$element.siblings("[data-off-canvas-content]").append(this.$overlay)
                }
                this.options.isRevealed = this.options.isRevealed || new RegExp(this.options.revealClass, "g").test(this.$element[0].className), !0 === this.options.isRevealed && (this.options.revealOn = this.options.revealOn || this.$element[0].className.match(/(reveal-for-medium|reveal-for-large)/g)[0].split("-")[2], this._setMQChecker()), 1 == !this.options.transitionTime && (this.options.transitionTime = 1e3 * parseFloat(window.getComputedStyle(e("[data-off-canvas]")[0]).transitionDuration))
            }
        }, {
            key: "_events",
            value: function() {
                var t;
                (this.$element.off(".zf.trigger .zf.offcanvas").on({
                    "open.zf.trigger": this.open.bind(this),
                    "close.zf.trigger": this.close.bind(this),
                    "toggle.zf.trigger": this.toggle.bind(this),
                    "keydown.zf.offcanvas": this._handleKeyboard.bind(this)
                }), !0 === this.options.closeOnClick) && (this.options.contentOverlay ? this.$overlay : e("[data-off-canvas-content]")).on({
                    "click.zf.offcanvas": this.close.bind(this)
                })
            }
        }, {
            key: "_setMQChecker",
            value: function() {
                var t = this;
                e(window).on("changed.zf.mediaquery", (function() {
                    Foundation.MediaQuery.atLeast(t.options.revealOn) ? t.reveal(!0) : t.reveal(!1)
                })).one("load.zf.offcanvas", (function() {
                    Foundation.MediaQuery.atLeast(t.options.revealOn) && t.reveal(!0)
                }))
            }
        }, {
            key: "reveal",
            value: function(e) {
                var t = this.$element.find("[data-close]");
                e ? (this.close(), this.isRevealed = !0, this.$element.attr("aria-hidden", "false"), this.$element.off("open.zf.trigger toggle.zf.trigger"), t.length && t.hide()) : (this.isRevealed = !1, this.$element.attr("aria-hidden", "true"), this.$element.on({
                    "open.zf.trigger": this.open.bind(this),
                    "toggle.zf.trigger": this.toggle.bind(this)
                }), t.length && t.show())
            }
        }, {
            key: "_stopScrolling",
            value: function(e) {
                return !1
            }
        }, {
            key: "open",
            value: function(t, i) {
                if (!this.$element.hasClass("is-open") && !this.isRevealed) {
                    var n = this;
                    i && (this.$lastTrigger = i), "top" === this.options.forceTo ? window.scrollTo(0, 0) : "bottom" === this.options.forceTo && window.scrollTo(0, document.body.scrollHeight), n.$element.addClass("is-open"), this.$triggers.attr("aria-expanded", "true"), this.$element.attr("aria-hidden", "false").trigger("opened.zf.offcanvas"), !1 === this.options.contentScroll && e("body").addClass("is-off-canvas-open").on("touchmove", this._stopScrolling), !0 === this.options.contentOverlay && this.$overlay.addClass("is-visible"), !0 === this.options.closeOnClick && !0 === this.options.contentOverlay && this.$overlay.addClass("is-closable"), !0 === this.options.autoFocus && this.$element.one(Foundation.transitionend(this.$element), (function() {
                        n.$element.find("a, button").eq(0).focus()
                    })), !0 === this.options.trapFocus && (this.$element.siblings("[data-off-canvas-content]").attr("tabindex", "-1"), Foundation.Keyboard.trapFocus(this.$element))
                }
            }
        }, {
            key: "close",
            value: function(t) {
                var i;
                this.$element.hasClass("is-open") && !this.isRevealed && (this.$element.removeClass("is-open"), this.$element.attr("aria-hidden", "true").trigger("closed.zf.offcanvas"), !1 === this.options.contentScroll && e("body").removeClass("is-off-canvas-open").off("touchmove", this._stopScrolling), !0 === this.options.contentOverlay && this.$overlay.removeClass("is-visible"), !0 === this.options.closeOnClick && !0 === this.options.contentOverlay && this.$overlay.removeClass("is-closable"), this.$triggers.attr("aria-expanded", "false"), !0 === this.options.trapFocus && (this.$element.siblings("[data-off-canvas-content]").removeAttr("tabindex"), Foundation.Keyboard.releaseFocus(this.$element)))
            }
        }, {
            key: "toggle",
            value: function(e, t) {
                this.$element.hasClass("is-open") ? this.close(e, t) : this.open(e, t)
            }
        }, {
            key: "_handleKeyboard",
            value: function(e) {
                var t = this;
                Foundation.Keyboard.handleKey(e, "OffCanvas", {
                    close: function() {
                        return t.close(), t.$lastTrigger.focus(), !0
                    },
                    handled: function() {
                        e.stopPropagation(), e.preventDefault()
                    }
                })
            }
        }, {
            key: "destroy",
            value: function() {
                this.close(), this.$element.off(".zf.trigger .zf.offcanvas"), this.$overlay.off(".zf.offcanvas"), Foundation.unregisterPlugin(this)
            }
        }]), t
    }();
    t.defaults = {
        closeOnClick: !0,
        contentOverlay: !0,
        contentScroll: !0,
        transitionTime: 0,
        transition: "push",
        forceTo: null,
        isRevealed: !1,
        revealOn: null,
        autoFocus: !0,
        revealClass: "reveal-for-",
        trapFocus: !1
    }, Foundation.plugin(t, "OffCanvas")
}(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var i = 0; i < t.length; i++) {
            var n = t[i];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
        }
    }
    return function(t, i, n) {
        return i && e(t.prototype, i), n && e(t, n), t
    }
}();
! function(e) {
    function t() {
        return /iP(ad|hone|od).*OS/.test(window.navigator.userAgent)
    }

    function i() {
        return /Android/.test(window.navigator.userAgent)
    }

    function n() {
        return t() || i()
    }
    var a = function() {
        function t(i, n) {
            _classCallCheck(this, t), this.$element = i, this.options = e.extend({}, t.defaults, this.$element.data(), n), this._init(), Foundation.registerPlugin(this, "Reveal"), Foundation.Keyboard.register("Reveal", {
                ENTER: "open",
                SPACE: "open",
                ESCAPE: "close"
            })
        }
        return _createClass(t, [{
            key: "_init",
            value: function() {
                this.id = this.$element.attr("id"), this.isActive = !1, this.cached = {
                    mq: Foundation.MediaQuery.current
                }, this.isMobile = n(), this.$anchor = e(e('[data-open="' + this.id + '"]').length ? '[data-open="' + this.id + '"]' : '[data-toggle="' + this.id + '"]'), this.$anchor.attr({
                    "aria-controls": this.id,
                    "aria-haspopup": !0,
                    tabindex: 0
                }), (this.options.fullScreen || this.$element.hasClass("full")) && (this.options.fullScreen = !0, this.options.overlay = !1), this.options.overlay && !this.$overlay && (this.$overlay = this._makeOverlay(this.id)), this.$element.attr({
                    role: "dialog",
                    "aria-hidden": !0,
                    "data-yeti-box": this.id,
                    "data-resize": this.id
                }), this.$overlay ? this.$element.detach().appendTo(this.$overlay) : (this.$element.detach().appendTo(e(this.options.appendTo)), this.$element.addClass("without-overlay")), this._events(), this.options.deepLink && window.location.hash === "#" + this.id && e(window).one("load.zf.reveal", this.open.bind(this))
            }
        }, {
            key: "_makeOverlay",
            value: function() {
                return e("<div></div>").addClass("reveal-overlay").appendTo(this.options.appendTo)
            }
        }, {
            key: "_updatePosition",
            value: function() {
                var t, i, n = this.$element.outerWidth(),
                    a = e(window).width(),
                    o = this.$element.outerHeight(),
                    s = e(window).height();
                t = "auto" === this.options.hOffset ? parseInt((a - n) / 2, 10) : parseInt(this.options.hOffset, 10), i = "auto" === this.options.vOffset ? o > s ? parseInt(Math.min(100, s / 10), 10) : parseInt((s - o) / 4, 10) : parseInt(this.options.vOffset, 10), this.$element.css({
                    top: i + "px"
                }), this.$overlay && "auto" === this.options.hOffset || (this.$element.css({
                    left: t + "px"
                }), this.$element.css({
                    margin: "0px"
                }))
            }
        }, {
            key: "_events",
            value: function() {
                var t = this,
                    i = this;
                this.$element.on({
                    "open.zf.trigger": this.open.bind(this),
                    "close.zf.trigger": function(n, a) {
                        if (n.target === i.$element[0] || e(n.target).parents("[data-closable]")[0] === a) return t.close.apply(t)
                    },
                    "toggle.zf.trigger": this.toggle.bind(this),
                    "resizeme.zf.trigger": function() {
                        i._updatePosition()
                    }
                }), this.$anchor.length && this.$anchor.on("keydown.zf.reveal", (function(e) {
                    13 !== e.which && 32 !== e.which || (e.stopPropagation(), e.preventDefault(), i.open())
                })), this.options.closeOnClick && this.options.overlay && this.$overlay.off(".zf.reveal").on("click.zf.reveal", (function(t) {
                    t.target !== i.$element[0] && !e.contains(i.$element[0], t.target) && e.contains(document, t.target) && i.close()
                })), this.options.deepLink && e(window).on("popstate.zf.reveal:" + this.id, this._handleState.bind(this))
            }
        }, {
            key: "_handleState",
            value: function(e) {
                window.location.hash !== "#" + this.id || this.isActive ? this.close() : this.open()
            }
        }, {
            key: "open",
            value: function() {
                function t() {
                    a.isMobile ? (a.originalScrollPos || (a.originalScrollPos = window.pageYOffset), e("html, body").addClass("is-reveal-open")) : e("body").addClass("is-reveal-open")
                }
                var i = this;
                if (this.options.deepLink) {
                    var n = "#" + this.id;
                    window.history.pushState ? window.history.pushState(null, null, n) : window.location.hash = n
                }
                this.isActive = !0, this.$element.css({
                    visibility: "hidden"
                }).show().scrollTop(0), this.options.overlay && this.$overlay.css({
                    visibility: "hidden"
                }).show(), this._updatePosition(), this.$element.hide().css({
                    visibility: ""
                }), this.$overlay && (this.$overlay.css({
                    visibility: ""
                }).hide(), this.$element.hasClass("fast") ? this.$overlay.addClass("fast") : this.$element.hasClass("slow") && this.$overlay.addClass("slow")), this.options.multipleOpened || this.$element.trigger("closeme.zf.reveal", this.id);
                var a = this;
                this.options.animationIn ? function() {
                    var e = function() {
                        a.$element.attr({
                            "aria-hidden": !1,
                            tabindex: -1
                        }).focus(), t(), Foundation.Keyboard.trapFocus(a.$element)
                    };
                    i.options.overlay && Foundation.Motion.animateIn(i.$overlay, "fade-in"), Foundation.Motion.animateIn(i.$element, i.options.animationIn, (function() {
                        i.$element && (i.focusableElements = Foundation.Keyboard.findFocusable(i.$element), e())
                    }))
                }() : (this.options.overlay && this.$overlay.show(0), this.$element.show(this.options.showDelay)), this.$element.attr({
                    "aria-hidden": !1,
                    tabindex: -1
                }).focus(), Foundation.Keyboard.trapFocus(this.$element), this.$element.trigger("open.zf.reveal"), t(), setTimeout((function() {
                    i._extraHandlers()
                }), 0)
            }
        }, {
            key: "_extraHandlers",
            value: function() {
                var t = this;
                this.$element && (this.focusableElements = Foundation.Keyboard.findFocusable(this.$element), this.options.overlay || !this.options.closeOnClick || this.options.fullScreen || e("body").on("click.zf.reveal", (function(i) {
                    i.target !== t.$element[0] && !e.contains(t.$element[0], i.target) && e.contains(document, i.target) && t.close()
                })), this.options.closeOnEsc && e(window).on("keydown.zf.reveal", (function(e) {
                    Foundation.Keyboard.handleKey(e, "Reveal", {
                        close: function() {
                            t.options.closeOnEsc && (t.close(), t.$anchor.focus())
                        }
                    })
                })), this.$element.on("keydown.zf.reveal", (function(i) {
                    var n = e(this);
                    Foundation.Keyboard.handleKey(i, "Reveal", {
                        open: function() {
                            t.$element.find(":focus").is(t.$element.find("[data-close]")) ? setTimeout((function() {
                                t.$anchor.focus()
                            }), 1) : n.is(t.focusableElements) && t.open()
                        },
                        close: function() {
                            t.options.closeOnEsc && (t.close(), t.$anchor.focus())
                        },
                        handled: function(e) {
                            e && i.preventDefault()
                        }
                    })
                })))
            }
        }, {
            key: "close",
            value: function() {
                function t() {
                    i.isMobile ? (e("html, body").removeClass("is-reveal-open"), i.originalScrollPos && (e("body").scrollTop(i.originalScrollPos), i.originalScrollPos = null)) : e("body").removeClass("is-reveal-open"), Foundation.Keyboard.releaseFocus(i.$element), i.$element.attr("aria-hidden", !0), i.$element.trigger("closed.zf.reveal")
                }
                if (!this.isActive || !this.$element.is(":visible")) return !1;
                var i = this;
                this.options.animationOut ? (this.options.overlay ? Foundation.Motion.animateOut(this.$overlay, "fade-out", t) : t(), Foundation.Motion.animateOut(this.$element, this.options.animationOut)) : (this.options.overlay ? this.$overlay.hide(0, t) : t(), this.$element.hide(this.options.hideDelay)), this.options.closeOnEsc && e(window).off("keydown.zf.reveal"), !this.options.overlay && this.options.closeOnClick && e("body").off("click.zf.reveal"), this.$element.off("keydown.zf.reveal"), this.options.resetOnClose && this.$element.html(this.$element.html()), this.isActive = !1, i.options.deepLink && (window.history.replaceState ? window.history.replaceState("", document.title, window.location.href.replace("#" + this.id, "")) : window.location.hash = "")
            }
        }, {
            key: "toggle",
            value: function() {
                this.isActive ? this.close() : this.open()
            }
        }, {
            key: "destroy",
            value: function() {
                this.options.overlay && (this.$element.appendTo(e(this.options.appendTo)), this.$overlay.hide().off().remove()), this.$element.hide().off(), this.$anchor.off(".zf"), e(window).off(".zf.reveal:" + this.id), Foundation.unregisterPlugin(this)
            }
        }]), t
    }();
    a.defaults = {
        animationIn: "",
        animationOut: "",
        showDelay: 0,
        hideDelay: 0,
        closeOnClick: !0,
        closeOnEsc: !0,
        multipleOpened: !1,
        vOffset: "auto",
        hOffset: "auto",
        fullScreen: !1,
        btmOffsetPct: 10,
        overlay: !0,
        resetOnClose: !1,
        deepLink: !1,
        appendTo: "body"
    }, Foundation.plugin(a, "Reveal")
}(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var i = 0; i < t.length; i++) {
            var n = t[i];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
        }
    }
    return function(t, i, n) {
        return i && e(t.prototype, i), n && e(t, n), t
    }
}();
! function(e) {
    function t(e) {
        return parseInt(window.getComputedStyle(document.body, null).fontSize, 10) * e
    }
    var i = function() {
        function i(t, n) {
            _classCallCheck(this, i), this.$element = t, this.options = e.extend({}, i.defaults, this.$element.data(), n), this._init(), Foundation.registerPlugin(this, "Sticky")
        }
        return _createClass(i, [{
            key: "_init",
            value: function() {
                var t = this.$element.parent("[data-sticky-container]"),
                    i = this.$element[0].id || Foundation.GetYoDigits(6, "sticky"),
                    n = this;
                t.length || (this.wasWrapped = !0), this.$container = t.length ? t : e(this.options.container).wrapInner(this.$element), this.$container.addClass(this.options.containerClass), this.$element.addClass(this.options.stickyClass).attr({
                    "data-resize": i
                }), this.scrollCount = this.options.checkEvery, this.isStuck = !1, e(window).one("load.zf.sticky", (function() {
                    n.containerHeight = "none" == n.$element.css("display") ? 0 : n.$element[0].getBoundingClientRect().height, n.$container.css("height", n.containerHeight), n.elemHeight = n.containerHeight, "" !== n.options.anchor ? n.$anchor = e("#" + n.options.anchor) : n._parsePoints(), n._setSizes((function() {
                        var e = window.pageYOffset;
                        n._calc(!1, e), n.isStuck || n._removeSticky(!(e >= n.topPoint))
                    })), n._events(i.split("-").reverse().join("-"))
                }))
            }
        }, {
            key: "_parsePoints",
            value: function() {
                for (var t, i, n = ["" == this.options.topAnchor ? 1 : this.options.topAnchor, "" == this.options.btmAnchor ? document.documentElement.scrollHeight : this.options.btmAnchor], a = {}, o = 0, s = n.length; o < s && n[o]; o++) {
                    var r;
                    if ("number" == typeof n[o]) r = n[o];
                    else {
                        var l = n[o].split(":"),
                            c = e("#" + l[0]);
                        r = c.offset().top, l[1] && "bottom" === l[1].toLowerCase() && (r += c[0].getBoundingClientRect().height)
                    }
                    a[o] = r
                }
                this.points = a
            }
        }, {
            key: "_events",
            value: function(t) {
                var i = this,
                    n = this.scrollListener = "scroll.zf." + t;
                this.isOn || (this.canStick && (this.isOn = !0, e(window).off(n).on(n, (function(e) {
                    0 === i.scrollCount ? (i.scrollCount = i.options.checkEvery, i._setSizes((function() {
                        i._calc(!1, window.pageYOffset)
                    }))) : (i.scrollCount--, i._calc(!1, window.pageYOffset))
                }))), this.$element.off("resizeme.zf.trigger").on("resizeme.zf.trigger", (function(e, a) {
                    i._setSizes((function() {
                        i._calc(!1), i.canStick ? i.isOn || i._events(t) : i.isOn && i._pauseListeners(n)
                    }))
                })))
            }
        }, {
            key: "_pauseListeners",
            value: function(t) {
                this.isOn = !1, e(window).off(t), this.$element.trigger("pause.zf.sticky")
            }
        }, {
            key: "_calc",
            value: function(e, t) {
                return e && this._setSizes(), this.canStick ? (t || (t = window.pageYOffset), void(t >= this.topPoint ? t <= this.bottomPoint ? this.isStuck || this._setSticky() : this.isStuck && this._removeSticky(!1) : this.isStuck && this._removeSticky(!0))) : (this.isStuck && this._removeSticky(!0), !1)
            }
        }, {
            key: "_setSticky",
            value: function() {
                var e = this,
                    t = this.options.stickTo,
                    i = "top" === t ? "marginTop" : "marginBottom",
                    n = "top" === t ? "bottom" : "top",
                    a = {};
                a[i] = this.options[i] + "em", a[t] = 0, a[n] = "auto", this.isStuck = !0, this.$element.removeClass("is-anchored is-at-" + n).addClass("is-stuck is-at-" + t).css(a).trigger("sticky.zf.stuckto:" + t), this.$element.on("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd", (function() {
                    e._setSizes()
                }))
            }
        }, {
            key: "_removeSticky",
            value: function(e) {
                var t = this.options.stickTo,
                    i = "top" === t,
                    n = {},
                    a = (this.points ? this.points[1] - this.points[0] : this.anchorHeight) - this.elemHeight,
                    o, s = e ? "top" : "bottom";
                n[i ? "marginTop" : "marginBottom"] = 0, n.bottom = "auto", n.top = e ? 0 : a, this.isStuck = !1, this.$element.removeClass("is-stuck is-at-" + t).addClass("is-anchored is-at-" + s).css(n).trigger("sticky.zf.unstuckfrom:" + s)
            }
        }, {
            key: "_setSizes",
            value: function(e) {
                this.canStick = Foundation.MediaQuery.is(this.options.stickyOn), this.canStick || e && "function" == typeof e && e();
                var t = this.$container[0].getBoundingClientRect().width,
                    i = window.getComputedStyle(this.$container[0]),
                    n = parseInt(i["padding-left"], 10),
                    a = parseInt(i["padding-right"], 10);
                this.$anchor && this.$anchor.length ? this.anchorHeight = this.$anchor[0].getBoundingClientRect().height : this._parsePoints(), this.$element.css({
                    "max-width": t - n - a + "px"
                });
                var o = this.$element[0].getBoundingClientRect().height || this.containerHeight;
                if ("none" == this.$element.css("display") && (o = 0), this.containerHeight = o, this.$container.css({
                        height: o
                    }), this.elemHeight = o, !this.isStuck && this.$element.hasClass("is-at-bottom")) {
                    var s = (this.points ? this.points[1] - this.$container.offset().top : this.anchorHeight) - this.elemHeight;
                    this.$element.css("top", s)
                }
                this._setBreakPoints(o, (function() {
                    e && "function" == typeof e && e()
                }))
            }
        }, {
            key: "_setBreakPoints",
            value: function(e, i) {
                if (!this.canStick) {
                    if (!i || "function" != typeof i) return !1;
                    i()
                }
                var n = t(this.options.marginTop),
                    a = t(this.options.marginBottom),
                    o = this.points ? this.points[0] : this.$anchor.offset().top,
                    s = this.points ? this.points[1] : o + this.anchorHeight,
                    r = window.innerHeight;
                "top" === this.options.stickTo ? (o -= n, s -= e + n) : "bottom" === this.options.stickTo && (o -= r - (e + a), s -= r - a), this.topPoint = o, this.bottomPoint = s, i && "function" == typeof i && i()
            }
        }, {
            key: "destroy",
            value: function() {
                this._removeSticky(!0), this.$element.removeClass(this.options.stickyClass + " is-anchored is-at-top").css({
                    height: "",
                    top: "",
                    bottom: "",
                    "max-width": ""
                }).off("resizeme.zf.trigger"), this.$anchor && this.$anchor.length && this.$anchor.off("change.zf.sticky"), e(window).off(this.scrollListener), this.wasWrapped ? this.$element.unwrap() : this.$container.removeClass(this.options.containerClass).css({
                    height: ""
                }), Foundation.unregisterPlugin(this)
            }
        }]), i
    }();
    i.defaults = {
        container: "<div data-sticky-container></div>",
        stickTo: "top",
        anchor: "",
        topAnchor: "",
        btmAnchor: "",
        marginTop: 1,
        marginBottom: 1,
        stickyOn: "medium",
        stickyClass: "sticky",
        containerClass: "sticky-container",
        checkEvery: -1
    }, Foundation.plugin(i, "Sticky")
}(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var i = 0; i < t.length; i++) {
            var n = t[i];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
        }
    }
    return function(t, i, n) {
        return i && e(t.prototype, i), n && e(t, n), t
    }
}();
! function(e) {
    var t = function() {
        function t(i, n) {
            _classCallCheck(this, t), this.$element = i, this.options = e.extend({}, t.defaults, n), this.rules = [], this.currentPath = "", this._init(), this._events(), Foundation.registerPlugin(this, "Interchange")
        }
        return _createClass(t, [{
            key: "_init",
            value: function() {
                this._addBreakpoints(), this._generateRules(), this._reflow()
            }
        }, {
            key: "_events",
            value: function() {
                var t = this;
                e(window).on("resize.zf.interchange", Foundation.util.throttle((function() {
                    t._reflow()
                }), 50))
            }
        }, {
            key: "_reflow",
            value: function() {
                var e;
                for (var t in this.rules)
                    if (this.rules.hasOwnProperty(t)) {
                        var i = this.rules[t];
                        window.matchMedia(i.query).matches && (e = i)
                    } e && this.replace(e.path)
            }
        }, {
            key: "_addBreakpoints",
            value: function() {
                for (var e in Foundation.MediaQuery.queries)
                    if (Foundation.MediaQuery.queries.hasOwnProperty(e)) {
                        var i = Foundation.MediaQuery.queries[e];
                        t.SPECIAL_QUERIES[i.name] = i.value
                    }
            }
        }, {
            key: "_generateRules",
            value: function(e) {
                var i, n = [];
                for (var a in i = this.options.rules ? this.options.rules : this.$element.data("interchange").match(/\[.*?\]/g))
                    if (i.hasOwnProperty(a)) {
                        var o = i[a].slice(1, -1).split(", "),
                            s = o.slice(0, -1).join(""),
                            r = o[o.length - 1];
                        t.SPECIAL_QUERIES[r] && (r = t.SPECIAL_QUERIES[r]), n.push({
                            path: s,
                            query: r
                        })
                    } this.rules = n
            }
        }, {
            key: "replace",
            value: function(t) {
                if (this.currentPath !== t) {
                    var i = this,
                        n = "replaced.zf.interchange";
                    "IMG" === this.$element[0].nodeName ? this.$element.attr("src", t).on("load", (function() {
                        i.currentPath = t
                    })).trigger(n) : t.match(/\.(gif|jpg|jpeg|png|svg|tiff)([?#].*)?/i) ? this.$element.css({
                        "background-image": "url(" + t + ")"
                    }).trigger(n) : e.get(t, (function(a) {
                        i.$element.html(a).trigger(n), e(a).foundation(), i.currentPath = t
                    }))
                }
            }
        }, {
            key: "destroy",
            value: function() {}
        }]), t
    }();
    t.defaults = {
        rules: null
    }, t.SPECIAL_QUERIES = {
        landscape: "screen and (orientation: landscape)",
        portrait: "screen and (orientation: portrait)",
        retina: "only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx)"
    }, Foundation.plugin(t, "Interchange")
}(jQuery);
var _createClass = function() {
    function e(e, t) {
        for (var i = 0; i < t.length; i++) {
            var n = t[i];
            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
        }
    }
    return function(t, i, n) {
        return i && e(t.prototype, i), n && e(t, n), t
    }
}();
! function(e) {
    var t = function() {
        function t(i, n) {
            _classCallCheck(this, t), this.$element = i, this.options = e.extend({}, t.defaults, this.$element.data(), n), this._init(), Foundation.registerPlugin(this, "Equalizer")
        }
        return _createClass(t, [{
            key: "_init",
            value: function() {
                var t = this.$element.attr("data-equalizer") || "",
                    i = this.$element.find('[data-equalizer-watch="' + t + '"]');
                this.$watched = i.length ? i : this.$element.find("[data-equalizer-watch]"), this.$element.attr("data-resize", t || Foundation.GetYoDigits(6, "eq")), this.$element.attr("data-mutate", t || Foundation.GetYoDigits(6, "eq")), this.hasNested = this.$element.find("[data-equalizer]").length > 0, this.isNested = this.$element.parentsUntil(document.body, "[data-equalizer]").length > 0, this.isOn = !1, this._bindHandler = {
                    onResizeMeBound: this._onResizeMe.bind(this),
                    onPostEqualizedBound: this._onPostEqualized.bind(this)
                };
                var n, a = this.$element.find("img");
                this.options.equalizeOn ? (n = this._checkMQ(), e(window).on("changed.zf.mediaquery", this._checkMQ.bind(this))) : this._events(), (void 0 !== n && !1 === n || void 0 === n) && (a.length ? Foundation.onImagesLoaded(a, this._reflow.bind(this)) : this._reflow())
            }
        }, {
            key: "_pauseEvents",
            value: function() {
                this.isOn = !1, this.$element.off({
                    ".zf.equalizer": this._bindHandler.onPostEqualizedBound,
                    "resizeme.zf.trigger": this._bindHandler.onResizeMeBound,
                    "mutateme.zf.trigger": this._bindHandler.onResizeMeBound
                })
            }
        }, {
            key: "_onResizeMe",
            value: function(e) {
                this._reflow()
            }
        }, {
            key: "_onPostEqualized",
            value: function(e) {
                e.target !== this.$element[0] && this._reflow()
            }
        }, {
            key: "_events",
            value: function() {
                this._pauseEvents(), this.hasNested ? this.$element.on("postequalized.zf.equalizer", this._bindHandler.onPostEqualizedBound) : (this.$element.on("resizeme.zf.trigger", this._bindHandler.onResizeMeBound), this.$element.on("mutateme.zf.trigger", this._bindHandler.onResizeMeBound)), this.isOn = !0
            }
        }, {
            key: "_checkMQ",
            value: function() {
                var e = !Foundation.MediaQuery.is(this.options.equalizeOn);
                return e ? this.isOn && (this._pauseEvents(), this.$watched.css("height", "auto")) : this.isOn || this._events(), e
            }
        }, {
            key: "_killswitch",
            value: function() {}
        }, {
            key: "_reflow",
            value: function() {
                return !this.options.equalizeOnStack && this._isStacked() ? (this.$watched.css("height", "auto"), !1) : void(this.options.equalizeByRow ? this.getHeightsByRow(this.applyHeightByRow.bind(this)) : this.getHeights(this.applyHeight.bind(this)))
            }
        }, {
            key: "_isStacked",
            value: function() {
                return !this.$watched[0] || !this.$watched[1] || this.$watched[0].getBoundingClientRect().top !== this.$watched[1].getBoundingClientRect().top
            }
        }, {
            key: "getHeights",
            value: function(e) {
                for (var t = [], i = 0, n = this.$watched.length; i < n; i++) this.$watched[i].style.height = "auto", t.push(this.$watched[i].offsetHeight);
                e(t)
            }
        }, {
            key: "getHeightsByRow",
            value: function(t) {
                var i = this.$watched.length ? this.$watched.first().offset().top : 0,
                    n = [],
                    a = 0;
                n[a] = [];
                for (var o = 0, s = this.$watched.length; o < s; o++) {
                    this.$watched[o].style.height = "auto";
                    var r = e(this.$watched[o]).offset().top;
                    r != i && (n[++a] = [], i = r), n[a].push([this.$watched[o], this.$watched[o].offsetHeight])
                }
                for (var l = 0, c = n.length; l < c; l++) {
                    var u = e(n[l]).map((function() {
                            return this[1]
                        })).get(),
                        d = Math.max.apply(null, u);
                    n[l].push(d)
                }
                t(n)
            }
        }, {
            key: "applyHeight",
            value: function(e) {
                var t = Math.max.apply(null, e);
                this.$element.trigger("preequalized.zf.equalizer"), this.$watched.css("height", t), this.$element.trigger("postequalized.zf.equalizer")
            }
        }, {
            key: "applyHeightByRow",
            value: function(t) {
                this.$element.trigger("preequalized.zf.equalizer");
                for (var i = 0, n = t.length; i < n; i++) {
                    var a = t[i].length,
                        o = t[i][a - 1];
                    if (a <= 2) e(t[i][0][0]).css({
                        height: "auto"
                    });
                    else {
                        this.$element.trigger("preequalizedrow.zf.equalizer");
                        for (var s = 0, r = a - 1; s < r; s++) e(t[i][s][0]).css({
                            height: o
                        });
                        this.$element.trigger("postequalizedrow.zf.equalizer")
                    }
                }
                this.$element.trigger("postequalized.zf.equalizer")
            }
        }, {
            key: "destroy",
            value: function() {
                this._pauseEvents(), this.$watched.css("height", "auto"), Foundation.unregisterPlugin(this)
            }
        }]), t
    }();
    t.defaults = {
        equalizeOnStack: !1,
        equalizeByRow: !1,
        equalizeOn: ""
    }, Foundation.plugin(t, "Equalizer")
}(jQuery),
function() {
    for (var e, t = function e() {}, i = ["assert", "clear", "count", "debug", "dir", "dirxml", "error", "exception", "group", "groupCollapsed", "groupEnd", "info", "log", "markTimeline", "profile", "profileEnd", "table", "time", "timeEnd", "timeStamp", "trace", "warn"], n = i.length, a = window.console = window.console || {}; n--;) a[e = i[n]] || (a[e] = t)
}(),
/*! jQuery UI - v1.11.3 - 2015-02-17
 * http://jqueryui.com
 * Includes: core.js, widget.js, mouse.js, slider.js
 * Copyright 2015 jQuery Foundation and other contributors; Licensed MIT */
function(e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : e(jQuery)
}((function(e) {
    function t(t, n) {
        var a, o, s, r = t.nodeName.toLowerCase();
        return "area" === r ? (o = (a = t.parentNode).name, !(!t.href || !o || "map" !== a.nodeName.toLowerCase()) && (!!(s = e("img[usemap='#" + o + "']")[0]) && i(s))) : (/^(input|select|textarea|button|object)$/.test(r) ? !t.disabled : "a" === r && t.href || n) && i(t)
    }

    function i(t) {
        return e.expr.filters.visible(t) && !e(t).parents().addBack().filter((function() {
            return "hidden" === e.css(this, "visibility")
        })).length
    }
    e.ui = e.ui || {}, e.extend(e.ui, {
        version: "1.11.3",
        keyCode: {
            BACKSPACE: 8,
            COMMA: 188,
            DELETE: 46,
            DOWN: 40,
            END: 35,
            ENTER: 13,
            ESCAPE: 27,
            HOME: 36,
            LEFT: 37,
            PAGE_DOWN: 34,
            PAGE_UP: 33,
            PERIOD: 190,
            RIGHT: 39,
            SPACE: 32,
            TAB: 9,
            UP: 38
        }
    }), e.fn.extend({
        scrollParent: function(t) {
            var i = this.css("position"),
                n = "absolute" === i,
                a = t ? /(auto|scroll|hidden)/ : /(auto|scroll)/,
                o = this.parents().filter((function() {
                    var t = e(this);
                    return (!n || "static" !== t.css("position")) && a.test(t.css("overflow") + t.css("overflow-y") + t.css("overflow-x"))
                })).eq(0);
            return "fixed" !== i && o.length ? o : e(this[0].ownerDocument || document)
        },
        uniqueId: function() {
            var e = 0;
            return function() {
                return this.each((function() {
                    this.id || (this.id = "ui-id-" + ++e)
                }))
            }
        }(),
        removeUniqueId: function() {
            return this.each((function() {
                /^ui-id-\d+$/.test(this.id) && e(this).removeAttr("id")
            }))
        }
    }), e.extend(e.expr[":"], {
        data: e.expr.createPseudo ? e.expr.createPseudo((function(t) {
            return function(i) {
                return !!e.data(i, t)
            }
        })) : function(t, i, n) {
            return !!e.data(t, n[3])
        },
        focusable: function(i) {
            return t(i, !isNaN(e.attr(i, "tabindex")))
        },
        tabbable: function(i) {
            var n = e.attr(i, "tabindex"),
                a = isNaN(n);
            return (a || n >= 0) && t(i, !a)
        }
    }), e("<a>").outerWidth(1).jquery || e.each(["Width", "Height"], (function(t, i) {
        function n(t, i, n, o) {
            return e.each(a, (function() {
                i -= parseFloat(e.css(t, "padding" + this)) || 0, n && (i -= parseFloat(e.css(t, "border" + this + "Width")) || 0), o && (i -= parseFloat(e.css(t, "margin" + this)) || 0)
            })), i
        }
        var a = "Width" === i ? ["Left", "Right"] : ["Top", "Bottom"],
            o = i.toLowerCase(),
            s = {
                innerWidth: e.fn.innerWidth,
                innerHeight: e.fn.innerHeight,
                outerWidth: e.fn.outerWidth,
                outerHeight: e.fn.outerHeight
            };
        e.fn["inner" + i] = function(t) {
            return void 0 === t ? s["inner" + i].call(this) : this.each((function() {
                e(this).css(o, n(this, t) + "px")
            }))
        }, e.fn["outer" + i] = function(t, a) {
            return "number" != typeof t ? s["outer" + i].call(this, t) : this.each((function() {
                e(this).css(o, n(this, t, !0, a) + "px")
            }))
        }
    })), e.fn.addBack || (e.fn.addBack = function(e) {
        return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
    }), e("<a>").data("a-b", "a").removeData("a-b").data("a-b") && (e.fn.removeData = function(t) {
        return function(i) {
            return arguments.length ? t.call(this, e.camelCase(i)) : t.call(this)
        }
    }(e.fn.removeData)), e.ui.ie = !!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()), e.fn.extend({
        focus: function(t) {
            return function(i, n) {
                return "number" == typeof i ? this.each((function() {
                    var t = this;
                    setTimeout((function() {
                        e(t).focus(), n && n.call(t)
                    }), i)
                })) : t.apply(this, arguments)
            }
        }(e.fn.focus),
        disableSelection: function() {
            var e = "onselectstart" in document.createElement("div") ? "selectstart" : "mousedown";
            return function() {
                return this.bind(e + ".ui-disableSelection", (function(e) {
                    e.preventDefault()
                }))
            }
        }(),
        enableSelection: function() {
            return this.unbind(".ui-disableSelection")
        },
        zIndex: function(t) {
            if (void 0 !== t) return this.css("zIndex", t);
            if (this.length)
                for (var i, n, a = e(this[0]); a.length && a[0] !== document;) {
                    if (("absolute" === (i = a.css("position")) || "relative" === i || "fixed" === i) && (n = parseInt(a.css("zIndex"), 10), !isNaN(n) && 0 !== n)) return n;
                    a = a.parent()
                }
            return 0
        }
    }), e.ui.plugin = {
        add: function(t, i, n) {
            var a, o = e.ui[t].prototype;
            for (a in n) o.plugins[a] = o.plugins[a] || [], o.plugins[a].push([i, n[a]])
        },
        call: function(e, t, i, n) {
            var a, o = e.plugins[t];
            if (o && (n || e.element[0].parentNode && 11 !== e.element[0].parentNode.nodeType))
                for (a = 0; o.length > a; a++) e.options[o[a][0]] && o[a][1].apply(e.element, i)
        }
    };
    var n = 0,
        a = Array.prototype.slice;
    e.cleanData = function(t) {
        return function(i) {
            var n, a, o;
            for (o = 0; null != (a = i[o]); o++) try {
                (n = e._data(a, "events")) && n.remove && e(a).triggerHandler("remove")
            } catch (e) {}
            t(i)
        }
    }(e.cleanData), e.widget = function(t, i, n) {
        var a, o, s, r, l = {},
            c = t.split(".")[0];
        return t = t.split(".")[1], a = c + "-" + t, n || (n = i, i = e.Widget), e.expr[":"][a.toLowerCase()] = function(t) {
            return !!e.data(t, a)
        }, e[c] = e[c] || {}, o = e[c][t], s = e[c][t] = function(e, t) {
            return this._createWidget ? void(arguments.length && this._createWidget(e, t)) : new s(e, t)
        }, e.extend(s, o, {
            version: n.version,
            _proto: e.extend({}, n),
            _childConstructors: []
        }), (r = new i).options = e.widget.extend({}, r.options), e.each(n, (function(t, n) {
            return e.isFunction(n) ? void(l[t] = function() {
                var e = function() {
                        return i.prototype[t].apply(this, arguments)
                    },
                    a = function(e) {
                        return i.prototype[t].apply(this, e)
                    };
                return function() {
                    var t, i = this._super,
                        o = this._superApply;
                    return this._super = e, this._superApply = a, t = n.apply(this, arguments), this._super = i, this._superApply = o, t
                }
            }()) : void(l[t] = n)
        })), s.prototype = e.widget.extend(r, {
            widgetEventPrefix: o && r.widgetEventPrefix || t
        }, l, {
            constructor: s,
            namespace: c,
            widgetName: t,
            widgetFullName: a
        }), o ? (e.each(o._childConstructors, (function(t, i) {
            var n = i.prototype;
            e.widget(n.namespace + "." + n.widgetName, s, i._proto)
        })), delete o._childConstructors) : i._childConstructors.push(s), e.widget.bridge(t, s), s
    }, e.widget.extend = function(t) {
        for (var i, n, o = a.call(arguments, 1), s = 0, r = o.length; r > s; s++)
            for (i in o[s]) n = o[s][i], o[s].hasOwnProperty(i) && void 0 !== n && (t[i] = e.isPlainObject(n) ? e.isPlainObject(t[i]) ? e.widget.extend({}, t[i], n) : e.widget.extend({}, n) : n);
        return t
    }, e.widget.bridge = function(t, i) {
        var n = i.prototype.widgetFullName || t;
        e.fn[t] = function(o) {
            var s = "string" == typeof o,
                r = a.call(arguments, 1),
                l = this;
            return s ? this.each((function() {
                var i, a = e.data(this, n);
                return "instance" === o ? (l = a, !1) : a ? e.isFunction(a[o]) && "_" !== o.charAt(0) ? (i = a[o].apply(a, r)) !== a && void 0 !== i ? (l = i && i.jquery ? l.pushStack(i.get()) : i, !1) : void 0 : e.error("no such method '" + o + "' for " + t + " widget instance") : e.error("cannot call methods on " + t + " prior to initialization; attempted to call method '" + o + "'")
            })) : (r.length && (o = e.widget.extend.apply(null, [o].concat(r))), this.each((function() {
                var t = e.data(this, n);
                t ? (t.option(o || {}), t._init && t._init()) : e.data(this, n, new i(o, this))
            }))), l
        }
    }, e.Widget = function() {}, e.Widget._childConstructors = [], e.Widget.prototype = {
        widgetName: "widget",
        widgetEventPrefix: "",
        defaultElement: "<div>",
        options: {
            disabled: !1,
            create: null
        },
        _createWidget: function(t, i) {
            i = e(i || this.defaultElement || this)[0], this.element = e(i), this.uuid = n++, this.eventNamespace = "." + this.widgetName + this.uuid, this.bindings = e(), this.hoverable = e(), this.focusable = e(), i !== this && (e.data(i, this.widgetFullName, this), this._on(!0, this.element, {
                remove: function(e) {
                    e.target === i && this.destroy()
                }
            }), this.document = e(i.style ? i.ownerDocument : i.document || i), this.window = e(this.document[0].defaultView || this.document[0].parentWindow)), this.options = e.widget.extend({}, this.options, this._getCreateOptions(), t), this._create(), this._trigger("create", null, this._getCreateEventData()), this._init()
        },
        _getCreateOptions: e.noop,
        _getCreateEventData: e.noop,
        _create: e.noop,
        _init: e.noop,
        destroy: function() {
            this._destroy(), this.element.unbind(this.eventNamespace).removeData(this.widgetFullName).removeData(e.camelCase(this.widgetFullName)), this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName + "-disabled ui-state-disabled"), this.bindings.unbind(this.eventNamespace), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")
        },
        _destroy: e.noop,
        widget: function() {
            return this.element
        },
        option: function(t, i) {
            var n, a, o, s = t;
            if (0 === arguments.length) return e.widget.extend({}, this.options);
            if ("string" == typeof t)
                if (s = {}, n = t.split("."), t = n.shift(), n.length) {
                    for (a = s[t] = e.widget.extend({}, this.options[t]), o = 0; n.length - 1 > o; o++) a[n[o]] = a[n[o]] || {}, a = a[n[o]];
                    if (t = n.pop(), 1 === arguments.length) return void 0 === a[t] ? null : a[t];
                    a[t] = i
                } else {
                    if (1 === arguments.length) return void 0 === this.options[t] ? null : this.options[t];
                    s[t] = i
                } return this._setOptions(s), this
        },
        _setOptions: function(e) {
            var t;
            for (t in e) this._setOption(t, e[t]);
            return this
        },
        _setOption: function(e, t) {
            return this.options[e] = t, "disabled" === e && (this.widget().toggleClass(this.widgetFullName + "-disabled", !!t), t && (this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus"))), this
        },
        enable: function() {
            return this._setOptions({
                disabled: !1
            })
        },
        disable: function() {
            return this._setOptions({
                disabled: !0
            })
        },
        _on: function(t, i, n) {
            var a, o = this;
            "boolean" != typeof t && (n = i, i = t, t = !1), n ? (i = a = e(i), this.bindings = this.bindings.add(i)) : (n = i, i = this.element, a = this.widget()), e.each(n, (function(n, s) {
                function r() {
                    return t || !0 !== o.options.disabled && !e(this).hasClass("ui-state-disabled") ? ("string" == typeof s ? o[s] : s).apply(o, arguments) : void 0
                }
                "string" != typeof s && (r.guid = s.guid = s.guid || r.guid || e.guid++);
                var l = n.match(/^([\w:-]*)\s*(.*)$/),
                    c = l[1] + o.eventNamespace,
                    u = l[2];
                u ? a.delegate(u, c, r) : i.bind(c, r)
            }))
        },
        _off: function(t, i) {
            i = (i || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace, t.unbind(i).undelegate(i), this.bindings = e(this.bindings.not(t).get()), this.focusable = e(this.focusable.not(t).get()), this.hoverable = e(this.hoverable.not(t).get())
        },
        _delay: function(e, t) {
            function i() {
                return ("string" == typeof e ? n[e] : e).apply(n, arguments)
            }
            var n = this;
            return setTimeout(i, t || 0)
        },
        _hoverable: function(t) {
            this.hoverable = this.hoverable.add(t), this._on(t, {
                mouseenter: function(t) {
                    e(t.currentTarget).addClass("ui-state-hover")
                },
                mouseleave: function(t) {
                    e(t.currentTarget).removeClass("ui-state-hover")
                }
            })
        },
        _focusable: function(t) {
            this.focusable = this.focusable.add(t), this._on(t, {
                focusin: function(t) {
                    e(t.currentTarget).addClass("ui-state-focus")
                },
                focusout: function(t) {
                    e(t.currentTarget).removeClass("ui-state-focus")
                }
            })
        },
        _trigger: function(t, i, n) {
            var a, o, s = this.options[t];
            if (n = n || {}, (i = e.Event(i)).type = (t === this.widgetEventPrefix ? t : this.widgetEventPrefix + t).toLowerCase(), i.target = this.element[0], o = i.originalEvent)
                for (a in o) a in i || (i[a] = o[a]);
            return this.element.trigger(i, n), !(e.isFunction(s) && !1 === s.apply(this.element[0], [i].concat(n)) || i.isDefaultPrevented())
        }
    }, e.each({
        show: "fadeIn",
        hide: "fadeOut"
    }, (function(t, i) {
        e.Widget.prototype["_" + t] = function(n, a, o) {
            "string" == typeof a && (a = {
                effect: a
            });
            var s, r = a ? !0 === a || "number" == typeof a ? i : a.effect || i : t;
            "number" == typeof(a = a || {}) && (a = {
                duration: a
            }), s = !e.isEmptyObject(a), a.complete = o, a.delay && n.delay(a.delay), s && e.effects && e.effects.effect[r] ? n[t](a) : r !== t && n[r] ? n[r](a.duration, a.easing, o) : n.queue((function(i) {
                e(this)[t](), o && o.call(n[0]), i()
            }))
        }
    })), e.widget;
    var o = !1;
    e(document).mouseup((function() {
        o = !1
    })), e.widget("ui.mouse", {
        version: "1.11.3",
        options: {
            cancel: "input,textarea,button,select,option",
            distance: 1,
            delay: 0
        },
        _mouseInit: function() {
            var t = this;
            this.element.bind("mousedown." + this.widgetName, (function(e) {
                return t._mouseDown(e)
            })).bind("click." + this.widgetName, (function(i) {
                return !0 === e.data(i.target, t.widgetName + ".preventClickEvent") ? (e.removeData(i.target, t.widgetName + ".preventClickEvent"), i.stopImmediatePropagation(), !1) : void 0
            })), this.started = !1
        },
        _mouseDestroy: function() {
            this.element.unbind("." + this.widgetName), this._mouseMoveDelegate && this.document.unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate)
        },
        _mouseDown: function(t) {
            if (!o) {
                this._mouseMoved = !1, this._mouseStarted && this._mouseUp(t), this._mouseDownEvent = t;
                var i = this,
                    n = 1 === t.which,
                    a = !("string" != typeof this.options.cancel || !t.target.nodeName) && e(t.target).closest(this.options.cancel).length;
                return !(n && !a && this._mouseCapture(t)) || (this.mouseDelayMet = !this.options.delay, this.mouseDelayMet || (this._mouseDelayTimer = setTimeout((function() {
                    i.mouseDelayMet = !0
                }), this.options.delay)), this._mouseDistanceMet(t) && this._mouseDelayMet(t) && (this._mouseStarted = !1 !== this._mouseStart(t), !this._mouseStarted) ? (t.preventDefault(), !0) : (!0 === e.data(t.target, this.widgetName + ".preventClickEvent") && e.removeData(t.target, this.widgetName + ".preventClickEvent"), this._mouseMoveDelegate = function(e) {
                    return i._mouseMove(e)
                }, this._mouseUpDelegate = function(e) {
                    return i._mouseUp(e)
                }, this.document.bind("mousemove." + this.widgetName, this._mouseMoveDelegate).bind("mouseup." + this.widgetName, this._mouseUpDelegate), t.preventDefault(), o = !0, !0))
            }
        },
        _mouseMove: function(t) {
            if (this._mouseMoved) {
                if (e.ui.ie && (!document.documentMode || 9 > document.documentMode) && !t.button) return this._mouseUp(t);
                if (!t.which) return this._mouseUp(t)
            }
            return (t.which || t.button) && (this._mouseMoved = !0), this._mouseStarted ? (this._mouseDrag(t), t.preventDefault()) : (this._mouseDistanceMet(t) && this._mouseDelayMet(t) && (this._mouseStarted = !1 !== this._mouseStart(this._mouseDownEvent, t), this._mouseStarted ? this._mouseDrag(t) : this._mouseUp(t)), !this._mouseStarted)
        },
        _mouseUp: function(t) {
            return this.document.unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate), this._mouseStarted && (this._mouseStarted = !1, t.target === this._mouseDownEvent.target && e.data(t.target, this.widgetName + ".preventClickEvent", !0), this._mouseStop(t)), o = !1, !1
        },
        _mouseDistanceMet: function(e) {
            return Math.max(Math.abs(this._mouseDownEvent.pageX - e.pageX), Math.abs(this._mouseDownEvent.pageY - e.pageY)) >= this.options.distance
        },
        _mouseDelayMet: function() {
            return this.mouseDelayMet
        },
        _mouseStart: function() {},
        _mouseDrag: function() {},
        _mouseStop: function() {},
        _mouseCapture: function() {
            return !0
        }
    }), e.widget("ui.slider", e.ui.mouse, {
        version: "1.11.3",
        widgetEventPrefix: "slide",
        options: {
            animate: !1,
            distance: 0,
            max: 100,
            min: 0,
            orientation: "horizontal",
            range: !1,
            step: 1,
            value: 0,
            values: null,
            change: null,
            slide: null,
            start: null,
            stop: null
        },
        numPages: 5,
        _create: function() {
            this._keySliding = !1, this._mouseSliding = !1, this._animateOff = !0, this._handleIndex = null, this._detectOrientation(), this._mouseInit(), this._calculateNewMax(), this.element.addClass("ui-slider ui-slider-" + this.orientation + " ui-widget ui-widget-content ui-corner-all"), this._refresh(), this._setOption("disabled", this.options.disabled), this._animateOff = !1
        },
        _refresh: function() {
            this._createRange(), this._createHandles(), this._setupEvents(), this._refreshValue()
        },
        _createHandles: function() {
            var t, i, n = this.options,
                a = this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"),
                o = "<span class='ui-slider-handle ui-state-default ui-corner-all' tabindex='0'></span>",
                s = [];
            for (i = n.values && n.values.length || 1, a.length > i && (a.slice(i).remove(), a = a.slice(0, i)), t = a.length; i > t; t++) s.push(o);
            this.handles = a.add(e(s.join("")).appendTo(this.element)), this.handle = this.handles.eq(0), this.handles.each((function(t) {
                e(this).data("ui-slider-handle-index", t)
            }))
        },
        _createRange: function() {
            var t = this.options,
                i = "";
            t.range ? (!0 === t.range && (t.values ? t.values.length && 2 !== t.values.length ? t.values = [t.values[0], t.values[0]] : e.isArray(t.values) && (t.values = t.values.slice(0)) : t.values = [this._valueMin(), this._valueMin()]), this.range && this.range.length ? this.range.removeClass("ui-slider-range-min ui-slider-range-max").css({
                left: "",
                bottom: ""
            }) : (this.range = e("<div></div>").appendTo(this.element), i = "ui-slider-range ui-widget-header ui-corner-all"), this.range.addClass(i + ("min" === t.range || "max" === t.range ? " ui-slider-range-" + t.range : ""))) : (this.range && this.range.remove(), this.range = null)
        },
        _setupEvents: function() {
            this._off(this.handles), this._on(this.handles, this._handleEvents), this._hoverable(this.handles), this._focusable(this.handles)
        },
        _destroy: function() {
            this.handles.remove(), this.range && this.range.remove(), this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-widget ui-widget-content ui-corner-all"), this._mouseDestroy()
        },
        _mouseCapture: function(t) {
            var i, n, a, o, s, r, l, c, u = this,
                d = this.options;
            return !d.disabled && (this.elementSize = {
                width: this.element.outerWidth(),
                height: this.element.outerHeight()
            }, this.elementOffset = this.element.offset(), i = {
                x: t.pageX,
                y: t.pageY
            }, n = this._normValueFromMouse(i), a = this._valueMax() - this._valueMin() + 1, this.handles.each((function(t) {
                var i = Math.abs(n - u.values(t));
                (a > i || a === i && (t === u._lastChangedValue || u.values(t) === d.min)) && (a = i, o = e(this), s = t)
            })), !1 !== (r = this._start(t, s)) && (this._mouseSliding = !0, this._handleIndex = s, o.addClass("ui-state-active").focus(), l = o.offset(), c = !e(t.target).parents().addBack().is(".ui-slider-handle"), this._clickOffset = c ? {
                left: 0,
                top: 0
            } : {
                left: t.pageX - l.left - o.width() / 2,
                top: t.pageY - l.top - o.height() / 2 - (parseInt(o.css("borderTopWidth"), 10) || 0) - (parseInt(o.css("borderBottomWidth"), 10) || 0) + (parseInt(o.css("marginTop"), 10) || 0)
            }, this.handles.hasClass("ui-state-hover") || this._slide(t, s, n), this._animateOff = !0, !0))
        },
        _mouseStart: function() {
            return !0
        },
        _mouseDrag: function(e) {
            var t = {
                    x: e.pageX,
                    y: e.pageY
                },
                i = this._normValueFromMouse(t);
            return this._slide(e, this._handleIndex, i), !1
        },
        _mouseStop: function(e) {
            return this.handles.removeClass("ui-state-active"), this._mouseSliding = !1, this._stop(e, this._handleIndex), this._change(e, this._handleIndex), this._handleIndex = null, this._clickOffset = null, this._animateOff = !1, !1
        },
        _detectOrientation: function() {
            this.orientation = "vertical" === this.options.orientation ? "vertical" : "horizontal"
        },
        _normValueFromMouse: function(e) {
            var t, i, n, a, o;
            return "horizontal" === this.orientation ? (t = this.elementSize.width, i = e.x - this.elementOffset.left - (this._clickOffset ? this._clickOffset.left : 0)) : (t = this.elementSize.height, i = e.y - this.elementOffset.top - (this._clickOffset ? this._clickOffset.top : 0)), (n = i / t) > 1 && (n = 1), 0 > n && (n = 0), "vertical" === this.orientation && (n = 1 - n), a = this._valueMax() - this._valueMin(), o = this._valueMin() + n * a, this._trimAlignValue(o)
        },
        _start: function(e, t) {
            var i = {
                handle: this.handles[t],
                value: this.value()
            };
            return this.options.values && this.options.values.length && (i.value = this.values(t), i.values = this.values()), this._trigger("start", e, i)
        },
        _slide: function(e, t, i) {
            var n, a, o;
            this.options.values && this.options.values.length ? (n = this.values(t ? 0 : 1), 2 === this.options.values.length && !0 === this.options.range && (0 === t && i > n || 1 === t && n > i) && (i = n), i !== this.values(t) && ((a = this.values())[t] = i, o = this._trigger("slide", e, {
                handle: this.handles[t],
                value: i,
                values: a
            }), n = this.values(t ? 0 : 1), !1 !== o && this.values(t, i))) : i !== this.value() && (!1 !== (o = this._trigger("slide", e, {
                handle: this.handles[t],
                value: i
            })) && this.value(i))
        },
        _stop: function(e, t) {
            var i = {
                handle: this.handles[t],
                value: this.value()
            };
            this.options.values && this.options.values.length && (i.value = this.values(t), i.values = this.values()), this._trigger("stop", e, i)
        },
        _change: function(e, t) {
            if (!this._keySliding && !this._mouseSliding) {
                var i = {
                    handle: this.handles[t],
                    value: this.value()
                };
                this.options.values && this.options.values.length && (i.value = this.values(t), i.values = this.values()), this._lastChangedValue = t, this._trigger("change", e, i)
            }
        },
        value: function(e) {
            return arguments.length ? (this.options.value = this._trimAlignValue(e), this._refreshValue(), void this._change(null, 0)) : this._value()
        },
        values: function(t, i) {
            var n, a, o;
            if (arguments.length > 1) return this.options.values[t] = this._trimAlignValue(i), this._refreshValue(), void this._change(null, t);
            if (!arguments.length) return this._values();
            if (!e.isArray(t)) return this.options.values && this.options.values.length ? this._values(t) : this.value();
            for (n = this.options.values, a = t, o = 0; n.length > o; o += 1) n[o] = this._trimAlignValue(a[o]), this._change(null, o);
            this._refreshValue()
        },
        _setOption: function(t, i) {
            var n, a = 0;
            switch ("range" === t && !0 === this.options.range && ("min" === i ? (this.options.value = this._values(0), this.options.values = null) : "max" === i && (this.options.value = this._values(this.options.values.length - 1), this.options.values = null)), e.isArray(this.options.values) && (a = this.options.values.length), "disabled" === t && this.element.toggleClass("ui-state-disabled", !!i), this._super(t, i), t) {
                case "orientation":
                    this._detectOrientation(), this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-" + this.orientation), this._refreshValue(), this.handles.css("horizontal" === i ? "bottom" : "left", "");
                    break;
                case "value":
                    this._animateOff = !0, this._refreshValue(), this._change(null, 0), this._animateOff = !1;
                    break;
                case "values":
                    for (this._animateOff = !0, this._refreshValue(), n = 0; a > n; n += 1) this._change(null, n);
                    this._animateOff = !1;
                    break;
                case "step":
                case "min":
                case "max":
                    this._animateOff = !0, this._calculateNewMax(), this._refreshValue(), this._animateOff = !1;
                    break;
                case "range":
                    this._animateOff = !0, this._refresh(), this._animateOff = !1
            }
        },
        _value: function() {
            var e = this.options.value;
            return e = this._trimAlignValue(e)
        },
        _values: function(e) {
            var t, i, n;
            if (arguments.length) return t = this.options.values[e], t = this._trimAlignValue(t);
            if (this.options.values && this.options.values.length) {
                for (i = this.options.values.slice(), n = 0; i.length > n; n += 1) i[n] = this._trimAlignValue(i[n]);
                return i
            }
            return []
        },
        _trimAlignValue: function(e) {
            if (this._valueMin() >= e) return this._valueMin();
            if (e >= this._valueMax()) return this._valueMax();
            var t = this.options.step > 0 ? this.options.step : 1,
                i = (e - this._valueMin()) % t,
                n = e - i;
            return 2 * Math.abs(i) >= t && (n += i > 0 ? t : -t), parseFloat(n.toFixed(5))
        },
        _calculateNewMax: function() {
            var e = this.options.max,
                t = this._valueMin(),
                i = this.options.step,
                n;
            e = Math.floor((e - t) / i) * i + t, this.max = parseFloat(e.toFixed(this._precision()))
        },
        _precision: function() {
            var e = this._precisionOf(this.options.step);
            return null !== this.options.min && (e = Math.max(e, this._precisionOf(this.options.min))), e
        },
        _precisionOf: function(e) {
            var t = "" + e,
                i = t.indexOf(".");
            return -1 === i ? 0 : t.length - i - 1
        },
        _valueMin: function() {
            return this.options.min
        },
        _valueMax: function() {
            return this.max
        },
        _refreshValue: function() {
            var t, i, n, a, o, s = this.options.range,
                r = this.options,
                l = this,
                c = !this._animateOff && r.animate,
                u = {};
            this.options.values && this.options.values.length ? this.handles.each((function(n) {
                i = (l.values(n) - l._valueMin()) / (l._valueMax() - l._valueMin()) * 100, u["horizontal" === l.orientation ? "left" : "bottom"] = i + "%", e(this).stop(1, 1)[c ? "animate" : "css"](u, r.animate), !0 === l.options.range && ("horizontal" === l.orientation ? (0 === n && l.range.stop(1, 1)[c ? "animate" : "css"]({
                    left: i + "%"
                }, r.animate), 1 === n && l.range[c ? "animate" : "css"]({
                    width: i - t + "%"
                }, {
                    queue: !1,
                    duration: r.animate
                })) : (0 === n && l.range.stop(1, 1)[c ? "animate" : "css"]({
                    bottom: i + "%"
                }, r.animate), 1 === n && l.range[c ? "animate" : "css"]({
                    height: i - t + "%"
                }, {
                    queue: !1,
                    duration: r.animate
                }))), t = i
            })) : (n = this.value(), a = this._valueMin(), o = this._valueMax(), i = o !== a ? (n - a) / (o - a) * 100 : 0, u["horizontal" === this.orientation ? "left" : "bottom"] = i + "%", this.handle.stop(1, 1)[c ? "animate" : "css"](u, r.animate), "min" === s && "horizontal" === this.orientation && this.range.stop(1, 1)[c ? "animate" : "css"]({
                width: i + "%"
            }, r.animate), "max" === s && "horizontal" === this.orientation && this.range[c ? "animate" : "css"]({
                width: 100 - i + "%"
            }, {
                queue: !1,
                duration: r.animate
            }), "min" === s && "vertical" === this.orientation && this.range.stop(1, 1)[c ? "animate" : "css"]({
                height: i + "%"
            }, r.animate), "max" === s && "vertical" === this.orientation && this.range[c ? "animate" : "css"]({
                height: 100 - i + "%"
            }, {
                queue: !1,
                duration: r.animate
            }))
        },
        _handleEvents: {
            keydown: function(t) {
                var i, n, a, o, s = e(t.target).data("ui-slider-handle-index");
                switch (t.keyCode) {
                    case e.ui.keyCode.HOME:
                    case e.ui.keyCode.END:
                    case e.ui.keyCode.PAGE_UP:
                    case e.ui.keyCode.PAGE_DOWN:
                    case e.ui.keyCode.UP:
                    case e.ui.keyCode.RIGHT:
                    case e.ui.keyCode.DOWN:
                    case e.ui.keyCode.LEFT:
                        if (t.preventDefault(), !this._keySliding && (this._keySliding = !0, e(t.target).addClass("ui-state-active"), !1 === (i = this._start(t, s)))) return
                }
                switch (o = this.options.step, n = a = this.options.values && this.options.values.length ? this.values(s) : this.value(), t.keyCode) {
                    case e.ui.keyCode.HOME:
                        a = this._valueMin();
                        break;
                    case e.ui.keyCode.END:
                        a = this._valueMax();
                        break;
                    case e.ui.keyCode.PAGE_UP:
                        a = this._trimAlignValue(n + (this._valueMax() - this._valueMin()) / this.numPages);
                        break;
                    case e.ui.keyCode.PAGE_DOWN:
                        a = this._trimAlignValue(n - (this._valueMax() - this._valueMin()) / this.numPages);
                        break;
                    case e.ui.keyCode.UP:
                    case e.ui.keyCode.RIGHT:
                        if (n === this._valueMax()) return;
                        a = this._trimAlignValue(n + o);
                        break;
                    case e.ui.keyCode.DOWN:
                    case e.ui.keyCode.LEFT:
                        if (n === this._valueMin()) return;
                        a = this._trimAlignValue(n - o)
                }
                this._slide(t, s, a)
            },
            keyup: function(t) {
                var i = e(t.target).data("ui-slider-handle-index");
                this._keySliding && (this._keySliding = !1, this._stop(t, i), this._change(t, i), e(t.target).removeClass("ui-state-active"))
            }
        }
    })
})), $(document).foundation(), $(document).ready((function() {
        $("#js-view-all-tenants").click((function(e) {
            e.preventDefault(), $(".tenant-grid-item.hidden").removeClass("hidden", 1e3), $(this).hide(), $("#js-view-less-tenants").show()
        })), $("#js-view-less-tenants").click((function(e) {
            e.preventDefault(), $(".tenant-grid-item:gt(11)").addClass("hidden"), $(this).hide(), $("#js-view-all-tenants").show()
        })), $("#js-open-disclaimer").click((function(e) {
            e.preventDefault(), $("#js-disclaimer").addClass("open"), $("#js-disclaimer i").click((function() {
                $("#js-disclaimer").removeClass("open")
            }))
        })), $("#gallery .button").click((function(e) {
            $("#gallery .fancybox:first").click(), e.preventDefault()
        })), $(".fancybox").fancybox({
            padding: 0,
            helpers: {
                overlay: {
                    locked: !1
                }
            },
            iframe: {
                scrolling: "no"
            }
        }), Foundation.MediaQuery.atLeast("medium") && ($("#files .flexslider").flexslider({
            controlNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1
        }), $("#downloads .flexslider").flexslider({
            controlNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1
        }), $("#marketing_materials .flexslider").flexslider({
            controlNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1
        }), $("#siteplan .flexslider").flexslider({
            controlNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1
        }), $("#events .flexslider").flexslider({
            controlNav: !0,
            directionNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1
        }), $("#slider .flexslider").flexslider({
            controlNav: !1,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1,
            after: function(e, t) {
                var i = e.currentSlide + 1,
                    n = e.count;
                $("#flexslider-counter").html("<h3>" + i + " of " + e.count + "</h3>")
            },
            start: function(e, t) {
                var i = e.count;
                $("#flexslider-counter").html("<h3>1 of " + e.count + "</h3>")
            }
        }), $("#parcels .flexslider").flexslider({
            controlNav: !0,
            animation: "slide",
            animationLoop: !1,
            slideshow: !1,
            after: function(e, t) {
                var i = e.currentSlide + 1,
                    n = e.count;
                $("#flexslider-counter").html("<h3>Parcel " + i + " of " + e.count + "</h3>")
            },
            start: function(e, t) {
                var i = e.count;
                $("#flexslider-counter").html("<h3>Parcel 1 of " + e.count + "</h3>")
            }
        })), $("#banner_main_portfolio").length > 0 && ($("footer").css("padding-bottom", "134px"), $(window).scroll((function() {
            var e = .8;
            63 == bootstrap.client_id && (e = 0), $(window).scrollTop() + $(window).height() >= getDocumentHeight() * e ? ($("#banner_main_portfolio").removeClass("closing"), $("#banner_main_portfolio").addClass("open")) : $("#banner_main_portfolio").addClass("closing")
        })))
    })),
    /*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas, David Knight. Dual MIT/BSD license */
    window.matchMedia || (window.matchMedia = function() {
        "use strict";
        var e = window.styleMedia || window.media;
        if (!e) {
            var t = document.createElement("style"),
                i = document.getElementsByTagName("script")[0],
                n = null;
            t.type = "text/css", t.id = "matchmediajs-test", i.parentNode.insertBefore(t, i), n = "getComputedStyle" in window && window.getComputedStyle(t, null) || t.currentStyle, e = {
                matchMedium: function(e) {
                    var i = "@media " + e + "{ #matchmediajs-test { width: 1px; } }";
                    return t.styleSheet ? t.styleSheet.cssText = i : t.textContent = i, "1px" === n.width
                }
            }
        }
        return function(t) {
            return {
                matches: e.matchMedium(t || "all"),
                media: t || "all"
            }
        }
    }()), $(document).ready((function() {
        setTimeout((function() {
            $(document).trigger("resize")
        }), 250), $(window).resize((function() {
            setHeroHeight()
        })), setHeroHeight(), $(window).scroll((function() {
            headerPosition()
        })), headerPosition()
    })), $(document).ready((function() {
        0 == $(".team-member img").length && $(".team-member .details").css("margin-left", "0px"), $("a").not("[href]").css("cursor", "default"), $("body").hasClass("variation-rhs-nav") ? ($(".variation-rhs-nav #side-nav nav ul li a").click((function() {
            $("#side-nav h3 span").click()
        })), $(".variation-rhs-nav .hamburger").on("click", (function() {
            $("#side-nav").toggleClass("is-open")
        }))) : ($(".hamburger").click((function(e) {
            $(this).hasClass("active") ? ($(this).removeClass("active"), $("#menu").removeClass("small-active")) : ($(this).addClass("active"), $("#menu").addClass("small-active")), e.preventDefault()
        })), $("#menu ul li a").click((function() {
            $("#menu").hasClass("small-active") && ($("#menu").removeClass("small-active"), $(".hamburger").removeClass("active"))
        }))), !$("body").is('[class^="variation"]') || $("body").hasClass("variation-cta") ? ($(window).resize((function() {
            fixMenuItems()
        })),fixMenuItems(), $("#menu-more-button").click((function(e) {
            $("#menu-more").toggle(), e.preventDefault()
        }))) : $("#menu-more-button").hide(), $("#hero .button").click((function(e) {
            var t = $(this).attr("href");
            $(this).foundation("scrollToLoc", $(t)), e.preventDefault()
        })), $("#hero").hasClass("not-found") || $("#hero .container").css("background-image", "url('" + $("#hero .container img").attr("src") + "')").addClass("loaded"), $("#video .container").css("background-image", "url('" + $("#video .container img").attr("src") + "')").addClass("loaded"), $("#video2 .container").css("background-image", "url('" + $("#video2 .container img").attr("src") + "')").addClass("loaded"), $("#location").next().hasClass("floating-title") || $("#map-categories ul").css("padding-bottom", "0px"), $("section").each((function() {
            var e = $(this).attr("id"),
                t = $(this).prev(),
                i = $(this).next();
            $(this).hasClass("floating-title") || "location" != e && "hero" != e && (t.hasClass("floating-title") && $(this).addClass("section-padding-top"), i.hasClass("floating-title") && $(this).addClass("section-padding-bottom"))
        })), $("header").hasClass("multiple-sites") && ($(window).scroll((function() {
            $(window).scrollTop() > 90 ? $("header").addClass("hide-switch").removeClass("show-switch") : $("header").addClass("show-switch").removeClass("hide-switch")
        })), $("#linked-sites-mobile .handle a").click((function() {
            var e = $(this).parent().parent();
            e.hasClass("open") ? e.removeClass("open") : e.addClass("open")
        })))
    })), $("header").hasClass("multiple-sites") && $(window).scroll((function() {
        $(window).scrollTop() > 90 ? $("header").addClass("hide-switch").removeClass("show-switch") : $("header").addClass("show-switch").removeClass("hide-switch")
    })), $(document).ready((function() {
        let e = !1,
            t = $(".virtualtour__inlineplayer"),
            i = t.parents(".virtualtour").find(".play-button"),
            n = function() {
                $(window).on("scroll", (function(t) {
                    t.currentTarget.scrollY > 200 && (e || a())
                })), i.on("click", a)
            },
            a = function() {
                t.addClass("is-activated").attr("src", t.attr("data-src")), e = !0
            };
        t.length && n()
    }));