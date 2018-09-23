/* global systemorphScreenReaderText */
!function(s){
// Set properties of navigation.
function e(){T=m.height(),k=m.outerHeight(),x=2*parseFloat(h.css("padding-top")),q=2*f.outerHeight(),H=T<=(E=x+q)}
// Make navigation 'stick'.
function t(){
// Make sure we're not on a mobile screen.
"none"===g.css("display")&&(
// Make sure the nav isn't taller than two rows.
H?(
// When there's a custom header image or video, the header offset includes the height of the navigation.
A=y&&(c.hasClass("has-header-image")||c.hasClass("has-header-video"))?l.innerHeight()-k:l.innerHeight(),
// If the scroll is more than the custom header, set the fixed class.
s(window).scrollTop()>=A?m.addClass(C):m.removeClass(C)):
// Remove 'fixed' class if nav is taller than two rows.
m.removeClass(C))}
// Set margins of branding in header.
function n(){"none"===g.css("display")?
// The margin should be applied to different elements on front-page or home vs interior pages.
y?u.css("margin-bottom",k):l.css("margin-bottom",k):(l.css("margin-bottom","0"),u.css("margin-bottom","0"))}
// Set icon for quotes.
function o(){s(systemorphScreenReaderText.quote).prependTo(v)}
// Add 'below-entry-meta' class to elements.
function a(e){var t,o;!c.hasClass("has-sidebar")||c.hasClass("search")||c.hasClass("single-attachment")||c.hasClass("error404")||c.hasClass("systemorph-front-page")||(t=p.offset(),o=t.top+(p.height()+28),w.find(e).each(function(){var e=s(this),t,n=e.offset().top;
// Add 'below-entry-meta' to elements below the entry meta.
o<n?e.addClass("below-entry-meta"):e.removeClass("below-entry-meta")}))}
/*
	 * Test if inline SVGs are supported.
	 * @link https://github.com/Modernizr/Modernizr/
	 */function i(){var e=document.createElement("div");return e.innerHTML="<svg/>","http://www.w3.org/2000/svg"===("undefined"!=typeof SVGRect&&e.firstChild&&e.firstChild.namespaceURI)}
/**
	 * Test if an iOS device.
	*/function r(){return/iPad|iPhone|iPod/.test(navigator.userAgent)&&!window.MSStream}
/*
	 * Test if background-attachment: fixed is supported.
	 * @link http://stackoverflow.com/questions/14115080/detect-support-for-background-attachment-fixed
	 */function d(){var e=document.createElement("div"),t;try{return"backgroundAttachment"in e.style&&!r()&&(t=(e.style.backgroundAttachment="fixed")===e.style.backgroundAttachment)}catch(e){return!1}}
// Fire on document ready.
// Variables and DOM Caching.
var c=s("body"),l=c.find(".custom-header"),u=l.find(".site-branding"),m=c.find(".navigation-top"),h=m.find(".wrap"),f=m.find(".menu-item"),g=m.find(".menu-toggle"),b=c.find(".menu-scroll-down"),p=c.find("#secondary"),w=c.find(".entry-content"),v=c.find(".format-quote blockquote"),y=c.hasClass("systemorph-front-page")||c.hasClass("home blog"),C="site-navigation-fixed",T,k,x,q,E,H,A,S=0,N;
// Ensure the sticky navigation doesn't cover current focused links.
s("a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex], [contenteditable]",".site-content-contain").filter(":visible").focus(function(){if(m.hasClass("site-navigation-fixed")){var e=s(window).scrollTop(),t=m.height(),n=s(this).offset().top,o=n-e;
// Account for Admin bar.
s("#wpadminbar").length&&(o-=s("#wpadminbar").height()),o<t&&s(window).scrollTo(n-(t+50),0)}}),s(document).ready(function(){
// If navigation menu is present on page, setNavProps and adjustScrollClass.
m.length&&(e(),t()),
// If 'Scroll Down' arrow in present on page, calculate scroll offset and bind an event handler to the click event.
b.length&&(s("body").hasClass("admin-bar")&&(S-=32),s("body").hasClass("blog")&&(S-=30),m.length||(k=0),b.click(function(e){e.preventDefault(),s(window).scrollTo("#primary",{duration:600,offset:{top:S-k}})})),n(),o(),!0===i()&&(document.documentElement.className=document.documentElement.className.replace(/(\s*)no-svg(\s*)/,"$1svg$2")),!0===d()&&(document.documentElement.className+=" background-fixed")}),
// If navigation menu is present on page, adjust it on scroll and screen resize.
m.length&&(
// On scroll, we want to stick/unstick the navigation.
s(window).on("scroll",function(){t(),n()}),
// Also want to make sure the navigation is where it should be on resize.
s(window).resize(function(){e(),setTimeout(t,500)})),s(window).resize(function(){clearTimeout(N),N=setTimeout(function(){a("blockquote.alignleft, blockquote.alignright")},300),setTimeout(n,1e3)}),
// Add header video class after the video is loaded.
s(document).on("wp-custom-header-video-loaded",function(){c.addClass("has-header-video")})}(jQuery);