;(function($){

    var postUrl = "/php/add_to_cart.php";
    var cart = $("#panier");
    var amount = cart.find("#montant-total");
    var quantity = cart.find("#num-articles");

    var articleQuantity = $(".article-quantity");

    articleQuantity.each(function(){
        var plusBtn = $(this).find(".article-plus");
        var minusBtn = $(this).find(".article-minus");
        var display = $(this).find(".article-quantity-field");
        var uPrice = parseFloat($(this).data("articleUprice"));
        var rowAmount = $(this).next(".article-row-amount").find("span.row-amount");

        function updateRowAmount(){
            var total = uPrice * parseInt(display.val());
            rowAmount.text(total);
        }

        updateRowAmount();

        console.log(this, plusBtn, minusBtn, display, uPrice, rowAmount);
    });
    console.log(articleQuantity);

})(jQuery);
