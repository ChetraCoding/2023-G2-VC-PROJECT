<template>
    <v-card class="mx-auto rounded-xl" elevation="20" max-width="400">
        <v-img class="rounded-xl m-3" height="200" :src="product.image" cover>
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

            <v-btn @click="$emit('on-customize', product)" class="bg-orange-darken-4 rounded-pill">
                Customize
            </v-btn>

        </v-card-actions>
    </v-card>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps(['product']);
defineEmits(['on-customize']);

</script>