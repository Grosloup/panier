/**
 * Created by Nicolas on 11/03/14.
 */
;(function($){

    /*var cartBtn = $(".cart-btn").not(".disabled");
    var postUrl = "/php/add_to_cart.php";
    var cart = $("#panier");
    var amount = cart.find("#montant-total");
    var quantity = cart.find("#num-articles");

    cartBtn.on("click", function(evt){
        evt.preventDefault();

        var id = $(this).data("articleId");

        $.post(postUrl, {id: id}, "json")
            .done(function(data,status,xhr){
                if(data.errorStatus == "ok"){
                    amount.text(data.newAmount);
                    quantity.text(data.newQuantity);
                }
            });
    });*/

    var postUrl = "/php/add_to_cart.php";
    var cart = $("#panier");
    var amount = cart.find("#montant-total");
    var quantity = cart.find("#num-articles");
    var plusBtn = $(".article-plus");
    var minusBtn = $(".article-minus");
    var display = $("#article-quantity-field");
    var commandBtn = $(".article-command").find(".btn");
    var limited = parseInt(commandBtn.data("articleLimited"));
    var quantityAdded = 1;

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

    commandBtn.on("click", function(evt){
        evt.preventDefault();
        var id = $(this).data("articleId");
        $.post(postUrl, {id:id,quantity: display.val()}, "json")
            .done(function(data,status,xhr){
                if(data.errorStatus == "ok"){
                    amount.text(data.newAmount);
                    quantity.text(data.newQuantity);
                    updateDisplay(-quantityAdded);
                }
            });
    });


})(jQuery);
