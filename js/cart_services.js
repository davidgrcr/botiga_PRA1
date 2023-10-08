const CART_SERVICES_URL = 'http://localhost/api/cart/';

const GET_PRODUCTS_FROM_CART_URL = CART_SERVICES_URL + 'getProducts.php';
const ADD_TO_CART_URL = CART_SERVICES_URL + 'addProduct.php';
const REMOVE_PRODUCT_FROM_CART_URL = CART_SERVICES_URL + 'removeProduct.php';
const UPDATE_PRODUCT_QUANTITY_URL = CART_SERVICES_URL + 'updateProductQuantity.php';
const CONFIRM_CHECKOUT_URL = CART_SERVICES_URL + 'confirmCart.php';

function fetchFromCart(url, method, body = null, signal = null) {
    return fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json'
        },
        body: body ? JSON.stringify(body) : null,
        signal: signal
    })
    .then(response => response.json())
    .then(data => data)
    .catch((error) => {
        console.error('Error:', error);        
    });
}

function getProductsFormCart(signal) {
    return fetchFromCart(GET_PRODUCTS_FROM_CART_URL, 'GET', null, signal);
}

function addToCart(productId, quantity) {
    return fetchFromCart(ADD_TO_CART_URL, 'POST', { product_id: productId, quantity: quantity });
}

function removeProductFromCart(productId) {
    return fetchFromCart(REMOVE_PRODUCT_FROM_CART_URL, 'POST', { product_id: productId });
}

function updateProductQuantity(productId, quantity, signal) {
    return fetchFromCart(UPDATE_PRODUCT_QUANTITY_URL, 'POST', { product_id: productId, quantity:+quantity }, signal);
}

function confirmCheckout({ name,
    email,
    address,
    password,
    user_type}) {
    return fetchFromCart(CONFIRM_CHECKOUT_URL, 'POST', { name,
        email,
        address,
        password,
        user_type});
}