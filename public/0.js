webpackJsonp([0],{

/***/ 60:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(13)
/* script */
var __vue_script__ = __webpack_require__(61)
/* template */
var __vue_template__ = __webpack_require__(62)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources\\assets\\js\\views\\login.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-653a9168", Component.options)
  } else {
    hotAPI.reload("data-v-653a9168", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 61:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            movieList: [{
                name: 'The Shawshank Redemption',
                url: 'https://movie.douban.com/subject/1292052/',
                rate: 9.6
            }, {
                name: 'Leon:The Professional',
                url: 'https://movie.douban.com/subject/1295644/',
                rate: 9.4
            }, {
                name: 'Farewell to My Concubine',
                url: 'https://movie.douban.com/subject/1291546/',
                rate: 9.5
            }, {
                name: 'Forrest Gump',
                url: 'https://movie.douban.com/subject/1292720/',
                rate: 9.4
            }, {
                name: 'Life Is Beautiful',
                url: 'https://movie.douban.com/subject/1292063/',
                rate: 9.5
            }, {
                name: 'Spirited Away',
                url: 'https://movie.douban.com/subject/1291561/',
                rate: 9.2
            }, {
                name: 'Schindlers List',
                url: 'https://movie.douban.com/subject/1295124/',
                rate: 9.4
            }, {
                name: 'The Legend of 1900',
                url: 'https://movie.douban.com/subject/1292001/',
                rate: 9.2
            }, {
                name: 'WALL·E',
                url: 'https://movie.douban.com/subject/2131459/',
                rate: 9.3
            }, {
                name: 'Inception',
                url: 'https://movie.douban.com/subject/3541415/',
                rate: 9.2
            }],
            randomMovieList: []
        };
    },

    methods: {
        changeLimit: function changeLimit() {
            function getArrayItems(arr, num) {
                var temp_array = [];
                for (var index in arr) {
                    temp_array.push(arr[index]);
                }
                var return_array = [];
                for (var i = 0; i < num; i++) {
                    if (temp_array.length > 0) {
                        var arrIndex = Math.floor(Math.random() * temp_array.length);
                        return_array[i] = temp_array[arrIndex];
                        temp_array.splice(arrIndex, 1);
                    } else {
                        break;
                    }
                }
                return return_array;
            }
            this.randomMovieList = getArrayItems(this.movieList, 5);
        }
    },
    mounted: function mounted() {
        this.changeLimit();
    }
});

/***/ }),

/***/ 62:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("Card", { staticStyle: { width: "350px" } }, [
    _c(
      "p",
      { attrs: { slot: "title" }, slot: "title" },
      [
        _c("Icon", { attrs: { type: "ios-film-outline" } }),
        _vm._v("\n        Classic film\n    ")
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "a",
      {
        attrs: { slot: "extra", href: "#" },
        on: {
          click: function($event) {
            $event.preventDefault()
            return _vm.changeLimit($event)
          }
        },
        slot: "extra"
      },
      [
        _c("Icon", { attrs: { type: "ios-loop-strong" } }),
        _vm._v("\n        Change\n    ")
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "ul",
      _vm._l(_vm.randomMovieList, function(item) {
        return _c("li", [
          _c("a", { attrs: { href: item.url, target: "_blank" } }, [
            _vm._v(_vm._s(item.name))
          ]),
          _vm._v(" "),
          _c(
            "span",
            [
              _vm._l(4, function(n) {
                return _c("Icon", { key: n, attrs: { type: "ios-star" } })
              }),
              item.rate >= 9.5
                ? _c("Icon", { attrs: { type: "ios-star" } })
                : _c("Icon", { attrs: { type: "ios-star-half" } }),
              _vm._v(
                "\n                " + _vm._s(item.rate) + "\n            "
              )
            ],
            2
          )
        ])
      })
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-653a9168", module.exports)
  }
}

/***/ })

});