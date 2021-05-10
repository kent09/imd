





var pwWindowWidth = window.innerWidth;

function ProcessWheel(t, e, i) {
    this.id = "#" + t, this.setOptions(i), this.refresh(e)
}

function equalizeSlider(t) {
    $(t).find(".card").height("auto");
    var e = $(t).find(".slick-track"),
        i = $(e).height();
    $(t).find(".card").css("height", i + "px")
}
ProcessWheel.prototype.refresh = function(t) {
    this.draw(t), this.appendArcTags(), this.appendSvgTags(), this.setupBinds(), this.transitionOut()
}, ProcessWheel.prototype.setOptions = function(t) {
    this.options = {
        radiusPerc: .85,
        innerRadiusPerc: .7,
        outerRadiusPerc: 1,
        innerCircleRadiusPerc: .45,
        labelCircleRadiusPerc: .5,
        padAngle: .07,
        centreText: ""
    }, $.extend(this.options, t)
}, ProcessWheel.prototype.draw = function(t) {
    t && (this.data = t), this.width = $(this.id).width(), this.radius = this.width * this.options.radiusPerc / 2, d3.select(this.id + " svg").remove(), this.arc = d3.arc().innerRadius(this.radius * this.options.innerRadiusPerc).outerRadius(this.radius * this.options.outerRadiusPerc), this.pie = d3.pie().padAngle(this.options.padAngle).sort(null).value(function(t) {
        return t.value
    }), this.svg = d3.select(this.id).append("svg").attr("class", "detect-in-view").attr("width", this.width).attr("height", this.width).append("g").attr("transform", "translate(" + this.width / 2 + "," + this.width / 2 + ")"), this.g = this.svg.selectAll(".arc").data(this.pie(this.data)).enter().append("g").attr("class", "arc").attr("id", function(t) {
        return "arc-" + t.data.label
    })
}, ProcessWheel.prototype.appendArcTags = function() {
    var t = this.radius * ((this.options.outerRadiusPerc - this.options.innerRadiusPerc) / 2) * this.options.labelCircleRadiusPerc,
        e = Math.round(t / 1.5) / 10,
        i = this;
    this.h = this.g.append("g").attr("class", "arc-inner"), 
            this.h.append("path").attr("d", this.arc).attr("fill", 
                function(t) {
                    return t.data.color
                }), 
            this.h.append("circle").attr("r", t).attr("class", "labelCircle").attr("transform", function(t) {
        return "translate(" + i.arc.centroid(t) + ")"
    }).attr("dy", "0.35em"), this.h.append("text").attr("class", "labelText").attr("font-size", e + "em").attr("transform", function(t) {
        return "translate(" + i.arc.centroid(t) + ")"
    }).attr("dy", "0.35em").text(function(t) {
        return t.data.label
    })
}, ProcessWheel.prototype.appendSvgTags = function() {
    var t = this.radius * this.options.innerCircleRadiusPerc;
    this.svg.append("circle").attr("r", t).attr("fill", "#FFF").attr("style", "filter:url(#dropshadow)");
    for (var e = this.options.centreText.split("/"), i = -.7 * (e.length - 1) + .4, a = Math.round(t / 8) / 10, s = 0; s < e.length; s++) {
        var r = i + 1.4 * s;
        this.svg.append("text").attr("class", "toolCircle").attr("dy", r + "em").attr("font-size", a + "em").text(e[s])
    }
    var n = this.svg.append("filter").attr("id", "dropshadow").attr("height", "130%");
    n.append("feGaussianBlur").attr("in", "SourceAlpha").attr("stdDeviation", "7"), n.append("feOffset").attr("dx", "2").attr("dy", "4"), n.append("feComponentTransfer").append("feFuncA").attr("type", "linear").attr("slope", "0.2");
    var o = n.append("feMerge");
    o.append("feMergeNode"), o.append("feMergeNode").attr("in", "SourceGraphic")
}, ProcessWheel.prototype.setupBinds = function() {
    var t = this;
    this.g.on("mouseover", function() {
        t.mouseOver(this)
    }), $(this.id + " svg").on("inView", function() {
        t.transitionIn()
    }), window.addEventListener("throttledResize", function() {
        window.innerWidth != pwWindowWidth && (t.refresh(), pwWindowWidth = window.innerWidth)
    })
}, ProcessWheel.prototype.mouseOver = function(t) {
    var e;
    d3.select(t).attr("class", function(t) {
        return e = t, "arc"
    }), this.selectedId && "arc-" + e.data.label === this.selectedId || (d3.selectAll(".arc:not(#" + d3.select(t).attr("id") + ")").transition().ease(d3.easeBounce).duration(400).attr("transform", "translate(0,0) scale(1,1)").select("path").attr("style", null), $(".toolTip").remove(), d3.select(t).transition().duration(200).attr("transform", this.getHoverTransformString(t, 1.4)).on("end", function() {
        d3.selectAll(".arc:not(#" + d3.select(t).attr("id") + ")").transition().ease(d3.easeBounce).duration(400).attr("transform", "translate(0,0) scale(1,1)")
    }), this.svgMoveToTop(e), d3.select(t).select("path").attr("style", "filter:url(#dropshadow)"), d3.select(this.id + "-tooltip").append("div").attr("class", "toolTip align-middle").attr("id", e.data.label + "-tooltip").html(this.toolTipHTML(e)), this.selectedId = "arc-" + e.data.label)
}, ProcessWheel.prototype.toolTipHTML = function(t) {
    var e = '<span class="toolTipHeader">';
    return e += '<span style="color:' + t.data.color + ';">' + t.data.label + ". </span>", e += "<span>" + t.data.title + "</span></span>", e += '<span class="toolTipContent">' + t.data.description + "</span>"
}, ProcessWheel.prototype.svgMoveToTop = function(i) {
    this.svg.selectAll(".arc").sort(function(t, e) {
        return t == i ? 1 : -1
    })
}, ProcessWheel.prototype.getHoverTransformString = function(t, e) {
    var i = t.getBBox();
    return "translate(" + -(i.x + i.width / 2) * (e - 1) + "," + -(i.y + i.height / 2) * (e - 1) + ") scale(" + e + "," + e + ")"
}, ProcessWheel.prototype.getInitialTransformString = function(t) {
    var e = t.getBBox();
    return "translate(" + (e.x + e.width / 2) / 5 + "," + (e.y + e.height / 2) / 5 + ")"
}, ProcessWheel.prototype.transitionOut = function() {
    var t = this;
    d3.selectAll(".arc").each(function() {
        d3.select(this).attr("transform", t.getInitialTransformString(this))
    })
}, ProcessWheel.prototype.transitionIn = function() {
    var t = this,
        e = !0;
    this.svg.selectAll(".arc").transition().ease(d3.easeBounce).duration(800).attr("transform", "translate(0,0)").on("end", function() {
        e && (t.mouseOver($("#process-wheel svg .arc").first()[0]), e = !1)
    })
}, $(document).ready(function() {
    ! function(t, e, i) {
        i = i || window;
        var a = !1;
        i.addEventListener(t, function() {
            a || (a = !0, requestAnimationFrame(function() {
                i.dispatchEvent(new CustomEvent(e)), a = !1
            }))
        })
    }("resize", "throttledResize"), $(".navbar-nav").append('<li id="nav-item-underline"></li>');
    var i, a = $("#nav-item-underline");
    $(".contact-container").append('<div id="contact-item-underline"></div>');
    var s, r = $("#contact-item-underline"),
        n = $(".contact").first();

    function t() {
        i = Math.floor(0 - $(".navbar-nav").offset().left - 100), s = Math.ceil($(window).width() - $(".contact-container").offset().left);
        var t = $(".navbar-nav li.nav-item.current-menu-item, .navbar-nav li.nav-item.current-menu-parent, .navbar-nav li.nav-item.current-page-ancestor").first(),
            e = $(".contact.active");
        t.length ? (a.width(t.width()).css("left", t.position().left).data("origLeft", a.position().left).data("origWidth", a.width()), r.width(n.outerWidth()).css("left", s).data("origLeft", s).data("origWidth", r.width())) : e.length ? (a.width("100px").css("left", i).data("origLeft", i).data("origWidth", "100px"), r.width(n.outerWidth()).css("left", n.position().left).data("origLeft", r.position().left).data("origWidth", r.width())) : (a.width("100px").css("left", i).data("origLeft", i).data("origWidth", "100px"), r.width(n.outerWidth()).css("left", s).data("origLeft", s).data("origWidth", r.width()))
    }

    function e(t, e, i, a, s, r) {
        var n = Math.abs(t.position().left - e),
            o = Math.abs(a.position().left - s),
            c = n + o,
            l = 200 * n / c,
            h = 200 * o / c;
        t.is(":visible") && (a.stop(), t.stop().animate({
            left: e,
            width: i
        }, l, function() {
            a.is(":visible") && a.animate({
                left: s,
                width: r
            }, h)
        }))
    }

    function o() {
        var t = "none";
        if (window.innerWidth < 768 || window.matchMedia("(hover:none), (hover:on-demand)").matches) t = "dropdown";
        else {
            var e = $(".dropdown-menu.show");
            e.parent().removeClass("show"), e.removeClass("show"), e.blur()
        }
        $(".dropdown-toggle").attr("data-toggle", t)
    }

    function c(t) {
        if (!$(t).hasClass("in-view")) {
            var e = $(window).scrollTop(),
                i = e + $(window).height(),
                a = function(t) {
                    var e = [];
                    if (!window.getComputedStyle) return;
                    var i = getComputedStyle(t),
                        a = i.transform || i.webkitTransform || i.mozTransform || i.msTransform,
                        s = a.match(/^matrix3d\((.+)\)$/);
                    if (s) return parseFloat(s[1].split(", ")[13]);
                    return (s = a.match(/^matrix\((.+)\)$/)) ? e.push(parseFloat(s[1].split(", ")[4])) : e.push(0), s ? e.push(parseFloat(s[1].split(", ")[5])) : e.push(0), e
                }(t)[1],
                s = $(t).offset().top - a,
                r = s + .2 * $(t).height();
            e <= s + .8 * $(t).height() && r <= i && ($(t).removeClass("detect-in-view"), $(t).addClass("in-view").trigger("inView"))
        }
    }
    a.is(":visible") && t(), o(), $(".navbar-nav li.nav-item").hover(function() {
        e(r, s, r.data("origWidth"), a, $(this).position().left, $(this).width())
    }, function() {
        e(a, a.data("origLeft"), a.data("origWidth"), r, r.data("origLeft"), r.data("origWidth"))
    }), $(".contact").hover(function() {
        e(a, i, "100px", r, $(this).position().left, $(this).outerWidth())
    }, function() {
        e(r, r.data("origLeft"), r.data("origWidth"), a, a.data("origLeft"), a.data("origWidth"))
    }), window.addEventListener("throttledResize", function() {
        t(), o(), $(".detect-in-view").each(function() {
            c(this)
        })
    }), $(window).scroll(function() {
        $(".detect-in-view").each(function() {
            c(this)
        })
    }), $(".detect-in-view").each(function() {
        c(this)
    });
    var l = $(".nav-tabs-inner-container");
    if (l.length) {
        var h = $('.nav > li > a[href="' + window.location.pathname + '"]').addClass("active"),
            d = ($(window).width() - h.parent().width()) / 2;
        l.scrollLeft(h.offset().left - d)
    }
    $(".navbar-nav .nav-item.dropdown .dropdown-menu").on("click", function(t) {
            t.stopPropagation()
        }),
        function() {
            if ("function" == typeof window.CustomEvent) return;

            function t(t, e) {
                e = e || {
                    bubbles: !1,
                    cancelable: !1,
                    detail: void 0
                };
                var i = document.createEvent("CustomEvent");
                return i.initCustomEvent(t, e.bubbles, e.cancelable, e.detail), i
            }
            t.prototype = window.Event.prototype, window.CustomEvent = t
        }()
});