<template>
    <v-dialog transition="dialog-top-transition" width="auto">
        <v-card class="rounded-lg">
            <v-toolbar class="text-h4 text-center pr-4" color="orange-darken-4" :title="title"></v-toolbar>
            <div class="pb-3 px-3">
                <v-card-text>
                    <div class="text-h6 pa-5">{{ ms }}</div>
                </v-card-text>
                <slot></slot>
            </div>
        </v-card>
    </v-dialog>
</template>

<script setup>
import { defineProps} from "vue";

// Variable
defineProps(["title", "ms"]);

</script>