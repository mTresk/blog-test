<template>
    <div class="drawer-content flex justify-center lg:justify-start">
        <div class="lg:w-[60vw] max-w-screen-lg lg:pt-4 lg:p-4">
            <div class="flex-1 p-3 md:py-[35]">
                <div class="space-y-2 md:space-y-6">
                    <div class="flex items-center justify-center bg-base-100">
                        <div class="card px-8 py-6 mx-4 mt-4 text-left bg-base-200 shadow-xl w-full">
                            <h3 class="text-2xl font-bold text-center">Join us</h3>
                            <form @submit.prevent="register">
                                <div class="mt-4">
                                    <div>
                                        <label class="block" for="Name">Name</label>
                                        <input v-model="payload.name" type="text" placeholder="Name"
                                               class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                        <span v-if="errors.name"
                                              class="text-xs text-red-400">{{ errors.name[0] }}</span>
                                    </div>
                                    <div class="mt-4">
                                        <label class="block" for="email">Email</label>
                                        <input v-model="payload.email" type="text" placeholder="Email"
                                               class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                        <span v-if="errors.email"
                                              class="text-xs text-red-400">{{ errors.email[0] }}</span>
                                    </div>
                                    <div class="mt-4">
                                        <label class="block">Password</label>
                                        <input v-model="payload.password" type="password" placeholder="Password"
                                               class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                        <span v-if="errors.password"
                                              class="text-xs text-red-400">{{ errors.password[0] }}</span>
                                    </div>
                                    <div class="mt-4">
                                        <label class="block">Confirm Password</label>
                                        <input v-model="payload.password_confirmation" type="password"
                                               placeholder="Password"
                                               class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                        <span v-if="errors.password_confirmation"
                                              class="text-xs text-red-400">{{ errors.password_confirmation[0] }}</span>
                                    </div>
                                    <div class="flex">
                                        <button type="submit"
                                                class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                                            Create
                                            Account
                                        </button>
                                    </div>
                                    <div class="mt-6 text-grey-dark">
                                        Already have an account?
                                        <router-link :to="{name: 'Login'}" class="text-blue-600 hover:underline">
                                            Log in
                                        </router-link>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from "vue";
import router from "@/router";

const payload = ref({})
const errors = ref({})

const register = () => {
    axios.post('/api/register', payload.value)
            .then(response => {
                console.log(response)
                router.push({name: 'Home'})
            })
            .catch(error => {
                errors.value = error.response.data.errors
                console.log(error.response.data.errors)
            })
}
</script>
