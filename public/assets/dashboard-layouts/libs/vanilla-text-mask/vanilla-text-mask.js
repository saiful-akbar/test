!(function (e, r) {
    var t = (function (e) {
        var r = {};
        function t(n) {
            if (r[n]) return r[n].exports;
            var o = (r[n] = { i: n, l: !1, exports: {} });
            return e[n].call(o.exports, o, o.exports, t), (o.l = !0), o.exports;
        }
        return (
            (t.m = e),
            (t.c = r),
            (t.d = function (e, r, n) {
                t.o(e, r) ||
                    Object.defineProperty(e, r, {
                        configurable: !1,
                        enumerable: !0,
                        get: n,
                    });
            }),
            (t.r = function (e) {
                Object.defineProperty(e, "__esModule", { value: !0 });
            }),
            (t.n = function (e) {
                var r =
                    e && e.__esModule
                        ? function () {
                              return e.default;
                          }
                        : function () {
                              return e;
                          };
                return t.d(r, "a", r), r;
            }),
            (t.o = function (e, r) {
                return Object.prototype.hasOwnProperty.call(e, r);
            }),
            (t.p = ""),
            t((t.s = 188))
        );
    })({
        188: function (e, r, t) {
            "use strict";
            t.r(r);
            var n = t(27);
            t.n(n),
                t.d(r, "vanillaTextMask", function () {
                    return n;
                });
        },
        27: function (e, r, t) {
            e.exports = (function (e) {
                function r(n) {
                    if (t[n]) return t[n].exports;
                    var o = (t[n] = { exports: {}, id: n, loaded: !1 });
                    return (
                        e[n].call(o.exports, o, o.exports, r),
                        (o.loaded = !0),
                        o.exports
                    );
                }
                var t = {};
                return (r.m = e), (r.c = t), (r.p = ""), r(0);
            })([
                function (e, r, t) {
                    "use strict";
                    function n(e) {
                        return e && e.__esModule ? e : { default: e };
                    }
                    function o(e) {
                        var r = e.inputElement,
                            t = (0, u.default)(e),
                            n = function (e) {
                                var r = e.target.value;
                                return t.update(r);
                            };
                        return (
                            r.addEventListener("input", n),
                            t.update(r.value),
                            {
                                textMaskInputElement: t,
                                destroy: function () {
                                    r.removeEventListener("input", n);
                                },
                            }
                        );
                    }
                    Object.defineProperty(r, "__esModule", { value: !0 }),
                        (r.conformToMask = void 0),
                        (r.maskInput = o);
                    var i = t(2);
                    Object.defineProperty(r, "conformToMask", {
                        enumerable: !0,
                        get: function () {
                            return n(i).default;
                        },
                    });
                    var a = t(5),
                        u = n(a);
                    r.default = o;
                },
                function (e, r) {
                    "use strict";
                    Object.defineProperty(r, "__esModule", { value: !0 }),
                        (r.placeholderChar = "_"),
                        (r.strFunction = "function");
                },
                function (e, r, t) {
                    "use strict";
                    Object.defineProperty(r, "__esModule", { value: !0 });
                    var n =
                        "function" == typeof Symbol &&
                        "symbol" == typeof Symbol.iterator
                            ? function (e) {
                                  return typeof e;
                              }
                            : function (e) {
                                  return e &&
                                      "function" == typeof Symbol &&
                                      e.constructor === Symbol &&
                                      e !== Symbol.prototype
                                      ? "symbol"
                                      : typeof e;
                              };
                    r.default = function () {
                        var e =
                                arguments.length > 0 && void 0 !== arguments[0]
                                    ? arguments[0]
                                    : u,
                            r =
                                arguments.length > 1 && void 0 !== arguments[1]
                                    ? arguments[1]
                                    : a,
                            t =
                                arguments.length > 2 && void 0 !== arguments[2]
                                    ? arguments[2]
                                    : {};
                        if (!(0, o.isArray)(r)) {
                            if (
                                (void 0 === r ? "undefined" : n(r)) !==
                                i.strFunction
                            )
                                throw new Error(
                                    "Text-mask:conformToMask; The mask property must be an array."
                                );
                            (r = r(e, t)),
                                (r = (0, o.processCaretTraps)(r)
                                    .maskWithoutCaretTraps);
                        }
                        var l = t.guide,
                            s = void 0 === l || l,
                            f = t.previousConformedValue,
                            c = void 0 === f ? u : f,
                            d = t.placeholderChar,
                            v = void 0 === d ? i.placeholderChar : d,
                            p = t.placeholder,
                            h =
                                void 0 === p
                                    ? (0, o.convertMaskToPlaceholder)(r, v)
                                    : p,
                            m = t.currentCaretPosition,
                            y = t.keepCharPositions,
                            g = !1 === s && void 0 !== c,
                            b = e.length,
                            C = c.length,
                            x = h.length,
                            P = r.length,
                            k = b - C,
                            w = k > 0,
                            O = m + (w ? -k : 0),
                            T = O + Math.abs(k);
                        if (!0 === y && !w) {
                            for (var M = u, _ = O; _ < T; _++)
                                h[_] === v && (M += v);
                            e = e.slice(0, O) + M + e.slice(O, b);
                        }
                        for (
                            var S = e.split(u).map(function (e, r) {
                                    return { char: e, isNew: r >= O && r < T };
                                }),
                                j = b - 1;
                            j >= 0;
                            j--
                        ) {
                            var V = S[j].char;
                            if (V !== v) {
                                var A = j >= O && C === P;
                                V === h[A ? j - k : j] && S.splice(j, 1);
                            }
                        }
                        var E = u,
                            N = !1;
                        e: for (var F = 0; F < x; F++) {
                            var I = h[F];
                            if (I === v) {
                                if (S.length > 0)
                                    for (; S.length > 0; ) {
                                        var L = S.shift(),
                                            R = L.char,
                                            J = L.isNew;
                                        if (R === v && !0 !== g) {
                                            E += v;
                                            continue e;
                                        }
                                        if (r[F].test(R)) {
                                            if (
                                                !0 === y &&
                                                !1 !== J &&
                                                c !== u &&
                                                !1 !== s &&
                                                w
                                            ) {
                                                for (
                                                    var W = S.length,
                                                        q = null,
                                                        z = 0;
                                                    z < W;
                                                    z++
                                                ) {
                                                    var B = S[z];
                                                    if (
                                                        B.char !== v &&
                                                        !1 === B.isNew
                                                    )
                                                        break;
                                                    if (B.char === v) {
                                                        q = z;
                                                        break;
                                                    }
                                                }
                                                null !== q
                                                    ? ((E += R), S.splice(q, 1))
                                                    : F--;
                                            } else E += R;
                                            continue e;
                                        }
                                        N = !0;
                                    }
                                !1 === g && (E += h.substr(F, x));
                                break;
                            }
                            E += I;
                        }
                        if (g && !1 === w) {
                            for (var D = null, G = 0; G < E.length; G++)
                                h[G] === v && (D = G);
                            E = null !== D ? E.substr(0, D + 1) : u;
                        }
                        return {
                            conformedValue: E,
                            meta: { someCharsRejected: N },
                        };
                    };
                    var o = t(3),
                        i = t(1),
                        a = [],
                        u = "";
                },
                function (e, r, t) {
                    "use strict";
                    function n(e) {
                        return (
                            (Array.isArray && Array.isArray(e)) ||
                            e instanceof Array
                        );
                    }
                    Object.defineProperty(r, "__esModule", { value: !0 }),
                        (r.convertMaskToPlaceholder = function () {
                            var e =
                                    arguments.length > 0 &&
                                    void 0 !== arguments[0]
                                        ? arguments[0]
                                        : i,
                                r =
                                    arguments.length > 1 &&
                                    void 0 !== arguments[1]
                                        ? arguments[1]
                                        : o.placeholderChar;
                            if (!n(e))
                                throw new Error(
                                    "Text-mask:convertMaskToPlaceholder; The mask property must be an array."
                                );
                            if (-1 !== e.indexOf(r))
                                throw new Error(
                                    "Placeholder character must not be used as part of the mask. Please specify a character that is not present in your mask as your placeholder character.\n\nThe placeholder character that was received is: " +
                                        JSON.stringify(r) +
                                        "\n\nThe mask that was received is: " +
                                        JSON.stringify(e)
                                );
                            return e
                                .map(function (e) {
                                    return e instanceof RegExp ? r : e;
                                })
                                .join("");
                        }),
                        (r.isArray = n),
                        (r.isString = function (e) {
                            return "string" == typeof e || e instanceof String;
                        }),
                        (r.isNumber = function (e) {
                            return (
                                "number" == typeof e &&
                                void 0 === e.length &&
                                !isNaN(e)
                            );
                        }),
                        (r.processCaretTraps = function (e) {
                            for (
                                var r = [], t = void 0;
                                -1 !== (t = e.indexOf(a));

                            )
                                r.push(t), e.splice(t, 1);
                            return { maskWithoutCaretTraps: e, indexes: r };
                        });
                    var o = t(1),
                        i = [],
                        a = "[]";
                },
                function (e, r) {
                    "use strict";
                    Object.defineProperty(r, "__esModule", { value: !0 }),
                        (r.default = function (e) {
                            var r = e.previousConformedValue,
                                o = void 0 === r ? n : r,
                                i = e.previousPlaceholder,
                                a = void 0 === i ? n : i,
                                u = e.currentCaretPosition,
                                l = void 0 === u ? 0 : u,
                                s = e.conformedValue,
                                f = e.rawValue,
                                c = e.placeholderChar,
                                d = e.placeholder,
                                v = e.indexesOfPipedChars,
                                p = void 0 === v ? t : v,
                                h = e.caretTrapIndexes,
                                m = void 0 === h ? t : h;
                            if (0 === l || !f.length) return 0;
                            var y = f.length,
                                g = o.length,
                                b = d.length,
                                C = s.length,
                                x = y - g,
                                P = x > 0;
                            if (x > 1 && !P && 0 !== g) return l;
                            var k = 0,
                                w = void 0,
                                O = void 0;
                            if (!P || (o !== s && s !== d)) {
                                var T = s.toLowerCase(),
                                    M = f.toLowerCase(),
                                    _ = M.substr(0, l).split(n),
                                    S = _.filter(function (e) {
                                        return -1 !== T.indexOf(e);
                                    });
                                O = S[S.length - 1];
                                var j = a
                                        .substr(0, S.length)
                                        .split(n)
                                        .filter(function (e) {
                                            return e !== c;
                                        }).length,
                                    V = d
                                        .substr(0, S.length)
                                        .split(n)
                                        .filter(function (e) {
                                            return e !== c;
                                        }).length,
                                    A = V !== j,
                                    E =
                                        void 0 !== a[S.length - 1] &&
                                        void 0 !== d[S.length - 2] &&
                                        a[S.length - 1] !== c &&
                                        a[S.length - 1] !== d[S.length - 1] &&
                                        a[S.length - 1] === d[S.length - 2];
                                !P &&
                                    (A || E) &&
                                    j > 0 &&
                                    d.indexOf(O) > -1 &&
                                    void 0 !== f[l] &&
                                    ((w = !0), (O = f[l]));
                                for (
                                    var N = p.map(function (e) {
                                            return T[e];
                                        }),
                                        F = N.filter(function (e) {
                                            return e === O;
                                        }).length,
                                        I = S.filter(function (e) {
                                            return e === O;
                                        }).length,
                                        L = d
                                            .substr(0, d.indexOf(c))
                                            .split(n)
                                            .filter(function (e, r) {
                                                return e === O && f[r] !== e;
                                            }).length,
                                        R = L + I + F + (w ? 1 : 0),
                                        J = 0,
                                        W = 0;
                                    W < C;
                                    W++
                                ) {
                                    var q = T[W];
                                    if (((k = W + 1), q === O && J++, J >= R))
                                        break;
                                }
                            } else k = l - x;
                            if (P) {
                                for (var z = k, B = k; B <= b; B++)
                                    if (
                                        (d[B] === c && (z = B),
                                        d[B] === c ||
                                            -1 !== m.indexOf(B) ||
                                            B === b)
                                    )
                                        return z;
                            } else if (w) {
                                for (var D = k - 1; D >= 0; D--)
                                    if (
                                        s[D] === O ||
                                        -1 !== m.indexOf(D) ||
                                        0 === D
                                    )
                                        return D;
                            } else
                                for (var G = k; G >= 0; G--)
                                    if (
                                        d[G - 1] === c ||
                                        -1 !== m.indexOf(G) ||
                                        0 === G
                                    )
                                        return G;
                        });
                    var t = [],
                        n = "";
                },
                function (e, r, t) {
                    "use strict";
                    function n(e) {
                        return e && e.__esModule ? e : { default: e };
                    }
                    function o(e, r) {
                        document.activeElement === e &&
                            (m
                                ? y(function () {
                                      return e.setSelectionRange(r, r, p);
                                  }, 0)
                                : e.setSelectionRange(r, r, p));
                    }
                    Object.defineProperty(r, "__esModule", { value: !0 });
                    var i =
                            Object.assign ||
                            function (e) {
                                for (var r = 1; r < arguments.length; r++) {
                                    var t = arguments[r];
                                    for (var n in t)
                                        Object.prototype.hasOwnProperty.call(
                                            t,
                                            n
                                        ) && (e[n] = t[n]);
                                }
                                return e;
                            },
                        a =
                            "function" == typeof Symbol &&
                            "symbol" == typeof Symbol.iterator
                                ? function (e) {
                                      return typeof e;
                                  }
                                : function (e) {
                                      return e &&
                                          "function" == typeof Symbol &&
                                          e.constructor === Symbol &&
                                          e !== Symbol.prototype
                                          ? "symbol"
                                          : typeof e;
                                  };
                    r.default = function (e) {
                        var r = {
                            previousConformedValue: void 0,
                            previousPlaceholder: void 0,
                        };
                        return {
                            state: r,
                            update: function (t) {
                                var n =
                                        arguments.length > 1 &&
                                        void 0 !== arguments[1]
                                            ? arguments[1]
                                            : e,
                                    u = n.inputElement,
                                    s = n.mask,
                                    p = n.guide,
                                    m = n.pipe,
                                    y = n.placeholderChar,
                                    g = void 0 === y ? d.placeholderChar : y,
                                    b = n.keepCharPositions,
                                    C = void 0 !== b && b,
                                    x = n.showMask,
                                    P = void 0 !== x && x;
                                if (
                                    (void 0 === t && (t = u.value),
                                    t !== r.previousConformedValue)
                                ) {
                                    (void 0 === s ? "undefined" : a(s)) === h &&
                                        void 0 !== s.pipe &&
                                        void 0 !== s.mask &&
                                        ((m = s.pipe), (s = s.mask));
                                    var k = void 0,
                                        w = void 0;
                                    if (
                                        (s instanceof Array &&
                                            (k = (0,
                                            c.convertMaskToPlaceholder)(s, g)),
                                        !1 !== s)
                                    ) {
                                        var O = (function (e) {
                                                if ((0, c.isString)(e))
                                                    return e;
                                                if ((0, c.isNumber)(e))
                                                    return String(e);
                                                if (void 0 === e || null === e)
                                                    return v;
                                                throw new Error(
                                                    "The 'value' provided to Text Mask needs to be a string or a number. The value received was:\n\n " +
                                                        JSON.stringify(e)
                                                );
                                            })(t),
                                            T = u.selectionEnd,
                                            M = r.previousConformedValue,
                                            _ = r.previousPlaceholder,
                                            S = void 0;
                                        if (
                                            (void 0 === s
                                                ? "undefined"
                                                : a(s)) === d.strFunction
                                        ) {
                                            if (
                                                !1 ===
                                                (w = s(O, {
                                                    currentCaretPosition: T,
                                                    previousConformedValue: M,
                                                    placeholderChar: g,
                                                }))
                                            )
                                                return;
                                            var j = (0, c.processCaretTraps)(w),
                                                V = j.maskWithoutCaretTraps,
                                                A = j.indexes;
                                            (w = V),
                                                (S = A),
                                                (k = (0,
                                                c.convertMaskToPlaceholder)(
                                                    w,
                                                    g
                                                ));
                                        } else w = s;
                                        var E = {
                                                previousConformedValue: M,
                                                guide: p,
                                                placeholderChar: g,
                                                pipe: m,
                                                placeholder: k,
                                                currentCaretPosition: T,
                                                keepCharPositions: C,
                                            },
                                            N = (0, f.default)(O, w, E),
                                            F = N.conformedValue,
                                            I =
                                                (void 0 === m
                                                    ? "undefined"
                                                    : a(m)) === d.strFunction,
                                            L = {};
                                        I &&
                                            (!1 ===
                                            (L = m(F, i({ rawValue: O }, E)))
                                                ? (L = {
                                                      value: M,
                                                      rejected: !0,
                                                  })
                                                : (0, c.isString)(L) &&
                                                  (L = { value: L }));
                                        var R = I ? L.value : F,
                                            J = (0, l.default)({
                                                previousConformedValue: M,
                                                previousPlaceholder: _,
                                                conformedValue: R,
                                                placeholder: k,
                                                rawValue: O,
                                                currentCaretPosition: T,
                                                placeholderChar: g,
                                                indexesOfPipedChars:
                                                    L.indexesOfPipedChars,
                                                caretTrapIndexes: S,
                                            }),
                                            W = R === k && 0 === J,
                                            q = P ? k : v,
                                            z = W ? q : R;
                                        (r.previousConformedValue = z),
                                            (r.previousPlaceholder = k),
                                            u.value !== z &&
                                                ((u.value = z), o(u, J));
                                    }
                                }
                            },
                        };
                    };
                    var u = t(4),
                        l = n(u),
                        s = t(2),
                        f = n(s),
                        c = t(3),
                        d = t(1),
                        v = "",
                        p = "none",
                        h = "object",
                        m =
                            "undefined" != typeof navigator &&
                            /Android/i.test(navigator.userAgent),
                        y =
                            "undefined" != typeof requestAnimationFrame
                                ? requestAnimationFrame
                                : setTimeout;
                },
            ]);
        },
    });
    if ("object" == typeof t) {
        var n = [
            "object" == typeof module && "object" == typeof module.exports
                ? module.exports
                : null,
            "undefined" != typeof window ? window : null,
            e && e !== window ? e : null,
        ];
        for (var o in t)
            n[0] && (n[0][o] = t[o]),
                n[1] && "__esModule" !== o && (n[1][o] = t[o]),
                n[2] && (n[2][o] = t[o]);
    }
})(this);
