<template>
    <main>
        <!-- Nav -->
        <nav-waiter-component @profile-clicked="drawer = !drawer"></nav-waiter-component>

        <v-select v-model="table" :items="tables" return-object="table" @update:model-value="tableSelected" :item-title="'table_number'" :item-value="'table'" 
            class="text-orange-darken-4 bg-white w-25" hide-details="auto" clearable label="Select table"></v-select>

        <header class="text-center text-orange-darken-4 text-h5 font-weight-bold">PRODUCTS</header>

        <!-- List products -->
        <v-container v-if="products.length > 0">
            <v-row>
                <v-col v-for="product in products" :key="product.id" cols="5" sm="4">
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

                            <v-list-item v-for="customize in productCustomize.product_customizes" :key="customize.id"
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
            <v-bottom-navigation class="bg-grey-darken-4 rounded-t-xl">
                <div @click="isCart = !isCart, isCustomize = false"
                    class="d-flex align-center bg-orange-darken-4 rounded-pill px-4" style="cursor: pointer">
                    <div>
                        <v-icon class="text-h4 mt-3" icon="mdi-cart"></v-icon>
                        <v-avatar class="mb-2 text-h6 text-white font-weight-bold" color="grey-darken-4">
                            {{ totalFoods }}
                        </v-avatar>     
                        <!-- <span v-if="myCart.length > 0" class="text-subtitle-1 font-weight-bold">{{ totalFoods }}</span> -->
                    </div>
                    <h4 class="ml-4 mt-2">Total: <span class="font-weight-bold">{{ totalPrice }}</span></h4>
                </div>

                <v-spacer></v-spacer>

                <v-btn @click="onOrder" class="h-full rounded-pill text-h6 bg-orange-darken-4">
                    Order Now
                </v-btn>
            </v-bottom-navigation>
        </v-layout>

        <!-- My cart -->
        <v-card v-if="myCart.length > 0" class="overflow-visible">
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
                            <v-list-item v-for="customize in myCart" :key="customize.product_customize_id" class="text-orange-darken-4">
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
                                        <v-icon @click="minusCustomize(customize.product_customize_id)" class="text-h4"
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
            <v-card class="rounded-xl">
                <v-toolbar class="text-h4 text-center" color="orange-darken-4" title="Tips"></v-toolbar>
                <div class="p-3">
                    <v-card-text>
                        <div class="text-h6 pa-5">Are you sure you don't want it?</div>
                    </v-card-text>
                    <v-card-actions class="justify-space-between">
                        <danger-button @click="isRemoveCustom = false">Cancel</danger-button>
                        <primary-button @click="removeCustomize(deleteCustomId)">Confirm</primary-button>
                    </v-card-actions>
                </div>
            </v-card>
        </v-dialog>

        <!-- Slide bar -->
        <v-card class="overflow-visible">
            <v-layout>
                <v-navigation-drawer class="rounded-xl" v-model="drawer" temporary location="right">
                    <v-list-item v-if="user" :prepend-avatar="user.image" class="mt-2 text-orange-darken-4"
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

        <!-- Alert please selecet table -->
        <base-alert v-model="tableAlert">
            <v-icon class="mr-2 text-h4 mdi mdi-close-circle"></v-icon>
            <h5 class="mt-2">Please select table!</h5>
        </base-alert>

        <!-- Alert please selecet food -->
        <base-alert v-model="foodAlert">
            <v-icon class="mr-2 text-h4 mdi mdi-close-circle"></v-icon>
            <h5 class="mt-2">Please select food!</h5>
        </base-alert>
    </main>
</template>

<script setup>
// Import
import { computed, onMounted, ref } from "vue";
import { useProductStore } from "@/stores/product";
import { useRouter } from "vue-router";
import { useUserStore } from "@/stores/user";
import { useTableStore } from "@/stores/table"
import { storeToRefs } from "pinia";

// Variables
const { getProducts } = useProductStore();
const { getTables } = useTableStore();
const { user } = storeToRefs(useUserStore());
const { tables } = storeToRefs(useTableStore());
const { products } = storeToRefs(useProductStore());
const router = useRouter();

const drawer = ref(false);
const isCustomize = ref(false);
const isRemoveCustom = ref(false);
const deleteCustomId = ref(null);
const productCustomize = ref(null);
const isCart = ref(false);
const myCart = localStorage.getItem('customizes_selectd') ? ref(JSON.parse(localStorage.getItem('customizes_selectd'))) : ref([]);

const tableAlert = ref(false);
const foodAlert = ref(false);

const table = localStorage.getItem('table_selectd') ? ref(JSON.parse(localStorage.getItem('table_selectd'))) : ref(null);
// const tables = ref([
//     { id: 1, name: '01' },
//     { id: 2, name: '02' },
//     { id: 3, name: '03' },
// ]);

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
    let findCustomIndex = customizes.findIndex((custom) => custom.product_customize_id === customize.product_customize_id);
    if (customizes[findCustomIndex]) {
        customizes[findCustomIndex].quantity += 1;
    } else {
        customizes.push({
            product_customize_id: customize.product_customize_id,
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
    let findCustomIndex = customizes.findIndex((custom) => custom.product_customize_id === custom_id);
    if (customizes[findCustomIndex]) {
        customizes[findCustomIndex].quantity -= 1;
        if (customizes[findCustomIndex].quantity < 1) {
            customizes[findCustomIndex].quantity = 1;
            isRemoveCustom.value = true;
            deleteCustomId.value = findCustomIndex;
        }
    }
    myCart.value = customizes;
    localStorage.setItem('customizes_selectd', JSON.stringify(customizes));
}

const removeCustomize = (custom_id) => {
    const customizes = localStorage.getItem('customizes_selectd') ? JSON.parse(localStorage.getItem('customizes_selectd')) : [];
    customizes.splice(custom_id, 1);
    isRemoveCustom.value = false;
    myCart.value = customizes;
    localStorage.setItem('customizes_selectd', JSON.stringify(customizes));
}

const tableSelected = () => {
    localStorage.setItem('table_selectd', JSON.stringify(table.value));
}

const onOrder = () => {
    if (myCart.value.length === 0) return foodAlert.value = true;
    if (!table.value) return tableAlert.value = true;
    router.push('/order-details')
}

// Lifecycle hook
onMounted(() => {
    getProducts();
    getTables();
});

</script>