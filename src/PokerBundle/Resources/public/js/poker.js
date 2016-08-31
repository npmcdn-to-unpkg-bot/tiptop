/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
        
    $("#poker-my-cards .card").on('click', function(){
        window.card = $(this);
        position = $(this).position();
        $(".card-selector").css("left", position.left + window.card_selection_position.left);
        $(".card-selector").show();
        $("#hand").show();
    });
    
    $(".card-selector li").on('click', function(){
        var suit = $(this).find("p").data("suit");
        $("#spread li").each(function(){
            value = $(this).data("value");
            values = value.split(" ");
            $(this).attr("data-value", values[0] + " " + suit);
            $(this).find("p").attr("data-suit", suit);
            $(this).find("p span").eq(1).html(suit);
        });
        $(this).parent().hide();
        $("#spread").show();
    });
    
    $("#spread li").on('click', function(){
        var value = $(this).data("value");
        var suit = $(this).find("p").data("suit");
        var num = $(this).find("p span").eq(0).text();
        window.card.attr("data-value", value);
        window.card.find("p").attr("data-suit", suit);
        window.card.find("p span").eq(0).text(num);
        window.card.find("p span").eq(1).text(suit);
        $(this).parent().hide();
    });
    
    window.card_selection_position = $(".card-selector").position();
    
});
