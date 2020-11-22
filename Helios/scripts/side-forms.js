'use strict';
function sideForm() {
    let sidesCount = 0; //Количество сторон в форме
    let currentSideIndex; //Индекс текущей стороны
    let newSideIndex = 0; //Индекс добавляемой стороны

    function createAddSideButton() {
        //Кнопка добавления стороны (вставить возле кнопки отправки значений, если сторон 0,
        //и в форме каждой стороны с изменением надписи на "Добавить после" после элемента ввода длины стороны.
        //В случае, если добавляется сторона, убрать кнопку возле кнопки отправки значений)
        let newElement = document.createElement('input');
        newElement.type = 'button';
        newElement.className = 'add_side_button';
        newElement.value = 'Добавить сторону';
        return newElement;
    }

    function createRemoveSideButton() {
        //Кнопка удаления стороны (вставить после кнопки добавления стороны в форме каждой стороны
        let newElement = document.createElement('input');
        newElement.type = 'button';
        newElement.className = 'remove_side_button';
        newElement.value = 'Убрать сторону';
        return newElement;
    }

    function crateSideFormFieldset() {
        //Контейнер формы одной стороны (вставить при нажатии кнопки добавления стороны после стороны с нажимаемой кнопкой
        let newElement = document.createElement('fieldset');
        newElement.className = 'side_form';
        newElement.dataset.index = `${newSideIndex}`;//Содержит индекс текущей стороны
        return newElement;
    }

    function createSideFormLegend() {
        //Легенда формы одной стороны (вставить в контейнер формы одной стороны первым потомком)
        let newElement = document.createElement('legend');
        let sideLegendNumber = newSideIndex + 1; //Номер стороны в легенде
        newElement.className = 'side_form_legend';
        newElement.textContent = `Сторона ${sideLegendNumber}`;
        return newElement;
    }

    function createSideSizeInformer() {
        //Длина стороны, появляющаяся при скрытии полей ввода в форме при нажатии на легенду этой формы (вставить полсе легенды)
        let sideSize = document.createElement('span');
        sideSize.hidden = true;
        return newElement;
    }

    function createSideLengthInputLabel() {
        //Элемент ввода длины стороны (вставить после скрытой длины стороны, появляющейся при скрытии полей ввода)
        let sideLengthInputLabel = document.createElement('label');
        sideLengthInputLabel.textContent = 'Длина стороны:';
        return newElement;
    }

    function crateSideLengthInputField() {
    //Поле ввода длины стороны (вставить в элемент ввода длины стороны последним потомком)
        let sideLengthInput = document.createElement('input');
        sideLengthInput.type = 'number';
        sideLengthInput.value = '0';
        sideLengthInput.min = '0';
        sideLengthInput.name = `side_length_${newSideIndex}`;
        sideLengthInput.classList.add('side_dimension', 'length');
        sideLengthInput.required = true;
        return sideLengthInput;
    }

    function createSideWidthInputLabel() {
        //Элемент ввода ширины стороны (вставить после элемента ввода длины стороны)
        let sideWidthInputLabel = document.createElement('label');
        sideWidthInputLabel.textContent = 'Ширина по горизонтали:';
    }

    function createSideWidthInputField() {
        //Поле ввода ширины стороны (вставить в элемент ввода ширины стороны последним потомком)
        let sideWidthInput = document.createElement('input');
        sideWidthInput.type = 'number';
        sideWidthInput.value = '0';
        sideWidthInput.min = '0';
        sideWidthInput.classList.add('side_dimension', 'width');
        sideWidthInput.name = `side_width_${newSideIndex}`;
        sideWidthInput.required = true;
    }

    function createSideLeftDirectionLabel() {
        //Элемент ввода направления стороны по горизонтали влево (вставить после элемента ввода ширины стороны)
        let sideLeftDirectionLabel = document.createElement('label');
        sideLeftDirectionLabel.textContent = 'влево &larr;';
    }

    function createSideLeftDirectionRadio() {
        //Радиокнопка левого направления добавляемой стороны (вставить в элемент ввода направления стороны по горизонтали влево
        //последним потомком)
        let sideLeftDirectionRadio = document.createElement('input');
        sideLeftDirectionRadio.type = 'radio';
        sideLeftDirectionRadio.required = true;
        sideLeftDirectionRadio.value = '-1';
        sideLeftDirectionRadio.name = `left_or_right_${newSideIndex}`;
    }


    function createSideRightDirectionLabel() {
        //Элемент ввода направления стороны по горизонтали вправо (вставить после элемента ввода направления влево)
        let sideRightDirectionLabel = document.createElement('label');
        sideRightDirectionLabel.textContent = 'вправо &rarr;';
    }

    function createSideRightDirectionRadio() {
        //Радиокнопка правого направления добавляемой стороны (вставить в элемент ввода направления стороны по горизонтали вправо
        //последним потомком)
        let sideRightDirectionRadio = document.createElement('input');
        sideRightDirectionRadio.type = 'radio';
        sideRightDirectionRadio.required = true;
        sideRightDirectionRadio.value = '1';
        sideRightDirectionRadio.name = `left_or_right_${newSideIndex}`;
        sideRightDirectionRadio.checked = true;
    }

    function createSideHeightInputLabel() {
        //Элемент ввода высоты стороны (вставить после элемента ввода ширины стороны)
        let sideHeightInputLabel = document.createElement('label');
        sideHeightInputLabel.textContent = 'Высота по вертикали:';
    }

    function createSideHeightInputField() {
        //Поле ввода высоты стороны (вставить в элемент ввода высоты стороны последним потомком)
        let sideHeightInput = document.createElement('input');
        sideHeightInput.type = 'number';
        sideHeightInput.value = '0';
        sideHeightInput.min = '0';
        sideHeightInput.classList.add('side_dimension', 'height');
        sideHeightInput.name = `side_height_${newSideIndex}`;
        sideHeightInput.required = true;
    }

    function createSideUpDirectionLabel() {
        //Элемент ввода направления стороны по вертикали вверх (вставить после элемента ввода высоты стороны)
        let sideUpDirectionLabel = document.createElement('label');
        sideUpDirectionLabel.textContent = 'вверх &uarr;';
    }

    function createSideUpDirectionRadio() {
        //Радиокнопка направления добавляемой стороны вверх (вставить в элемент ввода направления стороны по вертикали вверх
        //последним потомком)
        let sideUpDirectionRadio = document.createElement('input');
        sideUpDirectionRadio.type = 'radio';
        sideUpDirectionRadio.required = true;
        sideUpDirectionRadio.value = '-1';
        sideUpDirectionRadio.name = `up_or_down_${newSideIndex}`;
    }

    function createSideDownDirectionLabel() {
        //Элемент ввода направления стороны по вертикали вниз (вставить после элемента ввода направления вверх)
        let sideDownDirectionLabel = document.createElement('label');
        sideDownDirectionLabel.textContent = 'вниз &darr;';
    }


    function createSideDownDirectionRadio() {
        //Радиокнопка направления добавляемой стороны вниз (вставить в элемент ввода направления стороны по вертикали вниз
        //последним потомком)
        let sideDownDirectionRadio = document.createElement('input');
        sideDownDirectionRadio.type = 'radio';
        sideDownDirectionRadio.required = true;
        sideDownDirectionRadio.value = '1';
        sideDownDirectionRadio.name = `up_or_down_${newSideIndex}`;
        sideDownDirectionRadio.checked = true;
    }

    function createSideSeamInputLabel() {
        //Элемент ввода ширины монтажного шва (вставить после элемента ввода направления стороны вниз)
        let sideSeamInputLabel = document.createElement('label');
        sideSeamInputLabel.textContent = 'Шов:';
    }

    function createSideSeamInputField() {
        //Поле ввода ширины монтажного шва (вставить в элемент ввода ширины монтажного шва последним потомком)
        let sideSeamInput = document.createElement('input');
        sideSeamInput.type = 'number';
        sideSeamInput.value = '20';
        sideSeamInput.min = '0';
        sideSeamInput.name = `side_seam_${newSideIndex}`;
        sideSeamInput.required = true;
    }

    function createNegateSideSeamLabel() {
        //Элемент ввода признака захода за четверть (значение ширины монтажного шва считается глубиной захода за четверть
        //и принимается при расчетах со знаком минус)(вставить после элемента ввода ширины монтажного шва)
        let negateSideSeamLabel = document.createElement('label');
        negateSideSeamLabel.textContent = 'или за четверть(-)';
    }

    function createNegateSideSeamCheckbox() {
        //Чекбокс признака захода за четверть (вставить в элемент ввода признака захода за четверть последним потомком)
        let negateSideSeamCheckbox = document.createElement('input');
        negateSideSeamCheckbox.type = 'checkbox';
        negateSideSeamCheckbox.value = 'checked';
        negateSideSeamCheckbox.name = `negate_seam_${newSideIndex}`;
    }

}
