const cardsPerPage = 4; // Number of cards to show per page 
const dataContainer = document.getElementById('data-container');
const pagination = document.getElementById('pagination');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');
const pageNumbers = document.getElementById('page-numbers');

const cards = Array.from(dataContainer.getElementsByClassName('card'));
const totalPages = Math.ceil(cards.length / cardsPerPage);
let currentPage = 1;

// Function to generate page links dynamically
function generatePageLinks() {
    pageNumbers.innerHTML = ''; // Clear existing page links
    for (let i = 1; i <= totalPages; i++) {
        const link = document.createElement('a');
        link.href = '#';
        link.textContent = i;
        link.classList.add('page-link');
        link.setAttribute('data-page', i);
        pageNumbers.appendChild(link);
    }
}

// Function to display cards for the current page
function displayPage(page) {
    if (page < 1) {
        page = 1; // Ensure the page is not less than 1
    }
    const startIndex = (page - 1) * cardsPerPage;
    const endIndex = startIndex + cardsPerPage;
    cards.forEach((card, index) => {
        if (index >= startIndex && index < endIndex) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Function to update pagination buttons and page numbers
function updatePagination() {
    pageNumbers.textContent = `Page ${currentPage} of ${totalPages}`;
    prevButton.disabled = currentPage === 1;
    nextButton.disabled = currentPage === totalPages;
    pageLinks.forEach((link) => {
        const page = parseInt(link.getAttribute('data-page'));
        link.classList.toggle('active', page === currentPage);
    });
}

// Update the pageLinks variable after dynamically creating the page links
let pageLinks;

function updatePageLinks() {
    pageLinks = document.querySelectorAll('.page-link');
    pageLinks.forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const page = parseInt(link.getAttribute('data-page'));
            if (page !== currentPage) {
                currentPage = page;
                displayPage(currentPage);
                updatePagination();
            }
        });
    });
}

prevButton.addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        displayPage(currentPage);
        updatePagination();
    } else {
        currentPage = 1;
        displayPage(currentPage);
        updatePagination();
    }
});

nextButton.addEventListener('click', () => {
    if (currentPage < totalPages) {
        currentPage++;
        displayPage(currentPage);
        updatePagination();
    }
});

// Initialize the page links and update pagination
generatePageLinks();
updatePageLinks();
displayPage(currentPage);
updatePagination();