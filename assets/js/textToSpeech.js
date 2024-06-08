document.addEventListener('DOMContentLoaded', function() {
    var ttsh = document.querySelectorAll('.ttsh');
    var voiceList = document.querySelector('#voiceList');
    var synth = window.speechSynthesis;
    var voices = [];
    var hoverTimeout;

    function populateVoices() {
        voices = synth.getVoices();
        var selectedIndex = voiceList.selectedIndex < 0 ? 0 : voiceList.selectedIndex;
        voiceList.innerHTML = '';
        voices.forEach((voice) => {
            var listItem = document.createElement('option');
            listItem.textContent = voice.name;
            listItem.setAttribute('data-lang', voice.lang);
            listItem.setAttribute('data-name', voice.name);
            voiceList.appendChild(listItem);
        });
        voiceList.selectedIndex = selectedIndex;
    }

    if (speechSynthesis !== undefined) {
        speechSynthesis.onvoiceschanged = populateVoices;
    }

    function speakText(ttshElement) {
        var selectedVoiceName = voiceList.selectedOptions[0].getAttribute('data-name');
        var data1 = ttshElement.getAttribute('data1');
        var data2 = ttshElement.getAttribute('data2');
        var data3 = ttshElement.getAttribute('data3');
        var data4 = ttshElement.getAttribute('data4');
        var name = ttshElement.getAttribute('name');
        var textToSpeak;

        if (data1 && data2 && data3 && data4) {
            textToSpeak = `${data1}, ${data2}, ${data3}, ${data4}`;
        } else if (data1 && data2 && data3) {
            textToSpeak = `${data1}, ${data2}, ${data3}`;
        } else {
            textToSpeak = name;
        }

        var toSpeak = new SpeechSynthesisUtterance(textToSpeak);
        voices.forEach((voice) => {
            if (voice.name === selectedVoiceName) {
                toSpeak.voice = voice;
            }
        });

        synth.speak(toSpeak);
    }

    ttsh.forEach((ttsh) => {
        ttsh.addEventListener('mouseenter', () => {
            clearTimeout(hoverTimeout);
            hoverTimeout = setTimeout(() => {
                speakText(ttsh);
            }, 500); // Adjust the duration as needed
        });

        ttsh.addEventListener('mouseleave', () => {
            clearTimeout(hoverTimeout);
            synth.cancel();
        });
    });

    // Ensure voices are populated on load
    populateVoices();
});
