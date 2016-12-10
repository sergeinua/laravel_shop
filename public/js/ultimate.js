US = {
    version: "1.0",
    cartVisibleSuffix: "&nbsp;С‚РѕРІР°СЂРѕРІ,&nbsp;С‚РѕРІР°СЂ,&nbsp;С‚РѕРІР°СЂР°",
    cartCookie: "__uscart",
    debug: function (c, b) {
        function d(p, o, s, j) {
            j = j || 0;
            o = o || 10;
            s = s || " ";
            if (j > o) {
                return "[WARNING: Too much recursion]\n"
            }
            var k, g = "",
                q = typeof p,
                h = "";
            if (p === null) {
                g += "(null)\n"
            } else {
                if (q == "object") {
                    j++;
                    for (k = 0; k < j; k++) {
                        h += s
                    }
                    if (p && p.length) {
                        q = "array"
                    }
                    g += "(" + q + ") :\n";
                    for (k in p) {
                        try {
                            g += h + "[" + k + "] : " + d(p[k], o, s, (j + 1))
                        } catch (m) {
                            return "[ERROR: " + m + "]\n"
                        }
                    }
                } else {
                    if (q == "string") {
                        if (p == "") {
                            p = "(empty)"
                        }
                    }
                    g += "(" + q + ") " + p + "\n"
                }
            }
            return g
        }

        if (b) {
            return d(c)
        } else {
            alert(d(c))
        }
    },
    checkId: function (c) {
        var b = /^[0-9vm]+$/i;
        if (b.test(c)) {
            return c
        }
        return 0
    },
    Currency: {
        name: "",
        course: 1,
        decimals: 0,
        dsep: " ",
        tsep: "&nbsp;",
        init: function (b) {
            if (typeof (b.name) != "undefined") {
                this.name = b.name
            }
            if (typeof (b.course) != "undefined") {
                this.course = parseFloat(b.course);
                if (!this.course) {
                    this.course = 1
                }
            }
            if (typeof (b.decimals) != "undefined") {
                this.decimals = parseInt(b.decimals);
                if (!this.decimals) {
                    this.decimals = 0
                }
            }
            if (typeof (b.dsep) != "undefined") {
                this.dsep = b.dsep
            }
            if (typeof (b.tsep) != "undefined") {
                this.tsep = b.tsep
            }
        }
    },
    Cart: {
        count: 0,
        price: 0,
        elements: [],
        save: function () {
            this.count = 0;
            this.price = 0;
            if (!this.elements) {
                return
            }
            cookie = new Array();
            for (i in this.elements) {
                this.count += this.elements[i].qty;
                this.price += this.elements[i].price * this.elements[i].qty;
                cookie[i] = this.elements[i].id + ":" + this.elements[i].qty + ":" + this.elements[i].price
            }
            US.Cookie(US.cartCookie, cookie.join("|"), {
                expires: 7,
                path: "/"
            });
            if (typeof (this.onsave) == "function") {
                this.onsave()
            }
        },
        init: function (elements) {
            if (!elements) {
                elements = US.Cookie(US.cartCookie)
            }
            if (!elements) {
                return
            }
            l = "Incorrect elements [{id: 1, price:2, qty: 3}, {id: 2, price:3, qty: 4}] format: ";
            if (typeof (elements) == "object") {
                for (i in elements) {
                    with (elements[i]) {
                        this.elements[i] = elements[i];
                        if (typeof (id) == "undefined") {
                            throw l + "id is empty for " + i + " element"
                        }
                        this.elements[i].id = US.checkId(id);
                        if (!this.elements[i].id) {
                            throw l + "id is not a number"
                        }
                        this.elements[i].price = typeof (price) == "undefined" ? 0 : US.nf(price);
                        this.elements[i].qty = typeof (qty) == "undefined" ? 1 : parseInt(qty)
                    }
                }
            } else {
                if (typeof (elements) == "string") {
                    elements = elements.split("|");
                    var n = 0;
                    for (i in elements) {
                        a = elements[i].split(":");
                        a[0] = US.checkId(a[0]);
                        if (!a[0]) {
                            throw 'Incorrect elements "id1:qty1:price1|id2:qty2..." format: id is not a number'
                        }
                        this.elements[n] = {};
                        this.elements[n].id = a[0];
                        this.elements[n].qty = typeof (a[1]) == "undefined" ? 0 : parseInt(a[1]);
                        this.elements[n].price = typeof (a[2]) == "undefined" ? 1 : US.nf(a[2]);
                        n++
                    }
                }
            }
            this.save()
        },
        mkItem: function (d, c, b) {
            el = {
                id: 0,
                qty: 1,
                price: 0
            };
            if (typeof (d) == "object") {
                if (typeof (d[0]) == "object") {
                    el = d[0];
                    el.qty = el.qty || 1;
                    el.price = US.nf(el.price) || 0
                } else {
                    if (US.checkId(d[0])) {
                        el.id = d[0];
                        el.qty = typeof (d[1]) == "number" ? d[1] : 1;
                        el.price = typeof (d[2]) != "undefined" ? US.nf(d[2]) : 0
                    }
                }
            } else {
                el.id = d || 0;
                el.qty = c || 1;
                el.price = US.nf(b) || 0
            }
            if (!el.id) {
                throw "Incorrect el id (US.Cart.mkItem) " + US.debug(arguments, 1)
            }
            if (el.qty < 0) {
                throw "Incorrect el quantity (<0) (US.Cart.mkItem) " + US.debug(arguments, 1)
            }
            if (el.price < 0) {
                throw "Incorrect el quantity (<0) (US.Cart.mkItem) " + US.debug(arguments, 1)
            }
            return el
        },
        add: function () {
            el = this.mkItem(arguments);
            f = 0;
            for (i in this.elements) {
                if (this.elements[i].id == el.id) {
                    this.elements[i].price = el.price ? US.nf(el.price) : this.elements[i].price;
                    this.elements[i].qty += el.qty;
                    f = 1;
                    break
                }
            }
            if (!f) {
                l = this.elements.length;
                this.elements[l] = el
            }
            this.save()
        },
        del: function () {
            el = this.mkItem(arguments);
            newItems = new Array();
            n = 0;
            for (i in this.elements) {
                if (this.elements[i].id != el.id) {
                    newItems[n] = this.elements[i];
                    n++
                }
            }
            this.elements = newItems;
            this.save()
        },
        find: function () {
            el = this.mkItem(arguments);
            for (i in this.elements) {
                if (this.elements[i].id == el.id) {
                    return i
                }
            }
        },
        update: function () {
            el = this.mkItem(arguments);
            n = this.find(el);
            if (n) {
                this.elements[n] = el
            }
            this.save()
        },
        getCount: function () {
            return this.count
        },
        getPrice: function () {
            return this.price
        },
        clear: function () {
            this.elements = {};
            this.save()
        }
    },
    money: function (d, b, c) {
        b = b || "";
        c = c || "&nbsp;";
        $price = US.formatPrice(d) + "";
        if (b) {
            $price = "<" + b + ">" + $price + "</" + b + ">"
        }
        if (US.Currency.name) {
            $price += c + US.Currency.name
        }
        return $price
    },
    nf: function (h, d, m, g) {
        function j(s, r) {
            r = !r ? " \\s\u00A0" : (r + "").replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, "\\$1");
            var q = new RegExp("[" + r + "]+$", "g");
            return (s + "").replace(q, "")
        }

        h = (h + "").replace(/[^0-9+\-Ee.]/g, "");
        var c = !isFinite(+h) ? 0 : +h,
            b = !isFinite(+d) ? 2 : Math.abs(d),
            p = (typeof g === "undefined") ? "" : g,
            e = (typeof m === "undefined") ? "." : m,
            o = "",
            k = function (s, r) {
                var q = Math.pow(10, r);
                return "" + Math.round(s * q) / q
            };
        o = (b ? k(c, b) : "" + Math.round(c)).split(".");
        if (o[0].length > 3) {
            o[0] = o[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, p)
        }
        if ((o[1] || "").length < b) {
            o[1] = o[1] || "";
            o[1] += new Array(b - o[1].length + 1).join("0")
        }
        val = o.join(e);
        if ((o[1] || "").length < b) {
            val = j(val, "0");
            val = j(val, ".")
        }
        return val
    },
    formatPrice: function (b) {
        b = US.nf(b, US.Currency.decimals, US.Currency.dsep, US.Currency.tsep);
        return b
    },
    Cookie: function (c, m, q) {
        if (typeof m != "undefined") {
            q = q || {};
            if (m === null) {
                m = "";
                q.expires = -1
            }
            var g = "";
            if (q.expires && (typeof q.expires == "number" || q.expires.toUTCString)) {
                var h;
                if (typeof q.expires == "number") {
                    h = new Date();
                    h.setTime(h.getTime() + (q.expires * 24 * 60 * 60 * 1000))
                } else {
                    h = q.expires
                }
                g = "; expires=" + h.toUTCString()
            }
            var p = q.path ? "; path=" + (q.path) : "";
            var j = q.domain ? "; domain=" + (q.domain) : "";
            var b = q.secure ? "; secure" : "";
            document.cookie = [c, "=", encodeURIComponent(m), g, p, j, b].join("")
        } else {
            var e = null;
            if (document.cookie && document.cookie != "") {
                var o = document.cookie.split(";");
                for (var k = 0; k < o.length; k++) {
                    var d = o[k].replace(/^\s*|\s*$/g, "");
                    if (d.substring(0, c.length + 1) == (c + "=")) {
                        e = decodeURIComponent(d.substring(c.length + 1));
                        break
                    }
                }
            }
            return e
        }
    },
    ruscomp: function (c, b) {
        $comp = b.split(",");
        if (c == 0 || (c % 10) == 0) {
            return $comp[0]
        }
        if (c >= 5 && c <= 20) {
            return $comp[0]
        }
        if (c % 10 >= 5 && c % 10 <= 9) {
            return $comp[0]
        }
        if ((c % 10) == 1) {
            return $comp[1]
        }
        if ((c % 10) >= 2 && (c % 10) <= 4) {
            return $comp[2]
        }
    }
};