// // Define an array of colors
const colors = ['#ff6b6b', '#4ecdc4', '#ffcc5c', '#3498db', '#f39c12', '#2ecc71', '#9b59b6', '#e74c3c'];

// // Select all the card elements
const cards = document.querySelectorAll('.cardData');

// unshuffled colored cards
// Apply a specific color to each card based on its index
cards.forEach((card, index) => {
    card.style.backgroundColor = colors[index % colors.length]; // Loop through colors if there are more cards than colors
});

