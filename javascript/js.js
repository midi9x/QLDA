$(document).ready(function(){
    var href = "/view-cart/";
    
    //Filter
    $("#my-filter").click(function(){
        $("#products").empty();
        $("#products").append("<div style='text-align:center'><img src='images/loading67.gif' /></div>");
        $.post(
            "http://giaynam360.vn/filter/",
            {
                cat_id:$(".second-filter").attr("cat_id"),
                price:$(".second-filter .price-range").val(),
                brand:$(".second-filter .brand").val(),
                order:$(".second-filter .order").val(),
            },
            function(data){
                $("#products").empty();
                $("#products").append(data);
            }
        );    
    });
    
    $("#my-filter1").click(function(){
        $("#products").empty();
        $("#products").append("<div style='text-align:center'><img src='images/loading67.gif' /></div>");
        $.post(
            "/filter/",
            {
                cat_id:$(".second-filter").attr("cat_id"),
                price:$(".second-filter .price-range").val(),
                brand:$(".second-filter .brand").val(),
                order:$(".second-filter .order").val(),
                secondary_cat:$("#my-filter1").attr("secondary_cat")
            },
            function(data){
                $("#products").empty();
                $("#products").append(data);
            }
        );    
    });
    
    
    
    
    
    
    //Fixed On Scroll
    if($("#cat-sidebar").size()!=0)
    {
        var y = $("#cat-sidebar").offset().top;
        $(window).scroll(function(){
            var x = y - $(window).scrollTop();
            if( x<0 ) {$("#cat-sidebar").addClass("fixed")}
            else $("#cat-sidebar").removeClass("fixed");
        });
    }
    
    
    if($("#right-ad, #left-ad").size()!=0) 
    { 
        var v = $("#right-ad").offset().top; $(window).scroll(function(){
        var u = v - $(window).scrollTop(); 
        if( u<=0 ) $("#right-ad, #left-ad").css('top','15px'); 
        else $("#right-ad, #left-ad").css('top','180px'); }); 
    } 
    
    
    //Slider Product Detail
    var left = 0;
    var range = 88;
    var count = $("#other-images img").length;
    $("#right-arrow").click(function(){
        if($("#other-images").attr("left") > (-(count - 3)*range))
        {
            var litte = ($("#other-images").attr("left"));
            var add  =  litte - range; 
            $("#other-images").animate({"left": add + "px"});
            $("#other-images").attr("left",add);
        }
    
    });
    
    $("#left-arrow").click(function(){   
        if($("#other-images").attr("left") < 0)
        {
            var litte = ($("#other-images").attr("left"));
            var add  =  parseInt(litte) + parseInt(range); 
            $("#other-images").animate({"left": add + "px"});
            $("#other-images").attr("left",add);
        }
    });
    
	var startslider_small = 300;
	var startslider_selected = 100;
	var startslider_big = 300;
	
	var k = startslider_big/startslider_selected;	
	var K = startslider_big*(startslider_small/startslider_selected);
	
	$("#startslider-big").css("background-size",K + "px " + K + "px");
	$("#startslider-small").mousemove(function(e){
		$("#startslider-big").css("display","block");
		var X = e.pageX - $("#startslider-small").offset().left;
		var Y = e.pageY - $("#startslider-small").offset().top;
		$("#startslider-selected").css({"left":X - 50 + "px", "top":Y - 50 + "px","display":"block"});				
		$("#startslider-big").css({"background-position-x":"-" + k*(X-50) +"px","background-position-y":"-"+k*(Y-50) +"px"});
	});
    
	$("#startslider-small").mouseleave(function(){
		$("#startslider-selected").css("display","none");
		$("#startslider-big").css("display","none");
	});
	
	$("#wrap-other-images img").mouseenter(function(){
		$("#startslider-small").css("background-image",'url(' + $(this).attr("src") + ')');
		$("#startslider-big").css("background-image",'url(' + $(this).attr("src") + ')');
        
        $("#other-images img").css("border","1px solid #ccc");
        $(this).css("border","1px solid #fba445");
    });
    
    $(".nav .tab").click(function(){
        $(".nav .tab").removeClass("active");
        $(this).addClass("active");
        var a = $(this).attr("id");
        $("#single-content-2 .content").fadeOut(300);
        $("#content-" + a).fadeIn(300);
    });
    
    
    
    
    
    
    //Add product to Cart
    $(document).on('click',".vmz-add-to-cart", function(){
        $(".opacity").css("display","block");
        $("#ajax-load-cart").css("display","block");  
        var a = $(this).attr("product_id");
        $.post(
            href,
            {
                "product_id" : a,
                "num"        : 1
            },
            function(data){
                $.get(
                    href,
                    function(data){ 
                            $("#view-cart-content").css("display","block"); 
                            $("#ajax-load-cart").css("display","none");
                             
                            $("#view-cart-content").empty();
                            $("#view-cart-content").prepend(data);  
                               
                    }
                );     
            }
        ); 

    });
    
    
    
    //Add Cart width Number of Product
    $(".vmz-add-to-cart-width-num").click(function(){
        $(".opacity").css("display","block");
        $("#ajax-load-cart").css("display","block");  
        var a = $(this).attr("product_id");
        $.post(
            href,
            {
                "product_id" : a,
                "num"        : $("#num").val()
            },
            function(data){
                $.get(
                    href,
                    function(data){ 
                            $("#view-cart-content").css("display","block"); 
                            $("#ajax-load-cart").css("display","none");
                             
                            $("#view-cart-content").empty();
                            $("#view-cart-content").prepend(data);  
                               
                    }
                );     
            }
        ); 

    });
    
    
    
    
    
    //Set position of Cart
    $("#view-cart-content").css("left",(screen.width-855)/2 + "px");
    $("#view-cart-content").css("top",(screen.height-600)/2 + "px");
    $("#ajax-load-cart").css("left",(screen.width-43)/2 + "px");
    $("#ajax-load-cart").css("top",(screen.height-143)/2 + "px");
    
    
    //Display Cart
    $(".button-view-cart").click(function(){
        $(".opacity").css("display","block");
        $("#ajax-load-cart").css("display","block");
        $.get(
            href,
            function(data){ 
                    $("#view-cart-content").css("display","block"); 
                    $("#ajax-load-cart").css("display","none");
                     
                    $("#view-cart-content").empty();
                    $("#view-cart-content").prepend(data);  
                       
            }
        );    
    });
    
    
    
        
    //Close Cart Popup
    $(document).on("click", ".opacity,.continue,#img-close-cart",function(){
        //alert("ppp");
         $("#view-cart-content").css("display","none"); 
         $("#view-cart-content").empty();
         $(".opacity").css("display","none"); 
         $("#ajax-load-cart").css("display","none");  
    });
    
    
    // Update Selected Item
    $(document).on('click','.vmz-update-item',function(){
        $("#ajax-load-cart").css("display","block");
        $("#view-cart-content").css("display","none"); 
        var id = parseInt($(this).attr("class"));
            $.post(
                href,
                {
                    "product_id" : id,
                    "num"        : $("#vmz-input-" + id).val() 
                },
                function(data){
                    $("#view-cart-content").css("display","block"); 
                    $("#ajax-load-cart").css("display","none");
                     
                    $("#view-cart-content").empty();
                    $("#view-cart-content").prepend(data); 
                }
            )
    });
    
    
    //Delete Slected Item
    $(document).on('click','.vmz-delete-item',function(){
        $("#ajax-load-cart").css("display","block");
        $("#view-cart-content").css("display","none");
        var id = parseInt($(this).attr("class"));
            $.post(
                href,
                {
                    "product_id" : id,
                    "num"        : 0
                },
                function(data){
                    $.get(
                    href,
                    function(data){ 
                            $("#view-cart-content").css("display","block"); 
                            $("#ajax-load-cart").css("display","none");
                            $("#view-cart-content").empty();
                            $("#view-cart-content").prepend(data);  
                               
                    }
                );    
                    
                }
            );
    });
    
    
    //Delete All Cookie Product
    $(document).on('click','#remove-all-product',function(){
        $("#ajax-load-cart").css("display","block");
        $("#view-cart-content").css("display","none");
        var id = parseInt($(this).attr("class"));
            $.post(
                href,
                {
                    destroy : 1
                },
                function(){
                    $.get(
                    href,
                    function(data){ 
                            $("#view-cart-content").empty();
                            $("#view-cart-content").css("display","block"); 
                            $("#ajax-load-cart").css("display","none");                            
                            $("#view-cart-content").prepend(data);  
                               
                    }
                );    
                    
                }
            );
    });
    
});