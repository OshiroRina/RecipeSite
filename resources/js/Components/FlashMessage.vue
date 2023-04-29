<template>
    <div v-if="$page.props.flash.status !== null" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div v-if="$page.props.flash.status === 'success'" class="bg-blue-300 text-white p-4">
                    {{ $page.props.flash.message }}
                </div>
                <div v-if="$page.props.flash.status === 'danger'" class="bg-red-300 text-white p-4">
                    {{ $page.props.flash.message }}
                </div>
            </div>
        </div>
    </div>

</template>
