document.addEventListener('DOMContentLoaded', function() {
    const textInput = document.getElementById('title');
    const slugOutput = document.getElementById('slug');

    const translitMap = {
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'yo',
        'ж': 'zh', 'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm',
        'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u',
        'ф': 'f', 'х': 'kh', 'ц': 'ts', 'ч': 'ch', 'ш': 'sh', 'щ': 'shch',
        'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya',
        ' ': '-', '\\': '-', '/': '-'
    };
    function transliterate(text) {
        return text.split('').map(char => translitMap[char] || char).join('');
    }
    function convertToSlug(text) {

        const changedText =  text
            .toLowerCase() // Приводим к нижнему регистру
            .trim() // Удаляем пробелы в начале и конце
            .replace(/[\s\\/]+/g, '-') // Заменяем пробелы и обратные слеши на тире
            .replace(/--+/g, '-') // Заменяем несколько тире подряд на одно тире
            .replace(/^-|-$/g, ''); // Удаляем тире в начале и конце
        return transliterate(changedText);
    }
    textInput.addEventListener('blur', function() {
        slugOutput.value = convertToSlug(textInput.value);
    });

});
