let checkAll = document.getElementById('checkAll')
let checkbox = document.getElementsByClassName('checkbox')
let prices = document.getElementsByClassName('prices')
let total = document.getElementById('total')
let amount = document.getElementsByClassName('amount')
let p = 0

checkAll.addEventListener('click', function (){
    if(checkAll.checked == true){
        for (let i = 0; i < checkbox.length; i++) {
            checkbox[i].checked = true;
            p += parseInt(prices[i].innerHTML)
        }
    }else{
        for (let i = 0; i < checkbox.length; i++) {
            checkbox[i].checked = false;
            p -= parseInt(prices[i].innerHTML)
        }
    }
    total.innerHTML = p
})

for (let i = 0; i < checkbox.length; i++) {
    checkbox[i].addEventListener('click', function (){
        if(checkbox[i].checked == true){
            checkbox[i].checked = true;
            p += parseInt(prices[i].innerHTML)
            total.innerHTML = p
        }else{
            checkbox[i].checked = false;
            p -= parseInt(prices[i].innerHTML)
            total.innerHTML = p
        }
    })
}

let submit = document.getElementById('submit')
let check = document.getElementById('check')
for (let i = 0; i < checkbox.length; i++) {
checkbox[i].addEventListener('click', function (){
    check.submit()
    console.log("click")
})
}