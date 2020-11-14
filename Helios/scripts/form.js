'use strict';

let sideForms = document.getElementsByClassName('side_form');
let sidesCount = sideForms.length;
if (sidesCount === 0) {
    let addButton = document.createElement('input');
    addButton.type = 'button';
    addButton.id = 'add_side_0';
    addButton.value = 'Добавить сторону';
    addButton.dataset.type = 'addside';
    document.getElementById('sendvalues').after(addButton);
}



let entForm = document.getElementById('entire_form');
entForm.addEventListener('click', function (event) {
    if (event.target.dataset.type === 'legend') {
        let itemsToHide = event.target.parentNode.querySelectorAll('*:not([type="button"])');
        let itemsCount = itemsToHide.length;
        console.log(itemsToHide);
        for (let i = 0; i < itemsCount; i++) {
            if (!itemsToHide[i].classList.contains('side_form_legend')) {
                itemsToHide[i].hidden = !itemsToHide[i].hidden;
            }
        }
    } else if (event.target.dataset.type === 'addside') {
        let thisSideNumber = event.target.parentNode.id.slice(event.target.parentNode.id.lastIndexOf('_') + 1);
        let formtags = event.target.parentNode.querySelectorAll('*');
        let formtagsCount = formtags.length;
        let numberToAdd = thisSideNumber + 1;
        for (let i = numberToAdd; i < formtagsCount; i++) {

        }
    } else if (event.target.dataset.type === 'removeside') {
        event.target.parentElement.remove();
        if (event.target.parentElement.nextElementSibling.classList.contains('side_form')) {
            alert('!!!');
        }
    }
})