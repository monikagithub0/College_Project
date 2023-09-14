let visibleBoxes = 4;
const boxes = document.querySelectorAll('.box');
let currentCategory = 'All'; // Initialize with 'All'

function showMoreItems() {
  const visibleCategoryBoxes = Array.from(boxes).filter((box) => {
    const categories = box.getAttribute("data-categories").split(" ");
    return currentCategory === "All" || categories.includes(currentCategory);
  });

  for (let i = visibleBoxes; i < visibleBoxes + 4 && i < visibleCategoryBoxes.length; i++) {
    visibleCategoryBoxes[i].style.display = 'inline-block';
  }
  visibleBoxes += 4;

  if (visibleBoxes >= visibleCategoryBoxes.length) {
    document.getElementById('load-more').style.display = 'none';
  }
}
showMoreItems();


