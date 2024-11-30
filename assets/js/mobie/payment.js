document.addEventListener('DOMContentLoaded', function() {
  const backLink = document.getElementById('bookings-link');

  backLink.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent immediate navigation

      const message = backLink.getAttribute('data-message');
      const url = backLink.href; // Get the link's href

      speakg12(message, url); // Call the speak function with the message and URL
  });
});

function speakg12(text, url) {
    responsiveVoice.speak(text, null, {
        onend: function() {
            // Redirect after speaking finishes
            window.location.href = 'bookings.php';
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
  // Function to hide 'rvNotification' and click the 'rvButtonAllow'
  function hideNotificationAndClickButton() {
      // Hide elements with class 'rvNotification'
      const notifications = document.querySelectorAll('.rvNotification');
      notifications.forEach(function(notification) {
          notification.style.display = 'none'; // Hide the notification
      });

      // Find and automatically click the button with class 'rvButtonAllow'
      const allowButton = document.querySelector('.rvButtonAllow');
      if (allowButton) {
          allowButton.click(); // Simulate the button press
          console.log('Allow button clicked automatically.');
          clearInterval(checkForAllowButton); // Stop checking once clicked
      } else {
          console.log('Allow button not found yet, checking again...');
      }
  }

  // Periodically check for the 'rvButtonAllow' button every 500ms
  const checkForAllowButton = setInterval(hideNotificationAndClickButton, 500);
});