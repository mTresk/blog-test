<template>
    <div class="drawer-content flex justify-center lg:justify-start">
        <div class="lg:w-[60vw] max-w-screen-lg lg:pt-4 lg:p-4">
            <div v-if="success"
                 class="flex p-4 mb-4 mt-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                 role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Category updated!</span>
                </div>
            </div>
            <ul class="mt-4 space-y-1 list-none list-inside text-gray-500 dark:text-gray-400">
                <li class="flex items-center justify-between" v-for="(category, index) in categories"
                    :key="category.id">
                    <div><span class="mr-2">{{ index + 1 }}.</span>{{ category.name }}</div>
                    <div>
                        <router-link :to="{name: 'EditCategories', params:{id: category.id}}"
                                     class="bg-blue-500 ml-2 hover:bg-blue-700 text-white py-2 px-2 rounded">
                            Edit
                        </router-link>
                        <button @click="destroy(category.id)" type="button"
                                class="bg-red-500 ml-2 hover:bg-red-700 text-white py-2 px-2 rounded">
                            Delete
                        </button>
                    </div>

                </li>
            </ul>
            <ul class="mt-4 flex text-center justify-center space-y-1 list-none list-inside text-gray-500 dark:text-gray-400">
                <li>
                    <router-link :to="{name: 'CreateCategories'}">Create category</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";

const categories = ref({})

defineProps(['success'])

const getCategories = () => {
    axios.get('/sanctum/csrf-cookie').then(() => {
        axios.get('/api/categories')
                .then((response) => {
                    categories.value = response.data
                })
                .catch(error => {
                    console.log(error)
                })
    });
}

const destroy = (id) => {
    if (confirm('Delete category?')) {
        axios.get('/sanctum/csrf-cookie').then(() => {
            axios.delete('/api/categories/' + id)
                    .then((response) => {
                        getCategories()
                    })
                    .catch(error => {
                        console.log(error)
                    })
        });
    }

}


onMounted(() => {
    getCategories()
})
</script>

