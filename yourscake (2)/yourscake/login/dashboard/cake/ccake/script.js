const weightInput = document.getElementById("weight");
const priceMeterBar = document.getElementById("price-meter-bar");
const priceMeterValue = document.getElementById("price-meter-value");

const MIN_WEIGHT = 0;
const MAX_WEIGHT = 100;
const MIN_PRICE = 0;
const MAX_PRICE = 10000;

weightInput.addEventListener("input", function () {
  const weight = weightInput.value;
  const price = calculatePrice(weight);
  updatePriceMeter(price);
});

function calculatePrice(weight) {
  // Add your pricing logic here
  // This is just an example calculation
  const basePrice = 0.00;
  const pricePerPound = 400.0;
  return basePrice + weight * pricePerPound;
}

function updatePriceMeter(price) {
  const percent = (price - MIN_PRICE) / (MAX_PRICE - MIN_PRICE) * 100;
  const clampedPercent = clamp(percent, 0, 100);
  priceMeterBar.style.width = clampedPercent + "%";
  priceMeterValue.innerText = "₹" + price.toFixed(2);
}

function clamp(value, min, max) {
  return Math.min(Math.max(value, min), max);
}

function showImageDetails(imageSrc) {
  // Get the image details container and selected image element
  var imageDetailsContainer = document.getElementById("imageDetails");
  var selectedImageElement = document.getElementById("selectedImage");

  // Set the selected image source
  selectedImageElement.src = imageSrc;

  // Show the image details container
  imageDetailsContainer.classList.remove("hidden");
}

function cho() {
  document.getElementById('1').style.display="block";
  document.getElementById('2').style.display="none";
  document.getElementById('3').style.display="none";
  document.getElementById('4').style.display="none";
  document.getElementById('5').style.display="none";
  document.getElementById('6').style.display="none";

  document.getElementById('a').style.display="block";
  document.getElementById('b').style.display="none";
  document.getElementById('c').style.display="none";
  document.getElementById('d').style.display="none";
  document.getElementById('e').style.display="none";
  document.getElementById('f').style.display="none";
  document.getElementById('g').style.display="none";
}

function kid() {
  document.getElementById('1').style.display="none";
  document.getElementById('2').style.display="block";
  document.getElementById('3').style.display="none";
  document.getElementById('4').style.display="none";
  document.getElementById('5').style.display="none";
  document.getElementById('6').style.display="none";

  document.getElementById('a').style.display="none";
  document.getElementById('b').style.display="block";
  document.getElementById('c').style.display="none";
  document.getElementById('d').style.display="none";
  document.getElementById('e').style.display="none";
  document.getElementById('f').style.display="none";
  document.getElementById('g').style.display="none";
}

function rvl() {
  document.getElementById('1').style.display="none";
  document.getElementById('2').style.display="none";
  document.getElementById('3').style.display="block";
  document.getElementById('4').style.display="none";
  document.getElementById('5').style.display="none";
  document.getElementById('6').style.display="none";

  document.getElementById('a').style.display="none";
  document.getElementById('b').style.display="none";
  document.getElementById('c').style.display="block";
  document.getElementById('d').style.display="none";
  document.getElementById('e').style.display="none";
  document.getElementById('f').style.display="none";
  document.getElementById('g').style.display="none";
}

function mng() {
  document.getElementById('1').style.display="none";
  document.getElementById('2').style.display="none";
  document.getElementById('3').style.display="none";
  document.getElementById('4').style.display="block";
  document.getElementById('5').style.display="none";
  document.getElementById('6').style.display="none";

  document.getElementById('a').style.display="none";
  document.getElementById('b').style.display="none";
  document.getElementById('c').style.display="none";
  document.getElementById('d').style.display="block";
  document.getElementById('e').style.display="none";
  document.getElementById('f').style.display="none";
  document.getElementById('g').style.display="none";
}

function mtd() {
  document.getElementById('1').style.display="none";
  document.getElementById('2').style.display="none";
  document.getElementById('3').style.display="none";
  document.getElementById('4').style.display="none";
  document.getElementById('5').style.display="block";
  document.getElementById('6').style.display="none";

  document.getElementById('a').style.display="none";
  document.getElementById('b').style.display="none";
  document.getElementById('c').style.display="none";
  document.getElementById('d').style.display="none";
  document.getElementById('e').style.display="block";
  document.getElementById('f').style.display="none";
  document.getElementById('g').style.display="none";
}

function vlnd() {
  document.getElementById('1').style.display="none";
  document.getElementById('2').style.display="none";
  document.getElementById('3').style.display="none";
  document.getElementById('4').style.display="none";
  document.getElementById('5').style.display="none";
  document.getElementById('6').style.display="block";

  document.getElementById('a').style.display="none";
  document.getElementById('b').style.display="none";
  document.getElementById('c').style.display="none";
  document.getElementById('d').style.display="none";
  document.getElementById('e').style.display="none";
  document.getElementById('f').style.display="block";
  document.getElementById('g').style.display="none";
}