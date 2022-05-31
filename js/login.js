$ = jQuery.noConflict();

$(document).ready(function () {
    $('#login h1, #login form').wrapAll('<div class="grupo"></div>');
    $("body").vegas({
        slides: [
            { src: login_imagenes.ruta_plantilla + '/img/fondo-login-uno.jpg' },
            { src: login_imagenes.ruta_plantilla + '/img/fondo-login-dos.jpg' },
            { src: login_imagenes.ruta_plantilla + '/img/fondo-login-tres.jpg' }
        ],
        overlay: login_imagenes.ruta_plantilla + '/img/overlays/05.png',
        transition: ['flash2', 'zoomOut', 'swirlLeft']

    })
});