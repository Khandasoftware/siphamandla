/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./js/ajax.js":
/*!********************!*\
  !*** ./js/ajax.js ***!
  \********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   ajax: function() { return /* binding */ ajax; }
/* harmony export */ });
const ajax = $ => {
  $('[data-ajax]').on('submit', function (e) {
    e.preventDefault();
    const form = $(this);
    const formData = {};
    form.find("[data-ajax_input]").each((index, element) => {
      const key = $(element).attr("name");
      if (key.trim() === "" || key === undefined || key === null) return;
      let value = $(element).val();
      if ($(element).prop("nodeName") == 'SELECT') value = $(element).find(":selected").val();
      if ($(element).prop("nodeName") == 'TEXTAREA') value = $(element).text();
      if ($(element).attr("type") == "checkbox") {
        if ($(element).is(":checked")) value = true;else value = false;
      }
      if (value === undefined || value === null) {
        console.error(`value can not be null at iteration ${index}`);
        return;
      }
      formData[key] = value;
    });
    if (!formData.ajax_nonce) {
      console.error("Nonce is mandetory");
      return;
    }
    if (form.data("ajax").trim == "") {
      console.error("Ajax handler is mandetory");
      return;
    }
    if (!(form.find("[ajax_loader]").length > 0)) console.error("Loader would be nice");
    if (!ajax_object.ajax_url) {
      console.error("Server url is mandetory");
      return;
    }
    formData.callback = form.data("ajax");
    formData.action = 'custom_ajax_action';
    console.log(formData);
    $.ajax({
      type: 'POST',
      url: ajax_object.ajax_url,
      data: formData,
      beforeSend: function () {
        form.find("[ajax_loader]").show();
      },
      success: function (response) {
        // Handle the AJAX response here
        if (!response.success) console.error(response.data.message);else console.log(response.data.message);
      },
      error: function (error) {
        // Handle errors here
        console.error('AJAX Error:', error.data.message);
      },
      complete: function () {
        form.find("[ajax_loader]").hide();
      }
    });
  });
};

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_ajax_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../js/ajax.js */ "./js/ajax.js");

jQuery(document).ready(function ($) {
  (0,_js_ajax_js__WEBPACK_IMPORTED_MODULE_0__.ajax)($);
});
}();
/******/ })()
;
//# sourceMappingURL=index.js.map