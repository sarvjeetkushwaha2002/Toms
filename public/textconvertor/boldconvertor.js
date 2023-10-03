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
    const boldFont = text.split('').map(char => getBoldChar(char)).join('');

    return boldFont;
}

function getBoldChar(char) {
    const fontboldMap = {
        '1': '𝟭',
        '2': '𝟮',
        '3': '𝟯',
        '4': '𝟰',
        '5': '𝟱',
        '6': '𝟲',
        '7': '𝟳',
        '8': '𝟴',
        '9': '𝟵',
        '0': '𝟬',
        'a': '𝗮',
        'b': '𝗯',
        'c': '𝗰',
        'd': '𝗱',
        'e': '𝗲',
        'f': '𝗳',
        'g': '𝗴',
        'h': '𝗵',
        'i': '𝗶',
        'j': '𝗷',
        'k': '𝗸',
        'l': '𝗹',
        'm': '𝗺',
        'n': '𝗻',
        'o': '𝗼',
        'p': '𝗽',
        'q': '𝗾',
        'r': '𝗿',
        's': '𝘀',
        't': '𝘁',
        'u': '𝘂',
        'v': '𝘃',
        'w': '𝘄',
        'x': '𝘅',
        'y': '𝘆',
        'z': '𝘇',
        'A': '𝗔',
        'B': '𝗕',
        'C': '𝗖',
        'D': '𝗗',
        'E': '𝗘',
        'F': '𝗙',
        'G': '𝗚',
        'H': '𝗛',
        'I': '𝗜',
        'J': '𝗝',
        'K': '𝗞',
        'L': '𝗟',
        'M': '𝗠',
        'N': '𝗡',
        'O': '𝗢',
        'P': '𝗣',
        'Q': '𝗤',
        'R': '𝗥',
        'S': '𝗦',
        'T': '𝗧',
        'U': '𝗨',
        'V': '𝗩',
        'W': '𝗪',
        'X': '𝗫',
        'Y': '𝗬',
        'Z': '𝗭',
    };

    return fontboldMap[char] || char;
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
