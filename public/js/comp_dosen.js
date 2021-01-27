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
var last_code = "";
    //Validate selected
    $(document).on('click','.unit',function(){
        check = $(this).children('img').attr("class");
        if(check == "available"){
            $(this).children('img').attr("src",status[2][0]);
            $(this).children('img').attr("class",status[2][1]);
            var no = $(this).children('p').text();
            last = code;
            last_code = "";
            code += no+",";
            // if($('.selected').length > 1){  
            // }
            // else{
            //     code += lab+no+",";
            // }
        }
        if(check == "selected"){
            $(this).children('img').attr("src",status[0][0]);
            $(this).children('img').attr("class",status[0][1]);
            var no = $(this).children('p').text();
            last = code.replace(no+",",'');
            code = last;
            last_code = "";
        }
        if(check == "pending"){
            $(this).children('img').attr("src",status[3][0]);
            $(this).children('img').attr("class",status[3][1]);
            last_code = "";
        }
        if(check == "not-available"){
            $(this).children('img').attr("src",status[1][0]);
            $(this).children('img').attr("class",status[1][1]);
            last_code = "";
        }
        var result = code.split(",");
        result.pop();
        result.sort();
        
        for(i = 0;i<result.length;i++){
            last_code += result[i]+", ";
        }
        last_code = last_code.replace(/,\s*$/, "");
        last_code = lab + last_code;
        document.getElementById("code_lab").value = last_code;
    });
});