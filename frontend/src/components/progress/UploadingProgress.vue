<template>
    <v-dialog persistent>
        <div class="d-flex justify-center">
            <div class="w-50 bg-white py-10 d-flex flex-column align-center rounded-lg">
                <v-progress-circular :rotate="180" :size="100" :width="15" :model-value="uploadValue" color="red-accent-2">
                    <span class="font-weight-bold">{{ uploadValue }}%</span>
                </v-progress-circular>
                <span class="text-h5 mt-2">Uploading...</span>
            </div>
        </div>
    </v-dialog>
</template>

<script setup>
import { defineProps } from 'vue';
defineProps(['uploadValue'])
</script>