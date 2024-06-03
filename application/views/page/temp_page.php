
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@3.12.0/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>

<div class="row mt-s center-item">
			
	<div class="col-sm-11 col-xs-11 box-white">

        <div>
            <video id="webcam" width="640" height="480" autoplay></video>
            <canvas id="output" width="640" height="480"></canvas>
        </div>
        
        <script>
            async function runObjectDetection() {
                const video = document.getElementById('webcam');
                const outputCanvas = document.getElementById('output');
                const ctx = outputCanvas.getContext('2d');

                // Load the COCO-SSD model
                const model = await cocoSsd.load();

                async function detectFrame() {
                    const predictions = await model.detect(video);
                    ctx.clearRect(0, 0, outputCanvas.width, outputCanvas.height);
                    
                    // Draw bounding boxes and labels
                    predictions.forEach(prediction => {
                        ctx.beginPath();
                        ctx.rect(...prediction.bbox);
                        ctx.lineWidth = 2;
                        ctx.strokeStyle = 'red';
                        ctx.fillStyle = 'red';
                        ctx.stroke();
                        ctx.fillText(`${prediction.class}: ${prediction.score.toFixed(2)}`, prediction.bbox[0], prediction.bbox[1] > 10 ? prediction.bbox[1] - 5 : 10);
                    });

                    requestAnimationFrame(detectFrame);
                }

                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                    video.srcObject = stream;
                    await video.play();
                    detectFrame();
                }
            }

            runObjectDetection();
        </script>

    </div>

</div>
