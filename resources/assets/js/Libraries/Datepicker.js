import * as moment from 'moment';

import 'bootstrap4-datetimepicker/src/js/bootstrap-datetimepicker'
import 'bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.min.css'
import $ from  'jquery'

class Datepicker extends AbstractNativeComponent {
    init(){
        $(this.selector).datetimepicker({
            locale: 'ru',
            viewMode: 'days',
            format: this.dateFormat()
        });
    }

    dateFormat(){
        if ($(this.selector).data('timepicker') === true)
            return 'YYYY-MM-DD H:i:s';

        return 'YYYY-MM-DD'
    }
}

export default Datepicker;
