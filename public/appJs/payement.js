// show modal
button  = document.querySelector('#getcontact')
button.addEventListener('click', function() {
    $('#confirm').modal('show')
})

//hide modal 
button_close_confirm = document.getElementById('close')
console.log(button_close_confirm);
button_close_confirm.addEventListener('click', function() {
    $('#confirm').modal('hide')
})
