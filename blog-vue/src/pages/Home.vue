<template>
    <div class="drawer-content flex justify-center lg:justify-start">
        <div class="lg:w-[60vw] max-w-screen-lg lg:pt-4 lg:p-4">
            <div class="flex-1 p-3 md:py-[35]">
                <div class="space-y-2 md:space-y-6">
                    <router-link :to="{name: 'SinglePost', params:{slug: post.slug}}" v-for="post in posts"
                                 :key="post.id"
                                 class="card card-side bg-base-200 shadow-xl">
                        <figure>
                            <img
                                    :src="post.image.cropped"
                                    :alt="post.category"
                            />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ post.title }}</h2>
                            <div class="justify-start">
                                <button class="btn btn-xs btn-primary">{{ post.category }}</button>
                            </div>
                            <div v-html="post.content">
                            </div>
                            <div class="text-xs text-gray-500 mt-auto">{{ post.created_at }} by <span
                                    class="text-sm">{{ post.author }}</span></div>
                        </div>
                    </router-link>

                    <div class="flex justify-center">
                        <div class="btn-group">
                            <button class="btn">1</button>
                            <button class="btn">2</button>
                            <button class="btn btn-disabled">...</button>
                            <button class="btn">99</button>
                            <button class="btn">100</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";

const posts = ref({})

const getPosts = () => {
    axios.get('/api/posts')
            .then(response => {
                console.log(response.data.data)
                posts.value = response.data.data
            })

}

onMounted(() => {
    getPosts()
})
</script>
<style scoped>
.card-side img {
    max-width: 200px;
}
</style>
