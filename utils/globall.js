function localizeID(item) {
    return document.getElementById(item);
}

function addInPage(content) {
    document.querySelector('body').innerHTML += content;
}

function toArray(stringItem) {
    return String(stringItem).split("");
}

function addClass(element, className) {
    element.classList.add(className);
}

function removeClass(element, className) {
    element.classList.remove(className);
}

function changeBackground(element, background) {
    element.style.backgroundColor = background;
}

function changeValue(element, value) {
    element.value = value;
}

function changeColor(element, color) {
    element.style.Color = color;
}

function removeReadOnly(element) {
    element.removeAttribute("readonly");
}

function addReadOnly(element) {
    element.setAttribute("readonly", true);
}

function changeColorOfElementClicked(elementCLicked, color) {
    elementCLicked.style.fill = color;
}
