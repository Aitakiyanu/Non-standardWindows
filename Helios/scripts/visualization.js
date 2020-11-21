let newdiv = document.createElement('div');
newdiv.id = "newdiv";
newdiv.innerHTML = `<svg width="200" height="200" viewBox="0 0 200 200"><polygon points="10,10 190,10 190,190 10,190" fill="none" stroke="green"></polygon></svg>`;
document.body.firstElementChild.after(newdiv);
let a = 10;
let b = 10;
let c = 100;
let d = 190;
let e = 190;
let f = 10
newdiv.getElementsByTagName('polygon')[0].setAttribute('points', `${a},${b} ${c},${d} ${e},${f}`);
/*let svgOutline = document.createElementNS("http://www.w3.org/2000/svg", 'svg');
svgOutline.setAttributeNS(null, 'width', '200');
svgOutline.setAttributeNS(null, 'height', '200');
svgOutline.setAttributeNS(null, 'viewBox', '0 0 200 200');
let outlineFigure = document.createElementNS("http://www.w3.org/2000/svg", 'polygon');
outlineFigure.setAttributeNS(null, 'points', '10, 10 190,10 190,190 10,190');
outlineFigure.setAttributeNS(null, 'fill', 'none');
outlineFigure.setAttributeNS(null, 'stroke', 'green');
newdiv.append(svgOutline);
svgOutline.append(outlineFigure);*/
