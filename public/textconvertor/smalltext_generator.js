function updateText() {
    const textArea = document.getElementById('write-text');
    const generatedTextArea = document.getElementById('generated-text');

    const text = textArea.value;
    const words = text.trim().split(/\s+/);

    const convertedText = convertTextFormat(text);
    generatedTextArea.value = convertedText;

    document.getElementById('write-word-count').textContent = words.length;
    document.getElementById('write-character-count').textContent = text.length;
    document.getElementById('write-line-count').textContent = text.split('\n').length;

    updateGeneratedCounts();
}

function convertTextFormat(text) {
    const smallCaps = text.split('').map(char => char === '' ? '' : char.toUpperCase()).join('');
    const superscript = text.split('').map(char => getSuperscriptChar(char)).join('');

    return `Small Caps\n${smallCaps}\n\nSuperscript\n${superscript}`;
}

function getSuperscriptChar(char) {
    const superscriptMap = {
        '0': '⁰',
        '1': '¹',
        '2': '²',
        '3': '³',
        '4': '⁴',
        '5': '⁵',
        '6': '⁶',
        '7': '⁷',
        '8': '⁸',
        '9': '⁹',
        'a': 'ᵃ',
        'b': 'ᵇ',
        'c': 'ᶜ',
        'd': 'ᵈ',
        'e': 'ᵉ',
        'f': 'ᶠ',
        'g': 'ᵍ',
        'h': 'ʰ',
        'i': 'ⁱ',
        'j': 'ʲ',
        'k': 'ᵏ',
        'l': 'ˡ',
        'm': 'ᵐ',
        'n': 'ⁿ',
        'o': 'ᵒ',
        'p': 'ᵖ',
        'q': 'ᵠ',
        'r': 'ʳ',
        's': 'ˢ',
        't': 'ᵗ',
        'u': 'ᵘ',
        'v': 'ᵛ',
        'w': 'ʷ',
        'x': 'ˣ',
        'y': 'ʸ',
        'z': 'ᶻ',
    };

    return superscriptMap[char.toLowerCase()] || char;
}

function updateGeneratedCounts() {
    const generatedTextArea = document.getElementById('generated-text');
    const generatedText = generatedTextArea.value;
    const generatedWords = generatedText.trim().split(/\s+/);

    document.getElementById('generated-word-count').textContent = generatedWords.length;
    document.getElementById('generated-character-count').textContent = generatedText.length;
    document.getElementById('generated-line-count').textContent = generatedText.split('\n').length;
}

function copyGeneratedText() {
    const generatedTextContainer = document.getElementById('generated-text');
    generatedTextContainer.select();

    try {
        document.execCommand('copy');
        alert('Text copied to clipboard Successfully !');
    } catch (err) {
        console.error('Failed to copy text:', err);
    }
}

function clearGeneratedText() {
    const generatedTextArea = document.getElementById('generated-text');
    generatedTextArea.value = '';
    updateGeneratedCounts();
}

function downloadGeneratedText() {
    const generatedTextArea = document.getElementById('generated-text');
    const textToDownload = generatedTextArea.value;

    const blob = new Blob([textToDownload], {
        type: 'text/plain'
    });
    const url = URL.createObjectURL(blob);

    const downloadLink = document.getElementById('download-link');
    downloadLink.href = url;
}

document.getElementById('download-link').addEventListener('click', downloadGeneratedText);
