<script setup lang="ts">
import { Button } from '@/components/ui/button';
// import { VisStackedBar, VisXYContainer } from '@unovis/vue';
import { Collapsible, CollapsibleContent, CollapsibleTrigger } from '@/components/ui/collapsible';
import { ChevronDown, ChevronUp, Dot } from 'lucide-vue-next';
import { ref } from 'vue';
const isOpen = ref(false);
</script>
<template>
    <div class="text-xs">
        <Collapsible class="space-y-2" v-model:open="isOpen">
            <div class="flex items-center justify-between space-x-4">
                <CollapsibleTrigger as-child>
                    <Button variant="ghost" size="sm" class="cursor-pointer p-0">
                        <p class="font-semibold">Welcome to the Discussion Hub of our programming blog!</p>
                        <ChevronUp v-if="isOpen" class="h-4 w-4" />
                        <ChevronDown v-else class="h-4 w-4" />
                        <span class="sr-only">Toggle</span>
                    </Button>
                </CollapsibleTrigger>
            </div>
            <CollapsibleContent class="space-y-2">
                <p class="font-semibold">This is your space to:</p>
                <ul>
                    <li>
                        <p class="flex items-center"><Dot />Ask questions about coding challenges, frameworks, or best practices.</p>
                    </li>
                    <li>
                        <p class="flex items-center"><Dot />Share insights from your projects and get feedback from the community.</p>
                    </li>
                    <li>
                        <p class="flex items-center"><Dot />Debate trends in tech—AI, web development, DevOps, or anything code-related.</p>
                    </li>
                </ul>
            </CollapsibleContent>
        </Collapsible>
    </div>
</template>
