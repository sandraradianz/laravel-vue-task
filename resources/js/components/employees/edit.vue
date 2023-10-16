<template>
    <div class="container">
        <h2 class="text-center">Update Employee</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'EmployeeIndex' }" class="btn btn-primary btn-sm float-right mb-2">Back</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <form>
                    <div class="form-group">
                        <label>Name</label><br>
                        <input v-validate="'required'" name="Name" type="text" class="form-control" v-model="data.employee.name">
                       <!-- <span class="text-danger text-sm" v-show="errors.has('Name')">{{ errors.first('Name') }}</span>-->
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label><br>
                        <input type="text" class="form-control" v-model="data.employee.contact_no">
                    </div>
                    <div class="form-group">
                        <label>Hobby</label><br>
                        <v-select  name="Hobby" v-model="hobby" id="value" label="hobby" :options="hobbyOptions"/>
                        
                    </div>
                    <div class="form-group">
                        <label>Category</label><br>
                        <v-select  name="Category" v-model="category" id="value" label="category" :options="categoryOptions"/>
                         
                    </div>
                    <div class="form-group">
                        <label>Profile Picture</label><br>
                         <div class="img-container w-64 mx-auto flex items-center justify-center">
                     <img :src="photo" alt="img" class="mr-8 rounded h-24 w-24">
                  </div>
                  <!-- Image upload Buttons -->
                  <div class="modify-img flex justify-between">
                     <input name="picture" field_name="update image" type="file" class="hidden" ref="updateImgInput" @change="updateCurrImg" accept="image/*">
                  </div>
                    </div>
                    <br><br>
                    <button type="button" class="btn btn-primary" @click="updateEmployee()">Update</button>
                     <router-link :to="{ name: 'Index' }" class="btn btn-primary btn-sm float-right mb-2">Cancel</router-link>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import vSelect from 'vue-select';
    export default {
         components: {
         'v-select': vSelect,
       },
        data() {
            return {
        
                employeeId:this.$route.params.employeeId,
                data:{
                    employee: {
                        photo: '/images/profile.png',
                    }
                },
                hobby:'',
                category:'',
                hobbyOptions: [ ],
                categoryOptions: [],
                
            }
        },
        created() {
            this.getHobby();
            this.getCategory();
        },
         watch: {
            hobby: function (newData) {
            this.data.employee.hobby = newData ? newData.hobby : "";
            },
            category: function (newData) {
            this.data.employee.category = newData ? newData.category: "";
            },
        },
        mounted() {
            this.editEmployee(this.$route.params.employeeId);
        },
        methods: {
             updateCurrImg (input) {
                if (input.target.files && input.target.files[0]) {
                const reader = new FileReader()
                reader.onload = e => {
                    this.data.employee.photo = e.target.result
                }
                reader.readAsDataURL(input.target.files[0])
                }
            },
            getHobby() {
              this.axios.get('http://127.0.0.1:8000/api/hobby').then(response => {
                this.hobbyOptions = response.data;
            }).catch(error=>{
                console.log(error)
            })
            },
             getCategory() {
              this.axios.get('http://127.0.0.1:8000/api/category').then(response => {
                this.categoryOptions = response.data;
            }).catch(error=>{
                console.log(error)
            })
            },
            editEmployee(employeeId) {
                this.axios.get(`http://127.0.0.1:8000/api/employees/${employeeId}`)
                   .then((response) => {
                       this.data.employee = response.data;
                       this.category = this.categoryOptions.find(function (h) { return h.category == this.data.employee.category});
                       this.hobby = this.hobbyOptions.find(function (h) { return h.hobby == this.data.employee.hobby });
                   });
            },
            
            updateEmployee() {
                this.axios
                    .patch(`http://127.0.0.1:8000/api/employees/${this.$route.params.employeeId}`, this.data.employee)
                    .then((response) => {
                        this.$router.push({ name: 'EmployeeIndex' });
                    });
            }
        }
    }
</script>