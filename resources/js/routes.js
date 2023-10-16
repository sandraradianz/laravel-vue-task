import EmployeeIndex from './components/employees/index.vue';
import EmployeeCreate from './components/employees/create.vue';
import EmployeeEdit from './components/employees/edit.vue';
export const routes = [
    {
        path: '/employees',
        component: EmployeeIndex,
        name: "EmployeeIndex"
    },
    {
        path: '/employees/create',
        component: EmployeeCreate,
        name: "EmployeeCreate"
    },
    {
        path: '/employees/edit/:employeeId',
        component: EmployeeEdit,
        name: "EmployeeEdit"
    }
];