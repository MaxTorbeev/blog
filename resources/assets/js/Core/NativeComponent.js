class AbstractNativeComponent {

    constructor(selector, params = []) {

        if (new.target === AbstractNativeComponent) {
            throw new TypeError("Cannot construct Abstract instances directly");
        }

        this.selector = selector;
        this.params = params;
        this.elements = document.querySelectorAll(this.selector);

        this.beforeInit();
        this.init();
        this.afterInit();
    }

    beforeInit() {
    }

    init() {
    }

    afterInit() {
    }
}

export default AbstractNativeComponent;