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

// nav background
let header = document.querySelector("header");

window.addEventListener("scroll", () => {
    header.classList.toggle("shadow", window.scrollY > 0)
})

//Filter
$(document).ready(function () {
    $(".filter-item").click(function () {
        const value = $(this).attr("data-filter");
        if (value == "all"){
            $(".post-box").show("1000")
        } else{
            $(".post-box")
                .not("." + value)
                .hide(1000);
            $(".post-box")
            .filter("." + value)
            .show("1000")
        }
    });
    $(".filter-item").click(function () {
        $(this).addClass("active-filter").siblings().removeClass("active-filter")
    });
});



function openModal(element) {
    var modal = document.getElementById("myModal");
    var modalImg = modal.querySelector(".modal-img");
    var modalCategory = modal.querySelector(".category");
    var modalTitle = modal.querySelector(".modal-title");
    var modalDate = modal.querySelector(".modal-date");
    var modalDescription = modal.querySelector(".modal-description");
    var modalAuthor = modal.querySelector(".modal-author");

    modalImg.src = element.getAttribute("data-image");
    modalCategory.textContent = element.getAttribute("data-category");
    modalTitle.textContent = element.getAttribute("data-title");
    modalDate.textContent = element.getAttribute("data-date");
    modalDescription.textContent = element.getAttribute("data-description");
    modalAuthor.textContent = element.getAttribute("data-author");

    modal.style.display = "block";
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

// Menutup modal ketika pengguna mengklik di luar modal
window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
