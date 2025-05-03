<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Collapsible, CollapsibleContent, CollapsibleTrigger } from '@/components/ui/collapsible';

import { ListChecks } from 'lucide-vue-next';
import { ref } from 'vue';
import Navigation from './Navigation.vue';
const isOpen = ref(false);
</script>

<template>
    <Collapsible v-model:open="isOpen" class="w-full space-y-2">
        <div class="flex items-center justify-between space-x-4 px-4">
            <CollapsibleTrigger as-child>
                <Button variant="ghost" size="sm" class="flex w-full justify-between p-0">
                    <h4 class="text-sm font-semibold">Filters</h4>
                    <ListChecks class="h-4 w-4" />
                    <span class="sr-only">Toggle</span>
                </Button>
            </CollapsibleTrigger>
        </div>
        <CollapsibleContent class="space-y-2">
            <Navigation />
        </CollapsibleContent>
    </Collapsible>
</template>
