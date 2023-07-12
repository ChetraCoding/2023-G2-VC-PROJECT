<template>
  <v-layout>
    <base-side-bar title="Chef">
      <v-list-item
        prepend-icon="mdi-food"
        title="Orders"
        value="dashboard"
        class="text-orange-darken-4"
        to="/chef/order"
        style="text-decoration: none"
      >
      </v-list-item>
    </base-side-bar>

    <header-component title="Orders" />
    <v-main
      style="height: auto"
      class="bg-gray-lighten-3 mt-3 "
    >
      <!-- no order -->
      <div class="d-flex flex-wrap justify-content-center gap-3" >
        <div class="h-screen" v-if="listOrder.length == 0">
          <h4 class="text-center mt-5 text-orange-darken-4 " >
            Don't have any order.
          </h4>
        </div>

        <!-- order card -->
        <chef-order-card v-else :listOrder="listOrder" @complete="doneOfOrder">
        </chef-order-card>
      </div>
    </v-main>
  </v-layout>
</template>

<script setup>
import { ref } from "vue";

// Variables
const listOrder = ref([
  {
    order_id: 1,
    store: {
      store_id: 1,
      name: "Let's Eat",
      street: "271",
      city: "Phnom Penh",
    },
    table_number: "A01",
    datetime: "2023-07-10 09:00:00",
    is_complete: 1,
    order_details: [
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 3,
        quantity: 4,
        price: "30.00",
        product_customize: {
          product_customize_id: 3,
          size: "large",
          price: "10.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
    ],
  },
  {
    order_id: 1,
    store: {
      store_id: 1,
      name: "Let's Eat",
      street: "271",
      city: "Phnom Penh",
    },
    table_number: "A01",
    datetime: "2023-07-10 09:00:00",
    is_complete: 1,
    order_details: [
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 3,
        quantity: 4,
        price: "30.00",
        product_customize: {
          product_customize_id: 3,
          size: "large",
          price: "10.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
    ],
  },
  {
    order_id: 1,
    store: {
      store_id: 1,
      name: "Let's Eat",
      street: "271",
      city: "Phnom Penh",
    },
    table_number: "A01",
    datetime: "2023-07-10 09:00:00",
    is_complete: 1,
    order_details: [
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 3,
        quantity: 4,
        price: "30.00",
        product_customize: {
          product_customize_id: 3,
          size: "large",
          price: "10.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
    ],
  },
  {
    order_id: 1,
    store: {
      store_id: 1,
      name: "Let's Eat",
      street: "271",
      city: "Phnom Penh",
    },
    table_number: "A01",
    datetime: "2023-07-10 09:00:00",
    is_complete: 1,
    order_details: [
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 3,
        quantity: 4,
        price: "30.00",
        product_customize: {
          product_customize_id: 3,
          size: "large",
          price: "10.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
    ],
  },
  {
    order_id: 1,
    store: {
      store_id: 1,
      name: "Let's Eat",
      street: "271",
      city: "Phnom Penh",
    },
    table_number: "A01",
    datetime: "2023-07-10 09:00:00",
    is_complete: 1,
    order_details: [
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 3,
        quantity: 4,
        price: "30.00",
        product_customize: {
          product_customize_id: 3,
          size: "large",
          price: "10.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
    ],
  },
  {
    order_id: 1,
    store: {
      store_id: 1,
      name: "Let's Eat",
      street: "271",
      city: "Phnom Penh",
    },
    table_number: "A01",
    datetime: "2023-07-10 09:00:00",
    is_complete: 1,
    order_details: [
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 3,
        quantity: 4,
        price: "30.00",
        product_customize: {
          product_customize_id: 3,
          size: "large",
          price: "10.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
    ],
  },
  {
    order_id: 1,
    store: {
      store_id: 1,
      name: "Let's Eat",
      street: "271",
      city: "Phnom Penh",
    },
    table_number: "A01",
    datetime: "2023-07-10 09:00:00",
    is_complete: 1,
    order_details: [
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 2,
        quantity: 3,
        price: "20.00",
        product_customize: {
          product_customize_id: 2,
          size: "meduim",
          price: "7.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
      {
        order_detail_id: 3,
        quantity: 4,
        price: "30.00",
        product_customize: {
          product_customize_id: 3,
          size: "large",
          price: "10.00",
          product: {
            product_id: 1,
            category: "Pizza",
            name: "Pizza",
            barcode: "PZ123",
            description: "Seafood Pizza",
            image:
              "https://www.bacinos.com/wp-content/uploads/2021/05/30-Seafood-Pizza-Recipes-500x375.jpg",
            is_active: 1,
          },
        },
      },
    ],
  },
]);

// Methods
const doneOfOrder = (index) => {
  listOrder.value[index]["is_complete"] = 0;
};

// Lifecycle hook
// onMounted(() => {
//   ordersStore.getData();
// });
</script>