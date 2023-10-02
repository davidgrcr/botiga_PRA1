const CART_SERVICES_URL = 'http://localhost/api/cart/';

const GET_PRODUCTS_FROM_CART_URL = CART_SERVICES_URL + 'getProducts.php';
const ADD_TO_CART_URL = CART_SERVICES_URL + 'addProduct.php';
const REMOVE_PRODUCT_FROM_CART_URL = CART_SERVICES_URL + 'removeProduct.php';

function fetchFromCart(url, method, body = null) {
    return fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json'
        },
        body: body ? JSON.stringify(body) : null
    })
    .then(response => response.json())
    .then(data => data)
    .catch((error) => {
        console.error('Error:', error);
    });
}

function getProductsFormCart() {
    return fetchFromCart(GET_PRODUCTS_FROM_CART_URL, 'GET');
}

function addToCart(productId, quantity) {
    return fetchFromCart(ADD_TO_CART_URL, 'POST', { product_id: productId, quantity: quantity });
}

function removeProductFromCart(productId) {
    return fetchFromCart(REMOVE_PRODUCT_FROM_CART_URL, 'POST', { product_id: productId });
}
