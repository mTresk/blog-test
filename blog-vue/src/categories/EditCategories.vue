<template>
    <div class="drawer-content flex justify-center lg:justify-start">
        <div class="lg:w-[60vw] max-w-screen-lg lg:pt-4 lg:p-4">
            <div class="flex-1 p-3 md:py-[35]">
                <div class="space-y-2 md:space-y-6">
                    <div class="flex items-center justify-center bg-base-100">
                        <div class="card px-8 py-6 mx-4 mt-4 text-left bg-base-200 shadow-xl w-full">
                            <h3 class="text-2xl font-bold text-center">Update category</h3>
                            <form @submit.prevent="update">
                                <div class="mt-4">
                                    <div class="mt-4">
                                        <label class="block" for="name">Name</label>
                                        <input v-model="payload.name" type="text" placeholder="Category name"
                                               class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                        <span v-if="errors.name"
                                              class="text-xs text-red-400">{{ errors.name[0] }}</span>
                                    </div>
                                    <div class="flex">
                                        <button type="submit"
                                                class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="mt-4 flex text-center justify-center space-y-1 list-none list-inside text-gray-500 dark:text-gray-400">
                <li>
                    <router-link :to="{name: 'ListCategories'}"> Show categories</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";
import router from "@/router";

const payload = ref({})
const errors = ref({})

const props = defineProps(['id'])
const emit = defineEmits(['flashUpdate'])

const getCategory = () => {
    axios.get('/sanctum/csrf-cookie').then(() => {
        axios.get('/api/categories/' + props.id)
                .then((response) => {
                    payload.value = response.data
                })
                .catch(error => {
                    errors.value = error.response.data.errors
                })
    });
}

const update = () => {
    axios.get('/sanctum/csrf-cookie').then(() => {
        axios.put('/api/categories/' + props.id, payload.value)
                .then(() => {
                    emit('flashUpdate')
                    router.push({name: 'ListCategories'})
                    payload.value = ''
                    errors.value = ''
                })
                .catch(error => {
                    errors.value = error.response.data.errors
                })
    });
}

onMounted(() => {
    getCategory()
})
</script>

