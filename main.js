var ColorPickerExtension = MediumEditor.Extension.extend({
    name: "colorPicker",

    init: function () {
        this.button = this.document.createElement('button');
        this.button.classList.add('medium-editor-action');
        this.button.classList.add('editor-color-picker');
        this.button.title = 'Text color'
        this.button.innerHTML = '<i class="fa fa-paint-brush"></i>';

        this.on(this.button, 'click', this.handleClick.bind(this));
    },

    getButton: function () {
        return this.button;
    },

    handleClick: function (e) {
        e.preventDefault();
        e.stopPropagation();

        this.selectionState = this.base.exportSelection();

        // If no text selected, stop here.
        if (this.selectionState && (this.selectionState.end - this.selectionState.start === 0)) {
            return;
        }

        // colors for picker
        var pickerColors = [
          "#DAA520",
          "#000000"
        ];

        var picker = vanillaColorPicker(this.document.querySelector(".medium-editor-toolbar-active .editor-color-picker").parentNode);
        picker.set("customColors", pickerColors);
        picker.set("positionOnTop");
        picker.openPicker();
        picker.on("colorChosen", function (color) {
            this.base.importSelection(this.selectionState);
            this.document.execCommand("styleWithCSS", false, true);
            this.document.execCommand("foreColor", false, color);
        }.bind(this));
    }
});

var editor = new MediumEditor('.editable', {
    toolbar: {
        buttons: ['colorPicker', 'bold', 'italic', 'underline', '', 'quote', 'anchor', 'image', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedlist', 'removeFormat', 'outdent', 'indent'],
    },
    extensions: {'ColorPicker': new ColorPickerExtension()},
    buttonLabels: 'fontawesome',
    anchor: {
        targetCheckbox: true
    }
});

