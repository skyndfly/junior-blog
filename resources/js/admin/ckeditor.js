import {Bold, ClassicEditor, Essentials, Font, Image, Italic, Paragraph,} from 'ckeditor5';

import 'ckeditor5/ckeditor5.css';
import coreTranslations from 'ckeditor5/translations/ru.js';

ClassicEditor
    .create(document.querySelector('#description'), {
        plugins: [Essentials, Bold, Italic, Font, Paragraph, Image],
        toolbar: {
            items: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',

            ],

        },
        translations: [
            coreTranslations,
        ]
    })
    .then(
    )
    .catch( /* ... */);
