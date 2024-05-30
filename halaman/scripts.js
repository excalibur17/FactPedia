document.addEventListener('DOMContentLoaded', function () {
    const openFormButton = document.getElementById('open-form-btn');
    const closeFormButton = document.getElementById('close-form-btn');
    const articleFormSection = document.getElementById('article-form-section');
    const articleForm = document.getElementById('article-form');
    const articleList = document.getElementById('article-list');

    // Event listener to open the article submission form
    openFormButton.addEventListener('click', function () {
        articleFormSection.style.display = 'block';
    });

    // Event listener to close the article submission form
    closeFormButton.addEventListener('click', function () {
        articleFormSection.style.display = 'none';
    });

    // Event listener for form submission
    articleForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        // You can perform form validation here if needed
        
        // Example: Fetch POST request to submit the article data
        fetch('submit_article.php', {
            method: 'POST',
            body: new FormData(articleForm)
        })
        .then(response => {
            if (response.ok) {
                // Article submitted successfully, you can handle the response accordingly
                return response.json(); // Assuming the server returns JSON
            } else {
                throw new Error('Failed to submit article');
            }
        })
        .then(data => {
            // Handle the response data if needed
            console.log(data);
            // For example, you can add the new article to the list
            const newArticle = createArticleElement(data); // Assuming data contains the new article information
            articleList.appendChild(newArticle);
            // Clear the form after successful submission
            articleForm.reset();
            // Hide the form after submission
            articleFormSection.style.display = 'none';
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle errors, show error message to user, etc.
        });
    });

    // Function to create article element
    function createArticleElement(articleData) {
        const articleItem = document.createElement('div');
        articleItem.classList.add('article-item');
        
        const titleElement = document.createElement('h3');
        titleElement.textContent = articleData.title;

        const contentElement = document.createElement('p');
        contentElement.textContent = articleData.content;

        // If the articleData contains an image URL, add the image element
        if (articleData.image) {
            const imageElement = document.createElement('img');
            imageElement.src = articleData.image;
            imageElement.alt = articleData.title;
            articleItem.appendChild(imageElement);
        }

        articleItem.appendChild(titleElement);
        articleItem.appendChild(contentElement);

        return articleItem;
    }
});
