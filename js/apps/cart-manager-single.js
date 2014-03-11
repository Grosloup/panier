/**
 * Created by Nicolas on 11/03/14.
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

    var postUrl = "/php/add_to_cart.php";
    var cart = $("#panier");
    var amount = cart.find("#montant-total");
    var quantity = cart.find("#num-articles");
    var plusBtn = $(".article-plus");
    var minusBtn = $(".article-minus");
    var display = $("#article-quantity-field");
    var commandBtn = $(".article-command").find(".btn");
    var id = commandBtn.data("articleId");
    var limited = parseInt(commandBtn.data("articleLimited"));
    var quantityAdded = 1;
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

    function updateDisplay(q){
        quantityAdded += q;
        if(quantityAdded > limited){
            quantityAdded = limited;
        }
        if(quantityAdded<1){
            quantityAdded = 1;
        }
        display.val(quantityAdded);
    }

    updateDisplay(0);

    plusBtn.on("click", function(evt){
        evt.preventDefault();
        updateDisplay(1);
    });

    minusBtn.on("click", function(evt){
        evt.preventDefault();
        updateDisplay(-1);
    });

    display.on("keyup", function(evt){
        evt.preventDefault();

        if(evt.keyCode == 13){
            var q;
            var val = $(this).val();
            if(!val.match(/^[0-9]+$/)){
                return false;
            }
            q = parseInt(val);
            if(q > limited){
                q = limited;
            }
            overlay.addClass("active");
            updateDisplay(1-q);
            $.post(postUrl, {id:id,quantity: q}, "json")
                .done(function(data,status,xhr){
                    if(data.errorStatus == "ok"){
                        //rowAmount.text(initQuantity * uPrice);
                        amount.text(data.newAmount);
                        quantity.text(data.newQuantity);
                        overlay.removeClass("active");
                    }
                });
        }
    });

    commandBtn.on("click", function(evt){
        evt.preventDefault();

        overlay.addClass("active");
        $.post(postUrl, {id:id,quantity: display.val()}, "json")
            .done(function(data,status,xhr){
                if(data.errorStatus == "ok"){
                    amount.text(data.newAmount);
                    quantity.text(data.newQuantity);
                    updateDisplay(-quantityAdded);
                    overlay.removeClass("active");
                }
            });
    });


})(jQuery);
