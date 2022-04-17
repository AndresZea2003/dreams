import { findIndex } from 'lodash';

export const getCartProducts = (user_id) => {
    const raw = localStorage.getItem(`products${user_id}`);
    return raw ? JSON.parse(raw) : [];
};

export const actions = {
    addToCart: (product,user_id) => {
        const products = getCartProducts(user_id);
        const id = findIndex(products, ['id', product.id]);

        if (id === -1) products.push({ ...product, quantity: 1 });
        else products[id].quantity++;

        localStorage.setItem(`products${user_id}`, JSON.stringify(products));
        // console.log('products:', products);
    },
};
