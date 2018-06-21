import AbstractNativeComponent from 'Core/NativeComponent'
import Asset from 'Core/Asset'
import 'select2'

class Select extends AbstractNativeComponent {
    init() {
        $.fn.select2.defaults.set("theme", "bootstrap4");

        Asset.styleUrl('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css');

        this.elements.forEach((element) => {
            $(element).select2(this.params);
        });
    }
}

export default Select;
