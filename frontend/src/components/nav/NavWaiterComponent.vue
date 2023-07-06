<template>
    <v-card class="mb-2">
        <v-toolbar class="bg-white nav py-5">

            <v-toolbar-title class="text-h5 text-orange-darken-4 font-weight-bold">Phnom Penh Food</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-list-item @click="$emit('profile-clicked')"
                prepend-avatar="https://randomuser.me/api/portraits/men/78.jpg"></v-list-item>
        </v-toolbar>
    </v-card>
</template>