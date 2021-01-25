<template>
    <div class="flex flex-wrap">
        <template v-for="(link, key) in links" :key="key">
            <div v-if="link.url == null" class="mr-1 px-3 py-2 text-sm border rounded text-gray-400">{{link.label}}</div>
            <inertia-link v-else :href="link.url" class="mr-1 px-3 py-2 text-sm border rounded hover-bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-white': link.active }">{{link.label}}</inertia-link>
        </template>
    </div>
</template>
<script>
export default {
    props: {
        links: Array
    }
}
</script>