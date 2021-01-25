<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 space-x-8">
                    <inertia-link :href="$route('welcome')" :class="[$isCurrent('welcome') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300']" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Welcome</inertia-link>
                    <inertia-link :href="$route('users.index')" :class="[$isCurrent('users.*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300']" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Users</inertia-link>
                </div>
            </div>
        </nav>
        <div class="py-10">
            <main>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <slot></slot>
                </div>
            </main>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>