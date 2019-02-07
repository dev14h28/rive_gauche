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

$("#img-video").on('click', function(){
    console.log('test');
    $(this).fadeOut();
    $("#youtube").html("<iframe class='video-youtube' height='375' src='https://www.youtube.com/embed/lMB-6uO64eU?autoplay=1' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>");
});

$('#container-map')
.click(function(){
			$(this).find('iframe').addClass('clicked')})
	.mouseleave(function(){
			$(this).find('iframe').removeClass('clicked')});