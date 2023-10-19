import { ajax } from "../js/ajax.js"
import { khdAccordion } from "../js/blocks/accordion.js"
import { khdTabs } from "../js/blocks/tabs.js"
import { khdToggable } from "../js/blocks/popup.js"
jQuery(document).ready(function ($) {
    ajax($)
    khdAccordion()
    khdTabs()
    new Splide( '.splide' ).mount()
    khdToggable()
})
