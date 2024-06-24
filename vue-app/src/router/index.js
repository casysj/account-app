import { createRouter, createWebHistory } from 'vue-router'
import ExpenseList from '@/components/ExpenseList.vue'
import AddExpense from '@/components/AddExpense.vue'

const routes = [
    {
        path: '/',
        name: 'ExpenseList',
        component: ExpenseList
    },
    {
        path: '/add-expense',
        name: 'AddExpense',
        component: AddExpense
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
