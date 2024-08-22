document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('shortDescription');
    const maxChars = 250;
    const charsCountDisplay = document.getElementById('shortDescriptionCharsCountDisplay');

    input.addEventListener('input', ()  => {
        const currentLength = input.value.length;
        if (currentLength > maxChars){
            input.value = input.value.substring(0, maxChars)
        }
        charsCountDisplay.textContent = maxChars - input.value.length;
    })
})
