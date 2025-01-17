<template>
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/4 bg-gray-100 h-screen p-4">
            <ul>
                <li><router-link to="/">Login</router-link></li>
                <li><router-link to="/dashboard">Dashboard</router-link></li>
            </ul>
        </div>
        <!-- Content -->
        <div class="w-3/4 p-8">
            <router-view></router-view>
        </div>
    </div>
</template>
