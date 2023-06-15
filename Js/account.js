let name = document.getElementById('name');
let familyName = document.getElementById('familyName');
let birthday = document.getElementById('birthday');
let sex = document.getElementById('sex');

let email = document.getElementById('email');
let pass = document.getElementById('pass');
let phoneNumber = document.getElementById('phoneNumber');

let address_line_1 = document.getElementById('address_line_1');
let address_line_2 = document.getElementById('address_line_2');
let country = document.getElementById('country');
let city = document.getElementById('city');
let code_zip = document.getElementById('code_zip');


let editName = document.getElementById('editName');
let editEmail = document.getElementById('editEmail');
let editAddress = document.getElementById('editAddress');

editName.addEventListener('click', function (){
    if(name.disabled == false){
        editName.type = 'submit';
        name.disabled = true;
        name.style.backgroundColor = '#f3f4f8';
        name.style.border = 'none';
        familyName.disabled = true;
        familyName.style.backgroundColor = '#f3f4f8';
        familyName.style.border = 'none';
        birthday.disabled = true;
        birthday.style.backgroundColor = '#f3f4f8';
        birthday.style.border = 'none';
        sex.disabled = true;
        sex.style.border = 'none';
        sex.style.backgroundColor = '#f3f4f8';
        editName.value = 'Edit Basic Info';
    }
    name.disabled = false;
    name.style.backgroundColor = 'white';
    name.style.border = 'black solid 1px';
    familyName.disabled = false;
    familyName.style.backgroundColor = 'white';
    familyName.style.border = 'black solid 1px';
    birthday.disabled = false;
    birthday.style.backgroundColor = 'white';
    birthday.style.border = 'black solid 1px';
    sex.disabled = false;
    sex.style.border = 'black solid 1px';
    sex.style.backgroundColor = 'white';
    editName.value = 'Save';
});

editEmail.addEventListener('click', function () {
    if(email.disabled == false){
        editEmail.type = 'submit';
        email.disabled = true;
        email.style.border = 'none';
        email.style.backgroundColor = '#f3f4f8'
        pass.disabled = true;
        pass.style.border = 'none';
        pass.style.backgroundColor = '#f3f4f8';
        phoneNumber.disabled = true;
        phoneNumber.style.border = 'none';
        phoneNumber.style.backgroundColor = '#f3f4f8';
        editEmail.value = 'Edit Email & Password & Phone';
    }
    email.disabled = false;
    email.style.border = 'black solid 1px';
    email.style.backgroundColor = 'white'
    pass.disabled = false;
    pass.style.border = 'black solid 1px';
    pass.style.backgroundColor = 'white';
    phoneNumber.disabled = false;
    phoneNumber.style.border = 'black solid 1px';
    phoneNumber.style.backgroundColor = 'white';
    editEmail.value = 'Save';
});

editAddress.addEventListener('click', function() {
    if(address_line_1.disabled == false){
        editAddress.type = 'submit';
        address_line_1.disabled = true;
        address_line_1.style.backgroundColor = '#f3f4f8'
        address_line_1.style.border = 'none';
        address_line_2.disabled = true;
        address_line_2.style.backgroundColor = '#f3f4f8'
        address_line_2.style.border = 'none';
        country.disabled = true;
        country.style.backgroundColor = '#f3f4f8'
        country.style.border = 'none';
        city.disabled = true;
        city.style.backgroundColor = '#f3f4f8'
        city.style.border = 'none';
        code_zip.disabled = true
        code_zip.style.backgroundColor = '#f3f4f8'
        code_zip.style.border = 'none';
        editAddress.value = 'Edit Address';
    }
    address_line_1.disabled = false;
    address_line_1.style.backgroundColor = 'white'
    address_line_1.style.border = 'black solid 1px';
    address_line_2.disabled = false;
    address_line_2.style.backgroundColor = 'white'
    address_line_2.style.border = 'black solid 1px';
    country.disabled = false;
    country.style.backgroundColor = 'white'
    country.style.border = 'black solid 1px';
    city.disabled = false;
    city.style.backgroundColor = 'white'
    city.style.border = 'black solid 1px';
    code_zip.disabled = false
    code_zip.style.backgroundColor = 'white'
    code_zip.style.border = 'black solid 1px';
    editAddress.value = 'Save';
});

// PopularProducts
let arrowLeft = document.getElementById("arrowLeft")
let arrowRight = document.getElementById("arrowRight")
let post = document.getElementById("posts")
let item = document.getElementsByClassName("item")
let position = 0
productScroll(post, item, arrowLeft, arrowRight)
// FeaturedProducts
let arrowLeftF = document.getElementById("arrowLeftF")
let arrowRightF = document.getElementById("arrowRightF")
let postF = document.getElementById("postsF")
let itemF = document.getElementsByClassName("itemf")
position = 0
productScroll(postF, itemF, arrowLeftF, arrowRightF)
// Deals of the day
let arrowLeftD = document.getElementById("arrowLeftD")
let arrowRightD = document.getElementById("arrowRightD")
let postD = document.getElementById("postsD")
let itemD = document.getElementsByClassName("itemD")
position = 0
productScroll(postD, itemD, arrowLeftD, arrowRightD)

function productScroll(post, item, left, right){
  right.addEventListener("click", function (){
      if(position >= 0 && position < hiddenItems(post, item)){
        position += 1;
        translateX(post, position)
      }
  })
  
  left.addEventListener("click", function (){
    if(position > 0){
      position -= 1;
      translateX(post, position)
    } 
  })
}

function translateX(post, p){
  post.style.left = position * -200 + "px"
}

function hiddenItems(post, item){
  let visibleItems = post.offsetWidth / 200;
  return Math.ceil(visibleItems) - item.length
}
