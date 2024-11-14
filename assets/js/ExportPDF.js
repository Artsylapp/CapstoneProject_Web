
import { exportChartAsImage } from './ChartAnalytics.js';

document.getElementById('exportPDF').addEventListener('click', () => {
    const chartImage = exportChartAsImage('ChartAnalysis'); // ID of the chart's canvas element
    console.log('chartimage retrived')
    const revenueImage = exportChartAsImage('RevenueChart'); // For another chart if needed
    console.log('chartimage retrived')

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('p', 'pt', 'a4');
    if (chartImage) {
        // Get the width of the text 'Records Report'
        const title = 'Records Report';
        const titleWidth = doc.getTextWidth(title);
        
        // Calculate the X position to center the text
        const pageWidth = doc.internal.pageSize.width;
        const xPosition = (pageWidth - titleWidth) / 2;

        // Set the Y position for the title
        const yPosition = 65; // Adjust as necessary

        // Add centered title to the PDF
        doc.text(title, xPosition, yPosition);

        // Add the chart (image) to the PDF
        doc.addImage(chartImage, 'JPEG', 40, 80, 500, 300);

        // Optionally add another chart
        // if (revenueImage) {
        //     doc.addPage();
        //     doc.text('Revenue Analytics', xPosition, yPosition);
        //     doc.addImage(revenueImage, 'JPEG', 40, 80, 500, 300);
        // }

        // Text Record report
        // Fetch the data from the controller using AJAX
        fetch('records/pdf')  // Ensure this is the correct URL
        .then(response => response.text())  // Log the raw response for debugging
        .then(data => {
            console.log("Raw response data:", data);  // Log the raw response

            try {
                const orders = JSON.parse(data);  // Manually parse the response if it's valid JSON
                console.log("Parsed orders:", orders);

                let yPosition = 400; // Start position for the records text
                doc.text('Order Records:', 40, yPosition);

                // Loop through the orders and add them to the PDF
                orders.forEach((order, index) => {
                    yPosition += 20; // Increase the Y position for each order
                    doc.text(`${index + 1}. Order ID: ${order.id}, Date: ${order.date}`, 40, yPosition);
                });

                // Save the PDF after adding the data
                // doc.save('RecordsReport.pdf');
            } catch (error) {
                console.error("Failed to parse orders data:", error);
            }
        })
        .catch(error => {
            console.error("Failed to fetch orders data:", error);
        });

    } else {
        console.error("Failed to export chart image.");
    }
});




// Script for browser window size
// (function() {
//     async function updateSize() {
//         const width = await getWidth();
//         const height = await getHeight();
//         console.log("Width: " + width + " Height: " + height);
//     }

//     async function getWidth() {
//         return window.innerWidth;
//     }

//     async function getHeight() {
//         return window.innerHeight;
//     }

//     // Initial call to display the current size
//     updateSize();

//     // Update the size and log it whenever the window is resized
//     window.addEventListener('resize', updateSize);
// })();