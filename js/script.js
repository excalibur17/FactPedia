document.addEventListener('DOMContentLoaded', function () {
    const articleList = document.getElementById('article-list');

    // Fetch and load articles dynamically if needed

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
