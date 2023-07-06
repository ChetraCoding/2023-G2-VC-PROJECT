<template>
    <nav-waiter-component @profile-clicked="drawer = !drawer"></nav-waiter-component>

    <v-select class="text-orange-darken-4" clearable label="Select table"
        :items="['01', '02', '03', '04', '05', '06']"></v-select>

    <header class="text-center text-orange-darken-4 text-h5 font-weight-bold">PRODUCTS</header>
    <v-container>
        <v-row class="bg-grey-lighten-2">
            <v-col v-for="product in products" :key="product.id" cols="5" sm="4">
                <v-card class="mx-auto rounded-xl" max-width="400">
                    <v-img class="rounded-xl m-3" height="200"
                        src="https://saum.wownow.net/img/Cg76N2CUx0iAIdYBAAaINuoay-A314.png" cover>
                    </v-img>

                    <v-card-subtitle class="font-weight-bold">
                        {{ product.barcode }}
                    </v-card-subtitle>

                    <v-card-text>
                        <h6 class="font-weight-bold">{{ product.name }}</h6>

                        <div>{{ product.description }}</div>
                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>

                        <v-btn @click="customize = true, productCustomize = product"
                            class="bg-orange-darken-4 rounded-pill">
                            Customize
                        </v-btn>

                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </v-container>

    <v-card v-if="productCustomize" class="overflow-visible">
        <v-layout>
            <v-navigation-drawer class="rounded-xl" v-model="customize" temporary location="bottom">
                <v-list-item>
                    <h1>{{ productCustomize.name }}</h1>
                </v-list-item>
                <v-radio-group>
                    <v-table>
                        <thead>
                            <tr>
                                <th class="text-left">
                                    Size
                                </th>
                                <th class="text-right">
                                    Price
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="customize in productCustomize.product_customize" :key="customize.id">
                                <td><v-radio :label="customize.size" :value="customize.id"></v-radio></td>
                                <td class="text-right font-weight-bold">${{ customize.price }}</td>
                            </tr>
                            <br>
                        </tbody>
                    </v-table>
                </v-radio-group>

                <v-list density="compact" nav>
                    <v-list-item @click="customize = !customize" class="text-orange-darken-4" prepend-icon="mdi-close"
                        title="Close"></v-list-item>
                </v-list>
            </v-navigation-drawer>
        </v-layout>
    </v-card>

    <!-- <v-layout class="overflow-visible" style="height: 100px">
        <v-bottom-navigation class="mb-2 bg-black rounded-pill" horizontal>
            <h2>Total: $30</h2>

            <v-spacer></v-spacer>

            <v-btn class="text-h6 bg-orange-darken-4 rounded-pill">
                Order Now
            </v-btn>
        </v-bottom-navigation>
    </v-layout> -->

    <v-card class="overflow-visible">
        <v-layout>
            <v-navigation-drawer v-model="drawer" temporary location="right">
                <v-list-item prepend-avatar="https://randomuser.me/api/portraits/men/78.jpg" class="text-orange-darken-4"
                    title="Chetra Hong"></v-list-item>

                <v-divider></v-divider>

                <v-list density="compact" nav>
                    <v-list-item class="text-orange-darken-4" prepend-icon="mdi-view-dashboard" title="Home"
                        value="home"></v-list-item>
                    <v-list-item class="text-orange-darken-4" prepend-icon="mdi-forum" title="About"
                        value="about"></v-list-item>
                    <v-list-item @click="drawer = !drawer" class="text-orange-darken-4" prepend-icon="mdi-close"
                        title="Close"></v-list-item>
                </v-list>
            </v-navigation-drawer>
        </v-layout>
    </v-card>
</template>
  
<script setup>
import { ref } from "vue";

const drawer = ref(null);
const customize = ref(true);
const productCustomize = ref(null);

const products = ref([
    {
        id: 1,
        barcode: 117,
        name: "Noodle",
        description: "This product description.",
        product_customize: [
            {
                id: 1,
                size: 'small',
                price: 3.4,
                qautity: 20
            },
            {
                id: 5,
                size: 'midium',
                price: 4,
                qautity: 10
            },
            {
                id: 2,
                size: 'large',
                price: 5,
                qautity: 10
            },
        ]
    },
    {
        id: 2,
        barcode: 118,
        name: "Pizza",
        description: "This product description.",
        product_customize: [
            {
                id: 3,
                size: 'small',
                price: 3,
                qautity: 30
            },
            {
                id: 4,
                size: 'large',
                price: 4,
                qautity: 10
            },
        ]
    },
])
</script>