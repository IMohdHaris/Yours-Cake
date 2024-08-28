/* Flavours Start */

function van(){
    var flav = document.getElementsByClassName("layer");

    for(var i=0;i<flav.length;i++){
        flav[i].style.backgroundColor="#f3e5ab";
    }

}

function cho(){
    var flav = document.getElementsByClassName("layer");

    for(var i=0;i<flav.length;i++){
        flav[i].style.backgroundColor="#291c07";
    }
}

function straw(){
    var flav = document.getElementsByClassName("layer");

    for(var i=0;i<flav.length;i++){
        flav[i].style.backgroundColor="#fc5a8d";
    }
}

/* Flavours End */

/* Topping Start */

function cream(){
    var flav = document.getElementsByClassName("drips");

    for(var i=0;i<flav.length;i++){
        flav[i].style.backgroundColor="#ffffff";
    }
}

function choco(){
    var flav = document.getElementsByClassName("drips");

    for(var i=0;i<flav.length;i++){
        flav[i].style.backgroundColor="#291c07";
    }
}

function cand(){
    var flav = document.getElementsByClassName("drips");

    for(var i=0;i<flav.length;i++){
        flav[i].style.backgroundColor="#ff9b87";
    }
}

/* Topping End */

/* plate start */

function cr(){
    document.getElementById("plate").style.borderRadius="100px";
}

function sq(){
    document.getElementById("plate").style.borderRadius="5px";
}

function bl(){
    document.getElementById("plate").style.backgroundColor="black";
}

function wh(){
    document.getElementById("plate").style.backgroundColor="white";
}

/* plate End */


/* Candle Start */
function brwn(){
    document.getElementById("mydiv").style.backgroundColor="#291c07";
}

function pnk(){
    document.getElementById("mydiv").style.backgroundColor="pink";
}

function ble(){
    document.getElementById("mydiv").style.backgroundColor="blue";
}
/* Candle End */


const weightInput = document.getElementById("weight");
const priceMeterBar = document.getElementById("price-meter-bar");
const priceMeterValue = document.getElementById("price-meter-value");

const MIN_WEIGHT = 0;
const MAX_WEIGHT = 100;
const MIN_PRICE = 0;
const MAX_PRICE = 10000;

weightInput.addEventListener("input", function() {
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
