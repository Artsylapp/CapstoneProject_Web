
    document.addEventListener('DOMContentLoaded', function() {
    var ttsh = document.querySelectorAll('.ttsh');
    var voiceList = document.querySelector('#voiceList');
    var synth = window.speechSynthesis;
    var voices = [];
    var hoverTimeout;

    if (speechSynthesis !== undefined) {
        speechSynthesis.onvoiceschanged = populateVoices;
    }

    ttshs.forEach((ttsh) => {
        ttsh.addEventListener('mouseenter', () => {
            // Stop any existing hover timeout
            clearTimeout(hoverTimeout);

            // Set a new hover timeout for 1 second (adjust as needed)
            hoverTimeout = setTimeout(() => {
                var toSpeak = new SpeechSynthesisUtterance(ttsh.getAttribute('name'));
                var selectedVoiceName = voiceList.selectedOptions[0].getAttribute('data-name');
                voices.forEach((voice) => {
                    if (voice.name === selectedVoiceName) {
                        toSpeak.voice = voice;
                    }
                });
                synth.speak(toSpeak);
            }, 250); // Adjust the duration as needed
        });

        // Clear the hover timeout if mouse leaves the button before the timeout
        ttsh.addEventListener('mouseleave', () => {
        clearTimeout(hoverTimeout);
        synth.cancel();
        });
    });

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
});
