
// Function to remove flash messages after 10 seconds on login_page.php
$(document).ready(function(){
    // Set timeout to remove flash messages after 10 seconds
    setTimeout(function(){
        $('.alert').fadeOut('slow', function(){
            $(this).remove();
        });
    }, 10000);
});