<template>
    <v-card class="mb-3 rounded-b-xl">
        <v-toolbar v-if="user" class="bg-white nav py-3">

            <v-toolbar-title class="text-h5 text-orange-darken-4 font-weight-bold">{{ user.store.name }}</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-list-item @click.prevent="$emit('profile-clicked')"
                :prepend-avatar="user.image"></v-list-item>
        </v-toolbar>
    </v-card>
</template>

<script setup>
import { useUserStore } from "@/stores/user";
import { storeToRefs } from "pinia";

const { user } = storeToRefs(useUserStore());
</script>