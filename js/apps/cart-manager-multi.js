/**
 * Created by Nicolas on 10/03/14.
 */
;(function($){
    var spinner_opts = {
        lines: 9,
        length: 1,
        width: 5,
        radius: 11,
        corners: 1,
        rotate: 1,
        direction: 1,
        color: '#182864',
        speed: 1,
        trail: 60,
        shadow: false,
        hwaccel: false,
        className: 'spinner',
        zIndex: 2e9,
        top: 'auto',
        left: 'auto'
    };
    var cartBtn = $(".cart-btn").not(".disabled");
    var postUrl = "/php/add_to_cart.php";
    var cart = $("#panier");
    var amount = cart.find("#montant-total");
    var quantity = cart.find("#num-articles");
    var overlay = $("<div class='overlay'><div id='spinner-box'></div></div>");
    var spinnerBox = overlay.find("#spinner-box");
    spinnerBox.spin(spinner_opts);

    function positionSpinner(){
        var W = $(window).width();
        var H = $(window).height();
        var w = spinnerBox.width();
        var h = spinnerBox.height();
        spinnerBox.css("top", ((H-h)/2) + "px").css("left", ((W-w)/2) + "px");
    }

    positionSpinner();

    $("body").prepend(overlay);

    $(window).on("resize", function(){
        positionSpinner();
    });

    cartBtn.on("click", function(evt){
        evt.preventDefault();

        var id = $(this).data("articleId");
        overlay.addClass("active");
        $.post(postUrl, {id: id}, "json")
            .done(function(data,status,xhr){
                if(data.errorStatus == "ok"){
                    amount.text(data.newAmount);
                    quantity.text(data.newQuantity);
                    overlay.removeClass("active");
                }
            });
    });



})(jQuery);
