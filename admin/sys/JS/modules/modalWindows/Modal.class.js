import {
    el,
    html,
    mount
} from "redom";


class Modal {
    constructor() {
        document.querySelector("#pm_overlay").style.display = "flex";
        this.mr = getRandMath(1, 1000);
        this.idname = "#pm_modal_" + this.mr;
        this.el = el(`${this.idname} .pm_modal pm_modal_parent`);
        this.titlear = el(".pm_modal pm_modal_titleArea");
        this.content = el(".pm_modal pm_modal_contentArea");
        this.buttons = el(".pm_modal pm_modal_buttonsArea");
        this.body = document.body;

        mount(this.body, this.el);
        mount(this.el, this.titlear);
        mount(this.el, this.content);
        mount(this.el, this.buttons);
    }

    //BASE ELEMENTS
    icon(fun, clas) {
        mount(
            this.el,
            el(`.${clas} pm_modal pm_modal_icon`, {
                onclick: function() {
                    fun();
                }
            })
        );
    }

    title(text) {
        let titlear = this.titlear;
        mount(titlear, el(".pm_modal pm_modal_title", text));
    }

    button(fun, text) {

        let but = this.buttons;
        mount(
            but,
            el("input.pm_modal pm_modal_button", {
                type: "button",
                onclick: fun,
                value: text
            })
        );

    }

    //to content
    input(type) {
        mount(
            this.content,
            el("input.pm_modal pm_modal_input", {
                type: type
            })
        );
    }
    img(src) {
        mount(
            this.content,
            el("img.pm_modal pm_modal_img", {
                src: src
            })
        );
    }
    text(text) {
        mount(this.content, el("input.pm_modal pm_modal_text", text));
    }
    div(content, clas) {
        mount(this.content, el(`.pm_modal ${clas} pm_modal_innerdiv`, content));
    }
    span(clas) {
        mount(this.content, el(`span.pm_modal ${clas} pm_modal_span`));
    }
    canvas(id) {
        mount(this.content, el(`canvas#${id}.pm_modal pm_modal_canvas`));
    }

    //vars
    get id() {
        return this.idname.substring(1) + " ";
    }

    close(closetype, id) {
        if (closetype === 1) {
            document.querySelector("#pm_overlay").style.display = "none";
            document.getElementById(id).remove();
        }
        if (closetype === 2) {
            document.getElementById(id).remove();
        }
        if (closetype === 3) {
            location.reload();
        }
    }

    //ELEMENTS
    //icons
    closeIcon(closetype) {
        let id = this.id;
        let close = this.close;
        this.icon(function() {
            close(closetype, id);
        }, "pm_modal_icon_close");
    }

    dragIcon() {
        let id = this.id;
        let el = document.getElementById(id);
        this.icon(function() {
            drag(el.querySelector(".pm_modal_icon_drag"));
        }, "pm_modal_icon_drag");
    }

    //close button
    buttonClose(closetype, text) {
        let id = this.id;
        let close = this.close;
        this.button(function() {
            close(closetype, id);
        }, text);
    }
}