<template>
    <main>
        <!-- Nav -->
        <nav-waiter-component @profile-clicked="drawer = !drawer"></nav-waiter-component>

        <v-select class="text-orange-darken-4 bg-white w-25" hide-details="auto" clearable label="Select table"
            :items="['01', '02', '03', '04', '05', '06']"></v-select>

        <header class="text-center text-orange-darken-4 text-h5 font-weight-bold">PRODUCTS</header>

        <!-- List products -->
        <v-container v-if="productStore.products.length > 0">
            <v-row>
                <v-col v-for="product in productStore.products" :key="product.id" cols="5" sm="4">
                    <product-card :product="product" @on-customize="onCustomize"></product-card>
                </v-col>
            </v-row>
        </v-container>

        <v-container v-else>
            <h4 class="mt-5 text-center text-orange-darken-4">Don't have any product.</h4>
        </v-container>

        <!-- A product customize -->
        <v-card v-if="productCustomize" class="overflow-visible">
            <v-layout>
                <v-navigation-drawer style="margin-bottom: 56px;" class="h-auto rounded-t-xl" v-model="isCustomize"
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
                                    <v-btn class="text-h5" @click="isCustomize = !isCustomize"
                                        icon="mdi-close-circle"></v-btn>
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
                                class="text-orange-darken-4">
                                <div class="d-flex align-center">
                                    <span class="font-weight-bold">{{ customize.size }}</span>
                                    <v-spacer></v-spacer>
                                    <span class="mr-8 font-weight-bold">${{ customize.price }}</span>
                                    <v-icon @click="addCustomize(productCustomize, customize)" class="text-h4"
                                        color="orange-darken-4" icon="mdi-plus-circle"></v-icon>
                                </div>
                            </v-list-item>
                        </v-list>
                    </v-card>
                </v-navigation-drawer>
            </v-layout>
        </v-card>

        <!-- Order summary -->
        <v-layout class="overflow-visible">
            <v-bottom-navigation class="bg-black rounded-t-xl">
                <div @click="isCart = !isCart, isCustomize = false"
                    class="d-flex align-center bg-orange-darken-4 rounded-pill px-4" style="cursor: pointer">
                    <div>
                        <v-icon class="text-h4" icon="mdi-cart"></v-icon>
                        <span v-if="myCart.length > 0" class="text-subtitle-1 font-weight-bold">{{ totalFoods }}</span>
                    </div>
                    <h4 class="ml-4 mt-2">Total: <span class="font-weight-bold">{{ totalPrice }}</span></h4>
                </div>

                <v-spacer></v-spacer>

                <v-btn class="h-full rounded-pill text-h6 bg-orange-darken-4">
                    Order Now
                </v-btn>
            </v-bottom-navigation>
        </v-layout>

        <!-- My cart -->
        <v-card v-if="myCart" class="overflow-visible">
            <v-layout>
                <v-navigation-drawer style="margin-bottom: 56px;" class="h-auto rounded-t-xl" v-model="isCart" temporary
                    location="bottom">
                    <v-card class="mx-auto rounded-t-xl">
                        <v-card-item class="bg-orange-darken-4">
                            <v-card-title>
                                <span class="text-h5">Cart ({{ totalFoods }})</span>
                            </v-card-title>

                            <template v-slot:append>
                                <v-defaults-provider :defaults="{
                                    VBtn: {
                                        variant: 'text',
                                        density: 'comfortable',
                                    }
                                }">
                                    <v-btn class="text-h5" @click="isCart = !isCart" icon="mdi-close-circle"></v-btn>
                                </v-defaults-provider>
                            </template>
                        </v-card-item>

                        <v-list>
                            <v-list-item v-for="customize in myCart" :key="customize.id" class="text-orange-darken-4">
                                <div class="d-flex align-center">
                                    <div class="d-flex align-center">
                                        <div>
                                            <v-img class="bg-white rounded-xl" :width="150"
                                                :src="customize.product.image"></v-img>
                                        </div>
                                        <div class="ml-3 text-black">
                                            <h6 class="font-weight-bold">{{ customize.product.name }}</h6>
                                            <span>Size / {{ customize.size }}</span>
                                            <h5 class="font-weight-bold">${{ customize.quantity * customize.price }}</h5>
                                        </div>
                                    </div>
                                    <v-spacer></v-spacer>
                                    <div class="d-flex align-center">
                                        <v-icon @click="minusCustomize(customize.id)" class="text-h4"
                                            color="orange-darken-4" icon="mdi-minus-circle-outline"></v-icon>
                                        <h4 class="text-black mx-3 mt-2 font-weight-bold">{{ customize.quantity }}</h4>
                                        <v-icon @click="addCustomize(customize.product, customize)" class="text-h4"
                                            color="orange-darken-4" icon="mdi-plus-circle"></v-icon>
                                    </div>
                                </div>
                            </v-list-item>
                        </v-list>
                    </v-card>
                </v-navigation-drawer>
            </v-layout>
        </v-card>

        <!-- Dialog remove customize -->
        <v-dialog v-model="isRemoveCustom" transition="dialog-top-transition" width="auto">
            <!-- <template v-slot:activator="{ props }">
                <v-btn color="primary" v-bind="props">From the top</v-btn>
            </template> -->
            <!-- <template v-slot:default="{ isActive }"> -->
                <v-card>
                    <v-toolbar color="primary" title="Opening from the top"></v-toolbar>
                    <v-card-text>
                        <div class="text-h2 pa-12">Hello world!</div>
                    </v-card-text>
                    <v-card-actions class="justify-end">
                        <v-btn variant="text" @click="isRemoveCustom = false">Close</v-btn>
                    </v-card-actions>
                </v-card>
            <!-- </template> -->
        </v-dialog>

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
import { computed, onMounted, ref } from "vue";
import { useCookieStore } from "@/stores/cookie";
import { useProductStore } from "@/stores/product";

