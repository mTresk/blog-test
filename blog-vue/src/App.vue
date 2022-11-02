<template>
    <div class="drawer drawer-mobile">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle"/>
        <router-view @update-sidebar="updateSidebar" @flash-update="flashUpdate" :success="success"></router-view>
        <div class="drawer-side">
            <label for="my-drawer-2" class="drawer-overlay"></label>
            <div class="overflow-y-auto flex lg:justify-end w-fit lg:w-[40vw]">
                <!-- Sidebar content here -->
                <div class="w-fit p-3 lg:m-6 bg-base-100">
                    <!-- avatar start -->
                    <div class="avatar w-60">
                        <div class="w-16 lg:w-32 rounded-full mx-auto">
                            <img src="https://api.lorem.space/image/face?hash=92310"/>
                        </div>
                    </div>
                    <!-- avatar end -->
                    <h1 class="text-2xl p-2 pl-4 text-center">Tresk Blog</h1>
                    <p v-if="userName" class="text-sm pl-4 text-center">Hello, {{ userName }}</p>
                    <div class="divider"></div>
                    <!-- menu start -->
                    <div class="pt-4">
                        <ul class="menu bg-base-100 rounded-box">
                            <li>
                                <router-link :to="{name: 'Home'}">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                        />
                                    </svg>
                                    Home
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'About'}">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                        />
                                    </svg>
                                    About
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'Categories'}">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"
                                        />
                                    </svg>
                                    Categories
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'Archive'}">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                                        />
                                    </svg>
                                    Archive
                                </router-link>
                            </li>
                            <li v-if="!loggedIn">
                                <router-link :to="{name: 'Login'}">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                                        />
                                    </svg>
                                    Login
                                </router-link>
                            </li>
                            <li v-if="loggedIn">
                                <router-link :to="{name: 'Dashboard'}">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                                        />
                                    </svg>
                                    Dashboard
                                </router-link>
                            </li>
                            <div class="divider"></div>
                            <li class="hidden lg:block">
                                <div class="flex gap-1 justify-center">
                                    <button
                                            data-set-theme="winter"
                                            class="btn btn-sm btn-ghost btn-square"
                                            data-act-class="btn-active"
                                    >
                                        <svg
                                                class="inline-block w-4 h-4 fill-current"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512"
                                        >
                                            <title>ionicons-v5-q</title>
                                            <path
                                                    d="M256,118a22,22,0,0,1-22-22V48a22,22,0,0,1,44,0V96A22,22,0,0,1,256,118Z"
                                            />
                                            <path
                                                    d="M256,486a22,22,0,0,1-22-22V416a22,22,0,0,1,44,0v48A22,22,0,0,1,256,486Z"
                                            />
                                            <path
                                                    d="M369.14,164.86a22,22,0,0,1-15.56-37.55l33.94-33.94a22,22,0,0,1,31.11,31.11l-33.94,33.94A21.93,21.93,0,0,1,369.14,164.86Z"
                                            />
                                            <path
                                                    d="M108.92,425.08a22,22,0,0,1-15.55-37.56l33.94-33.94a22,22,0,1,1,31.11,31.11l-33.94,33.94A21.94,21.94,0,0,1,108.92,425.08Z"
                                            />
                                            <path
                                                    d="M464,278H416a22,22,0,0,1,0-44h48a22,22,0,0,1,0,44Z"
                                            />
                                            <path
                                                    d="M96,278H48a22,22,0,0,1,0-44H96a22,22,0,0,1,0,44Z"
                                            />
                                            <path
                                                    d="M403.08,425.08a21.94,21.94,0,0,1-15.56-6.45l-33.94-33.94a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.55,37.56Z"
                                            />
                                            <path
                                                    d="M142.86,164.86a21.89,21.89,0,0,1-15.55-6.44L93.37,124.48a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.56,37.55Z"
                                            />
                                            <path
                                                    d="M256,358A102,102,0,1,1,358,256,102.12,102.12,0,0,1,256,358Z"
                                            />
                                        </svg>
                                    </button>
                                    <button
                                            data-set-theme="garden"
                                            class="btn btn-sm btn-ghost btn-square"
                                            data-act-class="btn-active"
                                    >
                                        <svg
                                                class="inline-block w-4 h-4 fill-current"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                        >
                                            <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                            />
                                        </svg>
                                    </button>
                                    <button
                                            data-set-theme="dark"
                                            class="btn btn-sm btn-ghost btn-square"
                                            data-act-class="btn-active"
                                    >
                                        <svg
                                                class="inline-block w-4 h-4 fill-current"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512"
                                        >
                                            <title>ionicons-v5-j</title>
                                            <path
                                                    d="M152.62,126.77c0-33,4.85-66.35,17.23-94.77C87.54,67.83,32,151.89,32,247.38,32,375.85,136.15,480,264.62,480c95.49,0,179.55-55.54,215.38-137.85-28.42,12.38-61.8,17.23-94.77,17.23C256.76,359.38,152.62,255.24,152.62,126.77Z"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import {onMounted, ref} from "vue";
import router from "@/router";

const userName = ref('')
const loggedIn = ref(false)
const success = ref(false)

const getUserName = () => {
    axios.get('/sanctum/csrf-cookie').then(() => {
        axios.get('/api/user')
                .then(response => {
                    userName.value = response.data.name
                })
                .catch(error => {
                    if (error.response.status === 401) {
                        localStorage.removeItem('authenticated')
                        updateSidebar()
                        router.push({name: 'Login'})
                    }
                })
    });
}

onMounted(() => {
    if (localStorage.getItem('authenticated')) {
        getUserName()
        loggedIn.value = true
    } else {
        loggedIn.value = false
    }
})

const updateSidebar = () => {
    loggedIn.value = !loggedIn.value
    if (localStorage.getItem('authenticated')) {
        getUserName()

    } else {
        userName.value = ''
    }
}

const flashUpdate = () => {
    success.value = true
    setTimeout(() => {
        success.value = false
    }, 2500)
}
</script>
