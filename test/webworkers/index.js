//主线程操作脚本
var numDiv
var work = null //初始化

window.onload =  function(){
    console.log(8888)
    numDiv = document.getElementById('numDiv')

    document.getElementById('start').onclick = startWorker
    document.getElementById('end').onclick = function(){

        //如果work存在就让其停止
        if(work){
            work.terminate()
            work = null
        }
    }
}

function startWorker(){
    console.log(000000)
    if(work){
        return
    }

    work = new Worker('count.js')

    //通过onmessage事件来接收
    work.onmessage = function(e){ 
        numDiv.innerHTML = e.data
        console.log(e,'e')
    }
}