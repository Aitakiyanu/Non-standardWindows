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

function addSideForm (sideNumber, currentSide) {
    let newSideForm = document.createElement('fieldset');
    let newSideNumber = sideNumber + 2; //Новая сторона добавляется после текущей, ее номер - номер индекса + 1 к индексу и + 1 к текущему номеру
    newSideForm.id = `side_form_${newSideNumber}`;
    newSideForm.className = 'side_form';
    newSideForm.innerHTML = `
        <legend class="side_form_legend" data-type="legend">Сторона ${newSideNumber}</legend>
        <span id="side_${newSideNumber}" hidden>0</span>
        
        <label for="wall_opening_side_length_${newSideNumber}">Длина стороны:</label>
        <input id="wall_opening_side_length_${newSideNumber}" type="number" name="wall_opening_side_length_${newSideNumber}" value="0" min="0" required class="side_dimension length">
         
        <input type="button" id="add_side_${newSideNumber}" value="Добавить после" data-type="addside"/>
        <input type="button" id="remove_side_${newSideNumber}" value="Убрать сторону" data-type="removeside"/><br/>
       
        <label for="wall_opening_side_width_${newSideNumber}">Ширина по горизонтали:</label>
        <input type="number" id="wall_opening_side_width_${newSideNumber}" name="wall_opening_side_width_${newSideNumber}" value="0" min="0" required class="side_dimension width">
        
        <label for="right_direction_${newSideNumber}">вправо(+)</label>
        <input id="right_direction_${newSideNumber}" type="radio" name="left_or_right_${newSideNumber}" value="1" required checked>
        
        <label for="left_direction_${newSideNumber}">влево(-)</label>
        <input id="left_direction_${newSideNumber}" type="radio" name="left_or_right_${newSideNumber}" value="-1" required><br/>
        
        <label for="wall_opening_side_height_${newSideNumber}">Высота по вертикали:</label>
        <input type="number" id="wall_opening_side_height_${newSideNumber}" name="wall_opening_side_height_${newSideNumber}" value="0" min="0" required class="side_dimension height">
        
        <label for="up_direction_${newSideNumber}">вверх(+)</label>
        <input id="up_direction_${newSideNumber}" type="radio" name="up_or_down_${newSideNumber}" value="1" required checked>
        
        <label for="down_direction_${newSideNumber}">вниз(-)</label>
        <input id="down_direction_${newSideNumber}" type="radio" name="up_or_down_${newSideNumber}" value="-1" required><br/>
        
        <label for="side_assembly_seam_${newSideNumber}">Шов:</label>
        <input id="side_assembly_seam_${newSideNumber}" type="number" name="side_assembly_seam_${newSideNumber}" value="20" min="0" required>
        
        <label for="negate_assembly_seam_${newSideNumber}">за четверть(-)</label>
        <input id="negate_assembly_seam_${newSideNumber}" type="checkbox" name="negate_assembly_seam_${newSideNumber}" value="checked">
    `;
    if (sideNumber === -1) {
        currentSide.before(newSideForm);
        currentSide.querySelector('input[type="button"]').hidden = true;
    } else {
        currentSide.after(newSideForm);
    }
}

