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

/***/ }),

/***/ "./js/blocks/accordion.js":
/*!********************************!*\
  !*** ./js/blocks/accordion.js ***!
  \********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   khdAccordion: function() { return /* binding */ khdAccordion; }
/* harmony export */ });
const khdAccordion = () => {
  const acc = document.getElementsByClassName("khd-accordion__button");
  document.querySelector('body').addEventListener('click', function (e) {
    const that = e.target;
    if (!that.classList.contains('khd-accordion__button')) return;
    for (const i = 0; i < acc.length; i++) {
      that.classList.toggle("khd-accordion__button--active");
      const panel = that.nextElementSibling;
      if (panel.style.maxHeight) panel.style.maxHeight = null;else panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
};

/***/ }),

/***/ "./js/blocks/popup.js":
/*!****************************!*\
  !*** ./js/blocks/popup.js ***!
  \****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   khdToggable: function() { return /* binding */ khdToggable; }
/* harmony export */ });
function* parents(e, selector) {
  while (e = e.parentElement) {
    if (e.matches(selector)) {
      yield e;
    }
  }
}
const khdToggable = () => {
  document.body.addEventListener('click', e => {
    e.stopPropagation();
    let clicked = e.target;
    if (clicked.tagName == "svg") clicked = clicked.parentElement;
    if (!clicked.hasAttribute("data-toggable_open")) return;
    const parent = [...parents(e.target, '[data-toggable]')][0];
    console.log(parent);
    if (!parent) return;
    parent.dataset.control = "open";
  });
  document.body.addEventListener('click', e => {
    e.stopPropagation();
    let clicked = e.target;
    if (clicked.tagName == "svg") clicked = clicked.parentElement;
    if (!clicked.hasAttribute("data-toggable_close")) return;
    const parent = [...parents(e.target, '[data-toggable]')][0];
    console.log(parent);
    if (parent) {
      parent.dataset.control = "close";
    }
  });
};

/***/ }),

/***/ "./js/blocks/tabs.js":
/*!***************************!*\
  !*** ./js/blocks/tabs.js ***!
  \***************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   khdTabs: function() { return /* binding */ khdTabs; }
/* harmony export */ });
const khdTabs = () => {
  const tabs = document.getElementsByClassName("khd-tabs__button");
  console.log(tabs);
  document.querySelector('body').addEventListener('click', function (e) {
    const that = e.target;
    console.log(that);
    if (!that.classList.contains('khd-tabs__button')) return;
    for (const el of document.querySelectorAll('.khd-tabs__button--active')) if (el.classList.contains('khd-tabs__button--active')) el.classList.remove('khd-tabs__button--active');
    that.classList.toggle("khd-tabs__button--active");
    const index = Array.from(that.parentElement.children).indexOf(that);
    const panel = document.querySelectorAll('.khd-tabs__panel')[index];
    for (const el of document.querySelectorAll('.khd-tabs__panel')) el.style.display = "none";
    panel.style.display = "block";
  });
};

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ (function(module) {

module.exports = window["wp"]["element"];

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
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
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
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _js_ajax_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../js/ajax.js */ "./js/ajax.js");
/* harmony import */ var _js_blocks_accordion_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../js/blocks/accordion.js */ "./js/blocks/accordion.js");
/* harmony import */ var _js_blocks_tabs_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../js/blocks/tabs.js */ "./js/blocks/tabs.js");
/* harmony import */ var _js_blocks_popup_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../js/blocks/popup.js */ "./js/blocks/popup.js");





jQuery(document).ready(function ($) {
  (0,_js_ajax_js__WEBPACK_IMPORTED_MODULE_1__.ajax)($);
  (0,_js_blocks_accordion_js__WEBPACK_IMPORTED_MODULE_2__.khdAccordion)();
  (0,_js_blocks_tabs_js__WEBPACK_IMPORTED_MODULE_3__.khdTabs)();
  new Splide('.splide').mount();
  (0,_js_blocks_popup_js__WEBPACK_IMPORTED_MODULE_4__.khdToggable)();
});
const {
  registerBlockType
} = wp.blocks;
const {
  PanelBody,
  TextControl,
  ColorPalette,
  BaseControl
} = wp.components;
const {
  withSelect,
  withDispatch
} = wp.data;
const {
  InspectorControls,
  RichText
} = wp.blockEditor;
registerBlockType('custom-repeater-block/custom-repeater-block', {
  title: 'Custom Repeater Block',
  icon: 'star-filled',
  category: 'common',
  attributes: {
    items: {
      type: 'array',
      default: []
    }
  },
  edit: function (props) {
    const {
      attributes,
      setAttributes
    } = props;
    const onUpdateItem = (newItem, index) => {
      const newItems = [...attributes.items];
      newItems[index] = newItem;
      setAttributes({
        items: newItems
      });
    };
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
      title: "Customize"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BaseControl, {
      label: "Font Size"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(TextControl, {
      value: attributes.fontSize,
      onChange: fontSize => setAttributes({
        fontSize
      })
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BaseControl, {
      label: "Font Color"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ColorPalette, {
      value: attributes.fontColor,
      onChange: fontColor => setAttributes({
        fontColor
      })
    })))));
  },
  save: function () {
    // Define the save function for your block
  }
});
}();
/******/ })()
;
//# sourceMappingURL=index.js.map