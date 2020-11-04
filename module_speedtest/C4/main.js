window.onload = init();

function init () {
    sliders = {
        red: id('red-range'),
        green: id('green-range'),
        blue: id('blue-range'),
    };

    listener();
    update();
}

function id (id) {
    return document.getElementById(id);
}

function listener () {
    Object.keys(sliders).forEach(key => {
       sliders[key].addEventListener('input', () => {
         update();
       });
    });
}

function update () {
    let rgba = `rgba(${sliders.red.value}, ${sliders.green.value}, ${sliders.blue.value})`;
    let preview = id('preview');

    preview.style.backgroundColor = rgba;
    preview.innerHTML = rgba;

    let total = 255 * 3;
    let totalRange = Object.keys(sliders).map(key => {
        return parseInt(sliders[key].value);
    }).reduce((total, item) => total+=item);

    if (totalRange > total/2) {
        preview.style.color = '#333';
    } else {
        preview.style.color = '#fff';
    }
}