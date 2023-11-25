const CART_SERVICES_URL = "http://localhost/apiCart/";

const GET_PRODUCTS_FROM_CART_URL = CART_SERVICES_URL + "getCart";
const ADD_TO_CART_URL = CART_SERVICES_URL + "addToCart";
const REMOVE_PRODUCT_FROM_CART_URL = CART_SERVICES_URL + "removeItem";
const UPDATE_PRODUCT_QUANTITY_URL = CART_SERVICES_URL + "updateQuantity";
const CONFIRM_CHECKOUT_URL = CART_SERVICES_URL + "confirmCheckout";

function fetchFromCart(url, method, body = null, signal = null) {
  return fetch(url, {
    method: method,
    headers: {
      "Content-Type": "application/json",
    },
    body: body ? JSON.stringify(body) : null,
    signal: signal,
  })
    .then((response) => {
      if(!response.ok) {
        throw Error(response.statusText);
      }
      return response.json();
    })
    .then((data) => data);
}

function getProductsFormCart(signal) {
  return fetchFromCart(GET_PRODUCTS_FROM_CART_URL, "GET", null, signal);
}

function addToCart(productId, quantity) {
  return fetchFromCart(ADD_TO_CART_URL, "POST", {
    product_id: productId,
    quantity: quantity,
  });
}

function removeProductFromCart(productId) {
  return fetchFromCart(REMOVE_PRODUCT_FROM_CART_URL, "POST", {
    product_id: productId,
  });
}

function updateProductQuantity(productId, quantity, signal) {
  return fetchFromCart(
    UPDATE_PRODUCT_QUANTITY_URL,
    "POST",
    { product_id: productId, quantity: +quantity },
    signal
  );
}

function confirmCheckout({ name, email, address, password, user_type }) {
  return fetchFromCart(CONFIRM_CHECKOUT_URL, "POST", {
    name,
    email,
    address,
    password,
    user_type,
  });
}
