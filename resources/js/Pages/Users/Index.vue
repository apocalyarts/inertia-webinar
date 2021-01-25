<template>
    <div>
        <inertia-link v-if="users.allows.create"
            :href="$route('users.create')"
            as="button"
            class="mb-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >Create User</inertia-link>
        <div v-for="user in users.data" :key="user.id">
            {{ user.name }}
            <inertia-link v-if="user.allows.update"
                :href="$route('users.update', user)"
                class="ml-1 text-xs text-indigo-500"
            >Edit</inertia-link>
        </div>
        <paginator :links="users.links" class="mt-2" />
    </div>
</template>
<script>
import Paginator from "@/Paginator"
export default {
    components: {
        Paginator
    },
    props: {
        users: Object
    }
}
</script>