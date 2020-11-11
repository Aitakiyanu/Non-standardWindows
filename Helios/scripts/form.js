'use strict';

let sideForms = document.getElementsByClassName('side_form_legend');
let sidesCount = sideForms.length;
for (let i = 0; i < sidesCount; i++) {
    sideForms[i].addEventListener('click', function () {
        this.parentNode.querySelectorAll('input').forEach(inp => inp.classList.toggle('hidden'));
        this.parentNode.querySelectorAll('label').forEach(lbl => lbl.classList.toggle('hidden'));
        this.parentNode.querySelectorAll('p').forEach(pgf => pgf.classList.toggle('hidden'));
        this.parentNode.querySelectorAll('br').forEach(br => br.classList.toggle('hidden'));
    })
}
