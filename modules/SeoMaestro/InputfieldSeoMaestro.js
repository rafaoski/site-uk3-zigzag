parcelRequire=function(e,r,n,t){var i="function"==typeof parcelRequire&&parcelRequire,o="function"==typeof require&&require;function u(n,t){if(!r[n]){if(!e[n]){var f="function"==typeof parcelRequire&&parcelRequire;if(!t&&f)return f(n,!0);if(i)return i(n,!0);if(o&&"string"==typeof n)return o(n);var c=new Error("Cannot find module '"+n+"'");throw c.code="MODULE_NOT_FOUND",c}p.resolve=function(r){return e[n][1][r]||r},p.cache={};var l=r[n]=new u.Module(n);e[n][0].call(l.exports,p,l,l.exports,this)}return r[n].exports;function p(e){return u(p.resolve(e))}}u.isParcelRequire=!0,u.Module=function(e){this.id=e,this.bundle=u,this.exports={}},u.modules=e,u.cache=r,u.parent=i,u.register=function(r,n){e[r]=[function(e,r){r.exports=n},{}]};for(var f=0;f<n.length;f++)u(n[f]);if(n.length){var c=u(n[n.length-1]);"object"==typeof exports&&"undefined"!=typeof module?module.exports=c:"function"==typeof define&&define.amd?define(function(){return c}):t&&(this[t]=c)}return u}({"T2Xs":[function(require,module,exports) {

},{}],"44Yw":[function(require,module,exports) {
"use strict";function t(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function e(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}function n(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}Object.defineProperty(exports,"__esModule",{value:!0}),exports.default=void 0;var i=function(){function e(n,i){t(this,e),this.$inputTitle=document.querySelector('[name="'.concat(i,'_meta_title"]')),this.$inputTitleInherit=document.querySelector('[name="'.concat(i,'_meta_title_inherit"]')),this.$title=n.querySelector("[data-title]"),this.$inputDesc=document.querySelector('[name="'.concat(i,'_meta_description"]')),this.$desc=n.querySelector("[data-desc]"),this.$inputDescInherit=document.querySelector('[name="'.concat(i,'_meta_description_inherit"]')),this.maxLengths={title:60,desc:160}}return n(e,[{key:"init",value:function(){return this.$title.innerHTML=this.truncateString(this.$title.innerHTML,this.maxLengths.title),this.$desc.innerHTML=this.truncateString(this.$desc.innerHTML,this.maxLengths.desc),this.initEventListeners()}},{key:"initEventListeners",value:function(){var t=this;return["keyup","blur"].forEach(function(e){t.$inputTitle.addEventListener(e,function(){t.$title.innerHTML=t.truncateString(t.$inputTitle.value,t.maxLengths.title)}),t.$inputDesc.addEventListener(e,function(){t.$desc.innerHTML=t.truncateString(t.$inputDesc.value,t.maxLengths.desc)})}),this.$inputTitleInherit.addEventListener("change",function(){var e=t.maxLengths.title;t.$inputTitleInherit.checked?t.$title.innerHTML=t.truncateString(t.$title.dataset.title,e):t.$inputTitle.value&&(t.$title.innerHTML=t.truncateString(t.$inputTitle.value,e))}),this.$inputDescInherit.addEventListener("change",function(){var e=t.maxLengths.desc;t.$inputDescInherit.checked?t.$desc.innerHTML=t.truncateString(t.$desc.dataset.desc,e):t.$inputDesc.value&&(t.$desc.innerHTML=t.truncateString(t.$inputDesc.value,e))}),this}},{key:"truncateString",value:function(t,e){if(t.length<e)return t;var n=t.substring(0,e);return n?"".concat(n,"..."):""}}]),e}();exports.default=i;
},{}],"Focm":[function(require,module,exports) {
"use strict";require("../scss/styles.scss");var e=t(require("./components/InputfieldGooglePreview"));function t(e){return e&&e.__esModule?e:{default:e}}document.addEventListener("DOMContentLoaded",function(){document.querySelectorAll("[data-seomaestro-googlepreview]").forEach(function(t){new e.default(t,t.dataset.seomaestroGooglepreview).init()}),document.querySelectorAll("[data-seomaestro-metadata-inherit]").forEach(function(e){e.addEventListener("change",function(t){if(!t.target.checked){var o=e.dataset.seomaestroMetadataInherit,a=document.querySelector('input[name="'.concat(o,'"], textarea[name="').concat(o,'"]'));a&&a.focus()}})})});
},{"../scss/styles.scss":"T2Xs","./components/InputfieldGooglePreview":"44Yw"}]},{},["Focm"], null)
//# sourceMappingURL=/InputfieldSeoMaestro.map