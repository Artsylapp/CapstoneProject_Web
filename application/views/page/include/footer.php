<!-- Closing tag for Header Html -->
    </div>
</div>
        <!-- Footer script JQeury -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Custom JS File to populate table -->
        <script src="<?php echo $this->config->base_url('assets/js/populateTable.js'); ?>"></script>

        <!-- Script for browser size -->
        <script>
            (function() {
                async function updateSize() {
                    const width = await getWidth();
                    const height = await getHeight();
                    console.log("Width: " + width + " Height: " + height);
                }

                async function getWidth() {
                    return window.innerWidth;
                }

                async function getHeight() {
                    return window.innerHeight;
                }

                // Initial call to display the current size
                updateSize();

                // Update the size and log it whenever the window is resized
                window.addEventListener('resize', updateSize);
            })();
        </script>
        
    </body>
</html>