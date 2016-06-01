/*
 <a href="posts/2" data-method="delete"> <---- We want to send an HTTP DELETE request

 - Or, request confirmation in the process -

 <a href="posts/2" data-method="delete" data-confirm="Are you sure?">
 */

(function() {

    var laravel = {
        initialize: function() {
            this.methodLinks = $('a[data-method]');

            this.registerEvents();
        },

        registerEvents: function() {
            this.methodLinks.on('click', this.handleMethod);
        },

        handleMethod: function(e) {
            var link = $(this);
            var httpMethod = link.data('method').toUpperCase();
            var form;

            // If the data-method attribute is not PUT or DELETE,
            // then we don't know what to do. Just ignore.
            if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
                return;
            }

            // Allow user to optionally provide data-confirm="Are you sure?"
            if ( link.data('confirm') ) {
                if ( ! laravel.verifyConfirm(link) ) {
                    return false;
                }
            }

            form = laravel.createForm(link);
            form.submit();

            e.preventDefault();
        },

        verifyConfirm: function(link) {
            return confirm(link.data('confirm'));
        },

        createForm: function(link) {
            var form =
                $('<form>', {
                    'method': 'POST',
                    'action': link.attr('href')
                });

            var token =
                $('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': $('meta[name=csrf-token]').attr('content') // hmmmm...
                });

            var hiddenInput =
                $('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

            return form.append(token, hiddenInput)
                .appendTo('body');
        }
    };

    laravel.initialize();

})();

$(document).ready(function() {

    if($(window).width() < 768){
        $('#fullpage').fullpage({
            anchors: ['accueil','prestations','photos','tarifs', 'troyes', 'contact'],
            menu: '#menu',
            scrollingSpeed: 1000,
            autoScrolling: false
        })
    }else{
        $('#fullpage').fullpage({
            anchors: ['accueil','prestations','photos','tarifs', 'troyes', 'contact'],
            menu: '#menu',
            scrollingSpeed: 1000
        });
    }

});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

function showImage(imgSource){
    var curImg = document.getElementById('showImage');
    curImg.style.backgroundImage = "url("+imgSource+")";
    curImg.style.transition = "all 0.5s";
    document.getElementById(imgSource).style.opacity = "1";
    document.getElementById(imgSource).style.transition = "all 1s";
}

$('a').on('click', function(){
    var target = $(this).attr('rel');
    $("#"+target).show().siblings("div").hide();
});

$('.confirmation').on('click', function () {
    return confirm('Voulez-vous confirmer ce paiement ?');
});

var i = 1;
var n = 1;

    $(".jour1").click(function(){
        $(".jour").val(1);
        $(this).addClass("active").siblings().removeClass("active");
    });

$(".jour2").click(function(){
    $(".jour").val(2);
    $(this).addClass("active").siblings().removeClass("active");

});

$(".jour3").click(function(){
    $(".jour").val(3);
    $(this).addClass("active").siblings().removeClass("active");

});

$(".jour4").click(function(){
    $(".jour").val(4);
    $(this).addClass("active").siblings().removeClass("active");

});

$(".jour5").click(function(){
    $(".jour").val(5);
    $(this).addClass("active").siblings().removeClass("active");

});

$(".jour6").click(function(){
    $(".jour").val(6);
    $(this).addClass("active").siblings().removeClass("active");

});

$(".jour7").click(function(){
    $(".jour").val(7);
    $(this).addClass("active").siblings().removeClass("active");

});

new WOW().init();

jQuery(function($){
    $('.zoombox').zoombox();

    /**
     * Or You can also use specific options
     $('a.zoombox').zoombox({
                theme       : 'zoombox',        //available themes : zoombox,lightbox, prettyphoto, darkprettyphoto, simple
                opacity     : 0.8,              // Black overlay opacity
                duration    : 800,              // Animation duration
                animation   : true,             // Do we have to animate the box ?
                width       : 600,              // Default width
                height      : 400,              // Default height
                gallery     : true,             // Allow gallery thumb view
                autoplay : false                // Autoplay for video
            });
     */
});
