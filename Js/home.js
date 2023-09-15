// let arrowLeftShowSection = document.getElementById("arrowLeftShowSection")
// let arrowRightShowSection = document.getElementById("arrowRightShowSection")
// let infos = document.getElementsByClassName('info');

// i = 1
// infos[i-1].style.display = 'block'
// arrowLeftShowSection.addEventListener("click", function (){
//   if (i == 1){
//     change(2,1,3)
//     infos[i-1].style.display = 'none'
//     i = 2
//     infos[i-1].style.display = 'block'
//   }else if(i == 2){
//     change(2,3,1)
//     infos[i-1].style.display = 'none'
//     i = 3
//     infos[i-1].style.display = 'block'
//   }else if(i == 3){
//     change(3,2,1)
//     infos[i-1].style.display = 'none'
//     i = 1
//     infos[i-1].style.display = 'block'
//   }
// })

// arrowRightShowSection.addEventListener("click", function (){
//   if(i == 1){
//     changeM(3,1,2)
//     infos[i-1].style.display = 'none'
//     i = 2
//     infos[i-1].style.display = 'block'
//   }else if(i == 2){
//     changeM(1,2,3)
//     infos[i-1].style.display = 'none'
//     i = 3
//     infos[i-1].style.display = 'block'
//   }else if(i == 3){
//     changeM(2,3,1)
//     infos[i-1].style.display = 'none'
//     i = 1
//     infos[i-1].style.display = 'block'
//   }
// })

// function changeM(s1,s2,s3){
//   // right
//   let p01 = document.getElementById("img"+s2);
//   p01.style.transform = "translate(23%, 50%)";
//   p01.style.right = "-80%";
//   p01.style.left = "80%";
//   // mid
//   let p02 = document.getElementById("img"+s3);
//   p02.style.transform = "translate(-50%, 50%)";
//   p02.style.left = "50%";
//   p02.style.right = "-50%";
//   // left
//   let p03 = document.getElementById("img"+s1);
//   p03.style.transform = "translate(-23%, 50%)";
//   p03.style.left = "-80%";
//   p03.style.right = "80%";
// }

// let s1 = 1, s2 = 2, s3 = 3;
// function change(){
//   // right
//   let p01 = document.getElementById("img"+s2);
//   p01.style.transform = "translate(23%, 50%)";
//   p01.style.right = "-80%";
//   p01.style.left = "80%";
//   infos[s1-1].style.display = 'none'
//   infos[s2-1].style.display = 'block'
//   infos[s3-1].style.display = 'none'
//   // mid
//   let p02 = document.getElementById("img"+s3);
//   p02.style.transform = "translate(-50%, 50%)";
//   p02.style.left = "50%";
//   p02.style.right = "-50%";
//   infos[s1-1].style.display = 'block'
//   infos[s2-1].style.display = 'none'
//   infos[s3-1].style.display = 'none'
//   // left
//   let p03 = document.getElementById("img"+s1);
//   p03.style.transform = "translate(-23%, 50%)";
//   p03.style.left = "-80%";
//   p03.style.right = "80%";
//   infos[s1-1].style.display = 'none'
//   infos[s2-1].style.display = 'none'
//   infos[s3-1].style.display = 'block'

//   let b = s1
//   s1 = s3
//   s3 = s2
//   s2 = b
// }

// setInterval(change, 5000)
// // PopularProducts
// let arrowLeft = document.getElementById("arrowLeft")
// let arrowRight = document.getElementById("arrowRight")
// let post = document.getElementById("posts")
// let item = document.getElementsByClassName("item")
// let position = 0
// productScroll(post, item, arrowLeft, arrowRight)
// // FeaturedProducts
// let arrowLeftF = document.getElementById("arrowLeftF")
// let arrowRightF = document.getElementById("arrowRightF")
// let postF = document.getElementById("postsF")
// let itemF = document.getElementsByClassName("itemf")
// position = 0
// productScroll(postF, itemF, arrowLeftF, arrowRightF)
// // Deals of the day
// let arrowLeftD = document.getElementById("arrowLeftD")
// let arrowRightD = document.getElementById("arrowRightD")
// let postD = document.getElementById("postsD")
// let itemD = document.getElementsByClassName("itemD")
// position = 0
// productScroll(postD, itemD, arrowLeftD, arrowRightD)

// function productScroll(post, item, left, right){
//   right.addEventListener("click", function (){
//       if(position >= 0 && position < hiddenItems(post, item)){
//         position += 1;
//         translateX(post, position)
//       }
//   })

//   left.addEventListener("click", function (){
//     if(position > 0){
//       position -= 1;
//       translateX(post, position)
//     }
//   })
// }

// function translateX(post, p){
//   post.style.left = position * -200 + "px"
// }

// function hiddenItems(post, item){
//   let visibleItems = post.offsetWidth / 200;
//   return Math.ceil(visibleItems) - item.length
// }

// // timer
// let time = document.getElementById('time');
// var countDownDate = new Date('Apr 14, 2023 00:00:00')
// var x = setInterval(() => {
//   var now = new Date().getTime();

//   // Find the distance between now and the count down date
//   var distance = countDownDate - now;

//   // Time calculations for days, hours, minutes and seconds
//   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//   time.innerHTML = days + "d " + hours + "h "
//   + minutes + "m " + seconds + "s ";

//   // If the count down is over, write some text
//   if (distance < 0) {
//     clearInterval(x);
//     time.innerHTML = "EXPIRED";
//   }
// }, 1000);

// Menu - Category
function loadXML(category) {
  let subCategory = new XMLHttpRequest();
  subCategory.open("GET", "./querySelector.php");
  subCategory.send();

  subCategory.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200)
      console.log(JSON.parse(this.responseText));
  };
}

let categoryItem = document.querySelectorAll(".categoryItem");
for (let i = 0; i < categoryItem.length; i++) {
  categoryItem[i].addEventListener("click", (event) => {
    let categorySmall = document.querySelector("#categorySmall");

    loadXML();
  });
}
