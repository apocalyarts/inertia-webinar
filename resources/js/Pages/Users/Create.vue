<template>
    <form @submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Create User
        </h3>
        <div class="space-y-6 sm:space-y-5 pt-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start">
                <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="text" name="name" id="name" v-model="form.name" class="block w-full shadow-sm focus:ring-indigo500 focus:border-indigo-500 sm:max-w-lg sm:text-sm border-bray-300 rounded-md" />
                    <div v-show="errors.name" class="mt-1 text-sm text-red-600">{{ errors.name }}</div>
                </div>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start">
                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Email
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="email" name="email" id="email" v-model="form.email" class="block w-full shadow-sm focus:ring-indigo500 focus:border-indigo-500 sm:max-w-lg sm:text-sm border-bray-300 rounded-md" />
                    <div v-show="errors.email" class="mt-1 text-sm text-red-600">{{ errors.email }}</div>
                </div>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start">
                <label for="password" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Password
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="password" name="password" id="password" v-model="form.password" class="block w-full shadow-sm focus:ring-indigo500 focus:border-indigo-500 sm:max-w-lg sm:text-sm border-bray-300 rounded-md" />
                    <div v-show="errors.password" class="mt-1 text-sm text-red-600">{{ errors.password }}</div>
                </div>
            </div>
        </div>
        <div class="pt-5">
            <div class="flex justify-end">
                <inertia-link :href="$route('users.index')" as="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </inertia-link>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>
    </form>
</template>
<script>
export default {
    props: {
        errors: Object
    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: ''
            }
        }
    },
    methods: {
        submit() {
            this.$inertia.post(this.$route('users.store'), this.form)
        }
    }
}
</script>