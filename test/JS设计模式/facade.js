var stopEvent = function(e){

    //同时阻止事件默认行为和冒泡
    e.stopPropagation()
    e.preventDefault()
}

//stopEvent 本身就是生产门面
$('#a').click(function(e){
    stopEvent(e)
})