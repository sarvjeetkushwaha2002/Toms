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
    const reverseText = text.split('').map(char => char === '' ? '' : char).reverse().join('');
    return `${reverseText}`;
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
        const speechSynthesis = window.speechSynthesis;
        const speech = new SpeechSynthesisUtterance('You are Copy Successfully!');
        speechSynthesis.speak(speech);
    } catch (err) {
        console.error('Failed to copy text:', err);
    }
}

function clearGeneratedText() {
    const generatedTextArea = document.getElementById('generated-text');
    generatedTextArea.value = '';
    updateGeneratedCounts();
    const speechSynthesis = window.speechSynthesis;
    const speech = new SpeechSynthesisUtterance('You are remove Successfully!');
    speechSynthesis.speak(speech);
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
