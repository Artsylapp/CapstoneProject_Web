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
                var data1 = ttsh.getAttribute('data1');
                var data2 = ttsh.getAttribute('data2');
                var data3 = ttsh.getAttribute('data3');
                var data4 = ttsh.getAttribute('data4');
                var name = ttsh.getAttribute('name');
                var textToSpeak;

                voices.forEach((voice) => {
                    if (voice.name === selectedVoiceName) {
                        if (data1 && data2 && data3) {
                            textToSpeak = data1 + ", " + data2 + ", " + data3;
                        } else if (data1 && data2 && data3 && data4) {
                            textToSpeak = data1 + ", " + data2 + ", " + data3 + ", " + data4;
                        } else {
                            textToSpeak = name;
                        }
                    }
                });

                var toSpeak = new SpeechSynthesisUtterance(textToSpeak);
                synth.speak(toSpeak);
            }, 500); // Adjust the duration as needed
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

    // List hover data2ription tts
    function speakText() {
        var data1 = this.getAttribute('data1');
        var data2 = this.getAttribute('data2');
        var data3 = this.getAttribute('data3');
        var data4 = this.getAttribute('data4');
        var name = this.getAttribute('name');
        var textToSpeak;
    
        if (data1 && data2 && data3) {
            textToSpeak = data1 + ", " + data2 + ", " + data3;
        } else if (data1 && data2 && data3 && data4) {
            textToSpeak = data1 + ", " + data2 + ", " + data3 + ", " + data4;
        } else {
            textToSpeak = name;
        }
    
        var msg = new SpeechSynthesisUtterance(textToSpeak);
        window.speechSynthesis.speak(msg);
    }
    
    var buttons = document.querySelectorAll('.btnpushable.ttsh');
    buttons.forEach(function(button) {
        console.log("TALK 2");
        button.addEventListener('mouseover', speakText);
    });

    var divs = document.querySelectorAll('.form-group.ttsh');
    divs.forEach(function(div) {
        console.log("TALK 3");
        div.addEventListener('mouseover', speakText);
    });

});