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
        this.viewActive = false;
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
               let elNew = this.createElement(el.x, el.y, el.id);
               elNew.content = el.content;
               elNew.relations = el.relations;
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
                let lineNew = this.createLine(el1, el2, line.sec1, line.sec2, line.id);
                lineNew.focused = line.focused;
            });

        }

        // mode
        if (localStorage.getItem('inEditor') == 'false') {
            this.switchMode(false);
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

            this.viewActive.generateRelations();
            if (key == 49) {
                let target = this.viewActive.relations.find(rel => rel.section == 1 && rel.target);
                if (target) {
                    this.watchView(this.elements.find(el => el.id == target.target));
                }
            } else if (key == 50) {
                let target = this.viewActive.relations.find(rel => rel.section == 2 && rel.target);
                if (target) {
                    this.watchView(this.elements.find(el => el.id == target.target));
                }
            } else if (key == 51) {
                let target = this.viewActive.relations.find(rel => rel.section == 3 && rel.target);
                if (target) {
                    this.watchView(this.elements.find(el => el.id == target.target));
                }
            } else if (key == 52) {
                let target = this.viewActive.relations.find(rel => rel.section == 4 && rel.target);
                if (target) {
                    this.watchView(this.elements.find(el => el.id == target.target));
                }
            }

        });

    }

    update () {
        requestAnimationFrame(this.update.bind(this));

        if (this.inEditor) {
            id('main').classList.remove('on-view');
            id('editor-btn').classList.add('btn-active');
            id('view-btn').classList.remove('btn-active');
        } else {
            id('main').classList.add('on-view');
            id('editor-btn').classList.remove('btn-active');
            id('view-btn').classList.add('btn-active');
        }

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

    // show modal
    showModal () {
        id('modal').classList.add('active');
    }

    // close modal
    closeModal () {
        id('modal').classList.remove('active');
    }

    // switch mode
    switchMode (isEditor) {
        this.inEditor = isEditor;

        let viewContent = id('view-content');

        if (!this.inEditor) {
            this.watchView();
            viewContent.innerHTML = "";
            this.elements.forEach((el, i) => {
                let viewItem = document.createElement('div');
                viewItem.classList.add('view-item');
                viewItem.innerHTML = `<div>${el.content}</div>`;
                viewItem.style.transform = `translateX(${i == 0 ? '0%' : '100%'})`;
                viewContent.append(viewItem);
                el.contentDOM = viewItem;
            });
        }

    }

    // watch view
    watchView (el = false) {

        if (!el) {
            el = main.elements[0];
            this.viewActive = false;
        }

        let from = this.viewActive;
        this.viewActive = el;

        if (from) {
            from.generateRelations();
            let fromSection = from.relations.find(rel => rel.target == el.id).section;
            let keyframes = [], keyframesNext = [];

            if (fromSection == 1) {
                keyframes = [
                    {transform: 'translateY(0%)'},
                    {transform: 'translateY(100%)'},
                ];
                keyframesNext = [
                    { transform: 'translateY(-100%)' },
                    { transform: 'translateY(0%)' }
                ];
            } else if (fromSection == 2) {
                keyframes = [
                    {transform: 'translateX(0%)'},
                    {transform: 'translateX(-100%)'},
                ];
                keyframesNext = [
                    { transform: 'translateX(100%)' },
                    { transform: 'translateX(0%)' }
                ];
            } else if (fromSection == 3) {
                keyframes = [
                    { transform: 'translateY(0%)' },
                    { transform: 'translateY(-100%)' }
                ];
                keyframesNext = [
                    { transform: 'translateY(100%)' },
                    { transform: 'translateY(0%)' }
                ];
            } else if (fromSection == 4) {
                keyframes = [
                    {transform: 'translateX(0%)'},
                    {transform: 'translateX(100%)'},
                ];
                keyframesNext = [
                    { transform: 'translateX(-100%)' },
                    { transform: 'translateX(0%)' }
                ];
            }

            from.contentDOM.animate(keyframes, {
                duration: 400,
                fill: 'forwards',
                easing: 'ease-out'
            });
            el.contentDOM.animate(keyframesNext, {
                duration: 400,
                fill: 'forwards',
                easing: 'ease-out'
            });
        }

        id('view-links').innerHTML = "";
        el.generateRelations();
        el.relations.filter(rel => rel.target).forEach(rel => {
           let button = document.createElement('button');
           let target = this.elements.find(el => el.id == rel.target);
           let html = rel.caption ? rel.caption : `To slide ${rel.target}` ;
           if (rel.section == 1) {
               html = `&#8593; ` + html;
           } else if (rel.section == 2) {
               html = `&#8594; ` + html;
           } else if (rel.section == 3) {
               html = `&#8595; ` + html;
           } else if (rel.section == 4) {
               html = `&#8592; ` + html;
           }
           button.innerHTML = html;
           button.addEventListener('click', () => this.watchView(target));
           id('view-links').append(button);
        });
    }

    // fullscreen
    fullscreen () {
        id('view-mode').requestFullscreen();

        id('view-mode').classList.add('fullscreen');

        id('view-mode').onfullscreenchange = (event) => {
            let elem = event.target;
            let isFullscreen = document.fullscreenElement === elem;

            if (!isFullscreen) {
                id('view-mode').classList.remove('fullscreen');
            }
        }
    }

}