$(document).foundation();

$("[type='text']").keyup(function(){
    if($(this).valid()){
        $(this).prev().css('display','inline-block');
    }else{
        $(this).prev().css('display','none');
    }
})

$("[type='tel']").keyup(function(){
    if($(this).valid()){
        $(this).prev().css('display','inline-block');
    }else{
        $(this).prev().css('display','none');
    }

})

$("[type='email']").keyup(function(){
    if($(this).valid()){
        $(this).prev().css('display','inline-block');
    }else{
        $(this).prev().css('display','none');
    }

})