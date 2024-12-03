<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Camera</title>
</head>

<body>

    <h1>Open Camera Example</h1>
    Open Camera
    <!-- <form id="money-scan-form" enctype="multipart/form-data"> -->
        <input type="file" accept="image/*" id="money-scanner-input" capture="camera" style="display: none;" />
        <button style="width: 250px; height:100px;" type="button" class="buttonscan" id="money-scanner-button">Scan Money</button>
    <!-- </form> -->


    <script>

        document.getElementById('money-scanner-button').addEventListener('click', function() {
            document.getElementById('money-scanner-input').click();
        });

    </script>

</body>

</html>