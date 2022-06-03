let store = {
    state: {
        cart: [],
        cartCount: 0,
    },

    mutations: {
        addToCart(state, dish) {
            let found = state.cart.find(product => product.id == dish.id);

            if (found) {
                found.quantity ++;
                found.totalPrice = found.quantity * found.price;
            } else {
                state.cart.push(dish);

                Vue.set(dish, 'quantity', 1);
                Vue.set(dish, 'totalPrice', dish.price);
            }

            state.cartCount++;
        }
    }
};

export default store;