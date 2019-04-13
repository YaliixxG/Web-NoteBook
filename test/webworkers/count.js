//webworkers 独立脚本

var  countNum = 0

function count(){

    //通过postMessage来传回
    postMessage(countNum)
    countNum ++ 
    setTimeout(count,1000)
}
count()