const textarea = document.getElementById('full-editor');

function updateCounts() {
    const wordCountSpan = document.getElementById('word-count');
    const characterCountSpan = document.getElementById('character-count');
    const lineCountSpan = document.getElementById('line-count');

    const text = textarea.innerText;

    // Word count
    const words = text.split(/\s+/).filter(word => word.length > 0);
    wordCountSpan.textContent = words.length;

    // Character count
    characterCountSpan.textContent = text.length;

    // Line count
    const lines = text.split(/\r\n|\r|\n/).filter(line => line.length > 0);
    lineCountSpan.textContent = lines.length;
}
//Copy Text Start
function copyToClipboard() {
    const textarea = document.getElementById('full-editor');
    const selectedText = textarea.innerText.substring(textarea.selectionStart, textarea.selectionEnd);
    const textToCopy = selectedText.length > 0 ? selectedText : textarea.innerText;

    copyTextToClipboard(textToCopy);
}

function copyTextToClipboard(text) {
    const dummyInput = document.createElement('textarea');
    dummyInput.style.position = 'absolute';
    dummyInput.style.left = '-9999px';
    dummyInput.textContent = text;
    document.body.appendChild(dummyInput);
    dummyInput.select();
    document.execCommand('copy');
    document.body.removeChild(dummyInput);
    const speechSynthesis = window.speechSynthesis;
    const speech = new SpeechSynthesisUtterance('You are Copy Successfully!');
    speechSynthesis.speak(speech);
}
//Copy Text End

//Clear Text Start
function clearText() {
    const selection = window.getSelection();

    if (selection.toString().length > 0) {
        document.execCommand('delete');
    } else {
        textarea.innerText = '';
    }
    updateCounts();
    const speechSynthesis = window.speechSynthesis;
    const speech = new SpeechSynthesisUtterance('You are remove Successfully!');
    speechSynthesis.speak(speech);
}

// Case TEXT Type Start
const lowerCaseButton = document.getElementById('lower-case-button');
const upperCaseButton = document.getElementById('upper-case-button');
const caseSensitiveButton = document.getElementById('title-case-button');
const inverseCaseButton = document.getElementById('inverse-case-button');
const capitalizeCaseButton = document.getElementById('capitalize-case-button');
const alternatingCaseButton = document.getElementById('alternating-case-button');
const downloadDocButton = document.getElementById('download-doc-button');

lowerCaseButton.addEventListener('click', () => transformText('lower'));
upperCaseButton.addEventListener('click', () => transformText('upper'));
caseSensitiveButton.addEventListener('click', () => transformText('title'));
inverseCaseButton.addEventListener('click', () => transformText('inverse'));
capitalizeCaseButton.addEventListener('click', () => transformText('capitalize'));
alternatingCaseButton.addEventListener('click', () => transformText('alternating'));

downloadDocButton.addEventListener('click', () => {
    downloadDoc();
});

function downloadDoc() {
    const content = textarea.innerText;
    const docBlob = new Blob([content], {
        type: 'application/msword'
    });
    const url = URL.createObjectURL(docBlob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'content.doc';
    a.click();
    URL.revokeObjectURL(url);
    const speechSynthesis = window.speechSynthesis;
    const speech = new SpeechSynthesisUtterance('You are download Successfully!');
    speechSynthesis.speak(speech);
}

function transformText(type) {
    const selectedText = getSelectedText();
    let newText = selectedText || textarea.innerText;

    switch (type) {
        case 'lower':
            newText = newText.toLowerCase();
            break;
        case 'upper':
            newText = newText.toUpperCase();
            break;
        case 'title':
            newText = titleCase(newText);
            break;
        case 'inverse':
            newText = inverseCase(newText);
            break;
        case 'capitalize':
            newText = capitalizeCase(newText);
            break;
        case 'alternating':
            newText = alternatingCase(newText);
            break;
    }

    if (selectedText) {
        document.execCommand('insertText', false, newText);
    } else {
        textarea.innerText = newText;
    }
    const speechSynthesis = window.speechSynthesis;
    const speech = new SpeechSynthesisUtterance('You are convert case Successfully!');
    speechSynthesis.speak(speech);
}

function titleCase(text) {
    return text.replace(/\w\S*/g, (word) => {
        return word.charAt(0).toUpperCase() + word.substr(1).toLowerCase();
    });
}

function inverseCase(text) {
    return text.split('').map(char => {
        return char === char.toUpperCase() ? char.toLowerCase() : char.toUpperCase();
    }).join('');
}

function capitalizeCase(text) {
    return text.replace(/\b\w/g, char => char.toUpperCase());
}

function alternatingCase(text) {
    return text.split('').map((char, index) => {
        return index % 2 === 0 ? char.toUpperCase() : char.toLowerCase();
    }).join('');
}

function getSelectedText() {
    return window.getSelection().toString();
}

// Case TEXT Type End