<template>
    <div class="drawer-content flex justify-center lg:justify-start">
        <div class="lg:w-[60vw] max-w-screen-lg lg:pt-4 lg:p-4">
            <div class="flex-1 p-3 md:py-[35]">
                <div class="space-y-2 md:space-y-6">
                    <div class="card bg-base-200 shadow-xl">
                        <div class="card-body">
                            <h1 class="md:text-3xl font-extrabold">
                                {{ post.title }}
                                <div class="badge badge-secondary badge-lg">{{ post.category }}</div>
                            </h1>
                        </div>
                    </div>
                    <div class="card bg-base-200 shadow-xl">
                        <div class="card-body">
                            <figure>
                                <img
                                        :src="post.image"
                                        :alt="post.category"
                                />
                            </figure>
                            <div class="card-body">
                                <div v-html="post.content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";

const props = defineProps(['slug'])
const post = ref({
    image: ''
});

const getPost = () => {
    axios.get('/api/posts/' + props.slug)
            .then(response => {
                post.value = response.data.data
                post.value.image = response.data.data.image.full
            })
}

onMounted(() => {
    getPost()
})
</script>
