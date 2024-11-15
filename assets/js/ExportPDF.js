

document.getElementById('exportPDF').addEventListener('click', () => {
    const chartImage = exportChartAsImage('ChartAnalysis'); // ID of the chart's canvas element
    // console.log('chartimage retrived')
    const revenueImage = exportChartAsImage('RevenueChart'); // For another chart if needed
    // console.log('chartimage retrived')

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('p', 'pt', 'a4');

    // chart
    if (chartImage) {
        // Get the width of the text 'Records Report'
        const title = 'Chart Report';
        const titleWidth = doc.getTextWidth(title);
        
        // Calculate the X position to center the text
        const pageWidth = doc.internal.pageSize.width;
        const xPosition = (pageWidth - titleWidth) / 2;

        // Set the Y position for the title
        const yPosition = 60; // Adjust as necessary

        // Add centered title to the PDF
        doc.text(title, xPosition, yPosition);

        // Add the chart (image) to the PDF
        doc.addImage(chartImage, 'JPEG', 40, 80, 500, 300);

        // Optionally add another chart
        // if (revenueImage) {
        //     doc.addPage(); // adds new page for the next chart
        //     doc.text('Revenue Analytics', xPosition, yPosition);
        //     doc.addImage(revenueImage, 'JPEG', 40, 80, 500, 300);
        // }



        // Records Table
        // create hidden table if not exist
        if (!document.getElementById('pdf-table')) { // Check if the table with id 'my-table' already exists 
            const table = document.createElement('table'); // Create a table element
            table.id = 'pdf-table';
            table.style.display = 'none';
            document.body.appendChild(table);
        }

        doc.autoTable({ html: '#pdf-table' }); // Add the table to the PDF

        // Fetch the data from the controller
        fetch('records/pdf') // Controller URL
        .then(response => response.text()) // Log the raw response for debugging
        .then(data => {
            // console.log("Raw response data:", data); // Log the raw response

            try {
                const orders = JSON.parse(data); // Parse the JSON response
                console.log("Parsed orders:", orders);

                const title = 'Table Report';
                let xPosition = (pageWidth - titleWidth) / 2;
                let yPosition = 420; // Start position for the records text
                doc.text(title, xPosition, yPosition);

                // Create a table dynamically using autoTable
                doc.autoTable({

                    theme: 'grid', // 'striped', 'grid', 'plain', 'css', 'grid' (default)
                    head: [['Record ID', 'Status', 'Services', 'Total Amount', 'Date']],
                    body: orders.map(order => {

                        // breaking down services details
                        let serviceDetails = ''; // Initialize the services details for storing the formatted data
                        for (const [key, service] of Object.entries(order.services)) {
                            serviceDetails += `Type: ${key} - ${service.type}\n`;
                            serviceDetails += `Quantity: ${service.amount}\n`;
                            serviceDetails += `Price: ${service.price}\n\n`;
                        }

                        // Return the row data
                        return [
                            order.order_id,           // Record ID
                            order.status,             // Status
                            serviceDetails.trim(),    // Detailed Services
                            order.total_cost,         // Amount
                            order.date                // Date
                        ];
                    }),
                    startY: yPosition + 20, // Adjust position below the title
                    styles: { cellWidth: 'wrap' }, // Allow content to wrap within cells
                    columnStyles: {
                        2: { cellWidth: 200 } // Adjust width for the services column if needed
                    }
                });


                // Save the PDF after adding the data
                doc.save('RecordsReport.pdf');

            } catch (error) {
                console.error("Failed to process the PDF:\n", error);
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