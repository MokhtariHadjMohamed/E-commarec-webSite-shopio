function more(){
    let reviews = document.getElementById('reviews');
    let more = document.getElementById('more');
    if(reviews.style.height != 'auto'){
        reviews.style.height = 'auto';
        more.innerHTML = "Less";
    }else{
        reviews.style.height = '200px';
        more.innerHTML = "More";
    }
}

function show(){
    let comment = document.getElementById('comment');
    if(comment.style.display != 'block')
        comment.style.display = 'block';
    else
        comment.style.display = 'none';
    console.log(comment.style.display != 'none');
}