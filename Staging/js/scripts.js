/* TOGGLE PARA EL MENU RESPONSIVE */
$(document).ready(function(){
    $(".toggle>a").click(function(){
       $("#mainNav .menu").slideToggle(); 
    });
});