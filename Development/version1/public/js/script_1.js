$(document).ready(function(){
    contentThumbnailAutoFit();
    mouseOverEffectResponsive();
    contentResize();
    contentThumbnailAutoFit();
});


function mouseOverEffectResponsive(){
    $('.content_thumbnail').mouseover(function(){
        if (window.matchMedia('(min-width: 1024px)').matches) {
            // smartphone/iphone... maybe run some small-screen related dom scripting?
             //$(this).css({'transform': 'scale(1.03, 1.03)', 'transition': 'transform 0.3s'});
            $(this).find("img.existing-project").css({'transform': 'translate(-15px)', 'transition': 'transform 0.3s'});
          }
        
    });
    
    $('.content_thumbnail').mouseleave(function(){
        //$(this).css('transform', 'none');
        //$(this).css('border-right', '10px solid black');
        $(this).find("img.existing-project").css({'transform': 'translate(0px)', 'transition': 'transform 0.3s'});
    });
};

function contentResize(){
    $(window).resize(function(){
        contentThumbnailAutoFit();
    });
    
};

function contentThumbnailAutoFit(){
    var heights = $('.content_thumbnail').map(function(){
        return $(this).height();
    }).get();
    var maxHeight = Math.max.apply(null, heights);
    //alert(maxHeight);
    $('.content_thumbnail').height(maxHeight);
};