
document.getElementById('exportPDF').addEventListener('click', () => {
    try {
        // Access jsPDF from the global window object
        // const { jsPDF } = window.jspdf;
        window.jsPDF = window.jspdf.jsPDF // for backwards compatibility

        const doc = new jsPDF();

        doc.text("Hello world!", 10, 10);
        doc.save("Records.pdf");
        
    } catch (error) {
        console.error("Error creating PDF:", error.message);
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