'use strict';

window.onload = function () {
    function createAddSideButton() {
        //Кнопка добавления стороны (вставить возле кнопки отправки значений, если сторон 0,
        //и в форме каждой стороны с изменением надписи на "Добавить после" после элемента ввода длины стороны.
        //В случае, если добавляется сторона, убрать кнопку возле кнопки отправки значений)
        let newElement = document.createElement('input');
        newElement.type = 'button';
        newElement.className = 'add_side_button';
        newElement.value = 'Добавить следующую сторону';
        return newElement;
    }

    function createRemoveSideButton() {
        //Кнопка удаления стороны (вставить после кнопки добавления стороны в форме каждой стороны
        let newElement = document.createElement('input');
        newElement.type = 'button';
        newElement.className = 'remove_side_button';
        newElement.value = 'Убрать эту сторону';
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
        newElement.classList.add('side_dimension', 'width');
        newElement.name = `side_width_${newSideIndex}`;
        newElement.required = true;
        return newElement;
    }

    function createSideLeftDirectionLabel() {
        //Элемент ввода направления стороны по горизонтали влево (вставить после элемента ввода ширины стороны)
        let newElement = document.createElement('label');
        newElement.innerHTML = 'влево &larr;';
        return newElement;
    }

    function createSideLeftDirectionRadio(newSideIndex = 0) {
        //Радиокнопка левого направления добавляемой стороны (вставить в элемент ввода направления стороны по горизонтали влево
        //последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'radio';
        newElement.required = true;
        newElement.value = '-1';
        newElement.name = `left_or_right_${newSideIndex}`;
        return newElement;
    }


    function createSideRightDirectionLabel() {
        //Элемент ввода направления стороны по горизонтали вправо (вставить после элемента ввода направления влево)
        let newElement = document.createElement('label');
        newElement.innerHTML = 'вправо &rarr;';
        return newElement;
    }

    function createSideRightDirectionRadio(newSideIndex = 0) {
        //Радиокнопка правого направления добавляемой стороны (вставить в элемент ввода направления стороны по горизонтали вправо
        //последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'radio';
        newElement.required = true;
        newElement.value = '1';
        newElement.name = `left_or_right_${newSideIndex}`;
        newElement.setAttribute('checked', '');
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
        newElement.classList.add('side_dimension', 'height');
        newElement.name = `side_height_${newSideIndex}`;
        newElement.required = true;
        return newElement;
    }

    function createSideUpDirectionLabel() {
        //Элемент ввода направления стороны по вертикали вверх (вставить после элемента ввода высоты стороны)
        let newElement = document.createElement('label');
        newElement.innerHTML = 'вверх &uarr;';
        return newElement;
    }

    function createSideUpDirectionRadio(newSideIndex = 0) {
        //Радиокнопка направления добавляемой стороны вверх (вставить в элемент ввода направления стороны по вертикали вверх
        //последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'radio';
        newElement.required = true;
        newElement.value = '-1';
        newElement.name = `up_or_down_${newSideIndex}`;
        newElement.setAttribute('checked', '');
        return newElement;
    }

    function createSideDownDirectionLabel() {
        //Элемент ввода направления стороны по вертикали вниз (вставить после элемента ввода направления вверх)
        let newElement = document.createElement('label');
        newElement.innerHTML = 'вниз &darr;';
        return newElement;
    }

    function createSideDownDirectionRadio(newSideIndex = 0) {
        //Радиокнопка направления добавляемой стороны вниз (вставить в элемент ввода направления стороны по вертикали вниз
        //последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'radio';
        newElement.required = true;
        newElement.value = '1';
        newElement.name = `up_or_down_${newSideIndex}`;
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

        //Добавляем радиокнопку левого направления по горизонтали
        let leftDirection = createSideLeftDirectionLabel();
        widthInput.after(leftDirection);
        let leftDirectionRadio = createSideLeftDirectionRadio(addSideIndex);
        leftDirection.append(leftDirectionRadio);

        //Добавляем радиокнопку правого направления по горизонтали
        let rightDirection = createSideRightDirectionLabel();
        leftDirection.after(rightDirection);
        let rightDirectionRadio = createSideRightDirectionRadio(addSideIndex);
        rightDirection.append(rightDirectionRadio);

        //Перенос строки
        rightDirection.after(br.cloneNode());

        //Добавляем элемент ввода высоты стороны
        let heightInput = createSideHeightInputLabel();
        side.append(heightInput);
        let heightInputField = createSideHeightInputField(addSideIndex);
        heightInput.append(heightInputField);

        //Добавляем радиокнопку направления по вертикали вверх
        let upDirection = createSideUpDirectionLabel();
        heightInput.after(upDirection);
        let upDirectionRadio = createSideUpDirectionRadio(addSideIndex);
        upDirection.append(upDirectionRadio);

        //Добавляем радиокнопку направления по вертикали вниз
        let downDirection = createSideDownDirectionLabel();
        upDirection.after(downDirection);
        let downDirectionRadio = createSideDownDirectionRadio();
        downDirection.append(downDirectionRadio);

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
        negateSeam.append(negateSeamCheckbox);

    }

    function renumberSideForms(addOrRemove, currentSideIndex) {
        let sideForms = document.querySelectorAll('.side_form'); //Коллекция всех сторон (форм ввода)
        console.log(sideForms);
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

    function handleFormClick(event) { //Обработчик клика по форме
        let clickTarget = event.target;
        let clist = clickTarget.classList;
        let parent = clickTarget.parentElement;
        switch (true) {
            case clist.contains('side_form_legend'):
                let itemsToHide = clickTarget.parentNode.querySelectorAll('label');
                let itemsCount = itemsToHide.length;
                for (let i = 0; i < itemsCount; i++) {
                    itemsToHide[i].hidden = !itemsToHide[i].hidden;
                }
                break;
            case clist.contains('add_side_button'):
                let addSideIndex = 0;
                if (parent.hasAttribute('data-index')) {
                    let currentSideIndex = Number(parent.dataset.index); //Индекс текущей стороны
                    addSideIndex = currentSideIndex + 1;
                    renumberSideForms(1, currentSideIndex);
                }
                addSide(parent, addSideIndex);
                break;
            case clist.contains('remove_side_button'):
                let currentSideIndex = Number(parent.dataset.index); //Индекс текущей стороны
                renumberSideForms(-1, currentSideIndex);
                parent.remove();
                break;
            case clist.contains('side_dimension'):
                alert(clickTarget);
                break;
        }
    }

    //Отслеживаем клик по форме
    let entForm = document.getElementById('entire_form');
    entForm.addEventListener('click', handleFormClick);
}