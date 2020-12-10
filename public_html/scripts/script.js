'use strict';

window.onload = function () {

    document.getElementById('add_side_button').addEventListener('click', handleAddSideButtonClick);

    let sideDimensions = [];

    function createAddSideButton() {
        //Кнопка добавления стороны (вставить в форме каждой стороны после элемента ввода длины стороны)
        let newElement = document.createElement('input');
        newElement.type = 'button';
        newElement.className = 'add_side_button';
        newElement.value = '+';
        newElement.title = 'Добавить сторону после этой';
        newElement.addEventListener('click', handleAddSideButtonClick);
        return newElement;
    }

    function createRemoveSideButton() {
        //Кнопка удаления стороны (вставить после кнопки добавления стороны в форме каждой стороны
        let newElement = document.createElement('input');
        newElement.type = 'button';
        newElement.className = 'remove_side_button';
        newElement.value = 'Х';
        newElement.title = 'Удалить эту сторону';
        newElement.addEventListener('click', handleRemoveSideButtonClick);
        return newElement;
    }

    function createSideFormFieldset(newSideIndex = 0) {
        //Контейнер формы одной стороны (вставить при нажатии кнопки добавления стороны после стороны с нажимаемой кнопкой
        let newElement = document.createElement('fieldset');
        newElement.className = 'side_form';
        newElement.dataset.index = `${newSideIndex}`;//Содержит индекс текущей стороны
        return newElement;
    }

    function createSideFormLegend(newSideIndex = 0) {
        //Легенда формы одной стороны (вставить в контейнер формы одной стороны первым потомком)
        let newElement = document.createElement('legend');
        let sideLegendNumber = newSideIndex + 1; //Номер стороны в легенде
        newElement.className = 'side_form_legend';
        newElement.textContent = `Сторона ${sideLegendNumber}`;
        newElement.addEventListener('click', hideFormInputs);
        return newElement;
    }

    function createSideSizeInformer() {
        //Длина стороны, появляющаяся при скрытии полей ввода в форме при нажатии на легенду этой формы (вставить после легенды)
        let newElement = document.createElement('span');
        newElement.hidden = true;
        return newElement;
    }

    function createSideLengthInputLabel() {
        //Элемент ввода длины стороны (вставить после скрытой длины стороны, появляющейся при скрытии полей ввода)
        let newElement = document.createElement('label');
        newElement.textContent = 'Длина стороны:';
        return newElement;
    }

    function createSideLengthInputField(newSideIndex = 0) {
        //Поле ввода длины стороны (вставить в элемент ввода длины стороны последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'number';
        newElement.value = '0';
        newElement.min = '0';
        newElement.name = `side_length_${newSideIndex}`;
        newElement.classList.add('side_dimension', 'length');
        newElement.required = true;
        newElement.addEventListener('input', calculateTriangleSide);
        return newElement;
    }

    function createSideWidthInputLabel() {
        //Элемент ввода ширины стороны (вставить после элемента ввода длины стороны)
        let newElement = document.createElement('label');
        newElement.textContent = 'Ширина по горизонтали:';
        return newElement;
    }

    function createSideWidthInputField(newSideIndex = 0) {
        //Поле ввода ширины стороны (вставить в элемент ввода ширины стороны последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'number';
        newElement.value = '0';
        newElement.min = '0';
        newElement.name = `side_width_${newSideIndex}`;
        newElement.classList.add('side_dimension', 'width');
        newElement.required = true;
        newElement.addEventListener('input', calculateTriangleSide);
        return newElement;
    }

    function createSideLeftDirectionCheckboxLabel() {
        //Элемент ввода признака направления стороны влево от предыдущей (ширина в расчете берется с минусом)
        //(вставить после элемента ввода ширины стороны)
        let newElement = document.createElement('label');
        newElement.textContent = 'влево от предыдущей';
        return newElement;
    }

    function createSideLeftDirectionCheckbox(newSideIndex = 0) {
        //Чекбокс признака направления стороны влево от предыдущей (вставить в элемент ввода направления влево последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'checkbox';
        newElement.value = 'checked';
        newElement.name = `left_direction_${newSideIndex}`;
        return newElement;
    }

    function createSideDownDirectionCheckboxLabel() {
        //Элемент ввода признака направления стороны вниз от предыдущей (высота в расчете берется с минусом)
        //(вставить после элемента ввода высоты стороны)
        let newElement = document.createElement('label');
        newElement.textContent = 'вниз от предыдущей';
        return newElement;
    }

    function createSideDownDirectionCheckbox(newSideIndex = 0) {
        //Чекбокс признака направления стороны вниз от предыдущей (вставить в элемент ввода направления вниз последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'checkbox';
        newElement.value = 'checked';
        newElement.name = `left_direction_${newSideIndex}`;
        return newElement;
    }

    function createSideHeightInputLabel() {
        //Элемент ввода высоты стороны (вставить после элемента ввода ширины стороны)
        let newElement = document.createElement('label');
        newElement.textContent = 'Высота по вертикали:';
        return newElement;
    }

    function createSideHeightInputField(newSideIndex = 0) {
        //Поле ввода высоты стороны (вставить в элемент ввода высоты стороны последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'number';
        newElement.value = '0';
        newElement.min = '0';
        newElement.name = `side_height_${newSideIndex}`;
        newElement.classList.add('side_dimension', 'height');
        newElement.required = true;
        newElement.addEventListener('input', calculateTriangleSide);
        return newElement;
    }

    function createSideSeamInputLabel() {
        //Элемент ввода ширины монтажного шва (вставить после элемента ввода направления стороны вниз)
        let newElement = document.createElement('label');
        newElement.textContent = 'Шов:';
        return newElement;
    }

    function createSideSeamInputField(newSideIndex = 0) {
        //Поле ввода ширины монтажного шва (вставить в элемент ввода ширины монтажного шва последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'number';
        newElement.value = '20';
        newElement.min = '0';
        newElement.name = `side_seam_${newSideIndex}`;
        newElement.required = true;
        return newElement;
    }

    function createNegateSideSeamLabel() {
        //Элемент ввода признака захода за четверть (значение ширины монтажного шва считается глубиной захода за четверть
        //и принимается при расчетах со знаком минус)(вставить после элемента ввода ширины монтажного шва)
        let newElement = document.createElement('label');
        newElement.textContent = 'или за четверть(-)';
        return newElement;
    }

    function createNegateSideSeamCheckbox(newSideIndex = 0) {
        //Чекбокс признака захода за четверть (вставить в элемент ввода признака захода за четверть последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'checkbox';
        newElement.value = 'checked';
        newElement.name = `negate_seam_${newSideIndex}`;
        return newElement;
    }

    function createSideDimensionsWarning() {
        let newElement = document.createElement('p');
        newElement.className = 'dim_warn';
        newElement.hidden = true;
        newElement.innerHTML = 'Высота и ширина стороны должны быть не больше ее длины';
        return newElement;
    }

    function addSide(parent, addSideIndex) {

        //Добавляем сторону (форму)
        let side = createSideFormFieldset(addSideIndex);
        if (addSideIndex === 0) {
            parent.prepend(side);
            document.getElementById('add_side_button').hidden = true;
            document.getElementById('sendvalues').hidden = false;
        } else {
            parent.after(side);
        }

        //Добавляем легенду с номером стороны
        let sideLegend = createSideFormLegend(addSideIndex);
        side.prepend(sideLegend);
        //sideLegend.addEventListener('click', hideFormInputs);

        //Добавляем скрывающийся информер
        let informer = createSideSizeInformer();
        sideLegend.after(informer);

        //Добавляем элемент ввода длины стороны с полем ввода
        let lengthInput = createSideLengthInputLabel();
        informer.after(lengthInput);
        let lengthInputField = createSideLengthInputField(addSideIndex);
        lengthInput.append(lengthInputField);

        //Добавляем кнопки
        let addButton = createAddSideButton();
        lengthInput.after(addButton);
        let removeButton = createRemoveSideButton();
        addButton.after(removeButton);

        //Перенос строки
        let br = document.createElement('br');
        removeButton.after(br);

        //Добавляем элемент ввода ширины строны с полем ввода
        let widthInput = createSideWidthInputLabel();
        side.append(widthInput);
        let widthInputField = createSideWidthInputField(addSideIndex);
        widthInput.append(widthInputField);

        //Добавляем чекбокс левого направления стороны
        let leftDirection = createSideLeftDirectionCheckboxLabel();
        widthInput.after(leftDirection);
        let leftDirectionCheckbox = createSideLeftDirectionCheckbox(addSideIndex);
        leftDirection.append(leftDirectionCheckbox);

        //Перенос строки
        leftDirection.after(br.cloneNode());

        //Добавляем элемент ввода высоты стороны
        let heightInput = createSideHeightInputLabel();
        side.append(heightInput);
        let heightInputField = createSideHeightInputField(addSideIndex);
        heightInput.append(heightInputField);

        //Добавляем чекбокс направления ситорны вниз
        let downDirection = createSideDownDirectionCheckboxLabel();
        heightInput.after(downDirection);
        let downDirectionCheckbox = createSideDownDirectionCheckbox(addSideIndex);
        downDirection.append(downDirectionCheckbox);

        //Перенос строки
        downDirection.after(br.cloneNode());

        //Добавляем элемент ввода ширины монтажного шва с полем ввода
        let seamInput = createSideSeamInputLabel();
        side.append(seamInput);
        let seamInputField = createSideSeamInputField(addSideIndex);
        seamInput.append(seamInputField);

        //Добавляем чекбокс захода за четверть
        let negateSeam = createNegateSideSeamLabel();
        seamInput.after(negateSeam);
        let negateSeamCheckbox = createNegateSideSeamCheckbox(addSideIndex);
        negateSeam.append(negateSeamCheckbox)

        //Добавляем скрытое предупреждение о размерах стороны
        let dimWarn = createSideDimensionsWarning();
        negateSeam.after(dimWarn);
    }

    function renumberSideForms(addOrRemove, currentSideIndex) {
        let sideForms = document.querySelectorAll('.side_form'); //Коллекция всех сторон (форм ввода)
        let sidesCount = sideForms.length; //Количество сторон
        let sideNewIndex; //Новый индекс перенумеровываемой стороны
        let formTags; //Элементы внутри формы перенумеровываемой стороны
        let formTagsCount; //Количество элементов внутри формы перенумеровываемой стороны
        //Перенумеровываем стороны, начиная со следующей (если есть)
        for (let side = currentSideIndex + 1; side < sidesCount; side++) {
            //Новый индекс следующей стороны
            sideNewIndex = side + addOrRemove;
            //Меняем номер стороны (fieldset) в data-index
            sideForms[side].dataset.index = sideNewIndex;
            formTags = sideForms[side].querySelectorAll('*');
            formTagsCount = formTags.length;
            //Изменяем номер в атрибутах всех сторон после текущей, если она не последняя
            for (let i = 0; i < formTagsCount; i++) {
                if (formTags[i].hasAttribute('name')) {
                    formTags[i].name = formTags[i].name.replace(/\d+$/, sideNewIndex);
                }
                if (formTags[i].classList.contains('side_form_legend')) {
                    formTags[i].textContent = 'Сторона ' + (sideNewIndex + 1);
                }
            }
        }

        document.getElementById('sendvalues').hidden = sidesCount + addOrRemove === 0;

        document.getElementById('sendvalues').disabled = sidesCount + addOrRemove < 3;

        document.getElementById('sendvalues').value = sidesCount + addOrRemove < 3 ? 'Мало сторон' : 'Рассчитать';

        document.getElementById('add_side_button').hidden = sidesCount + addOrRemove !== 0;
    }

    function hideFormInputs(event) {
        let itemsToHide = event.target.parentNode.querySelectorAll('label');
        let itemsCount = itemsToHide.length;
        for (let i = 0; i < itemsCount; i++) {
            itemsToHide[i].hidden = !itemsToHide[i].hidden;
            //Скрыть также br-теги
            if (itemsToHide[i].nextSibling && itemsToHide[i].nextSibling.tagName.toLowerCase() === 'br') {
                itemsToHide[i].nextSibling.hidden = !itemsToHide[i].nextSibling.hidden;
            }
        }
    }

    function handleAddSideButtonClick(event) {
        let parent = event.target.parentElement;
        let addSideIndex = 0;
        if (parent.hasAttribute('data-index')) {
            let currentSideIndex = Number(parent.dataset.index); //Индекс текущей стороны
            addSideIndex = currentSideIndex + 1;
            renumberSideForms(1, currentSideIndex);
        }
        addSide(parent, addSideIndex);
        sideDimensions.splice(addSideIndex, 0, [0, 0, 0, 20]);
    }

    function handleRemoveSideButtonClick(event) {
        let parent = event.target.parentElement;
        let currentSideIndex = Number(parent.dataset.index); //Индекс текущей стороны
        renumberSideForms(-1, currentSideIndex);
        parent.remove();
        sideDimensions.splice(currentSideIndex, 1);
    }

    function calculateTriangleSide() {
        //Расчет третьего размера стороны (длина-стороны-ширина) при изменении занчения в поле ввода размера
        let parent = this.parentNode.parentNode;
        let currentSideIndex = parent.dataset.index;
        let dimWarn = parent.getElementsByClassName('dim_warn')[0];
        let length = parent.querySelector('.length');
        let width = parent.querySelector('.width');
        let height = parent.querySelector('.height');
        let differenceOfSquares;
        if (this === length) {
            //При вводе длины стороны рассчитывается ширина. Высота не меняется
            differenceOfSquares = Math.pow(length.value, 2) - Math.pow(height.value, 2);
            if (differenceOfSquares >= 0) {
                width.value = Math.round(Math.sqrt(differenceOfSquares));
                if (dimWarn.hidden === false) {
                    dimWarn.hidden = true;
                }
            } else {
                width.value = 0;
                if (dimWarn.hidden === true) {
                    dimWarn.hidden = false;
                }
            }
        } else if (this === width) {
            //При вводе ширины стороны рассчитывается высота. Длина не меняетя
            differenceOfSquares = Math.pow(length.value, 2) - Math.pow(width.value, 2);
            if (differenceOfSquares >= 0) {
                height.value = Math.round(Math.sqrt(differenceOfSquares));
                if (dimWarn.hidden === false) {
                    dimWarn.hidden = true;
                }
            } else {
                height.value = 0;
                if (dimWarn.hidden === true) {
                    dimWarn.hidden = false;
                }
            }
        } else if (this === height) {
            //При вводе высоты стороны рассчитывается ширина. Длина не меняется
            differenceOfSquares = Math.pow(length.value, 2) - Math.pow(height.value, 2);
            if (differenceOfSquares >= 0) {
                width.value = Math.round(Math.sqrt(differenceOfSquares));
                if (dimWarn.hidden === false) {
                    dimWarn.hidden = true;
                }
            } else {
                width.value = 0;
                if (dimWarn.hidden === true) {
                    dimWarn.hidden = false;
                }
            }
        }
    }
}