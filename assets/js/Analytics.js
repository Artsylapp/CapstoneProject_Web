// // Define an array of colors
const colors = ['#ff6b6b', '#4ecdc4', '#ffcc5c', '#3498db', '#f39c12', '#2ecc71', '#9b59b6', '#e74c3c'];

// // Select all the card elements
const cards = document.querySelectorAll('.cardData');

// // Function to shuffle the colors array
// function shuffleArray(array) {
//     for (let i = array.length - 1; i > 0; i--) {
//         const j = Math.floor(Math.random() * (i + 1));
//         [array[i], array[j]] = [array[j], array[i]]; // Swap elements
//     }
//     return array;
// }

// shuffled colored cards
// // Shuffle the colors to ensure uniqueness
// const shuffledColors = shuffleArray(colors.slice(0, cards.length)); // Limit to number of cards

// // Apply a unique color to each card
// cards.forEach((card, index) => {
//     card.style.backgroundColor = shuffledColors[index];
// });


// unshuffled colored cards
// Apply a specific color to each card based on its index
cards.forEach((card, index) => {
    card.style.backgroundColor = colors[index % colors.length]; // Loop through colors if there are more cards than colors
});
