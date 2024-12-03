<template>
    <div>
      <!-- Example usage -->
      <button @click="addToCart(1)">Add to Cart</button>
      <button @click="removeItemFromCart">Remove Item</button>
      <input v-model="product.quantity" @change="changeQuantity" type="number" />
    </div>
  </template>

  <script>
  import { ref } from "vue";

  export default {
    props: {
      product: {
        type: Object,
        required: true,
      },
    },
    setup(props, { emit }) {
      const cartItems = ref([]);

      const addToCart = (quantity = 1) => {
        post(props.product.addToCartUrl, { quantity })
          .then((result) => {
            emit("cart-change", { count: result.count });
            emit("notify", { message: "The item was added to the cart" });
          })
          .catch((response) => {
            console.error(response);
          });
      };

      const removeItemFromCart = () => {
        post(props.product.removeUrl)
          .then((result) => {
            emit("notify", { message: "The item was removed from the cart" });
            emit("cart-change", { count: result.count });
            cartItems.value = cartItems.value.filter(
              (p) => p.id !== props.product.id
            );
          })
          .catch((response) => {
            console.error(response);
          });
      };

      const changeQuantity = () => {
        post(props.product.updateQuantityUrl, { quantity: props.product.quantity })
          .then((result) => {
            emit("cart-change", { count: result.count });
            emit("notify", { message: "The item quantity was updated" });
          })
          .catch((response) => {
            console.error(response);
          });
      };

      return {
        addToCart,
        removeItemFromCart,
        changeQuantity,
        cartItems,
      };
    },
  };
  </script>
