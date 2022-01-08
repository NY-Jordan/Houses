// show modal
button  = document.querySelector('#getcontact')
button.addEventListener('click', function() {
    $('#confirm').modal('show')
})

button_points  = document.querySelector('#points_button')
button_points.addEventListener('click', function() {
    $('#points').modal('show')
})

//hide modal 
button_close_confirm = document.querySelector('#closeconfirm')
button_close_confirm.addEventListener('click', function() {
    $('#confirm').modal('hide')
})

button_close_points = document.querySelector('#close_points')
button_close_points.addEventListener('click', function() {
    $('#points').modal('hide')
})
