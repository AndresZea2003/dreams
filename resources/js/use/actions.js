import { findIndex } from 'lodash'

export const getCartProducts = () => {
    const raw = localStorage.getItem('products');
    return raw ? JSON.parse(raw) : [];
};

export const actions = {
    addToCart: (product) => {
        const products = getCartProducts();
        const id = findIndex(products, ['id', product.id]);

        if (id === -1) products.push({ ...product, quantity: 1 });
        else products[id].quantity++;

        localStorage.setItem('products', JSON.stringify(products));
        // console.log('products:', products);
    },
};
