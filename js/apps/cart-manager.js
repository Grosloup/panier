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
    var totalAmount = $("#total-amount");
    var articleQuantity = $(".article-quantity");
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

    articleQuantity.each(function(){
        var plusBtn = $(this).find(".article-plus");
        var minusBtn = $(this).find(".article-minus");
        var display = $(this).find(".article-quantity-field");
        var uPrice = parseFloat($(this).data("articleUprice"));
        var id = $(this).data("articleId");
        var parent = $("#cart-article-" + id);
        var stock = $(this).data("articleStock");
        var rowAmount = $(this).next(".article-row-amount").find("span.row-amount");
        var initQuantity = parseInt(display.val());

        function updateRowAmount(){
            var total = uPrice * parseInt(display.val());
            rowAmount.text(total.toFixed(2));
        }

        function updateDisplay(q){
            initQuantity += q;
            if(initQuantity > stock){
                initQuantity = stock;
            }
            if(initQuantity<1){
                parent.remove();
            }
            display.val(initQuantity);
        }

        function updateOnResponse(newAmount, newQuantity){
            rowAmount.text((initQuantity * uPrice).toFixed(2));
            amount.text(newAmount);
            totalAmount.text(newAmount);
            quantity.text(newQuantity);
            overlay.removeClass("active");
        }

        display.on("blur", function(evt){
            evt.preventDefault();
            var q;
            var val = $(this).val();
            if(!val.match(/^[0-9]+$/)){
                val = initQuantity;
            }
            q = parseInt(val) - initQuantity;
            if(q===0){
                return false;
            }
            if(q<0 &&  Math.abs(q) > initQuantity){
                q = -initQuantity;
            }
            overlay.addClass("active");
            updateDisplay(q);
            $.post(postUrl, {id:id,quantity: q}, "json")
                .done(function(data,status,xhr){
                    if(data.errorStatus == "ok"){
                        updateOnResponse(data.newAmount, data.newQuantity);
                    }
                });
        });

        display.on("keyup", function(evt){
            evt.preventDefault();
            if(evt.keyCode == 13){
                var q;
                var val = $(this).val();
                if(!val.match(/^[0-9]+$/)){
                    val = initQuantity;
                }
                q = parseInt(val) - initQuantity;
                if(q===0){
                    return false;
                }
                if(q<0 &&  Math.abs(q) > initQuantity){
                    q = -initQuantity;
                }
                overlay.addClass("active");
                updateDisplay(q);
                $.post(postUrl, {id:id,quantity: q}, "json")
                    .done(function(data,status,xhr){
                        if(data.errorStatus == "ok"){
                            updateOnResponse(data.newAmount, data.newQuantity);
                        }
                    });
            }
        });

        plusBtn.on("click", function(evt){
            evt.preventDefault();
            overlay.addClass("active");
            updateDisplay(1);
            $.post(postUrl, {id:id,quantity: 1}, "json")
                .done(function(data,status,xhr){
                    if(data.errorStatus == "ok"){
                        updateOnResponse(data.newAmount, data.newQuantity);
                    }
                });
        });

        minusBtn.on("click", function(evt){
            evt.preventDefault();
            overlay.addClass("active");
            updateDisplay(-1);
            $.post(postUrl, {id:id,quantity: -1}, "json")
                .done(function(data,status,xhr){
                    if(data.errorStatus == "ok"){
                        updateOnResponse(data.newAmount, data.newQuantity);
                    }
                });
        });
        updateRowAmount();
    });

})(jQuery);
