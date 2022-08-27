
button_price = document.getElementById('price_button')
button_city = document.getElementsByName('by_city')
button_categorie = document.getElementById('by_categorie1')
button_price.addEventListener('change', function() {
    load_by_price()
})
 button_city.addEventListener('change', function() {
    console.log(button_city.value);
})
button_categorie.addEventListener('click', function() {
    load_by_categorie()
}) 


function load_by_categorie(category_id){
    $.ajax({
    url : '/posts-by-category/'+category_id,
    type : 'GET', 
    data : 'id=' + category_id+'&show='+'full_time', 
    success : function(reponse){
        console.log(reponse.response);
        loader_post = document.getElementById('load_post');
        loader_post.innerHTML = reponse.response;
        
        
    }})
}

function load_by_city(city_id){
    console.log(button_city);
    $.ajax({
    url : '/Posts-by-city',
    type : 'GET', 
    data : 'city=' + city_id+'&show='+'full_time', 
    success : function(reponse){
        console.log(reponse.response);
        loader_post = document.getElementById('load_post');
        loader_post.innerHTML = reponse.response;
        
        
    }}) 
}


function load_by_price(){
    $.ajax({
    url : '/Posts-by-price',
    type : 'GET', 
    data : 'price=' + button_price.value+'&show='+'full_time', 
    success : function(reponse){
        loader_post = document.getElementById('load_post');
        loader_post.innerHTML = reponse.response;
        
        
    }})
}

