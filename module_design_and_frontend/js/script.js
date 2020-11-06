window.onload = init();

function init () {
    initRouteEditor();
    initMain();
}

function initRouteEditor () {
    app = id('app');
}

function initMain () {
    main = new Main();
    main.run();
}

function id (id) {
    return document.getElementById(id);
}