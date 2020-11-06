class Element extends Svg {
    constructor(x, y, id = false) {
        super();

        this.x = x;
        this.y = y;
        this.id = id;
        if (!this.id)
            this.getID();

        this.dom = null;
        this.content = 'Slide ' + this.id;
        this.contentDOM = null;
        this.relations = [
            {
                section: 1,
                line: null,
                target: null,
                caption: '',
            },
            {
                section: 2,
                line: null,
                target: null,
                caption: '',
            },
            {
                section: 3,
                line: null,
                target: null,
                caption: '',
            },
            {
                section: 4,
                line: null,
                target: null,
                caption: '',
            }
        ];
        this.create();
        this.listener();
    }

    getID () {
        if (main.elements.length > 0) {
            this.id = main.elements[main.elements.length - 1].id + 1;
        } else {
            this.id = 1;
        }
    }

    create () {
        // element
        this.dom = this.make('g', {
            class: 'element',
            id: `el-${this.id}`,
            dataID: this.id,
            transform: `translate(${this.x}, ${this.y})`,
        });

        // circle
        let circle = this.make('circle', {
            cx: 0,
            cy: 0,
            r: main.radius,
            class: 'circle',
        });
        this.dom.append(circle);

        // Sections
        [
            "M 0 0 L -28 -28 Q 0 -53 28 -28 Z",
            "M 0 0 L 28 -28 Q 53 0 28 28 Z",
            "M 0 0 L 28 28 Q 0 53 -28 28 Z",
            "M 0 0 L -28 28 Q -53 0 -28 -28 Z",
        ].forEach((d, i) => {

            i++;

            let section = this.make('g', {
                class: 'section',
                i,
            });

            let path = this.make('path', {
                class: 'path',
                i,
                d,
            });

            let text = this.make('text', {
                class: 'text',
                i,
            });
            text.innerHTML = i;

            section.append(path);
            section.append(text);
            this.dom.append(section);

        });

        let buttonEdit = this.make('foreignObject', {
                width: 30,
                height: 30,
                transform: `translate(-15, -15)`,
                x: -main.radius-15,
        });

        buttonEdit.innerHTML = `<button class="btn-action btn-edit">E</button>`;
        this.dom.append(buttonEdit);

        buttonEdit.addEventListener('click', () => {
           this.edit();
        });

        let buttonDelete = this.make('foreignObject', {
            width: 30,
            height: 30,
            transform: `translate(-15, -15)`,
            x: main.radius+15,
        });

        buttonDelete.innerHTML = `<button class="btn-action btn-edit">X</button>`;
        this.dom.append(buttonDelete);

        buttonDelete.addEventListener('click', () => {
           this.destroy();
        });

        app.append(this.dom);
    }

    sectionDOM () {
        return Array.from(this.dom.getElementsByClassName('section'));
    }

    generateRelations () {
        let sectionHaveRelation = main.lines.filter(line => {
            return line.el1.id == this.id;
        }).map(line => parseInt(line.sec1));

        sectionHaveRelation = main.lines.filter(line => {
            return line.el2.id == this.id;
        }).map(line => parseInt(line.sec2)).concat(sectionHaveRelation);

        sectionHaveRelation.sort();

        sectionHaveRelation = sectionHaveRelation.map((section) => {
            let line = main.lines.find(line => {
                return line.el1.id == this.id && line.sec1 == section ||
                    line.el2.id == this.id && line.sec2 == section
            });

            let target = line.el1.id != this.id ? line.el1 : line.el2;

            let resultFormat = {
                section,
                line,
                target,
            };

            return resultFormat;
        });

        this.relations = this.relations.map(rel => {
           let shr = sectionHaveRelation.find(sec => sec.section == rel.section);

           if (shr) {
               rel.target = shr.target.id;
               rel.line = shr.line.id;
           }
           return rel;
        });
    }

    listener () {
        this.sectionDOM().forEach(section => {
            let mousedown, mousemove, clonning = false;

           section.addEventListener('mousedown', (e) => {
               mousedown = true;

               if (main.onShift && !section.classList.contains('active')) {
                   let rect = app.getBoundingClientRect();
                   let x = e.clientX - rect.left;
                   let y = e.clientY - rect.top;

                   clonning = section.cloneNode(true);
                   clonning.classList.add('always-on');
                   clonning.setAttribute('transform', `translate(${x}, ${y})`);
                   app.prepend(clonning);
               }
           });

           document.body.addEventListener('mousemove', (e) => {
              if (mousedown) {
                  mousemove = true;

                  let rect = app.getBoundingClientRect();
                  let x = e.clientX - rect.left;
                  let y = e.clientY - rect.top;

                  if (clonning) {
                      clonning.setAttribute('transform', `translate(${x}, ${y})`);
                  } else {
                      this.x = x;
                      this.y = y;
                  }

              }
           });

           document.body.addEventListener('mouseup', (e) => {
              if (mousedown && !mousemove && !section.classList.contains('active')) {
                  main.pushElement(this, section.getAttribute('i'));
              }

              if (clonning) {
                  let target = e.target.parentElement;
                  let targetEl = main.elements.find(el => el.id == target.parentElement.getAttribute('dataID'));

                  if (target != clonning && !target.classList.contains('active')) {
                      main.createLine(this, targetEl, clonning.getAttribute('i'), target.getAttribute('i'));
                  }

                  clonning.remove();
                  clonning = false;
              }
              mousedown = false;
              mousemove = false;
           });

        });
    }

    update () {
        this.dom.setAttribute('transform', `translate(${this.x}, ${this.y})`);
    }

    destroy () {
        if (main.elements.length == 1) {
            alert('Cannot delete root element.');
            return;
        }
        main.lines
            .filter(line => line.el1.id == this.id || line.el2.id == this.id)
            .forEach(line => line.destroy());

        this.dom.remove();
        let index = main.elements.findIndex(el => el.id == this.id);
        main.elements.splice(index, 1);
    }

    edit () {
        main.showModal();

        id('modal-content').innerHTML = `<textarea id="editor1" cols="8" rows="8"></textarea>`;
        let ckeditor = CKEDITOR.replace( 'editor1' );
        ckeditor.setData(this.content);
        ckeditor.on('change', (e) => {
            this.content = ckeditor.getData();
        });


        this.generateRelations();
        id('modal-section').innerHTML = '';
        this.relations.filter(rel => rel.target).forEach(rel => {
            let input = document.createElement('input');
            input.setAttribute('placeholder', `Relation ${rel.section}`);
            input.value = rel.caption;

            input.addEventListener('change', () => {
               rel.caption = input.value;
            });

           id('modal-section').append(input);
        });
    }
}