<template>
    <div>
      <div v-for="item in cartItems" :key="item.id" class="cart-item">
        <h3>{{ item.name }}</h3>
        <p>{{ item.description }}</p>
        <img :src="item.image" :alt="item.name" />
        <p>Price: ${{ item.price }}</p>
        <p>Quantity: {{ item.quantity }}</p>
        <button @click="removeFromCart(item.removeUrl)">Remove</button>
        <input type="number" v-model="item.quantity" @change="updateQuantity(item)" />
      </div>
    </div>
  </template>

  <script>
  import { ref } from "vue";

  export default {
    props: {
      initialCartItems: {
        type: Array,
        required: true,
      },
    },
    setup(props) {
      const cartItems = ref(props.initialCartItems);

      const removeFromCart = (removeUrl) => {
        fetch(removeUrl, { method: "POST" })
          .then((response) => response.json())
          .then(() => {
            cartItems.value = cartItems.value.filter((item) => item.removeUrl !== removeUrl);
          })
          .catch((error) => console.error("Error:", error));
      };

      const updateQuantity = (item) => {
        fetch(item.updateQuantityUrl, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ quantity: item.quantity }),
        })
          .then((response) => response.json())
          .catch((error) => console.error("Error:", error));
      };

      return {
        cartItems,
        removeFromCart,
        updateQuantity,
      };
    },
  };
  </script>
