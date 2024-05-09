document.addEventListener('DOMContentLoaded', function() {

    var ttsh = document.querySelectorAll('.ttsh');
    var voiceList = document.querySelector('#voiceList');
    var synth = window.speechSynthesis;
    var voices = [];
    var hoverTimeout;

    if (speechSynthesis !== undefined) {
        speechSynthesis.onvoiceschanged = populateVoices; // wait for voices to be loaded before populating voice list
    } 

    ttsh.forEach((ttsh) => {
        ttsh.addEventListener('mouseenter', () => {

            // Stop any existing hover timeout
            clearTimeout(hoverTimeout);

            // Set a new hover timeout for 1 second (adjust as needed)
            hoverTimeout = setTimeout(() => {
                var selectedVoiceName = voiceList.selectedOptions[0].getAttribute('data-name');
                var type = ttsh.getAttribute('data-type');
                var desc = ttsh.getAttribute('data-desc');
                var price = ttsh.getAttribute('data-price');
                var name = ttsh.getAttribute('name');
                var textToSpeak;

                voices.forEach((voice) => {
                    if (voice.name === selectedVoiceName) {
                        if (type && desc && price) {
                            textToSpeak = type + ", " + desc + ", " + price;
                        } else {
                            textToSpeak = name;
                        }
                    }
                });

                var toSpeak = new SpeechSynthesisUtterance(textToSpeak);
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

    // List hover description tts
    function speakText() {
        var type = this.getAttribute('data-type');
        var desc = this.getAttribute('data-desc');
        var price = this.getAttribute('data-price');
        var name = this.getAttribute('name');
        var textToSpeak;
    
        if (type && desc && price) {
            textToSpeak = type + ", " + desc + ", " + price;
        } else {
            textToSpeak = name;
        }
    
        var msg = new SpeechSynthesisUtterance(textToSpeak);
        window.speechSynthesis.speak(msg);
    }
    
    var buttons = document.querySelectorAll('.btnpushable.ttsh');
    buttons.forEach(function(button) {
        button.addEventListener('mouseover', speakText);
    });

    var divs = document.querySelectorAll('.form-group.ttsh');
    divs.forEach(function(div) {
        div.addEventListener('mouseover', speakText);
    });

});