<template>
    <main>
        <!-- Nav -->
        <nav-waiter-component @profile-clicked="drawer = !drawer"></nav-waiter-component>

        <v-select class="text-orange-darken-4 bg-white w-25" hide-details="auto" clearable label="Select table"
            :items="['01', '02', '03', '04', '05', '06']"></v-select>

        <header class="text-center text-orange-darken-4 text-h5 font-weight-bold">PRODUCTS</header>

        <!-- List products -->
        <v-container>
            <v-row>
                <v-col v-for="product in productStore.products" :key="product.id" cols="5" sm="4">
                    <product-card :product="product" @on-customize="onCustomize"></product-card>
                </v-col>
            </v-row>
        </v-container>

        <!-- A product customize -->
        <v-card v-if="productCustomize" class="overflow-visible">
            <v-layout>
                <v-navigation-drawer style="margin-bottom: 55px;" class="h-auto rounded-t-xl" v-model="isCustomize"
                    temporary location="bottom">
                    <v-card class="mx-auto rounded-t-xl">
                        <v-card-item class="bg-orange-darken-4">
                            <v-card-title>
                                <span class="text-h5">{{ productCustomize.name }}</span>
                            </v-card-title>

                            <template v-slot:append>
                                <v-defaults-provider :defaults="{
                                    VBtn: {
                                        variant: 'text',
                                        density: 'comfortable',
                                    }
                                }">
                                    <v-btn @click="isCustomize = !isCustomize" icon="mdi-close-circle"></v-btn>
                                </v-defaults-provider>
                            </template>
                        </v-card-item>

                        <v-list>
                            <v-list-item append-icon="mdi-plus-none">
                                <div class="d-flex">
                                    <span>Size:</span>
                                    <v-spacer></v-spacer>
                                    <span>Price:</span>
                                </div>
                            </v-list-item>

                            <v-list-item v-for="customize in productCustomize.product_customize" :key="customize.id"
                                class="text-orange-darken-4" append-icon="mdi-plus-circle">
                                <div class="d-flex">
                                    <span class="font-weight-bold">{{ customize.size }}</span>
                                    <v-spacer></v-spacer>
                                    <span class="font-weight-bold">${{ customize.price }}</span>
                                </div>
                            </v-list-item>
                        </v-list>
                    </v-card>
                </v-navigation-drawer>
            </v-layout>
        </v-card>

        <!-- Order summary -->
        <v-layout class="overflow-visible" style="height: 200px">
            <v-bottom-navigation class="bg-black rounded-pill">
                <div class="d-flex align-center bg-orange-darken-4 rounded-pill px-4">
                    <div>
                        <v-icon class="text-h4" icon="mdi-cart"></v-icon>
                        <span class="text-subtitle-1 font-weight-bold">1</span>
                    </div>
                    <h4 class="ml-5 mt-2">Total: $3</h4>
                </div>

                <v-spacer></v-spacer>

                <v-btn class="h-full rounded-pill text-h6 bg-orange-darken-4">
                    Order Now
                </v-btn>
            </v-bottom-navigation>
        </v-layout>

        <!-- Slide bar -->
        <v-card class="overflow-visible">
            <v-layout>
                <v-navigation-drawer class="rounded-xl" v-model="drawer" temporary location="right">
                    <v-list-item :prepend-avatar="user.image" class="mt-2 text-orange-darken-4"
                        :title="`${user.first_name} ${user.last_name}`"></v-list-item>

                    <v-divider></v-divider>

                    <v-list density="compact" nav>
                        <!-- <v-list-item class="text-orange-darken-4" prepend-icon="mdi-view-dashboard" title="Home"
                            value="home"></v-list-item> -->
                        <v-list-item @click="drawer = !drawer" class="text-orange-darken-4" prepend-icon="mdi-close"
                            title="Close"></v-list-item>
                    </v-list>
                </v-navigation-drawer>
            </v-layout>
        </v-card>
    </main>
</template>
  
<script setup>
// Import
import { onMounted, ref } from "vue";
import { useCookieStore } from "@/stores/cookie";
import { useProductStore } from "@/stores/product";

// Variables
const productStore = useProductStore();
const cookieStore = useCookieStore();
const user = cookieStore.user;

const drawer = ref(false);
const isCustomize = ref(true);
const productCustomize = ref(null);

// Methods
const onCustomize = (product) => {
    isCustomize.value = true;
    productCustomize.value = product;
}

// Life cycle hook
onMounted(() => {
    productStore.getProducts();
});

</script>