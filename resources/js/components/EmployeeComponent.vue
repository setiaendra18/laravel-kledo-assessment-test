<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">DATA EMPLOYEES</div>
                    <hr>
                    <form v-on:submit.prevent="submitForm">
                        <input type="text" v-model="form.name" placeholder="Masukan nama pegawai">
                        <input type="text" v-model="form.salary" placeholder="Masukan gaji pewagai">
                        <button type="submit">Save Data</button>
                    </form>
                    <hr>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Empoyee Name</th>
                                <th>Salary</th>
                               
                            </tr>
                            <tr v-for="employee,index in employees">
                                <td>{{ index+1 }}</td>
                                <td>{{ employee.name }}</td>
                                <td> {{ employee.salary }}</td>
                              
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            employees: [],
            form: {
                name: '',
                salary: 0,
            },
            
        }
    },
    created: function () {
        this.getEmployees()
    },
    methods: {
        
        getEmployees: function () {
            axios.get('http://127.0.0.1:8000/api/empolyees')
                .then(res => {
                    this.employees = res.data;
                })
                .catch(err => {
                    console.log(err);
                })
        },
        submitForm() {
            console.log(this.form)
            axios.post('http://127.0.0.1:8000/api/empolyee', this.form)
                .then((res) => {
                    var response=JSON.stringify(res.data);
                    alert(response)
                    this.getEmployees()
                    this.form.name=''
                    this.form.salary=''
                })
                .catch((error) => {
                    alert(error)
                    console.log(error.salary)
                }).finally(() => {
                });
        },
       
    }
}
</script>