// Variables
const productStore = useProductStore();
const cookieStore = useCookieStore();
const user = cookieStore.user;

const drawer = ref(false);
const isCustomize = ref(false);
const isRemoveCustom = ref(true);
const productCustomize = ref(null);
const isCart = ref(false);
const myCart = localStorage.getItem('customizes_selectd') ? ref(JSON.parse(localStorage.getItem('customizes_selectd'))) : ref([]);

// Methods
const onCustomize = (product) => {
    isCustomize.value = true;
    isCart.value = false;
    productCustomize.value = product;
}

const totalPrice = computed(() => {
    let total = 0;
    for (let customize of myCart.value) {
        total += Number(customize.price) * customize.quantity;
    }
    return total;
})

const totalFoods = computed(() => {
    let count = 0;
    for (let customize of myCart.value) {
        count += customize.quantity;
    }
    return count;
})

const addCustomize = (product, customize) => {
    const customizes = localStorage.getItem('customizes_selectd') ? JSON.parse(localStorage.getItem('customizes_selectd')) : [];
    let findCustomIndex = customizes.findIndex((custom) => custom.id === customize.id);
    if (customizes[findCustomIndex]) {
        customizes[findCustomIndex].quantity += 1;
    } else {
        customizes.push({
            id: customize.id,
            size: customize.size,
            quantity: 1,
            price: customize.price,
            product: {
                product_id: product.product_id,
                name: product.name,
                image: product.image,
            }
        })
    }
    myCart.value = customizes;
    localStorage.setItem('customizes_selectd', JSON.stringify(customizes));
}

const minusCustomize = (custom_id) => {
    const customizes = localStorage.getItem('customizes_selectd') ? JSON.parse(localStorage.getItem('customizes_selectd')) : [];
    let findCustomIndex = customizes.findIndex((custom) => custom.id === custom_id);
    if (customizes[findCustomIndex]) {
        customizes[findCustomIndex].quantity -= 1;
        if (customizes[findCustomIndex].quantity === 0) {
            customizes.splice(findCustomIndex, 1);
        }
    }
    myCart.value = customizes;
    localStorage.setItem('customizes_selectd', JSON.stringify(customizes));
}

// Lifecycle hook
onMounted(() => {
    productStore.getData();
});

</script>