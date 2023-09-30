
// Menu - Category
function loadXML(category) {
    let subCategory = new XMLHttpRequest();
    let jsonCategory = {};
    subCategory.open("GET", `./querySelector.php?category=${category}`);
    subCategory.send();
  
    subCategory.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200)
        printSubCategory(JSON.parse(this.responseText));
    };
  }
  
  function printSubCategory(j){
    let categorySmall = document.querySelector("#categorySmall");
    categorySmall.innerHTML = ""
    j.forEach(element => {
      categorySmall.innerHTML = categorySmall.innerHTML + `<a href='search.php?search_input=${element['subCatergoryName']}
      '>${element['subCatergoryName']}</a>`
    });
  }
  
  let categoryItem = document.querySelectorAll(".categoryItem");
  for (let i = 0; i < categoryItem.length; i++) {
    categoryItem[i].addEventListener("mouseover", (event) => {
      loadXML(event.target.text);
    });
  }
  