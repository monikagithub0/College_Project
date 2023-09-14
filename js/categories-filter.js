function filterObjects(categoryBtn, category) {
    currentCategory = category;
    visibleBoxes = 4; // Reset visibleBoxes when changing categories

    boxes.forEach(box => {
        const categories = box.getAttribute('data-categories').split(' ');
        if (category === 'All' || categories.includes(category)) {
            box.style.display = 'inline-block';
        } else {
            box.style.display = 'none';
        }
    });

    const categoryButtons = document.querySelectorAll('.category-btn');
    categoryButtons.forEach(button => {
        button.classList.remove('active');
    });

    categoryBtn.classList.add('active');

}

