<template xmlns="http://www.w3.org/1999/html">
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
                    <span class="font-medium">Post created!</span>
                </div>
            </div>
            <div class="flex-1 p-3 md:py-[35]">
                <div class="space-y-2 md:space-y-6">
                    <div class="flex items-center justify-center bg-base-100">
                        <div class="card px-8 py-6 mx-4 mt-4 text-left bg-base-200 shadow-xl w-full">
                            <h3 class="text-2xl font-bold text-center">Create post</h3>
                            <form @submit.prevent="create">
                                <div class="mt-4">
                                    <div class="mt-4">
                                        <label class="block" for="title">Title</label>
                                        <input v-model="payload.title" type="text" placeholder="Post title"
                                               class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                        <span v-if="errors.title"
                                              class="text-xs text-red-400">{{ errors.title[0] }}</span>
                                    </div>
                                    <div class="mt-4">
                                        <label class="block" for="image">Image</label>
                                        <input @input="getFile" type="file" placeholder="Post image"
                                               class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                        <div class="preview">
                                            <img :src="imageUrl" alt="">
                                        </div>
                                        <span v-if="errors.image"
                                              class="text-xs text-red-400">{{ errors.image[0] }}</span>
                                    </div>

                                    <div class="mt-4">
                                        <label class="block" for="content">Content</label>
                                        <QuillEditor contentType="html" :options="quillOptions"
                                                     v-model:content="payload.content"
                                                     theme="snow"/>
                                        <span v-if="errors.content"
                                              class="text-xs text-red-400">{{ errors.content[0] }}</span>
                                    </div>
                                    <div class="mt-4">
                                        <label class="block" for="content">Category</label>
                                        <select v-model="payload.category_id"
                                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                            <option value="">Choose category</option>
                                            <option v-for="category in categories" :key="category.id"
                                                    :value="category.id">{{ category.name }}
                                            </option>
                                        </select>
                                        <span v-if="errors.category_id"
                                              class="text-xs text-red-400">{{ errors.category_id[0] }}</span>
                                    </div>
                                    <div class="flex">
                                        <button type="submit"
                                                class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                                            Create
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
                    <router-link :to="{name: 'ListCategories'}">Show posts</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";
import {QuillEditor} from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

const payload = ref({
    category_id: '',
    content: ''
})
const errors = ref({})
const success = ref(false)
const imageUrl = ref()
const categories = ref({})

const quillOptions = ref({
    placeholder: 'Compose an epic...',
    contentType: 'html',
    theme: 'snow'
})

const create = () => {
    console.log(payload.value)
    axios.get('/sanctum/csrf-cookie').then(() => {
        axios.post('/api/posts', payload.value, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
                .then(() => {
                    payload.value = {}
                    payload.value.category_id = ''
                    imageUrl.value = null
                    errors.value = ''
                    success.value = true
                    setTimeout(() => {
                        success.value = false
                    }, 2500)
                })
                .catch(error => {
                    errors.value = error.response.data.errors
                })
    });
}

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

const getFile = (event) => {
    const file = event.target.files[0]
    payload.value.file = file
    imageUrl.value = URL.createObjectURL(file)
    URL.revokeObjectURL(file)
}

onMounted(() => {
    getCategories()
})

</script>

<style scoped>
.preview img {
    margin-top: 15px;
    max-height: 150px;
    max-width: 100%;
}
</style>
