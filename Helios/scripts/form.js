'use strict';

let sideForms = document.querySelectorAll('.side_form');
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
//Вешаем eventListener на всю форму
entForm.addEventListener('click', function (event) {
    //Если клик по названию стороны - скрываем-показываем поля ввода, показываем-скрываем длину стороны
    if (event.target.dataset.type === 'legend') {
        let itemsToHide = event.target.parentNode.querySelectorAll('*:not([type="button"])');
        let itemsCount = itemsToHide.length;
        for (let i = 0; i < itemsCount; i++) {
            if (!itemsToHide[i].classList.contains('side_form_legend')) {
                itemsToHide[i].hidden = !itemsToHide[i].hidden;
            }
        }
    } else if (event.target.dataset.type === 'addside') { //Добавить сторону
        let newSide = event.target.parentNode.cloneNode(true);
        //Получаем номер стороны,в которой произошел клик, в коллекции сторон (поэтому -1)
        let thisSideCollectionIndex = event.target.parentNode.id.slice(event.target.parentNode.id.lastIndexOf('_') + 1) - 1;
        for (let side = thisSideCollectionIndex; side < sidesCount; side++) {
            //Следующий номер для атрибутов элемента равен текущему номеру в аттрибуте +1, то есть номеру индекса +2
            let nextSide = side + 2;
            if (sideForms[side].hasAttribute('id')) {
                sideForms[side].id = sideForms[side].id.slice(0, sideForms[side].id.lastIndexOf('_') + 1) + nextSide;
            }
            //Получаем все элементы внутри родительского кнопки, в которой произошел клик (добавить проверку нулевого количества сторон)
            let formtags = sideForms[side].querySelectorAll('*');
            //Вспомогательная переменная с количеством элементов для цикла
            let formtagsCount = formtags.length;
            //Изменяем номер в атрибутах всех сторон после текущей, если она не последняя
            for (let i = 0; i < formtagsCount; i++) {
                if (formtags[i].hasAttribute('id')) {
                    formtags[i].id = formtags[i].id.slice(0, formtags[i].id.lastIndexOf('_') + 1) + nextSide;
                }
                if (formtags[i].hasAttribute('name')) {
                    formtags[i].setAttribute('name', formtags[i].getAttribute('name').slice(0, formtags[i].getAttribute('name').lastIndexOf('_') + 1) + nextSide);
                }
                if (formtags[i].hasAttribute('for')) {
                    formtags[i].setAttribute('for', formtags[i].getAttribute('for').slice(0, formtags[i].getAttribute('for').lastIndexOf('_') + 1) + nextSide);
                }
                if (formtags[i].classList.contains('side_form_legend')) {
                    formtags[i].innerHTML = formtags[i].innerHTML.slice(0, formtags[i].innerHTML.lastIndexOf(' ')) + ' ' + nextSide;
                }
            }
        }
        event.target.parentElement.before(newSide);
        sideForms = document.querySelectorAll('.side_form');
        sidesCount++;
    } else if (event.target.dataset.type === 'removeside') {
        if (event.target.parentElement.nextSibling.classList.contains('side_form')) {
            alert('!!!');
        }
        event.target.parentElement.remove();
    }
})