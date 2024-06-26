import { createRouter, createWebHistory } from 'vue-router'
import ExpenseList from '@/components/ExpenseList.vue'
import AddExpense from '@/components/AddExpense.vue'
import UserLogin from "@/components/UserLogin.vue";

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
    },
    {
        path: '/login',
        name: 'Login',
        component: UserLogin
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
