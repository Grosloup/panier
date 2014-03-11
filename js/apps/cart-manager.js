/**
 * Created by Nicolas on 10/03/14.
 */
;(function($){

    var cartBtn = $(".cart-btn").not(".disabled");
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
    });



})(jQuery);
