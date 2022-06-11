let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');
let cartTotal = window.localStorage.getItem('cartTotal')

let store = {
    state: {
        cart: cart ? JSON.parse(cart) : [],
        cartCount: cartCount ? parseInt(cartCount) : 0,
        cartTotal: cartTotal ? parseInt(cartTotal) : 0,
    },

    mutations: {
        addToCart(state, dish) {
            let found = state.cart.find(product => product.id == dish.id);
            let sameRestaurant = state.cart.find(product => product.user_id == dish.user_id)

            if (found) {
                // prodotto già presente in carrello
                found.quantity ++;
                found.totalPrice = found.quantity * found.price;
            } else {
                // prodotto di ristorante diverso 
                if (!sameRestaurant) {
                    if(state.cartCount > 0) {
                        
                        state.cart = []
                        state.cartCount = 0 
                        
                    }
                }
                
                // prodotto nuovo
                state.cart.push(dish);
                

                Vue.set(dish, 'quantity', 1);
                Vue.set(dish, 'totalPrice', dish.price);
            } 

            state.cartCount++;
            this.commit('saveCart');
        },
        clearCart(state) {
            state.cart = []
            state.cartCount = 0 
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
        decreaseQuantity(state, dish) { 
            let index = state.cart.indexOf(dish);
            if (index > -1) { 
                let product = state.cart[index]

                if (product.quantity == 1) {
                    state.cartCount -= product.quantity;
                    state.cart.splice(index, 1);
                } else {
                    product.quantity--
                    product.totalPrice = product.quantity * product.price;
                    state.cartCount -= 1
                }
                
                
            }

            this.commit('saveCart');
        },
        calcTotal(state, cartTotalPrice) {
            state.cartTotal = cartTotalPrice
            window.localStorage.setItem('cartTotal', state.cartTotal);
        },
        saveCart(state) {
            window.localStorage.setItem('cart', JSON.stringify(state.cart));
            window.localStorage.setItem('cartCount', state.cartCount);
            window.localStorage.setItem('cartTotal', state.cartTotal);
        }
    }
};

export default store;