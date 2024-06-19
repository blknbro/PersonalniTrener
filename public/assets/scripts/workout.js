let div = document.getElementById('exercise')
let title = document.getElementById('exTitle')
document.getElementById('showHide').addEventListener('click', function (){
    if(div.style.display !== 'flex')
    {
        div.style.display = 'flex'
        title.style.display = 'block'
        this.textContent = 'Hide more'
    }
    else{
        div.style.display = 'none'
        title.style.display = 'none'
        this.textContent = 'Show more'
    }
})


