document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('title');
    const maxChars = 140;
    const charsCountDisplay = document.getElementById('titleCharsCountDisplay');

    input.addEventListener('input', ()  => {
        const currentLength = input.value.length;
        if (currentLength > maxChars){
            input.value = input.value.substring(0, maxChars)
        }
        charsCountDisplay.textContent = maxChars - input.value.length;
    })
})
