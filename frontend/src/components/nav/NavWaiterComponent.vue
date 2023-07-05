<template>
    <v-card color="bg-white nav">
        <v-toolbar  class="py-5">

            <v-toolbar-title class="text-h5 text-orange-darken-4 font-weight-bold">Phnom Penh Food</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-list-item @click="$emit('profile-clicked')"
                prepend-avatar="https://randomuser.me/api/portraits/men/78.jpg"></v-list-item>
        </v-toolbar>
    </v-card>
</template>

<style scoped>
.nav {
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
</style>