function renumberSideForms(addOrRemove, currentSideCollectionIndex) {
    let sideForms = document.querySelectorAll('.side_form');
    let sidesCount = sideForms.length;
    if (addOrRemove === 1) {
        for (let side = currentSideCollectionIndex + 1; side < sidesCount; side++) {
            //Следующий номер для атрибутов элемента равен текущему номеру в аттрибуте +1, то есть номеру индекса +2
            let nextSide = side + 2;
            //Переименовываем (перенумеровываем) идентификатор fieldset
            if (sideForms[side].hasAttribute('id')) {
                sideForms[side].id = sideForms[side].id.slice(0, sideForms[side].id.lastIndexOf('_') + 1) + nextSide;
            }
            //Получаем все элементы внутри формы
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
    } else if (addOrRemove === -1) {
        for (let side = currentSideCollectionIndex +1; side < sidesCount; side++) {
            //Меняем номер fieldset id на номер индекса, то есть уменьшаем на 1
            if (sideForms[side].hasAttribute('id')) {
                sideForms[side].id = sideForms[side].id.slice(0, sideForms[side].id.lastIndexOf('_')+1) + side;
            }
            //Получаем все элементы внутри формы
            let formtags = sideForms[side].querySelectorAll('*');
            //Вспомогательная переменная с количеством элементов для цикла
            let formtagsCount = formtags.length;
            //Изменяем номер в атрибутах всех сторон после текущей, если она не последняя
            for (let i = 0; i < formtagsCount; i++) {
                if (formtags[i].hasAttribute('id')) {
                    formtags[i].id = formtags[i].id.slice(0, formtags[i].id.lastIndexOf('_') + 1) + side;
                }
                if (formtags[i].hasAttribute('name')) {
                    formtags[i].setAttribute('name', formtags[i].getAttribute('name').slice(0, formtags[i].getAttribute('name').lastIndexOf('_') + 1) + side);
                }
                if (formtags[i].hasAttribute('for')) {
                    formtags[i].setAttribute('for', formtags[i].getAttribute('for').slice(0, formtags[i].getAttribute('for').lastIndexOf('_') + 1) + side);
                }
                if (formtags[i].classList.contains('side_form_legend')) {
                    formtags[i].innerHTML = formtags[i].innerHTML.slice(0, formtags[i].innerHTML.lastIndexOf(' ')) + ' ' + side;
                }
            }

        }
    }
}

function calculateTriangleSide() {
    let parent = this.parentNode;
    let dimWarn = parent.getElementsByClassName('dim_warn')[0];
    let sideDimensionsWarning = document.createElement('p');
    sideDimensionsWarning.className = 'dim_warn';
    sideDimensionsWarning.innerHTML = 'Высота и ширина стороны должны быть не больше ее длины';
    let secondSide;
    let calculatedSide;
    let differenceOfSquares;
    if (this.classList.contains('length')) {
        secondSide = parent.querySelector('.height');
        calculatedSide = parent.querySelector('.width');
        differenceOfSquares = Math.pow(this.value, 2) - Math.pow(secondSide.value, 2);
    } else if (this.classList.contains('width')) {
        secondSide = parent.querySelector('.length');
        calculatedSide = parent.querySelector('.height');
        differenceOfSquares = Math.pow(secondSide.value, 2) - Math.pow(this.value, 2);

    } else if (this.classList.contains('height')) {
        secondSide = parent.querySelector('.length');
        calculatedSide = parent.querySelector('.width');
        differenceOfSquares = Math.pow(secondSide.value, 2) - Math.pow(this.value, 2);
    }
    if (differenceOfSquares >= 0) {
        calculatedSide.value = Math.round(Math.sqrt(differenceOfSquares));
        if (dimWarn !== undefined) {
            dimWarn.remove();
        }
    } else  {
        calculatedSide.value = 0;
        if (dimWarn === undefined) {
            parent.append(sideDimensionsWarning);
        }
    }

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
        let currentSide = event.target.parentElement;
        //Получаем номер стороны из id. Для перевода в индекс коллекции считаем -1.
        let currentSideCollectionIndex = currentSide.id.slice(currentSide.id.lastIndexOf('_') + 1) - 1;
        renumberSideForms(1, currentSideCollectionIndex);
        addSideForm(currentSideCollectionIndex, currentSide);
    } else if (event.target.dataset.type === 'removeside') {
        let currentSide = event.target.parentElement;
        //Получаем номер стороны из id. Для перевода в индекс коллекции считаем -1.
        let currentSideCollectionIndex = currentSide.id.slice(currentSide.id.lastIndexOf('_') + 1) - 1;
        renumberSideForms(-1, currentSideCollectionIndex);
        currentSide.remove();
    } else if (event.target.classList.contains('side_dimension')) {
        event.target.addEventListener('input', calculateTriangleSide);
    }
})
