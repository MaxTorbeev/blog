class NativeComponent {

    constructor(selector, params = []) {
        this.selector = selector;
        this.params = params;
        this.elements = document.querySelectorAll(this.selector);

        this.beforeInit();
        this.init();
        this.afterInit();
    }

    beforeInit(){}

    init(){}

    afterInit(){}
}

export default NativeComponent;