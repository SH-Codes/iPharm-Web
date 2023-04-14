const basketBtn = document.getElementById("basket");
const wishlistBtn = document.getElementById("wishlist");
const product = {name: "Product Name", price: 19.99}; // replace with your product details

basketBtn.addEventListener("click", () => {
  addToBasket(product);
});

wishlistBtn.addEventListener("click", () => {
  addToWishlist(product);
});

function addToBasket(product) {
    // check if product already exists in basket, if yes, update the quantity
    let basket = JSON.parse(localStorage.getItem("basket")) || [];
    let existingProductIndex = basket.findIndex(item => item.name === product.name);
    if (existingProductIndex !== -1) {
      basket[existingProductIndex].quantity += 1;
    } else {
      // if product does not exist, add it to basket with quantity of 1
      product.quantity = 1;
      basket.push(product);
    }
    localStorage.setItem("basket", JSON.stringify(basket));
  }
  
  function addToWishlist(product) {
    // check if product already exists in wishlist, if not, add it
    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
    let existingProductIndex = wishlist.findIndex(item => item.name === product.name);
    if (existingProductIndex === -1) {
      wishlist.push(product);
      localStorage.setItem("wishlist", JSON.stringify(wishlist));
    }
  }
  