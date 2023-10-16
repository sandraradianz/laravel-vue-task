<template>
    <div class="container">
        <h2 class="text-center">Employees List</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'EmployeeCreate' }" class="btn btn-primary btn-sm float-right mb-2">Add Employee</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table stripe">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Hobby</th>
                        <th>Category</th>
                        <th>Profile Picture</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(employee, key) of employees">
                            <td>{{ key+1 }}</td>
                            <td>{{ employee.name }}</td>
                            <td>{{ employee.contact_no }}</td>
                            <td>{{ employee.hobby }}</td>
                            <td>{{ employee.category }}</td>
                            <td>
                            <img
                                :src="
                                employee.photo
                                    ? employee.photo
                                    : 'https://www.shutterstock.com/shutterstock/photos/1135452278/display_1500/stock-photo-attractive-female-software-developer-looking-at-camera-in-break-of-working-on-new-laptop-computer-1135452278.jpg'
                                "
                                
                                width="150"
                                height="80px;"
                                class="mx-auto mb-4"
                                />
                            </td>
                            <td>
                                <router-link class="btn btn-success btn-sm" :to="{ name: 'EmployeeEdit', params: { employeeId: employee.id }}">Edit</router-link>
                                <button class="btn btn-danger btn-sm" @click="deleteEmployee(employee.id)">Delete</button>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>

    export default {
       
        data() {
            return {
                employees: {},
                
            }
        },
        created() {
            this.getEmployees();
        },
        methods: {
            getEmployees() {
              this.axios.get('http://127.0.0.1:8000/api/employees').then(response => {
                this.employees = response.data;
            }).catch(error=>{
                console.log(error)
            })
            },
            deleteEmployee(employeeId) {
                this.axios
                    .delete(`http://127.0.0.1:8000/api/employees/${employeeId}`)
                    .then(response => {
                        let i = this.employees.map(data => data.id).indexOf(employeeId);
                        this.employees.splice(i, 1)
                    });
            }
        }
    }
</script>