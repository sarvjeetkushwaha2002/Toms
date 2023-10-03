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
    const italicFont = text.split('').map(char => getItalicChar(char)).join('');

    return italicFont;
}

function getItalicChar(char) {
    const fontitalicMap = {
        'a': '𝘢',
        'b': '𝘣',
        'c': '𝘤',
        'd': '𝘥',
        'e': '𝘦',
        'f': '𝘧',
        'g': '𝘨',
        'h': '𝘩',
        'i': '𝘪',
        'j': '𝘫',
        'k': '𝘬',
        'l': '𝘭',
        'm': '𝘮',
        'n': '𝘯',
        'o': '𝘰',
        'p': '𝘱',
        'q': '𝘲',
        'r': '𝘳',
        's': '𝘴',
        't': '𝘵',
        'u': '𝘶',
        'v': '𝘷',
        'w': '𝘸',
        'x': '𝘹',
        'y': '𝘺',
        'z': '𝘻',
        'A': '𝘈',
        'B': '𝘉',
        'C': '𝘊',
        'D': '𝘋',
        'E': '𝘌',
        'F': '𝘍',
        'G': '𝘎',
        'H': '𝘏',
        'I': '𝘐',
        'J': '𝘑',
        'K': '𝘒',
        'L': '𝘓',
        'M': '𝘔',
        'N': '𝘕',
        'O': '𝘖',
        'P': '𝘗',
        'Q': '𝘘',
        'R': '𝘙',
        'S': '𝘚',
        'T': '𝘛',
        'U': '𝘜',
        'V': '𝘝',
        'W': '𝘞',
        'X': '𝘟',
        'Y': '𝘠',
        'Z': '𝘡',
    };

    return fontitalicMap[char] || char;
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
