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

    function crateSideFormFieldset(newSideIndex) {
        //Контейнер формы одной стороны (вставить при нажатии кнопки добавления стороны после стороны с нажимаемой кнопкой
        let newElement = document.createElement('fieldset');
        newElement.className = 'side_form';
        newElement.dataset.index = `${newSideIndex}`;//Содержит индекс текущей стороны
        return newElement;
    }

    function createSideFormLegend(newSideIndex) {
        //Легенда формы одной стороны (вставить в контейнер формы одной стороны первым потомком)
        let newElement = document.createElement('legend');
        let sideLegendNumber = newSideIndex + 1; //Номер стороны в легенде
        newElement.className = 'side_form_legend';
        newElement.textContent = `Сторона ${sideLegendNumber}`;
        return newElement;
    }

    function createSideSizeInformer() {
        //Длина стороны, появляющаяся при скрытии полей ввода в форме при нажатии на легенду этой формы (вставить полсе легенды)
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

    function crateSideLengthInputField(newSideIndex) {
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

    function createSideWidthInputField(newSideIndex) {
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
        newElement.textContent = 'влево &larr;';
        return newElement;
    }

    function createSideLeftDirectionRadio(newSideIndex) {
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
        newElement.textContent = 'вправо &rarr;';
        return newElement;
    }

    function createSideRightDirectionRadio(newSideIndex) {
        //Радиокнопка правого направления добавляемой стороны (вставить в элемент ввода направления стороны по горизонтали вправо
        //последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'radio';
        newElement.required = true;
        newElement.value = '1';
        newElement.name = `left_or_right_${newSideIndex}`;
        newElement.checked = true;
        return newElement;
    }

    function createSideHeightInputLabel() {
        //Элемент ввода высоты стороны (вставить после элемента ввода ширины стороны)
        let newElement = document.createElement('label');
        newElement.textContent = 'Высота по вертикали:';
        return newElement;
    }

    function createSideHeightInputField(newSideIndex) {
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
        newElement.textContent = 'вверх &uarr;';
        return newElement;
    }

    function createSideUpDirectionRadio(newSideIndex) {
        //Радиокнопка направления добавляемой стороны вверх (вставить в элемент ввода направления стороны по вертикали вверх
        //последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'radio';
        newElement.required = true;
        newElement.value = '-1';
        newElement.name = `up_or_down_${newSideIndex}`;
        return newElement;
    }

    function createSideDownDirectionLabel() {
        //Элемент ввода направления стороны по вертикали вниз (вставить после элемента ввода направления вверх)
        let newElement = document.createElement('label');
        newElement.textContent = 'вниз &darr;';
        return newElement;
    }


    function createSideDownDirectionRadio(newSideIndex) {
        //Радиокнопка направления добавляемой стороны вниз (вставить в элемент ввода направления стороны по вертикали вниз
        //последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'radio';
        newElement.required = true;
        newElement.value = '1';
        newElement.name = `up_or_down_${newSideIndex}`;
        newElement.checked = true;
        return newElement;
    }

    function createSideSeamInputLabel() {
        //Элемент ввода ширины монтажного шва (вставить после элемента ввода направления стороны вниз)
        let newElement = document.createElement('label');
        newElement.textContent = 'Шов:';
        return newElement;
    }

    function createSideSeamInputField(newSideIndex) {
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

    function createNegateSideSeamCheckbox(newSideIndex) {
        //Чекбокс признака захода за четверть (вставить в элемент ввода признака захода за четверть последним потомком)
        let newElement = document.createElement('input');
        newElement.type = 'checkbox';
        newElement.value = 'checked';
        newElement.name = `negate_seam_${newSideIndex}`;
        return newElement;
    }

}
