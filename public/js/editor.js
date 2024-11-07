if($('.quilEditor').length){
    // const quill = new Quill('.quilEditor', {
    //     theme: 'snow'
    // });

    // Run Iteration for multiple Quill Editor
    $('.quilEditor').map((index, value) => {
        // Get Input Id from Quill Editor Main Element
        let populatedInput = $(value).data('populated_input');
        // Get Selector of QuillEditor Editable Content Element
        let qlEditableElement = `.quilEditor[data-populated_input=${populatedInput}`;

        // Get EditableContent from Input Value
        let inputContent = $(`input#${populatedInput}`).val();
        if(inputContent)
            $(qlEditableElement).html(inputContent);

        // Make an Instance of Quill Editor
        new Quill(qlEditableElement, {
            theme: 'snow'
        });
    });

    // Populate Editor's Input Field when editor detect any change (keyup)    
    $('.quilEditor').on('keyup', function(e) {
        let qlEditableElement = $(e.target);
        let qlEditableContent = qlEditableElement.html();
        console.log(qlEditableContent);
        let qlEditorMainElement = qlEditableElement.parent('.quilEditor');
        let editorForInput = qlEditorMainElement.data('populated_input');
        $(`input#${editorForInput}`).val(qlEditableContent);
    });
}

if($('.summernote').length){
    // https://summernote.org/deep-dive/

    // Run Iteration for multiple Summernote Editor
    // $('#summernote').summernote();
    // $('.summernote').summernote({
    //     toolbar: [
    //         ['style', ['bold', 'italic', 'underline', 'clear']],
    //         ['font', ['strikethrough', 'superscript', 'subscript']],
    //         ['fontsize', ['fontsize']],
    //         ['color', ['color']],
    //         ['para', ['ul', 'ol', 'paragraph']],
    //         ['height', ['height']]
    //     ],
    // });

    // $('.summernote').summernote({
    //     toolbar: [
    //         ['style', ['style', 'bold', 'clear']],
    //         ['font', ['strikethrough', 'superscript', 'subscript']],
    //         ['fontsize', ['fontsize']],
    //         ['color', ['color']],
    //         ['para', ['ul', 'ol', 'paragraph']],
    //         ['height', ['height']]
    //     ],
    //     colors: [
    //         ['#ff5757', 'ffffff', '#000000', '#f12633']
    //     ],
    // });

    $('.summernote').summernote({
        toolbar: [
            ['style', ['style', 'bold', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link']], // ['insert', ['link', 'picture', 'video']],
        ],
        colors: [
            ['#ff5757', 'ffffff', '#000000', '#f12633']
        ],
        callbacks: {
            onKeydown: function(e) {
                // var plainText = $(this).summernote('code').replace(/<\/?[^>]+(>|$)/g, ""); // Strip HTML tags
                const plainText = getSummerNotePureText($(this));

                if (plainText.length >= $(this).prop('maxlength') && e.keyCode !== 8 && e.keyCode !== 46) { // keyCode 8 is Backspace, 46 is Delete
                    e.preventDefault();
                }
            },
            onChange: function(e) {
                const plainText = getSummerNotePureText($(this));
                const charLength = plainText.length;
                const maxlength = $(this).prop('maxlength');

                // console.log('summernote: (exist / max) ', `${charLength} / ${maxlength}`);

                $(this).next().find('.character-exist').html(charLength);
                validateSummerNoteEditorContent($(this));
            }
        }
    });

    const charLength = 0;
    const maxlength = 100;
    let characterCountHtml = `<div class="note-btn-group btn-group note-character-count float-right">`
        + `<div class="border btn-default btn-group note-btn-group p-1 rounded">`
            + `<span class="character-exist">${charLength}</span>`
            + ` / `
            + `<span class="character-maxlength">${maxlength}</span>`
        + `</div>`
    + `</div>`;

    $('.panel-heading.note-toolbar').append(characterCountHtml);

    const colorNames = {
        "#ff5757": "Red",
        "ffffff": "White",
        "#000000": "Black",
        "#f12633": "Crimson"
    };
    
    // Iterate over each button and update attributes
    $(".note-color-btn").each(function() {
        const colorValue = $(this).data("value");
        if (colorNames[colorValue]) {
            const colorName = colorNames[colorValue];
            $(this).attr("aria-label", colorName);
            $(this).attr("data-original-title", colorName);
        }
    });

}