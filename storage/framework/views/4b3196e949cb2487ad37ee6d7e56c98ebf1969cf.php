
	
	

<!doctype html>
<html lang="en">

<head>
<base href="/games/<?php echo e($game->name); ?>/">
    <meta charset="utf-8" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#000000" />
    <meta name="description" content="StarGame Casino Game Selector" />
    <link rel="apple-touch-icon" href="/logo192.png" />
    <link rel="manifest" href="/manifest.json" />
    <title><?php echo e($game->title); ?></title>
    <link href="static/css/2.083ee2c5.chunk.css" rel="stylesheet">
    <link href="static/css/main.f44fc7dd.chunk.css" rel="stylesheet">
</head>

<body>

    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="selector" class="selector" style="display:none;"></div>
    <script>
        ! function(f) {
            function e(e) {
                for (var r, t, n = e[0], o = e[1], u = e[2], l = 0, a = []; l < n.length; l++) t = n[l], Object.prototype.hasOwnProperty.call(c, t) && c[t] && a.push(c[t][0]), c[t] = 0;
                for (r in o) Object.prototype.hasOwnProperty.call(o, r) && (f[r] = o[r]);
                for (s && s(e); a.length;) a.shift()();
                return p.push.apply(p, u || []), i()
            }

            function i() {
                for (var e, r = 0; r < p.length; r++) {
                    for (var t = p[r], n = !0, o = 1; o < t.length; o++) {
                        var u = t[o];
                        0 !== c[u] && (n = !1)
                    }
                    n && (p.splice(r--, 1), e = l(l.s = t[0]))
                }
                return e
            }
            var t = {},
                c = {
                    1: 0
                },
                p = [];

            function l(e) {
                if (t[e]) return t[e].exports;
                var r = t[e] = {
                    i: e,
                    l: !1,
                    exports: {}
                };
                return f[e].call(r.exports, r, r.exports, l), r.l = !0, r.exports
            }
            l.m = f, l.c = t, l.d = function(e, r, t) {
                l.o(e, r) || Object.defineProperty(e, r, {
                    enumerable: !0,
                    get: t
                })
            }, l.r = function(e) {
                "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                    value: "Module"
                }), Object.defineProperty(e, "__esModule", {
                    value: !0
                })
            }, l.t = function(r, e) {
                if (1 & e && (r = l(r)), 8 & e) return r;
                if (4 & e && "object" == typeof r && r && r.__esModule) return r;
                var t = Object.create(null);
                if (l.r(t), Object.defineProperty(t, "default", {
                        enumerable: !0,
                        value: r
                    }), 2 & e && "string" != typeof r)
                    for (var n in r) l.d(t, n, function(e) {
                        return r[e]
                    }.bind(null, n));
                return t
            }, l.n = function(e) {
                var r = e && e.__esModule ? function() {
                    return e.default
                } : function() {
                    return e
                };
                return l.d(r, "a", r), r
            }, l.o = function(e, r) {
                return Object.prototype.hasOwnProperty.call(e, r)
            }, l.p = "/";
            var r = this["webpackJsonpgame-selector"] = this["webpackJsonpgame-selector"] || [],
                n = r.push.bind(r);
            r.push = e, r = r.slice();
            for (var o = 0; o < r.length; o++) e(r[o]);
            var s = n;
            i()
        }([])
    </script>
    <script src="static/js/2.6e784248.chunk.js"></script>
    <script src="static/js/main.04cbed28.chunk.js"></script>
</body>

</html><?php /**PATH /var/www/fastuser/data/www/demo60.2games.pw/resources/views/frontend/games/list/PrisonBreakMN.blade.php ENDPATH**/ ?>