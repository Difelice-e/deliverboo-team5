let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');

let store = {
    state: {
        cart: cart ? JSON.parse(cart) : [],
        cartCount: cartCount ? parseInt(cartCount) : 0,
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
            this.commit('saveCart');
        },
        removeFromCart(state, dish) {
            let index = state.cart.indexOf(dish);
        
            if (index > -1) {
                let product = state.cart[index];
                state.cartCount -= product.quantity;
        
                state.cart.splice(index, 1);
            }
            this.commit('saveCart');
        },
        saveCart(state) {
            window.localStorage.setItem('cart', JSON.stringify(state.cart));
            window.localStorage.setItem('cartCount', state.cartCount);
        }
    }
};

export default store;