$(document).ready(function(){
    var available = $("#available").val();
    var not_available = $("#not-available").val();
    var pending = $("#pending").val();
    var selected = $("#selected").val();
let status = [
    [available,"available"],
    [not_available,"not-available"],
    [selected,"selected"],
    [pending,"pending"]];
var lab = document.getElementById("code_lab").value;
var code = "";
var last = "";
    //Validate selected
    $(document).on('click','.unit',function(){
        console.log(selected);
        check = $(this).children('img').attr("class");
        if(check == "available"){
            $(this).children('img').attr("src",status[2][0]);
            $(this).children('img').attr("class",status[2][1]);
            var no = $(this).children('p').text();
            code = lab+no;
            
        }
        if(check == "selected"){
            $(this).children('img').attr("src",status[0][0]);
            $(this).children('img').attr("class",status[0][1]);
            code = "";
        }
        if(check == "pending"){
            $(this).children('img').attr("src",status[3][0]);
            $(this).children('img').attr("class",status[3][1]);
        }
        if(check == "available" && $('.selected').length > 1){
            $(this).children('img').attr("src",status[0][0]);
            $(this).children('img').attr("class",status[0][1]);
            code = last;
        }
        last = code;
        document.getElementById("code_lab").value = code;
    });
});