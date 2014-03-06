;(function($){
    $.fn.menuAccordeon = function(){
        //var opts = $.extend({}, $.fn.menuAccordeon.defaults, options);
        var opts = $.extend({}, $.fn.menuAccordeon.defaults);
        return this.each(function(){
            var $this = $(this);
            var sections = $this.children("li");
            var ul = sections.children("ul");
            if(opts.elementActifDefault == "aucun"){
                ul.addClass("close");
            } else if(opts.elementActifDefault == "tous"){
                ul.addClass("open activated");
                sections.children(".titre").find("i.fa").addClass("up");
            } else {
                ul.addClass("close");
                $(sections.children(".titre")[opts.elementActifDefault - 1]).find("i.fa").addClass("up");
                $(ul[opts.elementActifDefault - 1]).removeClass("close").addClass("open activated");
            }
            sections.each(function(){
                var titre = $(this).children(".titre");
                var target = titre.siblings("ul");
                var arrow = titre.find("i.fa");
                titre.on("click", function(evt){
                    evt.preventDefault();
                    if(target.hasClass("activated")){
                        target.slideUp(opts.duree).removeClass("activated");
                        arrow.removeClass("up");
                        return false;
                    }
                    if(opts.fermerLesAutres){
                        $this.find(".activated").removeClass("activated").slideUp(opts.duree);
                        sections.children(".titre").find("i.fa").removeClass("up");
                    }
                    target.slideToggle(opts.duree, function(){
                        $(this).toggleClass("activated");
                    });
                    arrow.toggleClass("up");
                })
            });
        });
    };
    $.fn.menuAccordeon.defaults = {"elementActifDefault": "aucun", "fermerLesAutres":true, "duree":200};
})(jQuery);
