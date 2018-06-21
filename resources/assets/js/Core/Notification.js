/**
 * @see https://ned.im/noty/
 */

import Noty from 'noty';

import "noty/src/noty.scss";
import "noty/src/themes/mint.scss";

class Notification {

    constructor(el, data, options) {
        this.el = el;
        this.data = data;
    }

    /**
     * Creating notification block.
     *
     * @param message - is text alert
     * @param level - is alert type with variants [alert, success, warning, error, info/information]
     */
    static create(message, level = 'info') {
        return new Noty({
            layout:     'topRight',
            type:       level,
            text:       message,
            timeout:    3000,
            closeWith:  'click'
        });
    }

    static info(message) {
        return this.create(message, 'info').show();
    }

    static error(message) {
        return this.create(message, 'error').show();
    }
}

export default Notification;