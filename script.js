// Get all carousel items
var items = document.querySelectorAll('.item');

// Function to show the next slide
function showNextSlide() {
  // Find the active slide
  var activeItem = document.querySelector('.item.active');

  // Find the index of the active slide
  var activeIndex = Array.from(items).indexOf(activeItem);

  // Move to the next slide
  items[activeIndex].classList.remove('active');
  var nextIndex = (activeIndex + 1) % items.length;
  items[nextIndex].classList.add('active');

  // Log active index
  console.log("Active index:", activeIndex, "Next index:", nextIndex);
}

// Auto play the carousel
var autoplayInterval = setInterval(showNextSlide, 3000);

// Stop autoplay on hover
document.querySelector('.slider').addEventListener('mouseenter', function() {
  clearInterval(autoplayInterval);
});

// Resume autoplay on mouse leave
document.querySelector('.slider').addEventListener('mouseleave', function() {
  autoplayInterval = setInterval(showNextSlide, 3000);
});
