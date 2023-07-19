<template>
    <v-snackbar rounded="xg" :timeout="2000" location="top" color="orange-darken-4">
        <div class="d-flex justify-center align-center">
            <slot></slot>
        </div>
    </v-snackbar>
</template>