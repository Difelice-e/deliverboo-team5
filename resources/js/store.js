let store = {
    state: {
        cart: [],
        cartCount: 0,
    },

    mutations: {
        addToCart(state, dish) {
            console.log(dish.name);
        }
    }
};

export default store;