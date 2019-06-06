;(function() {
    "use strict";

    /** @type {HTMLElement} */
    var mySidebar;

    /** @type {CSSStyleDeclaration} */
    var mySidebarStyle;

    /** @type {HTMLDivElement} */
    var overlayBg;

    /** @type {HTMLAnchorElement} sidebarButton */
    var sidebarButton;

    window.addEventListener("load", function(evt) {
        mySidebar = document.getElementById("sidebar");
        mySidebarStyle = window.getComputedStyle(mySidebar);
        overlayBg = document.getElementById("overlay");
        sidebarButton = document.getElementById("sidebarButton");

        sidebarButton.addEventListener("click", function(evt) { evt.preventDefault(); toggleSidebar() });
        overlayBg.addEventListener("click", function(evt) { toggleSidebar() });

        document.querySelectorAll(".accordion").forEach(function(elem) {
            elem.addEventListener("click", function(evt) {
                var target = document.querySelector(elem.attributes["data-target"].value);
                target.style.display = (target.style.display === "none"? "": "none");
                evt.preventDefault();
            });
        });
    });

    function toggleSidebar() {
        /* Sidebar is visible, hide it */
        if (Number.parseInt(mySidebarStyle.left) === 0) {
            mySidebar.style.left = "";
            sidebarButton.classList.remove("w3-indigo");
            overlayBg.style.display = "";
        }
        /* Sidebar is not visible, show it */
        else {
            mySidebar.style.left = "0";
            sidebarButton.classList.add("w3-indigo");
            overlayBg.style.display = "block";
        }
    }
})();
