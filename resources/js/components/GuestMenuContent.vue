<script setup lang="ts">
import { DropdownMenuGroup, DropdownMenuItem } from '@/components/ui/dropdown-menu';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <!--
 <DropdownMenuLabel>My Account</DropdownMenuLabel>
    <DropdownMenuSeparator />
-->
    <DropdownMenuGroup>
        <DropdownMenuItem :as-child="true">
            <Link :href="route('login')" as="button"><span>Log in</span></Link>
        </DropdownMenuItem>
        <DropdownMenuItem :as-child="true">
            <Link :href="route('register')" as="button">
                <span>Register</span>
            </Link>
        </DropdownMenuItem>
    </DropdownMenuGroup>
</template>
