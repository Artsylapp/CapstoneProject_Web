
<!-- Closing tag for Body Html -->
</div>
</div>
<!-- Footer scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Populate table -->
<script src="<?php echo $this->config->base_url('assets/js/populateTable.js'); ?>"></script>

<script>
    window.addEventListener('load', () => {
        import('<?php echo $this->config->base_url('assets/js/exportPDF.js') ?>')
            .catch(console.error);
    });
</script>

</body>

</html>