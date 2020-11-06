class Main {
    constructor() {
        // state
        this.inEditor = true;
        this.onShift = false;

        // layout settings
        this.radius = 40;

        // objects
        this.elements = [];
        this.lines = [];
    }

    run () {
        this.generate();
        this.listener();
        this.update();
    }

    generate () {

        // generate elements
        if (localStorage.getItem('elements')) {

            let els = JSON.parse(localStorage.getItem('elements'));
            els.forEach(el => {
               el = this.createElement(el.x, el.y, el.id);
            });

        } else {

            // create root element
            this.createElement(app.scrollWidth/2, app.scrollHeight/2);

        }

        // generate lines
        if (localStorage.getItem('lines')) {

            let lines = JSON.parse(localStorage.getItem('lines'));
            lines.forEach(line => {
                let el1 = this.elements.find(el => el.id == line.el1.id);
                let el2 = this.elements.find(el => el.id == line.el2.id);
                line = this.createLine(el1, el2, line.sec1, line.sec2, line.id);
            });

        }

    }

    listener () {

        window.addEventListener('keydown', (e) => {

            let key = e.keyCode;

            if (key == 46 || key == 8) {
                this.lines.filter(line => line.focused).forEach(line => line.destroy());
            }

            if (key == 16) {
                this.onShift = true;
            }

        });

    }

    update () {
        requestAnimationFrame(this.update.bind(this));

        this.elements.forEach(el => el.update());
        this.lines.forEach(line => line.update());

        localStorage.setItem('elements', JSON.stringify(this.elements));
        localStorage.setItem('lines', JSON.stringify(this.lines));
        localStorage.setItem('inEditor', this.inEditor);
    }

    // create element
    createElement (x, y, id = false) {
        let el = new Element(x, y, id);
        this.elements.push(el);
        return el;
    }

    // create line
    createLine (el1, el2, sec1, sec2, id = false) {
        let el = new Line(el1, el2, sec1, sec2, id);
        this.lines.push(el);
        return el;
    }

    // push element
    pushElement (el, sec) {
        let pos = {
            x: el.x,
            y: el.y,
        },
            newSec, newEl, dist = 100;

        if (sec == 1) {
            newSec = 3;
            pos.y -= main.radius + dist;
        } else if (sec == 2) {
            newSec = 4;
            pos.x += main.radius + dist;
        } else if (sec == 3) {
            newSec = 1;
            pos.y += main.radius + dist;
        } else if (sec == 4) {
            newSec = 2;
            pos.x -= main.radius + dist;
        }

        newEl = this.createElement(pos.x, pos.y);
        this.createLine(el, newEl, sec, newSec);
    }

}